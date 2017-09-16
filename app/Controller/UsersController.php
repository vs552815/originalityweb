<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');


/**
 * CakePHP UsersController
 * @author pravesh
 */
class UsersController extends AppController {

    public $uses = array('Comment','LikeDislike','Story','User');
    //var $helpers = array('Sh');
   public $components = array( 'Pk');

    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        // $this->Auth->allow('login', 'logout', 'forgot', 'reset');

        $this->Auth->allow('home','ajax_login','checkLogin');
    }
    
    public function logout() {
        return $this->redirect($this->Auth->logout());
    }
    function checkLogin() {
        $this->layout = 'ajax';
        $this->autoRender = false;
        if ($this->request->is('ajax')) {
            $user = $this->Auth->user('id');
            $account_type_id = $this->Session->read('Auth.User.id');
            if ($user) {
                    echo json_encode(array('status' => 'success', 'message' => 'logged in'));
            } else {
                echo json_encode(array('status' => 'failed', 'message' => 'not logged in'));
            }
        }
    }
    
       function ajax_login() {
        $this->layout = 'ajax';
        $this->autoRender = false;
        if ($this->request->is('ajax')) {
           
            if ($this->request->is('post')) {
                $email = $this->request->data['User']['email'];
                $password = AuthComponent::password($this->request->data['User']['password']);
                 
                $user = $this->User->find('first', array('conditions' => array('User.email' => $email, 'User.password' => $password)));
             
                if ($user) {
                    $data = $this->Auth->login($user['User']);
                  
                        echo json_encode(array('status' => 'success', 'message' => 'logged in'));
                } else {
                    $arr = array("status" => "failed", "message" => "Invalid Login Credentials");
                    echo json_encode($arr);
                }
            }
        }
    }
    
    public function home(){
         $this->layout = 'home';
           $find = $this->Story->find('all', array('conditions' => array('Story.id')));
         foreach ($find as $i => $j) {
            $find[$i]['Story']['image'] = Router::url("/" . $find[$i]['Story']['image'], true);
             $find[$i]['User']['profile_image'] = Router::url("/" . $find[$i]['User']['profile_image'], true);
        }
           $this->set('find',$find);
       //  pr($find);exit;
    }
    
    public function post(){
         $this->layout = 'home';
         if ($this->request->is('post')) {
            $this->Story->create();
             if ($this->request->data['Story']['image']['name'] != "") {
                    $sFileName = time() . "_" . str_replace(" ", "_", $this->request->data['Story']['image']['name']);
                    $sPath = "story";
                    $file = $this->Pk->uploadImage($this->request->data['Story']['image'], $sFileName, $sPath);

                    if ($file['status'] == 'success') {
                        unset($this->request->data['Story']['image']);
                        $this->request->data['Story']['image'] = $file['url'];
                    } else {
                        $this->request->data['Story']['image'] = "";
                    }
                } else {
                    unset($this->request->data['Story']['image']);
                } 
            if ($this->Story->save($this->request->data)) {
                $user_id = $this->Auth->user('id');
                 $arr['Story']['user_id'] = $user_id;
                $this->Story->save($arr);
                return $this->redirect(array('action' => 'post'));
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
    }
    
    public function viewpost(){
         $this->layout = 'home';
         $user_id = $this->Auth->user('id');
         $user = $this->Story->find('all', array('conditions' => array('Story.user_id'=>$user_id )));
         
         foreach ($user as $i => $j) {
            $user[$i]['Story']['image'] = Router::url("/" . $user[$i]['Story']['image'], true);
        }
          
        $this->set('user',$user);
    }

     public function myprofile(){
           $this->layout = 'home';
            $id = $this->Auth->user('id');
            $finduser = $this->User->find('first', array('conditions' => array('User.id'=>$id)));
            $this->set('finduser',$finduser);
         
     }
     
     public function editprofile(){
         $this->layout = 'home';
        $id = $this->Auth->user('id');
        if ($this->request->is(array('put', 'post'))) {
            
            if ($this->request->data['User']['profile_image']['name'] != "") {
                $sFileName = time() . "_" . str_replace(" ", "_", $this->request->data['User']['profile_image']['name']);
                $sPath = "profile";
                $file = $this->Pk->uploadImage($this->request->data['User']['profile_image'], $sFileName, $sPath);

                if ($file['status'] == 'success') {
                    unset($this->request->data['User']['profile_image']);
                    $this->request->data['User']['profile_image'] = $file['url'];
                } else {
                    $this->request->data['User']['profile_image'] = "";
                }
            } else {
                unset($this->request->data['User']['profile_image']);
            }
        
            if ($this->User->save($this->request->data)) {
                return $this->redirect(array('controller' => 'users', 'action' => 'editprofile'));
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $imge = $this->request->data = $this->User->find('first', $options);
            $this->set('imge', $imge);
            //pr($imge);exit;
        }
         
         
     }

}
