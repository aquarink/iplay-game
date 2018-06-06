<!doctype html>
<html lang="en" class="no-js">
    <head>
        <title>Welcome to Contenshub</title>
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
                        <a href="">Contact us</a>
                    </li>

                </ul>
            </nav>


            <div class="content-wrapper">

                <!-- Content -->

                <!-- contact us page -->
                <div class="smart-wrap" style="margin-bottom: 0px; margin-top: 20px">

                    <!-- Sessions Messages -->


                    <div class="smart-forms smart-container wrap-2">

                        <form method="POST" action="send" id="form-ui">

                            <input type="hidden" name="_token" value="uhUXVxJCZKuX8Umh9WTp299wLtHmqu2ZBjogspVG">
                            <div class="form-body">

                                <div class="spacer-b30">
                                    <div class="tagline"><span>Contact us</span></div>
                                </div>

                                <!-- Reason -->
                                <div class="section">
                                    <label class="field select">
                                        <select id="reason" name="reason">
                                            <option selected="selected" disabled=""> Select reason for contacting us </option>
                                            <option value="Customer service">Customer service</option>
                                            <option value="Business contact">Business contact</option>
                                            <option value="Advertising queries">Advertising queries</option>
                                            <option value="Other">Other</option></select>

                                        <i class="arrow"></i>                    
                                    </label>  
                                </div>

                                <!-- Email Address -->
                                <div class="section">
                                    <label class="field prepend-icon">
                                        <input name="email" id="email" class="gui-input" placeholder="Your Email Address" type="text">
                                        <span class="field-icon"><i class="fa fa-user"></i></span>  
                                    </label>
                                </div>

                                <!-- Subject -->
                                <div class="section">
                                    <label class="field prepend-icon">
                                        <input name="subject" id="subject" class="gui-input" placeholder="Subject" type="text">
                                        <span class="field-icon"><i class="fa fa-user"></i></span>  
                                    </label>
                                </div>

                                <!-- Your Message -->
                                <div class="section">
                                    <label class="field prepend-icon">
                                        <textarea class="gui-textarea" id="message" name="message" placeholder="Your Message..."></textarea>
                                        <span class="field-icon"><i class="fa fa-comments"></i></span>
                                        <span class="input-hint"> 
                                            <i style="color: red; font-weight: bold"><?php echo validation_errors(); ?></i>
                                            <i style="color: red; font-weight: bold">
                                                <?php
                                                if (isset($_GET['msg'])) {
                                                    echo $_GET['msg'];
                                                }
                                                ?>
                                            </i>
                                        </span>   
                                    </label>
                                </div>

                            </div>

                            <div class="form-footer">
                                <button type="submit" class="button btn-primary"> Send Message </button>
                            </div>
                        </form>
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