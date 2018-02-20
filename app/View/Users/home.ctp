<?php
echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js');
?>
<script>
    var availableTags =<?php echo json_encode($arr); ?>

    $(function () {

        $(".mobile-view-tag").each(function () {
            $(this).autocomplete({
                minLength: 0,
                // source: availableTags,

                source: function (request, response) {
                    var results = $.ui.autocomplete.filter(availableTags, request.term);

                    response(results.slice(0, 5));
                },
                open: function (event, ui) {
                    $('.ui-autocomplete').off('menufocus hover mouseover mouseenter');
                },

                focus: function (event, ui) {
                    $(".mobile-view-tag").val(ui.item.value);
                    return false;
                },
                select: function (event, ui) {
                    $(".mobile-view-tag").val(ui.item.value);
                    console.info(ui.item.url);
                    window.location.href = ui.item.url
                    return false;
                }
            })
                    .autocomplete("instance")._renderItem = function (ul, item) {

                return $("<li>")
                        .append("<table class='search-table'>" + "<tbody><tr>"
                                + "<td style='color:#333;' >" + item.value.substring(0, 45) + "<br id='show-br-mobile'></td>")
                        .appendTo(ul);
            };
//    $('#tags').focus(function() {
//    /* Only search if the autocomplete menu is hidden: */
//    if ($("ul.ui-autocomplete").is(":hidden")) {
//        $(this).autocomplete('search', '');
//    }
//});
        });
    });

</script>





<div class="container" style="padding-bottom: 100px;    box-shadow: 0 3px 25px 0 rgba(47,56,68,0.22);background: #fff;">
    <div class="" style="    margin: 10px 0 10px 0 ;
         border: 0px;

         color: #fff;
         border-radius: 0px;" >
        <input type="text" class=" search-query form-control mobile-view-tag" placeholder="Search..." 
               style="text-align: center;margin-bottom: 0px;" />
    </div>
    <!--    <h2>Gaming Geek</h2>-->
    <div id="custom-search-input">
        <div >

        </div>
    </div>

    <div class="row">
        <div class="alert alert-success">  <span>Upcoming Games</span></div>

        <div class="col-md-8">
            <!-- begin panel group -->
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                <!-- panel 1 -->
                <?php foreach ($find_upcoming as $k => $game) { ?>
                    <div class="panel panel-default">
                        <!--wrap panel heading in span to trigger image change as well as collapse -->
                        <span class="side-tab" data-target="#tab<?php echo $game['UpcomingGame']['id'] ?>" data-toggle="tab" role="tab" aria-expanded="false">
                            <div class="panel-heading" role="tab" id="headingOne"data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $game['UpcomingGame']['id'] ?>" aria-expanded="true" aria-controls="collapseOne">
                                <h4 class="panel-title"><b><?php echo $game['UpcomingGame']['title'] ?></b></h4>
                            </div>
                        </span>

                        <div id="collapse<?php echo $game['UpcomingGame']['id'] ?>" class="panel-collapse collapse <?php echo $k == 0 ? "in active" : ""; ?>" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <!-- Tab content goes here -->
                                <b>Release Date<?php echo $game['UpcomingGame']['release_date'] ?></b>
                                <?php echo $game['UpcomingGame']['description'] ?>
                            </div>
                        </div>
                    </div> 
                <?php } ?>
                <!-- / panel 1 -->
            </div> <!-- / panel-group -->

        </div> <!-- /col-md-4 -->

        <div class="col-md-4">
            <!-- begin macbook pro mockup -->
            <div class="md-macbook-pro md-glare">
                <div class="md-lid">
                    <div class="md-camera"></div>
                    <div class="md-screen">
                        <!-- content goes here -->                
                        <div class="tab-featured-image">
                            <div class="tab-content">
                                <?php foreach ($find_upcoming as $k => $game) { ?>
                                <div class="tab-pane   <?php echo $k == 0 ? "in active" : ""; ?>" id="tab<?php echo $game['UpcomingGame']['id'] ?>" style="    padding:0px 0px 15px 0px;">
                                        <?php echo $this->Html->image($game['UpcomingGame']['image'], array('alt' => 'tab' . $game['UpcomingGame']['id'], 'class' => 'img img-responsive')) ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md-base"></div>
            </div> <!-- end macbook pro mockup -->
        </div> <!-- / .col-md-8 -->
    </div>
    <style>

    </style>

    <div class="row">
        <div class="alert alert-success">  <span>Gaming Stories</span></div>
        <?php
        if (!empty($find)) {

            foreach ($find as $story) {
                ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="card hovercard">
                        <div class="cardheader" style=" background-image: url(<?php echo $story['GamingStory']['image']; ?>);" alt="<?php echo $story['GamingStory']['title']; ?>" >

                        </div>
                        <div class="avatar">

                            <?php echo $this->Html->image($story['GamingStory']['cover_image'], array('alt' => $story['GamingStory']['title'])) ?>
                        </div>
                        <div class="info">
                            <div class="title">

                                <a  href="<?php echo $this->Html->url(array('action' => 'readstory', 'controller' => 'users', 'mystoryslug' => $story['GamingStory']['gaming_slug'])); ?>">
                                    <?php echo strip_tags($story['Story']['title']); ?>
                                </a>
                            </div>
                            <div class="desc">Posted by: <?php echo strip_tags($story['User']['fullname']); ?></div>

                        </div>

                    </div>

                </div>
            <?php }
        } else {
            ?>
            <div style="text-align:center;padding: 20px;">
                <p>There are currently no gaming stories listed on GameingHub. Share your gaming experience.</p>  
                <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'gaming_story', 'users' => false)); ?>">Click here</a>
            </div>
        <?php } ?>
    </div>

    <div class="row">
        <div class="alert alert-success" style="margin-bottom: 0px;">  <span>Top Stories</span></div>
        <!-- Nav tabs --><div class="">
            <ul class="nav nav-tabs" role="tablist">
                <li class="active">
                    <a href="javascript:void(0);" onclick="location.reload();"  data-toggle="tab">All</a>
                </li>
                <li ><a href=""  class="tab-data" data-toggle="tab" rel="ps4">PS4</a></li>
                <li ><a href=""  class="tab-data" data-toggle="tab" rel="xbox">XBOX</a></li>
                <li ><a href="" class="tab-data" data-toggle="tab" rel="pc">PC</a></li>
                <li ><a href=""  class="tab-data" data-toggle="tab" rel="nintendo">NINTENDO</a></li>
                <li ><a href=""  class="tab-data" data-toggle="tab" rel="tv">TV</a></li>
                <li ><a href=""   class="tab-data" data-toggle="tab" rel="movies">MOVIES</a></li>
                <li ><a href=""   class="tab-data" data-toggle="tab" rel="other">OTHER</a></li>
            </ul>

        </div>
        <div class="tab-data-container">
            <?php foreach ($find_all as $story) { ?>
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
        </div>
    </div>
</div>

<style>

</style>