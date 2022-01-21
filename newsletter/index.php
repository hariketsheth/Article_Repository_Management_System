<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Newsletter</title>
  <meta name="HandheldFriendly" content="True" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/jpg" href="https://athena-dbms.42web.io/account/img/logo.ico" />
  <link rel="preload" href="../assets/css/appb222.css?v=214a6e5c0e" as="style" />
  <link rel="preload" href="../assets/js/manifestb222.js?v=214a6e5c0e" as="script" />
  <link rel="preload" href="../assets/js/vendor/content-api.minb222.js?v=214a6e5c0e" as="script" />
  <link rel="preload" href="../assets/js/vendorb222.js?v=214a6e5c0e" as="script" />
  <link rel="preload" href="../assets/js/appb222.js?v=214a6e5c0e" as="script" />
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://athena-dbms.42web.io/account/js/sweetalert2.all.min.js"> </script>
  <script src="https://athena-dbms.42web.io/account/js/jquery-3.4.1.min.js"></script>
  <link rel="stylesheet" href="https://athena-dbms.42web.io/account/css/sweetalert2.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <link rel="preconnect" href="https://polyfill.io/">
  <link rel="dns-prefetch" href="https://polyfill.io/">

  <link rel="preload" href="../assets/css/newsletterb222.css?v=214a6e5c0e" as="style" />


  <style>
    /* source-sans-pro-regular */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: normal;
      font-weight: 400;
      font-display: swap;
      src: local('Source Sans Pro Regular'), local('SourceSansPro-Regular'),
        url("../assets/fonts/source-sans-pro/latin/source-sans-pro-regularb222.woff2?v=214a6e5c0e") format('woff2'),
        url("../assets/fonts/source-sans-pro/latin/source-sans-pro-regularb222.woff?v=214a6e5c0e") format('woff');
    }

    /* source-sans-pro-600 */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: normal;
      font-weight: 600;
      font-display: swap;
      src: local('Source Sans Pro SemiBold'), local('SourceSansPro-SemiBold'),
        url("../assets/fonts/source-sans-pro/latin/source-sans-pro-600b222.woff2?v=214a6e5c0e") format('woff2'),
        url("../assets/fonts/source-sans-pro/latin/source-sans-pro-600b222.woff?v=214a6e5c0e") format('woff');
    }

    /* source-sans-pro-700 */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: normal;
      font-weight: 700;
      font-display: swap;
      src: local('Source Sans Pro Bold'), local('SourceSansPro-Bold'),
        url("../assets/fonts/source-sans-pro/latin/source-sans-pro-700b222.woff2?v=214a6e5c0e") format('woff2'),
        url("../assets/fonts/source-sans-pro/latin/source-sans-pro-700b222.woff?v=214a6e5c0e") format('woff');
    }

    /* iconmoon */
    @font-face {
      font-family: 'icomoon';
      font-weight: normal;
      font-style: normal;
      font-display: swap;
      src: url("../assets/fonts/icomoon/icomoon7f84.eot?101fc3?v=214a6e5c0e");
      src: url("../assets/fonts/icomoon/icomoon2c17.eot?101fc3#iefix?v=214a6e5c0e") format('embedded-opentype'),
        url("../assets/fonts/icomoon/icomoon7f84.ttf?101fc3?v=214a6e5c0e") format('truetype'),
        url("../assets/fonts/icomoon/icomoon7f84.woff?101fc3?v=214a6e5c0e") format('woff'),
        url("../assets/fonts/icomoon/icomoon2c17.svg?101fc3#icomoon?v=214a6e5c0e") format('svg');
    }
  </style>

  <link rel="stylesheet" type="text/css" href="../assets/css/appb222.css?v=214a6e5c0e" media="screen" />

  <link rel="stylesheet" type="text/css" href="../assets/css/newsletterb222.css?v=214a6e5c0e" media="screen" />
</head>

<body class="page-template page-newsletter">
  <?php
  include('../connection.php');
  include('../function.php');
  if (isset($_POST['submit1'])) {
    echo newsletter($con);
  }
  ?>
  <main>
    <div class="l-wrapper" data-aos="fade-down">
      <a href="../index.php" class="m-back">
        <span class="m-back__icon icon-arrow-left"></span>
        <span>Back to home</span>
      </a>
    </div>

    <div class="l-fullscreen">
      <section class="l-fullscreen__content in-subscribe-page" data-aos="fade-up" data-aos-delay="300">
        <div>
          <header class="m-heading in-subscribe-page">
            <h1 class="m-heading__title">
              Subscribe to Athena
            </h1>
            <p class="m-heading__description in-subscribe-page">
              Stay up to date! Get all the latest &amp; greatest posts delivered straight to your inbox.
            </p>
          </header>

          <div class="m-subscribe-section__form">
            <form data-members-form="subscribe" method="POST" action=" " id="newsletter-form" class="m-subscribe-section__container">
              <div class="m-subscribe__form">
                <div class="pos-relative">
                  <label for="newsletter-input" class="sr-only">Your email address</label>
                  <input data-members-email id="newsletter-input" name="email" class="m-input in-subscribe-section" type="email" placeholder="Your email address" required />
                </div>
                <button id="newsletter-button" class="m-button primary block" name="submit1" type="submit">Subscribe</button>
              </div>
            </form>
          </div>
        </div>
      </section>
    </div>
  </main>


  <footer class="m-footer">
    <div class="m-footer__content">
      <nav class="m-footer__nav-secondary" role="navigation" aria-label="Secondary menu in footer">
        <ul class="m-secondary-menu">
          <li class="nav-data-privacy">
            <a href="privacy/index.php">Data &amp; privacy</a>
          </li>
          <li class="nav-contact">
            <a href="contact/index.php">Contact</a>
          </li>
        </ul>
      </nav>
      <nav class="m-footer-social">
        <a href="https://twitter.com/" target="_blank" rel="noopener" aria-label="Twitter">
          <span class="icon-twitter" aria-hidden="true"></span>
        </a>
        <a href="https://github.com/" aria-label="GitHub">
          <span class="icon-github" aria-hidden="true"></span>
        </a>
        <a href="https://www.linkedin.com/company/" aria-label="LinkedIn">
          <span class="icon-linkedin" aria-hidden="true"></span>
        </a>
        <a href="https://www.facebook.com/athena.help/" aria-label="Facebook">
          <span class="icon-facebook" aria-hidden="true"></span>
        </a>
        <a href="https://www.instagram.com/athena.help/" aria-label="Instagram">
          <span class="icon-instagram" aria-hidden="true"></span>
        </a>
      </nav>
      <p class="m-footer-copyright">
        <span>Athena &copy; 2021</span>
        <span>&nbsp; &bull; &nbsp;</span>
      </p>
    </div>
  </footer>
  <script crossorigin="anonymous" src="../../polyfill.io/v3/polyfill.mina50e.js?features=IntersectionObserver%2CPromise%2CArray.prototype.includes%2CString.prototype.endsWith%2CString.prototype.startsWith%2CObject.assign%2CNodeList.prototype.forEach"></script>
  <script defer src="../assets/js/manifestb222.js?v=214a6e5c0e"></script>
  <script defer src="../assets/js/vendor/content-api.minb222.js?v=214a6e5c0e"></script>
  <script defer src="../assets/js/vendorb222.js?v=214a6e5c0e"></script>
  <script defer src="../assets/js/appb222.js?v=214a6e5c0e"></script>
</body>

</html>