<div class="container">
    <div class="col-sm-12 col-lg-12" style="padding: 0px;">
        <h2 style="text-align:center;">Manage Video</h2>

<?php 
if(!empty($find_video)){
foreach ($find_video as $live) { ?>
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail" >
                <iframe width="100%" height="200px" src="<?php echo "https://www.youtube.com/embed/" . $live['TrendingVideo']['trending_video_link'] ?>" frameborder="0" allowfullscreen>
                </iframe>
                <div class="caption">
                    <p><?php echo $live['TrendingVideo']['trending_video_title'] ?></p>
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete_video', $live['TrendingVideo']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $live['TrendingVideo']['title']))); ?>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <a href="<?php echo $this->Html->url(array('action' => 'view_video', 'controller' => 'users', 'trendingslug' => $live['TrendingVideo']['trending_slug'])); ?>" 
                               class="btn btn-danger btn-product">
                               <i class="fa fa-youtube" aria-hidden="true"></i> Watch</a></div>
                    </div>
                </div>
            </div>
        </div>
<?php } }else{ ?>
        <div class="panel-heading">
                <div class="row">
                    <div class="col col-xs-12" style="text-align:center;">
                        <p>You did not add any Youtube video. </p>
                       <a type="button" class="btn btn-sm btn-danger go-trending-text" href="javascript:void(0)">Add Now</a>
                    </div>
                    
                </div>
            </div>
<?php }  ?>
    </div>

<style>
    .btn-product{
        width: 100%;
        margin-bottom: 10px;
    }
</style>
    
</div>