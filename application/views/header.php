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
    <script type="text/javascript" src="<?= base_url() ?>/assets/js/jquery-3.4.1.min.js"></script>
    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script> -->

    <!-- vue -->
    <script type="text/javascript" src="<?= base_url() ?>/assets/js/vue.min.js"></script>

    <!-- js -->
    <script type="text/javascript" src="<?= base_url() ?>/assets/js/popper.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script> -->
    <script type="text/javascript" src="<?= base_url() ?>/assets/js/tether.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script> -->
    <script type="text/javascript" src="<?= base_url() ?>/assets/js/bootstrap.min.js"></script>


    <!-- font -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet"> -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/all.css">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"> -->
    <!-- <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" /> -->

    <!-- datatables -->
    <script type="text/javascript" src="<?= base_url() ?>/assets/js/datatables.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/assets/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/assets/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/assets/js/dataTables.fixedColumns.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/css/dataTables.bootstrap4.min.css">

    <!-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/fh-3.1.4/kt-2.5.0/r-2.2.2/sc-2.0.0/datatables.min.js"></script> -->
    <!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> -->
    <!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" /> -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" /> -->

    <!-- alert -->
    <script type="text/javascript" src="<?= base_url() ?>/assets/js/sweetalert2.all.min.js"></script>

    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script> -->

    <!-- cookie -->
    <script type="text/javascript" src="<?= base_url() ?>/assets/js/jquery.cookie.js"></script>

    <!-- star rating -->
    <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url() ?>/assets/css/star-rating.min.css">
    <script type="text/javascript" src="<?= base_url() ?>/assets/js/star-rating.min.js"></script>

    <!-- moment -->
    <script type="text/javascript" src="<?= base_url() ?>/assets/js/moment.min.js"></script>

    <!-- numeral -->
    <script type="text/javascript" src="<?= base_url() ?>/assets/js/numeral.min.js"></script>

    <!-- select search -->
    <link href="<?= base_url() ?>/assets/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/stylesheet.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/footer.css">

    <!-- responsive css -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/responsive_style_1024.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/responsive_style_768.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/responsive_style_450.css">

    <!-- slick carousel -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/css/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/css/slick/slick-theme.css" />

    <!-- AOS -->
    <link href="<?= base_url() ?>/assets/css/aos.css" rel="stylesheet">
    <script src="<?= base_url() ?>/assets/js/aos.js"></script>

    <!-- jQuery comments -->
    <link href="<?= base_url() ?>/assets/css/jquery-comments.css" rel="stylesheet">
    <script src="<?= base_url() ?>/assets/js/jquery-comments.min.js"></script>

    <!-- switchbox -->
    <link href="<?= base_url() ?>/assets/css/switchbox.min.css" rel="stylesheet">

    <!-- dashboard -->
    <link href="<?= base_url() ?>/assets/css/dashboard.css" rel="stylesheet">

    <!-- img upload crop -->
    <script src="<?= base_url() ?>/assets/js/croppie.min.js"></script>
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/croppie.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/croppie.min.css.map" />

    <!-- Chart -->
    <script src="<?= base_url() ?>/assets/js/chart.js/Chart.min.js"></script>

</head>

<body data-spy="scroll" data-target="#list-example" data-offset="100">
    <div class="row">
        <nav class="navbar navbar-expand-lg navbar-light shadow-sm bg-white fixed-top pb-0" id="navbar">
            <div class="container justify-content-end">
                <div class="custom_navbar_toggler">
                    <a class="navbar-brand" href="<?= base_url() ?>">
                        <img src="<?= base_url() ?>/assets/_etc/library512x512.png" width="30" height="30" class="d-inline-block align-top" alt="">
                        <span style="font-family:sans-serif;font-size:1.5rem">CS-Book</span>

                    </a>
                </div>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <div class="">
                        <a class="navbar-brand" href="<?= base_url() ?>">
                            <img src="<?= base_url() ?>/assets/_etc/library512x512.png" width="30" height="30" class="d-inline-block align-top" alt="">
                            <span style="font-family:sans-serif;font-size:1.5rem">CS-Book</span>

                        </a>
                    </div>

                    <!-- Search -->
                    <div class="ml-auto navbar_search">
                        <form class="form-inline" id="search_form" style="margin:0rem;" action="<?= base_url() ?>search/result">
                            <input class="form-control mr-sm-1" type="search" name="q" autocomplete="off" placeholder="Search" aria-label="Search" id="input-search" value="<?php if (!empty($previous_query_string)) echo $previous_query_string; ?>">
                            <!-- <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"><i class="fas fa-search p-1"></i></button> -->
                            <div class="text-center justify-content-center live_search_loading position-relative w-100" style="display:none;">
                                <div class="spinner-border text-primary mr-3 position-absolute" role="status" style="width: 1.25rem;height: 1.25rem;border: .1em solid currentColor;border-right-color: transparent;right: -0.045rem;top: -2.25rem;">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="mb-2 col-lg-2">
                        <a class="small advs_anchor text_gradient_theme text_gradient_theme_hoverable" href="">Advanced Search <i class="fas fa-search-plus"></i></a>

                    </div>

                    <div class="" id="nav_right_header">
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
                                <li class="nav-item pl-2 mt-1">
                                    <a href="<?= base_url() ?>signup" class="different_a"><button class="btn bg_linear_theme" style="font-weight:600;padding-top: 9px;padding-bottom: 9px;">SIGN UP</button></a>
                                </li>


                            <?php
                            } else { ?>
                                <li class="nav-item dropdown custom_dropleft">
                                    <div class="nav-link dropdown-toggle text-primary" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?php
                                        if ($this->session->userdata('profile_pic')) { ?>
                                            <img src="<?= base_url() ?>assets/user_profile_pic/<?= $this->session->userdata('user')['username']; ?>.PNG" class="profile_pic_header" width="25"> <?= $this->session->userdata('user')['username']; ?>
                                        <?php } else { ?>
                                            <i class="fas fa-user-circle profile_pic_header"></i> <?= $this->session->userdata('user')['username']; ?>
                                        <?php } ?>

                                    </div>
                                    <div class="dropdown-menu" aria-labelledby="userDropdown" id="userDropdown_show">
                                        <a class="dropdown-item <?php if (isset($yourcourse)) echo $yourcourse; ?>" href="<?= base_url() ?>course">Your course</a>
                                        <a class="dropdown-item <?php if (isset($saveditem)) echo $saveditem; ?>" href="<?= base_url() ?>saved">Saved items <span class="badge badge-secondary count_all_saved_list" id="count_all_saved_list"><?= $this->session->userdata('count_all_saved_list'); ?></span></a>
                                        <a class="dropdown-item <?php if (isset($ratinghistory)) echo $ratinghistory; ?>" href="<?= base_url() ?>ratinghistory">Rating history <span class="badge badge-secondary count_all_rating_history" id="count_all_rating_history"><?= $this->session->userdata('count_all_rating_history'); ?></span></a>
                                        <!-- <a class="dropdown-item" href="<?= base_url() ?>test">How</a> -->

                                        <hr class="my-2">
                                        <?php if ($this->session->userdata('user')['username'] == "admin") { ?>
                                            <h6 class="dropdown-header">Admin</h6>
                                            <a class="dropdown-item <?php if (isset($accSetting)) echo $accSetting; ?>" data-target="#accSetting" data-toggle="modal" href="#accSetting">My Account</a>

                                            <a class="dropdown-item <?php if (isset($dashboard)) echo $dashboard; ?>" href="<?= base_url() ?>dashboard">Dashboard</a>
                                            <a class="dropdown-item <?php if (isset($testmode)) echo $testmode; ?>" href="<?= base_url() ?>testmode">Debugger</a>

                                            <hr class="my-2">
                                        <?php  } else { ?>
                                            <h6 class="dropdown-header">General Account Settings</h6>
                                            <a class="dropdown-item <?php if (isset($accSetting)) echo $accSetting; ?>" data-target="#accSetting" data-toggle="modal" href="#accSetting">My Account</a>
                                            <hr class="my-2">
                                        <?php } ?>
                                        <a class="dropdown-item" href="https://drive.google.com/drive/u/1/folders/1Ko-rcBT1rPSri_Ph4-FYnA-cDXolZNAB?fbclid=IwAR3a77DeDMKYQo39VJAFEowWZTl-guMjsM0spsblyLZQ_Hx4JOEdeGeyjwI"><i class="fas fa-question-circle pr-2 color_secondary"></i>Help</a>
                                        <a class="dropdown-item" href="<?= base_url() ?>logout"><i class="fas fa-sign-out-alt pr-2 color_secondary"></i>Log Out</a>
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

    <!-- Account setting -->
    <div class="modal fade" id="accSetting" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">My Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="old_username" id="old_username">
                    <table class="modal_user_info w-100 m-lg-5">
                        <div class="text-center">
                            <img class="" id="old_pfp" src="" alt="">

                            <div id="preview_upload_wrapper_pfpic">
                            </div>
                            <div class="input-group mb-3 mx-auto col-lg-6">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Profile Picture</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input profile_pic_input" id="profile_pic_input" aria-describedby="profile_pic_input" accept="image/jpeg, image/png">
                                    <label class="custom-file-label label_cover text-left" for="profile_pic_input">Update</label>
                                </div>
                            </div>
                        </div>

                        <hr class="mt-lg-5 my-4">
                        <tr>
                            <td>
                                <div class="input-group col-lg-6 col-md-9">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Username</span>
                                    </div>
                                    <input type="text" class="form-control" id="username_index" name="username_index" title="Must be English charaters or numbers" pattern='[a-zA-Z0-9\s]{3,24}$' required>
                                </div>
                                <span class="ml-5 small pl-5 text-danger" style="display:none" id="name_exists_error">Username already taken</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="input-group mb-3 mt-3 col-lg-9">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Firstname</span>
                                    </div>
                                    <input type="text" class="form-control" id="first_name" name="first_name" required>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="input-group mb-3 col-lg-9">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Lastname</span>
                                    </div>
                                    <input type="text" class="form-control" id="last_name" name="last_name" required>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a class="small pl-5 w-100 ml-5 font-arial pt-1" style="display:block" href="#" data-target="#changePassword" data-toggle="modal" href="#changePassword">Change Password</a>
                            </td>
                        </tr>



                    </table>
                </div>
                <div class="edit_footer modal-footer">
                    <button type="button" onclick="" id="footer-submit" class="edit_user_index btn btn-primary text-white" data-dismiss="modal">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Account setting -->
    <div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="modal_user_password w-100 m-5">
                        <tr>
                            <td>
                                <div class="input-group mb-3 mt-3 w-75">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Current Password</span>
                                    </div>
                                    <input type="password" class="form-control" id="current_password" name="current_password" required>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="input-group mb-3 w-75">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">New Password</span>
                                    </div>
                                    <input type="password" class="form-control" id="new_password" name="new_password" required>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="edit_footer modal-footer">
                    <button type="button" onclick="" id="footer-submit" class="edit_password_index btn btn-primary text-white" data-dismiss="modal">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <div id="save_collection_menu" class="position-absolute bg-white slide-bottom" style="display:none;">
        <div class="load_collection_menu text-center justify-content-center py-3 px-4" style="display: none;">
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
        var isProfilePicChange = false;

        $('#profile_pic_input').on('change', function() {
            var fileName = $(this).val().replace(/C:\\fakepath\\/i, '');
            $(this).next('.label_cover').html(fileName);
            readFile_profilepic(this);
            isProfilePicChange = true;
        })

        var upload_pfp;
        var is_pfp_Init = false;

        function readFile_profilepic(input) {
            if (input.files && input.files[0]) {
                var reader_pfp = new FileReader();
                if (!is_pfp_Init) {
                    upload_pfp = $('#preview_upload_wrapper_pfpic').croppie({
                        viewport: {
                            width: 250,
                            height: 250,
                            type: 'circle'
                        },
                        boundary: {
                            width: "100%",
                            height: "20rem",

                        },
                    });
                    is_pfp_Init = true;
                }

                reader_pfp.onload = function(e) {
                    $('#preview_upload_wrapper_pfpic').croppie('bind', {
                        url: e.target.result
                    });
                    $('#old_pfp').hide();
                }
                reader_pfp.readAsDataURL(input.files[0]);
            }
        }
        var image_pfp;
        $('#accSetting').on('hidden.bs.modal', function() {
            if (isProfilePicChange) {
                isProfilePicChange = false;
                is_pfp_Init = false;
                $('#old_pfp').show();
                $('#profile_pic_input').val('');
                upload_pfp.croppie('destroy');
            }
        });
    </script>

    <script type="text/javascript" src="<?= base_url() ?>/assets/js/slick/slick.min.js"></script>
    <script type="text/javascript">
        AOS.init();
        var isLogged_in = false;
        var username = false;
        var isAdmin = false;
        <?php
        if ($this->session->userdata('logged_in')) { ?>
            isLogged_in = !isLogged_in;
            username = "" + "<?= $this->session->userdata('user')['username']; ?>" + "";

        <?php } ?>
        if (username == "admin") isAdmin = true;
        // scroll hide header
        var isMobile_index = window.matchMedia("only screen and (max-width: 1024px)").matches;
        var dashboard = false;
        <?php if (isset($dashboard)) { ?>
            dashboard = true;
        <?php } ?>
        if (!isMobile_index && !dashboard) {
            var prevScrollpos = window.pageYOffset;
            window.onscroll = function() {
                var currentScrollPos = window.pageYOffset;
                // console.log(prevScrollpos + " : " + currentScrollPos)
                if (prevScrollpos > currentScrollPos) {
                    document.getElementById("navbar").style.top = "0";
                } else if (prevScrollpos != 75) {
                    document.getElementById("navbar").style.top = "-75px";
                    $('#livesearch').hide();
                }
                prevScrollpos = currentScrollPos;
            }

        }
        var search_history_html = "";
        get_search_history();

        function checkTypingLength(typing) {
            if (typing.length == 0) {

                document.getElementById("livesearch").innerHTML = search_history_html;
                document.getElementById("livesearch").style.border = "0px";
                // $('#livesearch').hide();
                // ประวัติการค้นหา show
                return true;
            } else {
                $('#livesearch').show();
                // ประวัติการค้นหา hide
                return false;
            }

        }

        // User edit function
        var old_username_index;
        var current_password;
        $('#accSetting').on('shown.bs.modal', function() {
            $.ajax({
                type: 'GET',
                url: '<?= base_url() ?>api/user/get_one',
                beforeSend: function() {
                    $(document.body).css({
                        'cursor': 'wait'
                    });
                },
                success: function(data) {
                    var json_response = JSON.parse(data);
                    old_username_index = json_response["username"];
                    $('input#old_username').val(json_response["username"]);
                    $('#username_index').val(json_response["username"]);
                    $('#first_name').val(json_response["first_name"]);
                    $('#last_name').val(json_response["last_name"]);
                    $(document.body).css({
                        'cursor': 'default'
                    });

                    $("#old_pfp").attr("src", "<?= base_url() ?>/assets/user_profile_pic/" + old_username_index + ".PNG?" + new Date().getTime());

                }
            })
        })

        const generalToast = Swal.mixin({
            toast: true,
            position: 'bottom-end',
            showConfirmButton: false,
            timer: 3000
        });

        var isValid_index = false;

        function formCheckValid_index() {
            var username = document.querySelector("#username_index");
            var first_name = document.querySelector("#first_name");
            var last_name = document.querySelector("#last_name");

            isValid_index = username.checkValidity() & first_name.checkValidity() & last_name.checkValidity();
        }

        var isNameExists_index = false;

        function usernameCheck_index() {
            var username = {
                username: $('[name ="username_index"]').val(),
            };
            if (old_username_index != $('[name ="username_index"]').val()) {
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url() ?>api/user/name_exists',
                    data: username,
                    success: function(data) {
                        if (data == "true") {
                            $('#username_index').addClass("bg-danger");
                            $('#username_index').addClass("text-white");
                            $('#name_exists_error').show();
                            isNameExists_index = true;
                        } else {
                            $('#username_index').removeClass("bg-danger");
                            $('#username_index').removeClass("text-white");
                            $('#name_exists_error').hide();
                            isNameExists_index = false;
                        }
                    }
                })
            }
        }

        $('#username_index').on('keyup', function() {
            usernameCheck_index();
        });

        var flag_allow_profile_update = false;
        $('.edit_user_index').on('click', function(e) {
            event.preventDefault();
            if (isProfilePicChange) {
                upload_pfp.croppie('result', {
                    type: 'canvas',
                    size: 'viewport'
                }).then(function(response) {
                    image_pfp = {
                        image: response,
                        username: $('#username_index').val(),
                    };
                })
                flag_allow_profile_update = true;
            }
            swalEditUserConfirm_index();
        })

        function swalEditUserConfirm_index() {
            formCheckValid_index();
            if (!isNameExists_index) {
                if (isValid_index) {
                    var userArray = {
                        old_username: old_username_index,
                        username: $('#username_index').val(),
                        first_name: $('#first_name').val(),
                        last_name: $('[name="last_name"]').val(),
                    };

                    Swal.fire({
                        title: 'Confirm your password?',
                        html: "",
                        type: 'warning',
                        input: 'password',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#a0a0a0',
                        confirmButtonText: 'Save',
                        cancelButtonText: 'Cancel',
                        showLoaderOnConfirm: true,
                        inputPlaceholder: 'Confirm your password',
                        allowOutsideClick: () => !Swal.isLoading(),
                        inputValidator: (value) => {
                            if (!value) {
                                return 'Please confirm your password!'
                            }
                        },
                        preConfirm: function() {
                            return new Promise((resolve, reject) => {
                                resolve({
                                    username: old_username_index,
                                    password: $('input[placeholder="Confirm your password"]').val()
                                });
                            });
                        },
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                type: 'POST',
                                url: '<?= base_url() ?>api/user/password_match',
                                data: result.value,
                                success: function(data) {
                                    if (data == "false") {
                                        generalToast.fire({
                                            title: 'Error !',
                                            text: 'Password does not match',
                                            type: 'error',
                                        })
                                        $('#accSetting').modal('show');
                                    } else {
                                        // password matched
                                        if (flag_allow_profile_update) {
                                            // update cover
                                            $.ajax({
                                                type: 'POST',
                                                url: '<?= base_url() ?>api/user/user_profile_upload',
                                                data: image_pfp,
                                                success: function(data) {
                                                    flag_allow_profile_update = false;
                                                    $(".profile_pic_header").attr("src", "<?= base_url() ?>assets/user_profile_pic/" + old_username_index + ".PNG?" + new Date().getTime());
                                                    $("i.profile_pic_header").parent().prepend("<img src='<?= base_url() ?>assets/user_profile_pic/" + old_username_index + ".PNG?" + new Date().getTime() + "' class='profile_pic_header' width='25'>");
                                                    var interval = setInterval(function() {
                                                        $("i.profile_pic_header").remove();
                                                        clearInterval(interval);
                                                    }, 50);
                                                }
                                            })

                                        }

                                        $.ajax({
                                            type: 'POST',
                                            url: '<?= base_url() ?>api/user/update_self',
                                            data: userArray,
                                            beforeSend: function() {
                                                $(document.body).css({
                                                    'cursor': 'wait'
                                                });
                                            },
                                            success: function(data) {
                                                generalToast.fire({
                                                    title: 'Success !',
                                                    text: 'Saved changes',
                                                    type: 'success',
                                                })
                                                $('#accSetting').modal('hide');
                                                $(document.body).css({
                                                    'cursor': 'default'
                                                });
                                            }
                                        })
                                    }
                                }
                            })

                        } else {
                            $('#accSetting').modal('show');
                        }
                    })
                } else {
                    var username = document.querySelector("#username_index");
                    var first_name = document.querySelector("#first_name");
                    var last_name = document.querySelector("#last_name");
                    var html = "";
                    if (!username.checkValidity()) {
                        html += "<pre class='small text-muted font-apple'>Username must contains 3 to 24 english characters or numbers</pre>";
                    }
                    if (!first_name.checkValidity()) {
                        html += "<pre class='small text-muted font-apple'>First name can't be empty</pre>";
                    }
                    if (!last_name.checkValidity()) {
                        html += "<pre class='small text-muted font-apple'>Last name can't be empty</pre>";
                    }
                    $('#accSetting').modal('show');

                    Swal.fire({
                        type: 'error',
                        title: 'Error',
                        html: html,
                        onClose: () => {
                            $('#accSetting').modal('show');
                            $('#username_index').focus();
                        }
                    })
                }
            } else {
                Swal.fire({
                    type: 'error',
                    title: 'Error',
                    text: 'Username already taken!',
                    onClose: () => {
                        $('#accSetting').modal('show');
                        $('#username_index').focus();
                        usernameCheck_index();

                    }
                })
            }
        }
        // User edit function :end
        // password change :start
        $('#changePassword').on('shown.bs.modal', function() {
            $('#accSetting').modal('hide');
        })
        $('#changePassword').on('hidden.bs.modal', function() {
            $('#current_password').val("");
            $('#new_password').val("");
        })

        $('.edit_password_index').on('click', function(e) {
            event.preventDefault();
            swalPasswordChange();
        })

        var isValid_pwd_index = false;

        function formCheckValid_pwd_index() {
            var current_password = document.querySelector("#current_password");
            var new_password = document.querySelector("#new_password");

            isValid_pwd_index = current_password.checkValidity() & new_password.checkValidity();
        }

        function swalPasswordChange() {
            formCheckValid_pwd_index();
            if (isValid_pwd_index) {
                var pwdArr = {
                    password: $('#current_password').val(),
                    new_password: $('#new_password').val(),
                };
                Swal.fire({
                    title: 'Confirm ?',
                    html: "",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#a0a0a0',
                    confirmButtonText: 'Save',
                    cancelButtonText: 'Cancel',
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            type: 'POST',
                            url: '<?= base_url() ?>api/user/password_change',
                            data: pwdArr,
                            beforeSend: function() {
                                $(document.body).css({
                                    'cursor': 'wait'
                                });
                            },
                            success: function(data) {
                                if (data == "false") {
                                    generalToast.fire({
                                        title: 'Error !',
                                        text: 'Password does not match',
                                        type: 'error',
                                    })
                                    $('#changePassword').modal('show');
                                } else {
                                    generalToast.fire({
                                        title: 'Success !',
                                        text: 'Saved changes',
                                        type: 'success',
                                    })
                                    $('#changePassword').modal('hide');
                                }
                                $(document.body).css({
                                    'cursor': 'default'
                                });
                            }
                        })

                    } else {
                        $('#changePassword').modal('show');
                    }
                })
            } else {
                var current_password = document.querySelector("#current_password");
                var new_password = document.querySelector("#new_password");
                var html = "";
                if (!current_password.checkValidity()) {
                    html += "<pre class='small text-muted font-apple'>Current password can't be empty</pre>";
                }
                if (!new_password.checkValidity()) {
                    html += "<pre class='small text-muted font-apple'>New password can't be empty</pre>";
                }
                $('#changePassword').modal('show');

                Swal.fire({
                    type: 'error',
                    title: 'Error',
                    html: html,
                    onClose: () => {
                        $('#changePassword').modal('show');
                    }
                })
            }

        }
        // password change : end


        // on select live search
        $('#livesearch').on('click', ".live_search_result_option", function(e) {
            e.preventDefault();
            $('#input-search').val($(this).html());
            $('#livesearch').hide();
            window.location.href = '<?= base_url() ?>book/' + $(this).data("book_id");
            // $('#search_form').submit();

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
        $('#input-search').on('focusout', function(e) {
            if (!$("#livesearch").hasClass("hovered")) {
                $('#livesearch').hide();
            }
        });

        // in focus
        $('#input-search').focusin(function(e) {
            checkTypingLength($('#input-search').val());
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

            if (!checkTypingLength(typing)) {
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
            }

        });

        // Swal alerts
        <?php
        if ($this->session->userdata('flash_success')) {
        ?>
            const Toast = Swal.mixin({
                toast: true,
                position: 'bottom-end',
                showConfirmButton: false,
                timer: 3000
            });

            Toast.fire({
                title: 'Logged in successfully !',
                type: 'success',
            })
        <?php
        }
        if ($this->session->userdata('register_success')) {
        ?>
            const Toast = Swal.mixin({
                toast: true,
                position: 'bottom-end',
                showConfirmButton: false,
                timer: 3000
            });

            Toast.fire({
                title: 'Registered successfully !',
                type: 'success',
            })
        <?php }
        if ($this->session->userdata('flash_logout')) { ?>
            const Toast = Swal.mixin({
                toast: true,
                position: 'bottom-end',
                showConfirmButton: false,
                timer: 3000
            });

            Toast.fire({
                title: 'Logged out successfully !',
                type: 'success',
            })
        <?php
        }
        if ($this->session->userdata('already_logged_in')) { ?>
            const Toast = Swal.mixin({
                toast: true,
                position: 'bottom-end',
                showConfirmButton: false,
                timer: 3000
            });

            Toast.fire({
                title: 'You\'re already Logged in !',
                type: 'info',
            })

            // HCI EVENT
        <?php }
        if ($this->session->userdata('not_enough_hci')) { ?>
            var data = "" + "<?= $this->session->userdata('not_enough_hci_progress') ?>" + "";
            var width = (data / 10) * 100;
            Swal.fire({
                title: 'ให้คะแนนหนังสือในหมวด HCI ยังไม่ครบ ไม่สามารถทำแบบประเมินได้!',
                html: '<div class="progress w-100"><div class="progress-bar bg-warning progress-bar-striped progress-bar-animated active" style="width:' + width + '%" role="progressbar" aria-valuenow="' + data + '" aria-valuemin="0 " aria-valuemax="10">' + data + '</div></div>',
                type: 'warning',
                showConfirmButton: false,
            })
        <?php } ?>


        function hciprogress(book_id) {
            var post_data = {
                'book_id': book_id,
            };
            $.ajax({
                type: 'post',
                url: "<?php echo base_url(); ?>books/progress_hci",
                data: post_data,
                async: true,
                success: function(data) {
                    if (data != "") {
                        var width = (data / 10) * 100;

                        if (data < 10) {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'bottom-end',
                                showConfirmButton: false,
                                timer: 3000
                            });
                            Toast.fire({
                                title: 'ให้คะแนนหนังสือในหมวด HCI สำเร็จ!',
                                footer: '<div class="progress w-100"><div class="progress-bar bg-success progress-bar-striped progress-bar-animated active" style="width:' + width + '%" role="progressbar" aria-valuenow="' + data + '" aria-valuemin="0 " aria-valuemax="10">' + data + '</div></div>',
                                type: 'success',
                            })
                        } else if (data >= 10) {
                            Swal.fire({
                                title: 'ให้คะแนนหนังสือในหมวด HCI ครบแล้ว!',
                                html: '<div class="progress w-100"><div class="progress-bar bg-success progress-bar-striped progress-bar-animated active" style="width:' + width + '%" role="progressbar" aria-valuenow="' + data + '" aria-valuemin="0 " aria-valuemax="10">' + data + '</div></div>',
                                footer: '<a href="<?= base_url() ?>form" class="text-decoration-none text-center btn btn-primary">ไปที่แบบประเมิน.</a>',
                                type: 'success',
                                showConfirmButton: false,
                            })
                        }

                    }
                }
            })
        }

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
                position: 'bottom-end',
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
                position: 'bottom-end',
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
                position: 'bottom-end',
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
                position: 'bottom-end',
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
                position: 'bottom-end',
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
                position: 'bottom-end',
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
                position: 'bottom-end',
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
                    $('#collection_menu').html("");
                    $(".load_collection_menu").show();
                },
                success: function(data) {
                    $(".load_collection_menu").hide();
                    var hr_html = "<hr class='m-0'>";
                    var create_html = "<div id='create_collection' class='dropdown-item small text-secondary' data-toggle='modal' data-target='#create_collection_modal' data-book_id='" + book_id + "'><i class='fas fa-plus-circle'></i> Create Collection</div>";
                    if (data == "zero") {
                        $('#collection_menu').html("<div class='text-secondary text-center font-arial' title='You have not created any collection'>No collection</div>" + hr_html + create_html);
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

        function activity_view(book_id) {
            var post_data = {
                'book_id': book_id,
            };
            $.ajax({
                type: 'post',
                url: "<?php echo base_url(); ?>api/activity_view/insert",
                data: post_data,
                success: function(data) {},

            });
        }

        function get_search_history() {
            $.ajax({
                type: 'post',
                url: "<?php echo base_url(); ?>api/activity_search/get_recently_for_livesearch",
                success: function(data) {
                    if (data.length > 2) {
                        search_history_html += "<div id='live_search_result_container' class='bg-white position-absolute'><div class='live_search_panel font-arial'> Recent searchs</div>";
                        var response = JSON.parse(data);
                        response.forEach(function(keyword, i) {

                            search_history_html += "<a class='dropdown-item-search' href='<?= base_url() ?>search/result?q=" + keyword["search_keyword"] + "'>" + keyword["search_keyword"] + "</a>";
                            i++;
                        });
                        search_history_html += "</div>";
                    }
                }
            });
        }

        $('.advs_anchor').click(function(e) {
            e.preventDefault();
            let query = $('#input-search').val() ? $('#input-search').val() : "";
            window.location.href = '<?= base_url() ?>search/advanced?q=' + query;
        });
    </script>


    <div id="content">