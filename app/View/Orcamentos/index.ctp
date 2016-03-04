<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Orçamento</h1>
    </div>
</div>

<p>Preencha e envie o formulário abaixo para realizarmos um orçamento para você.</p>
<br>

	
	<div class="row">
		<div class="col-md-7">
		<?php echo $this -> Session -> flash(); ?>
		<?php echo $this -> Form -> create('Orcamento'); ?>
		<div class="form-group">
			<?php echo $this -> Form -> input('nome', array('type' => 'text', 'class' => 'form-control  input-lg', 'id' => 'nome_id')); ?>
		</div>
		<div class="form-group">
			<?php echo $this -> Form -> label('Email'); ?>
			<div class="input-group">
			 <span class="input-group-addon">@</span>
				<?php echo $this -> Form -> input('email', array('label' => false, 'type' => 'email', 'class' => 'form-control  input-lg', 'id' => 'email_id')); ?>
			</div>
		</div>
		<div class="form-group">
			<?php echo $this->Form->label('Telefone'); ?>
			<div class="input-group">
			 <span class="input-group-addon"><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span></span>
				<?php echo $this->Form->input('telefone', array('label' => false,'type' => 'tel', 'class' => 'form-control  input-lg', 'id' => 'fone_id')); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo $this -> Form -> label('Cidade'); ?>
			
				<?php echo $this -> Form -> input('cidade', array('label' => false, 'type' => 'text', 'class' => 'form-control  input-lg', 'id' => 'cidade_id')); ?>
			
		</div>
		<div class="form-group">
			<?php echo $this->Form->label('Ambiente'); ?>
			

			 <?php
			 	$options = array(
					   array(
					      'cozinha' => 'Cozinhas',
					      'banheiro' => 'Banheiro',
					      'sala de estar' => 'Sala de estar',
					      'comercial' => 'Comercial',
					      'dormitório' => 'Dormitório',
					      'área de serviço' => 'Área de serviço',
					      'escritório' => 'Escritório',
					      'outros' => 'Outros'
					   )
					);
			 ?>
			 <?php echo $this->Form->select('ambiente', $options, array('class' => 'form-control  input-lg', 'id' => 'ambiente_id')); ?>
			
		</div>



		<div class="form-group">
			<?php echo $this -> Form -> label('Descreva seu projeto'); ?>
			<?php echo $this -> Form -> textarea('descricao', array( 'class' => 'form-control', 'id' => 'desc_id')); ?>
		</div>
		<div class="form-group">
			<div class="g-recaptcha" data-sitekey="6Lcy7hkTAAAAAGvun06f9_JeScIRloCz9wKJQCqS"></div>
		</div>
	<br>
	<?php echo $this -> Form -> submit('Enviar mensagem', array('class' => 'btn btn-default btn-block btn-lg btn-info')); ?>
	<?php echo $this -> Form -> end();?>
	</div>
	</div>
	
	