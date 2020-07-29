const express = require("express");
const router = express.Router();
const axios = require("axios");
const User = require("./../model/user");
const { Console } = require("console");

router.get("/", async (req, res) => {
  try {
    // check is the cookie exsited
    if (!req.cookies.userCookies) res.redirect("/sign-in");

    const signedUser = await User.findOne({
      userName: req.cookies.userCookies,
    });
    //console.log(signedUser.coutnry);

    const allNews = await axios.get(
      "https://newsapi.org/v2/top-headlines?country=" +
        signedUser.country +
        "&apiKey=" +
        process.env.NEWS_API_KEY +
        "&category=business&pageSize=100"
    );

    console.log(allNews.data);

    res.render("news.ejs", {
      title: "news - Stock Prediction",
      allNews: allNews.data.articles,
    });
  } catch (err) {
    console.log(err);
  }
});

module.exports = router;
