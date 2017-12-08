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
        <meta charset="utf-8">
        <meta name="description" content="<?php echo $meta_decscriptoi ;?>">
        <meta name="keywords" content="game,gaming,pc,ps4,graphic card,hack,crack,gaming crack,originalityweb,ps4 game,ps4 pro,xbox one,xbox s,originalityweb.com">
        <meta name="author" content="Vikas Sharma">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content='width=device-width, initial-scale=1.0, user-scalable=0' >
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <link rel="icon" type="image/png"  href="<?php echo $this->Html->url('/'); ?>img/601819.png">
        <title> Originalityweb </title>
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
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-81193898-5"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-81193898-5');
</script>
     
        
        
        
        
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-5915063633225550",
    enable_page_level_ads: true
  });
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
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=p4uqad4hmk8ntb6rug6fh0kq7v6d807nwx3dtkrogx7fq0c5"></script>

        <script>
            tinymce.init({

                selector: '#textbottom',
                height: 200,
                theme: 'modern',
                plugins: 'print preview fullpage powerpaste searchreplace autolink directionality advcode visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount tinymcespellchecker a11ychecker imagetools mediaembed  linkchecker contextmenu colorpicker textpattern help',

                fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
                toolbar1: ' fontsizeselect | undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: ' forecolor backcolor ',
                image_advtab: false,
                templates: [
                    {title: 'Test template 1', content: 'Test 1'},
                    {title: 'Test template 2', content: 'Test 2'}
                ],
                content_css: [
                    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                    '//www.tinymce.com/css/codepen.min.css',
                    '//www.securityhorse.com/app/webroot/css/message.css'
                ],
                theme_advanced_font_sizes: "10px,12px,13px,14px,16px,18px,20px",
                font_size_style_values: "10px,12px,13px,14px,16px,18px,20px"
            });

        </script>

        <script type="text/javascript">
            var webURL = '<?php echo $this->Html->url('/'); ?>'
        </script>
        <?php echo $this->Html->script(array('main.js')); ?>




    </body>
</html>
