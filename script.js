function togglePass() {
    const password = document.getElementById("password");
    const toggle = document.getElementById("togglePassword");
    if (password.type === "password") {
        password.type = "text";
        toggle.textContent = "🙈";
    } else {
        password.type = "password";
        toggle.textContent = "👁️";
    }
}

function switchLang() {
    alert("Language switched to Bangla");
}

function login() {
    const phone = document.getElementById("phone").value;
    const pass = document.getElementById("password").value;
    const alertBox = document.getElementById("alert");
    const spinner = document.getElementById("spinner");

    const savedPhone = localStorage.getItem("userPhone") || "018";
    const savedPass = localStorage.getItem("userPass") || "1234";

    alertBox.textContent = "";
    if (phone === savedPhone && pass === savedPass) {
        spinner.style.display = "block";
        localStorage.setItem("rememberPhone", document.getElementById("remember").checked ? phone : "");
        setTimeout(() => {
            window.location.href = "dashboard.html";
        }, 1500);
    } else {
        alertBox.textContent = "Invalid phone or password!";
    }
}

window.onload = function() {
    const savedPhone = localStorage.getItem("rememberPhone");
    if (savedPhone) {
        document.getElementById("phone").value = savedPhone;
        document.getElementById("remember").checked = true;
    }
}