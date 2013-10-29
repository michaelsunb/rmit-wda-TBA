<?php
class PostsController extends AppController
{

  public $helpers = array('Html','Form');

  public function isAuthorized($user) {
    if ($this->action === 'create') {
        return true;
    }
    if (in_array($this->action, array('edit', 'delete'))) {
        $postId = $this->request->params['pass'][0];
	    /*This is not implemented within the function always returns true*/
        if ($this->Post->isOwnedBy($postId, $user['id'])) {
            return true;
        }
    }
    return parent::isAuthorized($user);
  }

  public function create($thread_id)
  {
    /*Thread id for the post is set for the html to view*/
    $this->set('thread_id', $thread_id);
	/*If the request is post create the post and save it to db*/
    if($this->request->is('post'))
    {
      $this->Post->create();
      if($this->Post->save($this->request->data))
      {
         return $this->redirect(array('controller' => 'forums',
                                   'action' => 'view', $thread_id));
      }
    }
  }

  public function delete($post_id = null)
  {
    /*Find the post anf check it exists*/
    $post = $this->Post->findById($post_id);
    if(!$post_id || !$post)
    {
        $this->redirect(array("controller" => "user",
                      "action" => "index"));
    }
	/*Delete Post and redirect to the forum for the post*/
    $thread_id = $post['Post']['thread_id'];
    $this->Post->delete($post_id);
    return $this->redirect(array('controller' => 'forums','action' => 'adminPosts', $thread_id));
  }

  public function edit($post_id)
  {
      /*if no post id redirect back*/
      if (!$post_id)
      {
           $this->redirect(array("controller" => "user",
                      "action" => "index"));
      }
	  /*Check post exists*/
      $post = $this->Post->findById($post_id);
      $this->set('thread_id', $post['Post']['thread_id']);
      if (!$post)
      {
           $this->redirect(array("controller" => "user",
                      "action" => "index"));
      }
	  /*if the req is post update the data  and redirect*/
      if ($this->request->is('post'))
      {
          $this->Post->id = $post_id;
          if ($this->Post->save($this->request->data)) {
              return $this->redirect(array('controller' => 'forums',
                                           'action' => 'view',
                                           $post['Post']['thread_id']));
          }
      }
	  /*otherwise update the req data to contain the posts to edit populate the form*/
      else if (!$this->request->data) {
        $this->request->data = $post;
      }
  }
}
