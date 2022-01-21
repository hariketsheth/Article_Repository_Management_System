<?php

function getCategory($con, $id)
{

    $query = "SELECT * FROM category WHERE id=$id";

    $run = mysqli_query($con, $query);

    $data = mysqli_fetch_assoc($run);

    return $data['name'];
}
function manageVisit($con)
{
    $query = "SELECT * FROM visitors ORDER BY time_created_at DESC";
    $run = mysqli_query($con, $query);

    $data = array();



    while ($d = mysqli_fetch_assoc($run)) {

        $data[] = $d;
    }

    return $data;
}
function EstimatedReading($content)
{

    $postContent = render($content);

    $word = str_word_count(strip_tags($postContent));

    $m = floor($word / 200);

    $s = floor($word % 200 / (200 / 60));

    $est = $m . ' minute' . ($m == 1 ? '' : 's') . ', ' . $s . ' second' . ($s == 1 ? '' : 's');

    return $est;
}

function getAllPost($con, $temp)
{
    if ($temp == 0) {
        $query = "SELECT * FROM posts WHERE status='Pending' ORDER BY created_at DESC";
    } elseif ($temp == 1) {
        $query = "SELECT * FROM posts WHERE status='In Review' ORDER BY created_at DESC";
    } else {
        $query = "SELECT * FROM posts WHERE status='Published' ORDER BY created_at DESC";
    }
    $run = mysqli_query($con, $query);

    $data = array();



    while ($d = mysqli_fetch_assoc($run)) {

        $data[] = $d;
    }

    return $data;
}

function getAllUsers($con, $user)
{

    $query = "SELECT * FROM users WHERE username != '$user'";

    $run = mysqli_query($con, $query);

    $data = array();



    while ($d = mysqli_fetch_assoc($run)) {

        $data[] = $d;
    }

    return $data;
}

function getUserStatus($con, $user)
{

    if ($user['status'] == 0) {

        return "Not Verified";
    } elseif ($user['role_3'] == "inactive") {

        return "Author Profile Pending";
    } elseif ($user['role_1'] == "inactive") {

        return "Blocked";
    } else {

        return "Active2";
    }
}

function getFinalPost($con)
{

    $query = "SELECT * FROM posts WHERE status='Published' ORDER BY created_at DESC";

    $run = mysqli_query($con, $query);

    $data = array();



    while ($d = mysqli_fetch_assoc($run)) {

        $data[] = $d;
    }

    return $data;
}
function getTagName($con, $id)
{

    $query = "SELECT name FROM tags WHERE id='$id'";
    $run = mysqli_query($con, $query);
    $data = mysqli_fetch_assoc($run);
    return $data['name'];
}
function getFinalComment($con, $user)
{

    $query = "SELECT * FROM comments c INNER JOIN posts p ON p.id = c.post_id WHERE p.username='$user'";
    $run = mysqli_query($con, $query);
    $data = array();



    while ($d = mysqli_fetch_assoc($run)) {

        $data[] = $d;
    }
    return $data;
}

function AuthorInformation($con, $name)
{

    $query = "SELECT * FROM users WHERE username='$name'";

    $run = mysqli_query($con, $query);

    $data = array();

    while ($d = mysqli_fetch_assoc($run)) {

        $data[] = $d;
    }

    return $data;
}

function getBlogPost($con, $id)
{

    $query = "SELECT * FROM posts WHERE id='$id'";

    $run = mysqli_query($con, $query);

    $data = array();

    while ($d = mysqli_fetch_assoc($run)) {

        $data[] = $d;
    }

    return $data;
}

function getPost($con, $email, $temp)
{
    if ($temp == 0) {
        $query = "SELECT * FROM posts WHERE username='$email' AND status='Draft' ORDER BY id DESC";
    } elseif ($temp == 1) {
        $query = "SELECT * FROM posts WHERE username='$email' AND (status='In Review' OR status='Pending') ORDER BY id DESC";
    } else {
        $query = "SELECT * FROM posts WHERE username='$email' AND status='Published' ORDER BY id DESC";
    }
    $run = mysqli_query($con, $query);

    $data = array();



    while ($d = mysqli_fetch_assoc($run)) {

        $data[] = $d;
    }

    return $data;
}

function getAllCategory($con)
{

    $query = "SELECT * FROM category WHERE status ='Approved'";

    $run = mysqli_query($con, $query);

    $data = array();

    while ($d = mysqli_fetch_assoc($run)) {

        $data[] = $d;
    }

    return $data;
}

function getSuggestCategory($con, $temp)
{
    if ($temp == 0) {
        $query = "SELECT * FROM category WHERE status='Pending'";
    } else {
        $query = "SELECT * FROM category WHERE status='Approved'";
    }

    $run = mysqli_query($con, $query);

    $data = array();

    while ($d = mysqli_fetch_assoc($run)) {

        $data[] = $d;
    }

    return $data;
}

function TimePost($time)
{

    date_default_timezone_set("Asia/Kolkata");

    $time_difference = time() - $time;

    if ($time_difference < 1) {
        return 'less than 1 second ago';
    }

    $condition = array(
        12 * 30 * 24 * 60 * 60 =>  'year',

        30 * 24 * 60 * 60       =>  'month',

        24 * 60 * 60            =>  'day',

        60 * 60                 =>  'hour',

        60                      =>  'minute',

        1                       =>  'second'

    );

    foreach ($condition as $secs => $str) {

        $d = $time_difference / $secs;

        if ($d >= 1) {

            $t = round($d);

            return 'about ' . $t . ' ' . $str . ($t > 1 ? 's' : '') . ' ago';
        }
    }
}

function DeleteCategory($con, $id)
{

    $query = "DELETE FROM category WHERE id='$id'";

    $run = mysqli_query($con, $query);

    $d = mysqli_fetch_assoc($run);
}

function DeletePost($con, $id)
{

    $query = "DELETE FROM posts WHERE id='$id'";

    $run = mysqli_query($con, $query);

    $d = mysqli_fetch_assoc($run);
}

function SavePost($con, $id, $update)
{

    $query = "UPDATE posts SET content='$update' WHERE id='$id'";

    $run = mysqli_query($con, $query);

    $d = mysqli_fetch_assoc($run);
}

function AssignPost($con, $id)
{

    $query = "UPDATE posts SET status='In Review' WHERE id='$id'";

    $run = mysqli_query($con, $query);

    $d = mysqli_fetch_assoc($run);
}

function ApproveCategory($con, $id)
{

    $query = "UPDATE category SET status ='Approved' WHERE id='$id'";

    $run = mysqli_query($con, $query);

    $d = mysqli_fetch_assoc($run);
}

function PublishPost($con, $id)
{
    date_default_timezone_set("Asia/Kolkata");
    $dd = date('Y-m-d H:i:s');
    $query = "UPDATE posts SET status ='Published', created_at = '$dd' WHERE id='$id'";

    $run = mysqli_query($con, $query);

    $d = mysqli_fetch_assoc($run);
}

function ReviewPost($con, $id, $reason)
{

    $query = "UPDATE posts SET status ='Draft', reason = '$reason' WHERE id='$id'";

    $run = mysqli_query($con, $query);

    $d = mysqli_fetch_assoc($run);
}
