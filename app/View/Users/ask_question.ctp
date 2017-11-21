<div class="container">

<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
    			<h2>Ask Question <small>It's free and always will be.</small></h2>
			<hr class="colorgraph">
			 <?php echo $this->Form->create('Solution', array('enctype' => 'multipart/form-data')); ?>
                        
<!--                        <div class="form-group"> 
                        <label for="success" class="btn btn-default" style="font-size:16px;border:0px;">Ask as anonymous
                            <input type="checkbox" name="data[Solution][name_anonymous]" value="1" id="success" class="badgebox checkbox-check">
                        </label>
			</div>-->
                        
                         <div class="form-group">
                            <label>Share your video link if any "eg youtube"</label>
                                 <?php echo $this->Form->input('video_link', array('class' => 'form-control', 'div' => false,'placeholder'=>'Video link' ,'label' => false)); ?>
			</div>
                        
                        <div class="form-group">
                                 <?php echo $this->Form->input('title', array('class' => 'form-control', 'div' => false, 'required','placeholder'=>'Question' ,'label' => false)); ?>
			</div>
                       
                        
			<div class="form-group">
                                 <?php echo $this->Form->textarea('decscription', array('class' => 'form-control', 'div' => false, 'required','placeholder'=>'Decscription' ,'label' => false)); ?>
			</div>
                        
                        
                        <div class="form-group">
                <label>Upload <small> multiple images for frequent solutions </small></label>
                <?php echo $this->Form->input('SolutionImage.sloution_image.', array('type' => 'file', 'multiple')); ?>

            </div> 
			
			<hr class="colorgraph">
			<div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">Submit</button>
                        </div><br>
                         <?php echo $this->Form->end(); ?>       
		
	</div>
</div>

</div>

<style>
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