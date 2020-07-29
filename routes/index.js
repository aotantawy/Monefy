const express = require("express");
const router = express.Router();

router.get("/", (req, res) => {
  res.render("index.ejs", { title: "Home - Stock Prediction" });
});

module.exports = router;
