<?php  echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'); ?>
<div class="container">
    
    <div class="row">
        <h2 style="text-align: center;">Go Live</h2>

        <div class="col-sm-12 col-lg-12 well add-live-stream" style="    background: #b51817;">
            <?php $account_typ_id = $this->Session->read('Auth.User.id');
            if (empty($account_typ_id)) {
                ?> 
                <div class="col-sm-6 text-center" >
                    <a class="btn btn-lg "> Go live as Guest.</a>
                </div>
                <div class="col-sm-6 text-center">
                    <a class="btn btn-lg  go-live-text">Go Live as User</a>
                </div>
<?php } else { ?>

                <a  href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'add_live_stream', 'users' => false)); ?>">
                    <div class="text-center" style="    background: #b51817;">
                        Add Live Stream
                    </div>
                </a>

<?php } ?>
        </div>
        <div class="col-sm-12 col-lg-12">
            <h3>Live Streamings</h3> 
            <?php foreach ($find_live as $live){ ?>
            <div class="col-sm-4 text-center" >
                    <div class="card">
                        <iframe width="100%" height="200px" src="<?php echo $live['LiveStream']['live_link'] ?>" frameborder="0" allowfullscreen>
                        </iframe>
                        <div class="card-block" style="padding: 10px;">
                            <a style="text-decoration: none;">
                                <h4 class="card-title"><?php echo $live['LiveStream']['live_title'] ?></h4>
                                <div class="meta">
                                    <span>Friends</span>
                                     <?php echo $live['LiveStream']['streaimg_time'] ?>
                                </div>
                                <div class="card-text">
                                    <?php echo $live['LiveStream']['streaimg_time'] ?>
<!--                                    <script>
                                         $(".getting-started")
      .countdown("", function(event) {
        $(this).text(
          event.strftime('%D days %H:%M:%S')
        );
      });</script>-->
                                    
                                    
                                    <div class="countdown mb-3" >   
                                        <div class="getting-started"></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-lg-12">
            
            <h3>FEATURED CONTENT</h3> 
            
            <div class="col-sm-3 text-center" >


            </div>
        </div>
    </div>

</div>