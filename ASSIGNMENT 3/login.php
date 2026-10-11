<?php
session_start();

$errors = [];
$username = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = trim((string) ($_POST['username'] ?? ''));
  $password = (string) ($_POST['password'] ?? '');

  if (!preg_match('/\A[a-zA-Z0-9_]{3,20}\z/', $username)) {
  	$errors['username'] = 'Use 3 to 20 letters, numbers, or underscores.';
  }

  if (!preg_match('/\A[\x21-\x7E]{8,64}\z/', $password)) {
  	$errors['password'] = 'Password must be 8 to 64 printable characters with no spaces.';
  }

  if (!$errors) {
  	if ($username === 'alegriajustine23@gmail.com' && $password === 'GeckaArmstrong') {
  		session_regenerate_id(true);
  		$_SESSION['driveCraftAuthenticated'] = true;
  		$_SESSION['driveCraftUsername'] = $username;
  		header('Location: index.php');
  		exit;
  	}

  	$errors['form'] = 'Incorrect username or password. Please try again.';
  }
}

function escapeLoginValue(string $value): string
{
  return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Log in to your Hunter account.">
  <title>Log In</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    :root {
      --ink: #000;
      --muted: #202020;
      --line: rgba(25, 59, 77, .22);
      --white: #fff;
    }

    * { box-sizing: border-box; }
    html, body { min-height: 100%; }

    body {
      margin: 0;
      min-width: 320px;
      color: var(--ink);
      font-family: "Nunito", sans-serif;
      background: #78d4ef url("https://4kwallpapers.com/images/wallpapers/solo-leveling-2880x1800-26864.jpg") center / cover fixed;
    }

    body::before {
      position: fixed;
      inset: 0;
      z-index: -1;
      background: linear-gradient(180deg, rgba(33, 177, 226, .15), rgba(15, 83, 108, .4));
      content: "";
    }

    .page { display: flex; min-height: 100vh; align-items: center; justify-content: center; padding: clamp(1rem, 5vw, 4rem); }
    .account-card { padding: clamp(1.5rem, 5vw, 2.75rem); background: rgba(255, 255, 255, .07); border: 1px solid rgba(255, 255, 255, .73); border-radius: 16px; box-shadow: 0 4px 30px rgba(0, 0, 0, .1); backdrop-filter: blur(1.1px); -webkit-backdrop-filter: blur(1.1px); }
    .brand { margin: 0; text-align: center; }
    .brand a { color: var(--white); text-decoration: none; }
    .brand-mark { display: block; font: 700 clamp(2rem, 6vw, 2.8rem) / .9 "Cormorant Garamond", serif; letter-spacing: .03em; text-shadow: 0 2px 15px rgba(17, 75, 98, .25); }
    .brand-subtitle { display: block; margin-top: .45rem; color: var(--white); font-size: .7rem; font-weight: 700; letter-spacing: .28em; text-transform: uppercase; }
    
    /* Removed .tabs and .tab styles */

    h1 { margin: 1.7rem 0 0; font: 600 2.2rem / 1 "Cormorant Garamond", serif; text-align: center; }
    .intro { margin: .65rem 0 1.7rem; color: var(--white); font-size: .92rem; text-align: center; }
    fieldset { margin: 0; padding: 0; border: 0; }
    .field { margin-bottom: 1rem; }
    label { display: block; margin-bottom: .4rem; color: var(--ink); font-size: .82rem; font-weight: 700; }
    input { width: 100%; padding: .85rem 1rem; border: 1px solid var(--line); border-radius: .65rem; color: var(--ink); background: rgba(255, 255, 255, .7); font: inherit; }
    input::placeholder { color: #6e8790; }
    input:focus { outline: 3px solid rgba(255, 255, 255, .65); border-color: var(--white); }
    .form-row { display: flex; align-items: center; justify-content: space-between; gap: 1rem; margin: .25rem 0 1.5rem; }
    .check { display: flex; align-items: center; gap: .45rem; margin: 0; color: var(--muted); font-size: .78rem; font-weight: 600; }
    .check input { width: auto; accent-color: #287b9a; }
    .form-link { color: var(--ink); font-size: .78rem; font-weight: 700; }
    .field-error { display: block; margin-top: .35rem; color: #a21b1b; font-size: .78rem; font-style: strong; }
    input.is-invalid { border-color: #a21b1b; }
    .form-feedback { margin: 0 0 1rem; font-size: .85rem; font-weight: 700; text-align: center; }
    .form-feedback.error { color: #8c1717; }
    button { width: 100%; padding: .85rem 1rem; border: 0; border-radius: .65rem; color: var(--white); background: #247694; cursor: pointer; font: inherit; font-weight: 700; box-shadow: 0 .45rem 1rem rgba(24, 99, 128, .25); }
    button:hover, button:focus-visible { background: #185a73; }
    .switch { margin: 1.5rem 0 0; color: var(--muted); font-size: .84rem; text-align: center; }
    .switch a { color: var(--ink); font-weight: 700; }

    @media (max-width: 480px) {
      .page { padding: 1rem; }
      .account-card { padding: 1.5rem 1.15rem; }
      .form-row { align-items: flex-start; flex-direction: column; }
    }
  </style>
</head>
<body>
  <main class="page container-fluid row">
    <section class="account-card shadow-lg col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12" aria-label="Account access">
      <header class="brand">
        <a href="login.php"><span class="brand-mark">SOLO LEVELING</span>
        <span class="brand-subtitle">- Beyond the System -</span></a>
      </header>


      <section aria-labelledby="login-title">
        <h1 id="login-title">Welcome back</h1>
        <form id="loginForm" action="landingpage.html" method="get">
          <fieldset>
            <div class="field mb-3">
              <label for="login-username">Username</label>
              <input class="form-control" type="text" id="login-username" name="username" autocomplete="username" placeholder="Enter your username" required>
            </div>
            <div class="field mb-3">
              <label for="login-password">Password</label>
              <input class="form-control" type="password" id="login-password" name="password" autocomplete="current-password" placeholder="Enter your password" required>
            </div>
            <div class="form-row">
              <label class="check form-check-label" for="remember"><input class="form-check-input" type="checkbox" id="remember" name="remember"> Remember me</label>
              <a class="form-link" href="register.php">Need an account?</a>
            </div>
            <p id="login-feedback" class="form-feedback" role="alert" aria-live="polite"></p>
            <button class="btn btn-primary" type="submit">Login</button>
          </fieldset>
        </form>
        <p class="switch">Don&apos;t have an account? <a href="login.php">Register now</a></p>
      </section>
    </section>
  </main>
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.22.1/jquery.validate.min.js" integrity="sha512-qu7dMuIm2f0KcKZ3BOoP4c+Hn+r4E8PbD2Ro4rmKsOyheCxcwhzQpf6SojA76dn+owqfANzfTFUTkGA+HpHjOA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    $(function () {
      // acc for login demo credentials
      const demoUsername = "alegriajustine23@gmail.com";
      const demoPassword = "GeckaArmstrong";

      $("#loginForm").validate({
        rules: {
          username: { required: true },
          password: { required: true }
        },
        messages: {
          username: { required: "Please enter your username." },
          password: { required: "Please enter your password." }
        },
        errorElement: "span",
        errorClass: "field-error",
        highlight: function (element) {
          $(element).addClass("is-invalid");
        },
        unhighlight: function (element) {
          $(element).removeClass("is-invalid");
        },
        submitHandler: function (form) {
          // Check credentials after validation passes.
          const username = $(form).find("[name='username']").val().trim();
          const password = $(form).find("[name='password']").val();
          const feedback = $("#login-feedback");

          if (username === demoUsername && password === demoPassword) {
           
            sessionStorage.setItem("driveCraftAuthenticated", "true");
            sessionStorage.setItem("driveCraftUsername", username);
            window.location.href = "landingpage.php";
            return false;
          }

          feedback.text("Incorrect username or password. Please try again.").addClass("error");
          return false;
        }
      });
    });
  </script>
</body>
</html>