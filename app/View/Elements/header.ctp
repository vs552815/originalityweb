<nav class="navbar navbar-inverse" style="    border-radius: 0px;">
  <div class="container-fluid">
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
          <?php $account_typ_id = $this->Session->read('Auth.User.account_type_id');
            if ($account_typ_id == 2) {?>
          <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'viewpost', 'users' => false)); ?>" >View My Post</a></li>
          <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'post', 'users' => false)); ?>" >New Post</a></li>
          <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'myprofile', 'users' => false)); ?>" >My Profile</a></li>
           <?php }else if($account_typ_id == 3){ ?>
          <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'myprofile', 'users' => false)); ?>" >My Profile</a></li>
           <?php } ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
          
          <?php $account_typ_id = $this->Session->read('Auth.User.account_type_id');
            if ($account_typ_id == 2) {?>
              <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'logout', 'users' => false)); ?>" >SIGN OUT</a></li>
            <?php }else if($account_typ_id == 3){ ?>  
              <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'logout', 'users' => false)); ?>" >SIGN OUT</a></li>
            <?php }else{ ?>
               <li><a href="javascript:void(0);" onclick="$('#SignupPopup').modal('show');" id="signup-btn" ><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="javascript:void(0);" onclick="$('#LoginPopup').modal('show');" id="signin-btn" ><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <?php }?>
      </ul>
    </div>
  </div>
</nav>