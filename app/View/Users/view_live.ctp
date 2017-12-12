<div class="container">
    <div class="col-sm-12">
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

    <div class="col-sm-12">
        <div class="col-sm-8">
            <iframe class="live-video"
                    src="<?php echo "https://www.youtube.com/embed/" . $find_live['LiveStream']['live_link'] ?>" frameborder="0" allowfullscreen>
            </iframe>

            <span  class="watermark-span"> <?php echo $find_live['User']['watermark'] ?></span>
        </div>
        <div class="col-sm-4">
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
        border: 3px dashed #bcbcbc;
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

</style>