<div class="container" style="padding-bottom: 120px;">
    <h2 style="text-align:center;"><?php echo $Solution['Solution']['title'] ?></h2><br>
    <div class="row">
         <div class="col-sm-6">
                <div class="testimonials">
                    <div class="active item">
                        <div class="carousel-info" style="    margin-bottom: 15px;">
                             <?php echo $this->Html->image($Solution['User']['profile_image'],array('class'=>'pull-left')); ?>
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
            <?php if(!empty($che)){ ?>
              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">

                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <?php foreach ($che as $ch) { ?>
                    <li data-target="#carousel-example-generic" data-slide-to="<?php echo $ch['SolutionImage']['id'] ?>" class=""></li>
                <?php } ?>

            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <?php echo $this->Html->image('images/cloud-gaming.png', array('style' => 'width:100%;')); ?>
                </div>
                <?php foreach ($che as $ch) { ?>
                    <div class="item">

                        <?php echo $this->Html->image($ch['SolutionImage']['sloution_image'], array('style' => 'width:100%;')); ?>

                    </div>
                <?php } ?>
            </div>
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
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
                    <input class="form-control" placeholder="Add a comment" type="text" id="Comment_sol">
                    <span class="input-group-addon">
                        <span class="btn" id="commentLogin"  rel="<?php echo $Solution['Solution']['id'] ?>"><i class="fa fa-edit"></i></span>  
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
                            <p><?php  echo $ct['SolutionComment']['comment']  ?></p>
                        </div>
                    
                    </li>
                </ul>
                <?php } ?>

            </div>
        </div>
        </div>
        
        <div class="col-sm-6">
            <?php if($Solution['Solution']['video_link']!=''){ ?>
            <div  class="col-sm-12 ">
                <iframe style="    width: 100%;height: 250px;" src="<?php echo $Solution['Solution']['video_link']; ?>" frameborder="0" allowfullscreen></iframe>
            </div>
            
            <br><br>
            <?php } ?>
            
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
</style>