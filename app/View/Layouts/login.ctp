<?php
$cakeDescription = __d('cake_dev', 'Lima Móveis - ');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php echo $cakeDescription ?>
            <?php echo $this->fetch('title'); ?>
        </title>
        <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css('painel');

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
        <meta name=viewport content="width=device-width,initial-scale=1">
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <header>
                <div class="row">
                    <div class="col-md-12">
                        <span class="titulo">Área administrativa: Lima Móveis</span>
                    </div>  

                </div>                
            </header>
            <div class="row">
                <div class="col-md-12">              
                    <?php 
                        echo $this->Session->flash(); 
                        echo $this->Session -> flash('auth');
                    ?>
                     <p><strong>Acesso restrito.</strong> Informe seu login e senha para acessar a área restrita</p>
                </div>
            </div>
            <?php                             
                echo $this->fetch('content'); 
            ?>
            <footer>
                <div class="row">
                    <div class="col-md-12">   
                        <p>Copyright © Lima Móveis - 2016</p>
                    </div>
                </div>
            </footer>            
        </div>
    </body>
    <?php //echo $this->element('sql_dump'); ?>
</html>
