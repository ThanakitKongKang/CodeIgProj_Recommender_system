<head>
    <title><?= $title ?></title>
    <link rel="icon" href="<?= base_url() ?>/assets/_etc/library.png" type="image/x-icon">
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
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-9 mx-auto">
                <div class="card card-signin flex-row my-5">
                    <div class="card-img-left d-none d-md-flex">
                        <!-- Background image for card set in CSS! -->
                    </div>

                    <div class="card-body" style="min-height:80vh;">
                        <div class="position-absolute" style="right:2rem;top:1rem;">
                            <a href="javascript:history.go(-1)" class="link text-secondary"><i class="fas fa-times fa-lg"></i></a>
                        </div>

                        <div class="justify-content-center d-flex">
                            <img src="<?= base_url() ?>/assets/img/kingdom-4.png" width="100" height="100" class="d-inline-block align-top" alt="">
                        </div>
                        <!-- <h3 class="card-title text-center mt-2">Login</h3> -->
                        <form method="post" class="form-signup" action="<?= site_url('signup') ?>">
                            <div class="form-label-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control  <?php if (!empty(form_error('username'))) echo "is-invalid"; ?>" placeholder="username" name="username" id="username" value="<?php echo set_value('username'); ?>">
                                <?php if (!empty(form_error('username'))) { ?><a tabindex="0" class="text-danger error_message" role="button" data-toggle="popover" data-trigger="focus" title="Error" data-content="<?= form_error('username') ?>"><i class="far fa-times-circle invisible"></i></a> <?php } ?>
                            </div>

                            <div class="form-label-group input-group mb-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                </div>
                                <input type="password" class="form-control <?php if (!empty(form_error('password'))) echo "is-invalid"; ?>" placeholder="password" name="password" id="password" value="<?php echo set_value('password'); ?>">
                                <?php if (!empty(form_error('password'))) { ?><a tabindex="0" class="text-danger error_message" role="button" data-toggle="popover" data-trigger="focus" title="Error" data-content="<?= form_error('password') ?>"><i class="far fa-times-circle invisible"></i></a> <?php } ?>
                            </div>
                            <div class="form-label-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                </div>
                                <input type="password" class="form-control <?php if (!empty(form_error('passconf'))) echo "is-invalid"; ?>" placeholder="confirm password" name="passconf" id="passconf" value="<?php echo set_value('passconf'); ?>">
                                <?php if (!empty(form_error('passconf'))) { ?><a tabindex="0" class="text-danger error_message" role="button" data-toggle="popover" data-trigger="focus" title="Error" data-content="<?= form_error('passconf') ?>"><i class="far fa-times-circle invisible"></i></a> <?php } ?>
                            </div>

                            <div class="form-label-group input-group mb-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-portrait"></i></span>
                                </div>
                                <input type="text" class="form-control <?php if (!empty(form_error('firstname'))) echo "is-invalid"; ?>" placeholder="firstname" name="firstname" id="firstname" value="<?php echo set_value('firstname'); ?>">
                                <?php if (!empty(form_error('firstname'))) { ?><a tabindex="0" class="text-danger error_message" role="button" data-toggle="popover" data-trigger="focus" title="Error" data-content="<?= form_error('firstname') ?>"><i class="far fa-times-circle invisible"></i></a> <?php } ?>

                            </div>

                            <div class="form-label-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-portrait"></i></span>
                                </div>
                                <input type="text" class="form-control <?php if (!empty(form_error('lastname'))) echo "is-invalid"; ?>" placeholder="lastname" name="lastname" id="lastname" value="<?php echo set_value('lastname'); ?>">
                                <?php if (!empty(form_error('lastname'))) { ?><a tabindex="0" class="text-danger error_message" role="button" data-toggle="popover" data-trigger="focus" title="Error" data-content="<?= form_error('lastname') ?>"><i class="far fa-times-circle invisible"></i></a> <?php } ?>

                            </div>

                            <!-- <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">Remember password</label>
                            </div> -->
                            <!-- <?php echo validation_errors('<span class="errmsg text-center text-danger">', '</span><br>'); ?> -->

                            <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2 mt-5" type="submit">Sign up</button>
                            <div class="text-center small ">
                                Already a member?
                                <a href="login" style="text-decoration:none">Log in</a></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</body>

<script type="text/javascript">
    $(document).ready(function() {
        $('[data-toggle="popover"]').popover({
            trigger: "hover",
            placement: "right"
        });;

    });
</script>