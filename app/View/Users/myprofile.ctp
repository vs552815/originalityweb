<!-- FONTS --><!-- Roboto, Yellowtail, and Montserrat -->
<!-- PAGE STUFF -->
<?php
if ($finduser['User']['profile_image'] != '') {
    $img = Router::url("/" . $finduser['User']['profile_image'], true);
} else {
    $img = Router::url("/img/images/add_image.png", true);
}
?>
<div class="container">
     <div class="row">
        <div class="rela-block profile-card text-center" style="margin-top: 0px!important;padding: 10px;">
            <h3 >My Profile</h3>
        </div>
        
    </div>
    <div class="row">
        <div class="rela-block profile-card" >
        <div class="profile-pic" id="profile_pic"></div>
        <div class="rela-block profile-name-container">
            <div class="rela-block user-name" id="user_name"><?php echo $finduser['User']['fullname'] ?></div>
            <a class="btn btn-default" href="<?php echo $this->Html->url(array('action' => 'editprofile', 'controller' => 'users', $finduser['User']['id'])); ?>">Edit Profile</a>
            <div class="rela-block user-desc" ><?php echo $finduser['User']['thought'] ?></div>
            <div class="rela-block user-desc" id="user_description"><?php echo $finduser['User']['description'] ?></div>
            
        </div>
<!--        <div class="rela-block profile-card-stats">
            <div class="floated profile-stat works" id="num_works">28<br></div>
            <div class="floated profile-stat followers" id="num_followers">112<br></div>
            <div class="floated profile-stat following" id="num_following">245<br></div>
        </div>-->
    </div>

    </div>
    
   
</div>
    



<style>
    .following::after {
  content: "following";
}
    #wrapper{background-color: #f4f4f4;}
    .floated {
  display: inline-block;
  position: relative;
  margin: false;
 
  float: left;
}
.floated.right {
  float: right;
}
    .followers::after {
  content: "followers";
}
    .works::after {
  content: "works";
}
    .profile-stat {
            font-family: "Roboto";
    font-size: 18px;
    letter-spacing: 2px;
    font-weight: 400;
    line-height: 24px;
  height: 100%;
  width: 33.3333%;
}
.profile-stat:after {
  color: #999;
}
.rela-block {
  display: block;
  position: relative;
  margin: auto;
  
}
.user-desc {
  letter-spacing: 1px;
  color: #999;
}
.profile-card-stats {
  height: 75px;
  padding: 10px 0px;
  text-align: center;
  overflow: hidden;
}
.user-name {
  font-family: "Montserrat";
  font-size: 24px;
  letter-spacing: 3px;
  font-weight: 400;
  line-height: 30px;
  margin-bottom: 12px;
}
.profile-name-container {
  margin: 0 auto 10px;
  padding: 10px;
  text-align: center;
}
.profile-card {
  width: calc(100% - 40px);
  padding-top: 100px;
  margin: 70px auto 30px;
  background-color: #fff;
  box-shadow: 0 2px 6px -2px rgba(0,0,0,0.26);
}
.profile-pic {
  display: false;
  position: absolute;
  margin: false;
  top: -90px;
  left: 50%;
  right: false;
  bottom: false;
  -webkit-transform: translateX(-50%);
          transform: translateX(-50%);
  height: 180px;
  width: 180px;
  border: 10px solid #fff;
  border-radius: 100%;
  background: url(<?php echo $img; ?>) center no-repeat;
  background-size: cover;
}
@media screen and (max-width: 550px) {
.profile-card-stats {

    padding: 0px;
  }
  .profile-pic {
    height: 140px;
    width: 140px;
    top: -70px;
  }
  .profile-card {
    padding-top: 70px;
    margin: 50px auto 30px;
  }
}
</style>