$(function ()
{
    $.ajax({
        url: 'assets/php/chartQuery.php',
        data: "",

        dataType: 'json',
        success: function(data)
        {
            var datatoday = data[1][1];
            var datum = data[0][2];
            console.log(datum);
            var ctx = document.getElementById('myChart').getContext('2d');

            var days = ['Ma', 'Di', 'Wo', 'Do', 'Vr', 'Za', 'Zo'];
            var dateString = Date.now();
            var date = new Date(dateString);
            var dayName = days[date.getDay() - 1];

            var curr = new Date;
            var maandag = curr.getDate() - curr.getDay() + 1;
            var dinsdag = maandag + 1;
            var woensdag = maandag + 2;
            var donderdag = maandag + 3;
            var vrijdag = maandag + 4;
            var zaterdag = maandag + 5;
            var zondag = maandag + 6;

            var maandagDate = new Date(curr.setDate(maandag)).toISOString().slice(0,10);
            var dinsdagDate = new Date(curr.setDate(dinsdag)).toISOString().slice(0,10);
            var woensdagDate = new Date(curr.setDate(woensdag)).toISOString().slice(0,10);
            var donderdagDate = new Date(curr.setDate(donderdag)).toISOString().slice(0,10);
            var vrijdagDate = new Date(curr.setDate(vrijdag)).toISOString().slice(0,10);
            var zaterdagDate = new Date(curr.setDate(zaterdag)).toISOString().slice(0,10);
            var zondagDate = new Date(curr.setDate(zondag)).toISOString().slice(0,10);

            console.log(maandagDate);
            console.log(dinsdagDate);
            console.log(woensdagDate);
            console.log(donderdagDate);
            console.log(vrijdagDate);
            console.log(zaterdagDate);
            console.log(zondagDate);

            for(var i = 0; i < days.length; i++){
                if(days[i] === dayName){
                    data[i] = datatoday;
                }
                else{
                    data[i] = data;
                }
            }


            var chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Ma', 'Di', 'Wo', 'Do', 'Vr', 'Za', 'Zo'],
                    datasets: [{
                        label: 'Levensstijl',
                        data: data
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
