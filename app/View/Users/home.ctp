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
 <div class="col-sm-12 well" style="    margin: 0px;
    border: 0px;
    background: #000000;
    color: #fff;
    border-radius: 0px;" >
                       <input type="text" class=" search-query form-control mobile-view-tag" placeholder="Search..." 
                              style="text-align: center;margin-bottom: 0px;" />
        </div>

  <div class="container-fluid">
	<div class="row">
		<!-- Carousel -->
		
    	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="false">
			<!-- Indicators -->
			<ol class="carousel-indicators">
			  	<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
			</ol>
			<!-- Wrapper for slides -->
			<div class="carousel-inner">
			    <div class="item active">
			    	<img src="https://images.pexels.com/photos/238211/pexels-photo-238211.jpeg?w=940&h=650&auto=compress&cs=tinysrgb" alt="Second slide">
			    	<!-- Static Header -->
                    <div class="header-text text-center hidden-xs">
                       <div class="main_title ">
			                <h2>Paris <span>Top</span> Tours</h2>
			                <p>Quisque at tortor a libero posuere laoreet vitae sed arcu. Curabitur consequat.</p>
	            </div>  <div class="">
                                <a class="btn btn-theme btn-sm btn-min-block" href="#">Login</a><a class="btn btn-theme btn-sm btn-min-block" href="#">Register</a></div>
                    </div><!-- /header-text -->
			    </div>
			    <div class="item">
			    	<img src="https://images.pexels.com/photos/193791/pexels-photo-193791.jpeg?w=940&h=650&auto=compress&cs=tinysrgb" alt="Second slide">
			    	<!-- Static Header -->
                    <div class="header-text text-center hidden-xs">
                       <div class="main_title ">
			                <h2>Paris <span>Top</span> Tours</h2>
			                <p>Quisque at tortor a libero posuere laoreet vitae sed arcu. Curabitur consequat.</p>
	            </div>  <div class="">
                                <a class="btn btn-theme btn-sm btn-min-block" href="#">Login</a><a class="btn btn-theme btn-sm btn-min-block" href="#">Register</a></div>
                    </div><!-- /header-text -->
			    </div>
			   <div class="item">
			    	<img src="https://images.pexels.com/photos/167676/pexels-photo-167676.jpeg?w=940&h=650&auto=compress&cs=tinysrgb" alt="Second slide">
			    	<!-- Static Header -->
                    <div class="header-text text-center hidden-xs">
                       <div class="main_title ">
			                <h2>Paris <span>Top</span> Tours</h2>
			                <p>Quisque at tortor a libero posuere laoreet vitae sed arcu. Curabitur consequat.</p>
	            </div>  <div class="">
                                <a class="btn btn-theme btn-sm btn-min-block" href="#">Login</a><a class="btn btn-theme btn-sm btn-min-block" href="#">Register</a></div>
                    </div><!-- /header-text -->
			    </div>
			</div>
			<!-- Controls -->
			<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
		    	<span class="glyphicon glyphicon-chevron-left"></span>
			</a>
			<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
		    	<span class="glyphicon glyphicon-chevron-right"></span>
			</a>
		</div><!-- /carousel -->
	</div>
</div>


<div class="container" style="padding-bottom: 100px;">
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
    
/* Slider CSS */
/* Carousel Styles */

/* Carousel Styles */

.carousel-control {color: #e2e2e2;}

.carousel-indicators .active {background-color: #ff5900;}
.carousel-inner img {width: 100%;max-height: 420px;}
.carousel-control.left,
.carousel-control.right {
	opacity: 1;
	filter: alpha(opacity=100);
	background-image: none;
	background-repeat: no-repeat;
	text-shadow: none;
}
.carousel-control.left span {margin-left: 50px;}
.carousel-control.right span {margin-right: 50px;}
.carousel-control .glyphicon-chevron-left, 
.carousel-control .glyphicon-chevron-right, 
.carousel-control .icon-prev, 
.carousel-control .icon-next {
	position: absolute;
	top: 45%;
	z-index: 5;
	display: inline-block;
	
}

.carousel-control .glyphicon-chevron-left,
.carousel-control .icon-prev {
	left: 0;
}

.carousel-control .glyphicon-chevron-right,
.carousel-control .icon-next {
	right: 0;
	
}

.carousel-control.left span,
.carousel-control.right span {
	background-color: none;
	
}

.carousel-control.left span:hover,
.carousel-control.right span:hover {
	opacity: .7;
	filter: alpha(opacity=70);
}

/* Carousel Header Styles */
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