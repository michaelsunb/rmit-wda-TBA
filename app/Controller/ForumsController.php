<?php
class ForumsController extends AppController
{
   public $helpers = array('Html','Form');
   /*Allow non logged in users to view*/
   public function beforeFilter()
   {
      parent::beforeFilter();
      $this->Auth->allow('view');
   }
  /*Should allow users who own admin forum to edit delete and all users to create
    , not currently working fully*/
   public function isAuthorized($user)
   {
      if ($this->action === 'create') {
         return true;
      }

      if (in_array($this->action, array('edit', 'delete'))) {
         $forumId = $this->request->params['pass'][0];
		 /*This is not implemented within the function always returns true*/
         if ($this->Forum->isOwnedBy($forumId, $user['id'])) {
            return true;
         }
      }

      return parent::isAuthorized($user);
   }
   
   public function create($band_id = null)
   {  /*Check the bandid isnt null*/
      if(!$band_id)
      {
	     /*BAnd is selected*/
         $this->loadModel('Band');
         $bands = $this->Band->find('list', array(
          'fields' => array('Band.id', 'Band.band_name')));
         $this->set(compact('bands'));
      }
      else{
	     /*This is for a dropdown list of bands if one is not specified*/
         $this->set('bands', null);
         $this->set('band', $band_id);
      }
      /*Create and save the forum, redirect to users index*/
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
      /*Check thread id isnt null and hat thread exists*/
      if(!$thread_id || !$this->Forum->findById($thread_id))
      {
         $this->redirect(array("controller" => "users",
                   "action" => "index"));
      }
	  /*Delete and redirect*/
      $this->Forum->delete($thread_id, $cascade = true);
      return $this->redirect(array('action' => 'adminForums'));
   }

   public function view($thread_id = null, $sort = null)
   {
      /*view the thread, check it exists and value has been passed in*/
      $this->loadModel('Post');
      if (!$thread_id || !$this->Forum->findById($thread_id))
      {
         $this->redirect(array("controller" => "users",
                   "action" => "index"));
      }
      /* find all posts for thread and set vars*/
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
      /*check id isnt null*/
      if (!$id)
      {
         $this->redirect(array("controller" => "users",
                "action" => "index"));
      }
      /*find and make sure it exists*/
      $forum = $this->Forum->findById($id);
      if (!$forum)
      {
         $this->redirect(array("controller" => "users",
                "action" => "index"));
      }
      /*if the req is post save validate and redirect*/
      if ($this->request->is('post')) {
         $this->Forum->id = $id;
         if ($this->Forum->save($this->request->data)) {
            return $this->redirect(array('controller'=>'users','action' => 'index'));
         }
      }
      /*otherwise populate the form with the current forums data*/
      if (!$this->request->data) {
         $this->request->data = $forum;
      }
   }
}

