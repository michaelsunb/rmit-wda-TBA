<?
class User extends AppModel {
   public $validate = array(
      'username' => array(
         'required' => array(
            'rule' => array('notEmpty'),
            'message' => 'You must enter a username'
         )/*,
         'pattern'=>array(
            'rule'      => '/^[A-Za-z]{6,}./i',
            'message'   => 'Username must begin with a letter be at least six characters long',
         )*/
      ),
      'password' => array(
         'required' => array(
            'rule' => array('notEmpty'),
            'message' => 'You must enter a password'
         )/*,
         'pattern'=>array(
            'rule'      => '/^[A-Za-z]{6,}./i',
            'message'   => 'Password must begin with a letter and be at least six characters long',
         )*/
      ),
      'user_email' => array(
         'required' => array(
            'rule' => array('notEmpty'),
            'message' => 'You must enter an email address'
         )/*,
         'pattern'=>array(
            'rule'      => '/[^a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i',
            'message'   => 'Invalid email address',
         )*/
      )
   );
}