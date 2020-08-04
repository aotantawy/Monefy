const express = require("express");
const router = express.Router();
const User = require("./../model/user");
const Company = require("./../model/company");

router.get("/", async (req, res) => {
  try {
    // check is the cookie exsited
    if (!req.cookies.userCookies) res.redirect("/sign-in");

    const watchList = await User.findOne(
      { userName: req.cookies.userCookies },
      { subscriptionList: 1 }
    );

    const companiesQueryList = watchList.subscriptionList.map(function (item) {
      return { _id: item };
    });

    const companies = await Company.find({ $or: companiesQueryList });

    res.render("companies-list.ejs", {
      title: "Watch List - Stock Prediction",
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
