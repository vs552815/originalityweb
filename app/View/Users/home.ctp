<div class="container" style="padding-bottom: 100px;">
<!--    <h2>Gaming Geek</h2>-->
    <div class="col-sm-12 well" style="margin-top: 10px;border: 0px; height:120px;background-size: 50px 50px;   background: url(https://assets-a.thrillist.com/images/thrillist/background_pattern_2x.png) center center ">

    </div>
    <div class="row">
        
        <?php foreach ($find as $story) { ?>
            <div class="col-lg-3 col-sm-6">

                <div class="card hovercard">
                    <div class="cardheader" style=" background-image: url(<?php echo $story['Story']['image']; ?>);">

                    </div>
                    <div class="avatar">

                        <?php echo $this->Html->image($story['Story']['main_img']) ?>
                    </div>
                    <div class="info">
                        <div class="title">
                            
                            <a  href="<?php echo $this->Html->url(array('action' => 'readpost', 'controller' => 'users', 'storyslug' => $story['Story']['story_slug'])); ?>">
                                <?php echo strip_tags($story['Story']['title']); ?></a>
                        </div>
                        <div class="desc"><?php //echo strip_tags($story['Story']['stroy']);   ?></div>

                    </div>

                </div>

            </div>
        <?php } ?>
    </div>
</div>
