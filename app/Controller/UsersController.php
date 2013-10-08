<?php
class UsersController extends AppController
{
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add'); // Letting users register themselves
    }

    public function index($screen_name = null)
    {
        $this->set('screen_name', $screen_name);
    }

    public function login() {
        if ($this->request->is('post')) {

        debug($this->Auth->request->data['Users']['password']);
        debug($this->Auth->request->data['Users']['username']);
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirect());
            }
            $this->Session->setFlash(__('Invalid username or password, try again'));
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }
}

