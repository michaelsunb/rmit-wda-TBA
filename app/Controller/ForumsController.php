<?php
class ForumsController extends AppController
{
   public $helpers = array('Html','Form');

   public function beforeFilter()
   {
      parent::beforeFilter();
      $this->Auth->allow('view');
   }

   public function isAuthorized($user)
   {
      if ($this->action === 'create') {
         return true;
      }

      if (in_array($this->action, array('edit', 'delete'))) {
         $forumId = $this->request->params['pass'][0];
         if ($this->Forum->isOwnedBy($forumId, $user['id'])) {
            return true;
         }
      }

      return parent::isAuthorized($user);
   }

   public function create($band_id = null)
   {
      if(!$band_id)
      {
         $this->loadModel('Band');
         $bands = $this->Band->find('list', array(
          'fields' => array('Band.id', 'Band.band_name')));
         $this->set(compact('bands'));
      }
      else{
         $this->set('bands', null);
         $this->set('band', $band_id);
      }

      if($this->request->is('post'))
      {
         $this->Forum->create();
         if($this->Forum->save($this->request->data))
         {
            return $this->redirect(array('controller'=>'users','action' => 'index'));
         }
      }
   }

   public function delete($thread_id = null)
   {
      if(!$thread_id || !$this->Forum->findById($thread_id))
      {
         $this->redirect(array("controller" => "users",
                   "action" => "index"));
      }
      $this->Forum->delete($thread_id, $cascade = true);
      return $this->redirect(array('action' => 'adminForums'));
   }

   public function view($thread_id = null, $sort = null)
   {
      $this->loadModel('Post');
      if (!$thread_id || !$this->Forum->findById($thread_id))
      {
         $this->redirect(array("controller" => "users",
                   "action" => "index"));
      }

      $posts = $this->Post->findAllByThreadId($thread_id);
      $this->set('forum', $thread_id);
      $this->set('posts', $posts);
   }

   public function edit($id = null)
   {
      $this->loadModel('Band');
      $bands = $this->Band->find('list', array(
         'fields' => array('Band.id', 'Band.band_name')));
      $this->set(compact('bands'));

      if (!$id)
      {
         $this->redirect(array("controller" => "users",
                "action" => "index"));
      }

      $forum = $this->Forum->findById($id);
      if (!$forum)
      {
         $this->redirect(array("controller" => "users",
                "action" => "index"));
      }

      if ($this->request->is('post') || $this->request->is('put')) {
         $this->Forum->id = $id;
         if ($this->Forum->save($this->request->data)) {
            return $this->redirect(array('controller'=>'users','action' => 'index'));
         }
      }

      if (!$this->request->data) {
         $this->request->data = $forum;
      }
   }

   // TODO
   public function search()
   {
   }

   private function sort()
   {
   }
}

