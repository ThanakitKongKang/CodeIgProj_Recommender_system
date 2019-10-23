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
    <script src="<?= base_url() ?>/assets/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/css/dataTables.bootstrap4.min.css">
    <!-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/fh-3.1.4/kt-2.5.0/r-2.2.2/sc-2.0.0/datatables.min.js"></script> -->
    <!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> -->
    <!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> -->
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

    <!-- select search -->
    <link href="<?= base_url() ?>/assets/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/stylesheet.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/footer.css">

    <!-- responsive css -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/responsive_style_1024.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/responsive_style_768.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/responsive_style_450.css">



</head>

<body>
    <div class="row">
        <nav class="navbar navbar-expand-lg navbar-light shadow-sm bg-white fixed-top pb-0" id="navbar">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <div class="">
                        <a class="navbar-brand" href="<?= base_url() ?>">
                            <img src="<?= base_url() ?>/assets/_etc/library512x512.png" width="30" height="30" class="d-inline-block align-top" alt="">
                            <span style="font-family:sans-serif;font-size:1.5rem">D-Book</span>

                        </a>
                    </div>

                    <!-- Search -->
                    <div class="mx-auto">
                        <form class="form-inline" id="search_form" style="margin:0rem;" action="<?= base_url() ?>search/result">
                            <input class="form-control mr-sm-1" style="width:100%" type="search" name="q" autocomplete="off" placeholder="Search" aria-label="Search" id="input-search" value="<?php if (!empty($previous_query_string)) echo $previous_query_string; ?>">
                            <!-- <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"><i class="fas fa-search p-1"></i></button> -->
                            <div class="text-center justify-content-center live_search_loading position-relative w-100" style="display:none;">
                                <div class="spinner-border text-primary mr-3 position-absolute" role="status" style="width: 1.25rem;height: 1.25rem;border: .1em solid currentColor;border-right-color: transparent;right: -0.045rem;top: -2.25rem;">
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="">
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
                                    <a href="<?= base_url() ?>login" class="different_a"><button class="btn btn-outline-primary" style="font-weight:600;padding-top: 8px;padding-bottom: 8px;">LOG IN</button></a>
                                </li>
                                <li class="nav-item pl-3 mt-1">
                                    <a href="<?= base_url() ?>signup" class="different_a"><button class="btn btn-primary" style="font-weight:600;padding-top: 8px;padding-bottom: 8px;">SIGN UP</button></a>
                                </li>


                            <?php
                            } else { ?>
                                <li class="nav-item dropdown">
                                    <div class="nav-link dropdown-toggle text-primary" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-user-circle"></i> <?= $this->session->userdata('user')['username']; ?>
                                    </div>
                                    <div class="dropdown-menu" aria-labelledby="userDropdown">
                                        <a class="dropdown-item <?php if (isset($yourcourse)) echo $yourcourse; ?>" href="<?= base_url() ?>course">Your course</a>
                                        <a class="dropdown-item <?php if (isset($saveditem)) echo $saveditem; ?>" href="<?= base_url() ?>saved">Saved items <span class="badge badge-secondary count_all_saved_list" id="count_all_saved_list"><?= $this->session->userdata('count_all_saved_list'); ?></span></a>
                                        <a class="dropdown-item <?php if (isset($ratinghistory)) echo $ratinghistory; ?>" href="<?= base_url() ?>ratinghistory">Rating history</a>
                                        <!-- <a class="dropdown-item" href="<?= base_url() ?>test">How</a> -->

                                        <hr class="my-2">
                                        <a class="dropdown-item" href="<?= base_url() ?>logout">Log Out</a>
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

    <!-- create collection modal -->
    <div class="modal fade slide-bottom" id="create_collection_modal" tabindex="-1" role="dialog" aria-labelledby="create_collection_modal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Collection</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Collection name</span>
                        </div>
                        <input type="text" id="collection_name_input" autofocus class="form-control" placeholder="Give your collection a name...">
                        <span class="text-danger small position-absolute" style="display:none;top: 2.75rem;left: 10rem;" id="collection_name_input_pattern">Thai or English 1 - 60 characters (no space)</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" style="display:none;" class="btn btn-primary create_collection_submit">Create</button>
                </div>
            </div>
        </div>
    </div>

    <div id="save_collection_menu" class="position-absolute bg-white slide-bottom" style="display:none;">
        <div class="load_collection_menu text-center justify-content-center my-5" style="display: none;">
            <div class="spinner-border text-primary mr-3" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            Loading...
        </div>
        <div id="collection_menu_content">
            <div id="collection_menu" class="collection_menu">
            </div>
        </div>
    </div>

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
                title: 'Logged in successfully !',
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
                title: 'Registered successfully !',
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
                title: 'Logged out successfully !',
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
                title: 'You\'re already Logged in !',
                type: 'info',
                confirmButtonText: 'ตกลง',
            })

        <?php } ?>
        $('html').click(function() {
            // have to add all trigger to appear that shit
            if (!$("#stop-timer").hasClass("hovered") && !$(".move_to_another_collection").hasClass("hovered")) {
                if (!$("#save_collection_menu").hasClass("hovered")) {
                    $('#save_collection_menu').hide();
                }
            }
        });

        $("#save_collection_menu").hover(function() {
                $(this).addClass("hovered");
            },
            function() {
                $(this).removeClass("hovered");
            }
        );

        function toastBookmarkSaved(book_id) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                onOpen: () => {
                    $('.swal2-footer #stop-timer').on('mouseover', function(e) {
                        Swal.stopTimer();
                        $(this).addClass("hovered");
                    });
                    $('.swal2-footer #stop-timer').on('mouseout', function(e) {
                        Swal.resumeTimer();
                        $(this).removeClass("hovered");
                    });
                    $('.swal2-footer #stop-timer').on('click', function(e) {
                        e.preventDefault();
                        var rect = $(this).offset();
                        appearCollection(book_id, rect);
                    });
                }
            });

            Toast.fire({
                title: 'Saved successfully !',
                // html: '<a href id="stop-timer" style="border-bottom:1px solid #eee">Save to collection.</a>',
                footer: '<a href class="stop-timer text-decoration-none w-100 text-center" id="stop-timer">Save to collection.</a>',
                type: 'success',
            });
        }

        function toastBookmarkUnsaved() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            Toast.fire({
                title: 'Unsaved successfully !',
                type: 'success',
            });
        }

        function toastSavedToCollection(collection_name) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            Toast.fire({
                html: '<div style="margin:0.6em;font-weight:600;">Saved to collection <span class="font-arial text-primary">' + collection_name + '</span> successfully !</div>',
                type: 'success',
            });
        }

        function toastCreateCollection(collection_name) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            Toast.fire({
                html: '<div style="margin:0.6em;font-weight:600;">Created collection <span class="font-arial text-primary">' + collection_name + '</span> successfully !</div>',
                type: 'success',
            });
        }

        function toastEditCollection(collection_name) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            Toast.fire({
                html: '<div style="margin:0.6em;font-weight:600;">Collection name changed to <span class="font-arial text-primary">' + collection_name + '</span> successfully !</div><div>refreshing in 3 seconds...</div>',
                type: 'success',
            });
        }

        function toastDeleteCollection(collection_name) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1000
            });

            Toast.fire({
                html: '<div style="margin:0.6em;font-weight:600;">Collection <span class="font-arial text-primary">' + collection_name + '</span> has been removed !</div><div>redirecting...</div>',
                type: 'success',
            });
        }

        function toastCreateCollection_duplicate(collection_name) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'center',
                showConfirmButton: false,
                timer: 3000
            });

            Toast.fire({
                html: '<div style="margin:0.6em;font-weight:600;"><span class="font-arial text-primary">' + collection_name + '</span> is already taken!</div>',
                type: 'error',
            });
        }

        function toastRemoveFromCollection(collection_name) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            Toast.fire({
                html: '<div style="margin:0.6em;font-weight:600;">Remove from collection <span class="font-arial text-primary">' + collection_name + '</span> successfully!</div><div class="small font-arial">Refresh to see changes.</div>',
                type: 'success',
            });
        }

        function appearCollection(book_id, rect) {
            $('#save_collection_menu').css({
                "top": (rect.top - 100),
                "left": (rect.left - 0),
            });
            $('#save_collection_menu').show();
            $.ajax({
                type: 'post',
                url: "<?php echo base_url(); ?>books/get_collection_by_username",
                async: true,
                beforeSend: function() {
                    $(".load_collection_menu").show();
                },
                success: function(data) {
                    $(".load_collection_menu").hide();
                    var hr_html = "<hr class='m-0'>";
                    var create_html = "<div id='create_collection' class='dropdown-item small text-secondary' data-toggle='modal' data-target='#create_collection_modal' data-book_id='" + book_id + "'><i class='fas fa-plus-circle'></i> Create Collection</div>";
                    if (data == "zero") {
                        $('#collection_menu').html("<div class='text-secondary text-center font-arial'>You haven't create any collection.</div>" + hr_html + create_html);
                    } else {
                        $('#collection_menu').html(data + hr_html + create_html);
                    }
                }
            })
        }

        // collection select
        $(document).on('click', '.collection_select', function(e) {
            // console.log($('#create_collection').data("book_id"));
            // console.log($(this).html());
            var book_id = $('#create_collection').data("book_id");
            var collection_name = $(this).html();
            var post_data = {
                'book_id': book_id,
                'collection_name': collection_name,
            };
            add_to_collection_ajax(post_data, collection_name);
        });

        // collection create
        // autofocus any input with attribute in a modal
        $('.modal').on('shown.bs.modal', function() {
            $(this).find('[autofocus]').focus();
            $("#save_collection_menu").hide();
            $('.create_collection_submit_saved').hide();
            $('.create_collection_submit').hide();

        });

        // on modal close
        $('#create_collection_modal').on('hidden.bs.modal', function() {
            $('#collection_name_input').val("");
            $('#save_collection_menu').show();
            $('#collection_name_input_pattern').hide();
        })

        // on typing
        $('#collection_name_input').keyup(function(e) {
            var typing = $('#collection_name_input').val();
            checkTypingLength_collection_name(typing);
        });

        // on submit
        $('.create_collection_submit').on('click', function(e) {
            var book_id = $('#create_collection').data("book_id");
            var collection_name = $('#collection_name_input').val();
            var post_data_create = {
                'collection_name': collection_name,
            };
            // create collection
            $.ajax({
                type: 'post',
                url: "<?php echo base_url(); ?>books/create_collection",
                data: post_data_create,
                async: true,
                beforeSend: function() {
                    $(document.body).css({
                        'cursor': 'wait'
                    });
                },
                success: function(data) {
                    $('#create_collection_modal').modal('hide');
                    $(document.body).css({
                        'cursor': 'default'
                    });
                    if (data == "duplicate") {
                        toastCreateCollection_duplicate(collection_name);
                    } else {
                        var post_data_add = {
                            'book_id': book_id,
                            'collection_name': collection_name,
                        };
                        add_to_collection_ajax(post_data_add, collection_name);
                    }
                }
            })
        });

        function add_to_collection_ajax(post_data, collection_name) {
            $.ajax({
                type: 'post',
                url: "<?php echo base_url(); ?>books/add_to_collection",
                data: post_data,
                async: true,
                beforeSend: function() {
                    $(document.body).css({
                        'cursor': 'wait'
                    });
                },
                success: function(data) {
                    $('#save_collection_menu').hide();
                    $(document.body).css({
                        'cursor': 'default'
                    });
                    toastSavedToCollection(collection_name);

                    // saved page nav count change if any possible
                }
            })
        }

        function checkTypingLength_collection_name(typing) {
            if (typing.length == 0) {
                $('#collection_name_input_pattern').hide()
                $('.create_collection_submit').hide();
                return;
            } else if (typing.length > 60) {
                $('#collection_name_input_pattern').show()
            } else {
                var re = /^[a-zA-Z0-9_ก-๏.-]+$/;
                if (re.test(typing)) {
                    $('#collection_name_input_pattern').hide()
                    $('.create_collection_submit').show();
                    return;
                } else {
                    $('#collection_name_input_pattern').show()
                }

            }
        }
        $(document).ready(function() {
            // var isMobile = window.matchMedia("only screen and (max-width: 760px)").matches;
            // if (isMobile) {
            //     alert("Mobile phone display is not supported for now, We Recommend using a computer");
            // }
        });
    </script>


    <div id="content">