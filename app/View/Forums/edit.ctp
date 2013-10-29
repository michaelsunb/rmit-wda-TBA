<!-- File: /app/View/Forums/edit.ctp -->

<h1>Edit Thread</h1>

<?php
   echo $this->Form->create('Forum');
   echo $this->Form->input('thread_title');
   echo $this->Form->input('band_id', array('type' => 'select', 'options' => $bands));
   echo $this->Form->end('Save Forum');
?>
