<?php
class Band extends AppModel {
   /*Setting database up for easier table joins, Albums belong to bands.. etc*/
   public $hasMany = array('Subscription' => array('foreignKey' => 'band_id', 'dependent' => true),
                           'Forum' => array('foreignKey' => 'band_id', 'dependent' => true),
                           'Album' => array('foreignKey' => 'band_id', 'dependant' => true));
   public $belongsTo = array('Genre' => array('foreignKey' => 'genre_id'));

public $validate = array(
	'band_name' => array(
		'required' => array(
                        'rule' => array('notEmpty'),
                        'message' => 'You must enter a Band Name'
                 	)
		),

	'genre_id' => array(
		'required' => array(
			'rule' => array('notEmpty'),
			'allowEmpty' => false,
			'message' => 'You must select a genre'
			)	
		)

	);

   public function isOwnedBy($post, $user)
   {
      return true;
	  /*Not implemented, this does mean that anyone can edit anything at the moment
	  If we were to want only admins band admins or owners of pages posts etc 
      editing thier own posts this is where we would determine this.*/
   }

}
?>
