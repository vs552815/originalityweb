<div class="container">
    
        <div class="" >
        <?php echo $this->Form->create('Story', array('enctype' => 'multipart/form-data')); ?>
        <!-- Message body -->
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
                        <?php echo $this->Html->image($cc['Story']['main_img'], array('style' => 'width:100%;cursor:pointer;', 'id' => 'select-cmpnyimg')); ?><br>
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
                        <?php echo $this->Html->image($cc['Story']['image'], array('style' => 'width:100%;cursor:pointer;', 'id' => 'select-cmpnyimg1')); ?><br>
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
            <lable id="view-lable">Google ad script</lable>
            <?php echo $this->Form->input('google_ad_code', array('class' => 'form-control', 'div' => false, 'label' => false)); ?>
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
    </div>
</div>