<?php
class Subscription extends AppModel
{
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

      $this->recursive = -1;

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
