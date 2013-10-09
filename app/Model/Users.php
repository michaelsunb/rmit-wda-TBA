<?
App::uses('AuthComponent', 'Controller/Component');
class Users extends AppModel {

   function equalToField($field=array(),$compare_field=null) {
      foreach($field as $key=>$value){
         $v1 = $value;
         $v2 = $this->data[$this->name][$compare_field];
         if($v1 !== $v2) {
            return false;
         } else {
            continue;
         }
      }
      return true;
   }

   public function beforeSave($options = array()) {
	$users = $this->data[$this->alias];
	unset($users['registerPasswordConfirm']);

	if($this->isUnique($users,'user_email') &&
		$this->isUnique($users,'username'))
	{
        	$this->data[$this->alias]['password'] = 
			AuthComponent::password($this->data[$this->alias]['password']);
	        return true;
	}
	return false;
	//print_r($this->data[$this->alias]);
   }

   public $validate = array(
      'username' => array(
         'required' => array(
            'rule' => array('notEmpty'),
            'message' => 'You must enter a username'
         ),
         'pattern'=>array(
            'rule'      => '/^[A-Za-z]{6,}./i',
            'message'   => 'Username must begin with a letter be at least six characters long',
         )
      ),
      'password' => array(
         'required' => array(
            'rule'      => array('minLength', '8'),
            'message'   => 'Password must begin with a letter and be at least six characters long',
            'allowEmpty' => false
         )
      ),
      'registerPasswordConfirm' => array(
         'required' => array(
            'rule'      => array('equalToField', 'password'),
            'message'   => 'Passwords do not match'
         )
      ),
      'user_email' => array(
         'required' => array(
            'rule' => array('notEmpty'),
            'message' => 'You must enter an email address'
         ),
         'pattern'=>array(
            'rule'      => '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i',
            'message'   => 'Invalid email address',
         )
      )
   );
}
