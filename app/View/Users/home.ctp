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

    <div id="first-slider">
        <div id="carousel-example-generic" class="carousel slide carousel-fade">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>

            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox" style="text-align: center;">
                <!-- Item 1 -->
                <div class="item active " style=" background-image: url(http://s20.postimg.org/uxf8bzlql/image.jpg); background-size: cover;
                     background-repeat: no-repeat;">

                    <div class="row"><div class="container">

                            <div style="    background: #0000004d;
                                 padding: 10px;
                                 color: #fff;">
                                <h3 data-animation="animated bounceInDown">Add images, or even your logo!</h3>
                                <h4 data-animation="animated bounceInUp">Easily use stunning effects</h4>             
                            </div>
                        </div></div>
                </div> 

                <!-- End Item 4 -->

            </div>
            <!-- End Wrapper for slides-->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <i class="fa fa-angle-left"></i><span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <i class="fa fa-angle-right"></i><span class="sr-only">Next</span>
            </a>
        </div>
    </div>



    <div class="col-sm-12 well" style="margin-top: 10px;border: 0px; height:120px;background-size: 50px 50px;   background: url(https://assets-a.thrillist.com/images/thrillist/background_pattern_2x.png) center center ">

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
