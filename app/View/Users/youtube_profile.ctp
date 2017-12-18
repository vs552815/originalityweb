<div class="container">

    <div style="text-align: center;"><h2>Create<small> Your profile.</small></h2></div>
    <br>
    <?php echo $this->Form->create('User', array('enctype' => 'multipart/form-data')); ?>
    <?php echo $this->Form->input('User.id'); ?>
    <div class="row" id="main">
  
        <div class="col-md-12 well" id="rightPanel">
            <div class="row">
                <div class="col-md-12">

                        <hr class="colorgraph">
                        
                        
                        
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                
                                 

                        
                        <div class="form-group">
                            <label>YouTube channel URL</label>
                            <?php echo $this->Form->input('User.youtube_page_link', array('class' => 'form-control input-lg', 'placeholder' => 'YouTube channel URL', 'label' => false, 'required')); ?>

                        </div>
                                
                        <div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
                                             <label>Twitter Page Link</label>
                           <?php echo $this->Form->input('User.twitter_page_link', array('class' => 'form-control input-lg', 'placeholder' => 'Twitter Page Link', 'label' => false, 'required')); ?>                 
                               
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
                                             <label>Facebook Page Link</label>
				  <?php echo $this->Form->input('User.facebook_page_link', array('class' => 'form-control input-lg', 'placeholder' => 'Facebook Page Link', 'label' => false, 'required')); ?>                 
                        
					</div>
				</div>
                            
                            
                            <div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
                                             <label>Google+ Page Link</label>
				  <?php echo $this->Form->input('User.google_page_link', array('class' => 'form-control input-lg', 'placeholder' => 'Google+ Page Link', 'label' => false, 'required')); ?>                 
                        
					</div>
				</div>
                            
			</div>
                        
                       
                         <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block btn-lg">Save</button>
                        </div>
                        </div>
                        </div>
                      
                       
                   
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
