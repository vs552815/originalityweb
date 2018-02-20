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

    public $uses = array('Comment', 'LikeDislike', 'Story', 'User', 'Solution', 'SolutionImage', 'SolutionComment', 'LiveStream'
        , 'TrendingLikeDislike', 'TrendingVideo', 'TrendingVideoComment', 'VideoComment', 'VideoLikeDislike', 'YotubeProfile', 'UpcomingGame'
        , 'GamingStory');
    //var $helpers = array('Sh');
    public $components = array('Pk');

    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        // $this->Auth->allow('login', 'logout', 'forgot', 'reset');

        $this->Auth->allow('live_stream', 'checkLiveLogin', 'test', 'delete_userpost', 'approved_post', 'delete_mypost', 'create_post', 'home', 'ajax_login', 'checkLogin', 'readpost', 'registerCompany', 'delete_post', 'story_comment', 'gaming_questions', 'readsolution', 'question_comment'
                , 'checkapi', 'view_live', 'trending', 'view_video', 'create_upcomeing', 'getdatabycategory', 'readstory', 'new_story', 'gaming_story'
                , 'delete_userstory', 'approved_story','delete_video');
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

    function checkLiveLogin() {
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

    public function home() {
        $this->layout = 'home';
        //UpcomingGame
        $find = $this->GamingStory->find('all', array('conditions' => array('GamingStory.id', 'GamingStory.status' => 1),
            //  'limit' => 4, 
            'order' => array('GamingStory.id' => 'DESC')));
        foreach ($find as $i => $j) {
            $find[$i]['GamingStory']['image'] = Router::url("/" . $find[$i]['GamingStory']['image'], true);
            $find[$i]['GamingStory']['cover_image'] = Router::url("/" . $find[$i]['GamingStory']['cover_image'], true);
        }
        $this->set('find', $find);
        /////////////////////////////////////////////////////////////////////////////////////////////////////////

        $find_upcoming = $this->UpcomingGame->find('all', array('conditions' => array('UpcomingGame.id'), 'order' => array('UpcomingGame.id' => 'DESC')));
        foreach ($find_upcoming as $i => $j) {
            $find_upcoming[$i]['UpcomingGame']['image'] = Router::url("/" . $find_upcoming[$i]['UpcomingGame']['image'], true);
        }
        // print_r($find_upcoming);exit;
        $this->set('find_upcoming', $find_upcoming);

        /////////////////////////////////////////////////////////////////////////////////////////////////////////
        $find_all = $this->Story->find('all', array('conditions' => array('Story.id', 'Story.approved_post' => 1)
            // , 'limit'=>4 
            , 'order' => array('Story.id' => 'DESC')));
        foreach ($find_all as $i => $k) {
            $find_all[$i]['Story']['image'] = Router::url("/" . $find_all[$i]['Story']['image'], true);
            $find_all[$i]['Story']['main_img'] = Router::url("/" . $find_all[$i]['Story']['main_img'], true);
        }
        $this->set('find_all', $find_all);
        /////////////////////////////////////////////////////////////////////////////////////////////////////////





        $arr = array();
        $post_search = $this->Story->find('all', array('recursive' => -1));

        foreach ($post_search as $k => $post) {
            //   $arr[$k]['created_date_time'] = PkComponent::timeAgoInWords($job['Job']['created_date_time']);
            $arr[$k]['url'] = Router::url(array('action' => 'readpost', 'controller' => 'users', 'storyslug' => $post['Story']['story_slug']));
            $arr[$k]['value'] = $post['Story']['title'];
            // $arr[$k]['id'] = $post['Story']['id'];
        }
        $this->set('arr', $arr);
        $this->render('home');

        //  pr($find);exit;
    }

    public function post() {
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
            $this->request->data['Story']['approved_post'] = 1;
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

    public function viewpost() {
        $this->layout = 'home';
        $user_id = $this->Auth->user('id');
        $user = $this->Story->find('all', array('conditions' => array('Story.user_id' => $user_id)));

        foreach ($user as $i => $j) {
            $user[$i]['Story']['image'] = Router::url("/" . $user[$i]['Story']['image'], true);
            $user[$i]['Story']['main_img'] = Router::url("/" . $user[$i]['Story']['main_img'], true);
        }

        $this->set('user', $user);
    }

    public function myprofile() {
        $this->layout = 'home';
        $id = $this->Auth->user('id');
        $finduser = $this->User->find('first', array('conditions' => array('User.id' => $id)));
        $this->set('finduser', $finduser);
    }

    public function story_comment($story_id) {
        $id = $this->Auth->user('id');
        // print_r();exit;
        $arr['Comment']['comment'] = $this->request->data['commentstory'];
        $arr['Comment']['story_id'] = $story_id;
        $arr['Comment']['user_id'] = $id;
        if ($this->Comment->save($arr)) {
            echo json_encode(array('status' => 'success', 'message' => 'The comment has been saved.'));
            exit;
        }exit;
    }

    public function question_comment($solution_id) {
        $id = $this->Auth->user('id');
        // print_r();exit;
        $arr['SolutionComment']['comment'] = $this->request->data['commentsolution'];
        $arr['SolutionComment']['solutions_id'] = $solution_id;
        $arr['SolutionComment']['user_id'] = $id;
        if ($this->SolutionComment->save($arr)) {
            echo json_encode(array('status' => 'success', 'message' => 'The SolutionComment has been saved.'));
            exit;
        }exit;
    }

    public function readpost() {
        $this->layout = 'home';

        $find_user = $this->Auth->user('id');
        $this->set('find_user', $find_user);
        if ($this->request->params['storyslug'] != '') {
            $c = $this->Story->find('first', array('conditions' => array('Story.story_slug' => $this->request->params['storyslug'])));
            if ($c) {
                $id = $c['Story']['id'];
            }
        }


        $findstory = $this->Story->find('first', array('conditions' => array('Story.id' => $id)));
        $this->set('meta_decscriptoi', $findstory['Story']['title']);
        $findcomment = $this->Comment->find('all', array('conditions' => array('Comment.story_id' => $id)));
        foreach ($findcomment as $i => $j) {
            //$findcomment[$i]['Comment']['created_date'] = PkComponent::timeAgoInWords($findcomment[$i]['Comment']['created_date']);
            if ($findcomment[$i]['User']['profile_image'] != '') {
                $findcomment[$i]['User']['profile_image'] = Router::url("/" . $findcomment[$i]['User']['profile_image'], true);
            } else {
                $findcomment[$i]['User']['profile_image'] = Router::url("/" . 'img/images/avatar.png', true);
            }
        }

        $findstory['Story']['image'] = Router::url("/" . $findstory['Story']['image'], true);
        $findstory['Story']['main_img'] = Router::url("/" . $findstory['Story']['main_img'], true);
        $this->set('findstory', $findstory);
        $this->set('findcomment', $findcomment);

        $findtrending = $this->Story->find('first', array('order' => array('Story.id' => 'DESC'), 'recursive' => -1));
        $findtrending['Story']['image'] = Router::url("/" . $findtrending['Story']['image'], true);
        $this->set('findtrending', $findtrending);
    }

    public function editprofile() {
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

//                     if ($this->request->is('post')) {
//                        if ($this->request->data['User']['email'] != '') {
//                            $user = $this->User->find('first', array('conditions' => array('User.email' => $this->request->data['User']['email'])));
//                            if ($user) {
//                                $username = $user['User']['email'];
//                                $hash = md5(time() . rand(0, 9999));
//                                $link = Router::url(array('controller' => 'users', 'action' => 'home'), true);
//                                $Email = new CakeEmail();
//                                $Email->config('gmail');
//                                $Email->subject('Welcome to Originalityweb!');
//                                $Email->viewVars(array('link' => $link, 'email' => $username));
//                                $Email->template('usercreated', 'default')
//                                        ->emailFormat('html')
//                                        ->to($user['User']['email'])
//                                        ->from('vs552815@gmail.com')
//                                        ->send();
//                              //  $this->Flash->success(__('Please check your email address for further instractions.'));
//                            } else {
//                                $this->Flash->error(__('Email address does not exist in our system, try again'));
//                            }
//                        } else {
//                            $this->Flash->error(__('Invalid email address, try again'));
//                        }
//                    }

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

    public function readsolution($id = null) {
        $this->layout = 'home';

        if ($this->request->params['solutionslug'] != '') {
            $c = $this->Solution->find('first', array('conditions' => array('Solution.slug_question' => $this->request->params['solutionslug'])));
            if ($c) {
                $ids = $c['Solution']['id'];
            }
        }



        $Solution = $this->Solution->find('first', array('conditions' => array('Solution.id' => $ids)));

        $Solution['User']['profile_image'] = Router::url("/" . $Solution['User']['profile_image'], true);
        $this->set('Solution', $Solution);

        $this->set('meta_decscriptoi', $Solution['Solution']['decscription']);
        /////////////////////////
        $che = $this->SolutionImage->find('all', array('conditions' => array('SolutionImage.solutions_id' => $ids), 'recursive' => -1));
        foreach ($che as $i => $j) {
            $che[$i]['SolutionImage']['sloution_image'] = Router::url("/" . $che[$i]['SolutionImage']['sloution_image'], true);
        }
        $this->set('che', $che);

        ///////////////////////////////////////////////////////////////// 
        $findcomment = $this->SolutionComment->find('all', array('conditions' => array('SolutionComment.solutions_id' => $ids)));
        foreach ($findcomment as $i => $j) {
            //$findcomment[$i]['Comment']['created_date'] = PkComponent::timeAgoInWords($findcomment[$i]['Comment']['created_date']);
            if ($findcomment[$i]['User']['profile_image'] != '') {
                $findcomment[$i]['User']['profile_image'] = Router::url("/" . $findcomment[$i]['User']['profile_image'], true);
            } else {
                $findcomment[$i]['User']['profile_image'] = Router::url("/" . 'img/images/avatar.png', true);
            }
        }

        $this->set('findcomment', $findcomment);
    }

    public function gaming_questions() {
        $this->layout = 'home';
        $findSolution = $this->Solution->find('all');

        foreach ($findSolution as $i => $j) {
            $findSolution[$i]['User']['profile_image'] = Router::url("/" . $findSolution[$i]['User']['profile_image'], true);
        }

        $this->set('findSolution', $findSolution);
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

    public function my_questions() {
        $this->layout = 'home';
        $id = $this->Auth->user('id');
        $find = $this->Solution->find('all', array('conditions' => array('Solution.user_id' => $id)));
        foreach ($find as $i => $j) {
            $find[$i]['User']['profile_image'] = Router::url("/" . $find[$i]['User']['profile_image'], true);
        }
        $this->set('find', $find);
    }

    public function editsolution($id) {
        $this->layout = 'home';
        if ($this->request->is(array('put', 'post'))) {
            $this->request->data['Solution']['id'] = $id;


            if ($this->Solution->save($this->request->data)) {
                return $this->redirect(array('controller' => 'users', 'action' => 'my_questions'));
            } else {
                $this->Flash->error(__('The Solution could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Solution.' . $this->Solution->primaryKey => $id));
            $this->request->data = $this->Solution->find('first', $options);
            //pr($imge);exit;
        }
    }

    public function create_post() {

        $this->layout = 'home';
        if ($this->request->is('post')) {
            $this->Story->create();
            if ($this->request->data['Story']['youtube_link'] != "") {
                $link = $this->request->data['Story']['youtube_link'];
                $video_id = explode("?v=", $link);
                $video_id = $video_id[1];
                $this->request->data['Story']['youtube_link'] = $video_id;
            } else {
                unset($this->request->data['Story']['youtube_link']);
            }

            if ($this->request->data['Story']['main_img']['name'] != "") {
                $sFileName = time() . "_" . str_replace(" ", "_", $this->request->data['Story']['main_img']['name']);
                $sPath = "story";
                $file = $this->Pk->uploadImage($this->request->data['Story']['main_img'], $sFileName, $sPath);

                if ($file['status'] == 'success') {
                    unset($this->request->data['Story']['main_img']);
                    $this->request->data['Story']['main_img'] = $file['url'];
                } else {
                    $this->request->data['Story']['main_img'] = "";
                }
            } else {
                unset($this->request->data['Story']['main_img']);
            }

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

            // $this->request->data['Story']['story_slug'] = $this->slugStory($this->request->data['Story']['title']);
            $user_id = $this->Auth->user('id');

            $find_user = $this->User->find('first', array('conditions' => array('User.id' => $user_id), 'recursive' => -1));
            $this->request->data['Story']['user_id'] = $find_user['User']['id'];
            $this->request->data['Story']['account_type_id'] = $find_user['User']['account_type_id'];
            //print_r($this->request->data);exit;
            if ($this->Story->save($this->request->data)) {

                $story_id = $this->Story->getLastInsertID();
                $arr['Story']['story_slug'] = $this->slugStory($this->request->data['Story']['title'], $story_id);
                $arr['Story']['id'] = $story_id;
                $this->Story->save($arr);
                $this->Flash->pending_popup(__('The Story has been saved.'));
                return $this->redirect(array('action' => 'my_post'));
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
    }

    public function my_post() {
        $this->layout = 'home';
        $user_id = $this->Auth->user('id');
        $find_post = $this->Story->find('all', array('conditions' => array('Story.user_id' => $user_id), 'recursive' => -1));
        foreach ($find_post as $i => $j) {
            $find_post[$i]['Story']['image'] = Router::url("/" . $find_post[$i]['Story']['image'], true);
            $find_post[$i]['Story']['main_img'] = Router::url("/" . $find_post[$i]['Story']['main_img'], true);
        }
        //print_r($find_user);exit;
        $this->set('find_post', $find_post);
        //////////
        $find_story = $this->GamingStory->find('all', array('conditions' => array('GamingStory.user_id' => $user_id), 'recursive' => -1));
        foreach ($find_story as $k => $m) {
            $find_story[$k]['GamingStory']['image'] = Router::url("/" . $find_story[$k]['GamingStory']['image'], true);
            $find_story[$k]['GamingStory']['cover_image'] = Router::url("/" . $find_story[$k]['GamingStory']['cover_image'], true);
        }
        //print_r($find_user);exit;
        $this->set('find_story', $find_story);
    }

    public function delete_mypost($id) {

        $this->Story->id = $id;
        if (!$this->Story->exists()) {
            throw new NotFoundException(__('Invalid GamingStory'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Story->delete()) {
            //   $this->Flash->success(__('The Story has been deleted.'));
        } else {
            $this->Flash->error(__('The Story could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'my_post'));
    }

    public function delete_mystory($id) {

        $this->GamingStory->id = $id;
        if (!$this->GamingStory->exists()) {
            throw new NotFoundException(__('Invalid GamingStory'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->GamingStory->delete()) {
            //   $this->Flash->success(__('The Story has been deleted.'));
        } else {
            $this->Flash->error(__('The GamingStory could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'my_post'));
    }

    public function edit_post($id) {
        $this->layout = 'home';

        $dd = $this->Story->find('first', array('conditions' => array('Story.id' => $id), 'recursive' => -1));

        $dd['Story']['main_img'] = Router::url("/" . $dd['Story']['main_img'], true);
        $dd['Story']['image'] = Router::url("/" . $dd['Story']['image'], true);

        $this->set('dd', $dd);

        //   print_r($cc);exit;
        if ($this->request->is(array('post', 'put'))) {

            if ($this->request->data['Story']['youtube_link'] != "") {
                $link = $this->request->data['Story']['youtube_link'];
                $video_id = explode("?v=", $link);
                $video_id = $video_id[1];
                $this->request->data['Story']['youtube_link'] = $video_id;
            } else {
                unset($this->request->data['Story']['youtube_link']);
            }

            if ($this->request->data['Story']['main_img']['name'] != "") {
                $sFileName = time() . "_" . str_replace(" ", "_", $this->request->data['Story']['main_img']['name']);
                $sPath = "story";
                $file = $this->Pk->uploadImage($this->request->data['Story']['main_img'], $sFileName, $sPath);

                if ($file['status'] == 'success') {
                    unset($this->request->data['Story']['main_img']);
                    $this->request->data['Story']['main_img'] = $file['url'];
                } else {
                    $this->request->data['Story']['main_img'] = "";
                }
            } else {
                unset($this->request->data['Story']['main_img']);
            }

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


            $this->request->data['Story']['id'] = $id;
            //print_r($this->request->data);exit;
            if ($this->Story->save($this->request->data)) {
                $this->Flash->success(__('The Story has been saved.'));
                return $this->redirect(array('action' => 'my_post'));
            } else {
                $this->Flash->error(__('The Story could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Story.' . $this->Story->primaryKey => $id));
            $this->request->data = $this->Story->find('first', $options);
        }
    }

    public function user_post() {
        $this->layout = 'home';

        $find_post = $this->Story->find('all', array('conditions' => array('Story.id', 'Story.approved_post' => 0)));
        foreach ($find_post as $i => $j) {
            $find_post[$i]['Story']['image'] = Router::url("/" . $find_post[$i]['Story']['image'], true);

            $find_post[$i]['Story']['main_img'] = Router::url("/" . $find_post[$i]['Story']['main_img'], true);
        }
        //  print_r($find_post);exit;
        $this->set('find_post', $find_post);
        //////////
        $find_story = $this->GamingStory->find('all', array('conditions' => array('GamingStory.id', 'GamingStory.status' => 0)));
        foreach ($find_story as $k => $m) {
            $find_story[$k]['GamingStory']['image'] = Router::url("/" . $find_story[$k]['GamingStory']['image'], true);
            $find_story[$k]['GamingStory']['cover_image'] = Router::url("/" . $find_story[$k]['GamingStory']['cover_image'], true);
        }
        // print_r($find_story);exit;
        $this->set('find_story', $find_story);
    }

    public function approved_post($id) {
        $arr['Story']['id'] = $id;
        $arr['Story']['approved_post'] = 1;

        $this->Story->save($arr);

        $this->Flash->success(__('The Story has been saved.'));
        return $this->redirect(array('action' => 'home'));
        exit;
    }

    public function delete_userpost($id) {

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
        return $this->redirect(array('action' => 'user_post'));
    }

    public function live_stream() {
        $this->layout = 'home';
        $find_live = $this->LiveStream->find('all', array('conditions' => array('LiveStream.id'), 'order' => array('LiveStream.id' => 'DESC')));
        $this->set('find_live', $find_live);
    }

    public function add_live_stream() {
        $this->layout = 'home';
        $id = $this->Auth->user('id');
        $check_watermark = $this->User->find('first', array('conditions' => array('User.id' => $id)));
        $this->set('check_watermark', $check_watermark);
        if ($this->request->is('post')) {
            $this->LiveStream->create();
            $this->request->data['LiveStream']['live_slug'] = $this->slugQuestion($this->request->data['LiveStream']['live_title']);
            $this->request->data['LiveStream']['user_id'] = $id;

            $link = $this->request->data['LiveStream']['live_link'];
            $video_id = explode("?v=", $link);
            $video_id = $video_id[1];

            $this->request->data['LiveStream']['live_link'] = $video_id;
            $this->request->data['LiveStream']['live_status'] = 1;

            // print_r($this->request->data); exit;
            if ($this->LiveStream->save($this->request->data)) {
                $live_id = $this->LiveStream->getLastInsertID();
                $arr['LiveStream']['live_slug'] = $this->slugLive($this->request->data['LiveStream']['live_title'], $live_id);
                $arr['LiveStream']['id'] = $live_id;
                $this->LiveStream->save($arr);
                return $this->redirect(array('action' => 'live_stream'));
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
    }

    public function addwatermark() {
        $id = $this->Auth->user('id');
        // print_r();exit;
        $arr['User']['watermark'] = $this->request->data['name'];
        $arr['User']['id'] = $id;

        if ($this->User->save($arr)) {
            echo json_encode(array('status' => 'success', 'message' => 'The Watermark has been saved.'));
        }
        exit;
    }

    public function view_live() {
        $this->layout = 'home';
        if ($this->request->params['liveslug'] != '') {
            $c = $this->LiveStream->find('first', array('conditions' => array('LiveStream.live_slug' => $this->request->params['liveslug'])));
            if ($c) {
                $id = $c['LiveStream']['id'];
            }
        }
        $find_live = $this->LiveStream->find('first', array('conditions' => array('LiveStream.id' => $id)));
        $find_live['User']['profile_image'] = Router::url("/" . $find_live['User']['profile_image'], true);
        $this->set('find_live', $find_live);
        //print_r($find_live);exit;
        ////////////////////////////////////////////////////////////////////////////////////find youtube profile
    }

    public function gaming_profile() {
        $this->layout = 'home';
        $id = $this->Auth->user('id');
        if ($this->request->is(array('put', 'post'))) {
            // print_r($this->request->data);exit;
            if ($this->User->save($this->request->data)) {
                return $this->redirect(array('controller' => 'users', 'action' => 'gaming_profile'));
            } else {
                $this->Flash->error(__('The youtube_profile could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $imge = $this->request->data = $this->User->find('first', $options);
        }
    }

    public function trending() {
        $this->layout = 'home';

        $find_live = $this->TrendingVideo->find('all');
        //$log = $this->TrendingVideo->getDataSource()->getLog(false, false);
        //debug($log);exit;
        $this->set('find_live', $find_live);
        //print_r($find_live);
        //exit;
    }

    public function add_video() {
        //TrendingVideo
        $this->layout = 'home';
        $id = $this->Auth->user('id');
        $check_watermark = $this->User->find('first', array('conditions' => array('User.id' => $id)));
        $this->set('check_watermark', $check_watermark);
        if ($this->request->is('post')) {
            $this->TrendingVideo->create();
            $link = $this->request->data['TrendingVideo']['trending_video_link'];
            $video_id = explode("?v=", $link);
            $video_id = $video_id[1];
            $this->request->data['TrendingVideo']['trending_video_link'] = $video_id;
            $this->request->data['TrendingVideo']['user_id'] = $id;


            if ($this->TrendingVideo->save($this->request->data)) {
                $trending_id = $this->TrendingVideo->getLastInsertID();
                $arr['TrendingVideo']['trending_slug'] = $this->slugTreding($this->request->data['TrendingVideo']['trending_video_title'], $trending_id);
                $arr['TrendingVideo']['id'] = $trending_id;
                $this->TrendingVideo->save($arr);
                return $this->redirect(array('action' => 'trending'));
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
    }

    public function view_video() {
        $this->layout = 'home';
        if ($this->request->params['trendingslug'] != '') {
            $c = $this->TrendingVideo->find('first', array('conditions' => array('TrendingVideo.trending_slug' => $this->request->params['trendingslug'])));
            if ($c) {
                $id = $c['TrendingVideo']['id'];
            }
        }
         
        $find_live = $this->TrendingVideo->find('first', array('conditions' => array('TrendingVideo.id' => $id)));
        
        $find_live['User']['profile_image'] = Router::url("/" . $find_live['User']['profile_image'], true);
        $this->set('find_live', $find_live);
      // print_r($find_live);exit;
    }

    public function create_upcomeing() {
        $this->layout = 'home';
        //UpcomingGame
        if ($this->request->is('post')) {
            $this->UpcomingGame->create();
//            if ($this->request->data['UpcomingGame']['cimage'] != "") {
//                $sFileName = time() . "_" . str_replace(" ", "_", md5(time() . rand(1111, 99999)));
//                $sPath = "UpcomingGame";
//                $file = $this->Pk->uploadImageBase64($this->request->data['UpcomingGame']['cimage'], $sFileName, $sPath);
//                if ($file['status'] == 'success') {
//                    unset($this->request->data['UpcomingGame']['image']);
//                    $this->request->data['UpcomingGame']['image'] = $file['url'];
//                } else {
//                    $this->request->data['UpcomingGame']['image'] = "";
//                }
//            } else {
//                unset($this->request->data['UpcomingGame']['image']);
//            }

            if ($this->request->data['UpcomingGame']['image'] != "") {

                $sFileName = time() . "_" . str_replace(" ", "_", md5(time() . rand(1111, 99999)));
                $sPath = "UpcomingGame";
                $file = $this->Pk->uploadImage($this->request->data['UpcomingGame']['image'], $sFileName, $sPath);
                if ($file['status'] == 'success') {
                    unset($this->request->data['UpcomingGame']['image']);
                    $this->request->data['UpcomingGame']['image'] = $file['url'];
                } else {
                    $this->request->data['UpcomingGame']['image'] = "";
                }
            } else {
                unset($this->request->data['UpcomingGame']['image']);
            }
            // print_r($this->request->data);exit;
            if ($this->UpcomingGame->save($this->request->data)) {
                $upcoming_id = $this->UpcomingGame->getLastInsertID();
                $arr['UpcomingGame']['upcoming_games_slug'] = $this->slugUpcomingGame($this->request->data['UpcomingGame']['title'], $upcoming_id);
                $arr['UpcomingGame']['id'] = $upcoming_id;
                $this->UpcomingGame->save($arr);
                return $this->redirect(array('action' => 'home'));
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
    }

    public function test() {
        $this->layout = 'home';
    }

    public function getdatabycategory() {
        if ($this->request->is('ajax')) {
            $category = $this->request->data['obj_name'];
            $ajax_find = $this->Story->find('all', array('conditions' => array('Story.id', 'Story.approved_post' => 1
                    , 'Story.story_catogory' => $category), 'order' => array('Story.id' => 'DESC'), 'recursive' => -1));

            foreach ($ajax_find as $i => $j) {
                $ajax_find[$i]['Story']['image'] = Router::url("/" . $ajax_find[$i]['Story']['image'], true);
                $ajax_find[$i]['Story']['main_img'] = Router::url("/" . $ajax_find[$i]['Story']['main_img'], true);
            }
            //     print_r($category);exit;
            $this->set('ajax_find', $ajax_find);
        }
    }

    public function new_story() {
        $this->layout = 'home';
        //GamingStory
    }

    public function gaming_story() {

        $this->layout = 'home';
        if ($this->request->is('post')) {
            $this->GamingStory->create();

            if ($this->request->data['GamingStory']['youtube_link'] != "") {
                $link = $this->request->data['GamingStory']['youtube_link'];
                $video_id = explode("?v=", $link);
                $video_id = $video_id[1];
                $this->request->data['GamingStory']['youtube_link'] = $video_id;
            } else {
                $this->request->data['GamingStory']['youtube_link'] = '';
            }

            if ($this->request->data['GamingStory']['image']['name'] != "") {
                $sFileName = time() . "_" . str_replace(" ", "_", $this->request->data['GamingStory']['image']['name']);
                $sPath = "story";
                $file = $this->Pk->uploadImage($this->request->data['GamingStory']['image'], $sFileName, $sPath);

                if ($file['status'] == 'success') {
                    unset($this->request->data['GamingStory']['image']);
                    $this->request->data['GamingStory']['image'] = $file['url'];
                } else {
                    $this->request->data['GamingStory']['image'] = "";
                }
            } else {
                unset($this->request->data['GamingStory']['image']);
            }
            if ($this->request->data['GamingStory']['cover_image']['name'] != "") {
                $sFileName = time() . "_" . str_replace(" ", "_", $this->request->data['GamingStory']['cover_image']['name']);
                $sPath = "story";
                $file = $this->Pk->uploadImage($this->request->data['GamingStory']['cover_image'], $sFileName, $sPath);

                if ($file['status'] == 'success') {
                    unset($this->request->data['GamingStory']['cover_image']);
                    $this->request->data['GamingStory']['cover_image'] = $file['url'];
                } else {
                    $this->request->data['GamingStory']['cover_image'] = "";
                }
            } else {
                unset($this->request->data['GamingStory']['cover_image']);
            }
            // print_r($this->request->data);exit;
            // $this->request->data['Story']['story_slug'] = $this->slugStory($this->request->data['Story']['title']);
            $user = $this->Auth->user('id');
            $this->request->data['GamingStory']['user_id'] = $user;
            $this->request->data['GamingStory']['story_type'] = 2;
            if ($this->GamingStory->save($this->request->data)) {

                $gaming_id = $this->GamingStory->getLastInsertID();
                $arr['GamingStory']['gaming_slug'] = $this->gamingSlugStory($this->request->data['GamingStory']['title'], $gaming_id);
                $arr['GamingStory']['id'] = $gaming_id;
                $this->GamingStory->save($arr);
                $this->Flash->pending_popup(__('The GamingStory has been saved.'));
                return $this->redirect(array('action' => 'my_post'));
            } else {
                $this->Flash->error(__('The GamingStory could not be saved. Please, try again.'));
            }
        }
    }

    public function edit_mystory($id) {
        $this->layout = 'home';

        $cc = $this->GamingStory->find('first', array('conditions' => array('GamingStory.id' => $id), 'recursive' => -1));

        $cc['GamingStory']['cover_image'] = Router::url("/" . $cc['GamingStory']['cover_image'], true);
        $cc['GamingStory']['image'] = Router::url("/" . $cc['GamingStory']['image'], true);

        $this->set('cc', $cc);

        //   print_r($cc);exit;
        if ($this->request->is(array('post', 'put'))) {

            if ($this->request->data['GamingStory']['youtube_link'] != "") {
                $link = $this->request->data['GamingStory']['youtube_link'];
                $video_id = explode("?v=", $link);
                $video_id = $video_id[1];
                $this->request->data['GamingStory']['youtube_link'] = $video_id;
            } else {
                unset($this->request->data['GamingStory']['youtube_link']);
            }
            // print_r($this->request->data);exit;
            if ($this->request->data['GamingStory']['cover_image']['name'] != "") {
                $sFileName = time() . "_" . str_replace(" ", "_", $this->request->data['GamingStory']['cover_image']['name']);
                $sPath = "story";
                $file = $this->Pk->uploadImage($this->request->data['GamingStory']['cover_image'], $sFileName, $sPath);

                if ($file['status'] == 'success') {
                    unset($this->request->data['GamingStory']['cover_image']);
                    $this->request->data['GamingStory']['cover_image'] = $file['url'];
                } else {
                    $this->request->data['GamingStory']['cover_image'] = "";
                }
            } else {
                unset($this->request->data['GamingStory']['cover_image']);
            }

            if ($this->request->data['GamingStory']['image']['name'] != "") {
                $sFileName = time() . "_" . str_replace(" ", "_", $this->request->data['GamingStory']['image']['name']);
                $sPath = "story";
                $file = $this->Pk->uploadImage($this->request->data['GamingStory']['image'], $sFileName, $sPath);

                if ($file['status'] == 'success') {
                    unset($this->request->data['GamingStory']['image']);
                    $this->request->data['GamingStory']['image'] = $file['url'];
                } else {
                    $this->request->data['GamingStory']['image'] = "";
                }
            } else {
                unset($this->request->data['GamingStory']['image']);
            }


            $this->request->data['GamingStory']['id'] = $id;
            //print_r($this->request->data);exit;
            if ($this->GamingStory->save($this->request->data)) {
                $this->Flash->success(__('The GamingStory has been saved.'));
                return $this->redirect(array('action' => 'my_post'));
            } else {
                $this->Flash->error(__('The GamingStory could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('GamingStory.' . $this->GamingStory->primaryKey => $id));
            $this->request->data = $this->GamingStory->find('first', $options);
        }
    }

    public function readstory() {
        $this->layout = 'home';

        $find_user = $this->Auth->user('id');
        $this->set('find_user', $find_user);
        if ($this->request->params['mystoryslug'] != '') {
            $c = $this->GamingStory->find('first', array('conditions' => array('GamingStory.gaming_slug' => $this->request->params['mystoryslug'])));
            if ($c) {
                $id = $c['GamingStory']['id'];
            }
        }
// print_r($id);exit;

        $findmystory = $this->GamingStory->find('first', array('conditions' => array('GamingStory.id' => $id)));
        $findmystory['GamingStory']['image'] = Router::url("/" . $findmystory['GamingStory']['image'], true);
        $findmystory['GamingStory']['cover_image'] = Router::url("/" . $findmystory['GamingStory']['cover_image'], true);
        $this->set('meta_decscriptoi', $findmystory['GamingStory']['title']);
        $this->set('findmystory', $findmystory);
    }

    public function approved_story($id) {
        $arr['GamingStory']['id'] = $id;
        $arr['GamingStory']['status'] = 1;

        $this->GamingStory->save($arr);

        $this->Flash->success(__('The GamingStory has been saved.'));
        return $this->redirect(array('action' => 'user_post'));
        exit;
    }

    public function delete_userstory($id) {

        $this->GamingStory->id = $id;
        if (!$this->GamingStory->exists()) {
            throw new NotFoundException(__('Invalid GamingStory'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->GamingStory->delete()) {
            //   $this->Flash->success(__('The Story has been deleted.'));
        } else {
            $this->Flash->error(__('The GamingStory could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'user_post'));
    }
    public function delete_video($id) {

        $this->TrendingVideo->id = $id;
        if (!$this->TrendingVideo->exists()) {
            throw new NotFoundException(__('Invalid TrendingVideo'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->TrendingVideo->delete()) {
            //   $this->Flash->success(__('The Story has been deleted.'));
        } else {
            $this->Flash->error(__('The TrendingVideo could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'manage_vidoes'));
    }

    public function manage_vidoes() {
        $this->layout = 'home';
        $find_user = $this->Auth->user('id');
        $find_video = $this->TrendingVideo->find('all', array('conditions' => array('TrendingVideo.user_id' => $find_user),'recursive'=>-1));
        $this->set('find_video', $find_video);
       
    }

}
