const express = require("express");

const router = express.Router();

router.get("/", (req, res) => {
  res.clearCookie("userCookies");
  res.redirect("/sign-in");
});

module.exports = router;
