//bar
var ctxB = document.getElementById("barChart").getContext('2d');
var max1 = document.getElementById("max1").value;
var maxnombre1 = document.getElementById("maxnombre1").value;
var max2 = document.getElementById("max2").value;
var maxnombre2 = document.getElementById("maxnombre2").value;
var max3 = document.getElementById("max3").value;
var maxnombre3 = document.getElementById("maxnombre3").value;
var max4 = document.getElementById("max4").value;
var maxnombre4 = document.getElementById("maxnombre4").value;
var max5 = document.getElementById("max5").value;
var maxnombre5 = document.getElementById("maxnombre5").value;
var myBarChart = new Chart(ctxB, {
type: 'bar',
data: {
labels: [maxnombre1, maxnombre2, maxnombre3, maxnombre4, maxnombre5],
datasets: [{
label: 'Número de encuestados',
data: [max1, max2, max3, max4, max5],
backgroundColor: ["#4E73DF","#1CC88A","#36B9CD","#FF4B40","#EEB039"]
}]
},
options: {
legend: {
  display: false
},
scales: {
yAxes: [{
ticks: {
beginAtZero: true
}
}]
}
}
});
