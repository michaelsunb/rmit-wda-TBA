<?php
App::uses('AppController', 'Controller');

class LoginregisterController extends AppController {

	public $helpers = array('Html', 'Form', 'Session');
	public $components = array('Session');

	/*Set pages to view by non logged in user*/
   public function beforeFilter() {
      parent::beforeFilter();
      $this->Auth->allow('add', 'index');
   }

   public function index()
   {
   }
   /*Function for adding a user creating a user*/
   public function add()
   {
      /*If req is post set all the user data validate ad save to db*/
      if ($this->request->is('post')) {
         $this->loadModel('User');
         $this->User->create();
         $data = array('user_email' => $this->request->data['registerEmail'],
                       'username' => $this->request->data['registerUsername'],
                       'password' => $this->request->data['registerPassword'],
                       'registerPasswordConfirm' => $this->request->data['registerPassword']);
         if ($this->User->save($data,true)) {
            $this->Session->setFlash(__('The user has been saved'));
            return $this->redirect(array('controller'=>'users','action' => 'login'));
         }
         $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
      }
      return;
   }
}


?>
