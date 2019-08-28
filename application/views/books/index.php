<div class="container">
    <div id="top" class="row">
        <div class="col" id="col-1">

            <?php
            if (!$final_recommend_list) echo "recommended list is empty";
            else { ?>

            <img id="img-col-1" src="<?= base_url() ?>assets/book_cover/<?= $final_recommend_list[0]['book_id'] ?>.png">
            <a href="book/<?= $final_recommend_list[0]['book_id'] ?>" class="stretched-link"></a>
            <div id="text-col-1"></div>
            <?php } ?>

            <!-- big image top recommended-->
        </div>
        <div class="col" id="col-2">
            <!-- another recommended list -->
            <div><?php if (isset($final_recommend_list[1]['book_name'])) echo $final_recommend_list[1]['book_name'] ?>

            </div>
            <div><?php if (isset($final_recommend_list[2]['book_name'])) echo $final_recommend_list[2]['book_name'] ?>

            </div>
            <div><?php if (isset($final_recommend_list[3]['book_name'])) echo $final_recommend_list[3]['book_name'] ?>

            </div>
            <div><?php if (isset($final_recommend_list[4]['book_name'])) echo $final_recommend_list[4]['book_name'] ?>

            </div>
        </div>
        <div class="col" id="col-3">
            <div>
                <!-- top 2 -->
                Total number of items in the recommended list array is : <?= sizeof($final_recommend_list); ?>
            </div>
        </div>
    </div>

</div>
<div id="mid">
    <div class="row">
        <nav class="navbar navbar-expand-lg navbar-light pb-0 w-100" style="border-bottom: 1px solid #CCC6BA;">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown-index" aria-controls="navbarNavDropdown2" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse col-12 justify-content-center" id="navbarNavDropdown-index">
                    <ul class="navbar-nav nav-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="#mid">Top rated books <span class="sr-only">(current)</span></a>
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
        <div id="dropdown-category-menu" style="display: none;">
            <div class="row">
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
                <div class="col">
                    <div><a class="nav-link text-primary">Main</a></div>
                    <div><a class="nav-link">sub1</a></div>
                    <div><a class="nav-link">sub2</a></div>
                    <div><a class="nav-link">sub3</a></div>
                </div>
            </div>
        </div>
        <!-- Top rated -->
        <div id="top-rated">
                <div></div>
        </div>
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

        // $('#dropdown-category').on("click", function(event) {
        //     $('#dropdown-category-menu').toggle()
        // });
    });
</script>