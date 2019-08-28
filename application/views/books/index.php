<div class="container">
    <div id="top" class="row">
        <div class="col " id="col-1">

            <?php
            if (!$final_recommend_list) echo "recommended list is empty";
            else { ?>

            <img class="" id="img-col-1" src="<?= base_url() ?>assets/book_covers/<?= $final_recommend_list[0]['book_id'] ?>.png">
            <a href="book/<?= $final_recommend_list[0]['book_id'] ?>" class="stretched-link"></a>
            <div id="text-col-1"></div>
            <?php } ?>

            <!-- big image top recommended-->
        </div>
        <div class="col" id="col-2">
            <!-- another 4 recommended items -->
            <?php
            for ($i = 1; $i < 5; $i++) {
                ?>
            <div class="py-3"><?php if (isset($final_recommend_list[$i]['book_name'])) { ?>
                <div class="row h-100">
                    <div class="col-4">
                        <img class="img-col-2" src="<?= base_url() ?>assets/book_covers/<?= $final_recommend_list[$i]['book_id'] ?>.png">
                        <a href="book/<?= $final_recommend_list[$i]['book_id'] ?>" class="stretched-link"></a>
                    </div>

                    <div class="col-8 text-col-2">
                        <a class="text-col-2-type ctg" href="#mid"><span><?= $final_recommend_list[$i]['book_type'] ?></span></a>
                        <div class="text-col-2-name"> <a href="book/<?= $final_recommend_list[$i]['book_id'] ?>"><?= $final_recommend_list[$i]['book_name'] ?></a></div>
                        <div class="text-col-2-author"><?= $final_recommend_list[$i]['author'] ?></div>
                        <div class="text-col-2-date">dd/mm/yyyy</div>
                    </div>

                </div>
                <?php } ?>

            </div>
            <?php
            }
            ?>
        </div>
        <div class="col" id="col-3">
            <div>
                <!-- top 2 -->
                Total number of items in the recommended list array is : <?= sizeof($final_recommend_list); ?>
            </div>
        </div>
    </div>

</div>
<div id="mid" class="mt-5">
    <div class="row">
        <nav class="navbar navbar-expand-lg navbar-light pb-0 w-100" style="border-bottom: 1px solid #CCC6BA;">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown-index" aria-controls="navbarNavDropdown2" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse col-12 justify-content-center" id="navbarNavDropdown-index">
                    <ul class="navbar-nav nav-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="#mid" id="top-rated">Top rated books <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown" id="dropdown-category-toggle">
                            <a class="nav-link dropdown-toggle" id="dropdown-category">
                                Category
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div id="mid-content" class="container">
        <!-- Category -->
        <div class="position-relative">
            <div id="dropdown-category-menu" style="display: none;">
                <div class="row text-center">
                    <div class="col">
                        <div><a class="nav-link text-primary" id="ctg_1">Main</a></div>
                        <div><a class="nav-link">sub1</a></div>
                        <div><a class="nav-link">sub2</a></div>
                        <div><a class="nav-link">sub3</a></div>

                    </div>
                    <div class="col">
                        <div><a class="nav-link text-primary">Main</a></div>
                        <div><a class="nav-link">sub1</a></div>
                        <div><a class="nav-link">sub2</a></div>
                        <div><a class="nav-link">sub3</a></div>
                    </div>
                    <div class="col">
                        <div><a class="nav-link text-primary">Main</a></div>
                        <div><a class="nav-link">sub1</a></div>
                        <div><a class="nav-link">sub2</a></div>
                        <div><a class="nav-link">sub3</a></div>
                    </div>
                    <div class="col">
                        <div><a class="nav-link text-primary">Main</a></div>
                        <div><a class="nav-link">sub1</a></div>
                        <div><a class="nav-link">sub2</a></div>
                        <div><a class="nav-link">sub3</a></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Current title -->
        <div id="app_mid_title">
            <template>
                <h1 id="mid-title" class="font-arial text-center py-5">{{title}}</h1>
            </template>
        </div>


        <!-- Top rated -->
        <template id="top_rated_contents" v-if="category === 'toprated'">
            <div>
                <div class="row no-gutters">
                    <?php
                    foreach ($top_rated as $top) {
                        ?>
                    <div class="col-4 p-5">
                        <?= $top["b_rate"] ?> : <?= $top["book_name"] ?>
                    </div>
                    <?php
                    }
                    ?>
                </div>

            </div>
        </template>

        <!-- items by category -->
        <template id="category_contents" v-if="category === 'category'">
            <div>
                <h3 class="text-center font-alias">//Items by category</h3>

            </div>
        </template>

    </div>
</div>

<script>
    $(document).ready(function() {
        $('html').click(function() {
            $('#dropdown-category-menu').hide();
        })

        $('#dropdown-category-toggle').click(function(e) {
            e.stopPropagation();
        });

        $('#dropdown-category').click(function(e) {
            $('#dropdown-category-menu').toggle();
        });

        $('#top-rated').click(function(e) {
            mid_title.title = "20 Top rated books of all time";
            toprated.category = "toprated";
            category_content.category = "";
        });
        $('#ctg_1').click(function(e) {
            mid_title.title = "Category 1";
            toprated.category = false;
            category_content.category = "category";
        });
        $('.ctg').click(function(e) {
            mid_title.title = "Category 1";
            toprated.category = false;
            category_content.category = "category";
        });
    });

    var mid_title = new Vue({
        el: '#app_mid_title',
        data: {
            title: '20 Top rated books of all time'
        }
    });
    var toprated = new Vue({
        el: '#top_rated_contents',
        data: {
            category: 'toprated'
        }
    });
    var category_content = new Vue({
        el: '#category_contents',
        data: {
            category: ''
        }
    });
</script>