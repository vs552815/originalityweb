
<div class="col-sm-12 well" style="border: 0px; height:120px;background-size: 50px 50px;   background: url(https://assets-a.thrillist.com/images/thrillist/background_pattern_2x.png) center center ">

</div>

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <h2 style="text-transform: uppercase;"><?php echo $findstory['Story']['title'] ?></h2>
        </div>
<!--        <div class="col-lg-4" style="text-align: right;margin-top: 15px;">
            <a href="https://www.facebook.com/"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a>
            <a href="https://twitter.com/"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a>
            <a href="https://plus.google.com/"><i id="social-gp" class="fa fa-google-plus-square fa-3x social"></i></a>    

        </div>-->
    </div>

    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 post-css">
            <div  class="col-sm-12">
                <?php echo $this->Html->image($findstory['Story']['image'], array('style' => 'width:100%;')); ?>
                <p ><?php echo $findstory['Story']['stroy'] ?></p>

            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
            <div  class="col-sm-12" style="text-align: center;position: relative;">
                <h4 class="h4-tag">TRENDING </h4>
                <?php echo $this->Html->image($findstory['Story']['image'], array('style' => 'width:100%;')); ?>
                <h4> <?php echo $findstory['Story']['title'] ?></h4>
            </div>
         
            
        </div>


    </div>
    </div>
    <br><br>

    <style>
        .h4-tag{
            margin-top: 0px;
            position: absolute;
            top: 35%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #fff;
            background: rgba(45, 44, 44, 0.32);
            padding: 5px;

        }
        .pb-cmnt-textarea {
            resize: none;
            padding: 20px;
            height: 130px;
            width: 100%;
            border: 1px solid #F2F2F2;
        }
        img{width:100%!important;}
        hr.style11{
            height: 6px;
            background: url(http://ibrahimjabbari.com/english/images/hr-11.png) repeat-x 0 0;
            border: 0;
        }
    </style>