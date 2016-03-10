<h1>PROJETO: <strong><?php echo $fotos[0]['Projeto']['nome']?></strong></h1>
	
<?php
		echo $this->Html->link('Voltar', array('controller'=>'projetos', 'action' => 'index', 'admin' => true));
?>
<br>

		<h3>Cadastrar imagens</h3>
		<?php echo $this->Session->flash(); ?>
	<?php	
			
			  echo $this ->Form -> create('FotoProjeto', array('action' => 'add', 'type' => 'file', 'enctype'=>"multipart/form-data"), array('admin' => true));
			?>
			
			 	<div class="form-group">
				    <label for="exampleInputImagem">Selecione uma imagem</label>
				   <?php 
						 echo $this->Form->file('nome', array('label' => false, 'id' =>"inputImagem", 'required' ));
					?>
				    <p class="help-block">Tipo de arquivos: somente JPG/JPEG<br>
			    		Tamanho máximo: 2MB.</p>
			  	</div>


			
<?php
					echo $this->Form->input('projetos_id', array('label' => false, 'type' => 'hidden', 'value' => $fotos[0]['Projeto']['id']));

						 echo $this->Form->submit('Inserir imagem', array('class' => 'btn btn-default  btn-success btn-md')); 

				
			
		?>
	

	<div class="row">
		<div class="col-md-12">
		<h2>Fotos do álbum</h2>
		<p>Clique na imagem para excluir.</p>
		<br>
			</div>
			</div>
	<div class="row">
		<?php
		if(!empty($fotos[0])){
			foreach($fotos as $item):
				if(!empty($item['FotoProjeto']['nome'])){
					echo '<div class="col-md-3">';				
					echo  $this->Html->image('uploads/fotos/projetos/small_'.$item['FotoProjeto']['nome'], array('alt' =>'', 'title' => ''), array('admin' => true));
   					
   					
   					echo $this->Html->link('Excluir', array('controller'=>'FotoProjetos', 'action' => 'delete',$item['FotoProjeto']['id']), array('confirm'=>'Deseja excluir a imagem?'));

					echo '</div>';
				}
			endforeach;	
			}			
		?>
		</div>
		
	
	

