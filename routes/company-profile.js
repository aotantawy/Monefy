const express = require("express");
const router = express.Router();
const Company = require("./../model/company");

router.get("/:companyID", async (req, res) => {
  try {
    // check is the cookie exsited
    if (!req.cookies.userCookies) res.redirect("/sign-in");
    const companyID = req.params.companyID;

    const fullCompanyInfo = await Company.findOne({ _id: companyID });

    console.log(fullCompanyInfo);

    res.render("company-profile.ejs", {
      title: "Companies - Stock Prediction",
      signedUser: true,
      userName: req.cookies.userCookies,
      fullCompanyInfo,
    });
  } catch (err) {
    res.redirect("/sign-in");
    console.log(err);
  }
});

module.exports = router;
