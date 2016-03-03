<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Projetos</h1>
    </div>
</div>
<br>

<?php
    foreach($projetos as $item):
?>
        <div class="row ">
            <div class="col-md-7">
            <?php
            $foto = null;
                if(empty($item['FotoProjeto'][0]['nome'])){
                     $foto = $this->Html->image('sem-foto.png', array('class' => 'img-responsive img-hover' , 'alt' => ''));
                }else{
                    $foto = $this->Html->image('uploads/fotos/projetos/small_'.$item['FotoProjeto'][0]['nome'], array('class' => 'img-responsive foto-projeto' , 'alt' => ''));
                }

                echo @$this->Html->link($foto, array('controller'=>'projetos', 'action' => 'ver', 'id' => $item['Projeto']['id'], 'titulo' => Inflector::slug(strtolower($item['Projeto']['nome']))), array('title' => $item['Projeto']['nome'], 'escape'=> false));

             
                    
                ?>

            </div>
            <div class="col-md-5">
                <h3><?php echo $item['Projeto']['nome'];?></h3>
               <!-- <h4>Subheading</h4>-->
                <p><?php echo strip_tags($item[0]['descricao']);?>...</p>
               
                <?php
                echo $this->Html->link('Visualizar projeto', array('controller'=>'projetos', 'action' => 'ver', 'id' => $item['Projeto']['id'], 'titulo' => Inflector::slug(strtolower($item['Projeto']['nome']))), array('class'=>'btn btn-info', 'escape'=> false));
                ?>
            </div>
        </div>
        <hr>
    <?php endforeach;?>
    <div class="row">
    <div class="col-md-3 col-md-offset-5">
        <nav>
            <ul class="pagination">
            <?php
            echo $this->Paginator->prev('&laquo;', array('tag' => 'li', 'escape' => false), '<a href="#">&laquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
            $numbers = $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentLink' => true, 'currentClass' => 'active', 'currentTag' => 'a'));
            $numbers = preg_replace("#\<li class=\"active\"\>([0-9]+)\<\/li\>#", "<li class=\"active\"><a href=''>$1</a></li>",$numbers);
            echo $numbers;
            echo $this->Paginator->next('&raquo;', array('tag' => 'li', 'escape' => false), '<a href="#">&raquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
            ?>
            </ul>
        </nav>
    </div>
</div>