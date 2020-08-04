const express = require("express");
const router = express.Router();
const User = require("./../model/user");
const Company = require("./../model/company");

router.get("/", async (req, res) => {
  try {
    // check is the cookie exsited
    if (!req.cookies.userCookies) res.redirect("/sign-in");
    const companyID = req.query.companyID;

    let fullCompanyInfo = await Company.findOne({ _id: companyID });

    const isSubscribed = await User.findOne({
      userName: req.cookies.userCookies,
      subscriptionList: companyID,
    });

    res.render("company-profile.ejs", {
      title: fullCompanyInfo.companyName + " - Stock Prediction",
      signedUser: true,
      userName: req.cookies.userCookies,
      fullCompanyInfo,
      isSubscribed,
    });
  } catch (err) {
    res.redirect("/sign-in");
    console.log(err);
  }
});

router.post("/", async (req, res) => {
  try {
    const companyID = req.body.companyID;
    if (req.body.isSubscribed) {
      // need to make unsubscibe
      await User.updateOne(
        { userName: req.cookies.userCookies },
        { $pull: { subscriptionList: companyID } }
      );
    } else {
      await User.updateOne(
        { userName: req.cookies.userCookies },
        { $push: { subscriptionList: companyID } }
      );
    }

    res.redirect("/watch-list");
  } catch (err) {
    res.redirect("/sign-in");
    console.log(err);
  }
});

module.exports = router;
