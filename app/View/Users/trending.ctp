<div class="container">
    <div class="col-sm-12">
        <h1 style="text-align: center;">PROMOTE YOUR VIDEO<br>
            <small>Get more YouTube views on your videos.</small>
        </h1>
    </div>


    <div class="col-sm-12 col-lg-12" style="padding: 0px;">
        <div style="padding: 15px;">
            <div class="panel panel-default panel-table">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col col-xs-6">
                            <h3 class="panel-title" style="    line-height: 30px;
                                height: 30px;">
<!--                                Trending Videos-->
                            </h3>
                        </div>
                        <div class="col col-xs-6 text-right">
                            <a type="button" class="btn btn-sm btn-danger go-trending-text" href="javascript:void(0)">Add a Video</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php foreach ($find_live as $live) { ?>
            <div class="col-sm-6  col-md-4 col-lg-4">
                <div class="thumbnail" >
                    <iframe width="100%" height="200px" src="<?php echo "https://www.youtube.com/embed/" . $live['TrendingVideo']['trending_video_link'] ?>" frameborder="0" allowfullscreen>
                    </iframe>
                    <div class="caption">
                        <p style="font-size:12px;"><?php echo $live['TrendingVideo']['trending_video_title'] ?></p>
                        <div class="row">
<!--                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <a class="btn btn-primary btn-product"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Like</a> 
                            </div>-->
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <a href="<?php echo $this->Html->url(array('action' => 'view_video', 'controller' => 'users', 'trendingslug' => $live['TrendingVideo']['trending_slug'])); ?>" 
                                   class="btn btn-danger btn-product">
                                    <i class="fa fa-youtube" aria-hidden="true"></i> Watch</a></div>
                        </div>

                        <p> </p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <style>
        .btn-product{
            width: 100%;
            margin-bottom: 10px;
        }
    </style>

</div>