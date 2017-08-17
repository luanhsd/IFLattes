<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $title ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?php echo $name; ?>">
        <meta name="author" content="<?php echo $autor ?>">

        <!-- <link href="assets/less/styles.less" rel="stylesheet/less" media="all">  -->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/styles.min.css?=113'); ?>">
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600' rel='stylesheet' type='text/css'>

        <link rel='stylesheet' type='text/css' href='<?php echo base_url('assets/plugins/datatables/dataTables.css'); ?>' />
        <link rel='stylesheet' type='text/css' href='<?php echo base_url('assets/plugins/codeprettifier/prettify.css'); ?>' />
        <link rel='stylesheet' type='text/css' href='<?php echo base_url('assets/plugins/form-toggle/toggles.css'); ?>' />


        <link href='<?php echo base_url('assets/demo/variations/default.css'); ?>' rel='stylesheet' type='text/css' media='all' id='styleswitcher'>
        <link href='<?php echo base_url('assets/fonts/glyphicons/css/glyphicons.css') ?>' rel='stylesheet'>
        <link href='<?php echo base_url('assets/demo/variations/default.css'); ?>' rel='stylesheet' type='text/css' media='all' id='headerswitcher'>


        <link rel='stylesheet' type='text/css' href='<?php echo base_url('assets/plugins/codeprettifier/prettify.css') ?>' />
        <link rel='stylesheet' type='text/css' href='<?php echo base_url('assets/plugins/form-toggle/toggles.css') ?>' />

                <!-- <script type="text/javascript" src="assets/js/less.js"></script> -->

        <!-- TIMELINE -->
        <link rel="stylesheet" href="<?php echo base_url('assets/timeline/css/timeline.css');?>"> <!-- Resource style -->
	<script src="<?php echo base_url('assets/timeline/js/modernizr.js');?>"></script> <!-- Modernizr -->
        
        <!-- LIBRARIES GRAPHS -->
        <link rel="stylesheet" href="<?php echo base_url('assets/DC/dc.css'); ?>"/>
        <script src="<?php echo base_url('assets/DC/crossfilter.js'); ?>"></script>
        <script src="<?php echo base_url('assets/DC/d3.js'); ?>"></script>
        <script src="<?php echo base_url('assets/DC/dc.js'); ?>"></script>
 
    </head>

    <body class=" ">
        <header class="navbar navbar-inverse navbar-fixed-top" role="banner">
            <a id="leftmenu-trigger" class="pull-left" data-toggle="tooltip" data-placement="bottom" title="Toggle Left Sidebar"></a>
            <a id="rightmenu-trigger" class="pull-right" data-toggle="tooltip" data-placement="bottom" title="Toggle Right Sidebar"></a>

            <div class="navbar-header pull-left">
                <?php echo anchor('painel', ' ', array('class' => 'navbar-brand')); ?>
            </div>
            <ul class="nav navbar-nav pull-right toolbar">

            </ul>
        </header>

        <div id="page-container">
