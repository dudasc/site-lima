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
    <div class="form-group">      
      <!-- Button trigger modal -->
      <a href="#" data-toggle="modal" data-target="#myModal">
        Esqueci minha senha</a>
      
    </div>
    
    <?php  
      echo $this->Form->submit('Entrar', array('type' => 'submit', 'class'=>'btn btn-info btn-block'));
      echo $this->Form->end();
    ?>    
  </div>
</div>

<!-- Modal Recuperação de senha-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Recuperar senha</h4>
      </div>
      <div class="modal-body">
        <?php
          echo $this->Form->create(
            'User',
            array(
              'url' => array(
                'controller' => 'Users',
                'action'     => 'recuperarSenha',
                'admin'      => false
              ),
            )    
          );
        ?>        

        <div class="form-group">
          <?php echo $this->Form->label('Email'); ?>
          <div class="input-group">
           <span class="input-group-addon">@</span>
            <?php echo $this->Form->input('email', array('label' => false, 'type' => 'email', 'class' => 'form-control  input-lg', 'id' => 'email_id')); ?>
          </div>
        </div>

      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <?php echo $this->Form->button('Enviar', array('type' => 'submit','class' => 'btn btn-default btn-info')); ?>
      <?php echo $this->Form->end();?>
   
      </div>
    </div>
  </div>
</div>
