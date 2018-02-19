<div class="container" style="padding-bottom: 100px;">
    <div class="row">
        <div class="col-sm-12">
            <h2 class="center-top">My Questions</h2><br>
        </div>
    </div>

    <div class="row">
        <?php if (!empty($find)) { ?>
            <?php foreach ($find as $Solution) { ?>
                <div class="col-sm-6">
                    <div id="tb-testimonial" class="testimonial testimonial-info">
                        <div class="testimonial-section">
                            <?php echo $Solution['Solution']['title'] ?>
                        </div>
                        <div class="testimonial-desc">
                            <?php echo $this->Html->image($Solution['User']['profile_image']); ?>

                            <div class="testimonial-writer">
                                <div class="testimonial-writer-name"><?php echo $Solution['User']['fullname'] ?></div>
                                <div class="testimonial-writer-designation">
                                    <a style="color:red;" href="<?php echo $this->Html->url(array('action' => 'editsolution', 'controller' => 'users', $Solution['Solution']['id'])); ?>">
                                        Edit Question
                                    </a>
                                    <br>
                                    <span >
                                     <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete_mypost',  $Solution['Solution']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $Solution['Solution']['title']))); ?>
                                        </span>

                                </div>
                                <a href="#" class="testimonial-writer-company"><?php echo $Solution['User']['solution_type'] ?></a>
                                <a style="color:#000;" href="<?php echo $this->Html->url(array('action' => 'readsolution', 'controller' => 'users', 'solutionslug' => $Solution['Solution']['slug_question'])); ?>" class="testimonial-writer-company">Read More...</a>
                            </div>
                        </div>
                    </div>   
                </div>
            <?php } ?>
        <?php } else { ?>      
            <div class="alert alert-info">
                <strong>Info!</strong> No question added by you feel free and  
                <a   href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'ask_question', 'users' => false)); ?>">Ask Question</a>.
            </div>
        </div>
    <?php } ?>  
</div>

<style>
    /*----------------------------------------------------*/
    /*----------------- Testimonials CSS -----------------*/
    /*----------------------------------------------------*/

    .center-top{text-align: center;}


    #tb-testimonial{
        margin-bottom: 20px;
    }
    .testimonial{
        margin-bottom: 10px;
    }

    .testimonial-section {
        width: 100%;
        height: auto;
        padding: 15px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        position: relative;
        border: 1px solid #fff;
    }
    .testimonial-section:after {
        top: 100%;
        left: 50px;
        border: solid transparent;
        content: " ";
        position: absolute;
        border-top-color: #fff;
        border-width: 15px;
        margin-left: -15px;
    }

    .testimonial-desc {
        margin-top: 20px;
        text-align:left;
        padding-left: 15px;
    }
    .testimonial-desc img {
        border: 1px solid #f5f5f5;
        border-radius: 150px;
        height: 70px;
        padding: 3px;
        width: 70px;
        display:inline-block;
        vertical-align: top;
    }

    .testimonial-writer{
        display: inline-block;
        vertical-align: top;
        padding-left: 10px;
    }

    .testimonial-writer-name{
        font-weight: bold;
    }

    .testimonial-writer-designation{
        font-size: 85%;
    }

    .testimonial-writer-company{
        font-size: 85%;
    }
    /*---- Outlined Styles ----*/
    .testimonial.testimonial-info{

    }
    .testimonial.testimonial-info .testimonial-section{
        border-color: #5BC0DE;
        color: #31b0d5;
        background-color: rgba(91, 192, 222, 0.1);
    }

    .testimonial.testimonial-info .testimonial-section:after{
        border-top-color: #5BC0DE;
    }

    .testimonial.testimonial-info .testimonial-desc{

    }

    .testimonial.testimonial-info .testimonial-desc img{
        border-color: #5BC0DE;
    }

    .testimonial.testimonial-info .testimonial-writer-name{
        color: #5BC0DE;
    }



</style>