<?php
class FotoAmbiente extends AppModel {

	public $useTable = 'fotos_ambientes';
	public $belongsTo = array(
		'Ambiente' => array(
			'className' => 'Ambiente',
			'foreignKey' => 'ambientes_id',
			'type' => 'right',
			//'fields' => array('id', 'dt_cadastro', 'descricao'),
			'conditions' => array(),
			//'order' => array('dt_cadastro' => 'DESC'),
			'dependent' => false,
		),
	);


	public $validate = array(
		/*'nome' => array(
				'required' => array(
				'rule' => array('notEmpty'),

				'message' => 'Campo imagem obrigatório')
			),  */

		'ambientes_id' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'Nenhum albúm selecionado'),
		),
		'nome',
		'id',
	);

	var $actsAs = array(
        'Upload' => array(
 
         // Enviar uma imagem //
 
           'nome' => array( //Nome do campo na base de dados.
               'dir' => 'img/uploads/fotos/ambientes/',  //DiretÃ³rio para envio, apartir do webroot
               //'default' => 'sem_img.jpg',  //Arquivo a ser exibido o campo esteja em branco na base.
                'allowedMime' => array('image/jpeg', 'image/pjpeg'), //Mimetype permitidos (NÃ£o setar se nÃ£o querer validar)
                'allowedExt' => array('jpg', 'jpeg'),//ExtenÃ§Ãµes permitidas (NÃ£o setar se nÃ£o querer validar)
                'sizes' => array(//Se for uma imagem vocÃª pode setar o nome e os metodos e valores a serem aplicados na imagem da lib phpThumb
                    'small' => array(//vai gerar small_nomeDoArquivoEnviado.ext
                        //Aplica o metodo adaptiveResize passando os parametros 200 e 100 da classe phpThumb
						 //'cropFromCenter' => 2000,
                    	//'cropFromCenter' => 2000,  
						  'adaptiveResize' => array(750, 450),  

						   
						 //'resize' => array(750,450) 
						 //'resize' => array(90,90) 
                    ), 
                    /*'medium'  => array(//vai gerar small_nomeDoArquivoEnviado.ext
                        //Aplica o metodo adaptiveResize passando os parametros 200 e 100 da classe phpThumb
						 //'cropFromCenter' => 2000,
						  //'adaptiveResize' => array(225,150),  
						 'resize' => array(290,290) 
                    ),  */                
					'normal' => array('resize' => array(900,900))
                )
            )
        )
    );
}