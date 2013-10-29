<?php
class UsersController extends AppController
{
    public $components = array('Session');

		  /*Dertermine what pages in this controller users are allowed toi view
		  logged in and not.*/
    public function isAuthorized($user) {
      if ($this->action === 'index' ||
            $this->action === 'logout') {
          return true;
      }
      return parent::isAuthorized($user);
    }

	/*Index page function*/
   public function index($user_id = null)
   {
      $my_id = false;
	  /* if no user id in params then check if one is in the request data*/
      if($user_id == null && isset($this->request->params['user_id']))
      {
         $user_id = $this->request->params['user_id'];
      }

	  /*If user is logged in use that id*/
      if($user_id == CakeSession::read('Auth.User.id'))
      {
         $my_id = true;
      }
      $this->set('my_id',$my_id);

	  /*Load models*/
      $this->loadModel('Subscription');
      $this->loadModel('Band');

	  /*get and set user info for display*/
      $user = $this->User->findById($user_id);
      $this->set(compact('user'));
      $subs = $this->Subscription->find('all', array(
      'conditions' => array('Subscription.user_id' => $user_id),
      'fields' => array('User.id',
         'User.username',
         'Band.id',
         'Band.band_name',
         'Role.role',
         'Band.created')));

      $this->set(compact('subs'));

	  /*Get Bands subscribed to and other info to display*/
      $recent = $this->Band->find('all', array('limit' => 10,
                        'order' => array('created' => 'desc')));
      $this->set(compact('recent'));

      }

	  /*Login page function*/
   public function login() {
      if ($this->request->is('post')) {
         if(isset($this->request->data['user']) &&
            isset($this->request->data['pass']))
         {
            $this->request->data = array('User' => array(
               'username' => $this->request->data['user'],
               'password' => $this->request->data['pass']));
            $this->Auth->request->data;
         }

         $this->Auth->request->data['User']['password'];
         $this->Auth->request->data['User']['username'];

         if ($this->Auth->login()) {
            return $this->redirect(array('controller' => 'users',
               'action' => 'index',
               CakeSession::read('Auth.User.id')));
         }
         $this->Session->setFlash(__('Invalid username or password, try again'));
      }
   }

   public function logout() {
      $this->Auth->logout();
      //return $this->redirect();
   }
}
?>
