<?php if ($showheader == true) { ?>
    <div class="container">
        <nav class="nav nav-pills justify-content-end font-arial nav_user">
            <a class="nav-item nav-link <?php if (isset($yourcourse)) echo $yourcourse; ?>" href="<?= base_url() ?>course">Your Course</a>
            <a class="nav-item nav-link <?php if (isset($saveditem)) echo $saveditem; ?>" href="<?= base_url() ?>saved">Saved Item</a>
            <a class="nav-item nav-link <?php if (isset($ratinghistory)) echo $ratinghistory; ?>" href="<?= base_url() ?>ratinghistory">Rating History</a>
        </nav>

        <h1 class="display-4 page_title_header page_title_header_no_after">Saved Item
            <span id="title_collection_name" title="" class="small align-self-center text-secondary"></span>
            <span class="badge badge-secondary count_saved_list"><?= $all_num_rows ?></span>
            <span id="title_collection_edit" class="small align-self-center" data-toggle='modal' data-target='#edit_collection_modal_saved' title='Edit collection name'></span>
        </h1>

        <div class="nav nav-pills font-arial collection_wrapper_mobile" id="collection_wrapper" style="display:none">
            <a class="nav-item nav-link <?php if (isset($all_saved)) echo $all_saved; ?>" href="<?= base_url() ?>saved">All saved</a>
            <?php if (($collection_name != FALSE)) {
                foreach ($collection_name as $cl) { ?>
                    <a class="nav-item nav-link <?= strtolower(ucwords(str_replace(" ", "-", $cl["collection_name"]))) ?>" href="<?= base_url() ?>saved?collection=<?= $cl["collection_name"] ?>"><?= $cl["collection_name"] ?></a>

            <?php }
            } ?>
            <a id='create_collection_saved' class='nav-item nav-link text-secondary position-relative' href data-toggle='modal' data-target='#create_collection_modal_saved'><i class='fas fa-plus-circle'></i> Create Collection</a>
        </div>

        <div class="row mb-5">
            <div class="col-3 mt-3 pr-5 collection_wrapper_desktop" id="collection_col_wrapper">
                <div class="nav nav-pills font-arial flex-column" id="collection_wrapper">
                    <a class="nav-item nav-link <?php if (isset($all_saved)) echo $all_saved; ?> position-relative" href="<?= base_url() ?>saved"><span>All saved</span>
                        <span class="count_all_saved_list badge  <?php if (isset($all_saved)) echo "badge-light";
                                                                    else echo "badge-secondary"; ?>" style="font-size:1em;position: absolute;right: 0.5rem;top: 0.5rem;"><?= $this->session->userdata('count_all_saved_list') ?>
                        </span>
                    </a>
                    <?php if (($collection_name != FALSE)) { ?>
                        <hr class="w-100 my-2">
                        <?php foreach ($collection_name as $cl) { ?>
                            <a class="nav-item nav-link <?= strtolower(ucwords(str_replace(" ", "-", $cl["collection_name"]))) ?> position-relative" href="<?= base_url() ?>saved?collection=<?= $cl["collection_name"] ?>" id="nav_<?= $cl["collection_name"] ?>"><span><?= $cl["collection_name"] ?></span><span class="badge badge-secondary" style="font-size:1em;position: absolute;right: 0.5rem;top: 0.5rem;" id="<?= $cl["collection_name"] ?>"><?= $cl["count_this_collection"] ?></span></a>

                    <?php }
                    } ?>
                    <a id='create_collection_saved' class='btn btn-outline-secondary nav-item nav-link position-relative mt-3' href data-toggle='modal' data-target='#create_collection_modal_saved'><i class='fas fa-plus-circle'></i> Create Collection</a>
                </div>
            </div>
            <div id="saved_list" class="col-9">

            <?php } ?>


            <?php if (($saved_list != FALSE)) {
                foreach ($saved_list as $saved) { ?>
                    <div class="row bg-light py-3 book_detail_content_saved mt-3" style="border-radius:1rem;border:1px solid #0000000d" data-aos="fade-up">
                        <div class="col-sm pl-4 mx-auto" style="max-width:11rem;">
                            <a href="<?= base_url() ?>book/<?= $saved['book_id'] ?>">
                                <img id="" style="width:100%;box-shadow: 0 2.5px 5px rgba(0, 0, 0, 0.25);" src="<?= base_url() ?>assets/book_covers/<?= $saved['book_id'] ?>.PNG" alt="">
                            </a>
                        </div>
                        <!-- RATE section -->
                        <div class="col-sm">
                            <div>
                                <?php if ($saved['count_rate'] != 0) { ?>
                                    <span class="badge badge-warning" style="font-size: 1rem;"><span class="font-arial">
                                            <span style="letter-spacing: 1px;" class="font-weight-bold" id="rate_avg">
                                                <?= number_format($saved['b_rate'], 1); ?>
                                            </span>
                                            <span class="small" style="color: #6b6b6b;">/5</span></span>
                                    </span>
                                    <span class="small text-secondary">based on <?= $saved['count_rate'] ?> user<?php if ($saved['count_rate'] != 1) echo "s";  ?> </span>

                                <?php } else { ?>
                                    <span class="badge badge-secondary" style="font-size: 1rem;" id="span_rating"><span class="font-arial">
                                            <span style="letter-spacing: 1px;" class="font-weight-bold" id="rate_avg">
                                                0
                                            </span>
                                            <span class="small">/5</span></span>
                                    </span>
                                    <span class="small text-secondary" id="span_rating_text">No ratings</span>
                                <?php } ?>
                                <a class="float-right link move_to_another_collection" title="Move item to another collection" data-book_id="<?= $saved['book_id'] ?>" href><i class="fas fa-ellipsis-h"></i></a>
                            </div>
                            <!-- BOOK detail section -->
                            <div class="my-2 font-arial font-weight-bolder book_detail_content_saved_name"> <a href="<?= base_url() ?>book/<?= $saved['book_id'] ?>" class="link"><?= $saved['book_name'] ?></a></div>
                            <div class="book_detail_text pt-1">Category : <a class="book_detail_text link" href="<?= base_url() ?>browse/<?= strtolower(ucwords(str_replace(" ", "-", $saved["book_type"]))) ?>"><span><?= $saved['book_type'] ?></span></a></div>
                            <div class="book_detail_text pt-1 mb-3">Author : <a class="link" href="<?= base_url() ?>search/result?q=&author=<?= $saved['author'] ?>"><?= $saved['author'] ?></a></div>
                            <span class="removed_item text_gradient_theme position-absolute text-primary" style="top:9.5rem;left:16rem;"></span>
                            <?php if ($saved['collection_name'] != 'none') { ?>
                                <span class="small font-arial text-secondary">Saved to </span><a href="<?= base_url() ?>saved?collection=<?= $saved['collection_name'] ?>" class="font-arial" style="background:#cde8ff;padding:0.25rem"><?= $saved['collection_name'] ?></a>
                            <?php } ?>
                            <!-- bookmark trigger -->
                            <div class="pr-4 w-100">
                                <hr>
                                <button class="btn btn-primary bookmark_trigger<?= $round_count ?>" data-book_id="<?= $saved['book_id'] ?>">
                                    <i class="fas fa-bookmark bookmark_icon"></i>
                                    <span class="bookmark_trigger_text font-arial"> unsave book</span>
                                </button>

                                <span class="text-secondary small pt-3 time_moment" data-time-format="time-ago" data-time-value="<?= $saved['date'] ?>" title="<?= $saved['date'] ?>" style="float:right;cursor:default;"><?= $saved['date'] ?></span>
                            </div>
                        </div>
                    </div>
                <?php $i++;
                }
                if ($num_rows == 5 &&  $this->session->userdata('count_all_saved_list') != $i) { ?>
                    <div class="load-more text-center justify-content-center my-5" lastID="<?php echo $i; ?>" style="display: none;">
                        <!-- <img src="<?php echo base_url('assets/img/loading.gif'); ?>" /> -->

                        <div class="spinner-border text-primary mr-3" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        Loading...
                    </div>
                <?php } else { ?>
                    <div class="load-more pt-5" lastID="0">
                    </div>
                <?php } ?>

            <?php } else if ($all_num_rows == 0) { ?>

                <div class="load-more pt-5 zero_saved" lastID="0">
                    <h1 class="font-weight-lighter text-center font-arial">You haven't saved <i class="far fa-bookmark"></i> any item</h1>
                    <div class="text-muted text-center">Save a book to get started!</div>
                    <div class="position:relative text-center empty_saved_book_img">
                        <img src="<?= base_url() ?>assets/img/fogg-list-is-empty.png" style="max-width:50rem" alt="">
                    </div>
                </div>

            <?php } else if ($num_rows == 0) { ?>
                <div class="load-more pt-5" lastID="0">

                </div>
            <?php } ?>

            <?php if ($showheader == true) { ?>
            </div>
        </div>
    </div>
    <!-- create collection modal -->
    <div class="modal fade slide-bottom" id="create_collection_modal_saved" tabindex="-1" role="dialog" aria-labelledby="create_collection_modal_saved" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg_linear_theme">
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
                        <input type="text" id="collection_name_input_saved" autofocus class="form-control" placeholder="Give your collection a name...">
                        <span class="text-danger small position-absolute collection_name_input_pattern" style="display:none;top: 2.75rem;left: 10rem;">Thai or English 1 - 60 characters (no space)</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" style="display:none;" class="btn btn-primary create_collection_submit_saved">Create</button>
                </div>
            </div>
        </div>
    </div>

    <!-- edit collection modal -->
    <div class="modal fade slide-bottom" id="edit_collection_modal_saved" tabindex="-1" role="dialog" aria-labelledby="edit_collection_modal_saved" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg_linear_theme">
                    <h5 class="modal-title">Edit Collection</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Collection name</span>
                        </div>
                        <input type="text" id="edit_collection_name_input_saved" autofocus class="form-control" placeholder="Give your collection a name...">
                        <span class="text-danger small position-absolute collection_name_input_pattern" style="display:none;top: 2.75rem;left: 10rem;">Thai or English 1 - 60 characters (no space)</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="mr-auto text-primary" href id="delete_collection_submit_modal">Delete collection</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary edit_collection_submit_saved">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // on modal close
        $('#create_collection_modal_saved').on('hidden.bs.modal', function() {
            $('#collection_name_input_saved').val("");
            $('.create_collection_submit_saved').hide();
            $('.collection_name_input_pattern').hide();
        })

        // on modal close
        $('#edit_collection_modal_saved').on('hidden.bs.modal', function() {
            $('#edit_collection_name_input_saved').val("");
            $('.edit_collection_submit_saved').hide();
            $('.collection_name_input_pattern').hide();
        })
        // on typing
        $('#collection_name_input_saved').keyup(function(e) {
            var typing = $('#collection_name_input_saved').val();
            checkTypingLength_collection_name_saved(typing);
        });

        // on submit
        $('.create_collection_submit_saved').on('click', function(e) {
            var collection_name = $('#collection_name_input_saved').val();
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
                    $(document.body).css({
                        'cursor': 'default'
                    });

                    if (data == "duplicate") {
                        toastCreateCollection_duplicate(collection_name);
                    } else {
                        toastCreateCollection(collection_name);
                        appendCollectionName(collection_name);
                    }
                    $('#create_collection_modal_saved').modal('hide');

                },
            })
        });

        function appendCollectionName(collection_name) {
            if (isMobile_index) {
                var string_html = '<a class="nav-item nav-link" href="<?= base_url() ?>saved?collection=' + collection_name + '">' + collection_name + ' <span class="badge badge-secondary float-right" style="font-size:1em" id="' + collection_name + '">0</span></a>';
                $("#collection_wrapper .nav-item:last").before(string_html);

            } else {
                var string_html = '<a class="nav-item nav-link position-relative" href="<?= base_url() ?>saved?collection=' + collection_name + '"><span>' + collection_name + '</span><span class="badge badge-secondary" style="font-size:1em;position: absolute;right: 0.5rem;top: 0.5rem;" id="' + collection_name + '">0</span></a>';
            }
            $("#collection_col_wrapper .nav-item:last").before(string_html);


        }

        function checkTypingLength_collection_name_saved(typing) {
            if (typing.length == 0) {
                $('.collection_name_input_pattern').hide();
                $('.create_collection_submit_saved').hide();
                $('.edit_collection_submit_saved').hide();
                return;
            } else if (typing.length > 60) {
                $('.edit_collection_submit_saved').hide();
                $('.collection_name_input_pattern').show();

            } else {
                var re = /^[a-zA-Z0-9_ก-๏.-]+$/;
                if (re.test(typing)) {
                    $('.edit_collection_submit_saved').show();
                    $('.collection_name_input_pattern').hide();
                    $('.create_collection_submit_saved').show();
                } else {
                    $('.collection_name_input_pattern').show();
                }
                return;
            }
        }
        var interval = setInterval(function() {
            $("[data-time-format]").each(function() {
                var el = $(this);
                switch (el.attr("data-time-format")) {
                    case "time-ago":
                        var timeValue = el.attr("data-time-value")
                        var strTimeAgo = moment(timeValue).fromNow();
                        el.text("saved " + strTimeAgo);
                        console.log("time updated")
                        break;
                }
            });
        }, 60000);

        $('#edit_collection_modal_saved').on('shown.bs.modal', function() {
            $(this).find('[autofocus]').focus();
            var url_string = window.location.href;
            var url = new URL(url_string);
            var collection_name_param = url.searchParams.get("collection") ? url.searchParams.get("collection") : " ";
            $('#edit_collection_name_input_saved').val(collection_name_param);
        });

        // edit on typing
        $('#edit_collection_name_input_saved').keyup(function(e) {
            var typing = $('#edit_collection_name_input_saved').val();
            checkTypingLength_collection_name_saved(typing);
        });

        // on submit
        $('.edit_collection_submit_saved').on('click', function(e) {
            var url_string = window.location.href;
            var url = new URL(url_string);
            var old_collection_name = url.searchParams.get("collection");

            var collection_name = $('#edit_collection_name_input_saved').val();
            var post_data_edit = {
                'collection_name': collection_name,
                'old_collection_name': old_collection_name,
            };
            // edit collection
            $.ajax({
                type: 'post',
                url: "<?php echo base_url(); ?>books/edit_collection_name",
                data: post_data_edit,
                async: true,
                beforeSend: function() {
                    $(document.body).css({
                        'cursor': 'wait'
                    });
                },
                success: function(data) {
                    $(document.body).css({
                        'cursor': 'default'
                    });
                    if (data == "duplicate") {
                        toastCreateCollection_duplicate(collection_name);
                    } else {
                        toastEditCollection(collection_name);
                        var interval = setInterval(function() {
                            window.location.href = "<?= base_url() ?>saved?collection=" + collection_name;
                            clearInterval(interval);
                        }, 3000);
                    }
                    $('#edit_collection_modal_saved').modal('hide');
                },
            })
        });

        $('#delete_collection_submit_modal').on('click', function(e) {
            e.preventDefault();
            var url_string = window.location.href;
            var url = new URL(url_string);
            var collection_name = url.searchParams.get("collection");

            swalAlertConfirmDelete(collection_name);

        });

        function swalAlertConfirmDelete(collection_name) {
            $('#edit_collection_modal_saved').modal('hide');
            Swal.fire({
                title: 'Delete collection : ' + collection_name + '?',
                type: 'warning',
                html: "<span class='text-muted font-arial'>All items in collection will be unsaved</span>",
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.value) {
                    var post_data_delete = {
                        'collection_name': collection_name,
                    };
                    // delete collection
                    $.ajax({
                        type: 'post',
                        url: "<?php echo base_url(); ?>books/delete_collection",
                        data: post_data_delete,
                        async: true,
                        beforeSend: function() {
                            $(document.body).css({
                                'cursor': 'wait'
                            });
                        },
                        success: function(data) {
                            $(document.body).css({
                                'cursor': 'default'
                            });
                            toastDeleteCollection(collection_name);
                            var interval = setInterval(function() {
                                window.location.href = "<?= base_url() ?>saved";
                                clearInterval(interval);
                            }, 1000);

                            // calculate count to saved_count_all
                            var current_count = Number($('.count_all_saved_list').html());
                            var to_be_removed = Number($('#' + collection_name).html());
                            $('.count_all_saved_list').html(current_count - to_be_removed);

                            //remove collection element
                            $('#nav_' + collection_name).remove();
                            $('#title_collection_name').remove();
                        },
                    })
                } else {
                    $('#edit_collection_modal_saved').modal('show');
                }
            })
        }
        $(document).on('click', '#saved_list .book_detail_content_saved .move_to_another_collection', function(e) {
            e.preventDefault();
            var rect = $(this).offset();
            var book_id = $(this).data("book_id");
            appearCollection_move(book_id, rect);
        });

        function appearCollection_move(book_id, rect) {
            // var x414 = window.matchMedia("(max-width: 414px)");
            $('#save_collection_menu').css({
                "top": (rect.top - 80),
                "left": (rect.left - 150),
            });

            var formData = {
                'book_id': book_id,
            };
            $.ajax({
                type: 'post',
                url: "<?php echo base_url(); ?>books/get_collection_by_username",
                async: true,
                data: formData,
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
                    $('#save_collection_menu').show();
                }
            })
        }
        $(document).on('click', '.collection_remove_to_default', function(e) {
            var collection_name = $(this).data("cn");
            var book_id = $('#create_collection').data("book_id");
            var formData = {
                'book_id': book_id,
            };
            $.ajax({
                type: 'post',
                url: "<?php echo base_url(); ?>books/remove_from_collection",
                async: true,
                data: formData,
                beforeSend: function() {
                    $('#save_collection_menu').hide();
                    $(document.body).css({
                        'cursor': 'wait'
                    });
                },
                success: function(data) {
                    $(document.body).css({
                        'cursor': 'default'
                    });
                    toastRemoveFromCollection(collection_name);
                }
            })
        });
        $(document).on('mouseover', '#saved_list .book_detail_content_saved .move_to_another_collection', function(e) {
            $(this).addClass("hovered");

        });
        $(document).on('mouseout', '#saved_list .book_detail_content_saved .move_to_another_collection', function(e) {
            $(this).removeClass("hovered");
        });
    </script>
<?php } ?>

<script type="text/javascript">
    $(document).ready(function() {
        var bookmark_trigger_count = 0;
        // moment.locale('th');
        // time formatter
        $("[data-time-format]").each(function() {
            var el = $(this);
            switch (el.attr("data-time-format")) {
                case "time-ago":
                    var timeValue = el.attr("data-time-value")
                    var strTimeAgo = moment(timeValue).fromNow();
                    el.text("saved " + strTimeAgo);
                    break;
            }
        });

        // bookmarker
        $('.bookmark_trigger<?= $round_count ?>').on("click", bookmark_triggered);

        function bookmark_triggered() {
            var this_elm = $(this);
            var book_id = ($(this).data('book_id'));
            var bookmark_data = {
                'book_id': book_id,
            };
            var parent = this_elm.parents('.book_detail_content_saved ');
            var count_all_saved_list = $('.count_all_saved_list').html();
            var count_saved_list = $('.count_saved_list').html();

            $.ajax({
                type: 'post',
                url: "<?php echo base_url(); ?>books/update_bookmark",
                data: bookmark_data,
                async: true,
                beforeSend: function() {
                    $(this_elm).off('click');
                    $(this_elm).addClass("style_disabled");
                },
                success: function(data) {
                    $(this_elm).on('click', bookmark_triggered);
                    $(this_elm).removeClass("style_disabled");

                    if (data == "inserted") {
                        toastBookmarkSaved(book_id);

                        parent.removeClass("opacity");
                        parent.find('.removed_item').html("");
                        bookmark_trigger_count--;


                        this_elm.find('i').removeClass("far");
                        this_elm.find('i').addClass("fas");
                        this_elm.find('span').html(" unsave book");
                        count_saved_list++;
                        count_all_saved_list++;
                        $('.count_saved_list').html(count_saved_list);
                        $('.count_all_saved_list').html(count_all_saved_list);

                        // count left side change
                        var url_string = window.location.href;
                        var url = new URL(url_string);
                        var collection_name_param = url.searchParams.get("collection") ? url.searchParams.get("collection") : " ";
                        if (collection_name_param != " ")
                            $('#' + collection_name_param).html(Number($('#' + collection_name_param).html()) + 1);

                    } else if (data == "removed") {
                        toastBookmarkUnsaved();

                        parent.addClass("opacity");
                        parent.find('.removed_item').html("Removed from saved list");
                        bookmark_trigger_count++;

                        this_elm.find('i').removeClass("fas");
                        this_elm.find('i').addClass("far");
                        this_elm.find('span').html(" save book");
                        count_saved_list--;
                        count_all_saved_list--;

                        $('.count_saved_list').html(count_saved_list);
                        $('.count_all_saved_list').html(count_all_saved_list);

                        // count left side change
                        var url_string = window.location.href;
                        var url = new URL(url_string);
                        var collection_name_param = url.searchParams.get("collection") ? url.searchParams.get("collection") : " ";
                        if (collection_name_param != " ")
                            $('#' + collection_name_param).html(Number($('#' + collection_name_param).html()) - 1);

                    }
                }
            })
        }

        var num_rows = <?= $num_rows ?>;
        var call = 0

        $(window).scroll(function() {
            var lastID = $('.load-more').attr('lastID');
            var height = $(document).height() - $(window).height();
            var scroll_value = (numeral($(window).scrollTop()).value() + 250);
            // console.log(num_rows + " " + lastID + " " + call);
            // console.log(scroll_value + " >= " + height + " AND lastID : " + lastID + " num_rows : " + num_rows + " call : " + call);

            if ((scroll_value >= height) && (lastID != 0) && num_rows == 5 && call == 0) {
                // console.log("true");
                call = 1;
                <?php
                if (isset($collection_get)) { ?>
                    var post_data = {
                        'start': lastID,
                        'i': <?= $i ?>,
                        'round_count': <?= $round_count ?>,
                        'bookmark_trigger_count': bookmark_trigger_count,
                        'collection_get': "<?= $collection_get ?>",
                    };

                <?php } else { ?>
                    var post_data = {
                        'start': lastID,
                        'i': <?= $i ?>,
                        'round_count': <?= $round_count ?>,
                        'bookmark_trigger_count': bookmark_trigger_count,
                    };
                <?php } ?>




                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('books/loadMoreData'); ?>',
                    data: post_data,
                    async: true,
                    beforeSend: function() {
                        $('.load-more').show();
                    },
                    success: function(html) {
                        setTimeout(() => {
                            $('.load-more').remove();
                            $('#saved_list').append(html);

                        }, 500);

                    }
                });
            }
        });
        //active nav save collection name
        var url_string = window.location.href;
        var url = new URL(url_string);
        var collection_name_param = url.searchParams.get("collection") ? url.searchParams.get("collection") : " ";
        var regex = new RegExp(" ", "g");
        var collection_name_param2 = collection_name_param.replace(regex, "-")
        if (collection_name_param2 != "-") {
            $('.' + collection_name_param2.toLowerCase()).addClass("active shadow");
            $('#title_collection_name').html("<i class='fas fa-angle-double-right small'></i> " + collection_name_param);
            $('#title_collection_name').prop('title', collection_name_param);
            $('#title_collection_edit').html("<i class='fas fa-ellipsis-h'></i>");
            $('#edit_collection_name_input_saved').val(collection_name_param);
            $('#' + collection_name_param2).removeClass("badge-secondary");
            $('#' + collection_name_param2).addClass("badge-light");
        }


    });
</script>