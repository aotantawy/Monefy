const express = require("express");
const spawn = require("child_process").spawn;
const router = express.Router();

function getCompanyrank(close) {
  let rank = 0;
  for (let i = close.length - 1; i > 0; i--) {
    rank += close[i] - close[i - 1];
  }
  return rank;
}

router.get("/", async (req, res) => {
  try {
    if (!req.cookies.userCookies) res.redirect("/sign-in");

    const python = spawn("python", [
      "/home/ahmedosama/workspace/stock/MLModel/lstm.py",
      req.query.symbol,
    ]);

    await python.stdout.on("data", function (data) {
      const dataToJson = JSON.parse(data.toString());
      dataToJson.time = dataToJson.time.reverse();
      dataToJson.close = dataToJson.close.reverse();
      dataToJson.rank = getCompanyrank(dataToJson.close);
      res.json(dataToJson);
    });
    await python.on("close", function (code) {
      if (code !== 0) {
        res.json({ close: [], time: [] });
        console.log("an error has occurred");
      }
    });
  } catch (err) {
    console.log(err);
  }
});

module.exports = router;
