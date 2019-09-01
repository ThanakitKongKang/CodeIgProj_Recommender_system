<div class="container">
    <div class="row">
        <div class="d-inline-block col" style="height: 90vh!important;width:40vw!important">
            <object data="<?= base_url() ?>assets/book_files/Certified-Management-Accountant-CMA-Part-1.pdf" type="application/pdf" width="100%" height="100%">
            </object>
        </div>
        <div class="pl-5 col">
            <div class="row">
                <div class="col">
                    <img id="" style="width:100%;box-shadow: 0 2.5px 5px rgba(0, 0, 0, 0.25);" src="<?= base_url() ?>assets/book_covers/<?= $book_detail['book_id'] ?>.png">
                </div>
                <div class="col">
                    <a class="text-col-2-type ctg" href="<?= base_url() ?>browse/<?= $book_detail['book_type'] ?>"><span><?= $book_detail['book_type'] ?></span></a>
                    <div class="text-col-2-name pt-2"> <a href="<?= base_url() ?>book/<?= $book_detail['book_id'] ?>"><?= $book_detail['book_name'] ?></a></div>
                    <div class="text-col-2-author"><?= $book_detail['author'] ?></div>
                    <div class="position-absolute" style="bottom:2rem">
                        <!-- input value = the user rated this book -->
                        <input value="<?= $book_detail['b_rate'] ?>" class="rater_star" title="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('.rater_star').rating({
            'stars': '5',
            'min': '0',
            'max': '5',
            'step': '0.5',
            'size': 'sm',
            displayOnly: false,
            showCaption: false,
            showClear: false,
        });
    });
</script>