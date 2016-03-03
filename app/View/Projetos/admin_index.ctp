<h1>PROJETOS</h1>
<?php
echo $this->Html->link('Cadastrar novo Projeto', array('controller'=>'Projetos', 'action' => 'add', 'admin' => true));
?>
<br><br>
<?php echo $this->Session->flash(); ?>
<table class="table table-striped table-hover table-bordered">
    <thead>
        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Editar</th>
            <th>Fotos do álbum</th>
            <th>Excluir</th>
        </tr>
    </thead>
    <tbody>
	<?php 
        foreach($projetos as $item): 
            echo '<tr>';
            echo '<td>'.$item['Projeto']['id'].'</td>';
            echo '<td>'.$item['Projeto']['nome'].'</td>';
   			echo '<td>'.$this->Html->link('Editar', array('controller'=>'projetos', 'action' => 'add', 'id' => $item['Projeto']['id'], 'admin' => true));
            echo '<td>'.$this->Html->link('Visualizar', array('action' => 'fotos', 'id' => $item['Projeto']['id'], 'admin' => true));
            echo '<td>'.$this->Html->link('Excluir', array('controller'=>'projetos', 'action' => 'delete','admin' => true, 'id' => Inflector::slug($item['Projeto']['id'])), array('confirm'=>'Deseja excluir o projeto e todas suas imagens?'));            
            echo '</tr>';
		endforeach;
        ?>
	
    </tbody>
</table>