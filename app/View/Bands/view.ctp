<!-- File: /app/View/Bands/view.ctp -->
<div class="list-container-side">
   <h2 style="padding-top:0px"><?= $band['Band']['band_name']; ?></h2>
   <h4 style="padding-top:4px"><?= $band['Genre']['name']; ?></h4>
   <h4 style="padding-top:0px">Band Bio</h4>
   <p><?= $band['Band']['band_info'] ?></p>
   <h4 style="padding-top:0px">Albums</h4>
   <ul>
   <?
   foreach($band['Album'] as $album)
   {
      echo $album['name']."|".$album['year'];
      if($admin >= 2)
      {
         echo "|";
         echo $this->Html->link("Edit" , array('controller' => 'albums',
            'action' => 'edit', $album['id']));
         echo "|";
         echo $this->Html->link("Delete" , array('controller' => 'albums',
            'action' => 'delete', $album['id']));
      }
      echo "<br>";
   }
   echo "<br>";
   if($admin >= 2)
   {
      echo $this->Html->link("Create Album" , array('controller' => 'albums', 
         'action' => 'create', $band['Band']['id']));
   }
   ?>
   </ul>
</div>
<?php
if($band['Band']['official_site'] or $band['Band']['twitter']
   or $band['Band']['facebook'])
{
?>
<div class="list-container-side">
   <h4 style="padding-top:0px">Links</h4>
   <ul>
   <?php
   if($band['Band']['official_site'])
   {
      echo "Official Site: ";
      echo $this->Html->link($band['Band']['official_site'] , $band['Band']['official_site']);
      echo "<br>";
   }
   if($band['Band']['twitter'])
   {
      echo "Twitter: ";
      echo $this->Html->link($band['Band']['twitter'] ,$band['Band']['twitter']);
      echo "<br>";
   }
   if($band['Band']['facebook'])
   {
      echo "Facebook: ";
      echo $this->Html->link($band['Band']['facebook'] , $band['Band']['facebook']);
      echo "<br>";
   }
   if($admin == 0 )
   {
      echo $this->Html->link("Subscribe" , array('controller' => 'bands', 
         'action' => 'subscribe', $band['Band']['id']));
   }
   ?>
   </ul>
</div>
<?php } ?>
<div class="forum-container">
   <h3>Band Forum</h3>
   <?php
   foreach ($band['Forum'] as $forum)
   {
      echo "<div class='list-inner'>";
      echo $this->Html->link($forum['thread_title'], array(
         'controller' => 'forums',
         'action' => 'view',
         $forum['id'])
         );
      if($admin >= 2)
      {
         echo "|";
         echo $this->Html->link('Edit', array(
            'controller' => 'forums',
            'action' => 'edit',
            $forum['id'])
            );
         echo "|";
         echo $this->Html->link('Delete', array(
            'controller' => 'forums',
            'action' => 'delete',
            $forum['id'])
            );
      }
      echo "</div>";
   }
   ?>
</div>
<?php echo $this->Html->link("Create Thread", array(
   'controller' => 'forums',
   'action' => 'create',
   $band['Band']['id'])
   ); ?>