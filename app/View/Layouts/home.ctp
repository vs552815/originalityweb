<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$cakeDescription = __d('cake_dev', 'SecurityHorse');
?>
<?php $this->assign('title', $title); ?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <?php echo $this->Html->charset(); ?>
        <title> GameingHub is the leading source for PS4, PS4 Pro, Xbox One X, Xbox One, PS3, Xbox 360, Wii U, PS Vita, Wii, PC, 3DS,  previews, news, reviews, trailers, walkthroughs, movies, and more. </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="noindex,nofollow" />
        <meta name="description" content="<?php if(empty($meta_decscriptoi)){echo "GameingHub is the leading source for PS4, PS4 Pro, Xbox One X, Xbox One, PS3, Xbox 360, Wii U, PS Vita, Wii, PC, 3DS,  previews, news, reviews, trailers, walkthroughs, movies, and more.";}else{echo $meta_decscriptoi ;}?>">
        <meta name="keywords" content="game,gaming,pc,ps4,graphic card,hack,crack,gaming crack,GameingHub,ps4 game,ps4 pro,xbox one,xbox s,GameingHub.com,www.GameingHub.com, Gameing Hub, original web">
        
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <link rel="icon" type="image/png"  href="<?php echo $this->Html->url('/'); ?>img/601819.png">
        <link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto:300,400|Yellowtail" rel="stylesheet">
<!--Provide featuring news, reviews, playthroughs, and more - Originalityweb-->
        <?php
        echo $this->Html->css(array('bootstrap.min.css'));
        echo $this->Html->css(array('cover.css'));
        echo $this->Html->css(array('main.css'));
        echo $this->Html->css(array('croppie.css'));
        echo $this->Html->css(array('http://code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css'));
        echo $this->Html->css(array('https://fonts.googleapis.com/css?family=Ubuntu:300,400'));
        echo $this->Html->css(array('sweetalert.css'));
        echo $this->Html->css(array('bootstrap-timepicker.min.css'));
        ?> 

        <?php
        echo $this->Html->script('https://use.fontawesome.com/6a1b3d5e67.js');
        ?>
        <!--[if lt IE 9]>
        <?php
        echo $this->Html->script('https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js');
        echo $this->Html->script('https://oss.maxcdn.com/respond/1.4.2/respond.min.js');
        ?>
      <![endif]-->

        <?php
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
        
   <!-- Global site tag (gtag.js) - Google Analytics -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-81193898-6"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-81193898-6');
</script>

  
    </head>
    <body style="    height: 100%;
          display: flex;
          display: -webkit-flex;
          flex-direction: column;
          -webkit-flex-direction: column;">
          <?php //echo $this->Flash->render(); ?>

        <div style="background-color: #f4f4f4;    flex: 1 0 auto;
             -webkit-flex: 1 0 auto;
             min-height: 500px;">
             <?php echo $this->element('header'); ?>
             <?php echo $this->fetch('content'); ?>
             <?php echo $this->element('modal'); ?>
           
        </div>
          <?php echo $this->element('footer'); ?>
        <?php
        echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js');
        //echo $this->Html->script('js-webshim/minified/polyfiller.js');
        echo $this->Html->script('https://code.jquery.com/ui/1.12.1/jquery-ui.js');
        echo $this->Html->script('croppie.js');
        echo $this->Html->script('jquery.numeric.js');
        echo $this->Html->script('bootstrap.min.js');
        echo $this->Html->script('strophe.js');
        echo $this->Html->script('jquery.maskedinput-1.3.min.js');

        echo $this->Html->script('sweetalert.min.js');
        ?>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
        <style>
            .col-md-2.col-xs-2.avatar::after {
                border-style: none;
            }
        </style>


        <?php echo $this->Html->script(array('https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js'));
        ?>
        
      

        <script type="text/javascript">
            var webURL = '<?php echo $this->Html->url('/'); ?>'
            
            ///////////////////////////////////////////////////////////this for iphone model jumping modal
if (navigator.userAgent.match(/iPhone|iPad|iPod/i)) {
    $('.modal').on('show.bs.modal', function () {
        $(this)
                .css({
                    position: 'absolute',
                    marginTop: $(window).scrollTop() + 'px',
                    bottom: 'auto'
                });
        setTimeout(function () {
            $('.modal-backdrop').css({
                position: 'absolute',
                top: 0,
                left: 0,
                width: '100%',
                height: Math.max(
                        document.body.scrollHeight, document.documentElement.scrollHeight,
                        document.body.offsetHeight, document.documentElement.offsetHeight,
                        document.body.clientHeight, document.documentElement.clientHeight
                        ) + 'px'
            });
        }, 0);
    });
}
            
            
            
        </script>
        <?php echo $this->Html->script(array('main.js')); ?>
        <?php echo $this->Html->script(array('bootstrap-timepicker.min.js')); ?>
        <?php echo $this->Html->script(array('jquery.countdown.min.js')); ?>

        <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
        <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>


        <script>
    $(document).ready(function() {
        $('#textbottom').summernote({
            tabsize: 2,
        height: 250
        });
    });
        </script>
        


    </body>
</html>
