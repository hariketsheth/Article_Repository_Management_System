-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql210.byetcluster.com
-- Generation Time: Mar 08, 2022 at 02:01 PM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_29868134_arms`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks`
--

CREATE TABLE `bookmarks` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `post_id` varchar(255) NOT NULL,
  `time_created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookmarks`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `status` text NOT NULL,
  `author` text NOT NULL,
  `reason` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `status`, `author`, `reason`) VALUES
(3, 'Artificial Intelligence', 'Approved', 'test1', 'This is a  Web Task '),
(2, 'App Development', 'Approved', 'test1', 'This is a  Web Task '),
(1, 'Web Development', 'Approved', 'test1', 'This is a  Web Task '),
(4, 'Machine Learning', 'Approved', 'test1', 'This is a  Web Task '),
(5, 'Competitive Programming', 'Approved', 'test1', 'This is a  Web Task '),
(6, 'Data Structures', 'Approved', 'hariket245', 'Users are interested to learn more on Binary Search tree and AVL'),
(8, 'Deep Learning', 'Approved', 'test1', 'Some valid reason to be posted here for adding Deep Learning'),
(9, 'Digital Forensics', 'Approved', 'sandhya833', 'This is a really awesome topic'),
(10, 'Computer Science', 'Approved', 'soniya389', 'This is a suggested category for CSE2004 Report'),
(11, 'Open Source', 'Approved', 'aniket305', 'Many contributors input'),
(12, 'General Knowledge', 'Approved', 'jayant422', 'Due to lack of GK people are not aware that what is happening around.so it is very useful'),
(13, 'beginners', 'Approved', 'fidal947', 'because I am a beginner.'),
(14, 'Sports', 'Approved', 'subhendudash342', 'Sports is cool.'),
(15, 'Digital Logic ', 'Approved', 'geetha762', 'Widening the scope of concepts covered'),
(16, 'Digital Logic ', 'Approved', 'geetha762', 'Widening the scope of concepts covered'),
(17, 'Database', 'Approved', 'test1', 'This was not available there'),
(18, 'database management system', 'Pending', 'test1', 'I want to add it'),
(19, 'Game Development', 'Approved', 'test1', 'Same reason'),
(20, 'Web3', 'Approved', 'swati579', 'Evolving category'),
(21, 'Data Science', 'Approved', 'rohit999', 'Not present');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `cid` int(11) NOT NULL,
  `comment` text NOT NULL,
  `name` varchar(200) NOT NULL,
  `tag_id` int(11) DEFAULT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `visitor_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter`
--


-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `title` text NOT NULL,
  `header` text NOT NULL,
  `content` text NOT NULL,
  `status` text NOT NULL,
  `reason` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `username`, `title`, `header`, `content`, `status`, `reason`, `created_at`, `category_id`) VALUES
(17, 'test1', 'GDSC Blog', 'google.com', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Title&nbsp;</td>\r\n			<td>Content</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>Content1</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><img alt=\"yes\" src=\"https://athena-dbms.42web.io/account/js/ckeditor/plugins/smiley/images/thumbs_up.png\" style=\"height:23px; width:23px\" title=\"yes\" /></p>\r\n\r\n<p><strong>Good one</strong></p>\r\n', 'Published', NULL, '2022-01-06 02:40:26', 11),
(13, 'test', 'Neural Networks : Trends and Challenges', 'data:image/jpeg;base64,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', '<p>Sample test here</p>\r\n\r\n<p>this is editing. New Content here</p>\r\n', 'Published', NULL, '2021-11-23 06:06:43', 10),
(2, 'test1', 'Heap Sort', 'https://digitalpress.fra1.cdn.digitaloceanspaces.com/1veu1vr/2021/07/designer.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Published', '', '2021-10-20 15:48:23', 4),
(3, 'test2', 'Directives in CSS\r\n', 'https://i.ibb.co/brp90Xv/Eureka-Concept-Businessmen-Colleagues-Characters-with-Laptop-Sitting-at-Huge-Light-Bulb-Thinking-Cre.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Draft', 'This is Not Properly Formatted', '2021-02-20 04:56:01', 1),
(4, 'test1', 'A sample blog created 1', 'https://digitalpress.fra1.cdn.digitaloceanspaces.com/1veu1vr/2021/07/office-workplace.png', ' <h2 id=\"problem-statement\">Problem Statement</h2><p>You are given a very large integer <code>n</code>, represented as a string, and an integer digit <code>x</code>. The digits in <code>n</code> and the digit <code>x</code> are in the <strong><strong>inclusive</strong></strong> range <code>[1, 9]</code>, and <code>n</code> may represent a <strong><strong>negative</strong></strong> number.</p><p>You want to <strong><strong>maximize </strong></strong><code>n</code><strong><strong>\'s numerical value</strong></strong> by inserting <code>x</code> anywhere in the decimal representation of <code>n</code>. You <strong><strong>cannot</strong></strong> insert <code>x</code> to the left of the negative sign.</p><ul><li>For example, if <code>n = 73</code> and <code>x = 6</code>, it would be best to insert it between <code>7</code> and <code>3</code>, making <code>n = 763</code>.</li><li>If <code>n = -55</code> and <code>x = 2</code>, it would be best to insert it before the first <code>5</code>, making <code>n = -255</code>.</li></ul><p>Return a string representing the <strong><strong>maximum</strong></strong> value of <code>n</code> after the insertion.</p><h3 id=\"example-1\"><strong><strong><strong>Example 1</strong></strong></strong></h3><p><strong><strong>Input:</strong></strong> n = \"99\", x = 9 <strong><strong>Output:</strong></strong> \"999\" <strong><strong>Explanation:</strong></strong> The result is the same regardless of where you insert 9.</p><h3 id=\"example-2\"><strong><strong><strong>Example 2</strong></strong></strong></h3><p><strong><strong>Input:</strong></strong> n = \"-13\", x = 2 <strong><strong>Output:</strong></strong> \"-123\" <strong><strong>Explanation:</strong></strong> You can make n one of {-213, -123, -132}, and the largest of those three is -123.</p><h2 id=\"constraints\"><strong>Constraints</strong></h2><ul><li><code>1 &lt;= n.length &lt;= 10<sup>5</sup></code></li><li><code>1 &lt;= x &lt;= 9</code></li><li>The digits in <code>n</code> are in the range <code>[1, 9]</code>.</li><li><code>n</code> is a valid representation of an integer.</li></ul><h2 id=\"approach\"><strong>Approach</strong></h2><p>We recommend that you try it out at <a href=\"https://leetcode.com/problems/maximum-value-after-insertion/\" rel=\"noreferrer noopener\">https://leetcode.com/problems/maximum-value-after-insertion/</a> before reading this solution.</p><p>The basic idea is that if the given number is negative, its absolute value has to be as small as possible, but if it is positive it has the be as large as possible.</p><p>First, we check if the given number is positive or negative. We can do this by comparing n[0] with \'-\'.</p><h3 id=\"if-the-string-is-negative\"><strong>If the string is negative</strong></h3><p>When we get n[0] to be equal to \'-\', we can conclude that the string is negative. Our goal, in this case, is to minimize the absolute number so that, we can get the maximum number. This is because the lesser the negative value, the larger the number.</p><p>We know that we can get the smallest resultant number by finding a position for the new digit such that it replaces the position of a higher digit.</p><p>For example, consider the given string as -13 and the digit to be added is 2. There are three possible ways that we can insert 2 in this string. {-132, -123, -213}. Among these, we can see that we get the maximum number (or the absolute minimum) in case 2.</p><p>An easy way to find this position would be to traverse the string from left to right and find the index where (n[i] &gt; x). It is at this place that we have to insert the new digit.</p><pre><code>Assume the given string (n) to be -345 and the given digit (x) to be inserted is 6. \r\ni = 0\r\nAs n[0] = \'-\'\r\nWe take the path of the negative number. \r\n\r\ni = 1\r\nn[1]&gt;6 FALSE\r\ni++\r\n\r\ni = 2\r\nn[2]&gt;6 FALSE\r\ni++\r\n\r\ni = 3\r\nn[3]&gt;6 FALSE\r\ni++\r\n\r\nNow we come out of the loop and because we did not find any i such that n[i]&lt;6, we insert 6 at the end of the string to get the maximum number (absolute minimum number). </code></pre><h3 id=\"if-the-string-is-positive\"><strong>If the string is positive</strong></h3><p>Similar to negative numbers, we have to traverse this string from left to right and find the index where <strong>(n[i] &lt; x)</strong>. It is at this place that we insert the new digit.</p><pre><code>Assume the given string (n) to be 345 and the given digit (x) to be inserted is 6. \r\ni = 0\r\nAs n[0] != \'-\'\r\nWe take the path of the positive number. \r\n\r\ni = 0\r\nn[0]&lt;6 TRUE\r\n\r\nSo we insert 6 here to get the number as 6345. </code></pre><h2 id=\"solution-in-c\">Solution in C++</h2><pre><code class=\"language-cpp\">class Solution\r\n{\r\npublic:\r\n    string maxValue(string n, int x)\r\n    {\r\n        int len = n.size(); //Length of the string\r\n        int ans = len;      //Initially we assume that we add the new digit at the end of the string.\r\n\r\n        if (n[0] == \'-\')\r\n        {\r\n            //If the number is negative\r\n            for (int i = 1; i &lt; len; ++i)\r\n            {\r\n                if (n[i] - \'0\' &gt; x)\r\n                {\r\n                    ans = i;\r\n                    break;\r\n                }\r\n            }\r\n        }\r\n        else\r\n        {\r\n            //If the number is positive\r\n            for (int i = 0; i &lt; len; ++i)\r\n            {\r\n                if (n[i] - \'0\' &lt; x)\r\n                {\r\n                    ans = i;\r\n                    break;\r\n                }\r\n            }\r\n        }\r\n        n.insert(n.begin() + ans, x + \'0\'); //Inserting the number at the index of ans\r\n        return n;\r\n    }\r\n};</code></pre>', 'Published', '', '2021-08-21 15:10:29', 1),
(6, 'soniya1210', 'Chrome Extensions: Zero to hero', 'https://digitalpress.fra1.cdn.digitaloceanspaces.com/1veu1vr/2021/07/developer-team.png', '<p><strong>Hi this is Soniya</strong></p>\r\n\r\n<p><strong>I have written this article after creating the new account</strong></p>\r\n\r\n<p><strong><em>I am writing this line in Italics to test different formatting options</em></strong></p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Test1</td>\r\n			<td>Test2</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Test3</td>\r\n			<td>Test4</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<pre>\r\n<code class=\"language-cpp\">#include &lt;iostream&gt;\r\nusing namespace std;\r\n\r\nint main(){\r\n\r\n}</code></pre>\r\n\r\n<p><img alt=\"smiley\" src=\"https://athena-dbms.42web.io/account/js/ckeditor/plugins/smiley/images/regular_smile.png\" style=\"height:23px; width:23px\" title=\"smiley\" /></p>\r\n', 'Published', NULL, '2021-11-14 18:03:48', 2),
(7, 'aniket305', 'Insights in Robotics', 'https://www.softbankrobotics.com/emea/themes/custom/softbank/images/full-nao.png', '<p style=\"text-align:center\"><strong>This is a Blog on Robotics</strong></p>\r\n\r\n<p><em>Hello world!</em></p>\r\n\r\n<pre>\r\n<code class=\"language-python\">def helloworld:\r\n l = [ ]\r\n\r\nprint (\"hello World\")</code></pre>\r\n\r\n<table align=\"center\" border=\"2\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>hello</td>\r\n			<td>world</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', 'Published', NULL, '2021-11-15 23:31:52', 3),
(8, 'jayant422', 'Smart Attendence by Face Recognition', 'https://media.istockphoto.com/photos/engineers-using-key-card-to-identity-verification-picture-id1173582894?k=20&m=1173582894&s=612x612&w=0&h=TWEvl3yJ-pyTn7i0SF8k2fJ3TmKBLr1GKx1XExDPpKI=', '<p><strong>hey</strong><strong>!</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table align=\"left\" border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:100px; width:500px\">\r\n	<thead>\r\n		<tr>\r\n			<th scope=\"row\">\r\n			<pre>\r\n<code class=\"language-html\">&lt;html&gt;\r\n&lt;/html&gt;</code></pre>\r\n\r\n			<p>&nbsp;</p>\r\n			</th>\r\n			<th scope=\"col\">&lt;html&gt;</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<th scope=\"row\">&nbsp;</th>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope=\"row\">&nbsp;</th>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', 'Published', NULL, '2021-11-19 23:23:44', 2),
(9, 'fidal947', 'How to become a certified tester.', 'https://digitalpress.fra1.cdn.digitaloceanspaces.com/1veu1vr/2021/07/lost-business-man-talking-with-phone-and-asking-for-help.png', '<p>At 7 pm, join in ms team call then test out the app.&nbsp;&nbsp;</p>\r\n', 'Published', NULL, '2021-11-20 00:49:07', 1),
(10, 'subhendudash342', 'Getting Started in HTML, CSS and JavaScript', 'https://digitalpress.fra1.cdn.digitaloceanspaces.com/1veu1vr/2021/07/idea.png', '<p>HTML, CSS, JS is frontend.</p>\r\n\r\n<p><strong>This is amazing</strong></p>\r\n', 'Published', NULL, '2021-11-20 00:49:01', 1),
(11, 'geetha762', 'DL families', 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/62/Cmos_impurity_profile.PNG/500px-Cmos_impurity_profile.PNG', '<p>RTL - Resistor Transistor Logic</p>\r\n\r\n<ul>\r\n	<li><strong>DTL -&nbsp;</strong>Digital Transistor Logic</li>\r\n</ul>\r\n\r\n<ol>\r\n	<li>TTL - Transistor-Transistor Logic</li>\r\n</ol>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>ECL</td>\r\n			<td>DCTL</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Emitter collector logic</td>\r\n			<td>Direct-coupled&nbsp;transistor logic</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p style=\"text-align:center\"><img alt=\"enlightened\" src=\"https://athena-dbms.42web.io/account/js/ckeditor/plugins/smiley/images/lightbulb.png\" style=\"height:23px; width:23px\" title=\"enlightened\" />CMOS</p>\r\n\r\n<p style=\"text-align:center\"><em>Thank you!</em></p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Published', NULL, '2021-11-20 03:49:03', 3),
(12, 'preyashyadav900', 'SQL Database.', 'data:image/png;base64,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', '<p><strong>Hi there!</strong></p>\r\n\r\n<p><strong><img alt=\"enlightened\" src=\"https://athena-dbms.42web.io/account/js/ckeditor/plugins/smiley/images/lightbulb.png\" style=\"height:23px; width:23px\" title=\"enlightened\" /></strong></p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Dummy</td>\r\n			<td>Test</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>q</td>\r\n			<td>w</td>\r\n		</tr>\r\n		<tr>\r\n			<td>e</td>\r\n			<td>w</td>\r\n		</tr>\r\n		<tr>\r\n			<td>q</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', 'Published', NULL, '2021-11-20 17:37:29', 3),
(14, 'test1', 'Post title', 'google.com', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Title</td>\r\n			<td>Post</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><strong>Hi test</strong></p>\r\n\r\n<p><strong>Finalise&nbsp;</strong></p>\r\n', 'Draft', 'This needs updation according to latest guidelines', '2021-12-01 22:58:23', 10);

-- --------------------------------------------------------

--
-- Table structure for table `pwd_change`
--

CREATE TABLE `pwd_change` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `codekey` varchar(255) NOT NULL,
  `password_change` varchar(255) NOT NULL,
  `time_s_pwd` timestamp NOT NULL DEFAULT current_timestamp(),
  `time_e_pwd` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pwd_change`
--

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `mac_adress` varchar(255) NOT NULL,
  `post_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `time_created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `admin` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `mac_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`) VALUES
(1, 'Approved', '2021-11-03 08:35:38'),
(2, 'Improvement', '2021-11-03 08:35:38'),
(3, 'Best', '2021-11-03 08:35:58'),
(4, 'Hatred', '2021-11-03 08:35:58'),
(5, 'Spam', '2021-11-03 08:36:17'),
(6, 'Enhancement', '2021-11-03 08:36:17'),
(7, 'Feedback', '2021-11-03 08:36:43'),
(8, 'Uplifting', '2021-11-03 08:36:43'),
(9, 'Helpful', '2021-11-03 08:37:10'),
(10, 'Optimistic', '2021-11-03 08:37:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `codekey` varchar(255) NOT NULL,
  `author` text DEFAULT NULL,
  `fullname` text NOT NULL,
  `name` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `mailto` text NOT NULL,
  `photo` text DEFAULT NULL,
  `role_1` text NOT NULL,
  `role_2` text NOT NULL,
  `role_3` text NOT NULL,
  `activationcode` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `bio` text DEFAULT NULL,
  `github` text DEFAULT NULL,
  `instagram` text DEFAULT NULL,
  `linkedin` text DEFAULT NULL,
  `facebook` text DEFAULT NULL,
  `twitter` text DEFAULT NULL,
  `website` text DEFAULT NULL,
  `postingdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--
-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `mac_address` text NOT NULL,
  `link` text NOT NULL,
  `time_created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitors`
--
--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pwd_change`
--
ALTER TABLE `pwd_change`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `id` (`id`,`username`,`codekey`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `codekey` (`codekey`),
  ADD UNIQUE KEY `email_full` (`email`),
  ADD UNIQUE KEY `email_full_2` (`email`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookmarks`
--
ALTER TABLE `bookmarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pwd_change`
--
ALTER TABLE `pwd_change`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=874;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
