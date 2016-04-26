<footer id="footer">
<div class="container-fluid a">
    <div class="container">
        <div class="row">
        <ul class="menu-footer">
            <li><?php echo $this->Html->link('Página inicial', array('controller' => 'pages', 'action' => 'index'), array('title' => 'Home')); ?></li>
                            <li><?php echo $this->Html->link('Sobre', array('controller' => 'pages', 'action' => 'sobre'), array('title' => 'Sobre a empresa')); ?></li>

                            <li><?php echo $this->Html->link('Show-room', array('controller' => 'ambientes', 'action' => 'index'), array('title' => 'Ambientes')); ?></li>

                            <li><?php echo $this->Html->link('Projetos', array('controller' => 'projetos', 'action' => 'index'), array('title' => 'Conheça nossos projetos')); ?></li>

                            <li><?php echo $this->Html->link('Orçamento', array('controller' => 'orcamentos', 'action' => 'index'), array('title' => 'Solicite seu orçamento online')); ?></li>

                            <li><?php echo $this->Html->link('Contato', array('controller' => 'contatos', 'action' => 'index'), array('title' => 'Entre em contato')); ?></li>
        </ul>
          <ul>
             <li><a href="http://www.limamoveissobmedida.com.br/admin" target="_blank">Intranet</a></li> -
         <li><a href="http://webmail.hostinger.com.br" target="_blank">Webmail</a></li>
        </ul>
        	
      </div>
    </div>
  </div>
  <div class="container-fluid b">
    <div class="container">
      <p>Copyright &copy; Lima Móveis - 2016<br>
          <span>desenvolvimento: esc</span>
        </p>
    </div>
  </div>
</footer>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-74660796-1', 'auto');
  ga('send', 'pageview');

</script>