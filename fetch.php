<html>
<?php
include('connection.php');
include('function.php');
$output = '';
if (isset($_POST["query"])) {
  $search = mysqli_real_escape_string($con, $_POST["query"]);
  $query = "
  SELECT DISTINCT * FROM posts
  WHERE title LIKE '%" . $search . "%'";
}
$result = mysqli_query($con, $query);
$count = 1;
if (mysqli_num_rows($result) > 0) {
  $remote = mysqli_fetch_array($result);
  while ($post = mysqli_fetch_array($result)) {
    $inform = AuthorInformation($con, $post['username']);
    foreach ($inform as $info) {
      $output .= '
           <article class="m-article-card post">
              <div class="m-article-card__picture">
                <a
                  href="post.php?post_link=' . $post['id'] . '"
                  class="m-article-card__picture-link"
                  aria-hidden="true"
                  tabindex="-1"
                ></a>
                <img
                  class="m-article-card__picture-background"
                  src="' . $post['header'] . '"
                  loading="lazy"
                  alt=""
                  onerror=this.src="../account/img/default.png"
                />
                <a
                  href="author/profile.php?encryption_id=' . $info['username'] . '"
                  class="m-article-card__author js-tooltip"
                  aria-label="' . $info['author'] . '"
                  data-tippy-content="Posted by ' . $info['author'] . '"
                >
                  <div
                    style="background-image: url(' . $info['photo'] . ');"
                  ></div>
                </a>
              </div>
              <div class="m-article-card__info">
                <a href="tag/posts.php?category_id=' . $post['category_id'] . '" class="m-article-card__tag"
                  >' . getCategory($con, $post['category_id']) . '</a
                >
                <a
                  href="post.php?post_link=' . $post['id'] . '"
                  class="m-article-card__info-link"
                  aria-label="' . $post['title'] . '"
                >
                  <div>
                    <h2
                      class="m-article-card__title js-article-card-title"
                      title="' . $post['title'] . '"
                    >
                      ' . $post['title'] . '
                    </h2>
                  </div>
                  <div class="m-article-card__timestamp">
                    <span>' . TimePost($post['created_at']) . '</span>
                    <span>&bull;</span>
                    <span>' . ReadTime($post['content']) . '</span>
                  </div>
                </a>
              </div>
            </article>
  ';
      $count++;
    }
    echo $output;
  }
}

?>

</html>