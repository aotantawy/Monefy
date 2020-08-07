const express = require("express");
const axios = require("axios");
const router = express.Router();

router.get("/", async (req, res) => {
  try {
    if (!req.cookies.userCookies) res.redirect("/sign-in");

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

module.exports = router;
