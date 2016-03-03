<?php
$cakeDescription = __d('cake_dev', 'Lima Móveis - ');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
 <?php echo $this->Html->charset(); ?>
<title>
    <?php echo $cakeDescription ?>
    <?php echo $this->fetch('title'); ?>
</title>
<meta name=viewport content="width=device-width,initial-scale=1">

<meta name="description" content="Site da empresa Lima Móveis, desenvolvimento de móveis sob medida - Timbé do Sul/SC. Cozinhas, banheiros, escritórios, dormitórios, toda linha de móveis sob medida para você.">
<meta name="keywords" content="Móveis sob medida, ambientes planejados, móveis, cozinhas, dormitórios, escritórios, comercias, banheiros">
<meta name="robots" content="Index,Follow">
<meta name="revisit-after" content="1" />
<meta name="language" content="pt-BR">
<meta name="author" content="Eduardo S. Coelho" />

<!-- metatags facebook-->
<meta property="og:locale" content="pt_BR"> 
<?php 
    $dominio= $_SERVER['HTTP_HOST'];
    $url = "http://" . $dominio. $_SERVER['REQUEST_URI'];
 ?>
<meta property="og:url" content="<?= $url?>"> 
<meta property="og:title" content="<?php echo $cakeDescription;echo $this->fetch('title'); ?>">
<meta property="og:site_name" content="Lima Móveis - Ambientes planejados"> 
<meta property="og:description" content="Site da empresa Lima Móveis, desenvolvimento de móveis sob medida - Timbé do Sul/SC. Cozinhas, banheiros, escritórios, dormitórios, entre outros.">
<meta property='og:image' content='http://www.limamoveissobmedida.com.br/img/face.png' />
<!-- fim metatags facebook-->
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<link href='https://fonts.googleapis.com/css?family=Raleway:400,900' rel='stylesheet' type='text/css'>
<?php
    echo $this->Html->meta('icon');
    echo $this->Html->css('default');
    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');

    echo $this->Html->script('spinners.min');
    echo $this->Html->script('lightview');
    echo $this->Html->css('lightview');

    echo $this->Html->script('excanvas'); 
?>