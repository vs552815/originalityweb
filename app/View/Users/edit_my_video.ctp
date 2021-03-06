<div class="container">
    <?php echo $this->Form->create('TrendingVideo', array('enctype' => 'multipart/form-data')); ?>
    <div class="row">
        <div class="col-lg-12 panel panel-default" style="padding: 15px;">
            
            <h3 style="text-align: center;">PROMOTE YOUR VIDEO</h3>
            
            <div class="form-group">
             <?php if($check_watermark['User']['watermark']==''){ ?>
                <a class="btn btn-lg btn-danger open-watermark-model" style="width:100%;" 
                        href="#" onclick="$('#watermark-model').modal('show');"
                        >Add Watermark</a>
              <?php }else{ ?> 
               
                <h4 style="text-align: center;">Watermark: <?php echo $check_watermark['User']['watermark']; ?> 
                    <a style="font-size: 12px;cursor: pointer;"  href="#" onclick="$('#edit-watermark-model').modal('show');">(edit)</a></h4>
                
              <?php } ?>  
           </div>
            
            <div class="form-group">
                <lable id="view-lable">Video Title*</lable>
                <?php echo $this->Form->input('trending_video_title', array('class' => 'form-control', 'div' => false, 'required', 'label' => false, 'placeholder' => 'Live Stream Title...')); ?>
            </div>

<!--            <div class="form-group">
                <lable id="view-lable">Youtube Video Link</lable>
                <?php //echo $this->Form->input('trending_video_link', array('class' => 'form-control', 'div' => false, 'label' => false, 'placeholder' => 'Live Stream Youtube URL...')); ?>
            </div>-->

            <!--             <div class="form-group">
                            <label>Upload <small> multiple images for frequent solutions </small></label>
            <?php //echo $this->Form->input('LiveStream.live_thumbnail.', array('type' => 'file', 'multiple')); ?>
                        </div> -->
            <button type="submit" class="btn-lg btn-primary btn-web-color" id="login-btn" style="width:100%;" >Save</button>
            <?php echo $this->Form->end(); ?>
        </div>

    </div>

</div>


<div class="modal fade" id="watermark-model" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form class="watermark-form">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Watermark</h4>
            </div>
            <div class="modal-body">
                <input type="text"  class="form-control  watermark-text" placeholder="Enter Watermark..."/>
                <a class="btn btn-danger watermark-btn" style="width: 100%;">Save</a>
            </div>
            <div class="modal-footer">
               
            </div>
                </form>
        </div>
    </div>
</div>


<div class="modal fade" id="edit-watermark-model" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form class="watermark-form">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Watermark</h4>
            </div>
            <div class="modal-body">
                <input type="text"  class="form-control  edit-watermark-text" placeholder="Enter Watermark..."/>
                <a class="btn btn-danger watermark-btn edit-watermark-btn" style="width: 100%;">Save</a>
            </div>
            <div class="modal-footer">
               
            </div>
                </form>
        </div>
    </div>
</div>