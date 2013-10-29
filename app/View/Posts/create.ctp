<!-- File: /app/View/Posts/create.ctp -->

<h1>Create post</h1>

<?php
echo $this->Form->create('Post');
echo $this->Form->input('content', array('rows' => '6'));
echo $this->Form->hidden('thread_id', array('value' => $thread_id));
echo $this->Form->hidden('user_id', array('value' => 1));
echo $this->Form->end('Save Post');


echo $this->Html->link(
    'Back',
    array('controller' => 'forums', 'action' => 'view', $thread_id)
);
?>
