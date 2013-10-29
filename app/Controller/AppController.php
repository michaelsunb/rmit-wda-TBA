<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

   public $components = array(
      'DebugKit.Toolbar',
      'Session',
      'Auth' =>
      array(
         'authorize' => array('Controller'),
         'loginRedirect' => array('controller' => 'users', 'action' => 'index'),
         'logoutRedirect' => array('controller' => 'loginregister', 'action' => 'index'),
         'authenticate' => array(
            'Form' => array(
               'userModel' => 'User',
               'fields' => array(
                  'username' => 'username',
                  'password' => 'password'
               )
            )
         )
      )
   );

   /*Allow login and register pages to be viewed by all ppl.*/ 
   public function beforeFilter() {
         $this->Auth->allow('loginregister', 'add');
         $this->Auth->allow('pages', 'aboutus');
         $this->Auth->allow('pages', 'contact');
         $this->set('authUser', $this->Auth->user());
   }

	/*Admin users are authorised always. :) */
   public function isAuthorized($user)
   {
      if (isset($user['admin']) && $user['admin'] === true) {
         return true;
      }
      return false;
   }
}
