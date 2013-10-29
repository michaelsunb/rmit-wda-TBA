<div class="list-container-side">
    <div class="list-container">
        <? if($my_id){ echo "Welcome ";} ?><?= $user['User']['username'];?>
        <? if(!$my_id){ echo " profile";} ?>
        <div>
            <h1>SUBSCRIBED BANDS</h1>
            <div>
                <?php
                foreach($subs as $sub)
                {  
                    echo $this->Html->link(
                        $sub['Band']['band_name']
                        ,array('controller' => 'bands'
                            ,'action' => 'view',
                            $sub['Band']['id']));
                    ?> - <?
                    echo $sub['Role']['role'];
                    echo " - ";
                    echo $sub['Band']['created'];
                    echo "<br>";
                }
                ?>

            </div>
            <div>
                <h1>NEW BANDS</h1>
                <?php
                foreach($recent as $band)
                {
                    echo $this->Html->link(
                        $band['Band']['band_name']
                        ,array('controller' => 'bands'
                            ,'action' => 'view',
                            $band['Band']['id']));
                    echo " - ";
                    echo $band['Band']['created'];
                    echo "<br>";
                }
                ?>
                <?php ?>
            </div>
        </div>
    </div>
</div>
<div class="list-container-side">
<? if($my_id): ?>
   <?= $this->Html->link("Create Band", array('controller' => 'bands','action' => 'create')); ?>
   <br />
<? endif; ?>
   <?= $this->Html->link("Bands", array('controller' => 'bands','action' => 'index')); ?>
</div>
