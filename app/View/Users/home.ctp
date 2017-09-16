<!--    <div class="row">
    	<div  class="carousel slide" data-ride="carousel">
			 Indicators 
			<ol class="carousel-indicators">
			  	<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
			    <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
			</ol>
			 Wrapper for slides 
                        <div class="carousel-inner" style="height: 250px;">
			    <div class="item active">
			    	<img src="https://bootstrapmade.com/demo/themes/Shuffle/img/slide1.jpg" alt="First slide">
                    
			    </div>
			    <div class="item">
			    	<img src="https://bootstrapmade.com/demo/themes/Shuffle/img/slide2.jpg" alt="Second slide">
			    	 Static Header 
                  
			    </div>
			    <div class="item">
			    	<img src="https://bootstrapmade.com/demo/themes/Shuffle/img/slide3.jpg" alt="Third slide">
			    
			    </div>
			</div>
			 Controls 
			<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
		    	<span class="glyphicon glyphicon-chevron-left"></span>
			</a>
			<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
		    	<span class="glyphicon glyphicon-chevron-right"></span>
			</a>
		</div> /carousel 
    </div>-->

<div class="container">
<div class="row">
    <?php foreach ($find as $story) { ?>
		<div class="col-lg-3 col-sm-6">

            <div class="card hovercard">
                <div class="cardheader" style=" background-image: url(<?php  echo $story['Story']['image']; ?>);">

                </div>
                <div class="avatar">
                    
                     <?php echo $this->Html->image($story['User']['profile_image'])?>
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" href="http://scripteden.com/"><?php echo $story['Story']['title'];?></a>
                    </div>
                    <div class="desc"><?php echo $story['Story']['stroy'];?></div>
                    
                </div>
                <div class="bottom">
                    <a class="btn btn-primary btn-twitter btn-sm" href="https://twitter.com/webmaniac">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" rel="publisher" href="https://plus.google.com/+ahmshahnuralam">
                        <i class="fa fa-google-plus"></i>
                    </a>
                    <a class="btn btn-primary btn-sm" rel="publisher" href="https://plus.google.com/shahnuralam">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a class="btn btn-warning btn-sm" rel="publisher" href="https://plus.google.com/shahnuralam">
                        <i class="fa fa-behance"></i>
                    </a>
                </div>
            </div>

        </div>
 <?php } ?>
	</div>
</div>
