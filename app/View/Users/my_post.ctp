<div class="container">

    <h2 class="text-center">My Post</h2>

    <?php foreach ($find_post as $value) { ?>

        <div class="col-lg-3 col-sm-6">

            <div class="card hovercard">
                <div class="cardheader" style=" background-image: url(<?php echo $value['Story']['image']; ?>);">

                </div>
                <div class="avatar">

                    <?php echo $this->Html->image($value['Story']['main_img']) ?>
                </div>
                <div class="info">
                    <div class="title" style="text-align:center;">
                        <a style="    color: #000;"  href="<?php echo $this->Html->url(array('action' => 'readpost', 'controller' => 'users', 'storyslug' => $value['Story']['story_slug'])); ?>">
                            <?php echo $value['Story']['title']; ?>
                        </a>
                    </div>
                    <div class="desc" style="text-align:center;">
                        <?php
                        if ($value['Story']['approved_post'] == 1) {
                            echo "Approved";
                        } else {
                            echo "Pending Approvel";
                        }
                        ?>

                    </div>
                    <div style="text-align:left;width:50%;float:left">
                        <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'edit_post', 'users' => false, $value['Story']['id'])); ?>">
                            Edit</a>
                    </div>
                    <div style="text-align:right;width:50%;float:left"> 
    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete_mypost', $value['Story']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $value['Story']['id']))); ?>
                    </div>
                </div>

            </div>

        </div>

<?php } ?>
    <?php foreach ($find_story as $val) { ?>

        <div class="col-lg-3 col-sm-6">

            <div class="card hovercard">
                <div class="cardheader" style=" background-image: url(<?php echo $val['GamingStory']['cover_image']; ?>);">

                </div>
                <div class="avatar">

                    <?php echo $this->Html->image($val['GamingStory']['image']) ?>
                </div>
                <div class="info">
                    <div class="title" style="text-align:center;">
                        <a style="    color: #000;"  href="<?php echo $this->Html->url(array('action' => 'readstory', 'controller' => 'users', 'mystoryslug' => $val['GamingStory']['gaming_slug'])); ?>">
                            <?php echo $val['GamingStory']['title']; ?>
                        </a>
                    </div>
                    <div class="desc" style="text-align:center;">
                        <?php
                        if ($val['GamingStory']['status'] == 1) {
                            echo "Approved";
                        } else {
                            echo "Pending Approvel";
                        }
                        ?>

                    </div>
                    <div style="text-align:left;width:50%;float:left">
                        <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'edit_mystory', 'users' => false, $val['GamingStory']['id'])); ?>">
                            Edit</a>
                    </div>
                    <div style="text-align:right;width:50%;float:left"> 
    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete_mystory', $val['GamingStory']['id']), array('confirm' => __('Are you sure you want to delete # %s?',$val['GamingStory']['title']))); ?>
                    </div>
                </div>

            </div>

        </div>

<?php } ?>


</div>

<style>

    .caption {
        box-shadow: 0 1px 3px 0 #d4d4d5, 0 0 0 1px #d4d4d5;
        position:absolute;
        top:0;
        right:0;
        background: rgba(70, 216, 210, 0.44);
        width:100%;
        height:100%;
        padding:2%;
        display: none;
        text-align:center;
        color:#fff !important;
        z-index:2;
    }

    .caption a {
        padding-right: 10px;
        color: #fff;
    }
    .info {
        display: block;
        padding: 10px;
        background: #eee;
        text-transform: uppercase;
        font-weight: 300;
        text-align: right;
    }

    .info p, .stats p {
        margin-bottom: 0;
    }
    .coralbg {
        background-color: #FA396F;
    } 

    .coral {
        color: #FA396f;
    }
    .info p, .stats p {
        margin-bottom: 0;
    }

    .stats {
        display: block;
        padding: 10px;
        color: white;
    }
    .turqbg {
        background-color: #46D8D2;
    }

</style>