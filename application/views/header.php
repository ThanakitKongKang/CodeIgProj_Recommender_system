<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= base_url() ?>/assets/_etc/library.png" type="image/x-icon">
    <title><?= $title ?></title>

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


    <!-- font -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet"> -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/all.css">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"> -->
    <!-- <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" /> -->

    <!-- datatables -->
    <script src="<?= base_url() ?>/assets/js/datatables.min.js"></script>
    <!-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/fh-3.1.4/kt-2.5.0/r-2.2.2/sc-2.0.0/datatables.min.js"></script> -->
    <script src="<?= base_url() ?>/assets/js/jquery.dataTables.min.js"></script>
    <!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> -->
    <script src="<?= base_url() ?>/assets/js/dataTables.bootstrap4.min.js"></script>
    <!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/css/dataTables.bootstrap4.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" /> -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" /> -->

    <!-- alert -->
    <script src="<?= base_url() ?>/assets/js/sweetalert2.all.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script> -->

    <!-- cookie -->
    <script src="<?= base_url() ?>/assets/js/jquery.cookie.js"></script>

    <!-- star rating -->
    <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url() ?>/assets/css/star-rating.min.css">
    <script src="<?= base_url() ?>/assets/js/star-rating.min.js"></script>

    <!-- moment -->
    <script src="<?= base_url() ?>/assets/js/moment.min.js"></script>

    <!-- numeral -->
    <script src="<?= base_url() ?>/assets/js/numeral.min.js"></script>

    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/stylesheet.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/footer.css">

</head>

<body>
    <div class="row">
        <nav class="navbar navbar-expand-lg navbar-light shadow-sm bg-white fixed-top pb-0" id="navbar">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <div class="col-3">
                        <a class="navbar-brand" href="<?= base_url() ?>">
                            <img src="<?= base_url() ?>/assets/_etc/library512x512.png" width="30" height="30" class="d-inline-block align-top" alt="">
                            <span style="font-family:sans-serif;font-size:1.5rem">D-Book</span>

                        </a>
                    </div>

                    <!-- Search -->
                    <div class="col-5">
                        <form class="form-inline" id="search_form" style="margin:0rem;" action="<?= base_url() ?>search/result">
                            <input class="form-control mr-sm-1" style="width:100%" type="search" name="q" autocomplete="off" placeholder="Search" aria-label="Search" id="input-search" value="<?php if (!empty($previous_query_string)) echo $previous_query_string; ?>">
                            <!-- <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"><i class="fas fa-search p-1"></i></button> -->
                            <div class="text-center justify-content-center live_search_loading position-relative w-100" style="display:none;">
                                <div class="spinner-border text-primary mr-3 position-absolute" role="status" style="width: 1.25rem;height: 1.25rem;border: .1em solid currentColor;border-right-color: transparent;right: -0.045rem;top: -2.25rem;">
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="col-4">
                        <ul class="navbar-nav ml-auto nav-menu">
                            <li class="nav-item <?php if (isset($home)) echo $home; ?>">
                                <a class="nav-link" href="<?= base_url() ?>">Home <span class="sr-only">(current)</span></a>
                            </li>

                            <li class="nav-item <?php if (isset($browse_all)) echo $browse_all; ?>">
                                <a class="nav-link" href="<?= base_url() ?>browse/all">Browse All</a>
                            </li>
                            <!-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Dropdown link
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li> -->
                            <?php
                            if (!$this->session->userdata('logged_in')) { ?>
                                <li class="nav-item pl-2 mt-1">
                                    <a href="<?= base_url() ?>login" class="different_a"><button class="btn btn-outline-primary" style="font-weight:600">LOG IN</button></a>
                                </li>
                                <li class="nav-item pl-3 mt-1">
                                    <a href="<?= base_url() ?>signup" class="different_a"><button class="btn btn-primary" style="font-weight:600">SIGN UP</button></a>
                                </li>


                            <?php
                            } else { ?>
                                <li class="nav-item dropdown ml-auto">
                                    <div class="nav-link dropdown-toggle text-primary" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-user-circle"></i> <?= $this->session->userdata('user')['username']; ?>
                                    </div>
                                    <div class="dropdown-menu" aria-labelledby="userDropdown">
                                        <a class="dropdown-item" href="<?= base_url() ?>course">Your course</a>
                                        <a class="dropdown-item" href="<?= base_url() ?>saved">Saved items <span class="badge badge-secondary count_all_saved_list" id="count_all_saved_list"><?= $this->session->userdata('count_all_saved_list'); ?></span></a>

                                        <a class="dropdown-item" href="<?= base_url() ?>test">How</a>

                                        <hr class="my-2">
                                        <a class="dropdown-item" href="<?= base_url() ?>logout">LOG OUT</a>
                                    </div>
                                </li>

                            <?php
                            }
                            ?>


                        </ul>
                    </div>
                </div>
            </div>

        </nav>
    </div>
    <div class="col-4 container" id="livesearch"></div>

    <script type="text/javascript">
        // scroll hide header
        var prevScrollpos = window.pageYOffset;
        window.onscroll = function() {
            var currentScrollPos = window.pageYOffset;
            // console.log(prevScrollpos + " : " + currentScrollPos)
            if (prevScrollpos > currentScrollPos) {
                document.getElementById("navbar").style.top = "0";
            } else if (prevScrollpos != 0) {
                document.getElementById("navbar").style.top = "-75px";
            }
            prevScrollpos = currentScrollPos;
        }

        function checkTypingLength(typing) {
            if (typing.length == 0) {
                document.getElementById("livesearch").innerHTML = "";
                document.getElementById("livesearch").style.border = "0px";
                $('#livesearch').hide();
                // ประวัติการค้นหา show
                return;
            } else {
                $('#livesearch').show();
                // ประวัติการค้นหา hide
                return;
            }
        }

        // on select live search
        $('#livesearch').on('click', ".live_search_result_option", function(e) {
            e.preventDefault();
            $('#input-search').val($(this).html());
            $('#livesearch').hide();
            $('#search_form').submit();

        });

        // on select live search author
        $('#livesearch').on('click', ".live_search_result_option_author", function(e) {
            e.preventDefault();
            $('#input-search').val($(this).html());
            $('#livesearch').hide();
            var query = "q=&author=" + $(this).html();
            window.location.href = '<?= base_url() ?>search/result?' + query;

        });

        $('#livesearch').on('click', ".live_search_result_all", function(e) {
            e.preventDefault();
            $('#livesearch').hide();
            $('#search_form').submit();

        });

        // lose focus
        $('#input-search').focusout(function(e) {
            if (!$("#livesearch").hasClass("hovered")) {
                $('#livesearch').hide();
            }
        });

        // in focus
        $('#input-search').focusin(function(e) {
            $('#livesearch').show();
        });

        // hover options
        $("#livesearch").hover(function() {
            $(this).addClass("hovered");
        }, function() {
            $(this).removeClass("hovered");
        });

        // if user clicks X
        $('input[type=search]').on('search', function() {
            var typing = $('#input-search').val();
            checkTypingLength(typing);
        });

        // Live search
        $('#input-search').keyup(function(e) {
            var typing = $('#input-search').val();
            checkTypingLength(typing);
            var post_data = {
                'typing': typing
            };
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('search/liveSearch'); ?>',
                data: post_data,
                async: true,
                beforeSend: function() {
                    $('.live_search_loading').show();
                },
                success: function(html) {
                    $('.live_search_loading').hide();
                    $('#livesearch').html(html);
                    // console.log(html);
                }
            });

        });

        // Swal alerts
        <?php
        if ($this->session->userdata('flash_success')) {
            ?>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            Toast.fire({
                title: 'เข้าสู่ระบบสำเร็จ !',
                type: 'success',
                confirmButtonText: 'ตกลง',
            })
        <?php
        }
        if ($this->session->userdata('register_success')) {
            ?>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            Toast.fire({
                title: 'สมัครสมาชิกสำเร็จ !',
                type: 'success',
                confirmButtonText: 'ตกลง',
            })
        <?php }
        if ($this->session->userdata('flash_logout')) { ?>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            Toast.fire({
                title: 'ออกจากระบบสำเร็จ !',
                type: 'success',
                confirmButtonText: 'ตกลง',
            })
        <?php
        }
        if ($this->session->userdata('already_logged_in')) { ?>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            Toast.fire({
                title: 'คุณได้เข้าสู่ระบบแล้ว !',
                type: 'info',
                confirmButtonText: 'ตกลง',
            })

        <?php } ?>
    </script>
    <div id="content">