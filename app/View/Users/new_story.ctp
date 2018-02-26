<div class="container">
    <div style="margin-top: 20px;">
<div class="row">
    <div class="col-md-3">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h4 class="text-center">
                    Gaming News</h4>
            </div>
            <div class="panel-body text-center">
                <p class="lead">
                    <strong>Create</strong></p>
            </div>
            <ul class="list-group list-group-flush text-center">
                <li class="list-group-item"><i class="icon-ok text-danger"></i>Game News/Story</li>
                <li class="list-group-item"><i class="icon-ok text-danger"></i>Game Reviews</li>
                <li class="list-group-item"><i class="icon-ok text-danger"></i>Console/Pc News</li>
            </ul>
            <div class="panel-footer">
                <a class="btn btn-md btn-block btn-web-color" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'create_post', 'users' => false)); ?>">Create Now</a>
            </div>
        </div>
    </div>
      <div class="col-md-3">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h4  class="text-center">
                    Gaming Story</h4>
            </div>
            <div class="panel-body text-center">
                <p class="lead">
                    <strong>Share</strong></p>
            </div>
            <ul class="list-group list-group-flush text-center">
                <li class="list-group-item"><i class="icon-ok text-danger"></i>Personal gaming experience</li>
                <li class="list-group-item"><i class="icon-ok text-danger"></i>Youtube channel Video</li>
                <li class="list-group-item"><i class="icon-ok text-danger"></i>Game Reviews</li>
            </ul>
            <div class="panel-footer">
                <a class="btn btn-md btn-block btn-web-color" 
                   href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'gaming_story', 'users' => false)); ?>"
                   >Share Now</a>
            </div>
        </div>
    </div>
      <div class="col-md-3">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h4 class="text-center">
                    Entertainment News</h4>
            </div>
            <div class="panel-body text-center">
                <p class="lead">
                    <strong>Share</strong></p>
            </div>
            <ul class="list-group list-group-flush text-center">
                <li class="list-group-item"><i class="icon-ok text-danger"></i>Movies/Tv Show News</li>
                <li class="list-group-item"><i class="icon-ok text-danger"></i>Movies/Tv Show Reviews</li>
                <li class="list-group-item"><i class="icon-ok text-danger"></i>Upcoming Movies/Tv Show</li>
            </ul>
            <div class="panel-footer">
                <a class="btn btn-md btn-block btn-web-color" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'create_post', 'users' => false)); ?>">Create Now</a>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h4 class="text-center">
                   Technology/Sports</h4>
            </div>
            <div class="panel-body text-center">
                <p class="lead">
                    <strong>Share</strong></p>
            </div>
            <ul class="list-group list-group-flush text-center">
                <li class="list-group-item"><i class="icon-ok text-danger"></i>Share Technology News</li>
                <li class="list-group-item"><i class="icon-ok text-danger"></i>Share Sports Reviews</li>
                <li class="list-group-item"><i class="icon-ok text-danger"></i>Upcoming Technology/Sports</li>
            </ul>
            <div class="panel-footer">
                <a class="btn btn-md btn-block btn-web-color" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'create_post', 'users' => false)); ?>">Create Now</a>
            </div>
        </div>
    </div>
    </div>
</div>
</div>

<style>
    .lead{
        margin: 0px;
    }
</style>