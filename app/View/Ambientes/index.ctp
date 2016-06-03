<script type="text/javascript">
    $(document).ready(function () {
        $('#select-ambiente').on('change', function () {
            var langVal = $(this).val();
            var http = location.protocol;
            var slashes = http.concat("//");
            var host = slashes.concat(window.location.hostname);
            window.location = host + "/ambientes/" + langVal;
        });
    });
</script>
<div class="container-fluid top-page">			
    
    <div class="container">
        <div class="row">
        <h1 class="page-header texdt-center">Ambientes</h1>
    
            <p class="text-cednter">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde.</p>
            <br>
            <p class="text-center">Selecione o ambiente desejado no menu abaixo.</p>
            <div class="col-md-4 col-md-offset-4" >

                <form >
                    <select class="form-control" id="select-ambiente">
                        <option>Selecione...</option>
                        <?php
                        foreach ($ambientes as $item):
                            echo '<option value="' . $item['Ambiente']['id'] . "/" . Inflector::slug(strtolower($item['Ambiente']['nome'])) . '">';
                            echo $item['Ambiente']['nome'];
                            //echo $this->Html->link($item['Ambiente']['nome'], array('controller'=>'ambientes', 'action' => 'index', 'id' => $item['Ambiente']['id'], 'titulo' => Inflector::slug(strtolower($item['Ambiente']['nome']))), array('class'=>'list-group-item', 'escape'=> false));
                            echo '</option>';
                        endforeach;
                        ?>					  
                    </select>
                </form>
            </div>
        </div>
        <div class="row">
            <h2 class="text-center"><?php echo $ambiente['Ambiente']['nome']; ?></h2>  
            <br>  
        </div>
 
<?php if(!empty($ambiente)){?>
    <div class="row fotos-ambientes">
        <?php
        foreach ($ambiente as $fotos) {
            
        }

        //if(count($fotos) >= 0){	 
        foreach ($fotos as $item):
            echo '<div class="col-sm-6 col-md-3 col-xs-12 col-lg-2 thumb">';
            $thumb = $this->Html->image("uploads/fotos/ambientes/small_" . $item['nome'], array('alt' => '', 'title' => '', 'class' => 'img-responsive img-hover',));
            $foto = "../../img/uploads/fotos/ambientes/" . $item['nome'];
            //$thumb = 'http://placehold.it/750x450';
            echo '<a href="' . $foto . '" class="thumbnail lightview" 
					    	data-lightview-group="example"
				 			data-lightview-title="' . $item['descricao'] . '"
				 			data-lightview-caption="">' . $thumb . '</a>';
            echo '</div>';
        endforeach;
        //}else{
        ///	echo '<p>Não há fotos para mostrar</p>';
        //}
        ?>         
    </div>

  <?php }?>
  </div>
  </div>
