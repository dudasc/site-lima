<h1>EDITAR AMBIENTE</h1>
<?php
echo $this->Html->link('Voltar', array('controller' => 'ambientes', 'action' => 'index', 'admin' => true));
?>
<br><br>
<div class="row">
	<div class="col-md-12">
		<?php echo $this->Session->flash(); ?>
	</div>
	<div class="col-md-5">

		<?php echo $this->Form->create('Ambiente'); ?>
		<div class="form-group">
			<?php echo $this->Form->input('Ambiente.nome', array('type' => 'text', 'class' => 'form-control input-md', 'id' => 'nome_id', 'placeholder' => 'Nome do ambiente', 'required' => false)); ?>
		</div>
	<?php echo $this->Form->button('Salvar', array('type' => 'submit', 'class' => 'btn btn-default btn-block btn-success btn-md')); ?>
	<?php echo $this->Form->end(); ?>
	</div>
	<div class="col-md-7 col-md-offset-7"></div>
</div>
