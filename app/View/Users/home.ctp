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




<div class="container" style="padding-bottom: 100px;">
    <!--    <h2>Gaming Geek</h2>-->


    <div id="custom-search-input">
        <div >
            <input type="text" class="  search-query form-control mobile-view-tag" placeholder="Search..." style="text-align: center;" />

        </div>
    </div>

    <div class="col-sm-12 well" style="margin-top: 10px;border: 0px; height:120px;background-size: 50px 50px;   background: url(https://assets-a.thrillist.com/images/thrillist/background_pattern_2x.png) center center ">

    </div>



    <div class="row">

        <?php foreach ($find as $story) { ?>
            <div class="col-lg-3 col-sm-6">
<a  href="<?php echo $this->Html->url(array('action' => 'readpost', 'controller' => 'users', 'storyslug' => $story['Story']['story_slug'])); ?>">
                <div class="card hovercard">
                    <div class="cardheader" style=" background-image: url(<?php echo $story['Story']['image']; ?>);">

                    </div>
                    <div class="avatar">

                        <?php echo $this->Html->image($story['Story']['main_img']) ?>
                    </div>
                    <div class="info">
                        <div class="title">

                            <a  href="<?php echo $this->Html->url(array('action' => 'readpost', 'controller' => 'users', 'storyslug' => $story['Story']['story_slug'])); ?>">
                                <?php echo strip_tags($story['Story']['title']); ?>
                        </div>
                        <div class="desc"><?php //echo strip_tags($story['Story']['stroy']);    ?></div>

                    </div>

                </div>
</a>
            </div>
        <?php } ?>
    </div>
</div>
<style>
    .search-table{width:100%;margin:0;padding:0;border-collapse:collapse;border-spacing:0;background:#fff;border-radius:10px!important;}
    .search-table td{color:#666;}
    .search-table td{padding:5px;border-bottom:0px; }
    #responsive{width: 40px;}
    #responsive img{width: 40px;height: 40px; border-radius: 50%;}
    .responsive{width: 40px;}
    .responsive img{width: 40px;height: 40px; border-radius: 50%;}

    .ui-menu .ui-menu-item{list-style-image:none!important;}
    .ui-widget.ui-widget-content{   background-color: #fff!important;}
    .ui-menu.ui-widget-content{border: 1px solid #fff!important;}
    .search-table:hover{background: #fff!important;border: 0px!important;}
    ul.ui-autocomplete.ui-menu li{
        text-align:left;
    }
</style>