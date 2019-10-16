$(function ()
{
    //get range of first and last day of the week
    var today = new Date;
    var last = today.getDate() - today.getDay() + 1;
    var first = last + 6;

    //format date data
    var firstDay = new Date(today.setDate(last)).toISOString().slice(0,10);
    var lastDay = new Date(today.setDate(first)).toISOString().slice(0,10);
    $.ajax(
        {
        type: "POST",
        url: "assets/php/chartQuery.php",
        data: {firstDay: firstDay, lastDay: lastDay},
        dataType: 'json',
        success: function(data)
        {
            //chart
            var ctx = document.getElementById('myChart').getContext('2d');

            //fill data
            var result = [];
            console.log(data);
            for(i = 0; i < data.length; i++){
                result.push(data[i][0]);
            }
            console.log(result);


            var chart = new Chart(ctx, {
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
                        afterLayout: function(chart) {
                            var scales = chart. scales;

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
});