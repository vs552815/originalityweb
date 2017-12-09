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
   
     
    

    <a style="text-decoration:none;cursor: pointer;" href=""> 
    <div class="col-sm-12 well" style="margin-top: 10px;border: 0px; height:120px;background-size: 50px 50px;background: #b51817;color: #fff;" >
        <h2 style="text-align:center;">Live Streaming</h2>
    </div>
</a>



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
