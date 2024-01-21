<!DOCTYPE html>
<html lang="en">
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <?php
            include ('connection.php');
          include ('function.php'); 
     $url_visit = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
     $ip = getenv('HTTP_X_REAL_IP');
     addVisit($con, $ip , $_SERVER['HTTP_USER_AGENT'], $url_visit); 
          $posts = getFinalPost($con);
          $count=1;
            
          ?>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Athena</title>
    <meta name="HandheldFriendly" content="True" />
    <link rel="icon" type="image/jpg" href="https://pdc-fallsem.42web.io/account/img/logo.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=0.7" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preload" href="assets/css/appb222.css?v=214a6e5c0e" as="style" />
    <link rel="preload" href="assets/css/font-awesome.min.css" as="style" />
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
    <meta http-equiv="Pragma" content="no-cache"/>
    <meta http-equiv="Expires" content="0"/>
    <link
      rel="preload"
      href="assets/js/manifestb222.js?v=214a6e5c0e"
      as="script"
    />
    <link
      rel="preload"
      href="assets/js/vendor/content-api.minb222.js?v=214a6e5c0e"
      as="script"
    />
    <link
      rel="preload"
      href="assets/js/vendorb222.js?v=214a6e5c0e"
      as="script"
    />
    <link rel="preload" href="assets/js/appb222.js?v=214a6e5c0e" as="script" />
    <link rel="preconnect" href="https://polyfill.io/" />
    <link rel="dns-prefetch" href="https://polyfill.io/" />
    <link
      rel="preload"
      href="assets/css/homeb222.css?v=214a6e5c0e"
      as="style"
    />
    <link
      rel="preload"
      href="assets/css/listingb222.css?v=214a6e5c0e"
      as="style"
    />
    <link rel="preload" href="assets/js/homeb222.js?v=214a6e5c0e" as="script" />
    <style>
      @font-face {
        font-family: "Source Sans Pro";
        font-style: normal;
        font-weight: 400;
        font-display: swap;
        src: local("Source Sans Pro Regular"), local("SourceSansPro-Regular"),
          url("assets/fonts/source-sans-pro/latin/source-sans-pro-regularb222.woff2?v=214a6e5c0e")
            format("woff2"),
          url("assets/fonts/source-sans-pro/latin/source-sans-pro-regularb222.woff?v=214a6e5c0e")
            format("woff");
      }

      /* source-sans-pro-600 */
      @font-face {
        font-family: "Source Sans Pro";
        font-style: normal;
        font-weight: 600;
        font-display: swap;
        src: local("Source Sans Pro SemiBold"), local("SourceSansPro-SemiBold"),
          url("assets/fonts/source-sans-pro/latin/source-sans-pro-600b222.woff2?v=214a6e5c0e")
            format("woff2"),
          url("assets/fonts/source-sans-pro/latin/source-sans-pro-600b222.woff?v=214a6e5c0e")
            format("woff");
      }

      /* source-sans-pro-700 */
      @font-face {
        font-family: "Source Sans Pro";
        font-style: normal;
        font-weight: 700;
        font-display: swap;
        src: local("Source Sans Pro Bold"), local("SourceSansPro-Bold"),
          url("assets/fonts/source-sans-pro/latin/source-sans-pro-700b222.woff2?v=214a6e5c0e")
            format("woff2"),
          url("assets/fonts/source-sans-pro/latin/source-sans-pro-700b222.woff?v=214a6e5c0e")
            format("woff");
      }

      /* iconmoon */
      @font-face {
        font-family: "icomoon";
        font-weight: normal;
        font-style: normal;
        font-display: swap;
        src: url("assets/fonts/icomoon/icomoon7f84.eot?101fc3?v=214a6e5c0e");
        src: url("assets/fonts/icomoon/icomoon2c17.eot?101fc3#iefix?v=214a6e5c0e")
            format("embedded-opentype"),
          url("assets/fonts/icomoon/icomoon7f84.ttf?101fc3?v=214a6e5c0e")
            format("truetype"),
          url("assets/fonts/icomoon/icomoon7f84.woff?101fc3?v=214a6e5c0e")
            format("woff"),
          url("assets/fonts/icomoon/icomoon2c17.svg?101fc3#icomoon?v=214a6e5c0e")
            format("svg");
      }
    </style>

    <link
      rel="stylesheet"
      type="text/css"
      href="assets/css/appb222.css?v=214a6e5c0e"
      media="screen"
    />

    <link
      rel="stylesheet"
      type="text/css"
      href="assets/css/homeb222.css?v=214a6e5c0e"
      media="screen"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="assets/css/listingb222.css?v=214a6e5c0e"
      media="screen"
    />
  </head>
  <body class="home-template">
    <header class="m-header js-header">
      <div class="m-mobile-topbar" data-aos="fade-down">
        <button
          class="m-icon-button in-mobile-topbar js-open-menu"
          aria-label="Open menu"
        >
          <span class="icon-menu" aria-hidden="true"></span>
        </button>
        <a href="index.php" class="m-site-name in-mobile-topbar">
          Athena
        </a>
      </div>

      <div class="m-menu js-menu">
        <button
          class="m-icon-button outlined as-close-menu js-close-menu"
          aria-label="Close menu"
        >
          <span class="icon-close"></span>
        </button>
        <div class="m-menu__main" data-aos="fade-down">
          <div class="l-wrapper">
            <div class="m-nav js-main-nav">
              <nav
                class="m-nav__left js-main-nav-left"
                role="navigation"
                aria-label="Main menu"
              >
                <ul>
                  <li class="only-desktop">
                    <a href="index.php" class="m-site-name in-desktop-menu">
                      Athena
                    </a>
                  </li>

                  <li class="nav-home nav-current">
                    <a href="index.php">Blog</a>
                  </li>
                  <li class="nav-about">
                    <a href="about/index.php">Know Us !</a>
                  </li>

                  <li class="more">
                    <span>
                      <a
                        href="javascript:void(0);"
                        class="js-open-secondary-menu"
                      >
                        Dive more
                        <span
                          class="icon-chevron-down"
                          aria-hidden="true"
                        ></span>
                      </a>
                    </span>
                  </li>
                  <li class="submenu-option js-submenu-option">
                    <button
                      class="m-icon-button in-menu-main more js-toggle-submenu"
                      aria-label="Open submenu"
                    >
                      <span class="icon-more" aria-hidden="true"></span>
                    </button>
                    <div class="m-submenu js-submenu">
                      <div class="l-wrapper in-submenu">
                        <section class="m-recent-articles">
                          <h3 class="m-submenu-title in-recent-articles">
                            Recent Blogs
                          </h3>
                          <div class="glide js-recent-slider">
                            <div class="glide__track" data-glide-el="track">
                              <div class="glide__slides">
                            <?php foreach(array_slice($posts, 0, 3) as $recent ){ ?>
                                <div class="glide__slide">
                                  <a
                                    href="post.php?post_link=<?=$recent['id']?>"
                                    class="m-recent-article"
                                  >
                                    <div class="m-recent-article__picture">
                                      <img
                                        src="<?=$recent['header']?>"
                                        loading="lazy"
                                        alt=""
                                        onerror=this.src="../account/img/default.png"
                                      />
                                    </div>
                                    <h3
                                      class="
                                        m-recent-article__title
                                        js-recent-article-title
                                      "
                                      title="<?=$recent['title']?>"
                                    >
                                      <?=$recent['title']?>
                                    </h3>
                                    <span class="m-recent-article__date"
                                      ><?=TimePost($recent['created_at'])?></span
                                    >
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
                          <?php $categories = getAllCategory($con); 
                          foreach($categories as $category){
                          ?>
                            <li>
                              <a href="tag/posts.php?category_id=<?=$category['id']?>"><?=$category['name']?></a>
                            </li>
                          <?php } ?>
                          </ul>
                        </section>
                      </div>
                    </div>
                  </li>
                </ul>
              </nav>
              <!--
  <div class="form-outline">
    <input type="search" id="form1" class="form-control" placeholder="Search" />
  </div>
  <button type="button" class="btn btn-primary" style="background: #FF0000; color: #fff; border: none; margin: 10px;">
    <i class="fa fa-search"></i>
  </button>-->
  
                <div
                  class="m-toggle-darkmode js-tooltip"
                  data-tippy-content="Toggle mode"
                  tabindex="0"
                >
                  <label for="toggle-darkmode" class="sr-only">
                    Toggle mode
                  </label>
                  <input
                    id="toggle-darkmode"
                    type="checkbox"
                    class="js-toggle-darkmode"
                  />
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

      <div id="secondary-navigation-template" style="display: none">
        <ul class="m-secondary-menu">
          <li class="nav-data-privacy">
            <a href="privacy/index.php">Data &amp; privacy</a>
          </li>
          <li class="nav-contact">
            <a href="contact/index.php">Contact</a>
          </li>
          <li class="nav-contact">
            <a href="account/login.php">Contribute / Login</a>
          </li>
        </ul>
      </div>
    </header>

    <main class="main-wrap">
      <section class="m-hero no-picture" data-aos="fade" style="background: rgba(0, 0, 0,0.7); background-image: url('https://pdc-fallsem.42web.io/assets/images/intro.gif'); background-blend-mode: overlay;  background-size: cover;">
        <div
          data-aos="fade-down"
          style="width: auto; max-width: 330px; align: left; left: -200px"
        >
          <img
            src="../account/img/logo.png"
            style="
              margin: 5px;
              border-radius: 100%;
              width: 200px;
              display: block;
            "
          />
          <br />
        </div>
        <div class="m-hero__content" data-aos="fade-down" style="width: 70%;">
          <style>
            @font-face {
              font-family: Orion;
              src: url(font/Orion.otf);
            }
          </style>
          <h1 class="m-hero-title bigger" style="font-family: Orion; color:#B4B4B4;">
            Athena
          </h1>
          <div class="m-hero-description bigger" style="color:#B4B4B4;">
            You can find blogs related to
            <span
              style="font-weight: bolder; color: #88ff00"
              class="typing"
            ></span>
          </div>
          <script>
            $(document).ready(function () {
              var typed = new Typed(".typing", {
                strings: [
                    "General Knowledge",
                  "Web Development",
                  "App Development",
                  "AI",
                  "IoT",
                  "Sensors",
                  "Robocon",
                  "Blockchain",
                  "Machine Learning",
                  "Crytpo",
                  "Deep Learning",
                  "Digital Forensics"
                  
                ],
                typeSpeed: 110,
                backSpeed: 60,
                loop: true,
              });
            });
          </script>
          <a href="newsletter/index.php" class="m-button filled"
            >Stay Updated !</a
          >
        </div>
      </section>
      <div class="l-content">
        <div class="l-wrapper" data-aos="fade-up" data-aos-delay="300">
         <div class="form-group" style="margin-left: 80%;">
    <div class="input-group">
     <input type="text" style="margin: 10px; padding: 10px; padding-left: 20px; border: solid; border-radius: 30px;" name="search_text" id="search_text" placeholder="Search" class="form-control" />
    </div>
   </div>
   <br />
   <div id="result" class="l-grid centered"></div>
   <hr style="border: solid; margin-bottom: 50px; margin-top: 10px; border-width: 1.5px;">
          <div class="l-grid centered">
           
<?php         
          foreach($posts as $post){
              $inform = AuthorInformation($con, $post['username']);
              foreach($inform as $info){
            ?>
           <article class="m-article-card post">
              <div class="m-article-card__picture">
                <a
                  href="post.php?post_link=<?=$post['id']?>"
                  class="m-article-card__picture-link"
                  aria-hidden="true"
                  tabindex="-1"
                ></a>
                <img
                  class="m-article-card__picture-background"
                  src="<?=$post['header']?>"
                  loading="lazy"
                  alt=""
                  onerror=this.src="../account/img/default.png"
                />
                <a
                  href="author/profile.php?encryption_id=<?=$info['username']?>"
                  class="m-article-card__author js-tooltip"
                  aria-label="<?=$info['author']?>"
                  data-tippy-content="Posted by <?=$info['author']?>"
                >
                  <div
                    style="background-image: url(<?=$info['photo']?>);"
                  ></div>
                </a>
              </div>
              <div class="m-article-card__info">
                <a href="tag/posts.php?category_id=<?=$post['category_id']?>" class="m-article-card__tag"
                  ><?=getCategory($con,$post['category_id'])?></a
                >
                <a
                  href="post.php?post_link=<?=$post['id']?>"
                  class="m-article-card__info-link"
                  aria-label="<?=$post['title']?>"
                >
                  <div>
                    <h2
                      class="m-article-card__title js-article-card-title"
                      title="<?=$post['title']?>"
                    >
                      <?php echo $post['title']; ?>
                    </h2>
                  </div>
                  <div class="m-article-card__timestamp">
                    <span><?=TimePost($post['created_at'])?></span>
                    <span>&bull;</span>
                    <span><?=ReadTime($post['content'])?></span>
                  </div>
                </a>
              </div>
            </article>
            <?php
            $count++;
          }
          }
          ?>
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
        <nav
          class="m-footer__nav-secondary"
          role="navigation"
          aria-label="Secondary menu in footer"
        >
          <ul class="m-secondary-menu">
            <li class="nav-data-privacy">
              <a href="privacy/index.php">Data &amp; privacy</a>
            </li>
            <li class="nav-contact">
              <a href="contact/index.php">Contact</a>
            </li>
     <li class="nav-contact">
        <a href="https://pdc-fallsem.42web.io/account/login.php">Contribute / Login</a>
      </li>
          </ul>
        </nav>
        <nav class="m-footer-social">
          <a
            href="https://twitter.com/"
            target="_blank"
            rel="noopener"
            aria-label="Twitter"
          >
            <span class="icon-twitter" aria-hidden="true"></span>
          </a>
          <a href="https://github.com" aria-label="GitHub">
            <span class="icon-github" aria-hidden="true"></span>
          </a>
          <a
            href="https://www.linkedin.com/"
            aria-label="LinkedIn"
          >
            <span class="icon-linkedin" aria-hidden="true"></span>
          </a>
          <a
            href="https://www.facebook.com"
            aria-label="Facebook"
          >
            <span class="icon-facebook" aria-hidden="true"></span>
          </a>
          <a
            href="https://www.instagram.com/"
            aria-label="Instagram"
          >
            <span class="icon-instagram" aria-hidden="true"></span>
          </a>
        </nav>
        <p class="m-footer-copyright">
          <span>Athena &copy; 2021</span>
          <span>&nbsp; &bull; &nbsp;</span>
        </p>
      </div>
    </footer>
    <script
      crossorigin="anonymous"
      src="../polyfill.io/v3/polyfill.mina50e.js?features=IntersectionObserver%2CPromise%2CArray.prototype.includes%2CString.prototype.endsWith%2CString.prototype.startsWith%2CObject.assign%2CNodeList.prototype.forEach"
    ></script>
    <script defer src="assets/js/manifestb222.js?v=214a6e5c0e"></script>
    <script
      defer
      src="assets/js/vendor/content-api.minb222.js?v=214a6e5c0e"
    ></script>
    <script defer src="assets/js/vendorb222.js?v=214a6e5c0e"></script>
    <script defer src="assets/js/appb222.js?v=214a6e5c0e"></script>
    <script defer src="assets/js/homeb222.js?v=214a6e5c0e"></script>

  </body>
</html>
<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>