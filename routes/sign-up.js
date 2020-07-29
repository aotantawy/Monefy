const express = require("express");

const router = express.Router();

const User = require("./../model/user");

router.get("/", (req, res) => {
  res.render("sign-up.ejs", { title: "Sign up - Stock Prediction" });
});

router.post("/", async (req, res) => {
  try {
    const NotexsitedUser = await User.findOne({ userName: req.body.userName });
    if (NotexsitedUser) throw "this user existed ";

    const userObject = {
      userName: req.body.userName,
      firstName: req.body.firstName,
      lastName: req.body.lastName,
      password: req.body.password,
      country: req.body.country,
    };
    const createUser = new User(userObject);

    createUser.save();

    res.cookie("userCookies", req.body.userName, {
      expire: new Date() + 3600000 * 24 * 14,
    });
    res.redirect("/news");
  } catch (err) {
    console.log(err);
  }
});

module.exports = router;
