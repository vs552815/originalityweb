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
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content='width=device-width, initial-scale=1.0, user-scalable=0' >
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <link rel="icon" type="image/png"  href="<?php echo $this->Html->url('/'); ?>img/images/icon.png">
        <title> Find Security Jobs in the New York City Area - SecurityHorse</title>
<link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto:300,400|Yellowtail" rel="stylesheet">

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
    </head>
    <body >
        <input type="hidden" id="refreshed" value="no">
        <?php echo $this->Flash->render(); ?>

        <div id="wrapper" style="background-color: #f4f4f4;">
            <?php echo $this->element('header'); ?>
            <?php echo $this->fetch('content'); ?>
            <?php echo $this->element('modal'); ?>
            <?php //echo $this->element('footer'); ?>
        </div>

        <?php
        echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js');
        echo $this->Html->script('js-webshim/minified/polyfiller.js');
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



        <script async defer 
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNSNEtP6ofLe8OEzJWin8FGjuRfQ9JNKc&callback=initialize">
        </script>  

        <?php echo $this->Html->script(array('https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js'));
        ?>

 <script type="text/javascript">
            var webURL = '<?php echo $this->Html->url('/'); ?>'       
  </script>
        <?php echo $this->Html->script(array('main.js')); ?>


    </body>
</html>
