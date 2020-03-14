<div class="container">
    <h2 class="text-right shadow-sm p-3 mb-1 rounded bg_linear_theme text-white">Advanced Search <i class="fas fa-search-plus"></i></h2>
    <div class="p-md-5 p-3 rounded shadow-lg mb-5 bg-white">
        <form id="the_form" action="<?= base_url() ?>search/result">
            <div class="">
                <div class="form-group row">
                    <label class="col-sm-3 col-lg-2 col-form-label">Search Term</label>
                    <div class="col-sm-8">
                        <input type="text" autocomplete="off" class="form-control" name="q" id="q" placeholder="Book Title.." value="<?php if (!empty($previous_query_string)) echo $previous_query_string; ?>">
                    </div>
                </div>
                <hr class="mt-4">

                <div class="form-group row">
                    <label class="col-sm-3 col-lg-2 col-form-label">Author</label>
                    <div class="col-lg-4 col-sm-8">
                        <select class="select_author form-control" name="author">
                            <option value="">Author name..</option>
                            <?php
                            foreach ($author_list as $author) {
                            ?>
                                <option value="<?= $author["author"] ?>"><?= $author["author"] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-lg-2 col-form-label">Book Type</label>
                    <div class="col-lg-4 col-sm-8">
                        <select class="select_category form-control" name="category">
                            <option value="">Category..</option>
                            <?php foreach ($category_list as $category) { ?>
                                <option value="<?= $category["book_type"] ?>"><?= $category["book_type"] ?></option>
                            <?php } ?>

                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-lg-2 col-form-label ">Rating</label>
                    <div class="col-sm-8">
                        <input value="0" name="rating" class="rating_select" title="" data-show-clear="true">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-lg-2 col-form-label">Sort by</label>
                    <div class="col-lg-3 col-sm-9">
                        <select class="form-control" name="sort">
                            <option value="">Sort..</option>
                            <option value="rate_desc">Rate high to low</option>
                            <option value="rate_asc">Rate low to high</option>
                            <option value="title_asc">Book Title A-Z</option>
                            <option value="title_desc">Book Title Z-A</option>
                        </select>
                    </div>
                </div>


                <?php if ($this->session->userdata('logged_in')) { ?>
                    <hr class="mt-4">
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-lg-2 col-form-label">Other Options</label>
                        <div class="col-sm-8">
                            <div class="row ml-0 font-apple">
                                <div class="mr-2 link oth_options"><input type="checkbox" name="notrated" class="mt-3 pr-2" style="z-index:-1" value="true"> not Rated</div>
                                <div class="mr-2 link oth_options"><input type="checkbox" name="notsaved" class="mt-3 pr-2" style="z-index:-10" value="true"> not Saved</div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <div class="form-group row justify-content-center mt-5 mb-0">
                    <div class="col-lg-6">
                        <button type="submit" class="btn bg_linear_theme mx-auto btn-lg w-100 shadow" id="advsubmit">Search</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>
<script src="<?= base_url() ?>/assets/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.rating-input').rating("clear");
        $("input[type='checkbox']").hover(function() {
            $(this).addClass("hovered");
        }, function() {
            $(this).removeClass("hovered");
        });

        $('.oth_options').click(function(e) {
            if (!($(this).find("input")).hasClass("hovered")) {
                $(this).find("input").prop("checked", !($(this).find("input").prop("checked")));
            }
        });

        $('.select_author').select2({
            placeholder: 'Author name..',
            allowClear: true,
            tags: true,
        });

        $('.select_category').select2({
            placeholder: 'Category..',
            allowClear: true,
            tags: true,
        });


    });

    $('.rating_select').rating({
        'showCaption': true,
        'starCaptions': {
            0.5: '0.5 & Up',
            1: '1 & Up',
            1.5: '1.5 & Up',
            2: '2 & Up',
            2: '2.5 & Up',
            3: '3 & Up',
            3.5: '3.5 & Up',
            4: '4 & Up',
            4.5: '4.5 & Up',
            5: '5'
        },
        'stars': '5',
        'min': '0',
        'max': '5',
        'step': '0.5',
        'size': 'sm',
        'clearCaption': '0',
    });
</script>