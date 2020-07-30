const express = require("express");
const router = express.Router();
const axios = require("axios");
const User = require("./../model/user");

router.get("/", async (req, res) => {
  try {
    // check is the cookie exsited
    if (!req.cookies.userCookies) res.redirect("/sign-in");

    const signedUser = await User.findOne({
      userName: req.cookies.userCookies,
    });

    const allNews = await axios.get(
      "https://newsapi.org/v2/top-headlines?country=" +
        signedUser.country +
        "&apiKey=" +
        process.env.NEWS_API_KEY +
        "&category=business&pageSize=100"
    );

    res.render("news.ejs", {
      title: "news - Stock Prediction",
      signedUser: true,
      userName: req.cookies.userCookies,
      allNews: allNews.data.articles,
    });
  } catch (err) {
    res.redirect("/sign-in");
    console.log(err);
  }
});

module.exports = router;
