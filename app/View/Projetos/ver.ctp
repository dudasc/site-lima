<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Projetos
            <small><?php echo $projeto['Projeto']['nome']?></small>
        </h1>
    </div>
</div>

<?php echo $projeto['Projeto']['descricao']?>
<br>
<h3>Fotos do projeto</h3>
<hr>

   <?php
   foreach($projeto as $fotos){}               
        if(count($fotos) > 0){
        	$i = 0;
			foreach($fotos as $item):
				if($i % 4 == 0 or $i == 0){
	            		echo '<div class="row"> ';
	            	}
			echo '<div class="col-md-3">';
				$thumb =  $this->Html->image("uploads/fotos/projetos/small_".$item['nome'], array('alt' =>'', 'title' => '', 'class' => 'img-responsive img-hover'));
			$foto =  "../../img/uploads/fotos/projetos/".$item['nome'];
			//$thumb = 'http://placehold.it/750x450';
	 		echo '<a href="'.$foto.'" class="thumbnail lightview" 
	    	data-lightview-group="example"
 			data-lightview-caption="">'.$thumb."</a>";		 		
 			echo '</div>';
 			$i++;
			 			if($i % 4 == 0 or $i == 0){
		            		echo '</div>';
		            	}
		endforeach;
	}
	?>
