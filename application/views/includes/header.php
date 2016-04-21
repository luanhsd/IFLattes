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


        <link href='<?php echo base_url('assets/demo/variations/default.css'); ?>' rel='stylesheet' type='text/css' media='all' id='styleswitcher'> 

        <link href='<?php echo base_url('assets/demo/variations/default.css');?>' rel='stylesheet' type='text/css' media='all' id='headerswitcher'> 
        
        <link href='<?php echo base_url('assets/plugins/bootstrap-fileinput/css/fileinput.min.css'); ?>' rel='stylesheet' type='text/css' />
        <link href='<?php echo base_url('assets/fonts/glyphicons/css/glyphicons.css') ?>' rel='stylesheet'>
        <link rel='stylesheet' type='text/css' href='<?php echo base_url('assets/plugins/codeprettifier/prettify.css')?>' /> 
        <link rel='stylesheet' type='text/css' href='<?php echo base_url('assets/plugins/form-toggle/toggles.css')?>' /> 
<!-- <script type="text/javascript" src="assets/js/less.js"></script> -->

    </head>

    <body class=" ">

        <header class="navbar navbar-inverse navbar-fixed-top" role="banner">
            <a id="leftmenu-trigger" class="tooltips" data-toggle="tooltip" data-placement="right" title="Toggle Sidebar"></a>

            <div class="navbar-header pull-left">
                 <a class="navbar-brand" href="index.htm"></a>
            </div>
            
        </header>

        <div id="page-container">         