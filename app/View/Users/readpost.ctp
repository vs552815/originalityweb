
<div class="col-sm-12 well" style="border: 0px; height:120px;background-size: 50px 50px;   background: url(https://assets-a.thrillist.com/images/thrillist/background_pattern_2x.png) center center ">

</div>

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <h2 style="text-transform: uppercase;text-align: center;"><?php echo $findstory['Story']['title'] ?></h2>
        </div>
<!--        <div class="col-lg-4" style="text-align: right;margin-top: 15px;">
            <a href="https://www.facebook.com/"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a>
            <a href="https://twitter.com/"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a>
            <a href="https://plus.google.com/"><i id="social-gp" class="fa fa-google-plus-square fa-3x social"></i></a>    

        </div>-->
    </div>
    

    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 post-css">
            <div  class="col-sm-12 well">
                <?php echo $this->Html->image($findstory['Story']['image'], array('style' => 'width:100%;')); ?>
            </div>
            <div  class="col-sm-12 well">
               <p><?php echo $findstory['Story']['stroy'] ?></p>
            </div>
            
            <div class="col-sm-12" style="    padding: 0px;">
               
        <div class="panel panel-white post panel-shadow">
         <div class="alert alert-warning show-alert" style="display:none;text-align: center;">
         You must be logged first. <br>
        <span style="text-align:center">
         <a href="javascript:void(0);" onclick="$('#LoginPopup').modal('show');" id="signup-btn" class="hide-signup">Sign in</a>
        OR 
        <a href="javascript:void(0);" onclick="$('#SignupPopup').modal('show');" id="signup-btn" class="hide-login">Sign up</a>
        </span>
</div>
            <div class="post-footer">
                <div class="input-group"> 
                    <input class="form-control" placeholder="Add a comment" type="text" id="Comment_obj">
                    <span class="input-group-addon">
                        <span class="btn" id="checkLogin" rel="<?php echo $find_user ?>" data-id="<?php echo $findstory['Story']['id'] ?>"><i class="fa fa-edit"></i></span>  
                    </span>
                </div>
                <?php foreach ($findcomment as $ct){ ?>
                <ul class="comments-list" style="    margin-bottom: 40px;">
                    <li class="comment">
                        <a class="pull-left" href="#">
                            <?php echo $this->Html->image($ct['User']['profile_image'], array('class' => 'avatar')); ?>
                           
                        </a>
                        <div class="comment-body">
                            <div class="comment-heading">
                                <h4 class="user"><?php echo $ct['User']['fullname'] ?></h4>
                                <h5 class="time"><?php  //echo $ct['Comment']['created_date']  ?></h5>
                            </div>
                            <p><?php  echo $ct['Comment']['comment']  ?></p>
                        </div>
                    
                    </li>
                </ul>
                <?php } ?>
            </div>
        </div>
  
            </div>
            
            
            
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
            <?php if($findstory['Story']['youtube_link']!=''){ ?>
            <div  class="col-sm-12 ">
                <iframe style="    width: 100%;height: 250px;" src="<?php echo $findstory['Story']['youtube_link'] ?>" frameborder="0" allowfullscreen></iframe>
            </div>
            
            <br><br>
            <?php } ?>
             <div  class="col-sm-12" style="text-align: center;position: relative;">
                <h4 class="h4-tag">TRENDING </h4>
                <?php echo $this->Html->image($findstory['Story']['image'], array('style' => 'width:100%;')); ?>
<!--                <h4> <?php //echo $findstory['Story']['title'] ?></h4>-->
            </div>
            
            <?php if($findstory['Story']['google_ad_code']!=''){ ?>
            <br><br>
            <div class="col-sm-12">
                <?php echo $findstory['Story']['google_ad_code'] ?>
            </div>
            <?php } ?>
           
         
            
        </div>


    </div>
    </div>
    <br><br>

    <style>
        .h4-tag{
            margin-top: 0px;
            position: absolute;
            top: 35%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #fff;
            background: rgba(45, 44, 44, 0.32);
            padding: 5px;

        }
        .pb-cmnt-textarea {
            resize: none;
            padding: 20px;
            height: 130px;
            width: 100%;
            border: 1px solid #F2F2F2;
        }
        img{width:100%!important;}
        hr.style11{
            height: 6px;
            background: url(http://ibrahimjabbari.com/english/images/hr-11.png) repeat-x 0 0;
            border: 0;
        }
    </style>