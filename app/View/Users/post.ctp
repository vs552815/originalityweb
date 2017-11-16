<div class="container">
    <div class="row">
        <?php echo $this->Form->create('Story', array('enctype' => 'multipart/form-data')); ?>
        <!-- Message body -->

        <div class="form-group">
            <div style="width:50%;float:left;">
                <p style="text-align:center;font-weight: bold;">Header Image</p>
                <div style="width:50%;margin: 0 auto;">
                    <div class="col-lg-12 col-md-12 " >
                        <div id="cttt" style="display:none;"><div id="upload-cpnyimg"></div>
                            <div ><a class="btn btn-success upload-cimg"  style="    width: 100%;">Crop Image</a> </div>
                        </div> 
                        <?php echo $this->Html->image('http://www.dadophotography.com/wp/wp-content/uploads/2015/09/camera-logo-512.png', array('style' => 'width:100%;cursor:pointer;', 'id' => 'select-cmpnyimg')); ?><br>
                        <?php echo $this->Form->file('Story.main_img', array('id' => 'my_cimg', 'style' => 'display:none')); ?> 
                        <?php echo $this->Form->input('main', array('type' => 'hidden', 'id' => 'hiddenfield_cimg')); ?>
                    </div>
                </div>   
            </div>  


            <div style="width:50%;float:left;">
                <p style="text-align:center;font-weight: bold;">Header Image</p>
                <div style="width:50%;margin: 0 auto;">
                    <div class="col-lg-12 col-md-12 " >
                        <div id="cttt1" style="display:none;"><div id="upload-cpnyimg1"></div>
                            <div ><a class="btn btn-success upload-cimg1"  style="    width: 100%;">Crop Image</a> </div>
                        </div> 
                        <?php echo $this->Html->image('http://www.dadophotography.com/wp/wp-content/uploads/2015/09/camera-logo-512.png', array('style' => 'width:100%;cursor:pointer;', 'id' => 'select-cmpnyimg1')); ?><br>
                        <?php echo $this->Form->file('Story.image', array('id' => 'my_cimg1', 'style' => 'display:none')); ?>   
                        <?php echo $this->Form->input('cimage', array('type' => 'hidden', 'id' => 'hiddenfield_cimg1')); ?>
                    </div>
                </div>   
            </div> 

        </div>  

        <div class="form-group">
            <lable id="view-lable">title</lable>
            <?php echo $this->Form->input('title', array('class' => 'form-control', 'div' => false, 'required', 'label' => false)); ?>
        </div>
        <div class="form-group">
            <lable id="view-lable">stroy</lable>
            <?php echo $this->Form->input('stroy', array('class' => 'form-control', 'div' => false, 'label' => false, 'id' => 'textbottom')); ?>
        </div>


        <button type="submit" class="btn-lg btn-primary" id="login-btn" >post</button>
        <?php echo $this->Form->end(); ?>       

    </div>
</div>