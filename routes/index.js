const express = require("express");
const router = express.Router();

router.get("/", (req, res) => {
  let signedUser = false;
  let userName = "";
  if (req.cookies.userCookies) {
    signedUser = true;
    userName = req.cookies.userCookies;
  }
  res.render("index.ejs", {
    title: "Home - Stock Prediction",
    signedUser,
    userName,
  });
});

module.exports = router;
