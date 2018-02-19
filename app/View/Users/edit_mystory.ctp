<div class="container">

 <?php echo $this->Form->create('GamingStory', array('enctype' => 'multipart/form-data')); ?>
    <div class="row" style="    margin-bottom: 50px;">
        <div class="col-lg-12" style="    padding: 15px;">
            <div class="form-group">

                <div style="width:50%;float:left;" class="logo-upload">
                        <label>Avator </label>

                        <?php
                        echo $this->Form->input('GamingStory.image', array('label' => false, 'type' => 'file', 'accept' => 'image/*'));
                        if (isset($this->request->data['GamingStory']['image']) && $this->request->data['GamingStory']['image'] != '') {
                            ?>
                            <?php echo $this->Html->image($cc['GamingStory']['image'], array('style' => 'width:100px;cursor:pointer;')); ?>
                        <?php } ?>
                    </div>  


                    <div style="width:50%;float:left;" class="logo-main">
                        <label>Cover Image </label>

                        <?php
                        echo $this->Form->input('GamingStory.cover_image', array('label' => false, 'type' => 'file', 'accept' => 'image/*'));
                        if (isset($this->request->data['GamingStory']['cover_image']) && $this->request->data['GamingStory']['cover_image'] != '') {
                            ?>
                            <?php echo $this->Html->image($cc['GamingStory']['cover_image'], array('style' => 'width:100px;cursor:pointer;')); ?>
                        <?php } ?>
                    </div> 

            </div>  
        </div>  
    </div>
    <div class="row">
        <div class="col-lg-12 panel panel-default" style="    padding: 15px;">
            <div class="form-group">
                <lable id="view-lable">Title*</lable>
                <?php echo $this->Form->input('GamingStory.title', array('class' => 'form-control', 'div' => false, 'required', 'label' => false)); ?>
            </div>
            <?php if($cc['GamingStory']['youtube_link'] == ''){ ?>
            <div class="form-group">
                <lable id="view-lable">Yotube Video Link</lable>
                <?php echo $this->Form->input('GamingStory.youtube_link', array('class' => 'form-control', 'div' => false, 'label' => false)); ?>
            </div>
              <?php } else{?>
             <div class="form-group">
                <lable id="view-lable">Yotube Video Link</lable>
                <?php echo $this->Form->input('GamingStory.youtube_link', array('class' => 'form-control', 'div' => false, 'label' => false,'disabled')); ?>
            </div>
              <?php }?>

            <div class="form-group">
                <lable id="view-lable">Category*</lable>
                <br>
                <?php
                echo $this->Form->input('GamingStory.gaming_catogory', array('type' => 'select', 'options' => array(
                        'ps4' => 'PS4',
                        'xbox' => 'XBOX',
                        'pc' => 'PC',
                        'movies' => 'MOVIES',
                        'tv' => 'TV',
                        'nintendo' => 'NINTENDO',
                        'other' => 'OTHER',
                    ), 'label' => false, 'empty' => 'Select-Category', 'style' => 'width:100%;',
                    'class' => 'form-control btn dropdown-toggle selectpicker btn-default', 'required'));
                ?>
            </div>
            <div class="form-group">
                <lable id="view-lable">Your Story*</lable>
                <br>
                <?php echo $this->Form->input('GamingStory.story', array('class' => 'form-control', 'div' => false, 'label' => false, 'id' => 'textbottom')); ?>
            </div>
            <button type="submit" class="btn-lg btn-primary btn-web-color" id="login-btn" style="width:100%;" >post</button>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>