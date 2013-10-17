<div class="forum-container">
   <h3>Bands</h3>
   <?php
   foreach ($bands as $key => $value)
   {
      echo "<div class='list-inner'>";
      echo $this->Html->link($bands[$key]['Band']['band_name'],
         array('controller'=>'bands','action'=>'view',
         $bands[$key]['Band']['id']));
      echo " - ";
      echo $bands[$key]['Band']['band_info'];
      echo "</div>";
   }
   ?>
</div>
