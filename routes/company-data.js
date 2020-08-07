const express = require("express");
const axios = require("axios");
const spawn = require("child_process").spawn;
const router = express.Router();

router.get("/history", async (req, res) => {
  try {
    const alphavantage = await axios.get(
      "https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol=" +
        req.query.symbol +
        "&apikey=" +
        process.env.ALPHAVANTAGE
    );
    const result = { time: [], close: [] };

    result.time = Object.keys(alphavantage.data["Time Series (Daily)"]);

    result.time.forEach(function (dataItem) {
      result.close.push(
        alphavantage.data["Time Series (Daily)"][dataItem]["4. close"]
      );
    });

    res.json(result);
  } catch (err) {
    console.log(err);
  }
});

router.get("/perdiction", async (req, res) => {
  try {
    const python = spawn("python", [
      "/home/ahmedosama/workspace/stock/MLModel/model.py",
    ]);
    await python.stdout.on("data", function (data) {
      const dataToString = data.toString();
      
    });
    await python.on("close", function (code) {
      if (code !== 0) {
        console.log("an error has occurred");
      }
    });
  } catch (err) {
    console.log(err);
  }
});

module.exports = router;
