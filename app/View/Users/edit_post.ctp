<div class="container">

    <div class="" >
        <?php echo $this->Form->create('Story', array('enctype' => 'multipart/form-data')); ?>
        <!-- Message body -->
        <div class="row" style="    margin-bottom: 50px;">
            <div class="col-lg-12" style="    padding: 15px;">

                <div class="form-group">

                    <div style="width:50%;float:left;" class="logo-upload">
                        <label>Avator </label>

                        <?php
                        echo $this->Form->input('Story.main_img', array('label' => false, 'type' => 'file', 'accept' => 'image/*'));
                        if (isset($this->request->data['Story']['main_img']) && $this->request->data['Story']['main_img'] != '') {
                            ?>
                            <?php echo $this->Html->image($dd['Story']['main_img'], array('style' => 'width:100px;cursor:pointer;')); ?>
                        <?php } ?>
                    </div>  


                    <div style="width:50%;float:left;" class="logo-main">
                        <label>Cover Image </label>

                        <?php
                        echo $this->Form->input('Story.image', array('label' => false, 'type' => 'file', 'accept' => 'image/*'));
                        if (isset($this->request->data['Story']['image']) && $this->request->data['Story']['image'] != '') {
                            ?>
                            <?php echo $this->Html->image($dd['Story']['image'], array('style' => 'width:100px;cursor:pointer;')); ?>
                        <?php } ?>
                    </div> 

                </div>   

            </div>  
        </div>

        <div class="row">
            <div class="col-lg-12 panel panel-default" style="    padding: 15px;">

                <?php
                $account_typ_id = $this->Session->read('Auth.User.account_type_id');
                if ($account_typ_id == 2) {
                    ?>


                    <div class="form-group">
                        <lable id="view-lable">Game Title*</lable>
                        <?php echo $this->Form->input('title', array('class' => 'form-control', 'div' => false, 'required', 'label' => false)); ?>
                    </div>
                
                <div class="form-group">
                        <lable id="view-lable">Yotube Video Link</lable>
                        <?php echo $this->Form->input('Story.youtube_link', array('class' => 'form-control', 'div' => false, 'label' => false)); ?>
                    </div>

                   
                    <div class="form-group">
                        <lable id="view-lable">Google ad script</lable>
                        <?php echo $this->Form->input('google_ad_code', array('class' => 'form-control', 'div' => false, 'label' => false)); ?>
                    </div>

                    <div class="form-group">
                        <lable id="view-lable">Category*</lable>
                        <br>
                        <?php
                        echo $this->Form->input('Story.story_catogory', array('type' => 'select', 'options' => array(
                                'ps4' => 'PS4',
                                'xbox' => 'XBOX',
                                'pc' => 'PC',
                                'movies' => 'MOVIES',
                                'tv' => 'TV',
                                'nintendo' => 'NINTENDO',
                             'sports' => 'SPORTS',
                            'technology' => 'TECHNOLOGY',
                            ), 'label' => false, 'empty' => 'Select-Category', 'style' => 'width:100%;',
                            'class' => 'form-control btn dropdown-toggle selectpicker btn-default', 'required'));
                        ?>
                    </div>

                    <div class="form-group">
                        <lable id="view-lable">Game Story*</lable>
                        <br>
                        <?php echo $this->Form->input('stroy', array('class' => 'form-control', 'div' => false, 'label' => false, 'id' => 'textbottom')); ?>
                    </div>
                <?php } else if ($account_typ_id == 3) { ?>

                    <div class="form-group">
                        <lable id="view-lable">Title*</lable>
                        <?php echo $this->Form->input('title', array('class' => 'form-control', 'div' => false, 'required', 'label' => false)); ?>
                    </div>

                     
                        <div class="form-group">
                            <lable id="view-lable">Yotube Video Link</lable>
                            <?php echo $this->Form->input('Story.youtube_link', array('class' => 'form-control', 'div' => false, 'label' => false)); ?>
                        </div>
                   
                 


                    <div class="form-group">
                        <lable id="view-lable">Category*</lable>
                        <br>
                        <?php
                        echo $this->Form->input('Story.story_catogory', array('type' => 'select', 'options' => array(
                                'ps4' => 'PS4',
                                'xbox' => 'XBOX',
                                'pc' => 'PC',
                                'movies' => 'MOVIES',
                                'tv' => 'TV',
                                'nintendo' => 'NINTENDO',
                             'sports' => 'SPORTS',
                            'technology' => 'TECHNOLOGY',
                                'other' => 'OTHER',
                            ), 'label' => false, 'empty' => 'Select-Category', 'style' => 'width:100%;',
                            'class' => 'form-control btn dropdown-toggle selectpicker btn-default', 'required'));
                        ?>
                    </div>

                    <div class="form-group">
                        <lable id="view-lable">Your Story*</lable>
                        <br>
                        <?php echo $this->Form->input('stroy', array('class' => 'form-control', 'div' => false, 'label' => false, 'id' => 'textbottom')); ?>
                    </div>


                <?php } ?>

                <button type="submit" class="btn-lg btn-primary btn-web-color" id="login-btn" style="width:100%;" >post</button>
                <?php echo $this->Form->end(); ?>
            </div>

        </div>

    </div>
</div>