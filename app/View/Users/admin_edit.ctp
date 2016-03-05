<h3>DADOS PESSOAIS</h3>
<br>
<div class="row">
	<div class="col-md-12">
			<?php echo $this->Session->flash(); ?>
	</div>
	<div class="col-md-5">
	<?php echo $this -> Form -> create('User', array('action' => 'edit')); ?>

	<?php echo $this -> Form -> label('User.email', 'E-mail'); ?>
	<div class="form-group">
	<?php echo $this -> Form -> email('email', array('label' => false, 'class' => 'form-control input-md', 'id' => 'nome_id', 'placeholder' => 'Nome do ambiente')); ?>
	</div>

	<?php echo $this -> Form -> label('User.username', 'login'); ?>
	<div class="form-group">
	<?php echo $this -> Form -> input('username', array('label' => false, 'class' => 'form-control input-md', 'id' => 'nome_id', 'placeholder' => 'Nome do ambiente', 'required' => false)); ?>
	</div>

	<?php echo $this -> Form -> label('User.password', 'Nova senha'); ?>
	<div class="form-group">
	<?php echo $this -> Form -> input('password', array('type' => 'password', 'label' => false, 'size' => 20,'class' => 'form-control input-md', 'id' => 'nome_id', 'placeholder' => 'Nome do ambiente', 'required' => false)); ?>
	</div>

	<?php echo $this -> Form -> label('User.password_confirm', 'Confirmar nova senha'); ?>
	<div class="form-group">
	<?php echo $this -> Form -> input('password_confirm', array('type' => 'password', 'label' => false,  'class' => 'form-control input-md', 'id' => 'nome_id', 'placeholder' => 'Nome do ambiente', 'required' => false)); ?>
	</div>

	<?php echo $this -> Form -> submit('Atualizar dados', array('class' => 'btn btn-default btn-block btn-success btn-md')); ?>
	</div>
	<div class="col-md-offset-7"></div>
</div>