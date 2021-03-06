<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
	public $uses = array('User');
	
	public $components = array(
        'Session',
        'Auth' ,
			'DebugKit.Toolbar'
    );

	public function isAuthorized($user) {
		// Admin peut accéder à toute action
		if (isset($user['role']) && $user['role'] === 'admin') {
			return true;
		}
		// Refus par défaut
		return false;
	}

    public function beforeFilter() {
		$this->Auth->authenticate = array('Form' => array(
			'scope' => array('User.offre_de_bienvenue' => "oui",'User.bloquer ' => false)));
        //$this->Auth->allow('index', 'view', 'display', 'valider_service', 'cloturer_annonce', 'desisterAnnonce');
		$this->Auth->allow();

		if(AuthComponent::user('role')!='admin'){
			//Bloquer ces actions pour les non admins
			$this->Auth->deny('manage','utilisateur_pas_valide','annonce_pas_valide','offre_bienvenue','delete');
		}
        if(AuthComponent::user('id') != null) {
       		$query_to_execute = "select * from users where id = ".AuthComponent::user('id');
        	$results = $this->User->query($query_to_execute);
        	$this->set('utilisateur', $results);
        }
    }
}
