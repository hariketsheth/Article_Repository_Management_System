<?php

function getCategory($con, $id)
{

    $query = "SELECT * FROM category WHERE id=$id";

    $run = mysqli_query($con, $query);

    $data = mysqli_fetch_assoc($run);

    return $data['name'];
}
function getTagStyle($id)
{
    if ($id == 1) {
        return '<span style="padding: 3px 10px; font-size: 0.85rem; margin: 8px; font-weight: bolder; text-align: center; border-radius: 30px; vertical-align: middle; border: 2px solid #737679; background: #393c41; color: #ffffff;">Approved</span>';
    }
    if ($id == 2) {
        return '<span style="padding: 3px 10px;  font-size: 0.85rem; margin: 8px; font-weight: bolder; text-align: center; border-radius: 30px; vertical-align: middle; border: none; background: #343726; color: #e5e566;">Improvement</span>';
    }
    if ($id == 3) {
        return ' <span style="padding: 3px 10px;  font-size: 0.85rem; margin: 8px; font-weight: bolder; text-align: center; border-radius: 30px; vertical-align: middle; border: 2px solid #653b1a; background: #342215; color: #ffa860;">Best</span>';
    }
    if ($id == 4) {
        return '<span style="padding: 3px 10px;  font-size: 0.85rem; margin: 8px; font-weight: bolder; text-align: center; border-radius: 30px; vertical-align: middle; border: 2px solid #724246; background: #38151a; color: #f2abab;">Hatred</span>';
    }
    if ($id == 5) {
        return '<span style="padding: 3px 10px;  font-size: 0.85rem; margin: 8px;  font-weight: bolder; text-align: center; border-radius: 30px; vertical-align: middle; border: 2px solid #633246; background: #26111d; color: #f380a3;">Spam</span>';
    }
    if ($id == 6) {
        return '<span style="padding: 3px 10px;  font-size: 0.85rem; margin: 8px; font-weight: bolder; text-align: center; border-radius: 30px; vertical-align: middle; border: 2px solid #5c3a67; background: #32233c; color: #c79ceb;">Enhancement</span>';
    }
    if ($id == 7) {
        return '<span style="padding: 3px 10px;  font-size: 0.85rem; margin: 8px;  font-weight: bolder; text-align: center; border-radius: 30px; vertical-align: middle; border: 2px solid #174c72; background: #0b2337; color: #68c4fd;">Feedback</span>';
    }
    if ($id == 8) {
        return '<span style="padding: 3px 10px;  font-size: 0.85rem; margin: 8px;  font-weight: bolder; text-align: center; border-radius: 30px; vertical-align: middle; border: 2px solid #243459; background: #0d1423; color: #638ce0;">Uplifting</span>';
    }
    if ($id == 9) {
        return '<span style="padding: 3px 10px;  font-size: 0.85rem; margin: 8px;  font-weight: bolder; text-align: center; border-radius: 30px; vertical-align: middle; border: 2px solid #105e1a; background: #0e2717; color: #52f155;">Helpful</span>';
    }
    if ($id == 10) {
        return '<span style="padding: 3px 10px;  font-size: 0.85rem; margin: 8px;  font-weight: bolder; text-align: center; border-radius: 30px; vertical-align: middle; border: 2px solid #645b53; background: #373637; color: #ccb494;">Optimistic</span>';
    }
}
function getComments($con, $post_id)
{
    $query = "SELECT * FROM comments WHERE post_id='$post_id' ORDER BY cid DESC";
    $run = mysqli_query($con, $query);
    $data = array();

    while ($d = mysqli_fetch_assoc($run)) {
        $data[] = $d;
    }
    return $data;
}
function addVisit($con, $temp1, $temp2, $temp3)
{
    $query = "SELECT COUNT(*) AS count FROM visitors WHERE ip_address='$temp1' AND mac_address='$temp2' AND link='$temp3'";
    $run = mysqli_query($con, $query);
    $data = mysqli_fetch_assoc($run);
    date_default_timezone_set("Asia/Kolkata");
    $time = date('Y-m-d H:i:s');
    $query1 = mysqli_query($con, "INSERT INTO visitors(ip_address, mac_address, link, time_created_at) VALUES ('$temp1', '$temp2', '$temp3', '$time')");
    $data1 = mysqli_fetch_assoc($query1);
    if (!($query1)) {
        echo "<script>location.href = 'https://athena-dbms.42web.io/error/503.htm';</script>";
    }
}
function getCategoryInfo($con, $id)
{
    $query = "SELECT * FROM category WHERE id=$id";

    $run = mysqli_query($con, $query);

    $data = array();



    while ($d = mysqli_fetch_assoc($run)) {

        $data[] = $d;
    }

    return $data;
}

function newsletter($con)
{

    $email = $_POST['email'];

    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    $qr = mysqli_query($con, "SELECT COUNT(*) AS count FROM newsletter WHERE email='$email'");

    $count = mysqli_fetch_assoc($qr);

    if ($count['count'] < 1) {

        $query1 = mysqli_query($con, "INSERT INTO newsletter(email) VALUES ('$email')");

        if ($query1) {

?>

            <script>
                Swal.fire({

                    title: 'Success !',

                    text: 'Your email address is added to our newsletter ! You will receive updates about new articles and blogs. Have a great day ahead ! ',

                    footer: 'Please do send us a mail in case you wish to Unsubscribe from our newsletter at athena.verify@gmail.com',

                    icon: 'sucess',

                    confirmButtonColor: '#5cb85c',

                    confirmButtonText: 'Yayy !'

                });
            </script>



        <?php

        } else {

        ?>

            <script>
                Swal.fire({

                    title: 'Uhhh.. Ohh !',

                    text: 'Your email address could not be added to our newsletter at this moment. Please try again after some time ! ',

                    footer: 'Please do send us a mail in case you are consistently not able to subscribe to our newsletter at athena.help@gmail.com',

                    icon: 'error',

                    confirmButtonColor: '#d9534f',

                    confirmButtonText: 'Continue'

                });
            </script>





        <?php

        }
    } else {

        ?>

        <script>
            Swal.fire({

                title: 'Uhhh.. Ohh !',

                text: 'You have already subscribed to our newsletter. All the recent updates and important releases would be sent on your email address.',

                icon: 'warning',

                confirmButtonColor: '#f0ad4e',

                confirmButtonText: 'Continue'

            });
        </script>

<?php

    }
}

function ReadTime($content)
{

    $count_words = str_word_count(strip_tags($content));

    $read_time = ceil($count_words / 250);

    $suffix = "read";

    $prefix = " min ";

    $read_time_output = $read_time . $prefix . $suffix;

    return $read_time_output;
}

function getAllPost($con)
{

    $query = "SELECT * FROM posts WHERE status='In Review' OR status='Published' OR status='Pending' ORDER BY created_at DESC";

    $run = mysqli_query($con, $query);

    $data = array();



    while ($d = mysqli_fetch_assoc($run)) {

        $data[] = $d;
    }

    return $data;
}

function getCategPost($con, $id)
{

    $query = "SELECT * FROM posts WHERE status='Published' AND category_id = '$id' ORDER BY created_at DESC";

    $run = mysqli_query($con, $query);

    $data = array();

    while ($d = mysqli_fetch_assoc($run)) {

        $data[] = $d;
    }

    return $data;
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

function getRandomPost($con, $id)
{

    $query = "SELECT * FROM posts WHERE status='Published' AND id != '$id' ORDER BY created_at DESC";

    $run = mysqli_query($con, $query);

    $data = array();



    while ($d = mysqli_fetch_assoc($run)) {

        $data[] = $d;
    }

    shuffle($data);

    return $data;
}

function getAuthorPost($con, $author)
{

    $query = "SELECT * FROM posts WHERE username='$author' AND status='Published' ORDER BY created_at DESC";

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

function getPost($con, $email)
{

    $query = "SELECT * FROM posts WHERE username='$email' ORDER BY id DESC";

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

function getSuggestCategory($con)
{

    $query = "SELECT * FROM category";

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

    $time = strtotime($time);
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

function ApproveCategory($con, $id)
{

    $query = "UPDATE category SET status ='Approved' WHERE id='$id'";

    $run = mysqli_query($con, $query);

    $d = mysqli_fetch_assoc($run);
}

function PublishPost($con, $id)
{

    $query = "UPDATE posts SET status ='Published' WHERE id='$id'";

    $run = mysqli_query($con, $query);

    $d = mysqli_fetch_assoc($run);
}

function ReviewPost($con, $id, $reason)
{

    $query = "UPDATE posts SET status ='Draft', reason = '$reason' WHERE id='$id'";

    $run = mysqli_query($con, $query);

    $d = mysqli_fetch_assoc($run);
}

?>