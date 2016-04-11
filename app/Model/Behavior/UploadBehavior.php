<?php
/* 
 * Upload Behavior
 * Behavior baseado no Meio Upload. Como o Meio Upload sofreu muitas mudanÃ§as
 * e ao meu ver ficou ruim, resolvi criar um Behavior que atenda minha necessida
 * para enviar arquivos e imagens. As imagens podem ser redimensionadas, usar crop, etc..
 *
 * Para gerar ThumbNails Ã© necessÃ¡rio ter na sua pasta vendors a biblioteca phpThumb que pode ser
 * encontra no link: http://phpthumb.gxdlabs.com/
 * Descompacte o conteÃºdo da phpThumb na pasta vendors/phpThumb.
 *
 * Exemplo de uso:
 *
 * var $actsAs = array(
 *       'Upload' => array(
 *
 *        // Enviar uma imagem //
 *
 *          'imagem' => array(                                                                      //Nome do campo na base de dados.
 *              'dir' => 'img{DS}uploads{DS}marcas',                                                //DiretÃ³rio para envio, apartir do webroot
 *              'default' => 'sem_logo.jpg',                                                        //Arquivo a ser exibido o campo esteja em branco na base.
 *               'allowedMime' => array('image/jpeg', 'image/pjpeg', 'image/png', 'image/gif'),     //Mimetype permitidos (NÃ£o setar se nÃ£o querer validar)
 *               'allowedExt' => array('jpg', 'jpeg', 'png', 'gif'),                                //ExtenÃ§Ãµes permitidas (NÃ£o setar se nÃ£o querer validar)
 *               'sizes' => array(                                                                  //Se for uma imagem vocÃª pode setar o nome e os metodos e valores a serem aplicados na imagem da lib phpThumb
 *                   'small' => array(                                                              //vai gerar small_nomeDoArquivoEnviado.ext
 *                       'adaptiveResize' => array(200,100)                                         //Aplica o metodo adaptiveResize passando os parametros 200 e 100 da classe phpThumb
 *                   ),
 *                   'medium' => array(                                                             //vai gerar medium_nomeDoArquivoEnviado.ext
 *                       'cropFromCenter' => 200                                                    //Aplica o metodo cropFromCenter com o parametro 200 da classe phpThumb
 *                   )
 *               )
 *           ),
 *
 *        // Enviar arquivo //
 *
 *           'arquivo' => array(                                                                    //Nome do campo na base de dados
 *               'dir' => 'files{DS}uploads{DS}marcas',                                             //DiretÃ³rio de envio
 *               'allowedExt' => array('doc','docx','pdf')                                          //ExtensÃ£o permitidas
 *           )
 *       )
 *   );
 *
 * Lista de funções para usar na ao gerar o ThumbNail
 *
 *  * crop ($startX, $startY, $cropWidth, $cropHeight)
 *  * cropFromCenter ($cropWidth, $cropHeight = null)
 *  * resize ($maxWidth, $maxHeight)
 *  * resizePercent ($percent)
 *  * rotateImage ($direction = 'CW')
 *  * rotateImageNDegrees ($degrees)
 *
 * Os metodos para gerar thumbnail pode ser "combados".
 * Ex.: Definir tamanhos para gerar o thumbNail e rotacinar a imagem.
 * array('sizes' => array(
 *          'small' => array(
 *              'resize' => (300,300),
 *              'rotateImage('CW)
 *          )
 *      )
 * );
 * 
 * @author Daniel Luiz Pakuschewski
 * @author-url http://www.danielpk.com.br
 * @version 0.1
 * @lastmodified 2009-09-24
 */
//App::import('Core', 'File');
//App::import('Core', 'Folder');

App::uses('File', 'Utility');
App::uses('Folder', 'Utility');
class UploadBehavior extends ModelBehavior {
    
    private $__options = array(
        'dir' => '{modelName}{DS}{field}',
        'createDir' => true,
        'allowedMime' => array(),
        'allowedExt' => array(),
        'removeSource' => false,
        'default' => false,
        'maxSize' => 2097152, // 2MB
        'sizes' => array(),
    );

    private $__validate = array(
        /*'Empty' => array(
            'rule' => array('validateEmpty'),
            'message' => 'Ã necessário selecionar um arquivo.',
            'on' => 'create',
            'check' => true,
            'last' => true
        ),*/
        'Dir' => array(
            'rule' => array('validateDir'),
            'message' => 'Diretório não existe ou não tem permissão para escrita.',
            'check' => true,
            'last' => true
        ),
        'Type' => array(
            'rule' => array('validateType'),
            'message' => 'O arquivo enviado é inválido.',
            'check' => true,
            'last' => true
        ),
        'Size' => array(
            'rule' => array('validateSize'),
            'message' => array('Você está enviando um arquivo maior que o permitido.'),
            'check' => true,
            'last' => true
        )
    );

    /**
     * Guarda um instancia do model
     * @var object
     */
    private $__model;

    /**
     * Guarda as configuraÃ§Ãµes de cada arquivo
     * que serÃ¡ enviado
     * @var array
     */
    private $__files = array();

    /**
     * Armazene o caminho completo dos arquivos
     * que serÃ£o deletados depois que os dados
     * forem salvo no banco.
     * @var array
     */
    private $__filesToDelete = array();
public function setup(Model $model, $settings = Array()){
   // public function setup(&$model, $settings) {
        //Guarda uma instancia do model
        $this->__model = $model;
        
        foreach($settings as $field => $options){
            //Junta as duas opÃ§Ãµes
            $options = Set::merge($this->__options, $options);
            
            //Verifica se o campo informado existe na base de dados
            if (!$model->hasField($field)) {
                trigger_error(sprintf('UploadBehavior Error: O campo "%s" não existe na base de dados "%s".', $field, $model->alias), E_USER_WARNING);
            }

            if($options['default']) {
                if (!preg_match('/^.+\..+$/', $options['default'])) {
                    trigger_error('UploadBehavior Error: A opção "default" tem que ter uma extenção.', E_USER_ERROR);
                }
            }

            $options['dir'] =$this->__replaceTokens($options['dir'], $field);
            $this->__files[$field] = $options;
            unset($options);
        }
    }

    /* ---ValidaÃ§Ãµes--- */
    /**
     * Verifica se o diretÃ³rio existe e tem permissÃ£o de escrita
     * dependendo das opÃ§Ãµes passadas cria o diretÃ³rio
     */
    public function validateDir(&$model, $data) {
        foreach($data as $field => $_field) {
            if(empty($_field['name'])){ return true; }
            if (!$this->__model->validate[$field]['Dir']['check']) {
                return true;
            }
            $options = $this->__files[$field];
            $Folder = new Folder($this->__fullPathDir($options['dir']), $options['createDir'], 777);
            if(is_dir($Folder->path) && is_writable($Folder->path)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Valida se algum arquivo foi enviado
     */
    public function validateEmpty(&$model, $data){
         foreach($data as $field => $_file) {
            if (!$this->__model->validate[$field]['Empty']['check']) {
                return true;
            }
            if(empty($_file['name'])){
                return false;
            }
            return true;
         }
    }
    
    /**
     * Verifiaca o se o tipo de arquivo enviado Ã© o arquivo
     * esperado conforme o option.
     */
    public function validateType(&$model, $data) {
        foreach($data as $field => $_field) {
            if(empty($_field['name'])){ return true; }
            if (!$this->__model->validate[$field]['Type']['check']) {
                return true;
            }
            
            $options = $this->__files[$field];
            //Verifica MimeType
            if(!empty($options['allowedMime'])) {
                if(!in_array($_field['type'], $options['allowedMime'])) {
                    return false;
                }
            }
            if(!empty($options['allowedExt'])) {
            //Verifica extenÃ§Ã£o
                if(!in_array($this->__getExt($_field['name']), $options['allowedExt'])) {
                    return false;
                }
            }
        }
        return true;
    }

    public function validateSize(&$model, $data){
        foreach($data as $field => $_field) {
            if(empty($_field['name'])){ return true; }
            if (!$this->__model->validate[$field]['Size']['check']) {
                return true;
            }
            $options = $this->__files[$field];
            if(!$_field['name'] && $_field['size'] > $options['maxSize']){
                $model->validate[$field]['Size']['message'] = "O arquivo enviado(".$file['size'].") é maior do tamanho permitido(".$options['maxSize'].")";
                return false;
            }
            return true;
         }
    }
    /**/

    /* -- Callbacks -- */
	public function beforeValidate(Model $model, $options = Array()){
    //public function beforeValidate(&$model){
        foreach($this->__files as $field => $options){
            $array = array();
            $array[$field] = $this->__validate;
            $model->validate = Set::merge($model->validate, $array);
        }
    }
	public function beforeSave(Model $model, $options = Array()){
    //public function beforeSave(&$model){
        $data = $model->data[$model->alias];
        foreach($this->__files as $field => $options){
            if(empty($data[$field]['name'])){
                unset($model->data[$model->alias][$field]);
                continue;
            }
            $file = $data[$field];
            $file = $this->__uploadFile($file, $this->__fullPathDir($options['dir']));
            if(!empty($options['sizes']) && count($options['sizes']) > 0){
                foreach($options['sizes'] as $tamanho => $setting){
                    if($tamanho == 'normal'){
                        $tamanho = null;
                        $this->__setToDelete($file);
                    }
                    $this->__generateThumbnail($file, $this->__fullPathDir($options['dir']), $tamanho, $setting);
                }
            }
            $model->data[$model->alias][$field] = $file;
        }
        return true;
    }
	public function afterSave(Model $model, $idCreated, $options = Array()){
    //public function afterSave($isCreated){
        $this->__deleteFiles();
    }
	public function beforeDelete(Model $model, $cascade = true){
    //public function beforeDelete(){
        foreach($this->__files as $field => $options){
            $arquivo = $this->__model->read($field);
            $arquivo = $arquivo[$this->__model->alias][$field];
            if(!empty($options['sizes']) && count($options['sizes']) > 0){
                foreach($options['sizes'] as $tamanho => $setting){
                    if($tamanho == 'normal'){
                        continue;
                    }
                    @unlink($this->__fullPathDir($options['dir']).DS.$tamanho.'_'.$arquivo);
                }
            }
            @unlink($this->__fullPathDir($options['dir']).DS.$arquivo);
        }
        return true;
    }

    /*
     * Se foi criado algum thumbnail ele adiciona
     * ao array do arquivo o nome do thumbnail.
     */
	 public function afterFind(Model $model, $data, $primary = false){
    //public function afterFind(&$model, $data){
        foreach($this->__files as $field => $options){
            for( $a=0; $a<count($data); $a++){
                if(!empty($data[$a][$model->alias][$field])){
                    if(!empty($options['sizes'])){
                        foreach($options['sizes'] as $size => $methods){
                            $data[$a][$model->alias][$size.'_'.$field] = $size.'_'.$data[$a][$model->alias][$field];
                        }
                    }
                }elseif($options['default']){
                    $data[$a][$model->alias][$field] = $options['default'];
                }
            }
        }
        return $data;
    }

    /**
     * Guarda os arquivos para serem deletados
     * depois que for salvo.
     * @param string $file
     * @return void
     */
     private function __setToDelete($file){
         $this->__filesToDelete = Set::merge($this->__filesToDelete, array($file));
     }

     /**
      * Delete os arquivos que estÃ£o no $__filesToDelete
      */
     private function __deleteFiles(){
        foreach($this->__filesToDelete as $file){
            if(is_file($file)){
                unlink($file);
            }
        }
     }
    /**
     * Limpa o nome do arquivo e verifica se o arquivo ja existe
     * @param string $name
     * @param string $dir
     * return string
     */
    private function __uniqueName($name, $dir){
        $name = $this->__cleanName($name);
        $path = $dir.DS.$name;
        if(file_exists($path)){
            $name = time().$name;
        }
        return $name.".jpg";
    }
    /**
     * Remove caracteres especiais e retorna em minusculo e gera um nome randomico
     */
    private function __cleanName($string){
        $tamanho = mt_rand(10,20);
        $all_str = "abcdefghijlkmnopqrstuvxyzw1234567890";
        $string = "";
        for ($i = 0;$i <= $tamanho;$i++){
           $string .= $all_str[mt_rand(0,35)];
        }
        // $string = ereg_replace("[^a-zA-Z0-9_.]", "", $string);
        //$string = strtolower($string);
       return $string;
    }

    /**
     * Retorna a extenÃ§Ã£o do arquivo
     * @param string $filename
     * @return string
     */
    private function __getExt($filename) {
        $filename = strtolower($filename);
        if(strpos($filename, '.jpeg')) {
            return 'jpeg';
        }
        $tamanho = strlen($filename);
        $ext = substr($filename, $tamanho - 3);

        return $ext;
    }

    /**
     * Retorna o caminho completo do DIR informado no options
     * @param string $dir
     * @return string
     */
    private function __fullPathDir($dir){
        return WWW_ROOT.$dir;
    }

    /**
     * Substitui os TOKENs colocados no dir
     * @param string $dir
     * @param string $field
     * @return string
     */
    private function __replaceTokens($dir, $field){
        $tokens = array('{modelName}','{DS}','{fieldName}');
        $replace = array(Inflector::underscore($this->__model->alias), DS, $field);
        return trim(str_replace($tokens, $replace, $dir));
    }

    /**
     * Cria o thumbnail de acordo com os paramentros passados nas options
     * necessita do Vendor phpThumb()
     * @param string $file
     * @param string $dir
     * @param string $prefix
     * @param array $setting
     */
    private function __generateThumbnail($file, $dir, $prefix = null, $setting = array()){
    	//App::import('Vendor','phpthumb', array('file' => 'phpThumb' . DS . 'phpthumb.class.php'));
        App::import('Vendor','phpthumb', array('file' => 'phpThumb'.DS.'ThumbLib.inc.php'));
        $path = $dir.DS.$file;
        $thumb = PhpThumbFactory::create($path);
        foreach($setting as $metodo => $valores){
            $val = (is_array($valores)) ? implode(',', $valores) : $valores;
            eval("\$thumb->{$metodo}($val);");
        }
        
        if(is_null($prefix)){
            $thumb->save($dir.DS.$file);
        }else{
            $thumb->save($dir.DS.$prefix.'_'.$file);
        }
    }

    /**
     * Faz o Upload do Arquivo
     * @return mixed (false ou file name)
     */
    private function __uploadFile($file, $dir){
        $file['name'] = $this->__uniqueName($file['name'], $dir);
        $path = $dir.DS.$file['name'];
        if(!move_uploaded_file($file['tmp_name'], $path)){
            return false;
        }
        return $file['name'];
    }
}