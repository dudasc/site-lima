<h1>CADASTRO DE PROJETO</h1>
<?php
echo $this->Html->link('Voltar', array('controller'=>'projetos', 'action' => 'index', 'admin' => true));
?>
<br><br>
<div class="row">
	<div class="col-md-12">
		<?php echo $this->Session->flash(); ?>
	</div>
	<div class="col-md-6">		
		<?php echo $this->Form->create('Projeto'); ?>
		
		<div class="form-group">
			<?php echo $this->Form->input('id', array('type' => 'text', 'class' => 'form-control input-md', 'id' => 'nome_id', 'disabled', 'placeholder' => 'Código', 'required' => false)); ?>
	
		</div>
		<div class="form-group">
			<?php echo $this->Form->input('nome', array('type' => 'text', 'class' => 'form-control input-md', 'id' => 'nome_id', 'placeholder' => 'Nome do projeto', 'required' => false)); ?>
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<?php echo $this->Form->label('Descrição',array(), array('for' => 'desc_id'));?>
			<?php echo $this->Form->input('descricao', array('id'=>'desc_id','type' => 'textarea', 'class' => 'form-control input-md tinymce','label' => 'Descrição',  'placeholder' => 'Descrição do projeto')); ?>
		</div>

	<?php echo $this->Form->submit('Salvar', array('class' => 'btn btn-default btn-info')); ?>

	</div>		

</div>
