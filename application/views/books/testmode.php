<div class="container">
    <div class="page-header">
        <h2>Bootstrap Star Rating Examples
            <small>&copy; Kartik Visweswaran, Krajee.com</small>
        </h2>
    </div>
    <div class="rater_star" title=""></div>
    <div class="clearfix">test</div>
    <hr>

    <input class="rating" value="0" class="rating" data-min=0 data-max=5 data-step=0.5 data-size="sm" title="">
    <div class="clearfix"></div>
    <hr>
    <input id="input-21b" value="4" type="text" class="rating" data-min=0 data-max=5 data-step=0.2 data-size="lg" required title="">
    <div class="clearfix"></div>
    <hr>
    <input required id="input-21c" value="" type="text" title="">
    <div class="clearfix"></div>
    <hr>
    <input id="input-21d" value="2" type="text" class="rating" data-min=0 data-max=5 data-step=0.5 data-size="sm" title="">
    <hr>
    <input id="input-21e" value="0" type="text" class="rating" data-min=0 data-max=5 data-step=0.5 data-size="xs" title="">
    <hr>
    <input id="input-21f" value="0" type="text" data-min=0 data-max=5 data-step=0.1 data-size="md" title="">
    <hr>
    <input id="input-2ba" type="text" class="rating" data-min="0" data-max="5" data-step="0.5" data-stars=5 data-symbol="&#xe005;" data-default-caption="{rating} hearts" data-star-captions="{}" title="">
    <hr>
    <input id="input-22" value="0" type="text" class="rating" data-min=0 data-max=5 data-step=0.5 data-rtl=1 data-glyphicon=0 title="">
    <div class="clearfix"></div>
    <hr>
    <input required class="rb-rating" type="text" value="" title="">
    <hr>
    <input id="rating-input" type="text" title="" />
    <button id="btn-rating-input" type="button" class="btn btn-primary">Toggle Disable</button>
    <hr>
    <input id="kartik" class="rating" data-stars="5" data-step="0.1" title="" />
    <div class="form-group" style="margin-top:10px">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-default">Reset</button>
        <button type="button" class="btn btn-danger">Destroy</button>
        <button type="button" class="btn btn-success">Create</button>
    </div>

    <hr>
    <script>
        jQuery(document).ready(function() {
            $("#input-21f").rating({
                starCaptions: function(val) {
                    if (val < 3) {
                        return val;
                    } else {
                        return 'high';
                    }
                },
                starCaptionClasses: function(val) {
                    if (val < 3) {
                        return 'label label-danger';
                    } else {
                        return 'label label-success';
                    }
                },
                hoverOnClear: false
            });

            var $inp = $('#rating-input');

            $inp.rating({
                min: 0,
                max: 5,
                step: 1,
                size: 'lg',
                showClear: false
            });

            $('#btn-rating-input').on('click', function() {
                $inp.rating('refresh', {
                    showClear: true,
                    disabled: !$inp.attr('disabled')
                });
            });


            $('.btn-danger').on('click', function() {
                $("#kartik").rating('destroy');
            });

            $('.btn-success').on('click', function() {
                $("#kartik").rating('create');
            });

            $inp.on('rating.change', function() {
                alert($('#rating-input').val());
            });


            $('.rb-rating').rating({
                'showCaption': true,
                'stars': '3',
                'min': '0',
                'max': '3',
                'step': '1',
                'size': 'xs',
                'starCaptions': {
                    0: 'status:nix',
                    1: 'status:wackelt',
                    2: 'status:geht',
                    3: 'status:laeuft'
                }
            });

            // start from here
            $('.rater_star').rating({
                'showCaption': false,
                'stars': '5',
                'min': '0',
                'max': '5',
                'step': '0.5',
                'size': 'sm',
                displayOnly:true,

            });

            $("#input-21c").rating({
                min: 0,
                max: 8,
                step: 0.5,
                size: "xl",
                stars: "8"
            });
        });
    </script>
</div>