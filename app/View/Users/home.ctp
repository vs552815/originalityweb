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
</div>

<style>

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