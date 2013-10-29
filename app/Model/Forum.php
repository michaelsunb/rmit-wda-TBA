<?php
class Forum extends AppModel
{
   /*Setting database up for easier table joins*/
   public $hasMany = array('Post' => array('foreignKey' => 'thread_id', 'dependent' => true));
   public $belongsTo = array('Band' => array('className' => 'Band', 'foreignKey' => 'band_id'));

   public function isOwnedBy($post, $user)
   {
      return true;
		/*Not implemented, this does mean that anyone can edit anything at the moment
		If we were to want only admins band admins or owners of pages posts etc 
		editing thier own posts this is where we would determine this.*/
   }
}
?>
