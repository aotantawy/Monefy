document
  .getElementById("list-History-list")
  .addEventListener("click", function () {
    console.log("history click");
    const ctx = document.getElementById("HistoryChart").getContext("2d");
    const symbol = document.getElementById("companySymbol").value;
    console.log(symbol);
    axios
      .get("http://localhost:8080/history?symbol=" + symbol)
      .then(function (res) {
        new Chart(ctx, {
          type: "line",
          data: {
            labels: res.data.time,
            datasets: [
              {
                label: "Stock data points",
                data: res.data.close,
                borderWidth: 2,
              },
            ],
          },
          options: {
            scales: {
              yAxes: [
                {
                  ticks: {
                    beginAtZero: true,
                  },
                },
              ],
            },
          },
        });
      })
      .catch(function (err) {
        console.log(err);
      });
  });
