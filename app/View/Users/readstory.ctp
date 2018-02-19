<!--
<div class="col-sm-12 well" style="border: 0px; height:120px;background-size: 50px 50px;   background: url(https://assets-a.thrillist.com/images/thrillist/background_pattern_2x.png) center center ">

</div>-->

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <h2 style="text-transform: uppercase;text-align: center;"><?php echo $findmystory['GamingStory']['title'] ?></h2>
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
                <?php echo $this->Html->image($findmystory['GamingStory']['cover_image'], array('style' => 'width:100%;')); ?>
            </div>
            <div  class="col-sm-12 well">
                <p><?php echo $findmystory['GamingStory']['story'] ?></p>
            </div>




        </div>
        <div class="col-lg-4 col-md-4 col-sm-4" >
            

            <?php if ($findmystory['GamingStory']['youtube_link'] != '') { ?>

                <div  class="col-sm-12 ">
                    <iframe width="100%" height="200px" src="<?php echo "https://www.youtube.com/embed/" . $findmystory['GamingStory']['youtube_link'] ?>" frameborder="0" allowfullscreen>
                </iframe>
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
        top: 50%;
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