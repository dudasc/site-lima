<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <?php
        echo $this->Html->image('04.jpg', array('alt' => ''));
      ?>

      <div class="carousel-caption">
        
      </div>
    </div>
    <div class="item">
     <?php
      echo $this->Html->image('05.jpg', array('alt' => ''));
      ?>

      <div class="carousel-caption">
      
      </div>
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!-- Page Content -->
<div class="container">
    <!-- Marketing Icons Section -->
    <div class="row">
    <br><br>
      <div class="col-md-offset-1"></div>
        <div class="col-md-6">
         <h3>Projetos</h3>
          <a href="projetos">         
            <ul class="demo-2 effect">
              <li class="texto">
                <h2>Conheça nossos projetos!</h2>
                <p>Saiba mais sobre os detalhes de nossos projetos feito exclusivamente para sua casa ou seu negócio. </p>
              </li>
              <li>
                <?php
                  echo $this->Html->image('cp01.jpg', array('class' => 'img-responsive top', 'alt' => ''));
                  ?>
                </li>
            </ul>      
          </a>
        </div>   
        <div class="col-md-6">
          <h3>Orçamento</h3>
          <a href="orcamentos">
            <ul class="demo-2 effect">
              <li class="texto">
                <h2>Solite um orçamento!</h2>
                <p>Acesse e preencha nosso formulário com seus dados e solicite um orçamento gratuito. </p>
              </li>
              <li>
              <?php
                echo $this->Html->image('cp02.jpg', array('class' => 'img-responsive top', 'alt' => ''));
              ?>
              </li>
            </ul>    
          </a>
        </div>      
      </div>
    </div>