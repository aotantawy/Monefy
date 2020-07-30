const express = require("express");

const router = express.Router();

const User = require("./../model/user");

router.get("/", (req, res) => {
  if (req.cookies.userCookies) {
    res.redirect("/news");
  }
  res.render("sign-in.ejs", {
    title: "Sign in - Stock Prediction",
    signedUser: false,
    userName: "",
  });
});

router.post("/", async (req, res) => {
  try {
    const NotexsitedUser = await User.findOne({
      userName: req.body.userName,
      password: req.body.password,
    });
    if (!NotexsitedUser) throw "this user not existed ";

    res.cookie("userCookies", req.body.userName, {
      expire: new Date() + 3600000 * 24 * 14,
    });
    res.redirect("/news");
  } catch (err) {
    res.redirect("/sign-in")
    console.log(err);
  }
});

module.exports = router;
