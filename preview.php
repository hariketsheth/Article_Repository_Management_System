<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<?php
if (isset($_GET['post_link']) && $_GET['post_link'] != '') {
  include('connection.php');
  include('function.php');
  $url_visit = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
  $ip = getenv('HTTP_X_REAL_IP');
  addVisit($con, $ip, $_SERVER['HTTP_USER_AGENT'], $url_visit);
  $id = $_GET['post_link'];
  $posts = getBlogPost($con, $id);
  foreach ($posts as $post) {
    if (!isset($_SESSION['uname'])) {
      echo "<script>location.href='https://athena-dbms.42web.io/account/welcome/index.php';</script>";
    } else {
      if (($post['username'] == $_SESSION['uname'] && $info['role_2'] == "Contributor") || ($info['role_2'] != "Contributor")) {
        $inform = AuthorInformation($con, $post['username']);
        foreach ($inform as $info) {

?>

          <head>
            <meta charset="utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <title><?= $post['title'] ?></title>
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
            <link rel="stylesheet" href="https://athena-dbms.42web.io/assets/css/emoji.css" />
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
            <link rel="preconnect" href="https://polyfill.io/">
            <link rel="dns-prefetch" href="https://polyfill.io/">

            <link rel="preload" href="../assets/css/postb222.css?v=214a6e5c0e" as="style" />
            <link rel="preload" href="../assets/js/postb222.js?v=214a6e5c0e" as="script" />

            <style>
              /* These font-faces are here to make fonts work if the Ghost instance is installed in a subdirectory */

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
            <link rel="stylesheet" type="text/css" href="../assets/css/postb222.css?v=214a6e5c0e" media="screen" />
          </head>

          <body class="post-template tag-leetcode">

            <header class="m-header with-picture js-header">
              <div class="m-mobile-topbar" data-aos="fade-down">
                <button class="m-icon-button in-mobile-topbar js-open-menu" aria-label="Open menu">
                  <span class="icon-menu" aria-hidden="true"></span>
                </button>
                <a href="../index.php" class="m-site-name in-mobile-topbar">
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
                            <a href="../index.php" class="m-site-name in-desktop-menu">
                              Athena
                            </a>
                          </li>

                          <li class="nav-home">
                            <a href="../index.php">Blog</a>
                          </li>
                          <li class="nav-about">
                            <a href="../about/index.php">Know Us !</a>
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
                    <a href="../privacy/index.php">Data &amp; privacy</a>
                  </li>
                  <li class="nav-contact">
                    <a href="../contact/index.php">Contact</a>
                  </li>
                  <li class="nav-contact">
                    <a href="../account/login.php">Contribute / Login</a>
                  </li>
                </ul>

              </div>
            </header>

            <main class="main-wrap">

              <section class="m-hero with-picture" data-aos="fade">
                <div class="m-hero__picture in-post">
                  <img src="<?= $post['header'] ?>" alt="" onerror=this.src="../account/img/default.png" />
                </div>
              </section>

              <article>
                <div class="l-content in-post">
                  <div class="l-wrapper in-post  js-aos-wrapper" data-aos="fade-up" data-aos-delay="300">
                    <div class="l-post-content  has-subscribe-form js-progress-content">
                      <header class="m-heading">
                        <h1 class="m-heading__title in-post"><?= $post['title'] ?></h1>
                        <div class="m-heading__meta">
                          <a href="../tag/posts.php?category_id=<?= $post['category_id'] ?>" class="m-heading__meta__tag"><?= getCategory($con, $post['category_id']) ?></a>
                          <span class="m-heading__meta__divider" aria-hidden="true">&bull;</span>
                          <span class="m-heading__meta__time">
                            <?php
                            $str = date('Ymd', strtotime($post['created_at']));
                            echo date('F d Y', strtotime($str));
                            ?>
                          </span>
                        </div>
                      </header>
                      <div class="pos-relative js-post-content">
                        <div class="m-share">
                          <div class="m-share__content js-sticky">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=https://athena-dbms.42web.io/post.php?post_link=<?= $post['id'] ?>" class="m-icon-button filled in-share" style="--primary-subtle-color: #5cb85c !important;" target="_blank" rel="noopener" aria-label="Facebook">
                              <span class="icon-facebook" aria-hidden="true"></span>
                            </a>
                            <a href="https://twitter.com/intent/tweet?text=<?= $post['title'] ?>&url=https://athena-dbms.42web.io/post.php?post_link=<?= $post['id'] ?>" class="m-icon-button filled in-share" target="_blank" style="--primary-subtle-color: #5cb85c !important;" rel="noopener" aria-label="Twitter">
                              <span class="icon-twitter" aria-hidden="true"></span>
                            </a>
                            <button style="--primary-subtle-color: #5cb85c !important;" class="m-icon-button filled in-share progress js-scrolltop" aria-label="Scroll to top">
                              <span class="icon-arrow-top" aria-hidden="true"></span>
                              <svg aria-hidden="true">
                                <circle style="stroke: #5cb85c !important;" class="progress-ring__circle js-progress" fill="transparent" r="0" />
                              </svg>
                            </button>
                          </div>
                        </div>
                        <?php
                        echo $post["content"];
                        ?>
                        <br><br>
                        <hr>
                        Select Voice: <select id='voiceList'></select> <br>
                        <?php
                        $speech = htmlspecialchars($post["content"]);
                        $txt = '"' . 'Greetings, Thanks for visiting our portal. You are reading the article with title:- ' . $post["title"] . ' by the author ' . $info['author'] . '. Hope you enjoy reading the article.' . $speech . '"'; ?>
                        <input type="hidden" id='txtInput' value=<?= $txt ?> /> <br><br>
                        <button id='btnSpeak' style="color: inherit;">Speak!</button> &nbsp;&nbsp;
                        <button id='btnStop' style="color: inherit;">Stop!</button>
                        <script>
                          var txtInput = document.querySelector('#txtInput');
                          var voiceList = document.querySelector('#voiceList');
                          var btnSpeak = document.querySelector('#btnSpeak');
                          var btnStop = document.querySelector('#btnStop');
                          var synth = window.speechSynthesis;
                          var voices = [];

                          PopulateVoices();
                          if (speechSynthesis !== undefined) {
                            speechSynthesis.onvoiceschanged = PopulateVoices;
                          }

                          btnSpeak.addEventListener('click', () => {
                            var toSpeak = new SpeechSynthesisUtterance(txtInput.value);
                            var selectedVoiceName = voiceList.selectedOptions[0].getAttribute('data-name');
                            voices.forEach((voice) => {
                              if (voice.name === selectedVoiceName) {
                                toSpeak.voice = voice;
                              }
                            });
                            toSpeak.rate = 0.9;
                            synth.speak(toSpeak);
                          });
                          btnStop.addEventListener('click', () => {
                            synth.cancel();
                          });

                          function PopulateVoices() {
                            voices = synth.getVoices();
                            var selectedIndex = voiceList.selectedIndex < 0 ? 0 : voiceList.selectedIndex;
                            voiceList.innerHTML = '';
                            voices.forEach((voice) => {
                              var listItem = document.createElement('option');
                              listItem.textContent = voice.name;
                              listItem.setAttribute('data-lang', voice.lang);
                              listItem.setAttribute('data-name', voice.name);
                              voiceList.appendChild(listItem);
                            });

                            voiceList.selectedIndex = selectedIndex;
                          }
                        </script>
                        <br><br>

                        <br><br>
                        <h2><strong>Rate this Article: </strong></h2>
                        <div class="wrapper">
                          <input type="radio" name="rate" id="star-1">
                          <input type="radio" name="rate" id="star-2">
                          <input type="radio" name="rate" id="star-3">
                          <input type="radio" name="rate" id="star-4">
                          <input type="radio" name="rate" id="star-5">
                          <div class="content">
                            <div class="outer">
                              <div class="emojis">
                                <li class="slideImg"><img style="border-radius: 100%;" src="../assets/images/emojis/emoji-default.png" alt=""></li>
                                <li><img style="border-radius: 100%;" src="../assets/images/emojis/emoji-1.png" alt=""></li>
                                <li><img style="border-radius: 100%;" src="../assets/images/emojis/emoji-2.png" alt=""></li>
                                <li><img style="border-radius: 100%;" src="../assets/images/emojis/emoji-3.png" alt=""></li>
                                <li><img style="border-radius: 100%;" src="../assets/images/emojis/emoji-4.png" alt=""></li>
                                <li><img style="border-radius: 100%;" src="../assets/images/emojis/emoji-5.png" alt=""></li>
                              </div>
                            </div>
                            <div class="stars">
                              <label for="star-1" class="star-1 fas fa-star"></label>
                              <label for="star-2" class="star-2 fas fa-star"></label>
                              <label for="star-3" class="star-3 fas fa-star"></label>
                              <label for="star-4" class="star-4 fas fa-star"></label>
                              <label for="star-5" class="star-5 fas fa-star"></label>
                            </div>


                          </div>
                          <div class="footer">
                            <span class="text"></span>
                            <span class="numb" style="font-weight: bolder;"></span>
                          </div>
                        </div>
                        <br><br>
                        <section class="m-tags in-post">
                          <h3 class="m-submenu-title">Tags</h3>
                          <ul>
                            <li>
                              <a href="../tag/posts.php?category_id=<?= $post['category_id'] ?>" style="background-color: #5cb85c; color: #fff !important; border-radius: 30px;" class="m-button primary" title="<?= getCategory($con, $post['category_id']) ?>"><?= getCategory($con, $post['category_id']) ?></a>
                            </li>
                          </ul>
                        </section>
                        <div>
                          <?php require('comment.php'); ?></div>
                      </div>

                    </div>
                  </div>
                  <section class="m-subscribe-section">
                    <div class="l-wrapper in-post">
                      <div class="m-subscribe-section__content">
                        <div class="m-subscribe-section__text">
                          <h4 class="m-subscribe-section__title">Subscribe to our newsletter</h4>
                          <p class="m-subscribe-section__description">
                            Get the latest posts delivered right to your inbox.
                          </p>
                        </div>
                        <div class="m-subscribe-section__form">
                          <?php
                          if (isset($_POST['submit1'])) {
                            echo newsletter($con);
                          }
                          ?>
                          <div class="m-subscribe-section__form">
                            <form data-members-form="subscribe" method="POST" action=" " id="newsletter-form" class="m-subscribe-section__container">
                              <div class="m-subscribe__form">
                                <div class="pos-relative">
                                  <label for="newsletter-input" class="sr-only">Your email address</label>
                                  <input data-members-email id="newsletter-input" name="email" class="m-input in-subscribe-section" type="email" placeholder="Your email address" required />
                                </div>
                                <button id="newsletter-button" class="m-button primary block" type="submit" name="submit1">Subscribe</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
                  <section class="m-author">
                    <div class="m-author__content">
                      <div class="m-author__picture">
                        <a href="../author/profile.php?encryption_id=<?= $info['username'] ?>" class="m-author-picture" aria-label="<?= $info['author'] ?>">
                          <div style="background-image: url(<?= $info['photo'] ?>)"></div>
                        </a>
                      </div>
                      <div class="m-author__info">
                        <h4 class="m-author__name">
                          <a href="../author/profile.php?encryption_id=<?= $info['username'] ?>"><?= $info['author'] ?></a>
                        </h4>
                        <p class="m-author__bio"><?= $info['bio'] ?> </p>
                        <ul class="m-author-links">
                          <?php if ($info['website'] != NULL) { ?>
                            <li>
                              <a href="#" target="_blank" rel="noopener" aria-label="Website">
                                <span class="icon-globe" aria-hidden="true"></span>
                              </a>
                            </li>
                          <?php }
                          if ($info['github'] != NULL) { ?>
                            <li>
                              <a href="#" target="_blank" rel="noopener" aria-label="GitHub">
                                <span class="icon-github" aria-hidden="true"></span>
                              </a>
                            </li>
                          <?php }
                          if ($info['twitter'] != NULL) { ?>
                            <li>
                              <a href="#" target="_blank" rel="noopener" aria-label="Twitter">
                                <span class="icon-twitter" aria-hidden="true"></span>
                              </a>
                            </li>
                          <?php }
                          if ($info['facebook'] != NULL) { ?>
                            <li>
                              <a href="#" target="_blank" rel="noopener" aria-label="Facebook">
                                <span class="icon-facebook" aria-hidden="true"></span>
                              </a>
                            </li>
                          <?php }
                          if ($info['instagram'] != NULL) { ?>
                            <li>
                              <a href="#" target="_blank" rel="noopener" aria-label="Instagram">
                                <span class="icon-instagram" aria-hidden="true"></span>
                              </a>
                            </li>
                          <?php }
                          if ($info['linkedin'] != NULL) { ?>
                            <li>
                              <a href="#" target="_blank" rel="noopener" aria-label="Linkedin">
                                <span class="icon-linkedin" aria-hidden="true"></span>
                              </a>
                            </li>
                          <?php } ?>
                        </ul>
                      </div>
                    </div>
                  </section>
                  <section class="m-comments">
                    <div class="l-wrapper in-comments js-comments-iframe">
                      <div id="disqus_thread"></div>
                    </div>
                  </section>
                  <section class="m-recommended">
                    <div class="l-wrapper in-recommended">
                      <h3 class="m-section-title in-recommended">Recommended for you</h3>
                      <div class="m-recommended-articles">
                        <div class="m-recommended-slider glide js-recommended-slider">
                          <div class="glide__track" data-glide-el="track">
                            <div class="glide__slides">
                              <?php
                              $blog = getRandomPost($con, $id);
                              foreach (array_slice($blog, 0, 1) as $recent) {
                                $auth = AuthorInformation($con, $recent['username']);
                                foreach ($auth as $a) {
                              ?>
                                  <div class="m-recommended-slider__item glide__slide">
                                    <article class="m-article-card  post tag">
                                      <div class="m-article-card__picture">
                                        <a href="https://athena-dbms.42web.io/post.php?post_link=<?= $recent['id'] ?>" class="m-article-card__picture-link" aria-hidden="true" tabindex="-1"></a>
                                        <img class="m-article-card__picture-background" src="<?= $recent['header'] ?>" onerror=this.src='../account/img/default.png' loading="lazy" alt="">
                                        <a href="https://athena-dbms.42web.io/author/profile.php?encryption_id=<?= $info['username'] ?>" class="m-article-card__author js-tooltip" aria-label="<?= $a['author'] ?>" data-tippy-content="Posted by <?= $a['author'] ?> ">
                                          <div style="background-image: url(<?= $a['photo'] ?>);"></div>
                                        </a>
                                      </div>
                                      <div class="m-article-card__info">
                                        <a href="https://athena-dbms.42web.io/tag/posts.php?category_id=<?= $recent['category_id'] ?>" class="m-article-card__tag"><?= getCategory($con, $recent['category_id']) ?></a>
                                        <a href="https://athena-dbms.42web.io/post.php?post_link=<?= $recent['id'] ?>" class="m-article-card__info-link" aria-label="<?= $recent['title'] ?>">
                                          <div>
                                            <h2 class="m-article-card__title js-article-card-title " title="<?= $recent['title'] ?>">
                                              <?= $recent['title'] ?>
                                            </h2>
                                          </div>
                                          <div class="m-article-card__timestamp">
                                            <span><?= TimePost($recent['created_at']) ?></span>
                                            <span>&bull;</span>
                                            <span><?= ReadTime($recent['content']) ?></span>
                                          </div>
                                        </a>
                                      </div>
                                    </article>
                                  </div>
                              <?php }
                              } ?>
                            </div>
                          </div>
                          <div data-glide-el="controls" class="glide__arrows js-controls">
                            <button data-glide-dir="<" class="m-icon-button filled in-recommended-articles glide-prev" aria-label="Previous">
                              <span class="icon-arrow-left" aria-hidden="true"></span>
                            </button>
                            <button data-glide-dir=">" class="m-icon-button filled in-recommended-articles glide-next" aria-label="Next">
                              <span class="icon-arrow-right" aria-hidden="true"></span>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
                </div>
              </article>
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
                  <a href="https://twitter.com" target="_blank" rel="noopener" aria-label="Twitter">
                    <span class="icon-twitter" aria-hidden="true"></span>
                  </a>
                  <a href="https://github.com" aria-label="GitHub">
                    <span class="icon-github" aria-hidden="true"></span>
                  </a>
                  <a href="https://www.linkedin.com/" aria-label="LinkedIn">
                    <span class="icon-linkedin" aria-hidden="true"></span>
                  </a>
                  <a href="https://www.facebook.com" aria-label="Facebook">
                    <span class="icon-facebook" aria-hidden="true"></span>
                  </a>
                  <a href="https://www.instagram.com/" aria-label="Instagram">
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
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-60315b469e32d063"></script>
            <script defer src="../assets/js/vendorb222.js?v=214a6e5c0e"></script>
            <script defer src="../assets/js/appb222.js?v=214a6e5c0e"></script>
            <script defer src="../assets/js/postb222.js?v=214a6e5c0e"></script>
  <?php
        }
      } else {
        echo "<script>location.href='https://athena-dbms.42web.io/account/welcome/index.php';</script>";
      }
    }
  }
} else {
  echo "<script>location.href='https://athena-dbms.42web.io/account/welcome/index.php';</script>";
}
  ?>
          </body>

</html>