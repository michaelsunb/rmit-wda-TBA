<div class="forum-container">
   <h3>Bands</h3>
   <?php
   foreach ($searches as $key => $value)
   {
      echo "<div class='list-inner'>";
      foreach($value as $title => $info)
      {
         echo $this->Html->link($title, array(
            'controller' => 'bands',
            'action' => 'view',
            $key)
            );
         echo " - ".$info;
      }
      echo "</div>";
   }
   ?>
</div>