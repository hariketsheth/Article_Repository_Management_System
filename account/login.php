<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=0.9" />
    <link
      rel="icon"
      type="image/jpg"
      href="https://athena-dbms.42web.io/account/img/logo.ico"
    />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="css/sweetalert2.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <link rel="stylesheet" href="css/style.css" />
    <script>
      $(document).bind("contextmenu", function (e) {
        e.preventDefault();
      });
      $(document).keydown(function (e) {
        if (e.which === 123) {
          return false;
        }
      });
    </script>
    <script language="text/javascript">
                    document.onmousedown=disableclick;
      		  status="Right Click Disabled";
      		  function disableclick(event){
      			  if(event.button==2) {
      				  alert(status);
      				  return false; }
      		  }
      .
    </script>
    <script>
      document.addEventListener("contextmenu", (event) =>
        event.preventDefault()
      );
      document.onkeydown = function (e) {
        if (event.keyCode == 123) {
          return false;
        }
        if (e.ctrlKey && e.shiftKey && e.keyCode == "I".charCodeAt(0)) {
          return false;
        }
        if (e.ctrlKey && e.shiftKey && e.keyCode == "J".charCodeAt(0)) {
          return false;
        }
        if (e.ctrlKey && e.keyCode == "U".charCodeAt(0)) {
          return false;
        }
      };
    </script>

    <title>Blog | Athena</title>
  </head>
    <style>
    @font-face {
        font-family: Orion;
        src: url(../font/Orion.otf);
    }
    </style>
  <body oncontextmenu="return false;">

    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form
            action="welcome.php"
            class="sign-in-form"
            id="loginform"
            method="POST"
          >
            <img src="img/logo.png" height="150" width="150" style="border-radius: 100%;" />
            <a style="text-decoration: none; font-weight: bolder; margin: 10px;" href="https://athena-dbms.42web.io/">Continue to Blog</a>
            <h2 class="title" style="font-family: Orion; font-size: 1.5rem; word-spacing: -10px;">Are you Ready?</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>

              <input
                type="text"
                placeholder="Username"
                name="uname"
                autocomplete="off"
                autocapitalize="off"
                id="username"
              />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input
                type="password"
                placeholder="Password"
                name="pass"
                autocomplete="off"
                id="password"
              />
            </div>
            <small>
              Please Login using details sent on the registered mails
            </small>
            <br />
            <input
              type="submit"
              value="Login"
              name="login"
              class="bxtn solid"
              id="submit"
            />
          </form>
          <?php 
        require_once  ('connection.php');
        ?>
          <form class="sign-up-form" action="signup.php" method="POST">
            <h2 class="title" style="font-family: Orion; font-size: 1.8rem; word-spacing: -10px;">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-feather"></i>
              <input
                type="text"
                placeholder="First Name"
                autocomplete="off"
                autocapitalize="off"
                name="name1"
                required
              />
            </div>
            <div class="input-field">
              <i class="fas fa-user-circle"></i>
              <input
                type="text"
                placeholder="Full Name"
                autocomplete="off"
                autocapitalize="off"
                name="name2"
                required
              />
            </div>
            <div class="input-field">
              <i class="far fa-envelope"></i>
              <input
                type="email"
                placeholder="Email"
                autocomplete="off"
                autocapitalize="off"
                name="email1"
                required
              />
            </div>
                        <div class="input-field">
              <i class="fas fa-user-check"></i>
              <select id="gender" name="gender">
                <option value ="choice">Gender: </option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="others">Others</option>
                </select>
            </div>
            <div class="input-field">
              <i class="fas fa-phone"></i>
              <input
                type="tel"
                placeholder="10-Digit Phone Number"
                autocomplete="off"
                autocapitalize="off"
                name="phone1"
                required
              />
            
            </div>

            <script
              src="https://www.google.com/recaptcha/api.js"
              async
              defer
            ></script>
            <div
              class="g-recaptcha"
              data-sitekey="<?=CONTACTFORM_RECAPTCHA_SITE_KEY?>"
            ></div>
            <input type="submit" class="bxtn" value="Sign up" name="submit1" />
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Contribute to Athena?</h3>
            <p>
              If this is your first time contributing to our community, Kindly
              proceed to Sign Up
            </p>
            <button class="bxtn transparent" id="sign-up-btn">Sign up</button>
          </div>
          <img style="height: 350px;" src="img/log.png" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Already Registered with Us ?</h3>
            <p>
              Those who have given their valuable write-ups and blogs before, Need
              not to signup again ! Sign In with login details sent on your mail
            </p>
            <button class="bxtn transparent" id="sign-in-btn">Sign in</button>
          </div>
          <img width="300" height="300" src="img/register.png" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="js/app.js"></script>
  </body>
</html>
