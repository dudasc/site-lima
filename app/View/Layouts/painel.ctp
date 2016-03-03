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

        <link href='https://fonts.googleapis.com/css?family=Raleway:400,900' rel='stylesheet' type='text/css'>

        <?php echo $this->Html->css('painel');?>
        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <script>
          tinymce.init({ 
            selector:'.tinymce',
            plugins: "link",
            menubar: false,       
            height: 400,

            toolbar: 'undo redo | bold italic underline | alignleft| numlist bullist | link'
          
            });</script>
    </head>
    <body>
    <nav class="navbar navbar-default navbar-inverse">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

            <?php
                echo $this->Html->link('Painel Lima Móveis', array('controller'=>'pages', 'action' => 'index'), array('class' => 'navbar-brand'));
            ?>         
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
          <li>
           <?php echo $this->Html->link('Projetos', array('controller' => 'projetos', 'action' => 'index', 'admin' => true), array('alt' => '', 'title' => '')); ?>
          </li>
          <li>
            <?php echo $this->Html->link('Ambientes', array('controller' => 'ambientes', 'action' => 'index', 'admin' => true), array('alt' => '', 'title' => '')); ?>           
            </li>
           
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
            <?php
                $valor = $this->Session->read('Auth.User');  //Retorna o array com o id, nome do usuário e password.
              ?>
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $valor['username']?> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li>
                    <?php echo $this->Html->link('Dados pessoais', array('controller' => 'users', 'action' => 'index', 'admin' => true), array('alt' => '', 'title' => '')); ?>
                </li>
                <li role="separator" class="divider"></li>
                <li>
                  <?php
                      echo $this->Html->link('Sair', array('controller'=>'users', 'action' => 'logout'));
                  ?>
                </li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
        
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="list-group lis">
                        <a  class="list-group-item active">Categorias</a> 
                        <?php echo $this->Html->link('Projetos', array('controller' => 'projetos', 'action' => 'index', 'admin' => true), array('class' => 'list-group-item','alt' => '', 'title' => '')); ?>

                        <?php echo $this->Html->link('Ambientes', array('controller' => 'ambientes', 'action' => 'index', 'admin' => true), array('class' => 'list-group-item','alt' => '', 'title' => '')); ?>
                        <?php echo $this->Html->link('Dados pessoais', array('controller' => 'users', 'action' => 'index', 'admin' => true), array('class' => 'list-group-item', 'alt' => '', 'title' => '')); ?>                        
                    </div>
                </div>
                
                <div class="col-md-9">
                 <?php //echo $this->Flash->render(); ?>
                    <?php echo $this->fetch('content'); ?>
                </div>
            </div>
            <footer>
                <div class="row">
                    <div class="col-md-12">   
                        <p>Copyright © Lima Móveis - 2016</p>
                    </div>
                </div>
            </footer>
        </div>        
    </body>
    <?php 
    //echo $this->element('sql_dump'); ?>
</html>