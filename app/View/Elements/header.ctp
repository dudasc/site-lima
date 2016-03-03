

<header id="header">
    <div class="container">
    <!--
        <div class="row">
            <ul class="contact-area">
                <li class="btn-lg"><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> (48) 3536-1154</li>
                <li class="btn-lg"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> contato@limamoveis.com.br</li>
            </ul>
        </div>
-->
        <div class="row">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>


                        <a class="navbar-brand logo" href="http://www.limamoveissobmedida.com.br">
                            <?php echo $this->Html->image('logo.png', array('alt' => 'Lima Móveis - Ambientes planejados', 'class' => 'img-responsive')); ?>
                            LIMA MÓVEIS <br><span class="sub">Ambientes planejados </span>
                      </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right" >
                      <!--  <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                          <?php
                          /*  foreach($ambientes as $item):
                                echo '<li>';
                    echo $this->Html->link($item['Ambiente']['nome'], array('controller'=>'ambientes', 'action' => 'index', 'id' => $item['Ambiente']['id'], 'titulo' => Inflector::slug(strtolower($item['Ambiente']['nome']))), array('class'=>'list-group-item', 'escape'=> false));

                                echo '</li>';
                                endforeach;*/
                            ?>
                          </ul>
                        </li>-->
                        <li><?php echo $this->Html->link('PÁGINA INICIAL', array('controller' => 'pages', 'action' => 'index'), array('title' => 'Home')); ?></li>
                            <li><?php echo $this->Html->link('SOBRE', array('controller' => 'pages', 'action' => 'sobre'), array('title' => 'Sobre a empresa')); ?></li>

                            <li><?php echo $this->Html->link('SHOW-ROOM', array('controller' => 'ambientes', 'action' => 'index'), array('title' => 'Ambientes')); ?></li>

                            <li><?php echo $this->Html->link('PROJETOS', array('controller' => 'projetos', 'action' => 'index'), array('title' => 'Conheça nossos projetos')); ?></li>

                            <li><?php echo $this->Html->link('ORÇAMENTO', array('controller' => 'orcamentos', 'action' => 'index'), array('title' => 'Solicite seu orçamento online')); ?></li>

                            <li><?php echo $this->Html->link('CONTATO', array('controller' => 'contatos', 'action' => 'index'), array('title' => 'Entre em contato')); ?></li>

                            <li>
                                <a href="https://www.facebook.com/lima.moveis.33" title ="Acesse nossa página no facebook!" target="_blank">
                            <?php echo $this->Html->image('face-icon.png', array('alt' => 'Acesse nossa página no facebook!', 'class' => 'img-responsive face-icon')); ?>
                      </a>
                            </li>
                        </ul>
                        
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>