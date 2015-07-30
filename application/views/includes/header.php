<!DOCTYPE html>
<html>
    <head>
        <title>NASA GOLD SDN BHD - Agent</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="description" content="">
        <meta name="keywords" content="admin, bootstrap,admin template, bootstrap admin, simple, awesome">
        <meta name="author" content="">

        <link class="jsbin" href="<?php echo base_url('assets') ?>/css/jquery-ui.css" rel="stylesheet" type="text/css" />
        <script class="jsbin" src="<?php echo base_url('assets') ?>/js/jquery.min.js"></script>
        <script class="jsbin" src="<?php echo base_url('assets') ?>/js/jquery-ui.min.js"></script>
        
        <!-- BOOTSTRAP -->
        <link href="<?php echo base_url('assets'); ?>/css/bootstrap.min.css" rel="stylesheet">

        <!-- LANCENG CSS -->
        <link href="<?php echo base_url('assets'); ?>/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url('assets'); ?>/css/style-responsive.css" rel="stylesheet">

        <!-- VENDOR -->
        <link href="<?php echo base_url('assets'); ?>/css/animate.css" rel="stylesheet">
        <link href="<?php echo base_url('assets'); ?>/third/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url('assets'); ?>/third/weather-icon/css/weather-icons.min.css" rel="stylesheet">
        <link href="<?php echo base_url('assets'); ?>/third/morris/morris.css" rel="stylesheet">
        <link href="<?php echo base_url('assets'); ?>/third/nifty-modal/css/component.css" rel="stylesheet">
        <link href="<?php echo base_url('assets'); ?>/third/sortable/sortable-theme-bootstrap.css" rel="stylesheet"> 
        <link href="<?php echo base_url('assets'); ?>/third/icheck/skins/minimal/grey.css" rel="stylesheet"> 
        <link href="<?php echo base_url('assets'); ?>/third/select/bootstrap-select.min.css" rel="stylesheet"> 
        <link href="<?php echo base_url('assets'); ?>/third/summernote/summernote.css" rel="stylesheet">
        <link href="<?php echo base_url('assets'); ?>/third/magnific-popup/magnific-popup.css" rel="stylesheet"> 
        <link href="<?php echo base_url('assets'); ?>/third/datepicker/css/datepicker.css" rel="stylesheet">
        
        <script type="text/javascript">
            $(function () {
                $('.summernote').summernote({
                    height: 180
                });
            });
        </script>


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <!-- FAVICON -->
        <link rel="shortcut icon" href="<?php echo base_url('assets'); ?>/img/favicon.ico">
    </head>

    <!-- BODY -->
    <body class="tooltips">
        <!-- BEGIN PAGE -->
        <div class="container">

            <!-- Your logo goes here -->
            <div class="logo-brand header sidebar rows">
                <div class="logo">
                    <h1><a href="#fakelink"><img src="<?php echo base_url('assets'); ?>/img/logo.png" alt="Logo"> NASAGOLD</a></h1>
                </div>
            </div><!-- End div .header .sidebar .rows -->

            <!-- BEGIN SIDEBAR -->
            <div class="left side-menu">


                <div class="body rows scroll-y">

                    <!-- Scrolling sidebar -->
                    <div class="sidebar-inner slimscroller">

                        <!-- User Session -->
                        <div class="media">
                            <a class="pull-left" href="<?php echo base_url('index.php/admin/avatar'); ?>">
                                <?php if (isset( $this->ion_auth->user()->row()->UserAvatar)) { ?>
                                <img class="media-object img-rounded" src="<?php echo base_url('images/avatar/'.$this->ion_auth->user()->row()->UserAvatar); ?>" alt="Avatar">
                                <?php } else { ?>
                                <img class="media-object img-rounded" src="<?php echo base_url('assets'); ?>/img/avatar/masarie.jpg" alt="Avatar">
                                <?php } ?>
                            </a>
                            <div class="media-body">
                                Selamat datang,
                                <h4 class="media-heading"><strong><?php echo $this->ion_auth->user()->row()->username ?></strong></h4>
                                <?php echo anchor('/auth/edit_user/'.$this->ion_auth->user()->row()->id, 'Edit'); ?>
                                <a class="md-trigger" data-modal="logout-modal-alt">Logout</a>
                            </div>
                        </div>


                        <!-- Search form -->
                        <div id="search">
                            <?php echo form_open('admin/search'); ?>
                                <input name="search" type="text" class="form-control search" placeholder="Search here...">
                                <i class="fa fa-search"></i>
                            <?php echo form_close(); ?>
                        </div><!-- End div #search -->
                        <?php $this->load->view('includes/side_menu'); ?>
                    </div><!-- End div .sidebar-inner .slimscroller -->
                </div><!-- End div .body .rows .scroll-y -->

                <!-- Sidebar footer -->
                <div class="footer rows animated fadeInUpBig">
                    <div class="progress progress-xs progress-striped active">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                            <span class="progress-precentage">80&#37;</span>
                        </div><!-- End div .pogress-bar -->
                        <a data-toggle="tooltip" title="See task progress" class="btn btn-default md-trigger" data-modal="task-progress"><i class="fa fa-inbox"></i></a>
                    </div><!-- End div .progress .progress-xs -->
                </div><!-- End div .footer .rows -->
            </div>
            <!-- END SIDEBAR -->

            <!-- BEGIN CONTENT -->
            <div class="right content-page">

                <?php $this->load->view('includes/navigator'); ?>