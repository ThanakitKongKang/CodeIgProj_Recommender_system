<div id="fullpage" class="col-12 container">
    <h2 class="text-center shadow-sm p-3 mb-1 rounded bg_linear_theme text-white"><?= $main_title ?></h2>
    <div class="bg-light p-md-5 rounded shadow-lg mb-5 bg-white">
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <canvas id="myChart_week" height="200"></canvas>
            </div>
            <div class="col-lg-6 col-sm-12">
                <canvas id="myChart_month" height="200"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <canvas id="myChart_alltime" height="250" class="mt-5"></canvas>
            </div>
            <div class="col p-4 mt-5" style="border-radius:0.25rem;">
                <table class="table table-bordered table-compact font-apple" id="views_log">
                    <thead class="">
                        <tr>
                            <th class="align-middle text-center">DATE</th>
                            <th class="align-middle text-center">TITLE</th>
                            <th class="align-middle text-center">TYPE</th>
                            <th class="align-middle text-center">USERNAME</th>
                        </tr>
                    </thead>

                    <tbody id="tbodyData_book">
                    </tbody>
                </table>

            </div>
        </div>


    </div>
</div>
</div>

<script>
    $(document).ready(function() {
        if (parseInt($(window).width()) < 400) {
            $('#myChart_week').attr('height', 400);
            $('#myChart_month').attr('height', 400);
            $('#myChart_alltime').attr('height', 400);
        } else if (parseInt($(window).width()) == 1024) {
            $('#myChart_week').attr('height', 400);
            $('#myChart_month').attr('height', 400);
            $('#myChart_alltime').attr('height', 400);
        }
        var table = $('#views_log').DataTable({
            scrollY: false,
            scrollX: false,
            scrollCollapse: true,
            paging: true,
            info: true,
            pageLength: 10,
            processing: true,
            order: [0, 'desc'],
            deferRender: true,
            ajax: {
                url: "<?= base_url() ?>api/activity_view/get_log",
                dataSrc: ""
            },
            columns: [{
                    "data": "date"
                },

                {
                    "data": "book_name"
                },
                {
                    "data": "book_type"
                },
                {
                    "data": "username"
                },

            ],
            columnDefs: [{
                    "targets": 'no-sort',
                    "orderable": false,
                },
                {
                    "targets": [0, 1, 2, 3],
                    "searchable": true,
                },
                {
                    "width": "5%",
                    "targets": [3],
                },
                {
                    "width": "15%",
                    "targets": [2],
                },
                {
                    "width": "30%",
                    "targets": [0, 1],
                }
            ],
            search: {
                "smart": true
            },
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search"
            }
        });
    });
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
                            text: 'Weekly popular'
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
                                },
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        },
                        legend: {
                            onClick: function(c, i) {
                                window.open("<?= base_url() ?>book/" + i["text"]);
                            }
                        },
                        tooltips: {
                            callbacks: {
                                title: function(tooltipItem, data) {
                                    return data['labels'][tooltipItem[0]['index']];
                                },
                                label: function(tooltipItem, data) {
                                    return " [" + data['datasets'][tooltipItem['datasetIndex']]['label'] + "] : " + data['datasets'][tooltipItem['datasetIndex']]['data'][tooltipItem['index']] + " views";
                                },

                            },
                            backgroundColor: '#FFF',
                            titleFontSize: 16,
                            titleFontColor: '#0066ff',
                            bodyFontColor: '#000',
                            bodyFontSize: 14,

                        }
                    },
                    plugins: [{
                        afterDraw: function(chart) {
                            if (chart.data.datasets.length == 0) {
                                let ctx = chart.chart.ctx;
                                let width = chart.chart.width;
                                let height = chart.chart.height;

                                ctx.save();
                                ctx.textAlign = 'center';
                                ctx.textBaseline = 'middle';
                                ctx.fillText('No data to display', width / 1.9, height / 2);
                                ctx.restore();
                            }
                        }
                    }]

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
                        legend: {
                            display: false
                        },
                        responsive: true,
                        title: {
                            display: true,
                            text: 'Monthly popular'
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
                                    labelString: 'title'
                                }
                            }],
                            yAxes: [{
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Views'
                                },
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        },
                        onClick: function(c, i) {
                            e = i[0];
                            if (typeof e != 'undefined') {
                                var x_value = this.data.datasets[0].book_id[e._index];
                                // var y_value = this.data.datasets[0].data[e._index];
                                window.open("<?= base_url() ?>book/" + x_value);
                            }
                        },
                        tooltips: {
                            callbacks: {
                                title: function(tooltipItem, data) {
                                    return "Book ID : " + data['datasets'][0]['book_id'][tooltipItem[0]['index']];
                                },
                                afterTitle: function(tooltipItem, data) {

                                    return " " + data['datasets'][0]['book_name'][tooltipItem[0]['index']];
                                },
                                label: function(tooltipItem, data) {
                                    return " " + data['datasets'][tooltipItem['datasetIndex']]['data'][tooltipItem['index']] + " views";
                                },
                                footer: function() {
                                    return "(click to see book's detail)"
                                },


                            },
                            backgroundColor: '#FFF',
                            titleFontSize: 12,
                            titleFontColor: '#0066ff',
                            titleAlign: 'center',
                            bodyFontColor: '#000',
                            bodyFontSize: 16,
                            footerFontColor: '#aaa',
                            footerAlign: 'center',
                            footerFontSize: 10,
                            borderWidth: 1,
                            borderColor: '#dee2e6',
                        },
                    },
                    plugins: [{
                        beforeInit: function(chart) {
                            chart.data.labels.forEach(function(value, index, array) {
                                var a = [];
                                a.push(value.slice(0, 5) + "..");
                                array[index] = a;
                            })
                        },
                        afterDraw: function(chart) {
                            if (chart.data.datasets.length == 0) {
                                let ctx = chart.chart.ctx;
                                let width = chart.chart.width;
                                let height = chart.chart.height;

                                ctx.save();
                                ctx.textAlign = 'center';
                                ctx.textBaseline = 'middle';
                                ctx.fillText('No data to display', width / 1.9, height / 2);
                                ctx.restore();
                            }
                        }
                    }]
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
                        legend: {
                            display: false
                        },
                        responsive: true,
                        title: {
                            display: true,
                            text: 'All time popular'
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
                                    labelString: 'title'
                                }
                            }],
                            yAxes: [{
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Views'
                                },
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        },
                        onClick: function(c, i) {
                            e = i[0];
                            if (typeof e != 'undefined') {
                                var x_value = this.data.datasets[0].book_id[e._index];
                                // var y_value = this.data.datasets[0].data[e._index];
                                window.open("<?= base_url() ?>book/" + x_value);
                            }
                        },
                        tooltips: {
                            callbacks: {
                                title: function(tooltipItem, data) {
                                    return "Book ID : " + data['datasets'][0]['book_id'][tooltipItem[0]['index']];
                                },
                                afterTitle: function(tooltipItem, data) {

                                    return "" + data['datasets'][0]['book_name'][tooltipItem[0]['index']];
                                },
                                label: function(tooltipItem, data) {
                                    return " " + data['datasets'][tooltipItem['datasetIndex']]['data'][tooltipItem['index']] + " views";
                                },
                                footer: function() {
                                    return "(click to see book's detail)"
                                },
                            },
                            backgroundColor: '#FFF',
                            titleFontSize: 12,
                            titleFontColor: '#0066ff',
                            titleAlign: 'center',
                            bodyFontColor: '#000',
                            bodyFontSize: 16,
                            footerFontColor: '#aaa',
                            footerAlign: 'center',
                            footerFontSize: 10,
                            borderWidth: 1,
                            borderColor: '#dee2e6',
                        },

                    },
                    plugins: [{
                        beforeInit: function(chart) {
                            chart.data.labels.forEach(function(value, index, array) {
                                var a = [];
                                a.push(value.slice(0, 5) + "..");
                                array[index] = a;
                            })
                        },
                        afterDraw: function(chart) {
                            if (chart.data.datasets.length == 0) {
                                let ctx = chart.chart.ctx;
                                let width = chart.chart.width;
                                let height = chart.chart.height;

                                ctx.save();
                                ctx.textAlign = 'center';
                                ctx.textBaseline = 'middle';
                                ctx.fillText('No data to display', width / 1.9, height / 2);
                                ctx.restore();
                            }
                        }
                    }]
                });
            }
        });

    }
</script>