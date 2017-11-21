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

    public $uses = array('Comment','LikeDislike','Story','User','Solution','SolutionImage','SolutionComment');
    //var $helpers = array('Sh');
   public $components = array( 'Pk');

    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        // $this->Auth->allow('login', 'logout', 'forgot', 'reset');

        $this->Auth->allow('home','ajax_login','checkLogin','readpost','registerCompany','delete_post','story_comment','gaming_questions','readsolution','question_comment');
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
           $find = $this->Story->find('all', array('conditions' => array('Story.id'),'order'=>array('Story.id' => 'DESC')));
         foreach ($find as $i => $j) {
            $find[$i]['Story']['image'] = Router::url("/" . $find[$i]['Story']['image'], true);
             $find[$i]['Story']['main_img'] = Router::url("/" . $find[$i]['Story']['main_img'], true);
        }
           $this->set('find',$find);
           /////////////////////////////////////////////////////////////////////////////////////////////////////////
           
            $arr = array();
            $post_search = $this->Story->find('all',array('recursive' => -1));
           
            foreach ($post_search as $k => $post) {
             //   $arr[$k]['created_date_time'] = PkComponent::timeAgoInWords($job['Job']['created_date_time']);
                $arr[$k]['url']= Router::url(array('action' => 'readpost', 'controller' => 'users', 'storyslug' => $post['Story']['story_slug']));
                $arr[$k]['value'] = $post['Story']['title'];
               // $arr[$k]['id'] = $post['Story']['id'];
            }
            $this->set('arr', $arr);
            $this->render('home');
        
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
             $this->request->data['Story']['story_slug'] = $this->slugStory($this->request->data['Story']['title']);
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
            $user[$i]['Story']['main_img'] = Router::url("/" . $user[$i]['Story']['main_img'], true);
        }
          
        $this->set('user',$user);
    }

     public function myprofile(){
           $this->layout = 'home';
            $id = $this->Auth->user('id');
            $finduser = $this->User->find('first', array('conditions' => array('User.id'=>$id)));
            $this->set('finduser',$finduser);
         
     }
     public function story_comment($story_id){
         $id = $this->Auth->user('id');
        // print_r();exit;
           $arr['Comment']['comment']=$this->request->data['commentstory'];
           $arr['Comment']['story_id']=$story_id;
           $arr['Comment']['user_id']=$id;
           if ($this->Comment->save($arr)) {
             echo json_encode(array('status' => 'success', 'message' => 'The comment has been saved.'));  
             exit;
           }exit; 
     }
     
     public function question_comment($solution_id){
         $id = $this->Auth->user('id');
        // print_r();exit;
           $arr['SolutionComment']['comment']=$this->request->data['commentsolution'];
           $arr['SolutionComment']['solutions_id']=$solution_id;
           $arr['SolutionComment']['user_id']=$id;
           if ($this->SolutionComment->save($arr)) {
             echo json_encode(array('status' => 'success', 'message' => 'The SolutionComment has been saved.'));  
             exit;
           }exit; 
     }


     public function readpost(){
           $this->layout = 'home';
           
            $find_user = $this->Auth->user('id');
             $this->set('find_user',$find_user);
           if ($this->request->params['storyslug'] != '') {
            $c = $this->Story->find('first', array('conditions' => array('Story.story_slug' => $this->request->params['storyslug'])));
            if ($c) {
                $id = $c['Story']['id'];
            }
        }
        
           
            $findstory = $this->Story->find('first', array('conditions' => array('Story.id'=>$id)));
             $this->set('meta_decscriptoi',$findstory['Story']['title']);
            $findcomment = $this->Comment->find('all', array('conditions' => array('Comment.story_id'=>$id)));
              foreach ($findcomment as $i => $j) {
                 //$findcomment[$i]['Comment']['created_date'] = PkComponent::timeAgoInWords($findcomment[$i]['Comment']['created_date']);
                  if($findcomment[$i]['User']['profile_image']!=''){
                       $findcomment[$i]['User']['profile_image'] = Router::url("/" . $findcomment[$i]['User']['profile_image'], true);
                  }else{
                      $findcomment[$i]['User']['profile_image'] = Router::url("/" . 'img/images/avatar.png', true);
                  }
           
           
        }
            
           $findstory['Story']['image'] = Router::url("/" . $findstory['Story']['image'], true);
           $findstory['Story']['main_img'] = Router::url("/" . $findstory['Story']['main_img'], true);
            $this->set('findstory',$findstory);
            $this->set('findcomment',$findcomment);
        //    print_r($findcomment);exit;
         
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
    
    public function delete_post($id) {
        
         $this->Story->id = $id;
        if (!$this->Story->exists()) {
            throw new NotFoundException(__('Invalid Restaurant'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Story->delete()) {
         //   $this->Flash->success(__('The Story has been deleted.'));
        } else {
            $this->Flash->error(__('The Story could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'viewpost'));
     }
     
      public function readsolution($id=null){
         $this->layout = 'home';
         
          if ($this->request->params['solutionslug'] != '') {
            $c = $this->Solution->find('first', array('conditions' => array('Solution.slug_question' => $this->request->params['solutionslug'])));
            if ($c) {
                $id = $c['Solution']['id'];
            }
        }
        
        
    
         $Solution = $this->Solution->find('first',array('Solution.id'=>$id));
         $Solution['User']['profile_image'] = Router::url("/" . $Solution['User']['profile_image'], true);
         $this->set('Solution',$Solution);
        $this->set('meta_decscriptoi',$Solution['Solution']['decscription']);
         /////////////////////////
        $che = $this->SolutionImage->find('all', array('conditions' => array('SolutionImage.solutions_id'=>$id), 'recursive' => -1));
        foreach ($che as $i => $j) {
            $che[$i]['SolutionImage']['sloution_image'] = Router::url("/" . $che[$i]['SolutionImage']['sloution_image'], true);
        }
        $this->set('che', $che);
        ///////////////////////////////////////////////////////////////// 
         $findcomment = $this->SolutionComment->find('all', array('conditions' => array('SolutionComment.solutions_id'=>$id)));
              foreach ($findcomment as $i => $j) {
                 //$findcomment[$i]['Comment']['created_date'] = PkComponent::timeAgoInWords($findcomment[$i]['Comment']['created_date']);
                  if($findcomment[$i]['User']['profile_image']!=''){
                       $findcomment[$i]['User']['profile_image'] = Router::url("/" . $findcomment[$i]['User']['profile_image'], true);
                  }else{
                      $findcomment[$i]['User']['profile_image'] = Router::url("/" . 'img/images/avatar.png', true);
                  }
        }
     
         $this->set('findcomment', $findcomment);
         
         
     }
    
     public function gaming_questions(){
           $this->layout = 'home';
            $findSolution = $this->Solution->find('all');
            
            foreach ($findSolution as $i => $j) {
            $findSolution[$i]['User']['profile_image'] = Router::url("/" . $findSolution[$i]['User']['profile_image'], true);
          
        }
            
            $this->set('findSolution',$findSolution);
            //print_r($findSolution);exit;
            
     }
     
     public function ask_question() {
        $this->layout = 'home';
        $id = $this->Auth->user('id');
        if ($this->request->is('post')) {
            $this->Solution->create();
            $this->request->data['Solution']['slug_question'] = $this->slugQuestion($this->request->data['Solution']['title']);
            $this->request->data['Solution']['user_id'] = $id;
//            print_r($this->request->data);
//            exit;
            if ($u = $this->Solution->save($this->request->data)) {
                $dimg = array();
                $i = 0;
                foreach ($this->request->data['SolutionImage']['sloution_image'] as $dishe_img) {
                    if ($dishe_img['name'] != "") {
                        $sFileName = time() . "_" . str_replace(" ", "_", $dishe_img['name']);
                        $sPath = "SolutionImage";
                        $file = $this->Pk->uploadImage($dishe_img, $sFileName, $sPath);
                        if ($file['status'] == 'success') {
                            $dimg[$i]['SolutionImage']['sloution_image'] = $file['url'];
                            $dimg[$i]['SolutionImage']['solutions_id'] = $u['Solution']['id'];
                            $dimg[$i]['SolutionImage']['user_id'] = $id;
                            $i++;
                        }
                    } else {
                        unset($dishe_img);
                    }
                }
                 $this->SolutionImage->saveMany($dimg);
                return $this->redirect(array('action' => 'gaming_questions'));
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
    }
    
    public function user_questions(){
         $this->layout = 'home';
          $id = $this->Auth->user('id');
           $find = $this->Solution->find('all', array('conditions' => array('Solution.user_id'=>$id)));
           foreach ($find as $i => $j) {
            $find[$i]['User']['profile_image'] = Router::url("/" . $find[$i]['User']['profile_image'], true);
          
        }
         $this->set('find',$find); 
          
    }
    public function editsolution($id){
         $this->layout = 'home';
          if ($this->request->is(array('put', 'post'))) {
              $this->request->data['Solution']['id']=$id;
            
              
            if ($this->Solution->save($this->request->data)) {
                return $this->redirect(array('controller' => 'users', 'action' => 'user_questions'));
            } else {
                $this->Flash->error(__('The Solution could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Solution.' . $this->Solution->primaryKey => $id));
            $this->request->data = $this->Solution->find('first', $options);
            //pr($imge);exit;
        }
          
    }

}
