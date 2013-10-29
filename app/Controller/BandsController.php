
<?php
class BandsController extends AppController
{
   public $helpers = array('Html','Form','Js');
   public $components = array('RequestHandler');
   /*Allow non logged in users to view and search Bands*/
   public function beforeFilter() {
      parent::beforeFilter();
      $this->Auth->allow('view');
      $this->Auth->allow('search');
   }
   /*Allow all logged in users to create subscribe and view index*/
   public function isAuthorized($user) {
      if ($this->action === 'create' ||
         $this->action === 'subscribe' ||
         $this->action === 'search' ||
         $this->action ==='index')
      {
         return true;
      }
      return parent::isAuthorized($user);
   }

   /*View all bands on index page*/
   function index()
   {
      $this->set('bands', $this->Band->find('all'));
   }

   /*Create a band*/
    function create()
    {
      $this->loadModel('Genre');
        
      $genres = $this->Genre->find('list', array(
        'fields' => array('Genre.id', 'Genre.name')));
        
      $this->set(compact('genres'));

      if($this->request->is('post'))
      {
         $this->Band->create();

         //Fetch field inputs for validation
         $data = array(
            'band_name' => $this->request->data['band_name'],
            'genre_id' => $this->request->data['genre_id'],
            'band_info' => $this->request->data['band_info'],
            'official_site' => $this->request->data['official_site'],
            );

			//Check for facebook and twitter inputs - if they exist, perform concatenation
			if(strlen ($this->request->data['facebook']) != 0){
				$data['facebook'] = 'https://www.facebook.com/'.$this->request->data['facebook'];
         }

			if(strlen ($this->request->data['twitter']) != 0){
            $data['twitter'] = 'https://www.twitter.com/'.$this->request->data['twitter'];
         }

		 /*Saves the data */
         if($this->Band->save($data))
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
      $user_id = CakeSession::read('Auth.User.id');
      if($band_id == null)
      {
        return $this->redirect(array('controller' => 'users',
                      'action' => 'index',$user_id));
      }
      
      $band = $this->Band->findById($band_id);
      if($band == null)
      {
        return $this->redirect(array('controller' => 'users',
                      'action' => 'index',$user_id));
      }
      $this->set(compact('band'));

      $this->loadModel('Subscription');
      $subs = $this->Subscription->find('all', array(
      'limit' => 1,
      'conditions' => array('Subscription.user_id' => $user_id,
         'Subscription.band_id' => $band_id),
      'fields' => array('Role.id')));

      $admin = 0;
      if(isset($subs[0]['Role']['id']))
      {
         $admin = $subs[0]['Role']['id'];
      }
      $this->set(compact('admin'));
   }

   function search($search = null)
   {
      if($search == null && isset($this->params['url']['search']))
      {
         $search = $this->params['url']['search'];
      }

      $conditions = array("Band.band_name LIKE" => "%".$search."%");
      $searches = $this->Band->find('list', array(
      'conditions' => $conditions,
      'fields' => array('Band.band_name','Band.band_info','Band.id')));
      $this->set(compact('searches'));
   }

   /*Function createss a new subscribtion to a band with a user role*/
   function subscribe($band_id = null)
   {
      $user_id = CakeSession::read('Auth.User.id');
      if($band_id == null)
      {
        return $this->redirect(array('controller' => 'users',
                      'action' => 'index',$user_id));
      }
      
      $band = $this->Band->findById($band_id);
      if($band == null)
      {
        return $this->redirect(array('controller' => 'users',
                      'action' => 'index',$user_id));
      }
      $this->set(compact('band'));

      $this->loadModel('Subscription');
      $this->Subscription->save(array('band_id' => $band_id,
                                'user_id' => $user_id,
                                'role_id' => 1),true);

      if ($this->RequestHandler->isAjax()) {
         $this->render('subscribe', 'ajax');
      }
   }
}
?>
