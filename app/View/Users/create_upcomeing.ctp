<div class="container">
    <div class="row">
        <?php echo $this->Form->create('UpcomingGame', array('enctype' => 'multipart/form-data')); ?>
        <!-- Message body -->

        <div class="form-group">
            
            <?php echo $this->Form->file('UpcomingGame.image'); ?> 

        </div>  

       
        <div class="form-group">
            <lable id="view-lable">Title*</lable>
            <?php echo $this->Form->input('title', array('class' => 'form-control', 'div' => false, 'required', 'label' => false)); ?>
        </div>
        
        <div class="form-group">
            <lable id="view-lable">Release Date</lable>
            <?php echo $this->Form->input('release_date', array('class' => 'form-control', 'div' => false, 'label' => false)); ?>
        </div>
        
         <div class="form-group">
            <lable id="view-lable">Category*</lable>
            <br>
             <?php
                            echo $this->Form->input('ManageDesigner.item_category', array('type' => 'select', 'options' => array(
                                    'ps4' => 'PS4',
                                    'xbox' => 'XBOX',
                                    'pc' => 'PC',
                                    'movies' => 'MOVIES',
                                    'tv' => 'TV',
                                    'nintendo' => 'NINTENDO',
                                ), 'label' => false, 'empty' => 'Select-Category', 'style' => 'width:100%;',
                                'class' => 'form-control btn dropdown-toggle selectpicker btn-default','required'));
                            ?>
        </div>
        
        <div class="form-group">
            <lable id="view-lable">Description*</lable>
            <br>
            <?php echo $this->Form->input('description', array('class' => 'form-control', 'div' => false, 'label' => false, 'id' => 'textbottom')); ?>
        </div>


        <button type="submit" class="btn-lg btn-primary btn-web-color" id="login-btn" >post</button>
        <?php echo $this->Form->end(); ?>       

    </div>
</div>