<?php

class AlbumsController extends AppController
{
   public $helpers = array('Html','Form');
   /*Allow everyone to create and owners to edit and delete.*/
   public function isAuthorized($user) {
      if ($this->action === 'create') {
         return true;
      }

      if (in_array($this->action, array('edit', 'delete'))) {
         $albumId = $this->request->params['pass'][0];
		 /*This is not implemented within the function always returns true*/
         if ($this->Album->isOwnedBy($albumId, $user['id'])) {
            return true;
         }
      }

      return parent::isAuthorized($user);
   }

   public function create($band_id = null)
   {
      $this->set('band_id', $band_id);
	  /*MISSING check if band exists*/
	  /*set the band id for hidden value in form*/
      /*if the req is post save the Album for the band*/
      if($this->request->is('post'))
      {
         $this->Album->create();
         if($this->Album->save($this->request->data))
         {
            return $this->redirect(array('controller'=>'users','action' => 'index'));
         }
      }
   }

   function edit($band_id = null)
   {  /*Check band id isnt null*/
      if (!$band_id)
      {
         $this->redirect(array("controller" => "user",
            "action" => "index"));
      }
      /*set this for the hidden variable in form*/
      $this->set(compact('band_id'));
	  /*check album exists*/
      $album = $this->Album->findById($band_id);
      if (!$album)
      {
         $this->redirect(array("controller" => "user",
            "action" => "index"));
      }
	  /*is the req is post update the changes from the data, redirect*/
      if ($this->request->is('post')) {
         if ($this->Album->save($this->request->data)) {
            return $this->redirect(array('action' => 'index'));
         }
      }
	  /*if it is not post then populate the form with the album details*/
      if (!$this->request->data) {
         $this->request->data = $album;
      }
   }

   function delete($album)
   {
      /*Check album exists redirect if not*/
      if(!$album || !$this->Album->findById($album))
      {
         $this->redirect(array("controller" => "forums",
            "action" => "index"));
      }
	  /*delete the album and redirect*/
      $this->Album->delete($album, $cascade = true);
      return $this->redirect(array('controller'=>'users','action' => 'index'));
   }
}
?>
