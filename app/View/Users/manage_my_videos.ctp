<div class="container">
    
    <h1 style="text-align: center;">Manage Videos<br></h1>
    
    <div class="row col-md-12">
        <div style=" box-shadow: 12px 15px 20px 0px rgba(46,61,73,0.15);padding: 10px;margin-bottom: 20px;">
        <div class="alert alert-info">
            <a href="#" class="btn btn-xs btn-primary pull-right go-live-text">Add Live Stream</a>
            <strong>Live Streams</strong> 
        </div>
        <table class="table table-striped custab">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Post Time</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <?php foreach ($find_live as $live) { ?>
                <tr>
                    <td>
                        <a href="<?php echo $this->Html->url(array('action' => 'view_live', 'controller' => 'users', 'liveslug' => $live['LiveStream']['live_slug'])); ?>">
                        <?php echo $live['LiveStream']['live_title'] ?>
                        </a>
                    </td>
                    <td><?php echo $live['LiveStream']['create_dt'] ?></td>
                    <td class="text-center">
                        <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'edit_live_video', 'users' => false, $live['LiveStream']['id'])); ?>" class='btn btn-info'><span class="glyphicon glyphicon-edit"></span> </a> 
                        <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'delete_livevideo', 'users' => false, $live['LiveStream']['id'])); ?>" class="btn btn-danger "><span class="glyphicon glyphicon-remove"></span> </a></td>
               
                </tr>
            <?php } ?>   
        </table>
    </div>
    </div>


    <div class="row col-md-12">
         <div style=" box-shadow: 12px 15px 20px 0px rgba(46,61,73,0.15);padding: 10px;margin-bottom: 20px;">
        <div class="alert alert-info">
            <a href="#" class="btn btn-xs btn-primary pull-right go-trending-text">Add a Video</a>
            <strong>Videos</strong> 
        </div>
        <table class="table table-striped custab">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Post Time</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <?php foreach ($find_video as $video) { ?>
                <tr>
                    <td>
                        <a href="<?php echo $this->Html->url(array('action' => 'view_video', 'controller' => 'users', 'trendingslug' => $video['TrendingVideo']['trending_slug'])); ?>" >

                                <?php echo $video['TrendingVideo']['trending_video_title']; ?>
                            </a>
                    </td>
                    <td><?php echo $video['TrendingVideo']['create_date_time']; ?></td>
                    <td class="text-center">
                        <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'edit_my_video',$video['TrendingVideo']['id'])); ?>" class='btn btn-info'><span class="glyphicon glyphicon-edit"></span> </a> 
                        <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'delete_my_video',$video['TrendingVideo']['id'])); ?>" class="btn btn-danger "><span class="glyphicon glyphicon-remove"></span> </a></td>
                </tr>
            <?php } ?>   
        </table>
    </div>
    </div>

</div>