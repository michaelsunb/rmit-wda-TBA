<!-- File: /app/View/Forums/create.ctp -->

<h1>Create Thread</h1>

<?php
echo $this->Form->create('Forum');
echo $this->Form->input('thread_title');
if($bands != null)
{
   echo $this->Form->input('band_id', array('type' => 'select', 'options' => $bands));
}
else
{
   echo $this->Form->input('band_id', array('type' => 'hidden', 'value' => $band));
}
echo $this->Form->end('Create Forum');
?>
 
<?php echo $this->Html->link("Back", array('controller' => 'bands','action'=> 'view',$band)); ?>
