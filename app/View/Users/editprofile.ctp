<?php echo $this->Html->css(array('edit.css')); ?>
<?php
if ($imge['User']['profile_image'] != '') {
    $fileuser = Router::url("/" . $imge['User']['profile_image'], true);
} else {
    $fileuser = Router::url("/img/images/uploadPhotoAvatarGroup.png", true);
}
?>



<div class="container">
    <div style="text-align: center;"><h2>Edit your profile.<small>It's always easy</small></h2></div>
    <br>
    <?php echo $this->Form->create('User', array('enctype' => 'multipart/form-data')); ?>
    <?php echo $this->Form->input('User.id'); ?>
    <div class="row" id="main">
        <div class="col-md-4 well" id="leftPanel">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <?php echo $this->Html->image($fileuser, array('class' => 'img-circle img-thumbnail')); ?>

                        <h2><?php echo $imge['User']['fullname'] ?></h2>
                     
                        <div class="btn-group">
                            <?php echo $this->Form->file('User.profile_image', array('id' => 'my_file', 'accept' => 'image/*')); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 well" id="rightPanel">
            <div class="row">
                <div class="col-md-12">
                    <form role="form">

                        <hr class="colorgraph">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                
                        <div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                                             <label>Full Name</label>
                           <?php echo $this->Form->input('User.fullname', array('class' => 'form-control input-lg', 'placeholder' => 'Full Name', 'label' => false, 'required')); ?>                 
                               
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                                             <label>Contact Number</label>
				  <?php echo $this->Form->input('User.contact', array('class' => 'form-control input-lg', 'placeholder' => 'Contact Number', 'label' => false, 'required')); ?>                 
                        
					</div>
				</div>
			</div>
                         

                        
                        <div class="form-group">
                            <label>Email Address</label>
                            <?php echo $this->Form->input('User.email', array('class' => 'form-control input-lg', 'placeholder' => 'Email Address', 'label' => false, 'required')); ?>

                        </div>
                       
                            <div class="form-group">
                                <label>Description</label>
                                <?php echo $this->Form->input('User.description', array( 'class' => 'form-control input-lg', 'placeholder' => 'Description', 'label' => false, 'required')); ?>

                            </div>
                        </div>
                      
                        <hr class="colorgraph">
                        <div class="row text-center">

                            <button type="submit" class=" btn-success btn-block btn-lg">Save</button></div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <?php echo $this->Form->end(); ?>
</div>       




<style>
    #leftPanel{
        background-color:#0079ac;
        color:#fff;
        text-align: center;
    }

    #rightPanel{
        min-height:415px;
    }

    /* Credit to bootsnipp.com for the css for the color graph */
    .colorgraph {
        height: 5px;
        border-top: 0;
        background: #c4e17f;
        border-radius: 5px;
        background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
        background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
        background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
        background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
    }
</style>
