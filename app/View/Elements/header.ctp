<nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'home', 'users' => false)); ?>">Home</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
              
              <?php
            $account_typ_id = $this->Session->read('Auth.User.account_type_id');
            if ($account_typ_id == 2) {
                ?>
              <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'viewpost', 'users' => false)); ?>" >View My Post</a></li>
              <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'post', 'users' => false)); ?>" >New Post</a></li>
              <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'myprofile', 'users' => false)); ?>" >My Profile</a></li>
              <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'logout', 'users' => false)); ?>" >SIGN OUT</a></li>
           
            <?php }else{ ?>
           <li><a href="javascript:void(0);" onclick="$('#LoginPopup').modal('show');" id="signin-btn" >SIGN IN</a></li>
            <?php } ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>