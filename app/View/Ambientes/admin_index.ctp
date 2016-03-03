<h1>AMBIENTES</h1>
<?php
echo $this->Html->link('Cadastrar novo ambiente', array('controller'=>'ambientes', 'action' => 'add', 'admin' => true));
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
        foreach($ambientes as $item): 
            echo '<tr>';
            echo '<td>'.$item['Ambiente']['id'].'</td>';
            echo '<td>'.$item['Ambiente']['nome'].'</td>';
   			echo '<td>'.$this->Html->link('Editar', array('controller'=>'ambientes', 'action' => 'add', 'id' => $item['Ambiente']['id'], 'admin' => true));
            echo '<td>'.$this->Html->link('Visualizar', array('controller'=>'ambientes', 'action' => 'fotos', 'id' => $item['Ambiente']['id'], 'admin' => true));
            echo '<td>'.$this->Html->link('Excluir', array('controller'=>'ambientes', 'action' => 'delete','admin' => true, 'id' => Inflector::slug($item['Ambiente']['id'])), array('confirm'=>'Deseja excluir o ambiente e todas as imagens relacionadas?'));            
            echo '</tr>';
		endforeach;
        ?>
	
    </tbody>
</table>