<?php
class Subscription extends AppModel
{
   //public $hasMany = array('Band' => array('foreignKey' => 'id', 'dependent' => true),'User' => array('foreignKey' => 'id', 'dependent' => true));
   public $belongsTo = array('Band' => array('foreignKey' => 'band_id'),
                            'User' => array('foreignKey' => 'user_id'),
                            'Role' => array('foreignKey' => 'role_id'));

   public function beforeSave($options = array()){
      $data = $this->data[$this->alias];

      if($this->isUnique($data,array('band_id','user_id')))
      {
         return true;
      }
      return false;
   }

   function isUnique($params, $ids = "")
   {
      $query = array();

      // Set Recursive Seach mode.
      $this->recursive = -1;

      // Loop array of params building our our query array.
      foreach ($params as $field => $value)
      {
         foreach($ids as $id)
         {
            if($field == $id)
            {
               $query[$this->name . '.' . $id] = $value;
            }
         }
      }

      // Run the quer
      if ($this->hasAny($query))
      {
         return false;
      }
      else
      {
         return true;
      }
   }
}
?>
