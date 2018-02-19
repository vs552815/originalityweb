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

        <div class="col-md-4">
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

                        <div id="collapse<?php echo $game['UpcomingGame']['id'] ?>" class="panel-collapse collapse <?php echo $k == 0 ? "" : ""; ?>" role="tabpanel" aria-labelledby="headingOne">
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

        <div class="col-md-8">
            <!-- begin macbook pro mockup -->
            <div class="md-macbook-pro md-glare">
                <div class="md-lid">
                    <div class="md-camera"></div>
                    <div class="md-screen">
                        <!-- content goes here -->                
                        <div class="tab-featured-image">
                            <div class="tab-content">
                                <?php foreach ($find_upcoming as $k => $game) { ?>
                                    <div class="tab-pane   <?php echo $k == 0 ? "in active" : ""; ?>" id="tab<?php echo $game['UpcomingGame']['id'] ?>">
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

        .alert-success {
            color: #fff;
            background-color: #000;
            border-color: #000;
            border-radius: 0;
        }
        .tab-pane .img-responsive{
            width:100%;
        }
        .panel-heading:hover {
            cursor:pointer;
        }
        .panel-heading {
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;    
        }

        .side-tab:hover {
            cursor: pointer;
        }
        .panel.panel-default {
            border: none;
            box-shadow: none !important;
            border-bottom-right-radius: 0px;
            border-bottom-left-radius: 0px;

        }
        .panel-heading {
            border: none;
            background-color: #eee;

        }
        .panel-body {
            background-color: #f5f5f5;
        }
        .panel-title {
            font-weight: 400;
            color: #000;
        }
    </style>

    <div class="row">
        <div class="alert alert-success">  <span>New Stories</span></div>
        <?php foreach ($find as $story) { ?>
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
    .glyphicon { margin-right:5px;}
    .section-box h2 { margin-top:0px;}
    .section-box h2 a { font-size:15px; }
    .glyphicon-heart { color:#e74c3c;}
    .glyphicon-comment { color:#27ae60;}
    .separator { padding-right:5px;padding-left:5px; }
    .section-box hr {margin-top: 0;margin-bottom: 5px;border: 0;border-top: 1px solid rgb(199, 199, 199);}
    .nav-tabs { border-bottom: 2px solid #DDD; }
    .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover { border-width: 0; }
    .nav-tabs > li > a { border: none; color: #666; }
    .nav-tabs > li.active > a, .nav-tabs > li > a:hover { border: none; color: #4285F4 !important; background: transparent; }
    .nav-tabs > li > a::after { content: ""; background: #4285F4; height: 2px; position: absolute; width: 100%; left: 0px; bottom: -1px; transition: all 250ms ease 0s; transform: scale(0); }
    .nav-tabs > li.active > a::after, .nav-tabs > li:hover > a::after { transform: scale(1); }
    .tab-nav > li > a::after { background: #21527d none repeat scroll 0% 0%; color: #fff; }
    .tab-pane { padding: 15px 0; }

    .header-text {
        position: absolute;
        top: 35%;
        left: 1.8%;
        right: auto;
        width: 96.66666666666666%;
        color: #fff;
        font-size:18px;
        letter-spacing:1px;
    }

    .header-text h2 {font-size: 60px;color:#fff; font-weight:600;}
    .header-text h2 span {padding: 10px; color:orange;}
    .header-text h3 span {padding: 15px;}

    .btn-min-block {min-width: 170px;line-height: 26px;}

    .btn-theme {
        color: #fff;
        background-color: transparent;
        border: 2px solid #fff;
        margin-right: 15px;
    }

    .btn-theme:hover {
        color: #000;
        background-color: #f7941d;
        border-color: #fff;
    }
    .navbar {
        margin-bottom:0px;
    }
</style>