<?php
class Album extends AppModel
{
   /*Setting database up for easier table joins, Albums belong to bands.. etc*/
   public $belongsTo = array('Band' => array('foreignKey' => 'band_id'));

   public function isOwnedBy($album, $user)
   {
        return true;
		/*Not implemented, this does mean that anyone can edit anything at the moment
		If we were to want only admins band admins or owners of pages posts etc 
		editing thier own posts this is where we would determine this.*/
   }
}
?>

