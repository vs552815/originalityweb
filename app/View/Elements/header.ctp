<nav class="navbar navbar-inverse " style="    border-radius: 0px;">
  <div class="container-fluid">
       <div class="btn-group loginsignup">
            <button type="button" class="btn btn-md btn-primary dropdown-toggle" data-toggle="dropdown" style="    color: #fff;
                    background-color: #000;
                    border: #000;
                    font-size: 27px;     padding-bottom: 0px;
    padding-top: 2px;
    padding-right: 0px;">
                <span class="caret"></span>

                <i class="fa fa-user-circle-o" aria-hidden="true"></i>
           </button>
            <ul class="dropdown-menu signup-new" role="menu">
                 <?php $account_typ_id = $this->Session->read('Auth.User.account_type_id');
                if ($account_typ_id == 2) {
                    ?>
                 <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'viewpost', 'users' => false)); ?>" >View My Post</a></li>
                   <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'user_post', 'users' => false)); ?>" >View User Post</a></li>
                 <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'myprofile', 'users' => false)); ?>" >My Profile</a></li>
            <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'logout', 'users' => false)); ?>" >SIGN OUT</a></li>

                <?php } else if ($account_typ_id == 3) { ?>
            <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'youtube_profile', 'users' => false)); ?>" >YouTube Profile</a></li>
           <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'myprofile', 'users' => false)); ?>" >My Profile</a></li>
           
          <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'my_post', 'users' => false)); ?>" >My Posts</a></li>
          <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'user_questions', 'users' => false)); ?>" >My Questions</a></li>
          <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'logout', 'users' => false)); ?>" >SIGN OUT</a></li>
                <?php }else{ ?>
                
                <li><a href="#" style="    border-left: 0px;" onclick="$('#LoginPopup').modal('show');" id="signin-btn">
                        <i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>
                <li><a href="#" onclick="$('#SignupPopup').modal('show');" id="signup-btn">
                        <i class="fa fa-user-plus" aria-hidden="true"></i> Sign up</a></li>
                           <?php } ?>
                
            </ul> 
        </div>
    <div class="navbar-header">
       
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'home', 'users' => false)); ?>">Originalityweb</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
          <li><a  class="go-live-header go-live-text" >Go Live</a></li>
          <li><a class="go-live-header" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'live_stream', 'users' => false)); ?>">
                  Live Streams</a></li>
          <li><a  href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'gaming_questions', 'users' => false)); ?>">Ask Questions</a></li>
          <li><a  href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'create_post', 'users' => false)); ?>">Create Post</a></li>
          <?php $account_typ_id = $this->Session->read('Auth.User.account_type_id');
            if ($account_typ_id == 2) {?> 
          <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'post', 'users' => false)); ?>" >New Post</a></li>
          <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'create_news', 'users' => false)); ?>" >Create News</a></li>
           <?php }else if($account_typ_id == 3){ ?>
          
           <?php } ?>
      </ul>
      
    </div>
  </div>
</nav>