<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Projetos
            <small><?php echo $projeto['Projeto']['nome']?></small>
        </h1>
    </div>
</div>

<?php echo $projeto['Projeto']['descricao']?>
<br>
<h3>Fotos do projetos</h3>
<hr>
<div class="row"> 
   <?php
   foreach($projeto as $fotos){}               
        if(count($fotos) > 0){
			foreach($fotos as $item):
			echo '<div class="col-md-3">';
				$thumb =  $this->Html->image("uploads/fotos/projetos/small_".$item['nome'], array('alt' =>'', 'title' => '', 'class' => 'img-responsive img-hover'));
			$foto =  "../../img/uploads/fotos/projetos/".$item['nome'];
			//$thumb = 'http://placehold.it/750x450';
	 		echo '<a href="'.$foto.'" class="thumbnail lightview" 
	    	data-lightview-group="example"
 			data-lightview-caption="">'.$thumb."</a>";		 		
 			echo '</div>';
		endforeach;
	}
	?>
</div>