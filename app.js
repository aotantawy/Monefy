require("dotenv").config();
const express = require("express");
const bodyParser = require("body-parser");
const cookieParser = require("cookie-parser");
const mongoose = require("mongoose");
const app = express();

app.set("view engine", "ejs");
app.use(express.static(__dirname + "/public"));
app.use(cookieParser());
app.use(bodyParser.urlencoded({ extended: true }));

mongoose.connect("mongodb://localhost:27017/stock", {
  useNewUrlParser: true,
  useUnifiedTopology: true,
  useCreateIndex: true,
});

app.use("/", require("./routes/index"));
app.use("/sign-up", require("./routes/sign-up"));
app.use("/sign-in", require("./routes/sign-in"));
app.use("/log-out", require("./routes/log-out"));
app.use("/news", require("./routes/news"));
app.use("/search", require("./routes/search"));
app.use("/companies", require("./routes/companies-list"));
app.use("/company-profile", require("./routes/company-profile"));
app.use("/watch-list", require("./routes/watch-list"));
app.use("/history", require("./routes/history-data"));
app.use("/prediction", require("./routes/prediction-data"));
app.use("/top-trend", require("./routes/trend"));

app.listen(8080, () => console.log("server start working on port 8080"));
