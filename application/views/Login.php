<!doctype html>
<html lang="en" class="no-js">
    <head>
        <title>Access CMS Mobiwin Game</title>
        <!-- Meta Tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <link rel="shortcut icon" href="<?php echo base_url(); ?>iplay-assets/uploads/settings/favicon.png" />
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>
        <link href="<?php echo base_url(); ?>iplay-assets/fonts/estrewebfont.css" rel='stylesheet' type='text/css'>
<!--        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> -->

        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>iplay-assets/css/reset.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>iplay-assets/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>iplay-assets/css/forms.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>iplay-assets/css/toastr.css">
        <script src="<?php echo base_url(); ?>iplay-assets/js/modernizr.js"></script>
        <script src="https://use.fontawesome.com/3a2384ee4b.js"></script>

    </head>
    <body data-root="{{ url('/') }}">

        <div class="adblock">
            <div class="adblock_box"></div>
        </div>
        <main class="cd-main-content">

            <div class="content-wrapper" style="margin-left: 0px">
                <div class="smart-wrap">

                    <div class="smart-forms smart-container wrap">
                        
                        <?= form_open('signin', 'class="" role=""'); ?>
                            <div class="form-body">

                                <div class="spacer-b30">
                                    <div class="tagline"><span>Login CMS Mobiwin</span></div>
                                </div>

                                <div class="section">
                                    <label class="field prepend-icon">
                                        <input name="username" id="username" class="gui-input" placeholder="Your Username" type="text" required="">
                                        <span class="field-icon"><i class="fa fa-user"></i></span>  
                                    </label>
                                </div>

                                <!-- Subject -->
                                <div class="section">
                                    <label class="field prepend-icon">
                                        <input name="password" id="password" class="gui-input" placeholder="Your Password" type="password" required="">
                                        <span class="field-icon"><i class="fa fa-key"></i></span>  
                                    </label>
                                </div>
                                
                                <div class="section">
                                        <label style="color: red; font-weight: bold"><?php echo validation_errors(); ?></label>
                                        <label style="color: #16A4FA; font-weight: bold">
                                            <?php
                                            if (isset($_GET['msg'])) {
                                                echo $_GET['msg'];
                                            }
                                            ?></label>
                                    </div>
                            </div>
                            <div class="form-footer">
                                <button type="submit" class="button btn-primary"> Login </button>
                            </div>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </main>
<!--        <script src="iplay-assets/js/jquery-2.1.4.js"></script>
        <script src="iplay-assets/js/jquery.menu-aim.js"></script>
        <script src="iplay-assets/js/main.js"></script> 
        <script src="iplay-assets/js/ajax.js"></script> 
        <script src="iplay-assets/js/toastr.js"></script>
        <script src="iplay-assets/js/adblock.js"></script>
        <script src="iplay-assets/js/jquery.infinitescroll.min.js"></script>-->
    </body>
</html>