<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />

        <title>Add New Game</title>

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />

        <link rel="shortcut icon" href="<?php echo base_url(); ?>iplay-assets/uploads/settings/favicon.png" />
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>iplay-assets/admin/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>iplay-assets/admin/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>iplay-assets/admin/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>iplay-assets/admin/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>iplay-assets/admin/assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <!--<link href="iplay-assets/admin/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />-->
        <link href="<?php echo base_url(); ?>iplay-assets/admin/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>iplay-assets/admin/assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>iplay-assets/admin/assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?php echo base_url(); ?>iplay-assets/admin/assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>iplay-assets/admin/assets/layouts/layout/css/inbox.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>iplay-assets/admin/assets/global/css/listgame.css" rel="stylesheet" type="text/css" />

        <!-- JQuery Map Plugin -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>iplay-assets/css/components.min.css">
        <link href="<?php echo base_url(); ?>iplay-assets/fonts/estrewebfont.css" rel='stylesheet' type='text/css'>
        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>iplay-assets/css/forms.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>iplay-assets/css/jquery-ui.css">
        <!-- Modals -->
        <link href="<?php echo base_url(); ?>iplay-assets/admin/assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>iplay-assets/admin/assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css" />
    </head>
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white" data-root="/">

        <div class="page-header navbar navbar-fixed-top">

            <div class="page-header-inner ">
                <div class="page-logo">
                    <a href="">
                        <img style="margin: 0px 0 0;" src="<?php echo base_url(); ?>iplay-assets/uploads/settings/logo.png" alt="logo" class="logo-default" />
                    </a>
                </div>
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                    <span></span>
                </a>
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">

                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" class="img-circle" src="<?php echo base_url(); ?>iplay-assets/img/invite.png" />
                                <span class="username username-hide-on-mobile">
                                    <?php echo strtoupper($this->session->userdata('name')); ?>
                                </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="logout">
                                        <i class="icon-key"></i> Log Out
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>

        <div class="page-container">

            <div class="page-sidebar-wrapper">

                <div class="page-sidebar navbar-collapse collapse">

                    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">

                        <li class="sidebar-toggler-wrapper hide">
                            <div class="sidebar-toggler">
                                <span></span>
                            </div>
                        </li>

                        <li class="nav-item start">
                            <a href="<?php echo base_url(); ?>index.php/dashboard" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>

                        <!-- Site Settings -->
                        <li class="nav-item  ">
                            <a class="nav-link nav-toggle">
                                <i class="fa fa-gamepad" style="color:#fff;"></i>
                                <span class="title">Games</span>
                                <span class="arrow"></span>
                            </a>

                            <ul class="sub-menu">
                                <li class="nav-item start ">
                                    <a href="<?php echo base_url(); ?>index.php/addgame" class="nav-link ">
                                        <i class="glyphicon glyphicon-plus-sign"></i>
                                        <span class="title">Add Games</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link nav-toggle">
                                        <i class="glyphicon glyphicon-th-list"></i>
                                        <span class="title">Game List</span>
                                        <span class="arrow"></span>
                                    </a>

                                    <ul class="sub-menu">
                                        <li class="nav-item start">
                                            <a href="<?php echo base_url(); ?>index.php/listgameactive" class="nav-link ">
                                                <i class="glyphicon glyphicon-ok"></i>
                                                <span class="title">List of Active Games</span>
                                            </a>
                                        </li>
                                        <li class="nav-item start">
                                            <a href="<?php echo base_url(); ?>index.php/listgameinactive" class="nav-link ">
                                                <i class="glyphicon glyphicon-remove"></i>
                                                <span class="title">List of Inactive Games</span>
                                            </a>
                                        </li>
                                        <li class="nav-item start">
                                            <a href="<?php echo base_url(); ?>index.php/listgamepromo" class="nav-link ">
                                                <i class="glyphicon glyphicon-tag"></i>
                                                <span class="title">List of Promo Games</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <!-- Category Settings -->
                        <li class="nav-item  ">
                            <a class="nav-link nav-toggle">
                                <i class="glyphicon glyphicon-list-alt"></i>
                                <span class="title">Category</span>
                                <span class="arrow"></span>
                            </a>

                            <ul class="sub-menu">
                                <li class="nav-item start ">
                                    <a href="<?php echo base_url(); ?>index.php/addcategory" class="nav-link ">
                                        <i class="glyphicon glyphicon-plus-sign"></i>
                                        <span class="title">Add Category</span>
                                    </a>
                                </li>
                                <li class="nav-item start">
                                    <a href="<?php echo base_url(); ?>index.php/listcategory" class="nav-link ">
                                        <i class="glyphicon glyphicon-th-list"></i>
                                        <span class="title">List of Category</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <?php if($this->session->userdata('level') == 1): ?>
                        <!-- Report -->
                        <li class="nav-item  ">
                            <a class="nav-link nav-toggle">
                                <i class="fa fa-bar-chart" style="color:#fff;"></i>
                                <span class="title">Report</span>
                                <span class="arrow"></span>
                            </a>

                            <ul class="sub-menu">
                                <li class="nav-item start ">
                                    <a href="<?php echo base_url(); ?>index.php/report" class="nav-link ">
                                        <i class="glyphicon glyphicon-list-alt"></i>
                                        <span class="title">All Report</span>
                                    </a>
                                </li>

                                <li class="nav-item start ">
                                    <a href="<?php echo base_url(); ?>index.php/dailyreport" class="nav-link ">
                                        <i class="glyphicon glyphicon-calendar"></i>
                                        <span class="title">Daily Report</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php endif; ?>
                        
                    </ul>
                </div>
            </div>

            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">

                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">

                    <!-- Dashboard Home -->
                    <div class="row">

                        <div class="col-md-12">

                            <div class="smart-forms smart-container wrap">

                                <?= form_open_multipart('addnewgame', 'class="" role=""'); ?>
                                <div class="form-body">

                                    <div class="spacer-b30">
                                        <div class="tagline"><span>Add New Game</span></div>
                                    </div>

                                    <?php if(isset($_GET['msg'])) { ?>
                                    <div class="spacer-b30">
                                        <div class="tagline"><span style="color:red"><?php echo $_GET['msg']; ?></span></div>
                                    </div>
                                    <?php } ?>

                                    <div class="section">
                                        <label style="color: #16A4FA; font-weight: bold">Category</label>
                                        <label class="field select">
                                            <select name="category" id="category">
                                                <option selected="selected" disabled=""><i class="fa fa-bars"></i> CATEGORY </option>
                                                <?php
                                                foreach ($allCategory as $row) {
                                                    echo '<option value="' . $row->id_category . '">' . strtoupper($row->category_name) . '</option>';
                                                }
                                                ?>
                                            </select>
                                            <i class="arrow"></i>
                                        </label>
                                    </div>

                                    <div class="section">
                                        <label style="color: #16A4FA; font-weight: bold">Game Title</label>
                                        <label class="field prepend-icon">
                                            <input name="gameTitle" id="gameTitle" class="gui-input" placeholder="Game Title" type="text" required="">
                                            <span class="field-icon"><i class="fa fa-gamepad"></i></span>
                                        </label>
                                    </div>

                                    <div class="section">
                                        <label style="color: #16A4FA; font-weight: bold">Game File <small>must be zip extension</small></label>
                                        <label class="field prepend-icon">
                                            <input name="gameFile" id="gameFile" class="gui-input" accept=".zip,.rar" placeholder="Game File" type="file" required="">
                                            <span class="field-icon"><i class="fa fa-file"></i></span>
                                        </label>
                                    </div>

                                    <div class="section">
                                        <label style="color: #16A4FA; font-weight: bold">Game Thumbnail <small>must be image type</small></label>
                                        <label class="field prepend-icon">
                                            <input name="gameThumbnail" id="gameThumbnail" class="gui-input" accept=".jpg,.jpeg,.png" placeholder="Game Thumbnail" type="file" required="">
                                            <span class="field-icon"><i class="fa fa-image"></i></span>
                                        </label>
                                    </div>

                                    <div class="section">
                                        <label style="color: #16A4FA; font-weight: bold">Fee</label>
                                        <label class="field select">
                                            <select name="fee" id="fee">
                                                <option value="0" selected="selected" disabled="">Choose Fee</option>
                                                <option value="1">Free</option>
                                                <option value="2">Pay</option>
                                            </select>
                                            <i class="arrow"></i>
                                        </label>
                                    </div>

                                    <div class="section">
                                        <label style="color: red; font-weight: bold"><?php echo validation_errors(); ?></label>
                                        <label style="color: #16A4FA; font-weight: bold"><?php
                                            if (isset($_GET['msg'])) {
                                                echo $_GET['msg'];
                                            }
                                            ?></label>
                                    </div>


                                </div>
                                <div class="form-footer">
                                    <button type="submit" class="button btn-primary"><i class="fa fa-gamepad"></i> Add New Game </button>
                                </div>
                                <?= form_close(); ?>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="page-footer">

                <!-- Do Not Change These, You do Not Have Permissions -->
                <div class="page-footer-inner">
                    <?php echo date('Y'); ?> &copy; <a href="" target="_blank">Mobiwin Games</a>. All rights reserved.
                </div>

                <!-- Scroll Up Icon -->
                <div class="scroll-to-top">
                    <i class="icon-arrow-up"></i>
                </div>
            </div>

            <!-- BEGIN CORE PLUGINS -->
            <script src="<?php echo base_url(); ?>iplay-assets/js/jquery-1.12.4.js"></script>
            <script src="<?php echo base_url(); ?>iplay-assets/js/jquery-ui.js"></script>
            <script src="<?php echo base_url(); ?>iplay-assets/admin/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>iplay-assets/admin/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>iplay-assets/admin/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>iplay-assets/admin/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>iplay-assets/admin/assets/global/scripts/app.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>iplay-assets/admin/assets/pages/scripts/dashboard.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>iplay-assets/admin/assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>iplay-assets/admin/assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>iplay-assets/admin/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>iplay-assets/admin/assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>iplay-assets/admin/assets/apps/scripts/ajax.js" type="text/javascript"></script>
    </body>
</html>
