<!-- File: /app/View/Albums/create.ctp -->

   <div class="list-container">
                 <div class="list-container-side">
                        <h2 style="padding-top:0px">Edit Album</h2>
                        <?= $this->Form->create('Album'); ?>
                        <br>
                        <?= $this->Form->input('name'); ?>
                        <?= $this->Form->input('year'); ?>
                        <?= $this->Form->hidden('band_id',array('value' => $band_id)); ?>
                        <?= $this->Form->end("Edit");?>

                <?php echo $this->Html->link("Back", array('controller' => 'bands','action'=> 'index', $band_id)); ?>
                </div>
   </div>  
