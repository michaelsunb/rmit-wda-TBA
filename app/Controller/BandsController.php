
<?php
class BandsController extends AppController
{
  public $helpers = array('Html','Form');

  public function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow('view');
  }

  public function isAuthorized($user) {
    if ($this->action === 'create') {
        return true;
    }
    if($this->action === 'subscribe')
    {
       return true;
    }
/*
    if (in_array($this->action, array('edit', 'delete'))) {
        $bandId = $this->request->params['pass'][0];
        if ($this->Band->isOwnedBy($bandId, $user['id'])) {
            return true;
        }
    }*///Havnt implemented a way to edit or delete bands yet

    return parent::isAuthorized($user);
}

    function create()
    {
        $this->loadModel('Genre');
        $genres = $this->Genre->find('list', array(
        'fields' => array('Genre.id', 'Genre.name')));
        $this->set(compact('genres'));

        if($this->request->is('post'))
        {
            $this->Band->create();
            if($this->Band->save($this->request->data))
            {
                if (CakeSession::read('Auth.User.id'))
                {
                    $this->loadModel('Subscription');
                    $sub_data = array("user_id" => CakeSession::read('Auth.User.id'), 
                                      "band_id" => $this->Band->id,
                                      "role_id" => 2);
                    $this->Subscription->save($sub_data);
                }

                return $this->redirect(array('action' => 'view',
                $this->request->data('id')));
            }
        }
    }

   function view($band_id = null)
   {
      if($band_id == null)
      {
        return $this->redirect(array('controller' => 'users',
                      'action' => 'index',CakeSession::read('Auth.User.id')));
      }

      $this->set('band', $this->Band->findById($band_id));
   }

   function subscribe($band_id = null)
   {
      $user_id = CakeSession::read('Auth.User.id');
      if($band_id == null)
      {
        return $this->redirect(array('controller' => 'users',
                      'action' => 'index',$user_id));
      }

      $this->loadModel('Subscription');
      $this->Subscription->set(array('band_id' => $band_id,
                                   'user_id' => $user_id,
                                   'role_id' => 1));
      $this->Subscription->save();
   }
}
?>
