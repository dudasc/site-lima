<div class="row">
  <div class="col-md-4">
  <?php
    echo $this->Form->create(
      'User',
      array(
        'url' => array(
          'controller' => 'Users',
          'action'     => 'login'
        )
      )
    );
  ?>
    <div class="form-group">
      <label for="exampleInputEmail1">Login</label>    
      <?php 
        echo $this->Form->input('username', array('label' => false,'class' => 'form-control','placeholder'=>"Nome de usuário", 'type' => 'text', 'required' => 'required'));
        ?>    
    </div>

    <div class="form-group">
      <label class="control-label" for="inputPassword">Senha</label>
      <div class="controls">
      <?php 
  	   echo $this->Form->input('password',array('label' => false,'type'=>'password', 'class' => 'form-control', 'placeholder'=>'Senha', 'id'=>"inputPassword", 'required' => 'required'));?>      
      </div>
    </div> 
    
    <?php  
      echo $this->Form->submit('Entrar', array('type' => 'submit', 'class'=>'btn btn-info btn-block'));
    ?>    
  </div>
</div>
