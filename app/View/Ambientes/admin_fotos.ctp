<h1>AMBIENTE: <strong><?php echo $fotos[0]['Ambiente']['nome']?></strong></h1>
	
<?php
	echo $this->Html->link('Voltar', array('controller'=>'ambientes', 'action' => 'index', 'admin' => true));
?>
<br>
<h3>Cadastrar imagens</h3>
	<?php echo $this->Session->flash(); ?>	
<?php 
	echo $this ->Form-> create('FotoAmbiente', array('action' => 'add', 'type' => 'file', 'enctype'=>"multipart/form-data"), array('admin' => true));
?>
<div class="form-group">
	<label for="exampleInputFile">Selecione um imagem</label>
	<?php 
		 echo $this->Form->file('nome', array('label' => false, 'id' =>"inputImagem", 'required' ));
	?>
	<p class="help-block">Tipo de arquivos: somente JPG/JPEG<br>Tamanho máximo: 2MB.</p>
</div>
<div class="form-group">
	<label class="control-label" for="inputDescricao">Descrição</label>
	<?php
		echo $this->Form->input('descricao', array('type' => 'text', 'class' => 'form-control input-md', 'label' => false));
	?>
</div>
<?php
	echo $this->Form->input('ambientes_id', array('label' => false, 'type' => 'hidden', 'value' => $fotos[0]['Ambiente']['id']));
	echo $this->Form->submit('Inserir imagem', array('class' => 'btn btn-default  btn-success btn-md')); 			
?>


<div class="row">
	<div class="col-md-12">
	<h2>Fotos do álbum</h2>
	<p>Clique na imagem para excluir.</p>
	<br>		
	<div class="row">
	

		<?php
			foreach($fotos as $item):
				if(!empty($item['FotoAmbiente']['nome'])){
				echo '<div class="col-md-2 ">';
					
					echo  $this->Html->image('uploads/fotos/ambientes/small_'.$item['FotoAmbiente']['nome'], array('class' => 'img-responsive img-hover', 'alt' =>'', 'title' => ''), array('admin' => true));
   					
   					
   					echo $this->Html->link('Excluir', array('controller'=>'fotoambientes', 'action' => 'delete',$item['FotoAmbiente']['id']), array('confirm'=>'Deseja excluir a imagem?'));
					echo '</div>';
}
			endforeach;				
		?>
	
		</div>
	</div>
</div>

