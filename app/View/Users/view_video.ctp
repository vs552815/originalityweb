<div class="container">
<!--    <div class="col-sm-12">
        <div style="padding: 15px;">
            <blockquote class="quote-box">
                <div class="blog-post-actions">
                    <p class="blog-post-bottom pull-left">
                        <?php //echo $find_live['TrendingVideo']['trending_video_title'] ?>
                    </p>
                    <p class="blog-post-bottom pull-right">
                        <span class="badge quote-badge">896 <i class="fa fa-users" aria-hidden="true"></i></span> 
                    </p>
                </div>
            </blockquote>
        </div>
    </div>-->
<div class="row">
    <br>
    <div class="col-sm-12">
        <div class="col-sm-8">
            <iframe class="live-video"
                    src="<?php echo "https://www.youtube.com/embed/" . $find_live['TrendingVideo']['trending_video_link'] ?>" frameborder="0" allowfullscreen>
            </iframe>

            <span  class="watermark-span"> <?php echo $find_live['User']['watermark'] ?></span>
        </div>
        <div class="col-sm-4">
         
            <div class="col-sm-12">
                <div  id="green">

                    <div class="panel panel-success coupon">
                        <div class="panel-heading" id="head">
                            <div class="panel-title" id="title" style="text-align:center;">

                                <span>Info</span>
                            </div>
                        </div>
                        <div class="panel-body">
                            <?php echo $find_live['User']['fullname'] ?> <br>
                            <?php echo $find_live['User']['email'] ?><br>                                  
                            <?php echo $find_live['User']['description'] ?><br>    
                        </div>
                        <div class="panel-footer">

                            <div class="exp">Start: Sep 30, 2016 2:30 AM</div>
                        </div>
                    </div>

                </div>
            </div>
            
               <div class="col-sm-12">

                <div class="list-group">
                     <?php if ($find_live['User']['youtube_page_link'] == '') {  }else{ ?>
                    <a href="<?php echo $find_live['User']['youtube_page_link'];?>" class="list-group-item youtube" target="_blank">
                        <h3 class="pull-right">
                            <i class="fa fa-youtube-play"></i>
                        </h3>
                        <h4 class="list-group-item-heading count">Youtub</h4>
                            <p class="list-group-item-text">Subscribe</p>
                    </a>
                     <?php  } ?>
                     <?php if ($find_live['User']['facebook_page_link'] == '') {  }else{ ?>
                    <a href="<?php echo $find_live['User']['facebook_page_link'];?>" class="list-group-item facebook-like" target="_blank">
                        <h3 class="pull-right">
                            <i class="fa fa-facebook-square"></i>
                        </h3>
                        <h4 class="list-group-item-heading count">
                            Facebook</h4>
                        <p class="list-group-item-text">
                            Like Page</p>
                    </a>
                     <?php  } ?>
                    
                    <?php if ($find_live['User']['google_page_link'] == '') {  }else{ ?>
                    <a href="<?php echo $find_live['User']['google_page_link'];?>" class="list-group-item google-plus" target="_blank">
                        <h3 class="pull-right">
                            <i class="fa fa-google-plus-square"></i>
                        </h3>
                        <h4 class="list-group-item-heading count">
                            Google+</h4>
                        <p class="list-group-item-text">
                            Like Page</p>
                    </a>
                     <?php  } ?>
                     <?php if ($find_live['User']['twitter_page_link'] == '') {  }else{ ?>
                    <a href="<?php echo $find_live['User']['twitter_page_link'];?>" class="list-group-item twitter" target="_blank">
                        <h3 class="pull-right">
                            <i class="fa fa-twitter-square"></i>
                        </h3>
                        <h4 class="list-group-item-heading count">
                            Twitter</h4>
                        <p class="list-group-item-text">
                            Like Page</p>
                    </a>
                    <?php  } ?>
                </div>  
            </div>    



        </div>




    </div>
    <br>
    </div>

</div>

<style>
   
</style>