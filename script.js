
document.getElementById("togglePassword").addEventListener("click", function () {
  const pwd = document.getElementById("password");
  pwd.type = pwd.type === "password" ? "text" : "password";
});

document.getElementById("loginBtn").addEventListener("click", function () {
  const phone = document.getElementById("phone").value;
  const password = document.getElementById("password").value;
  const remember = document.getElementById("remember").checked;

  if (phone === "01700000000" && password === "123456") {
    if (remember) localStorage.setItem("rememberMe", phone);
    window.location.href = "dashboard.html";
  } else {
    document.getElementById("message").innerText = "Invalid credentials!";
    document.getElementById("message").style.color = "red";
  }
});

function switchLanguage() {
  alert("বাংলা সংস্করণ শীঘ্রই আসছে!");
}
