<div class="container">
    <?php echo $this->Form->create('LiveStream', array('enctype' => 'multipart/form-data')); ?>
    <div class="row">
        <div class="col-lg-12 panel panel-default" style="    padding: 15px;">
            
            <h3 style="text-align: center;">Create Live Stream</h3>
            
            
            <div class="form-group">
                <lable id="view-lable">Live Title*</lable>
                <?php echo $this->Form->input('live_title', array('class' => 'form-control', 'div' => false, 'required', 'label' => false, 'placeholder' => 'Live Stream Title...')); ?>
            </div>

            <div class="form-group">
                <lable id="view-lable">Live Youtube Video Link</lable>
                <?php echo $this->Form->input('live_link', array('class' => 'form-control', 'div' => false, 'label' => false, 'placeholder' => 'Live Stream Youtube URL...')); ?>
            </div>
            
            
              <div class="form-group" >
                  <label >Streaming Time </label><br>
                  <div class="input-group bootstrap-timepicker timepicker">
                      <?php echo $this->Form->input('streaimg_time', array('class' => 'form-control input-small', 'div' => false, 'label' => false, 'id' => 'timepicker1')); ?>
                      <span class="input-group-addon">Set Time</span>
                  </div>
            </div>

            <div class="form-group">
                <lable id="view-lable">Description*</lable>
                <br>
                <?php echo $this->Form->input('live_decescription', array('class' => 'form-control', 'div' => false, 'label' => false, 'id' => 'textbottom')); ?>
            </div>

            <!--             <div class="form-group">
                            <label>Upload <small> multiple images for frequent solutions </small></label>
            <?php //echo $this->Form->input('LiveStream.live_thumbnail.', array('type' => 'file', 'multiple')); ?>
                        </div> -->
            <button type="submit" class="btn-lg btn-primary btn-web-color" id="login-btn" style="width:100%;" >Live Now</button>
            <?php echo $this->Form->end(); ?>
        </div>

    </div>

</div>