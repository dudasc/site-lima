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

	//public $uses = array('Ambiente');
	public $components = array(
		'Session',
		'Auth' => array(
			'loginAction' => array(
				'controller' => 'users',
				'action' => 'login',
				'admin' => false,
			),
			'loginRedirect' => array(
				'controller' => 'pages',
				'action' => 'index',
				'admin' => true,
			),
			'authError' => '<div class="alert alert-info">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							É necessário logar para acessar está area.
						  </div>',
			'authenticate' => array(
				'Form' => array(
					'userModel' => 'User',
				),
			),
		),
	);
	public function beforeFilter() {
		/*$opcoes = array('order' => array('nome' => 'ASC'));
		$ambientes = $this->Ambiente->find('all', $opcoes);
		$this->set('ambientes', $ambientes);*/
		//seta o layout da paginas de erro
		if($this->name == 'CakeError') {
	        $this->layout = 'paginas';
	        //$this->redirect(array('controller' =>'pages', 'action' => 'index'));
	    }

		Security::setHash('md5');

		if (!isset($this->params['admin'])) {
			$this->Auth->allow();
		}
	}
	public function isAuthorized($user) {
		return true;
	}
}
