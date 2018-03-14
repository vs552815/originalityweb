<div class="container">
    <div class="blog-top">
        <div class="col-sm-8">
            <?php echo $this->Html->image($findmystory['GamingStory']['cover_image'], array('style' => 'width:100%;')); ?>
            <div class="sharethis-inline-share-buttons" style="margin-top: 20px;text-align: left;"></div>
            <div class="blog-body">
                <h1 class="post-title"><?php echo $findmystory['GamingStory']['title'] ?></h1>
                <div class="post-credit">
                    By: <span><?php echo $findmystory['User']['fullname']; ?></span>
                    <br>
                    <?php echo date('M d,Y', strtotime($findmystory['GamingStory']['ct_dt'])); ?>, 
                    <?php echo date('h:i  A', strtotime($findmystory['GamingStory']['ct_dt'])); ?>
                </div>
                <section class="section-text" style="text-align:justify;">
                    <?php echo $findmystory['GamingStory']['story'] ?>
                </section>

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
                            <input class="form-control" placeholder="Add a comment" type="text" id="Comment_story">
                            <span class="input-group-addon">
                                <span class="btn diable-btn2" id="gamingcomment" rel="<?php echo $find_user ?>" data-id="<?php echo $findmystory['GamingStory']['id'] ?>"><i class="fa fa-edit"></i></span>  
                            </span>
                        </div>
                        <?php foreach ($findcomment as $ct) { ?>
                            <ul class="comments-list" style="    margin-bottom: 40px;">
                                <li class="comment">
                                    <a class="pull-left" href="#">
                                        <?php echo $this->Html->image($ct['User']['profile_image'], array('class' => 'avatar')); ?>

                                    </a>
                                    <div class="comment-body">
                                        <div class="comment-heading">
                                            <h4 class="user"><?php echo $ct['User']['fullname'] ?></h4>
                                            <h5 class="time"><?php //echo $ct['Comment']['created_date']     ?></h5>
                                        </div>
                                        <p><?php echo $ct['GamingStoriesComment']['comment'] ?></p>
                                    </div>

                                </li>
                            </ul>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
           <?php if ($findmystory['GamingStory']['youtube_link'] != '') { ?>

                <div  class="col-sm-12 ">
                    <iframe width="100%" height="200px" src="<?php echo "https://www.youtube.com/embed/" . $findmystory['GamingStory']['youtube_link'] ?>" frameborder="0" allowfullscreen>
                    </iframe>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

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

    .most-recent {
        font-family: "BodoniURW-RegObl", serif;
        border: 1px solid #9E9E9E;
        border-bottom: 5px solid #000;
        width: 100%;
    }
    .blog-top{
        margin-top: 40px;
    }
    .section-text {
        font-family: 'Source Sans Pro', sans-serif;
        font-size: 20px;
        letter-spacing: normal;
        word-spacing: normal;
        line-height: 1.65em;
        color: #333;

    }
    .post-credit{
        margin-bottom: 40px;
        font-size: 16px;
        line-height: 26px;
    }
    .post-credit span{
        font-weight: 100;
        font-family: "Spectral", serif;
        font-style: italic;
        text-decoration: none;
        display: inline-block;
        border-bottom: 1px solid black;
    }
    .post-subtitle
    {
        font-size: 20px;
        line-height: 24px;
        font-weight: 400;
        letter-spacing: 0;
        margin-bottom: 20px;
    }
    .post-title{      margin: 15px 0 7px 0;
                      font-weight: normal;
                      letter-spacing: 0;
    }
</style>