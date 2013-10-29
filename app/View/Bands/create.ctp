<!-- File: /app/View/Bands/create.ctp -->

<?echo $this->Html->script('validateAddBand.js');?>

	  <div class="list-container">
		 <div class="list-container-side">
		<!--Form for registering -->	
			<h2 style="padding-top:0px">Add Band</h2>
                        <?= $this->Form->create('Band', array('id' => 'registerBandForm')); ?>
			</br>
			<h4 style="padding-top:0px">Band Name</h4>
                        <?= $this->Form->input('band_name', array('name'=>'band_name', 'id' => 'band_name', 'label' => false, )); ?>
			<span id="bandNameError" style="color:red"></span>
 		  	</br>
			<h4 style="padding-top:0px">Genre</h4>       
                     	<?= $this->Form->input('genre_id', array('type' => 'select', 'name'=>'genre_id', 'label' => false, 'options' => $genres, 'empty' => '')); ?>
			<span id="genreError" style="color:red"></span>
		   	</br>
			<h4 style="padding-top:0px">Band Info</h4>       
                     	<?= $this->Form->input('band_info', array('name'=>'band_info', 'label' => false)); ?>
      		 	<span id="bandInfoError" style="color:red"></span>
  		 	</br>
			<h4 style="padding-top:0px">Official Site</h4>
			<?= $this->Form->input('official_site', array('name'=>'official_site', 'label' => false)); ?>
			<span id="officialWebError" style="color:red"></span>
   			</br>
			<h4 style="padding-top:0px">Facebook</h4>
                        www.facebook.com/
			<?= $this->Form->input('facebook', array('name'=>'facebook', 'label' => false)); ?>
			<span id="facebookError" style="color:red"></span>
  		 	</br>
			<h4 style="padding-top:0px">Twitter</h4>
                     	www.twitter.com/
			<?= $this->Form->input('twitter', array('name'=>'twitter', 'label' => false)); ?>
			<span id="twitterError" style="color:red"></span>
  			</br>

			<?= $this->Form->input('Register Band', array('type'=>'button', 'id'=>'registerBandJs',
                                'label' => false, 'style' => array('display:none'), 'onclick' => 'registerBand();'));?>
			<?= $this->Form->input('Register Band', array('type'=>'submit', 'id'=>'registerBandPhp',
                                'label' => false));?>

			<?= $this->Form->end();?>

		<?php echo $this->Html->link("Back", array('controller' => 'bands','action'=> 'index')); ?>
		</div>
   </div>

