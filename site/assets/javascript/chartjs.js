function chart(chartSoort) {

    //get range of first and last day of the week
    var today = new Date;
    var last = today.getDate() - today.getDay() + 1;
    var first = last + 6;

    //format date data
    var firstDay = new Date(today.setDate(last)).toISOString().slice(0, 10);
    var lastDay = new Date(today.setDate(first)).toISOString().slice(0, 10);
    $.ajax(
        {
            type: "POST",
            url: "assets/php/chartQuery.php",
            data: {firstDay: firstDay, lastDay: lastDay, soort: chartSoort},
            dataType: 'json',
            success: function (data) {
                var collapseChart;
                var result = [];
                console.log(data);
                for (i = 0; i < data.length; i++) {
                    switch (chartSoort) {
                        case 'arbeid':
                            result.push(arbeid(data[i][0], data[i][1]));
                            collapseChart = document.getElementById('chartArbeid').getContext('2d');
                            break;
                        case 'drugs':
                            result.push(drugs(data[i][0]));
                            collapseChart = document.getElementById('chartDrugs').getContext('2d');
                            break;
                        case 'slaap':
                            result.push(slaap(data[i][0], data[i][1]));
                            collapseChart = document.getElementById('chartSlaap').getContext('2d');
                            break;
                        case 'drinken':
                            result.push(drinken(data[i][0], data[i][1], data[i][2]));
                            collapseChart = document.getElementById('chartDrinken').getContext('2d');
                            break;
                        case 'eten':
                            result.push(eten(data[i][0], data[i][1]));
                            collapseChart = document.getElementById('chartEten').getContext('2d');
                            break;
                        case 'sport':
                            result.push(sporten(data[i][0]));
                            collapseChart = document.getElementById('chartSport').getContext('2d');
                            break;
                    }
                }
                console.log(result);

                var chart = new Chart(collapseChart, {
                    type: 'line',
                    data: {
                        labels: ['Ma', 'Di', 'Wo', 'Do', 'Vr', 'Za', 'Zo'],
                        datasets: [{
                            label: 'Levensstijl',
                            data: result
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            yAxes: [{
                                ticks: {
                                    suggestedMin: 0,
                                    beginAtZero: true,
                                    max: 10
                                }
                            }]
                        }
                    },
                    plugins: [
                        {
                            afterLayout: function (chart) {
                                var scales = chart.scales;

                                var borderColor = chart.ctx.createLinearGradient(
                                    scales["x-axis-0"].left,
                                    scales["y-axis-0"].bottom,
                                    scales["y-axis-0"].right,
                                    scales["y-axis-0"].top
                                );

                                borderColor.addColorStop(0, "red");
                                borderColor.addColorStop(0.25, "orange");
                                borderColor.addColorStop(0.5, "yellow");
                                borderColor.addColorStop(0.75, "lime");
                                borderColor.addColorStop(1, "green");

                                chart.data.datasets[0].borderColor = borderColor;
                            }
                        }
                    ]


                });
            }
        });
}
