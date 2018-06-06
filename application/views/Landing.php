<!doctype html>
<html lang="en" class="no-js">
    <head>
        <title>Welcome to Game Villagech</title>
        <!-- Meta Tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <link rel="shortcut icon" href="<?php echo base_url(); ?>iplay-assets/uploads/settings/favicon.png" />

        <!-- Website Meta tags -->

        <!-- Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>
        <link href="i<?php echo base_url(); ?>play-assets/fonts/estrewebfont.css" rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>iplay-assets/css/reset.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>iplay-assets/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>iplay-assets/css/forms.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>iplay-assets/css/toastr.css">
        <script src="<?php echo base_url(); ?>iplay-assets/js/modernizr.js"></script>
        <script src="https://use.fontawesome.com/3a2384ee4b.js"></script>


    </head>
    <body>

        <!-- Header -->
        <header class="cd-main-header">

            <!-- Website LOGO -->
            <a href="" class="cd-logo"><img src="<?php echo base_url(); ?>iplay-assets/img/content-logo.png" style="height:50px;" alt="Logo"></a>

            <a href="#0" class="cd-nav-trigger">Menu<span></span></a>

        </header> <!-- .cd-main-header -->

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
                        <a href="contact">Contact us</a>
                    </li>

                </ul>
            </nav>


            <div class="content-wrapper">
                <div class="find-games">
                    <div class="search-games" style="float: left">
                        <form action="welcome" method="GET">
                            <input type="text" name="s" placeholder="Search Games..." autocomplete="off">
                            <button type="submit"></button>
                        </form>
                    </div>
                </div>

                <div class="games" id="AllGames">

                    <ul class="cd-gallery cd-container" id="GamesScroll">

                        <?php foreach ($gameActive as $game) : ?>
                            <li class="gScroll col-md-3">
                                <ul class="cd-item-wrapper">
                                    <li class="is-visible">

                                        <div class="game-shadow">

                                            <!-- Go to Game -->
                                            <a href="<?php echo base_url(); ?>index.php/play?g=<?php echo $game->id_game . '@' . $game->game_rename; ?>" class="go-game"></a>

                                            <!-- Games Info -->
                                            <div class="game-stats">
                                                <a class="category"><?php echo strtoupper($game->category_name); ?></a>

                                                <?php
                                                if ($game->game_cost == 1) {
                                                    echo '<a class="likes">Free to play</a>';
                                                } else {
                                                    echo '<a class="likes">Pay to play</a>';
                                                }
                                                ?>

                                            </div>

                                        </div>
                                        <!-- Game Cover -->
                                        <img style="height: 181px" src="<?php echo base_url() . 'games-thumbnail/' . $game->game_thumb; ?>" alt="thumbnail">

                                        <!-- Game Title -->
                                        <div class="game-title">
                                            <a><?php echo strtoupper($game->game_name); ?></a>
                                        </div>
                                    </li>

                                </ul>
                            </li>

                        <?php endforeach; ?>
                    </ul>
                </div>

                <center>
                    <div class="find-games">
                        <div class="search-games" style="float:none;">
                            <?php
                            if (isset($paginatonHide)) {
                                
                            } else {
                                echo $pg;
                            }
                            ?>
                        </div>
                    </div>
                </center>
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

        <!-- Auto load Games on scroll -->
        <script type="text/javascript">
            (function () {

                var loading_options = {
                    finishedMsg: "<div class='loading-msg'>No more games to load.</div>",
                    msgText: "<div class='loading-msg'><img src='http://store2.up-00.com/2016-11/1478787907711.gif' /></div>",
                    img: ":"
                };

                $('#GamesScroll').infinitescroll({
                    loading: loading_options,
                    navSelector: "#AllGames .pagination",
                    nextSelector: "#AllGames .pagination li.active + li a",
                    itemSelector: "#GamesScroll li.gScroll"
                });
            })();

            (function () {

                var loading_options = {
                    finishedMsg: "<div class='loading-msg'>No more games to load.</div>",
                    msgText: "<div class='loading-msg'><img src='http://store2.up-00.com/2016-11/1478787907711.gif' /></div>",
                    img: ":"
                };

                $('#comments-list').infinitescroll({
                    loading: loading_options,
                    navSelector: "#commentScroll .pagination",
                    nextSelector: "#commentScroll .pagination li.active + li a",
                    itemSelector: "#comments-list li.commentScroll"
                });
            })();

        </script>

    </body>
</html>
