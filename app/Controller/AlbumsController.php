<?php

class AlbumsController extends AppController
{
   public $helpers = array('Html','Form');

   public function isAuthorized($user) {
      if ($this->action === 'create') {
         return true;
      }

      if (in_array($this->action, array('edit', 'delete'))) {
         $albumId = $this->request->params['pass'][0];
         if ($this->Album->isOwnedBy($albumId, $user['id'])) {
            return true;
         }
      }

      return parent::isAuthorized($user);
   }

   public function create($band_id = null)
   {
      $this->set('band_id', $band_id);

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
   {
      if (!$band_id)
      {
         $this->redirect(array("controller" => "user",
            "action" => "index"));
      }

      $this->set(compact('band_id'));
      $album = $this->Album->findById($band_id);
      if (!$album)
      {
         $this->redirect(array("controller" => "user",
            "action" => "index"));
      }

      if ($this->request->is('post') || $this->request->is('put')) {
         $this->Album->id = $band_id;
         if ($this->Album->save($this->request->data)) {
            return $this->redirect(array('action' => 'index'));
         }
      }
      if (!$this->request->data) {
         $this->request->data = $album;
      }
   }

   function delete($album)
   {
      if(!$album || !$this->Album->findById($album))
      {
         $this->redirect(array("controller" => "forums",
            "action" => "index"));
      }
      $this->Album->delete($album, $cascade = true);
      return $this->redirect(array('controller'=>'users','action' => 'index'));
   }
}
?>
