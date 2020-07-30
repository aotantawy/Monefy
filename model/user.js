const mongoose = require("mongoose");

const userSchema = {
  userName: {
    type: String,
    required: true,
    unique: true,
  },
  firstName: {
    type: String,
    required: true,
  },
  lastName: {
    type: String,
    required: true,
  },
  password: {
    type: String,
    required: true,
  },
  country: {
    type: String,
    required: true,
  },
  subscriptionList: [
    {
      companyID: {
        type: String,
        required: true,
      },
    },
  ],
};

module.exports = User = mongoose.model("User", userSchema);
