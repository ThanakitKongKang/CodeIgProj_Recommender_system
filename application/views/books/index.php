<div class="container">
    <div id="top" class="row">
        <div class="col" id="col-1">
            1
            <!-- big image top recommended-->
        </div>
        <div class="col" id="col-2">
            <!-- another recommended list -->
            <div>1</div>
            <div>2</div>
            <div>3</div>
            <div>4</div>
        </div>
        <div class="col" id="col-3">
            <div>
                <!-- top 2 -->
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

    <!-- Category -->
        <div class="container" id="dropdown-category-menu" style="display: none;">
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