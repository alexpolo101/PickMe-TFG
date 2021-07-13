//bar
var rad = document.getElementById("radarChart").getContext('2d');
var count = document.getElementById("susaltnum").value;
var nombres = [count];
var puntos = [count];


for (var i = 0; i < count; i++) {
   idnom = "susalt" + (i+1);
   idpun = "susaltval" + (i+1);

   nombres[i] = document.getElementById(idnom).value;
   puntos[i] = document.getElementById(idpun).value;
}

var myBarChart = new Chart(rad, {
type: 'radar',
data: {
labels: nombres,
datasets: [{
label: 'Puntos obtenidos en SUS',
data: puntos,
fill: true,
backgroundColor: 'rgba(54, 162, 235, 0.2)',
    borderColor: 'rgb(54, 162, 235)',
    pointBackgroundColor: 'rgb(54, 162, 235)',
    pointBorderColor: '#fff',
    pointHoverBackgroundColor: '#fff',
    pointHoverBorderColor: 'rgb(54, 162, 235)',
}]
},
options: {
scale: {
    ticks: {
        beginAtZero: true,
        max: 100,
        min: 0,
        stepSize: 10
    }
}
}
});
