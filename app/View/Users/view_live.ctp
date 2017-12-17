<div class="container">
    <div class="col-sm-12">
        <div style="padding: 15px;">
        <blockquote class="quote-box">
            <div class="blog-post-actions">
                <p class="blog-post-bottom pull-left">
                    <?php echo $find_live['LiveStream']['live_title'] ?>
                </p>
                <p class="blog-post-bottom pull-right">
                    <span class="badge quote-badge">896 <i class="fa fa-users" aria-hidden="true"></i></span> 
                </p>
            </div>
        </blockquote>
    </div>
    </div>

    <div class="col-sm-12">
        <div class="col-sm-8">
            <iframe class="live-video"
                    src="<?php echo "https://www.youtube.com/embed/" . $find_live['LiveStream']['live_link'] ?>" frameborder="0" allowfullscreen>
            </iframe>

            <span  class="watermark-span"> <?php echo $find_live['User']['watermark'] ?></span>
        </div>
        <div class="col-sm-4">
           <div class="col-sm-12">
       
            <div class="list-group">
                <a href="" class="list-group-item youtube">
                        <h3 class="pull-right">
                            <i class="fa fa-youtube-play"></i>
                        </h3>
                        <h4 class="list-group-item-heading count">Youtub</h4>
                        <p class="list-group-item-text">Subscribe</p>
                    </a>
                <a href="" class="list-group-item facebook-like">
                    <h3 class="pull-right">
                        <i class="fa fa-facebook-square"></i>
                    </h3>
                    <h4 class="list-group-item-heading count">
                        Facebook</h4>
                    <p class="list-group-item-text">
                         Like Page</p>
                </a><a href="" class="list-group-item google-plus">
                    <h3 class="pull-right">
                        <i class="fa fa-google-plus-square"></i>
                    </h3>
                    <h4 class="list-group-item-heading count">
                        Google+</h4>
                    <p class="list-group-item-text">
                        Like Page</p>
                </a><a href="" class="list-group-item twitter">
                    <h3 class="pull-right">
                        <i class="fa fa-twitter-square"></i>
                    </h3>
                    <h4 class="list-group-item-heading count">
                        Twitter</h4>
                    <p class="list-group-item-text">
                        Like Page</p>
                </a>
           
        </div>  
        </div>    
            
            
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
     
          
        </div>
        
        
        

    </div>

</div>

<style>
    .watermark-span{
        font-size: 34px;
        color: #ded8d857;
        position: absolute;
        bottom: 50px;
        right: 35px;
    }
    .live-video{
        width: 100%;
        height: 480px;
        position: relative;
    }

    @media screen and (max-width: 980px) {
        .live-video{
            width: 100%;
            height: 350;
        }
    }

    @media screen and (max-width: 780px) {
        .live-video{
            width: 100%;
            height: 250;
        }
    }


    @media screen and (max-width: 500px) {
        .live-video{
            width: 100%;
            height: auto;
        }
    }

    blockquote{
        border-left:none
    }

    .quote-badge{
        background-color: rgba(0, 0, 0, 0.2);   
        font-size: 16px;
    }

    .quote-box {
        overflow: hidden;
        border-radius: 0px;
        background-color: #4ADFCC;
        color: white;
        box-shadow: 2px 2px 2px 2px #E0E0E0;
    }
    .blog-post-bottom{
        margin: 0px;
    }


    .quote-text{

        font-size: 19px;
        margin-top: -65px;
    }

    .coupon {
        border: 1px dashed #bcbcbc;
        border-radius: 10px;

        font-weight: 300;
    }

    .coupon #head {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        min-height: 56px;
    }

    .coupon #footer {
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    #title .visible-xs {
        font-size: 12px;
    }

    
    
    a { transition: all .3s ease;-webkit-transition: all .3s ease;-moz-transition: all .3s ease;-o-transition: all .3s ease; }
/* Visitor */
a.visitor i,.visitor h4.list-group-item-heading { color:#E48A07; }
a.visitor:hover { background-color:#E48A07; }
a.visitor:hover * { color:#FFF; }
/* Facebook */
a.facebook-like i,.facebook-like h4.list-group-item-heading { color:#3b5998; }
a.facebook-like:hover { background-color:#3b5998; }
a.facebook-like:hover * { color:#FFF; }
/* Google */
a.google-plus i,.google-plus h4.list-group-item-heading { color:#dd4b39; }
a.google-plus:hover { background-color:#dd4b39; }
a.google-plus:hover * { color:#FFF; }
/* Twitter */
a.twitter i,.twitter h4.list-group-item-heading { color:#00acee; }
a.twitter:hover { background-color:#00acee; }
a.twitter:hover * { color:#FFF; }
/* Linkedin */
a.linkedin i,.linkedin h4.list-group-item-heading { color:#0e76a8; }
a.linkedin:hover { background-color:#0e76a8; }
a.linkedin:hover * { color:#FFF; }
/* Tumblr */
a.tumblr i,.tumblr h4.list-group-item-heading { color:#34526f; }
a.tumblr:hover { background-color:#34526f; }
a.tumblr:hover * { color:#FFF; }
/* Youtube */
a.youtube i,.youtube h4.list-group-item-heading { color:#c4302b; }
a.youtube:hover { background-color:#c4302b; }
a.youtube:hover * { color:#FFF; }
/* Vimeo */
a.vimeo i,.vimeo h4.list-group-item-heading { color:#44bbff; }
a.vimeo:hover { background-color:#44bbff; }
a.vimeo:hover * { color:#FFF; }
</style>