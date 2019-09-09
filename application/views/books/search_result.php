<div class="container">
    <div class="container">
        <div id="app_mid_title">
            <template>
                <div class="position-relative row">
                    <img :src="img_url" style="height:8rem;">
                    <h1 id="mid-title" class="display-4 font-arial pt-5 text-uppercase" style="left:4rem;">{{title}}</h1>
                </div>
            </template>
        </div>

        <div class="text-muted">
            <hr>
            <div class="row">
                <!-- Search result total -->
                <div class="col-4 pt-2 the_border_right"><?= $total_rows ?> item<?php if ($total_rows > 1) echo "s"; ?> found for "<?= $query ?>"</div>


                <div class="col-6 the_border_right">
                    <!-- Filter 1 -->
                    <div class="btn-group pr-2">
                        <button type="button" style="width:10rem" class="btn btn-outline-secondary dropdown-toggle small no_overflow" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="category_text">
                            Category
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item search_option_category" href="#" id="all" data-search="all">All</a>

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
                            <div class="dropdown-menu">
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
                        <button type="button" class="btn btn-outline-danger" id="filter_clear" style="display:none">
                            <i class="fas fa-times"></i> Clear
                        </button>
                    </div>
                </div>

                <!-- Sort rate -->
                <div class="text-right col-2">

                    <div class="btn-group">
                        <button type="button" style="width:10rem" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span id="sort_rating_text" class="small">Sort by rating</span>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item search_option_sort" href="#" id="sort_rate_desc" data-search="desc">Rate high to low</a>
                            <a class="dropdown-item search_option_sort" href="#" id="sort_rate_asc" data-search="asc">Rate low to high</a>
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

                    <div class="col-4">
                        <div class="py-3" style="width:21.5rem;">
                            <div class="card hover_img_col2" style="width: 21.5rem;">
                                <a href="<?= base_url() ?>book/<?= $book->book_id ?>" title="<?= $book->book_name ?>">
                                    <img class="w-100" src="<?= base_url() ?>assets/book_covers/<?= $book->book_id ?>.png" style="height:28rem"></a>
                                <div class="overlay_card"><a href="<?= base_url() ?>book/<?= $book->book_id ?>" class="stretched-link"></a></div>
                                <div class="card-body pb-0 pt-2" style="height:8rem;">
                                    <a class="card_body_type ctg" href="<?= base_url() ?>browse/<?= strtolower(ucwords(str_replace(" ", "-", $book->book_type))) ?>"><span><?= $book->book_type ?></span></a>
                                    <div class="card-title text-col-2-name pt-1"><a href="<?= base_url() ?>book/<?= $book->book_id ?>" title="<?= $book->book_name ?>"><?= $book->book_name ?></a></div>
                                    <div class="rater_star_grid">
                                        <input value="<?= $book->b_rate ?>" class="rater_star" title="">
                                    </div>
                                    <div class="text-card-author font-italic text-secondary" title="<?= $book->author ?>">By <?= $book->author ?></div>
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


<script>
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
        // sort rate active
        var sort_rate = url.searchParams.get("sort_rate") ? url.searchParams.get("sort_rate") : " ";
        $('#sort_rate_' + sort_rate).addClass("active");
        $('#sort_rating_text').html($('#sort_rate_' + sort_rate).html());

        // category active
        var category = url.searchParams.get("category") ? url.searchParams.get("category") : " ";
        var regex = new RegExp(" ", "g");
        category = category.replace(regex, "-")
        $('#' + category).addClass("active");
        $('#category_text').html($('#' + category).html());

        // author active
        var author = url.searchParams.get("author") ? url.searchParams.get("author") : " ";
        var regex = new RegExp(" ", "g");
        author = author.replace(regex, "-")
        $('#' + author).addClass("active");
        $('#filter_author_text').html($('#' + author).html());
        console.log(author);
        if (sort_rate != " " || category != "-" || author != "-") {
            // console.log("true : "+ sort_rate + category + author );
            $('#filter_clear').toggle();
        }

        $('#filter_clear').click(function(e) {
            e.preventDefault();
            var q = url.searchParams.get("q");
            window.location = "<?= base_url() ?>search/result?q=" + q;
        })

        // rate sort
        $('.search_option_sort').click(function(e) {
            e.preventDefault();
            var search_option = "&sort_rate=" + $(this).data('search');
            var q = url.searchParams.get("q");

            // current search options
            var category = url.searchParams.get("category") ? "&category=" + url.searchParams.get("category") : "";
            var author = url.searchParams.get("author") ? "&author=" + url.searchParams.get("author") : "";

            window.location = "<?= base_url() ?>search/result?q=" + q + search_option + category + author;
        })

        // filter category
        $('.search_option_category').click(function(e) {
            e.preventDefault();
            var search_option = "&category=" + $(this).data('search');
            var q = url.searchParams.get("q");

            // current search options
            var sort_rate = url.searchParams.get("sort_rate") ? "&sort_rate=" + url.searchParams.get("sort_rate") : "";
            var author = url.searchParams.get("author") ? "&author=" + url.searchParams.get("author") : "";

            window.location = "<?= base_url() ?>search/result?q=" + q + sort_rate + search_option + author;
        })

        // filter author
        $('.search_option_author').click(function(e) {
            e.preventDefault();
            var search_option = "&author=" + $(this).data('search');
            var q = url.searchParams.get("q");

            // current search options
            var sort_rate = url.searchParams.get("sort_rate") ? "&sort_rate=" + url.searchParams.get("sort_rate") : "";
            var category = url.searchParams.get("category") ? "&category=" + url.searchParams.get("category") : "";

            window.location = "<?= base_url() ?>search/result?q=" + q + sort_rate + category + search_option;
        })
    });

    var mid_title = new Vue({
        el: '#app_mid_title',
        data: {
            title: '<?= str_replace("-", " ", $search) ?>',
            img_url: '<?= base_url() ?>assets/img/<?= $search ?>.png'
        }
    });
</script>