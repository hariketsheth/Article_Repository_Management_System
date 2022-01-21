<?php

if (isset($_POST['comment-tag-1'])) {

    $comment_t = $_POST['commentid'];

    $query = "UPDATE comments SET tag_id='1' WHERE cid='$comment_t'";

    $run = mysqli_query($con, $query);

    unset($_POST);
}

if (isset($_POST['comment-tag-2'])) {

    $comment_t = $_POST['commentid'];

    $query = "UPDATE comments SET tag_id='2' WHERE cid='$comment_t'";

    $run = mysqli_query($con, $query);

    unset($_POST);
}

if (isset($_POST['comment-tag-3'])) {

    $comment_t = $_POST['commentid'];

    $query = "UPDATE comments SET tag_id='3' WHERE cid='$comment_t'";

    $run = mysqli_query($con, $query);

    unset($_POST);
}

if (isset($_POST['comment-tag-4'])) {

    $comment_t = $_POST['commentid'];

    $query = "UPDATE comments SET tag_id='4' WHERE cid='$comment_t'";

    $run = mysqli_query($con, $query);

    unset($_POST);
}

if (isset($_POST['comment-tag-5'])) {

    $comment_t = $_POST['commentid'];

    $query = "UPDATE comments SET tag_id='5' WHERE cid='$comment_t'";

    $run = mysqli_query($con, $query);

    unset($_POST);
}

if (isset($_POST['comment-tag-6'])) {

    $comment_t = $_POST['commentid'];

    $query = "UPDATE comments SET tag_id='6' WHERE cid='$comment_t'";

    $run = mysqli_query($con, $query);

    unset($_POST);
}

if (isset($_POST['comment-tag-7'])) {

    $comment_t = $_POST['commentid'];

    $query = "UPDATE comments SET tag_id='7' WHERE cid='$comment_t'";

    $run = mysqli_query($con, $query);

    unset($_POST);
}

if (isset($_POST['comment-tag-8'])) {

    $comment_t = $_POST['commentid'];

    $query = "UPDATE comments SET tag_id='8' WHERE cid='$comment_t'";

    $run = mysqli_query($con, $query);

    unset($_POST);
}

if (isset($_POST['comment-tag-9'])) {

    $comment_t = $_POST['commentid'];

    $query = "UPDATE comments SET tag_id='9' WHERE cid='$comment_t'";

    $run = mysqli_query($con, $query);

    unset($_POST);
}

if (isset($_POST['comment-tag-10'])) {

    $comment_t = $_POST['commentid'];

    $query = "UPDATE comments SET tag_id='10' WHERE cid='$comment_t'";

    $run = mysqli_query($con, $query);

    unset($_POST);
}
