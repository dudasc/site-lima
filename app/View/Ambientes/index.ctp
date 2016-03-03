<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Ambientes</h1>
    </div>
</div>

<p>Selecione o ambiente desejado no meu abaixo.</p>
<br><br>
<div class="row">
    <div class="col-md-3">    
        <div class="list-group ">
        	<a href="#" class="list-group-item active">
    			<h4 class="list-group-item-heading">Categorias</h4>
			</a>        	
        	<?php
	       		foreach($ambientes as $item):
	       			echo $this->Html->link($item['Ambiente']['nome'], array('controller'=>'ambientes', 'action' => 'index', 'id' => $item['Ambiente']['id'], 'titulo' => Inflector::slug(strtolower($item['Ambiente']['nome']))), array('class'=>'list-group-item', 'escape'=> false));
				endforeach;
			?>
        </div>
    </div>
    <!-- Content Column -->
    <div class="col-md-9">
    	<?php
    		if(!empty($ambiente)){
    	?> 
        <h2><?php echo $ambiente['Ambiente']['nome'];?></h2>    
        <br>
        <div class="row"> 
	       <?php
	       foreach($ambiente as $fotos){}	               
	            if(count($fotos) >= 0){
					foreach($fotos as $item):
						echo '<div class="col-md-3">';
						$thumb =  $this->Html->image("uploads/fotos/ambientes/small_".$item['nome'], array('alt' =>'', 'title' => '', 'class' => 'img-responsive img-hover'));
						$foto =  "../../img/uploads/fotos/ambientes/".$item['nome'];
						//$thumb = 'http://placehold.it/750x450';
				 		echo '<a href="'.$foto.'" class="thumbnail lightview" 
				    	data-lightview-group="example"
		     			data-lightview-title="'.$item['descricao'].'"
		     			data-lightview-caption="">'.$thumb.'</a>';		 		
			 			echo '</div>';
					endforeach;
				}else{
					echo '<p>Não há fotos para mostrar</p>';
				}
			?>         
		</div>	  
		<?php }?>
    </div>
</div>