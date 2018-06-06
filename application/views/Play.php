<!doctype html>
<html lang="en" class="no-js">
    <head>
        <title>Play Game</title>
        <!-- Meta Tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <link rel="shortcut icon" href="<?php echo base_url(); ?>iplay-assets/uploads/settings/favicon.png" />

        <!-- Website Meta tags -->

        <!-- Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>
        <link href="<?php echo base_url(); ?>iplay-assets/fonts/estrewebfont.css" rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>iplay-assets/css/reset.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>iplay-assets/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>iplay-assets/css/forms.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>iplay-assets/css/toastr.css">
        <script src="<?php echo base_url(); ?>iplay-assets/js/modernizr.js"></script>
        <script src="https://use.fontawesome.com/3a2384ee4b.js"></script>

        <style>
            section {
                padding: 50px 0;
                text-align: center;
            }
            select.frecuency {
                border: none;
                font-style: italic;
                background-color: transparent;
                cursor: pointer;
                -webkit-transform: translateY(0);
                transform: translateY(0);
                -webkit-transition: -webkit-transform .35s ease-in;
                transition: -webkit-transform .35s ease-in;
                border-bottom: none;
            }
            select.frecuency:focus {
                outline: none;
                border-bottom: 5px solid #39b3d7;
                -webkit-transform: translateY(-5px);
                transform: translateY(-5px);
                -webkit-transition: -webkit-transform .35s ease-in;
                transition: -webkit-transform .35s ease-in;
            }
            .free {
                text-transform: uppercase;
            }
            .input-group {
                margin: 20px auto;
                width: 100%;
            }
            input.btn.btn-lg,
            input.btn.btn-lg:focus {
                outline: none;
                width: 60%;
                height: 60px;
                border-top-right-radius: 0;
                border-bottom-right-radius: 0;
            }
            button.btn {
                width: 40%;
                height: 60px;
                border-top-left-radius: 0;
                border-bottom-left-radius: 0;
            }
            .promise {
                color: #999;
            }
        </style>
    </head>
    <body>

        <!-- Header -->
        <header class="cd-main-header">
            <!-- Website LOGO -->
            <a href="" class="cd-logo"><img src="<?php echo base_url(); ?>iplay-assets/img/content-logo.png" style="height:50px;" alt="Logo"></a>
            <a href="#0" class="cd-nav-trigger">Menu<span></span></a>
        </header>
        <!-- .cd-main-header -->
        <main class="cd-main-content">
            <!-- Sidebar -->
            <nav class="cd-side-nav">
                <ul>
                    <!-- Home Page -->
                    <li class="home">
                        <a href="welcome">Home</a>
                    </li>

                    <!-- Categories -->
                    <li class="has-children categories">
                        <a href="#">Categories</a>
                        <ul>
                            <li>
                                <?php
                                foreach ($categoryName as $category) {
                                    echo '<a href="'.base_url().'index.php/welcome?g=' . $category->id_category . '@' . $category->category_name . '">' . strtoupper($category->category_name) . '</a>';
                                }
                                ?>
                            </li>
                        </ul>
                    </li>
                    <li class="has-children categories">
                        <a href="<?php echo base_url(); ?>index.php/welcome?g=3@promo">Game Promo</a>
                    </li>
                </ul>
                <!-- Pages -->
                <ul>
                    <li class="cd-label">Pages</li>
                    <!-- Contact us -->
                    <li class="contact">
                        <a href="">Contact us</a>
                    </li>

                </ul>
            </nav>

            <div class="content-wrapper">

                <div id="playGame">

                    <!-- Left Game Side -->
                    <div class="g-leftside" style="width:100%;">
                        <?php echo validation_errors(); ?>

                        <!-- Game Source -->
                        <div class="game-source whiteBox">
                            <?php
                            if (isset($gameOn)) {
                                echo $gameOn;
                            }
                            ?>
                        </div>
                    </div>

                </div>
            </div> 
        </main>

        <!-- JavaScripts -->
        <script src="<?php echo base_url(); ?>iplay-assets/js/jquery-2.1.4.js"></script>
        <script src="<?php echo base_url(); ?>iplay-assets/js/jquery.menu-aim.js"></script>
        <script src="<?php echo base_url(); ?>iplay-assets/js/main.js"></script>
        <script src="<?php echo base_url(); ?>iplay-assets/js/ajax.js"></script>
        <script src="<?php echo base_url(); ?>iplay-assets/js/toastr.js"></script>
        <script src="<?php echo base_url(); ?>iplay-assets/js/adblock.js"></script>
        <script src="<?php echo base_url(); ?>iplay-assets/js/jquery.infinitescroll.min.js"></script>
    </body>
</html>
