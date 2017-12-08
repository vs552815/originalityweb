<?php echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'); ?>
<script>
    $(document).ready(function () {
        $('.thumbnail').click(function () {
            $('.modal-body').empty();
            var title = $(this).parent('a').attr("title");
            $('.modal-title').html(title);
            $($(this).parents('div').html()).appendTo('.modal-body');
            $('#myModal').modal({show: true});
        });
    });
</script>


<div class="container" style="padding-bottom: 120px;">
    <h2 style="text-align:center;"><?php echo $Solution['Solution']['title'] ?></h2><br>
    <div class="row">


        <div class="col-sm-6">
            <div class="testimonials">
                <div class="active item">
                    <div class="carousel-info" style="    margin-bottom: 15px;">
                        <?php echo $this->Html->image($Solution['User']['profile_image'], array('class' => 'pull-left')); ?>
                        <div class="pull-left">
                            <span class="testimonials-name"><?php echo $Solution['User']['fullname'] ?></span>
                            <span class="testimonials-post"><?php echo $Solution['Solution']['title'] ?></span>
                        </div>
                    </div>
                    <blockquote><p><?php echo $Solution['Solution']['decscription'] ?></p></blockquote>

                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <?php if (!empty($che)) { ?>
                <?php foreach ($che as $ch) { ?>
                    <div class="col-lg-6 col-sm-4 col-xs-12">
                        <a title="<?php echo $ch['SolutionImage']['id'] ?>" href="#">
                            <?php echo $this->Html->image($ch['SolutionImage']['sloution_image'], array('class' => 'thumbnail img-responsive')); ?>
                        </a>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>

    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-white post panel-shadow">
                <div class="alert alert-warning show-alert" style="display:none;text-align: center;">
                    You must be logged in to comment a question. <br>
                    <span style="text-align:center">
                        <a href="javascript:void(0);" onclick="$('#LoginPopup').modal('show');" id="signup-btn" class="hide-signup">Sign in</a>
                        OR 
                        <a href="javascript:void(0);" onclick="$('#SignupPopup').modal('show');" id="signup-btn" class="hide-login">Sign up</a>
                    </span>
                </div>

                <div class="post-footer">
                    <div class="input-group"> 
                        <textarea class="form-control" placeholder="Add a comment" type="text" id="Comment_sol"></textarea>
                        <span class="input-group-addon">
                            <button class="btn diable-btn" id="commentLogin"  rel="<?php echo $Solution['Solution']['id'] ?>"><i class="fa fa-edit" ></i></button>  
                        </span>
                    </div>
                    <?php foreach ($findcomment as $ct) { ?>
                    
                    <ul class="list-unstyled ui-sortable">
                            <strong class="pull-left primary-font"><?php echo $ct['User']['fullname'] ?></strong>
                            </br>
                            <li class="ui-state-default"><?php echo $ct['SolutionComment']['comment'] ?></li>
                        </ul>
                    
                    <?php } ?>

                </div>
            </div>
         
        </div>

        <div class="col-sm-6">
            <?php if ($Solution['Solution']['video_link'] != '') { ?>
                <div  class="col-sm-12 ">
                    <iframe style="    width: 100%;height: 250px;" src="<?php echo $Solution['Solution']['video_link']; ?>" frameborder="0" allowfullscreen></iframe>
                </div>

                <br><br>
            <?php } ?>

        </div>

    </div>
</div>

<div tabindex="-1" class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <button class="close close-btn" type="button" data-dismiss="modal">×</button>	
            <div class="modal-body" style="    padding:0px;">

            </div>

        </div>
    </div>
</div>

<style>


    .testimonials blockquote {
        background: #f8f8f8 none repeat scroll 0 0;
        border: medium none;
        color: #666;
        display: block;
        font-size: 14px;
        line-height: 20px;
        padding: 15px;
        position: relative;
    }
    .testimonials blockquote::before {
        width: 0; 
        height: 0;
        right: 0;
        bottom: 0;
        content: " "; 
        display: block; 
        position: absolute;
        border-bottom: 20px solid #fff;    
        border-right: 0 solid transparent;
        border-left: 15px solid transparent;
        border-left-style: inset; /*FF fixes*/
        border-bottom-style: inset; /*FF fixes*/
    }
    .testimonials blockquote::after {
        width: 0;
        height: 0;
        right: 0;
        bottom: 0;
        content: " ";
        display: block;
        position: absolute;
        border-style: solid;
        border-width: 20px 20px 0 0;
        border-color: #e63f0c transparent transparent transparent;
    }
    .testimonials .carousel-info img {
        border: 1px solid #f5f5f5;
        border-radius: 150px !important;
        height: 75px;
        padding: 3px;
        width: 75px;
    }
    .testimonials .carousel-info {
        overflow: hidden;
        background: #cacaca;
        padding: 5px;
    }
    .testimonials .carousel-info img {
        margin-right: 15px;
    }
    .testimonials .carousel-info span {
        display: block;
    }
    .testimonials span.testimonials-name {
        color: #e6400c;
        font-size: 16px;
        font-weight: 300;
        margin: 15px 0 7px;
    }
    .testimonials span.testimonials-post {
        color: #656565;
        font-size: 12px;
    }
    .thumbnail{
        padding: 0!important;
        margin-bottom: 0!important;
        border-radius: 0!important;
        border:0px!important;
    }
    .close-btn{
        position: absolute;
        font-size: 50px;
        z-index: 1;
        color: #000;
        right: 0px;
        opacity: 2;
        font-weight: normal;
    }
</style>