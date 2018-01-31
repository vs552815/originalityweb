

<header class="header-section fixed-header">
    <div class="header-section-container">
        <div class="top-header">
            <ul class="fab-menu" id="fab-menu-mobile">
    <li>
        <a href="javascript:void(0)" class="material-shadow " id="open-menu">
            <i class="fa fa-bars" aria-hidden="true"></i> 
           <!-- <i class="fa fa-times" aria-hidden="true"></i> -->
        </a>

        <ul class="fab-menu-inner popout">

            <?php
            $account_typ_id = $this->Session->read('Auth.User.account_type_id');
            if ($account_typ_id == 2) {
                ?>
                <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'create_upcomeing', 'users' => false)); ?>" >
                  U <span class="tip-name">Upcoming Games</span></a></li>
                <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'viewpost', 'users' => false)); ?>" >
                       V<span class="tip-name"> View My Post</span>
                    </a></li>
                <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'user_post', 'users' => false)); ?>" >
                     V   <span class="tip-name">View User Post</span></a></li>
                <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'myprofile', 'users' => false)); ?>" >
                      M  <span class="tip-name">My Profile</span></a></li>
                <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'logout', 'users' => false)); ?>" >
                   S     <span class="tip-name">SIGN OUT</span></a></li>

<?php } else if ($account_typ_id == 3) { ?>
                   
                <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'youtube_profile', 'users' => false)); ?>" >
                      Y  <span class="tip-name">YouTube Profile</span></a></li>
                <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'myprofile', 'users' => false)); ?>" >
                     M   <span class="tip-name">My Profile</span></a></li>

                <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'my_post', 'users' => false)); ?>" >
                      M  <span class="tip-name">My Posts</span></a></li>
                <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'user_questions', 'users' => false)); ?>" >
                      M  <span class="tip-name">My Questions</span></a></li>
                <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'logout', 'users' => false)); ?>" >
                      S  <span class="tip-name">SIGN OUT</span></a></li>
                      
         
                      
<?php } else { ?>

                <li><a href="#" style="    border-left: 0px;" onclick="$('#LoginPopup').modal('show');" id="signin-btn">
                        L<span class="tip-name">Login</span> </a></li>
                <li><a href="#" onclick="$('#SignupPopup').modal('show');" id="signup-btn">
                      S <span class="tip-name">Sign up</span></a></li>
<?php } ?>

        </ul> 
                   


                    </ul>
    </li>
</ul>
    <div class="container">
        <div class="row">
            <div class="top-header-widget pt-0 pb-0">
                <div class="top-header-widget-container mtl">
                    <div class="navbar-header">
                        <a href="index-construction.html" class="navbar-brand" title="PLUME" style="margin:0px;">
                            Originalityweb
                        </a>
                    </div>
                     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="fa fa-plus" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
          
            
            
        </div>
    </div>
</div>

        <div class="header-menu header-menu-center-side">

            <div class="header-menu" style=""><div class="header-menu-container">
                    
                    <nav class="navbar">

                        <div class="container">

                            <div class="row">

                                <div class="col-md-12">

                                    <div class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
                                        <ul class="nav navbar-nav">
                                            <li><a  class="go-live-header go-live-text" href="javascript:void(0);">Go Live</a></li>
                                            <li><a class="go-live-header" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'live_stream', 'users' => false)); ?>">
                                                    Live Streams</a></li>
                                            <li><a  class="go-live-header" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'trending', 'users' => false)); ?>"
                                                    >Trending</a></li>
                                            <li><a  href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'gaming_questions', 'users' => false)); ?>">Ask Questions</a></li>
                                            <li><a  href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'create_post', 'users' => false)); ?>">Create Post</a></li>
                                            <?php
                                            $account_typ_id = $this->Session->read('Auth.User.account_type_id');
                                            if ($account_typ_id == 2) {
                                                ?> 
                                                <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'post', 'users' => false)); ?>" >New Post</a></li>
                                                
                                            <?php } else if ($account_typ_id == 3) { ?>

<?php } ?>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>


                </div></div>
        </div>
    </div>
</header>
