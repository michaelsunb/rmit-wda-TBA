<?
App::uses('AuthComponent', 'Controller/Component');
class User extends AppModel {

   public $hasMany = array('Subscription' => array('foreignKey' => 'user_id', 'dependent' => true),
                           'Post' => array('foreignKey' => 'user_id', 'dependent' => true));

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
   }

   public $validate = array(
	'username' => array(
		'required' => array(
        		'rule' => array('notEmpty'),
			'message' => 'You must enter a username'
			),
      'pattern' => array(
			'rule' => '/^[a-zA-Z0-9]{6,}$/',
			'message' => 'Username can only contain alphanumeric characters'   
         )
      ),
      'password' => array(
         'required' => array(
            'rule' => array('notEmpty'),
            'message' => 'You must enter a password'
         ),
         'adequateLength' => array(
               'rule'      => array('minLength', '6'),
               'message'   => 'Password must be at least six characters long',
            ),
         'secure' => array(
            'rule' => array('checkPassword'),
            'message' => 
            'Password must contain an uppercase letter, a lowercase letter, a number and a non-alphanumeric character, and be at least six characters long.'
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

function checkPassword($passwordInput){
	$upperAlphaChars = '/[A-Z]/';
   $lowerAlphaChars = '/[a-z]/';
   $numbers = '/[0-9]/';
   $nonAlphaChars = '/\W|_/';

	$password = $passwordInput['password'];
	
	//Check password input against all expressions to make sure password is secure
	if(preg_match($upperAlphaChars , $password) && preg_match($lowerAlphaChars , $password) &&
			preg_match($numbers , $password) && preg_match($nonAlphaChars , $password)){
		return true;
   }
   else {
      return false;
   }
}	
	
}
