function chart(chartSoort) {
    var collapseChart;
    var result = [];
    var today = new Date;
    var first = today.getDate() - today.getDay() + 2;
    var last = first + 6;
    var DayToday = today.getDate() + 1;

    var now = new Date(today.setDate(DayToday)).toISOString().slice(0, 10);
    var firstDay = new Date(today.setDate(first)).toISOString().slice(0, 10);
    var lastDay = new Date(today.setDate(last)).toISOString().slice(0, 10);

    switch (chartSoort) {
        case 'arbeid':
            collapseChart = document.getElementById('chartArbeid').getContext('2d');
            break;
        case 'drugs':
            collapseChart = document.getElementById('chartDrugs').getContext('2d');
            break;
        case 'slaap':
            collapseChart = document.getElementById('chartSlaap').getContext('2d');
            break;
        case 'drinken':
            collapseChart = document.getElementById('chartDrinken').getContext('2d');
            break;
        case 'eten':
            collapseChart = document.getElementById('chartEten').getContext('2d');
            break;
        case 'sport':
            collapseChart = document.getElementById('chartSport').getContext('2d');
            break;
    }
    $.ajax(
        {
            type: "POST",
            url: "assets/php/chartQuery.php",
            data: {firstDay: firstDay, lastDay: lastDay, today: now, soort: chartSoort},
            dataType: 'json',
            success: function (data) {
                for (i = 0; i < data.length; i++) {
                    switch (chartSoort) {
                        case 'arbeid':
                            result.push(arbeid(data[i][0], data[i][1]));
                            break;
                        case 'drugs':
                            result.push(drugs(data[i][0]));
                            break;
                        case 'slaap':
                            result.push(slaap(data[i][0], data[i][1]));
                            break;
                        case 'drinken':
                            result.push(drinken(data[i][0], data[i][1], data[i][2]));
                            break;
                        case 'eten':
                            result.push(eten(data[i][0], data[i][1]));
                            break;
                        case 'sport':
                            result.push(sporten(data[i][0]));
                            break;
                        case 'alles':
                            var arbeidVandaag = Math.round(arbeid(data[i][0], data[i][1]) * 10 ) / 10;
                            var drugsVandaag = Math.round(drugs(data[i][2]) * 10 ) / 10;
                            var slaapVandaag = Math.round(slaap(data[i][3], data[i][4]) * 10 ) / 10;
                            var drinkenVandaag = Math.round(drinken(data[i][5], data[i][6], data[i][7]) * 10 ) / 10;
                            var etenVandaag = Math.round(eten(data[i][8], data[i][9]) * 10 ) / 10;
                            var sportVandaag = Math.round(sporten(data[i][10]) * 10 ) / 10;
                            var totaalVandaag = Math.round(((arbeidVandaag + drugsVandaag + slaapVandaag + drinkenVandaag + etenVandaag + sportVandaag) / 6 ) * 10) / 10;
                            document.getElementById('arbeid').innerHTML = "Arbeid <br>" + arbeidVandaag;
                            document.getElementById('eten').innerHTML = "Eten <br>" + etenVandaag;
                            document.getElementById('drinken').innerHTML = "Drinken <br>" + drinkenVandaag;
                            document.getElementById('drugs').innerHTML = "Drugs <br>" + drugsVandaag;
                            document.getElementById('slaap').innerHTML = "Slaap <br>" + slaapVandaag;
                            document.getElementById('sport').innerHTML = "Sport <br>" + sportVandaag;
                            document.getElementById('totaal').innerHTML = "Gemiddelde cijfer <br>" + totaalVandaag;
                            break;
                    }

                }
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
                        responsiveAnimationDuration: 2000,
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


            },
            error: function (data){
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
                        responsiveAnimationDuration: 1300,
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