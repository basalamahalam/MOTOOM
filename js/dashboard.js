var salesTopData = null;
var salesTop;

$(function () {
  if ($("#performaneLine").length) {
    const id = 1;
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    today = yyyy + '/' + mm + '/' + dd;

    $.ajax({
      url: 'FetchData.php',
      data: { id: id, tanggal: today },
      method: 'POST',
      dataType: 'JSON',
      success: function (data) {
        console.log(data);
        var dataChart = [];
        for (var i = 0; i < data.length; i++) {
          dataChart[i] = parseInt(data[i]);
        }
        $.ajax({
          url: 'FetchDate.php',
          data: { id: id, tanggal: today },
          method: 'POST',
          dataType: 'JSON',
          success: function (data) {

            var graphGradient = document.getElementById("performaneLine").getContext('2d');
            var graphGradient2 = document.getElementById("performaneLine").getContext('2d');
            var saleGradientBg = graphGradient.createLinearGradient(5, 0, 5, 100);
            saleGradientBg.addColorStop(0, 'rgb(181, 251, 181)');
            saleGradientBg.addColorStop(1, 'rgba(65, 240, 111, 0.02)');
            var saleGradientBg2 = graphGradient2.createLinearGradient(100, 0, 50, 150);
            saleGradientBg2.addColorStop(0, 'rgba(0, 208, 255, 0.19)');
            saleGradientBg2.addColorStop(1, 'rgba(0, 208, 255, 0.03)');
            salesTopData = {
              labels: data,
              datasets: [{
                label: 'Kelembapan',
                data: dataChart,
                //data: [50, 110, 60, 290, 200, 115, 130, 170, 90, 210, 240, 280, 200],
                backgroundColor: saleGradientBg,
                borderColor: [
                  'green',
                ],
                borderWidth: 1.5,
                fill: 'start', // 3: no fill
                pointBorderWidth: 1,
                pointRadius: [4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4],
                pointHoverRadius: [2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2],
                pointBackgroundColor: ['green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green'],
                pointBorderColor: ['#fff', '#fff', '#fff', '#fff', '#fff', '#fff', '#fff', '#fff', '#fff', '#fff', '#fff', '#fff', '#fff',],
              }]
            };

            var salesTopOptions = {
              responsive: true,
              maintainAspectRatio: false,
              scales: {
                yAxes: [{
                  gridLines: {
                    display: true,
                    drawBorder: false,
                    color: "#F0F0F0",
                    zeroLineColor: '#F0F0F0',
                  },
                  ticks: {
                    reverse: true,
                    beginAtZero: false,
                    autoSkip: true,
                    maxTicksLimit: 4,
                    fontSize: 10,
                    color: "#6B778C"
                  }
                }],
                xAxes: [{
                  gridLines: {
                    display: false,
                    drawBorder: false,
                  },
                  ticks: {
                    beginAtZero: false,
                    autoSkip: true,
                    maxTicksLimit: 7,
                    fontSize: 10,
                    color: "#6B778C"
                  }
                }],
              },
              legend: false,
              legendCallback: function (chart) {
                var text = [];
                text.push('<div class="chartjs-legend"><ul>');
                for (var i = 0; i < chart.data.datasets.length; i++) {
                  console.log(chart.data.datasets[i]); // see what's inside the obj.
                  text.push('<li>');
                  text.push('<span style="background-color:' + chart.data.datasets[i].borderColor + '">' + '</span>');
                  text.push(chart.data.datasets[i].label);
                  text.push('</li>');
                }
                text.push('</ul></div>');
                return text.join("");
              },

              elements: {
                line: {
                  tension: 0.4,
                }
              },
              tooltips: {
                backgroundColor: 'rgba(31, 59, 179, 1)',
              }
            }
            salesTop = new Chart(graphGradient, {
              type: 'line',
              data: salesTopData,
              options: salesTopOptions
            });
            document.getElementById('performance-line-legend').innerHTML = salesTop.generateLegend();
          }

        });
      },
    });
  };
});


if ($("#datepicker-popup").length) {
  $('#datepicker-popup').datepicker({
    enableOnReadonly: true,
    todayHighlight: true,
  });
  $("#datepicker-popup").datepicker("setDate", "0");
}

$(function () {
  var tangg;
  $("#datepicker-popup").datepicker();

  $("#datepicker-popup").val();

  $("#datepicker-popup").on("change", function () {
    salesTop.destroy();
    var jsDate = $('#datepicker-popup').datepicker('getDate');
    if (jsDate !== null) { // if any date selected in datepicker
      jsDate instanceof Date; // -> true("0" + (jsDate.getMonth() + 1)).slice(-2)
      tangg = jsDate.getFullYear() + '/' + ("0" + (jsDate.getMonth() + 1)).slice(-2) + '/' + ("0" + jsDate.getDate()).slice(-2);
      const id = 1;


      $.ajax({
        url: 'FetchData.php',
        data: { id: id, tanggal: tangg },
        method: 'POST',
        dataType: 'JSON',
        success: function (data) {
          console.log(data);
          var dataChart = [];
          for (var i = 0; i < data.length; i++) {
            dataChart[i] = parseInt(data[i]);
          }
          $.ajax({
            url: 'FetchDate.php',
            data: { id: id, tanggal: tangg },
            method: 'POST',
            dataType: 'JSON',
            success: function (data) {

              var graphGradient = document.getElementById("performaneLine").getContext('2d');
              var graphGradient2 = document.getElementById("performaneLine").getContext('2d');
              var saleGradientBg = graphGradient.createLinearGradient(5, 0, 5, 100);
              saleGradientBg.addColorStop(0, 'rgb(181, 251, 181)');
              saleGradientBg.addColorStop(1, 'rgba(65, 240, 111, 0.02)');
              var saleGradientBg2 = graphGradient2.createLinearGradient(100, 0, 50, 150);
              saleGradientBg2.addColorStop(0, 'rgba(0, 208, 255, 0.19)');
              saleGradientBg2.addColorStop(1, 'rgba(0, 208, 255, 0.03)');
              salesTopData = {
                labels: data,
                datasets: [{
                  label: 'Kelembapan',
                  data: dataChart,
                  //data: [50, 110, 60, 290, 200, 115, 130, 170, 90, 210, 240, 280, 200],
                  backgroundColor: saleGradientBg,
                  borderColor: [
                    'green',
                  ],
                  borderWidth: 1.5,
                  fill: 'start', // 3: no fill
                  pointBorderWidth: 1,
                  pointRadius: [4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4],
                  pointHoverRadius: [2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2],
                  pointBackgroundColor: ['green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green'],
                  pointBorderColor: ['#fff', '#fff', '#fff', '#fff', '#fff', '#fff', '#fff', '#fff', '#fff', '#fff', '#fff', '#fff', '#fff',],
                }]
              };

              var salesTopOptions = {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                  yAxes: [{
                    gridLines: {
                      display: true,
                      drawBorder: false,
                      color: "#F0F0F0",
                      zeroLineColor: '#F0F0F0',
                    },
                    ticks: {
                      reverse: true,
                      beginAtZero: false,
                      autoSkip: true,
                      maxTicksLimit: 4,
                      fontSize: 10,
                      color: "#6B778C"
                    }
                  }],
                  xAxes: [{
                    gridLines: {
                      display: false,
                      drawBorder: false,
                    },
                    ticks: {
                      beginAtZero: false,
                      autoSkip: true,
                      maxTicksLimit: 7,
                      fontSize: 10,
                      color: "#6B778C"
                    }
                  }],
                },
                legend: false,
                legendCallback: function (chart) {
                  var text = [];
                  text.push('<div class="chartjs-legend"><ul>');
                  for (var i = 0; i < chart.data.datasets.length; i++) {
                    console.log(chart.data.datasets[i]); // see what's inside the obj.
                    text.push('<li>');
                    text.push('<span style="background-color:' + chart.data.datasets[i].borderColor + '">' + '</span>');
                    text.push(chart.data.datasets[i].label);
                    text.push('</li>');
                  }
                  text.push('</ul></div>');
                  return text.join("");
                },

                elements: {
                  line: {
                    tension: 0.4,
                  }
                },
                tooltips: {
                  backgroundColor: 'rgba(31, 59, 179, 1)',
                }
              }
              salesTop = new Chart(graphGradient, {
                type: 'line',
                data: salesTopData,
                options: salesTopOptions
              });
              document.getElementById('performance-line-legend').innerHTML = salesTop.generateLegend();
            }

          });
        }
      });

    }
  });
});