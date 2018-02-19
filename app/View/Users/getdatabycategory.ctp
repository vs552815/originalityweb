 <?php foreach ($ajax_find as $story) { ?>
            <div class="col-lg-3 col-sm-6">
                <a  href="<?php echo $this->Html->url(array('action' => 'readpost', 'controller' => 'users', 'storyslug' => $story['Story']['story_slug'])); ?>">
                    <div class="card hovercard">
                        <div class="cardheader" style=" background-image: url(<?php echo $story['Story']['image']; ?>);" alt="<?php echo $story['Story']['title']; ?>" >

                        </div>
                        <div class="avatar">

                            <?php echo $this->Html->image($story['Story']['main_img'], array('alt' => $story['Story']['title'])) ?>
                        </div>
                        <div class="info">
                            <div class="title">

                                <a  href="<?php echo $this->Html->url(array('action' => 'readpost', 'controller' => 'users', 'storyslug' => $story['Story']['story_slug'])); ?>">
                                    <?php echo strip_tags($story['Story']['title']); ?>
                            </div>
                            <div class="desc">Posted by: <?php echo strip_tags($story['User']['fullname']); ?></div>

                        </div>

                    </div>
                </a>
            </div>
        <?php } ?>