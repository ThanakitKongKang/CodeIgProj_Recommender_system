<div id="fullpage" class="col-10 container">
    <h2 class="text-center shadow-sm p-3 mb-1 rounded bg_linear_theme text-white"><?= $main_title ?></h2>
    <div class="bg-light p-5 rounded shadow-lg mb-5 bg-white">
        <div class="row">
            <div class="col">
                <canvas id="myChart_week" width="400" height="400"></canvas>
                <canvas id="myChart_month" width="400" height="400" class="mt-5"></canvas>
                <canvas id="myChart_alltime" width="400" height="400" class="mt-5"></canvas>
            </div>
            <div class="col border p-4" style="border-radius:0.25rem;">
                รายการล่าสุด
            </div>
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
        // weekly
        $.ajax({
            type: 'POST',
            url: "<?= $api_url_week ?>",
            // data:,
            success: function(data) {
                var json = JSON.parse(data);
                var ctx = document.getElementById("myChart_week").getContext("2d");
                var myChart = new Chart(ctx, {
                    type: json.type,
                    data: json,

                    options: {
                        responsive: true,
                        title: {
                            display: true,
                            text: 'weekly popular'
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
                        },
                        onClick: function(c, i) {
                            // e = i[0];
                            // console.log(e._index)
                            // var x_value = this.data.labels[e._index];
                            // var y_value = this.data.datasets[0].data[e._index];
                            // console.log(x_value);
                            // console.log(y_value);
                        }
                    }
                });
            }
        });
        $.ajax({
            type: 'POST',
            url: "<?= $api_url_month ?>",
            // data:,
            success: function(data) {
                var json = JSON.parse(data);
                var ctx2 = document.getElementById("myChart_month").getContext("2d");
                var myChart2 = new Chart(ctx2, {
                    type: json.type,
                    data: json,

                    options: {
                        responsive: true,
                        title: {
                            display: false,
                            text: 'weekly popular'
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
                        },
                        onClick: function(c, i) {
                            e = i[0];
                            if (typeof e != 'undefined') {
                                var x_value = this.data.labels[e._index];
                                // var y_value = this.data.datasets[0].data[e._index];
                                window.open("<?= base_url() ?>book/" + x_value);
                            }
                        }
                    }
                });
            }
        });
        $.ajax({
            type: 'POST',
            url: "<?= $api_url_alltime ?>",
            // data:,
            success: function(data) {
                var json = JSON.parse(data);
                var ctx3 = document.getElementById("myChart_alltime").getContext("2d");
                var myChart3 = new Chart(ctx3, {
                    type: json.type,
                    data: json,

                    options: {
                        responsive: true,
                        title: {
                            display: false,
                            text: 'weekly popular'
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
                        },
                        onClick: function(c, i) {
                            e = i[0];
                            if (typeof e != 'undefined') {
                                var x_value = this.data.labels[e._index];
                                // var y_value = this.data.datasets[0].data[e._index];
                                window.open("<?= base_url() ?>book/" + x_value);
                            }
                        }
                    }
                });
            }
        });

    }
</script>