//doughnut
var ctxD = document.getElementById("doughnutChart");
var nsus = document.getElementById("nsus").value;
var nus = document.getElementById("nus").value;
var nwave = document.getElementById("nwave").value;
var ncon = document.getElementById("ncon").value;
var nnps = document.getElementById("nnps").value;
var myLineChart = new Chart(ctxD, {
type: 'doughnut',
data: {
labels: ["SUS", "Usabilidad", "Wave", "Contraste", "NPS"],
datasets: [{
data: [nsus, nus, nwave, ncon, nnps],
backgroundColor: ["#4E73DF", "#1CC88A", "#36B9CD", "#FF4B40", "#EEB039"],
hoverBackgroundColor: ["#4E73EF", "#1CC89A", "#36B9DD", "#FF4B50", "#EEB049"]
}]
},
options: {
responsive: true,
legend: {
      position: 'bottom'
   }
}
});
