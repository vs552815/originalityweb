<div class="container">
    <div class="row">
         <?php echo $this->Form->create('Story', array('enctype' => 'multipart/form-data')); ?>
        
         
       
            <!-- Message body -->
            <div class="form-group">
              <label class="col-md-3 control-label" for="message">Your message</label>
              <div class="col-md-9">
                  
                  <?php echo $this->Form->input('stroy', array( 'class' => 'form-control' , 'div' => false, 'required')); ?>
               
              </div>
            </div>
            
            <?php echo $this->Form->file('Story.image', array('id' => 'headshot_file')); ?>
            
            
            
         <button type="submit" class="btn-lg btn-primary" id="login-btn" >post</button>
        
        <?php echo $this->Form->end(); ?>       
        
    </div>
</div>