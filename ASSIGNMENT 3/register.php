<?php
$errors = [];
$name = '';
$email = '';
$feedback = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$name = trim((string) ($_POST['name'] ?? ''));
	$email = trim((string) ($_POST['email'] ?? ''));
	$password = (string) ($_POST['password'] ?? '');
	$confirmPassword = (string) ($_POST['confirmPassword'] ?? '');

	if (!preg_match('/\A[\p{L}][\p{L}\p{M} \'-]{2,19}\z/u', $name)) {
		$errors['name'] = 'Enter a 3 to 20 character name using letters, spaces, apostrophes, or hyphens.';
	}

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = 'Enter a valid email address.';
	}

	if (!preg_match('/\A[\x21-\x7E]{8,64}\z/', $password)) {
		$errors['password'] = 'Password must be 8 to 64 printable characters with no spaces.';
	}

	if ($confirmPassword !== $password) {
		$errors['confirmPassword'] = 'Your passwords must match.';
	}

	if (!$errors) {
		$feedback = 'Your registration details are valid. This demo does not save accounts; use username alegriajustine23@gmail.com and password GeckaArmstrong to log in.';
	}
}

function escapeRegisterValue(string $value): string
{
	return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Create a DriveCraft car enthusiast account.">
  <title>Register</title>
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
    label[for$="-email"] { color: var(--black); }
    input { width: 100%; padding: .85rem 1rem; border: 1px solid var(--line); border-radius: .65rem; color: var(--ink); background: rgba(255, 255, 255, .7); font: inherit; }
    input::placeholder { color: #6e8790; }
    input:focus { outline: 3px solid rgba(255, 255, 255, .65); border-color: var(--white); }
    button { width: 100%; padding: .85rem 1rem; border: 0; border-radius: .65rem; color: var(--white); background: #247694; cursor: pointer; font: inherit; font-weight: 700; box-shadow: 0 .45rem 1rem rgba(24, 99, 128, .25); }
    button:hover, button:focus-visible { background: #185a73; }
    .switch { margin: 1.5rem 0 0; color: var(--muted); font-size: .84rem; text-align: center; }
    .switch a { color: var(--ink); font-weight: 700; }
    .terms { margin: 1rem 0 0; color: var(--muted); font-size: .72rem; line-height: 1.5; text-align: center; }
    .field-error { display: block; margin-top: .35rem; color: #b42318; font-size: .78rem; font-style: strong; }
    input.is-invalid { border-color: #b42318; }
    .form-feedback { margin: 0 0 1rem; color: #14532d; font-size: .85rem; font-weight: 700; text-align: center; }

    @media (max-width: 480px) {
      .page { padding: 1rem; }
      .account-card { padding: 1.5rem 1.15rem; }
    }
  </style>
</head>
<body>
  <main class="page container-fluid row">
    <section class="account-card shadow-lg col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12" aria-label="Create an account">
      <header class="brand">
        <a href="login.php"><span class="brand-mark">SOLO LEVELING</span>
        <span class="brand-subtitle">- Beyond the System -</span></a>
      </header>


      <section aria-labelledby="register-title">
        <h1 id="register-title">Create an account</h1>
        
        <form id="registerForm" action="register.html" method="post">
          <fieldset>
            <div class="field mb-3">
              <label for="register-name">Full name</label>
              <input class="form-control" type="text" id="register-name" name="name" autocomplete="name" placeholder="Your full name" required>
            </div>
            <div class="field mb-3">
              <label for="register-email">Email address</label>
              <input class="form-control" type="email" id="register-email" name="email" autocomplete="email" placeholder="example@email.com" required>
            </div>
            <div class="field mb-3">
              <label for="register-password">Create a password</label>
              <input class="form-control" type="password" id="register-password" name="password" autocomplete="new-password" placeholder="At least 8 characters" minlength="8" required>
            </div>
            <div class="field mb-3">
              <label for="register-confirm-password">Confirm password</label>
              <input class="form-control" type="password" id="register-confirm-password" name="confirmPassword" autocomplete="new-password" placeholder="Enter your password again" required>
            </div>
            <p id="register-feedback" class="form-feedback" role="status" aria-live="polite"></p>
            <button class="btn btn-primary" type="submit">Create account</button>
          </fieldset>
        </form>
        <p class="terms">By creating an account, you agree to our terms and privacy policy.</p>
        <p class="switch">Already have an account? <a href="login.php">Login here</a></p>
      </section>
    </section>
  </main>
  <!-- Load jQuery before its validation plugin. -->
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.22.1/jquery.validate.min.js" integrity="sha512-qu7dMuIm2f0KcKZ3BOoP4c+Hn+r4E8PbD2Ro4rmKsOyheCxcwhzQpf6SojA76dn+owqfANzfTFUTkGA+HpHjOA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    $(function () {
      $("#registerForm").validate({
        rules: {
          // Require valid details and matching passwords.
          name: { required: true, minlength: 3, maxlength: 20 },
          email: { required: true, email: true },
          password: { required: true, minlength: 8 },
          confirmPassword: { required: true, equalTo: "#register-password" }
        },
        messages: {
          name: {
            required: "Please enter your full name.",
            minlength: "Your name must be at least 3 characters.",
            maxlength: "Your name must be 20 characters or fewer."
          },
          email: {
            required: "Please enter your email address.",
            email: "Please enter a valid email address."
          },
          password: {
            required: "Please create a password.",
            minlength: "Your password must be at least 8 characters."
          },
          confirmPassword: {
            required: "Please confirm your password.",
            equalTo: "Your passwords must match."
          }
        },
        errorElement: "span",
        errorClass: "field-error",
        highlight: function (element) {
          $(element).addClass("is-invalid");
        },
        unhighlight: function (element) {
          $(element).removeClass("is-invalid");
        },
       submitHandler: function () {
  $("#register-feedback").text("Your registration details are valid. Your email is alegriajustine23@gmail.com and your password is GeckaArmstrong.");
  return false;
}
      });
    });
  </script>
</body>
</html>