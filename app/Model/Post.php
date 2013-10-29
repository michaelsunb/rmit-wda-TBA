<?php
class Post extends AppModel
{
   /*Setting database up for easier table joins, etc*/
   public $belongsTo = array('Forum' => array('foreignKey' => 'thread_id'),
                                          'User' => array('foreignKey' => 'user_id'));

   public function isOwnedBy($post, $user)
   {
      return true;
	  	/*Not implemented, this does mean that anyone can edit anything at the moment
		If we were to want only admins band admins or owners of pages posts etc 
		editing thier own posts this is where we would determine this.*/
   }
}
?>
