<?php
class Subscription extends AppModel
{
   //public $hasMany = array('Band' => array('foreignKey' => 'id', 'dependent' => true),'User' => array('foreignKey' => 'id', 'dependent' => true));
   public $belongsTo = array('Band' => array('foreignKey' => 'band_id'),
                            'User' => array('foreignKey' => 'user_id'),
                            'Role' => array('foreignKey' => 'role_id'));
}
?>
