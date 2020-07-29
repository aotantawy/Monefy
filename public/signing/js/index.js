const countriesAndCode = [
  {
    countryName: "egypt",
    countryCode: "eg",
  },
  {
    countryName: "United States of America",
    countryCode: "us",
  },
  {
    countryName: "United Kingdom",
    countryCode: "gb",
  },
  {
    countryName: "Germany",
    countryCode: "de",
  },
];

// min password is 8 chars
function checkPassword(password) {
  if (password.length > 8) return true;
  return false;
}

function isCountryExist(country) {
  for (let i = 0; i < countriesAndCode.length; i++) {
    if (
      countriesAndCode[i].countryName.toLowerCase() === country.toLowerCase() ||
      countriesAndCode[i].countryCode.toLowerCase() === country.toLowerCase()
    ) {
      return true;
    }
  }
  return false;
}

function mapCountryToCode(country) {
  for (let i = 0; i < countriesAndCode.length; i++) {
    if (
      countriesAndCode[i].countryName.toLowerCase() === country.toLowerCase() ||
      countriesAndCode[i].countryCode.toLowerCase() === country.toLowerCase()
    ) {
      return countriesAndCode[i].countryCode;
    }
  }
}

document.getElementById("sign-up-form").addEventListener("submit", (e) => {
  if (!checkPassword(e.target[3].value)) {
    alert("password should be more that 8 char");
    e.preventDefault();
  }
  if (!isCountryExist(e.target[4].value)) {
    alert("we couldn't found this country");
    e.preventDefault();
  } else {
    e.target[4].value = mapCountryToCode(e.target[4].value);
  }
});
