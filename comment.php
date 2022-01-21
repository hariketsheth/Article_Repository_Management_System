<div class="col-4">
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>

  <?php
  if (isset($_POST['addcomment'])) {
    $name = mysqli_real_escape_string($con, $_POST['ccname']);
    $comment = mysqli_real_escape_string($con, $_POST['comment']);
    $comment_h = $_GET['post_link'];
    $query = "INSERT INTO comments(comment,name,post_id) VALUES('$comment','$name','$comment_h')";
    if (mysqli_query($con, $query)) {
      header("location:../post.php?post_link=$comment_h");
    } else {
      echo "Comment is not added !";
    }
    unset($_POST);
    unset($_REQUEST);
  }
  if (isset($_GET['post_link'])) {
    $comment_h = $_GET['post_link'];
  ?>
    <div class="card mb-3">
      <h4 style="background-color: #2c2fe6;  display: block; text-align: center; color: #fff !important; border-radius: 30px;" class="m-button primary" class="card-header">Comments</h4>
      <?php if (isset($_SESSION['uname'])) {
        $authors = AuthorInformation($con, $_SESSION['uname']);
        foreach ($authors as $author) {
      ?>

          <button type="button" style="left: 320px; text-align: center; color: inherit;" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Comment on this
          </button>
          <div class="modal fade" style="display: none;" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add Your Comment</h5>
                </div>
                <div class="modal-body">
                  <form action="" method="post">
                    <div class="mb-3">
                      <style type="text/css">
                        input[name=name] {
                          pointer-events: none;
                          cursor: not-allowed;
                          border: none;
                        }

                        :root:not([data-theme=light]) input[name=name] {
                          background: #404040;
                          color: inherit;
                        }

                        :root,
                        [data-theme=light] input[name=name] {
                          background: #e6e6e6;
                          color: inherit;
                        }
                      </style>
                      <label for="exampleInputEmail1" class="form-label">Name</label>
                      <input type="hidden" name="ccname" value="<?= $author['fullname'] ?>">
                      <input type="name" class="form-control" name="name" autocomplete="off" autocapitalise="off" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $author['fullname'] ?>" disabled>

                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Comment</label>
                      <input type="text" class="form-control" autocomplete="off" autocapitalise="off" name="comment" id="exampleInputPassword1">
                    </div>
                    <input type="hidden" name="post_id" value="<?= $post_id ?>">
                    <button type="submit" name="addcomment" style="color: inherit;" class="btn btn-primary">Add Comment</button>
                  </form>
                </div>

              </div>
            </div>
          </div>
        <?php
        }
      }
      $comments = getComments($con, $comment_h);
      if (count($comments) < 1) {
        echo '<div class="card-body"><p class="text-center card-text">No Comments..</p></div>';
      }
      foreach ($comments as $comment) {
        ?>
        <div class="card-body" style=" box-shadow: inset 0 0 10px #fff, inset 0 0 10px #fff; padding: 30px; margin: 20px; border: solid; border-width: 0.7px; border-radius: 30px; ">
          <h5 style="color: #2c66e6; margin: 0px;" class="" style="margin-bottom: 0;"><?= $comment['name'] ?></h5>
          <span class="text-secondary"> <small><?= date('F jS, Y', strtotime($comment['created_at'])) ?></small></span><br>
          <?php if (is_null($comment['tag_id']) != 1) { ?>
            <span class="text-secondary"> <small>Comment Tagged as: <?= getTagStyle($comment['tag_id']) ?> </small></span>
          <?php } ?>
          <p style="font-weight: bolder;" class="card-text"><?= $comment['comment'] ?></p>

        </div>
      <?php
      }
      ?>

    </div>
  <?php
  }
  ?>


</div>