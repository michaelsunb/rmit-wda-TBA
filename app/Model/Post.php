<?php
class Post extends AppModel
{
   public $belongsTo = array('Forum' => array('foreignKey' => 'thread_id'),
                                          'User' => array('foreignKey' => 'user_id'));

   public function isOwnedBy($post, $user)
   {
      return true;
   }
}
?>
