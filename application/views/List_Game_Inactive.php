<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />

        <title>List Game Inactive</title>

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
        <style media="screen" type="text/css">
            .judul{
                font-size: 30px;
                font-weight: bold;
                font-family: inherit;
                margin-bottom: 15px;
                text-align: center;
            }
            hr {
              border : 0;
              height: 1px;
              background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
            }
        </style>
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
                          <div class="judul">
                            Inctive Games <hr>
                          </div>
                            <?php
                            if (isset($_GET['msg'])) {
                                echo '<b style=color:blue>' . $_GET['msg'] . '</b>';
                            }
                            ?>
                            <div class="games" id="AllGames">

                                <ul class="cd-gallery cd-container" id="GamesScroll" style="margin-top: 0px">

                                    <?php foreach ($gameInactive as $game): ?>
                                        <li class="gScroll col-md-3">
                                            <ul class="cd-item-wrapper">
                                                <li class="is-visible">

                                                    <div class="game-shadow">
                                                        <!-- Go to Game -->
                                                        <a class="go-game"></a>
                                                        <!-- Games Info -->
                                                        <div class="game-stats">
                                                            <a href="<?php echo base_url().'index.php/changestatusgame?id=' . $game->id_game . '&status=' . $game->game_status; ?>" class="category" style="background-color:green;">
                                                                <i class="fa fa-pencil" aria-hidden="true"></i>Active
                                                            </a>
                                                            <a style="text-decoration: none;margin-left:5px;" class="category"><i class="fa fa-clone" aria-hidden="true" style="margin-right:3px;"></i><?php echo strtoupper($game->category_name); ?></a>
                                                        </div>
                                                    </div>
                                                    <!-- Game Cover -->
                                                    <img style="height: 181px" src="<?php echo base_url() . 'games-thumbnail/' . $game->game_thumb; ?>" alt="thumbnail">
                                                    <!-- Game Title -->
                                                    <div class="game-title">
                                                        <a style="text-decoration: none"><?php echo strtoupper($game->game_name); ?></a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                    <?php endforeach; ?>

                                </ul>

                            </div>
                            <center>
                            <div class="col-md-12">
                              <?php echo $pg;?>
                            </div>
                            </center>
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
