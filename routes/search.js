const express = require("express");
const router = express.Router();
const axios = require("axios");

router.get("/", async (req, res) => {
  try {
    let signedUser = false;
    let userName = "";
    let query = req.query.query;
    if (req.cookies.userCookies) {
      signedUser = true;
      userName = req.cookies.userCookies;
    }

    const searchResult = await axios.get(
      "https://www.googleapis.com/customsearch/v1?key=" +
        process.env.GOOGLE_API_KEY +
        "&cx=" +
        process.env.CX +
        "&q=" +
        query
    );

    res.render("search-result.ejs", {
      title: "Search Result - Stock Prediction",
      signedUser,
      userName,
      searchResult: searchResult.data.items,
    });
  } catch (err) {
    res.redirect("/");
    console.log(err);
  }
});

module.exports = router;
