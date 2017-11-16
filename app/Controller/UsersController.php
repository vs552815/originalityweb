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

        $this->Auth->allow('home','ajax_login','checkLogin','readpost','registerCompany');
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
             $find[$i]['Story']['main_img'] = Router::url("/" . $find[$i]['Story']['main_img'], true);
        }
           $this->set('find',$find);
       //  pr($find);exit;
    }
    
    public function post(){
         $this->layout = 'home';
         if ($this->request->is('post')) {
            $this->Story->create();
            
            
            if ($this->request->data['Story']['main'] != "") {
                $sFileName = time() . "_" . str_replace(" ", "_", md5(time() . rand(1111, 99999)));
                $sPath = "story";
                $file = $this->Pk->uploadImageBase64($this->request->data['Story']['main'], $sFileName, $sPath);
                if ($file['status'] == 'success') {
                    unset($this->request->data['Story']['main_img']);
                    $this->request->data['Story']['main_img'] = $file['url'];
                } else {
                    $this->request->data['Story']['main_img'] = "";
                }
            } else {
                unset($this->request->data['Story']['main_img']);
            }
            
            
             if ($this->request->data['Story']['cimage'] != "") {
                $sFileName = time() . "_" . str_replace(" ", "_", md5(time() . rand(1111, 99999)));
                $sPath = "story";
                $file = $this->Pk->uploadImageBase64($this->request->data['Story']['cimage'], $sFileName, $sPath);
                if ($file['status'] == 'success') {
                    unset($this->request->data['Story']['image']);
                    $this->request->data['Story']['image'] = $file['url'];
                } else {
                    $this->request->data['Story']['image'] = "";
                }
            } else {
                unset($this->request->data['Story']['image']);
            }
            //print_r($this->request->data);exit;
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
     
      public function readpost($id){
           $this->layout = 'home';
           
            $findstory = $this->Story->find('first', array('conditions' => array('Story.id'=>$id)));
           $findstory['Story']['image'] = Router::url("/" . $findstory['Story']['image'], true);
           $findstory['Story']['main_img'] = Router::url("/" . $findstory['Story']['main_img'], true);
            $this->set('findstory',$findstory);
         
     }
     
     public function editprofile(){
         $this->layout = 'home';
        $id = $this->Auth->user('id');
        if ($this->request->is(array('put', 'post'))) {
            
              if ($this->request->data['User']['profile_img'] != "") {
                $sFileName = time() . "_" . str_replace(" ", "_", md5(time() . rand(1111, 99999)));
                $sPath = "story";
                $file = $this->Pk->uploadImageBase64($this->request->data['User']['profile_img'], $sFileName, $sPath);
                if ($file['status'] == 'success') {
                    unset($this->request->data['User']['profile_image']);
                    $this->request->data['User']['profile_image'] = $file['url'];
                } else {
                    $this->request->data['User']['profile_image'] = "";
                }
            } else {
                unset($this->request->data['User']['profile_image']);
            }
          //  print_r($this->request->data);exit;
        
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
     
     
      public function registerCompany() {
        $this->layout = 'ajax';
        $this->autoRender = false;
        if ($this->request->is('ajax')) {
            $count = $this->User->find('count', array('conditions' => array('User.email' => $this->request->data['User']['email'])));
             if ($count <= 0) {
                $this->User->create();
                if (isset($this->request->data['User']['password']) && $this->request->data['User']['password'] != '') {
                    $this->request->data['User']['password'] = AuthComponent::password($this->request->data['User']['password']);
                }
                $this->request->data['User']['account_type_id'] = 3;
                if ($user = $this->User->saveAll($this->request->data)) {
                    $u = $this->User->findById($this->User->getLastInsertID());
                    $this->Auth->login($u['User']);
                    echo json_encode(array('status' => 'success', 'message' => 'The user has been saved.'));
                     
                    //$this->Flash->companyregister(__('The user has been saved.', 'companyregister'));
                    // return $this->redirect(array('action' => 'postjob'));
                } else {
                    echo json_encode(array('status' => 'error', 'message' => 'The user could not be saved. Please, try again.', 'email_exist' => 0));
                }
            } else {
                echo json_encode(array('status' => 'failed', 'message' => 'email id already exist', 'email_exist' => 1));
            }
        }
    }

}
