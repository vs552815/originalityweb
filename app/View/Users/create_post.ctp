<div class="container">
   
   
    <?php $account_typ_id = $this->Session->read('Auth.User.id');
    if (!empty($account_typ_id)) {
        ?>
<!--     <div class="row">
         <h3 style="    text-align: center;
    background: #0000004a;
    width: 100%;
    padding: 10px;
    color: #fff;">Create your own Gaming story</h3>
        
        
    </div>-->
    <?php echo $this->Form->create('Story', array('enctype' => 'multipart/form-data')); ?>

        <div class="row" style="    margin-bottom: 50px;">
            <h3 class="charts--headline">Your Gateway to create your own Game News/Story, Entertainment News<br>upcoming game details <b>Anything</b>.</h3>
            <div class="col-lg-12" style="    padding: 15px;">
                <div class="form-group">

                    <div style="width:50%;float:left;" class="logo-upload">
                        <label>Avator </label>
                         <?php echo $this->Form->file('Story.main_img', array()); ?>   
                    </div>  


                    <div style="width:50%;float:left;" class="logo-main">
                         <label>Cover Image </label>
                       <?php echo $this->Form->file('Story.image', array('required')); ?> 
                    </div> 

                </div>  
            </div>  
        </div>
        <div class="row">
            <div class="col-lg-12 panel panel-default" style="    padding: 15px;">
                <div class="form-group">
                    <lable id="view-lable">Title*</lable>
    <?php echo $this->Form->input('Story.title', array('class' => 'form-control', 'div' => false, 'required', 'label' => false)); ?>
                </div>

                <div class="form-group">
                    <lable id="view-lable">Yotube Video Link</lable>
    <?php echo $this->Form->input('Story.youtube_link', array('class' => 'form-control', 'div' => false, 'label' => false)); ?>
                </div>
                
                
         <div class="form-group">
            <lable id="view-lable">Category*</lable>
            <br>
             <?php
                            echo $this->Form->input('Story.story_catogory', array('type' => 'select', 'options' => array(
                                    'ps4' => 'PS4',
                                    'xbox' => 'XBOX',
                                    'pc' => 'PC',
                                    'movies' => 'MOVIES',
                                    'tv' => 'TV',
                                    'nintendo' => 'NINTENDO',
                                    'other' => 'OTHER',
                                ), 'label' => false, 'empty' => 'Select-Category', 'style' => 'width:100%;',
                                'class' => 'form-control btn dropdown-toggle selectpicker btn-default','required'));
                            ?>
        </div>

                <div class="form-group">
                    <lable id="view-lable">Your Story*</lable>
                    <br>
    <?php echo $this->Form->input('stroy', array('class' => 'form-control', 'div' => false, 'label' => false, 'id' => 'textbottom')); ?>
                </div>


                <button type="submit" class="btn-lg btn-primary btn-web-color" id="login-btn" style="width:100%;" >post</button>
    <?php echo $this->Form->end(); ?>
            </div>

        </div>
<?php } else { ?>
        <div class="alert alert-warning" style="text-align: center;">
            You must be logged in to create a Story. <br><br>
            <span style="text-align:center">
                <a href="javascript:void(0);" onclick="$('#LoginPopup').modal('show');" id="signup-btn" class="hide-signup">Sign in</a>
                OR 
                <a href="javascript:void(0);" onclick="$('#SignupPopup').modal('show');" id="signup-btn" class="hide-login">Sign up</a>
            </span>
        </div>
<?php } ?>

</div>