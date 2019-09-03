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

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-9 mx-auto">
                <div class="card card-signin flex-row my-5">
                    <div class="card-img-left d-none d-md-flex">
                        <!-- Background image for card set in CSS! -->
                    </div>

                    <div class="card-body">

                        <div class="justify-content-center d-flex">
                            <img src="<?= base_url() ?>/assets/_etc/library512x512.png" width="100" height="100" class="d-inline-block align-top" alt="">
                        </div>
                        <!-- <h3 class="card-title text-center mt-2">Login</h3> -->
                        <form method="post" class="form-signin" action="<?= site_url('signup') ?>">
                            <div class="form-label-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control  <?php if (isset($feedback)) echo "border border-danger"; ?>" placeholder="ชื่อผู้ใช้" name="username" id="username" value="<?php echo set_value('username'); ?>">
                            </div>
                            <?php if (isset($feedback)) { ?> <div class="text-center errmsg text-danger"><?= $feedback ?></div> <?php } ?>

                            <div class="form-label-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                </div>
                                <input type="password" class="form-control" placeholder="รหัสผ่าน" name="password" id="password" value="<?php echo set_value('password'); ?>">
                            </div>

                            <div class="form-label-group input-group">
                                <input type="text" class="form-control" placeholder="ชื่อ" name="firstname" id="firstname" value="<?php echo set_value('firstname'); ?>">
                                <input type="text" class="form-control" placeholder="นามสกุล" name="lastname" id="lastname" value="<?php echo set_value('lastname'); ?>">
                            </div>

                            <!-- <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">Remember password</label>
                            </div> -->
                            <?php echo validation_errors('<span class="errmsg text-center text-danger">', '</span><br>'); ?>

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