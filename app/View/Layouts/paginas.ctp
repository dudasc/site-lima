<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<?php 
			echo $this->element('head'); 
		?>
	</head>
	<body>
		<?php echo $this->element('header'); ?>
		<div class="container-fluid top-page">
			<div class="container">
				<div class="row">
			    	<?php echo $this->fetch('content'); ?>
		    	</div>
	    	</div>
	    </div>
	    <?php echo $this->element('footer'); ?>
	    <script src='https://www.google.com/recaptcha/api.js?hl=pt-BR'></script>
    </body>
	<?php  //echo $this->element('sql_dump'); ?>
</html>