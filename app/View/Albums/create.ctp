   <div class="list-container">
		 <div class="list-container-side">
			<h2 style="padding-top:0px">Add Album</h2>
                        <?= $this->Form->create('Album'); ?>
			<br>
			<?= $this->Form->input('name'); ?>
         <?= $this->Form->input('year'); ?>		
         <?= $this->Form->hidden('band_id',array('value' => $band_id)); ?>
			<?= $this->Form->end("Create");?>

		<?php echo $this->Html->link("Back", array('controller' => 'bands','action'=> 'view', $band_id)); ?>
		</div>
   </div>