// datatoday opslaan in database
// data uit database halen van afgelopen dagen

var datatoday = 10;
var ctx = document.getElementById('myChart').getContext('2d');
var data = [10, 2, 8, 3, 5, 0, 10];

var days = ['Ma', 'Di', 'Wo', 'Do', 'Vr', 'Za', 'Zo'];
var dateString = Date.now();
var d = new Date(dateString);
var dayName = days[d.getDay() - 1];
console.log(dayName);

for(var i = 0; i < days.length; i++){
    if(days[i] === dayName){
        data[i] = datatoday;
        console.log(data);
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
