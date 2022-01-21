<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<?php
if (isset($_GET['category_id']) && $_GET['category_id'] != '') {
  include('../connection.php');
  include('../function.php');
  $id = $_GET['category_id'];
  $inform = getCategoryInfo($con, $id);
  foreach ($inform as $info) {
    if ($info['status'] == "Approved") {
?>

      <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title><?= $info['name'] ?> | Athena</title>
        <meta name="HandheldFriendly" content="True" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" type="image/jpg" href="https://athena-dbms.42web.io/account/img/logo.ico" />
        <link rel="preload" href="../../assets/css/appb222.css?v=214a6e5c0e" as="style" />
        <link rel="preload" href="../../assets/js/manifestb222.js?v=214a6e5c0e" as="script" />
        <link rel="preload" href="../../assets/js/vendor/content-api.minb222.js?v=214a6e5c0e" as="script" />
        <link rel="preload" href="../../assets/js/vendorb222.js?v=214a6e5c0e" as="script" />
        <link rel="preload" href="../../assets/js/appb222.js?v=214a6e5c0e" as="script" />
        <link rel="preconnect" href="https://polyfill.io/">
        <link rel="dns-prefetch" href="https://polyfill.io/">

        <link rel="preload" href="../../assets/css/listingb222.css?v=214a6e5c0e" as="style" />


        <style>
          @font-face {
            font-family: 'Source Sans Pro';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: local('Source Sans Pro Regular'), local('SourceSansPro-Regular'),
              url("../../assets/fonts/source-sans-pro/latin/source-sans-pro-regularb222.woff2?v=214a6e5c0e") format('woff2'),
              url("../../assets/fonts/source-sans-pro/latin/source-sans-pro-regularb222.woff?v=214a6e5c0e") format('woff');
          }

          /* source-sans-pro-600 */
          @font-face {
            font-family: 'Source Sans Pro';
            font-style: normal;
            font-weight: 600;
            font-display: swap;
            src: local('Source Sans Pro SemiBold'), local('SourceSansPro-SemiBold'),
              url("../../assets/fonts/source-sans-pro/latin/source-sans-pro-600b222.woff2?v=214a6e5c0e") format('woff2'),
              url("../../assets/fonts/source-sans-pro/latin/source-sans-pro-600b222.woff?v=214a6e5c0e") format('woff');
          }

          /* source-sans-pro-700 */
          @font-face {
            font-family: 'Source Sans Pro';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: local('Source Sans Pro Bold'), local('SourceSansPro-Bold'),
              url("../../assets/fonts/source-sans-pro/latin/source-sans-pro-700b222.woff2?v=214a6e5c0e") format('woff2'),
              url("../../assets/fonts/source-sans-pro/latin/source-sans-pro-700b222.woff?v=214a6e5c0e") format('woff');
          }

          /* iconmoon */
          @font-face {
            font-family: 'icomoon';
            font-weight: normal;
            font-style: normal;
            font-display: swap;
            src: url("../../assets/fonts/icomoon/icomoon7f84.eot?101fc3?v=214a6e5c0e");
            src: url("../../assets/fonts/icomoon/icomoon2c17.eot?101fc3#iefix?v=214a6e5c0e") format('embedded-opentype'),
              url("../../assets/fonts/icomoon/icomoon7f84.ttf?101fc3?v=214a6e5c0e") format('truetype'),
              url("../../assets/fonts/icomoon/icomoon7f84.woff?101fc3?v=214a6e5c0e") format('woff'),
              url("../../assets/fonts/icomoon/icomoon2c17.svg?101fc3#icomoon?v=214a6e5c0e") format('svg');
          }
        </style>

        <link rel="stylesheet" type="text/css" href="../../assets/css/appb222.css?v=214a6e5c0e" media="screen" />
        <link rel="stylesheet" type="text/css" href="../../assets/css/listingb222.css?v=214a6e5c0e" media="screen" />
      </head>

      <body class="tag-template">
        <header class="m-header  js-header">
          <div class="m-mobile-topbar" data-aos="fade-down">
            <button class="m-icon-button in-mobile-topbar js-open-menu" aria-label="Open menu">
              <span class="icon-menu" aria-hidden="true"></span>
            </button>
            <a href="../../index.php" class="m-site-name in-mobile-topbar">
              Athena
            </a>
            <button class="m-icon-button in-mobile-topbar js-open-search" aria-label="Open search">
              <span class="icon-search" aria-hidden="true"></span>
            </button>
          </div>

          <div class="m-menu js-menu">
            <button class="m-icon-button outlined as-close-menu js-close-menu" aria-label="Close menu">
              <span class="icon-close"></span>
            </button>
            <div class="m-menu__main" data-aos="fade-down">
              <div class="l-wrapper">
                <div class="m-nav js-main-nav">
                  <nav class="m-nav__left js-main-nav-left" role="navigation" aria-label="Main menu">
                    <ul>
                      <li class="only-desktop">
                        <a href="../../index.php" class="m-site-name in-desktop-menu">
                          Athena
                        </a>
                      </li>

                      <li class="nav-home">
                        <a href="../../index.php">Blog</a>
                      </li>
                      <li class="nav-about">
                        <a href="../../about/index.php">Know Us !</a>
                      </li>

                      <li class="more">
                        <span>
                          <a href="javascript:void(0);" class="js-open-secondary-menu">
                            More
                            <span class="icon-chevron-down" aria-hidden="true"></span>
                          </a>
                        </span>
                      </li>
                      <li class="submenu-option js-submenu-option">
                        <button class="m-icon-button in-menu-main more js-toggle-submenu" aria-label="Open submenu">
                          <span class="icon-more" aria-hidden="true"></span>
                        </button>
                        <div class="m-submenu js-submenu">
                          <div class="l-wrapper in-submenu">
                            <section class="m-recent-articles">
                              <h3 class="m-submenu-title in-recent-articles">Recent articles</h3>
                              <div class="glide js-recent-slider">
                                <div class="glide__track" data-glide-el="track">
                                  <div class="glide__slides">
                                    <?php
                                    $temp = getFinalPost($con);
                                    foreach (array_slice($temp, 0, 3) as $a) {
                                    ?>
                                      <div class="glide__slide">
                                        <a href="https://athena-dbms.42web.io/post.php?post_link=<?= $a['id'] ?>" class="m-recent-article">
                                          <div class="m-recent-article__picture ">
                                            <img src="<?= $a['header'] ?>" onerror=this.src='../account/img/default.png' loading="lazy" alt="">
                                          </div>
                                          <h3 class="m-recent-article__title js-recent-article-title" title="<?= $a['title'] ?>">
                                            <?= $a['title'] ?>
                                          </h3>
                                          <span class="m-recent-article__date"><?= TimePost($a['created_at']) ?></span>
                                        </a>
                                      </div>
                                    <?php } ?>
                                  </div>
                                </div>
                              </div>
                            </section>
                            <section class="m-tags">
                              <h3 class="m-submenu-title">Tags</h3>
                              <ul>
                                <?php foreach (getAllCategory($con) as $category) { ?>
                                  <li>
                                    <a href="https://athena-dbms.42web.io/tag/posts.php?category_id=<?= $category['id'] ?>"><?= $category['name'] ?></a>
                                  </li>
                                <?php } ?>
                              </ul>
                            </section>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </nav>
                  <div class="m-nav__right">
                    <button class="m-icon-button in-menu-main js-open-search" aria-label="Open search">
                      <span class="icon-search" aria-hidden="true"></span>
                    </button>
                    <div class="m-toggle-darkmode js-tooltip" data-tippy-content="Toggle dark mode" tabindex="0">
                      <label for="toggle-darkmode" class="sr-only">
                        Toggle dark mode
                      </label>
                      <input id="toggle-darkmode" type="checkbox" class="js-toggle-darkmode">
                      <div>
                        <span class="icon-moon moon" aria-hidden="true"></span>
                        <span class="icon-sunny sun" aria-hidden="true"></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div id="secondary-navigation-template" style="display: none;">

            <ul class="m-secondary-menu">
              <li class="nav-data-privacy">
                <a href="../../privacy/index.php">Data &amp; privacy</a>
              </li>
              <li class="nav-contact">
                <a href="../../contact/index.php">Contact</a>
              </li>
              <li class="nav-contact">
                <a href="../../account/login.php">Contribute / Login</a>
              </li>
            </ul>

          </div>
        </header>

        <main class="main-wrap">

          <section class="m-hero no-picture " data-aos="fade">
            <div class="m-hero__content" data-aos="fade-down">
              <h1 class="m-hero-title bigger"><?= $info['name'] ?></h1>
              <div class="m-hero__meta">
                <ul class="m-hero-stats">
                  <li>
                    <?php
                    $posts = getCategPost($con, $id);
                    echo ((count($posts) < 2) ? count($posts) . ' post' : count($posts) . ' posts'); ?> with this tag
                  </li>
                </ul>
              </div>
            </div>
          </section>

          <div class="l-content">
            <div class="l-wrapper" data-aos="fade-up" data-aos-delay="300">
              <div class="l-grid centered">
                <?php
                $posts = getCategPost($con, $id);
                foreach ($posts as $post) {
                  $profiles = AuthorInformation($con, $post['username']);
                  foreach ($profiles as $profile) {
                ?>
                    <article class="m-article-card  post tag-nlp">
                      <div class="m-article-card__picture">
                        <a href="https://athena-dbms.42web.io/post.php?post_link=<?= $post['id'] ?>" class="m-article-card__picture-link" aria-hidden="true" tabindex="-1"></a>
                        <img class="m-article-card__picture-background" onerror=this.src="../account/img/default.png" src="<?= $post['header'] ?>" loading="lazy" alt="">
                        <a href="../../author/profile.php?encryption_id=<?= $profile['username'] ?>" class="m-article-card__author js-tooltip" aria-label="<?= $profile['name'] ?>" data-tippy-content="Posted by <?= $profile['name'] ?> ">
                          <div style="background-image: url(<?= $profile['photo'] ?>);"></div>
                        </a>
                      </div>
                      <div class="m-article-card__info">
                        <a href="https://athena-dbms.42web.io/tag/posts.php?category_id=<?= $post['category_id'] ?>" class="m-article-card__tag"><?= $info['name'] ?></a>
                        <a href="https://athena-dbms.42web.io/post.php?post_link=<?= $post['id'] ?>" class="m-article-card__info-link" aria-label="<?= $post['title'] ?>">
                          <div>
                            <h2 class="m-article-card__title js-article-card-title " title="<?= $post['title'] ?>">
                              <?= $post['title'] ?>
                            </h2>
                          </div>
                          <div class="m-article-card__timestamp">
                            <span><?= TimePost($post['created_at']) ?></span>
                            <span>&bull;</span>
                            <span><?= ReadTime($post['content']) ?></span>
                          </div>
                        </a>
                      </div>
                    </article>
                <?php }
                } ?>
              </div>
            </div>

            <div class="l-wrapper">
              <nav class="m-pagination" aria-label="Pagination">
                <span class="m-pagination__text">Page 1 of 1</span>
              </nav>
            </div>

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
                <li class="nav-contact">
                  <a href="https://athena-dbms.42web.io/account/login.php">Contribute / Login</a>
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
        <script crossorigin="anonymous" src="../../../polyfill.io/v3/polyfill.mina50e.js?features=IntersectionObserver%2CPromise%2CArray.prototype.includes%2CString.prototype.endsWith%2CString.prototype.startsWith%2CObject.assign%2CNodeList.prototype.forEach"></script>
        <script defer src="../../assets/js/manifestb222.js?v=214a6e5c0e"></script>
        <script defer src="../../assets/js/vendor/content-api.minb222.js?v=214a6e5c0e"></script>
        <script defer src="../../assets/js/vendorb222.js?v=214a6e5c0e"></script>
        <script defer src="../../assets/js/appb222.js?v=214a6e5c0e"></script>
  <?php
    } else {
      echo "<script>location.href='https://athena-dbms.42web.io/';</script>";
    }
  }
} else {
  echo "<script>location.href='https://athena-dbms.42web.io/';</script>";
}
  ?>

      </body>

</html>