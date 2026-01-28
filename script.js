const toggleBtn = document.getElementById("darkModeToggle");

toggleBtn.addEventListener("click", () => {
  document.body.classList.toggle("dark-mode");

  if (document.body.classList.contains("dark-mode")) {
    toggleBtn.textContent = "☀️ Light Mode";
  } else {
    toggleBtn.textContent = "🌙 Dark Mode";
  }
});

function login() {
      const username = document.getElementById("username").value;
      const password = document.getElementById("password").value;
      const message = document.getElementById("message");

      // Simple demo credentials
      const correctUsername = "admin";
      const correctPassword = "1234";

      if (username === "" || password === "") {
        message.textContent = "Please fill in all fields";
        message.className = "error";
        return;
      }

      if (username === correctUsername && password === correctPassword) {
        message.textContent = "Login successful!";
        message.className = "success";
      } else {
        message.textContent = "Invalid username or password";
        message.className = "error";
      }
    }

function register() {
    const username = document.getElementById("newUsername").value;
    const email = document.getElementById("newEmail").value;
    const password = document.getElementById("newPassword").value;
    const confirm = document.getElementById("confirmPassword").value;
    const message = document.getElementById("registerMessage");
    
    if (!username || !email || !password || !confirm) {
        message.textContent = "Please fill in all fields";
        message.className = "error";
        return;
    }
    
    if (password !== confirm) {
        message.textContent = "Passwords do not match";
        message.className = "error";
        return;
    }
    
    message.textContent = "Registration successful! You can now log in.";
    message.className = "success";
}

function login() {
  const username = document.getElementById("username").value;
  const password = document.getElementById("password").value;
  const message = document.getElementById("message");

  // Example login credentials (you can change these)
  if (username === "admin" && password === "1234") {
    message.style.color = "green";
    message.innerText = "Login successful! Redirecting...";

    // Redirect to home.html after 1 second
    setTimeout(() => {
      window.location.href = "home.html";
    }, 1000);

  } else {
    message.style.color = "red";
    message.innerText = "Invalid username or password!";
  }
}
