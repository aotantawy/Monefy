// min password is 8 chars
function checkPassword(password) {
  if (password.length > 8) return true;
  return false;
}

document.getElementById("sign-up-form").addEventListener("submit", (e) => {
  if (!checkPassword(e.target[3].value)) {
    alert("password should be more that 8 char");
    e.preventDefault();
  }
});
