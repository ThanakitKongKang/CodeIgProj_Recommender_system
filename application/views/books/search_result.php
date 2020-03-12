<div class="container">
    <div class="container">
        <div id="app_mid_title_search_result">
            <template>
                <div class="position-relative row">
                    <img :src="img_url" alt="">
                    <h1 id="mid-title" class="display-4 font-arial pt-5 text-uppercase" style="left:4rem;">{{title}}</h1>
                </div>
            </template>
        </div>

        <div class="text-muted">
            <hr>
            <div class="row">
                <!-- Search result total -->
                <div class="col-sm-4 pt-2 the_border_right">
                    <div class="query_text">
                        <?= $total_rows ?> item<?php if ($total_rows > 1) echo "s"; ?> found <?php if (isset($query) && $query != "") { ?>for "<?= $query ?>"<?php } ?>
                    </div>
                </div>


                <div class="col-sm-6 the_border_right">
                    <!-- Filter 1 -->
                    <div class="btn-group pr-2">
                        <button type="button" style="width:10rem" class="btn btn-outline-secondary dropdown-toggle small no_overflow" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="category_text">
                            Category
                        </button>
                        <div class="dropdown-menu" style="max-height:25rem;overflow-y:auto;">
                            <a class="dropdown-item search_option_category" href="#" id="category_all" data-search="all">All</a>

                            <?php
                            foreach ($category_list as $category) {
                            ?>
                                <a class="dropdown-item search_option_category" href="#" id="<?= ucwords(str_replace(" ", "-", $category['book_type'])) ?>" data-search="<?= $category["book_type"] ?>"><?= $category["book_type"] ?></a>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <!-- Filter 2 -->
                    <?php if (!empty($author_list)) { ?>
                        <div class="btn-group pr-2">
                            <button type="button" style="width:10rem" class="btn btn-outline-secondary dropdown-toggle small no_overflow" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="filter_author_text">
                                Author
                            </button>
                            <div class="dropdown-menu" style="max-height:25rem;overflow-y:auto;">
                                <a class="dropdown-item search_option_author" href="#" id="author_all" data-search="all">All</a>
                                <?php
                                foreach ($author_list as $author) {
                                ?>
                                    <a class="dropdown-item search_option_author" href="#" id="<?= ucwords(str_replace(" ", "-", $author->author)) ?>" data-search="<?= $author->author ?>"><?= $author->author ?></a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- Filter clear -->
                    <div class="btn-group pr-2 float-right">
                        <button type="button" class="btn btn-outline-secondary" id="filter_clear" style="display:none">
                            <i class="fas fa-times"></i> <span>Clear</span>
                        </button>
                    </div>
                </div>

                <!-- Sort rate -->
                <div class="text-right col-sm-2 search_sort">

                    <div class="btn-group">
                        <button type="button" style="width:10rem" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="filter_sort">
                            <span id="sort_rating_text" class="small">Sort by rating</span>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item search_option_sort" href="#" id="sort_relevant" data-search="">Most Relevant</a>
                            <a class="dropdown-item search_option_sort" href="#" id="sort_rate_desc" data-search="rate_desc">Rate high to low</a>
                            <a class="dropdown-item search_option_sort" href="#" id="sort_rate_asc" data-search="rate_asc">Rate low to high</a>
                            <a class="dropdown-item search_option_sort" href="#" id="sort_title_asc" data-search="title_asc">Book Title A-Z</a>
                            <a class="dropdown-item search_option_sort" href="#" id="sort_title_desc" data-search="title_desc">Book Title Z-A</a>

                        </div>
                    </div>

                </div>


            </div>
            <hr>
        </div>
        <!-- Search Result -->
        <?php if (!empty($books)) { ?>
            <div class="row no-gutters">
                <?php foreach ($books as $book) : ?>

                    <div class="col-sm-4 align-self-center content_browse_row" style="max-width: 30.333333%;">
                        <div class="py-3">
                            <div class="card card_hover_img">
                                <a href="<?= base_url() ?>book/<?= $book->book_id ?>" title="<?= $book->book_name ?>">
                                    <img class="card_img" src="<?= base_url() ?>assets/book_covers/<?= $book->book_id ?>.PNG" alt=""></a>
                                <div class="overlay_card"><a href="<?= base_url() ?>book/<?= $book->book_id ?>" class="stretched-link"></a></div>
                                <div class="card-body pb-0 pt-2" style="height:8rem;">
                                    <a class="card_body_type ctg card_body_type_search_result" href="<?= base_url() ?>browse/<?= strtolower(ucwords(str_replace(" ", "-", $book->book_type))) ?>"><span><?= $book->book_type ?></span></a>
                                    <?php if ($this->session->userdata('logged_in')) { ?>
                                        <a class="ellipsis_menu ellipsis_menu_trigger" data-book_id="<?= $book->book_id ?>" data-book_name="<?= $book->book_name ?>"><i class="fas fa-chevron-down fa-xs"></i></a>
                                    <?php } ?>
                                    <div class="card-title text-col-2-name search_result_name pt-1"><a href="<?= base_url() ?>book/<?= $book->book_id ?>" title="<?= $book->book_name ?>"><?= $book->book_name ?></a></div>
                                    <div class="rater_star_grid rater_search_result">
                                        <input value="<?= $book->b_rate ?>" class="rater_star" title="">
                                    </div>
                                    <?php if ($book->count_rate != 0) { ?>
                                        <span class="position-absolute small font-arial text-info user_rated_this" style="bottom:1.1rem;left:8.5rem;width:2rem;">(<?= $book->count_rate ?> <i class="fas fa-user fa-xs"></i>)</span>
                                    <?php } ?>
                                    <div class="text-card-author text-card-author_search_result font-italic text-secondary" title="<?= $book->author ?>"><?= $book->author ?></div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
            <hr class="w-100">
            <p id="pagination" class="pagination d-flex justify-content-end"><?php echo $links; ?></p>
        <?php } else { ?>
            <div class="position:relative text-center">
                <?php $rand = rand(1, 2);
                if ($rand == 1) { ?>
                    <img src="<?= base_url() ?>assets/img/fogg-page-not-found-1.png" style="max-width:65rem" alt="">
                <?php } else if ($rand == 2) { ?>
                    <img src="<?= base_url() ?>assets/img/fogg-page-not-found.png" style="max-width:65rem" alt="">
                <?php } ?>
            </div>
        <?php } ?>


    </div>

</div>

<!-- Modal -->
<div class="modal fade slide-bottom" id="rate_modal" tabindex="-1" role="dialog" aria-labelledby="rate_modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg_linear_theme">
                <h5 class="modal-title" id="modal_label"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="margin-left:8rem;">
                <input value="0" class="rater_star_modal" title="" data-show-clear="false">
                <input value="0" id="modal_book_id" title="" type="hidden">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" style="display:none;" data-book_id="0" class="btn btn-primary rate_trigger">Submit</button>
            </div>
        </div>
    </div>
</div>

<div id="popup_menu" class="position-absolute bg-white slide-bottom" style="display:none">
    <div class="load_popup_menu text-center justify-content-center my-5" style="display: none;">
        <div class="spinner-border text-primary mr-3" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        Loading...
    </div>
    <div id="popup_menu_content">
        <div id="popup_menu_bookmark">
        </div>
        <div id="popup_menu_rate">
        </div>
    </div>
</div>

<script type="text/javascript">
    $('html').click(function() {
        if (!$(".ellipsis_menu").hasClass("hovered")) {
            if (!$("#popup_menu").hasClass("hovered")) {
                $('#popup_menu').hide();
            }
        }
    });
    $('.rater_star').rating({
        'showCaption': false,
        'stars': '5',
        'min': '0',
        'max': '5',
        'step': '0.5',
        'size': 'xs',
        displayOnly: true,

    });
    $(document).ready(function() {
        var url_string = window.location.href;
        var url = new URL(url_string);

        // category active
        var category = url.searchParams.get("category") ? url.searchParams.get("category") : " ";
        var regex = new RegExp(" ", "g");
        var category2 = category.replace(regex, "-")
        if (category2 != "-" && category2 != "all") {
            $('#' + category2).addClass("active");
            $('#category_text').html($('#' + category2).html());
            $('#category_text').removeClass("btn-outline-secondary");
            $('#category_text').addClass("bg_linear_theme");
        }

        // author active
        var author = url.searchParams.get("author") ? url.searchParams.get("author") : " ";
        var author2 = author.split('.').join('\\.'); // remove dots
        var regex = new RegExp(" ", "g");
        author2 = author2.replace(regex, "-")
        $('#' + author2).addClass("active");
        if (author2 != "-" && author2 != "all") {
            $('#filter_author_text').html(author);
            $('#filter_author_text').removeClass("btn-outline-secondary");
            $('#filter_author_text').addClass("bg_linear_theme");
        }

        //sort_rate active
        var sort_rate = url.searchParams.get("sort") ? url.searchParams.get("sort") : " ";
        if (sort_rate != " ") {
            $('#sort_' + sort_rate).addClass("active");
            $('#sort_rating_text').html($('#sort_' + sort_rate).html());
            $('#filter_sort').removeClass("btn-outline-secondary");
            $('#filter_sort').addClass("bg_linear_theme");
        }

        // show clear button
        if (category != "all" && category != " ") {
            $('#filter_clear').show();
        } else if (author != "all" && author != " ") {
            $('#filter_clear').show();
        }

        if (sort_rate != " ") {
            $('#filter_clear').show();
        }

        $('#filter_clear').click(function(e) {
            e.preventDefault();
            var q = url.searchParams.get("q");
            window.location = "<?= base_url() ?>search/result?q=" + q;
        })

        // rate sort
        $('.search_option_sort').click(function(e) {
            e.preventDefault();
            var search_option = "&sort=" + $(this).data('search');
            var q = url.searchParams.get("q");
            var rating = url.searchParams.get("rating") ? "&rating=" + url.searchParams.get("rating") : "";
            var oth_rated = url.searchParams.get("notrated") ? "&notrated=" + url.searchParams.get("notrated") : "";
            var oth_saved = url.searchParams.get("notsaved") ? "&notsaved=" + url.searchParams.get("notsaved") : "";


            // current search options
            var category = url.searchParams.get("category") ? "&category=" + url.searchParams.get("category") : "";
            var author = url.searchParams.get("author") ? "&author=" + url.searchParams.get("author") : "";

            window.location = "<?= base_url() ?>search/result?q=" + q + search_option + category + author + rating + oth_rated + oth_saved;
        })

        // filter category
        $('.search_option_category').click(function(e) {
            e.preventDefault();
            var search_option = "&category=" + $(this).data('search');
            var q = url.searchParams.get("q");
            var rating = url.searchParams.get("rating") ? "&rating=" + url.searchParams.get("rating") : "";
            var oth_rated = url.searchParams.get("notrated") ? "&notrated=" + url.searchParams.get("notrated") : "";
            var oth_saved = url.searchParams.get("notsaved") ? "&notsaved=" + url.searchParams.get("notsaved") : "";

            // current search options
            var sort = url.searchParams.get("sort") ? "&sort=" + url.searchParams.get("sort") : "";
            var author = url.searchParams.get("author") ? "&author=" + url.searchParams.get("author") : "";

            window.location = "<?= base_url() ?>search/result?q=" + q + sort + search_option + author + rating + oth_rated + oth_saved;
        })

        // filter author
        $('.search_option_author').click(function(e) {
            e.preventDefault();
            var search_option = "&author=" + $(this).data('search');
            var q = url.searchParams.get("q");
            var rating = url.searchParams.get("rating") ? "&rating=" + url.searchParams.get("rating") : "";
            var oth_rated = url.searchParams.get("notrated") ? "&notrated=" + url.searchParams.get("notrated") : "";
            var oth_saved = url.searchParams.get("notsaved") ? "&notsaved=" + url.searchParams.get("notsaved") : "";

            // current search options
            var sort_rate = url.searchParams.get("sort_rate") ? "&sort_rate=" + url.searchParams.get("sort_rate") : "";
            var category = url.searchParams.get("category") ? "&category=" + url.searchParams.get("category") : "";

            window.location = "<?= base_url() ?>search/result?q=" + q + sort_rate + category + search_option + rating + oth_rated + oth_saved;
        })

        /*
    | -------------------------------------------------------------------------
    | start popup_menu function
    | -------------------------------------------------------------------------
    */
        var global_book_id = 0;
        $(document).on('click', '.ellipsis_menu_trigger', function(e) {
            var book_id = ($(this).data('book_id'));
            var book_name = ($(this).data('book_name'));
            var rect = $(this).offset();
            clickedPopupTrigger(book_id, rect, book_name)
        });

        // hover ellipsis_menu
        $(".ellipsis_menu").hover(function() {
            $(this).addClass("hovered");
        }, function() {
            $(this).removeClass("hovered");
        });

        // hover ellipsis_menu
        $("#popup_menu").hover(function() {
            $(this).addClass("hovered");
        }, function() {
            $(this).removeClass("hovered");
        });


        function clickedPopupTrigger(book_id, rect, book_name) {
            $('#popup_menu').css({
                "top": (rect.top - 155),
                "left": (rect.left - 230),
            });

            if ($('#popup_menu').css('display') == 'none') {
                showPopupMenu(book_id, book_name);
            } else {
                if (global_book_id != book_id) {
                    $('#popup_menu').hide();
                    var interval = setInterval(function() {
                        showPopupMenu(book_id, book_name);
                        clearInterval(interval);
                    }, 50);

                } else {
                    $('#popup_menu').toggle();
                }
            }
            global_book_id = book_id;
        }

        function showPopupMenu(book_id, book_name) {
            var post_data = {
                'book_id': book_id,
            };

            $.ajax({
                type: 'post',
                url: "<?php echo base_url(); ?>books/isBookmarked",
                async: true,
                data: post_data,
                beforeSend: function() {
                    $('.load_popup_menu').show();
                    $('#popup_menu_content').hide();

                },
                success: function(data_isBookmarked) {
                    $.ajax({
                        type: 'post',
                        url: "<?php echo base_url(); ?>books/getBookRateByUser",
                        async: true,
                        data: post_data,
                        success: function(data_getBookRateByUser) {
                            $('.load_popup_menu').hide();
                            $('#popup_menu_content').show();
                            if (data_isBookmarked) {
                                $('#popup_menu_bookmark').html('<a class="dropdown-item bookmark_trigger popup_menu_item" data-book_id="' + book_id + '"><div class="row"><div class="col-1" style="padding-left:1.1rem;"><i class="fas fa-bookmark popup_menu_icon text-primary" id="bookmark_icon"></i></div><div class="col" style="padding-left: 0.8rem;"><div class="save_text">unsave book</div><div class="save_text_muted">ลบออกจากรายการที่บันทึกไว้ของคุณ</div></div></div></a>');
                            } else {
                                $('#popup_menu_bookmark').html('<a class="dropdown-item bookmark_trigger popup_menu_item" data-book_id="' + book_id + '"><div class="row"><div class="col-1" style="padding-left:1.1rem;"><i class="far fa-bookmark popup_menu_icon" id="bookmark_icon"></i></div><div class="col" style="padding-left: 0.8rem;"><div class="save_text">save book</div><div class="save_text_muted">เพิ่มลงในรายการที่บันทึกไว้ของคุณ</div></div></div></a>');
                            }
                            if (data_getBookRateByUser != false) {
                                $('.rater_star_modal').rating('update', data_getBookRateByUser);
                                $('#popup_menu_rate').html('<a class="dropdown-item rate_modal_trigger popup_menu_item" data-toggle="modal" data-target="#rate_modal"><div class="row"><div class="col-1"><i class="fas fa-star popup_menu_icon text-warning"></i></div><div class="col"><div class="rate_text">update rate</div><div class="rate_text_muted">เปลี่ยนคะแนนที่คุณให้</div></div></div></a>');

                            } else {
                                $('.rater_star_modal').rating('update', 0);
                                $('.rate_trigger').hide();
                                $('#popup_menu_rate').html('<a class="dropdown-item rate_modal_trigger popup_menu_item" data-toggle="modal" data-target="#rate_modal"><div class="row"><div class="col-1"><i class="far fa-star popup_menu_icon"></i></div><div class="col"><div class="rate_text">rate this</div><div class="rate_text_muted">ให้คะแนนสิ่งนี้</div></div></div></a>');

                            }
                            modal_book_id
                            $('#modal_book_id').val(book_id);
                            // $('.rate_trigger').attr("data-book_id", "");
                            // $('.rate_trigger').attr("data-book_id", book_id);

                            $('#modal_label').html('Rate <span class="text-warning">' + book_name + '</span>');

                        }
                    })
                }
            })
            $('#popup_menu').show();
        }
        $('#rate_modal').on('hidden.bs.modal', function() {
            $('#popup_menu').hide();
        })

        $('.rater_star_modal').on('rating:change', function(event, value, caption) {
            $('.rate_trigger').show();
        });

        $('.rate_trigger').click(function(e) {
            var rating = {
                'rating': $('.rater_star_modal').rating().val(),
                'book_id': $('#modal_book_id').val(),
            };
            $.ajax({
                type: 'post',
                url: "<?php echo base_url(); ?>books/rateBook",
                data: rating,
                async: true,
                success: function(data) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });

                    Toast.fire({
                        title: 'Rated successfully !',
                        type: 'success',
                    });

                    // HCI EVENT
                    // hciprogress($('#modal_book_id').val());

                    $('#rate_modal').modal('hide');
                    global_book_id = 0;


                }
            })
        });
        // bookmarker
        $('#popup_menu_bookmark').click('.bookmark_trigger', function(e) {
            var this_elm = $(this).find('.bookmark_trigger');
            var bookmark_data = {
                'book_id': this_elm.data('book_id'),
            };
            var count_all_saved_list = $('#count_all_saved_list').html();
            $.ajax({
                type: 'post',
                url: "<?php echo base_url(); ?>books/update_bookmark",
                data: bookmark_data,
                async: true,
                success: function(data) {
                    if (data == "login") {
                        please_login();
                    } else if (data == "inserted") {
                        toastBookmarkSaved(this_elm.data('book_id'));

                        this_elm.find('i').removeClass("far");
                        this_elm.find('i').addClass("fas");
                        this_elm.find('span').html(" unsave book");
                        count_all_saved_list++;
                        $('#count_all_saved_list').html(count_all_saved_list)

                    } else if (data == "removed") {
                        toastBookmarkUnsaved();

                        this_elm.find('i').removeClass("fas");
                        this_elm.find('i').addClass("far");
                        this_elm.find('span').html(" save book");
                        count_all_saved_list--;
                        $('#count_all_saved_list').html(count_all_saved_list)
                    }
                    $('#popup_menu').hide();
                }
            })
        });

        $('#popup_menu_rate').click(function(e) {
            $('#popup_menu').hide();
        });

    });

    $('.rater_star_modal').rating({
        'showCaption': true,
        'stars': '5',
        'min': '0',
        'max': '5',
        'step': '0.5',
        'size': 'md',
        'clearCaption': '0',
    });

    var mid_title = new Vue({
        el: '#app_mid_title_search_result',
        data: {
            title: '<?= str_replace("-", " ", $search) ?>',
            img_url: '<?= base_url() ?>assets/img/<?= $search ?>.png'
        }
    });
</script>