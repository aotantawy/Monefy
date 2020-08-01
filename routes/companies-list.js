const express = require("express");
const router = express.Router();
const Company = require("./../model/company");

router.get("/", async (req, res) => {
  try {
    // check is the cookie exsited
    if (!req.cookies.userCookies) res.redirect("/sign-in");

    const companies = await Company.find({});

    res.render("companies-list.ejs", {
      title: "Companies - Stock Prediction",
      signedUser: true,
      userName: req.cookies.userCookies,
      companies,
    });
  } catch (err) {
    res.redirect("/sign-in");
    console.log(err);
  }
});

module.exports = router;
