<div class="container">
    <?php foreach ($saved_list as $saved) { ?>

        <div class="row bg-light py-3 book_detail_content mt-3" style="border-radius:1rem;">
            <div class="col pl-4" style="max-width:13rem;">
                <img id="" style="width:100%;box-shadow: 0 2.5px 5px rgba(0, 0, 0, 0.25);" src="<?= base_url() ?>assets/book_covers/<?= $saved['book_id'] ?>.png">
            </div>
            <!-- RATE section -->
            <div class="col">
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
                </div>
                <!-- BOOK detail section -->
                <input id="book_id" type="hidden" value="<?= $saved['book_id'] ?>">
                <div class="pb-2 font-arial font-weight-bolder"> <?= $saved['book_name'] ?></div>
                <div class="text-col-2-author pt-1">Category : <a class="text-col-2-author" href="<?= base_url() ?>browse/<?= $saved['book_type'] ?>"><span><?= $saved['book_type'] ?></span></a></div>
                <div class="text-col-2-author pt-1">Author : <?= $saved['author'] ?></div>
                <!-- bookmark trigger -->
                <div class="pr-4 w-100">
                    <hr class="mb-2">
                    <button class="btn btn-primary bookmark_trigger"><i class="fas fa-bookmark" id="bookmark_icon"></i> เลิกบันทึก</button>
                </div>
            </div>
        </div>
    <?php } ?>
</div>