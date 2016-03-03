<h1>DADOS PESSOAIS</h1>
<br>
<p>

<strong>Usuário: </strong><?php  echo $usuario['User']['username']?><br />
<strong>Senha: </strong>******

</p>
<p>
  <?php echo $this -> Html -> link("Clique aqui", array('controller' => 'users', 'action' => 'edit', 'admin' => true)); ?>
  para alterar seus dados.
</p>