<?php foreach ($find_all as $val) { 
    
    if ($val['Story']['image'] != '') {
                    $fileuser = Router::url("/" . $val['Story']['image'], true);
                } else {
                    $fileuser = Router::url("/img/avatar.png", true);
                }
                
                if ($val['Story']['main_img'] != '') {
                    $fileuser1 = Router::url("/" . $val['Story']['main_img'], true);
                } else {
                    $fileuser1 = Router::url("/img/avatar.png", true);
                }
    ?>
                <div class="col-lg-3 col-sm-6">
                    <a  href="<?php echo $this->Html->url(array('action' => 'readpost', 'controller' => 'users', 'storyslug' => $val['Story']['story_slug'])); ?>">
                        <div class="card hovercard">
                            <div class="cardheader" style=" background-image: url(<?php echo $fileuser; ?>);" alt="<?php echo $val['Story']['title']; ?>" >

                            </div>
                            <div class="avatar">

                                <?php echo $this->Html->image($fileuser1, array('alt' => $val['Story']['title'])) ?>
                            </div>
                            <div class="info">
                                <div class="title">

                                    <a  href="<?php echo $this->Html->url(array('action' => 'readpost', 'controller' => 'users', 'storyslug' => $val['Story']['story_slug'])); ?>">
                                        <?php echo strip_tags($val['Story']['title']); ?>
                                </div>
                                <div class="desc">Posted by: <?php echo strip_tags($val['User']['fullname']); ?></div>

                            </div>

                        </div>
                    </a>
                </div>
            <?php } ?>