<?php
App::uses('AppController', 'Controller');

class LoginregisterController extends AppController {

	public $helpers = array('Html', 'Form', 'Session');
	public $components = array('Session');

   //public function beforeFilter() {
   //   parent::beforeFilter();
   //   $this->Auth->allow('add');
   //}

   public function index(){
      //
   }

   public function view($id = null) {
      $this->loadModel('Users');
      $this->User->id = $id;
      if (!$this->User->exists()) {
         throw new NotFoundException(__('Invalid user'));
      }
      $this->set('user', $this->User->read(null, $id));
   }

   public function add() {
      if ($this->request->is('post')) {
         $this->loadModel('User');
         $this->User->create();
         $data = array('user_email' => $this->request->data['registerEmail'],
                        'username' => $this->request->data['registerUsername'],
                        'password' => $this->request->data['registerPassword'],
                        'registerPasswordConfirm' => $this->request->data['registerPassword']);
         if ($this->User->save($data,true)) {
            $this->Session->setFlash(__('The user has been saved'));
            return $this->redirect(array('controller'=>'index','action' => 'index'));
         }
         $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
      }
      return ;//$this->redirect(array('action' => 'index'));
   }
}


?>
