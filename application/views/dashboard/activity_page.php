<div id="fullpage" class="col-10 container">
    <h2 class="text-center shadow-sm p-3 mb-1 rounded bg_linear_theme text-white"><?= $main_title ?></h2>
    <div class="bg-light p-5 rounded shadow-lg mb-5 bg-white">
        <div class="row">
            <div class="col">
                <canvas id="myChart" width="400" height="400"></canvas>
            </div>
            <div class="col">

            </div>
        </div>
    </div>
</div>

<script>
    // window.chartColors = {
    //     red: 'rgb(255, 99, 132)',
    //     orange: 'rgb(255, 159, 64)',
    //     yellow: 'rgb(255, 205, 86)',
    //     green: 'rgb(75, 192, 192)',
    //     blue: 'rgb(54, 162, 235)',
    //     purple: 'rgb(153, 102, 255)',
    //     grey: 'rgb(201, 203, 207)'
    // };
    // data: {
    //     labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange', 'a', 'b', 'c'],
    //     datasets: [{
    //         label: 'Vaw',
    //         data: [31, 10, 9, 8, 6, 4, 5, 3, 2, 1],
    //         fill: false,

    //     }, {
    //         label: 'Rating',
    //         data: [38, 45, 25, 43, 12, 20, 1, 42, 5, 1],
    //         fill: false,
    //     }, ],

    // },

    window.onload = function() {
        $.ajax({
            type: 'POST',
            url: "<?= $api_url ?>",
            // data:,
            success: function(data) {
                var json = JSON.parse(data);
                var ctx = document.getElementById("myChart").getContext("2d");
                var myChart = new Chart(ctx, {
                    type: json.type,
                    data: json,

                    options: {
                        responsive: true,
                        title: {
                            display: false,
                            text: 'Chart.js Line Chart'
                        },
                        tooltips: {
                            mode: 'index',
                            intersect: false,
                        },
                        hover: {
                            mode: 'nearest',
                            intersect: true
                        },
                        scales: {
                            xAxes: [{
                                display: true,
                                scaleLabel: {
                                    display: false,
                                    labelString: 'days ago'
                                }
                            }],
                            yAxes: [{
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Views'
                                }
                            }]
                        }
                    }
                });
            }
        });
    }
</script>