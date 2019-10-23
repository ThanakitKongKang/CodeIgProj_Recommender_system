<head>
    <title><?= $title ?></title>
    <link rel="icon" href="<?= base_url() ?>/assets/_etc/library.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous"> -->
    <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url() ?>/assets/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->

    <!-- jquery -->
    <script type="text/javascript" src="<?= base_url() ?>/assets/js/jquery-3.4.1.slim.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script type="text/javascript" src="<?= base_url() ?>/assets/js/jquery-3.4.1.min.js"></script>
    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script> -->

    <!-- vue -->
    <script src="<?= base_url() ?>/assets/js/vue.min.js"></script>

    <!-- js -->
    <script src="<?= base_url() ?>/assets/js/popper.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script> -->
    <script src="<?= base_url() ?>/assets/js/tether.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script> -->
    <script src="<?= base_url() ?>/assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/all.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/css/login.css">
    <!-- responsive css -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/responsive_style_1024.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/responsive_style_768.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/responsive_style_450.css">

</head>

<body>
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-lg-10 col-xl-9 mx-auto align-self-center card-signin_wrapper">
                <div class="card card-signin flex-row my-5">
                    <div class="card-img-left d-none d-md-flex">
                        <!-- Background image for card set in CSS! -->
                    </div>

                    <div class="card-body">
                        <div class="position-absolute" style="right:2rem;top:1rem;">
                            <a href="javascript:history.go(-1)" class="link text-secondary"><i class="fas fa-times fa-lg"></i></a>
                        </div>
                        <div class="justify-content-center d-flex">
                            <img src="<?= base_url() ?>/assets/_etc/library512x512.png" width="100" height="100" class="d-inline-block align-top" alt="">
                        </div>
                        <!-- <h3 class="card-title text-center mt-2">Login</h3> -->
                        <form method="post" class="form-signin" action="<?= site_url('login') ?>">
                            <div class="form-label-group">
                                <input type="text" class="form-control <?php if (!empty(form_error('username'))) echo "border border-danger"; ?>" placeholder="username" name="username" id="username" value="<?php echo set_value('username'); ?>">
                                <!-- <label for="inputUsername">Username</label> -->
                                <?php if (!empty(form_error('username'))) { ?><a tabindex="0" class="text-danger error_message" role="button" data-toggle="popover" data-trigger="focus" title="Error" data-content="<?= form_error('username') ?>"><i class="far fa-times-circle"></i></a> <?php } ?>
                            </div>

                            <div class="form-label-group">
                                <input type="password" class="form-control <?php if (!empty(form_error('password'))) echo "border border-danger"; ?>" placeholder="password" name="password" id="password" value="<?php echo set_value('password'); ?>">
                                <!-- <label for="inputPassword">Password</label> -->
                                <?php if (!empty(form_error('password'))) { ?><a tabindex="0" class="text-danger error_message" role="button" data-toggle="popover" data-trigger="focus" title="Error" data-content="<?= form_error('password') ?>"><i class="far fa-times-circle"></i></a> <?php } ?>
                            </div>

                            <!-- <div class="custom-control custom-checkbox mb-3">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">Remember password</label>
                                        </div> -->

                            <?php if (isset($feedback)) { ?> <div class="text-center errmsg text-danger mb-3"><i class="fas fa-times-circle"></i> <?= $feedback ?></div> <?php } ?>
                            <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Log in</button>
                            <div class="text-center">
                                <!-- <a class="small" href="signup" style="text-decoration:none">Create account</a> -->
                                <a class="btn btn-lg btn-outline-primary btn-block btn-login text-uppercase font-weight-bold mb-2 mt-1" href="<?= base_url('signup') ?>">Sign up</a>
                            </div>
                        </form>
                        <div class="position:relative justify-content-center signin_decoration">
                            <img src="<?= base_url() ?>assets/img/authentication.png" class="position-absolute" style="bottom:1rem;max-width:8rem;right:1rem;" alt="">
                        </div>
                    </div>

                </div>
            </div>
        </div>
</body>

<script type="text/javascript">
    $(document).ready(function() {
        $('[data-toggle="popover"]').popover({
            trigger: "click hover",
            placement: "right"
        });;
    });
</script>