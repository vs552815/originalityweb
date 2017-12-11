<div class="container">
    <?php $account_typ_id = $this->Session->read('Auth.User.id');
    if (!empty($account_typ_id)) {
        ?>
    <?php echo $this->Form->create('Story', array('enctype' => 'multipart/form-data')); ?>

        <div class="row" style="    margin-bottom: 50px;">
            <div class="col-lg-12" style="    padding: 15px;">
                <div class="form-group">

                    <div style="width:50%;float:left;" class="logo-upload">
                        <p style="text-align:center;font-weight: bold;">Content Image</p>
                        <div style="width:50%;margin: 0 auto;" class="logo-upload1">
                            <div class="col-lg-12 col-md-12 " >
                                <div id="cttt" style="display:none;"><div id="upload-cpnyimg"></div>
                                    <div style="width:35%;margin:0 auto;" ><a class="btn btn-primary upload-cimg"  style="    width: 100%;">Crop Image</a> </div>
                                </div> 
                                <?php echo $this->Html->image('http://www.dadophotography.com/wp/wp-content/uploads/2015/09/camera-logo-512.png', array('style' => 'width:100%;cursor:pointer;', 'id' => 'select-cmpnyimg')); ?><br>
                                <?php echo $this->Form->file('Story.main_img', array('id' => 'my_cimg', 'style' => 'display:none')); ?> 
    <?php echo $this->Form->input('main', array('type' => 'hidden', 'id' => 'hiddenfield_cimg')); ?>
                            </div>
                        </div>   
                    </div>  


                    <div style="width:50%;float:left;" class="logo-main">
                        <p style="text-align:center;font-weight: bold;">Cover Image</p>
                        <div style="width:50%;margin: 0 auto;" class="logo-main1">
                            <div class="col-lg-12 col-md-12 " >
                                <div id="cttt1" style="display:none;"><div id="upload-cpnyimg1"></div>
                                    <div style="width:35%;margin:0 auto;" ><a class="btn btn-success upload-cimg1"  style="    width: 100%;">Crop Image</a> </div>
                                </div> 
                                <?php echo $this->Html->image('http://www.dadophotography.com/wp/wp-content/uploads/2015/09/camera-logo-512.png', array('style' => 'width:100%;cursor:pointer;', 'id' => 'select-cmpnyimg1')); ?><br>
                                <?php echo $this->Form->file('Story.image', array('id' => 'my_cimg1', 'style' => 'display:none')); ?>   
    <?php echo $this->Form->input('cimage', array('type' => 'hidden', 'id' => 'hiddenfield_cimg1')); ?>
                            </div>
                        </div>   
                    </div> 

                </div>  
            </div>  
        </div>
        <div class="row">
            <div class="col-lg-12 panel panel-default" style="    padding: 15px;">
                <div class="form-group">
                    <lable id="view-lable">Game Title*</lable>
    <?php echo $this->Form->input('title', array('class' => 'form-control', 'div' => false, 'required', 'label' => false)); ?>
                </div>

                <div class="form-group">
                    <lable id="view-lable">Yotube Video Link</lable>
    <?php echo $this->Form->input('youtube_link', array('class' => 'form-control', 'div' => false, 'label' => false)); ?>
                </div>

                <div class="form-group">
                    <lable id="view-lable">Game Story*</lable>
                    <br>
    <?php echo $this->Form->input('stroy', array('class' => 'form-control', 'div' => false, 'label' => false, 'id' => 'textbottom')); ?>
                </div>


                <button type="submit" class="btn-lg btn-primary btn-web-color" id="login-btn" style="width:100%;" >post</button>
    <?php echo $this->Form->end(); ?>
            </div>

        </div>
<?php } else { ?>
        <div class="alert alert-warning" style="text-align: center;">
            You must be logged in to create a post. <br><br>
            <span style="text-align:center">
                <a href="javascript:void(0);" onclick="$('#LoginPopup').modal('show');" id="signup-btn" class="hide-signup">Sign in</a>
                OR 
                <a href="javascript:void(0);" onclick="$('#SignupPopup').modal('show');" id="signup-btn" class="hide-login">Sign up</a>
            </span>
        </div>
<?php } ?>

</div>