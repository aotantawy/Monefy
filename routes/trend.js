const express = require("express");
const spawn = require("child_process").spawn;
const router = express.Router();
const trendingSymbols = require("./../utilities/trending-symbols");
const Company = require("./../model/company");

function getPythonData(symbol) {
  const python = spawn("python", [
    "/home/ahmedosama/workspace/stock/MLModel/lstm.py",
    symbol,
  ]);

  const data = new Promise(function (resolve, reject) {
    python.stdout.on("data", function (data) {
      const dataToJson = JSON.parse(data.toString());
      dataToJson.time = dataToJson.time.reverse();
      dataToJson.close = dataToJson.close.reverse();
      resolve(dataToJson);
    });
    python.on("close", function (code) {
      if (code !== 0) {
        reject({ close: [], time: [] });
        console.log("an error has occurred");
      }
    });
  });
  return data;
}

async function rankCompany(symbol) {
  let { close } = await getPythonData(symbol);
  let rank = 0;

  for (let i = close.length - 1; i > 0; i--) {
    rank += close[i] - close[i - 1];
  }
  return rank;
}

function sortRankedList(rankedList) {
  return rankedList.sort((a, b) => (a.rank > b.rank ? -1 : 1));
}
router.get("/", async (req, res) => {
  try {
    let signedUser = false;
    let userName = "";
    if (req.cookies.userCookies) {
      signedUser = true;
      userName = req.cookies.userCookies;
    }

    const companies = await Company.find(
      { $or: trendingSymbols },
      "_id companyName webSite sector industry symbol"
    );
    let rankedList = [];
    for (let i = 0; i < companies.length; i++) {
      const rank = await rankCompany(companies[i].symbol);
      rankedList.push({ ...companies[i]._doc, rank });
    }

    rankedList = sortRankedList(rankedList);

    res.render("trend.ejs", {
      title: "Trending - Stock Prediction",
      signedUser,
      userName,
      companies: rankedList,
    });
  } catch (err) {
    console.log(err);
  }
});

module.exports = router;
