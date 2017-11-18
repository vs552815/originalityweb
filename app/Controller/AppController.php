<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		https://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    
    public $components = array(
        'Flash',
        'Auth' => array(
        )
        , 'Session', 'RequestHandler', 'Paginator', 'Cookie'
    );

    public function beforeFilter() {
        $this->set('title', 'Users');

        if ($this->request->prefix == 'admin') {
            $this->layout = 'admin';
// Specify which controller/action handles logging in:
            AuthComponent::$sessionKey = 'Auth.Admin'; // solution from http://stackoverflow.com/questions/10538159/cakephp-auth-component-with-two-models-session
            $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login', 'admin' => true);
            $this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'dashboard', 'admin' => true);
            $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login', 'admin' => true);
            $this->Auth->authenticate = array(
                'Form' => array(
                    'scope' => array('User.account_type_id' => '1'),
                    'fields' => array('username' => 'email')
                )
            );
            $this->Auth->allow('index', 'view', 'login', 'logout');
        } else {


            AuthComponent::$sessionKey = 'Auth.User'; // solution from http://stackoverflow.com/questions/10538159/cakephp-auth-component-with-two-models-session
            $this->Auth->loginAction = array('controller' => 'users', 'action' => 'home');
            $this->Auth->logoutRedirect = '/';
            $this->Auth->authenticate = array(
                'Form' => array(
                    'scope' => array('User.account_type_id' => '1'),
                    'fields' => array('username' => 'email')
                )
            );
        }

        $this->Auth->allow('index', 'view');
    }
    
     public function slugStory($text) {
        $this->loadModel('TopHeader');
        $title = $text;
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            $text = 'n-a';
        }


        return $text ;
    }
    
    
}
