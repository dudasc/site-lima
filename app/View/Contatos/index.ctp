<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Entre em contato</h1>
    </div>
</div>
<p>Para maiores informações, entre em contato conosco através do formulário abaixo.<br>Obrigado pela sua visita.</p>
<br><br>

<div class="row">

	<div class="col-md-6">
	<?php echo $this->Session->flash(); ?>
		<?php echo $this->Form->create('Contato'); ?>
		<div class="form-group">
			<?php echo $this->Form->input('Contato.nome', array( 'type' => 'text', 'class' => 'form-control  input-lg', 'id' => 'nome_id')); ?>
		</div>
		<div class="form-group">
			<?php echo $this->Form->label('Email'); ?>
			<div class="input-group">
			 <span class="input-group-addon">@</span>
				<?php echo $this->Form->input('Contato.email', array('label' => false, 'type' => 'email', 'class' => 'form-control  input-lg', 'id' => 'email_id')); ?>
			</div>
		</div>
		<div class="form-group">
			<?php echo $this->Form->label('Telefone'); ?>
			<div class="input-group">
			 <span class="input-group-addon"><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span></span>
				<?php echo $this->Form->tel('Contato.telefone', array('label' => false,'type' => 'tel', 'class' => 'form-control  input-lg', 'id' => 'fone_id')); ?>
			</div>
		</div>
		
		<div class="form-group">
			<?php echo $this->Form->label('Mensagem'); ?>
			<?php echo $this->Form->textarea('Contato.msg', array('class' => 'form-control', 'id' => 'msg_id')); ?>
		</div>
		<div class="form-group">
		<div class="g-recaptcha" data-sitekey="6Lcy7hkTAAAAAGvun06f9_JeScIRloCz9wKJQCqS"></div>
		</div>
	<?php echo $this->Form->submit('Enviar mensagem', array('class' => 'btn btn-default btn-block btn-info btn-lg')); ?>
	<?php echo $this->Form->end();?>

	<br><br>
	</div>
	<div class="col-md-6">
		<div class="mapa">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d873.4495132788785!2d-49.8497632785451!3d-28.831026575328245!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9521f00c86a2afdb%3A0xcde2016f09354e65!2sR.+Profa.+Carolina+Duarte%2C+100%2C+Timb%C3%A9+do+Sul+-+SC%2C+88940-000%2C+Brasil!5e0!3m2!1spt-BR!2sbr!4v1456747289492" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
		<p>Rua Profª Carolina Duarte Fernandes, 100 - Centro <br>
		Timbé do Sul/SC. CEP 88940-000</p><p>
<span style="font-size: 1.3em; font-weight: 400">(48) 3536 1483</span><br>
contato@limamoveissobmedida.com.br</p>
	</div>
</div>