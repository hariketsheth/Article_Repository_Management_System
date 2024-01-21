-- Generation time: Fri, 27 Oct 2023 00:53:44 -0400
-- Host: sql210.epizy.com
-- DB name: epiz_29868134_arms
/*!40030 SET NAMES UTF8 */;
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

DROP TABLE IF EXISTS `bookmarks`;
CREATE TABLE `bookmarks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `post_id` varchar(255) NOT NULL,
  `time_created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `bookmarks` VALUES ('1','test2','A sample blog created 1','1','2023-06-20 11:01:15'),
('2','test1','A sample blog created 1','1','2023-10-27 00:08:41'),
('3','premanand662','IoT and Industry 4.0: Driving the Fourth Industrial Revolution','2','2023-10-27 00:48:14'); 


DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `status` text NOT NULL,
  `author` text NOT NULL,
  `reason` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

INSERT INTO `category` VALUES ('3','Artificial Intelligence','Approved','test1','This is a  Web Task '),
('2','App Development','Approved','test1','This is a  Web Task '),
('1','Web Development','Approved','test1','This is a  Web Task '),
('4','Machine Learning','Approved','test1','This is a  Web Task '),
('5','Competitive Programming','Approved','test1','This is a  Web Task '),
('6','Data Structures','Approved','hariket245','Users are interested to learn more on Binary Search tree and AVL'),
('10','Computer Science','Approved','soniya389','This is a suggested category for CSE2004 Report'),
('11','Open Source','Approved','aniket305','Many contributors input'),
('26','Human Computer Interaction','Pending','premanand662','This is an important category'),
('24','Internet of Things (IoT)','Approved','test2','This should be added'); 


DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `name` varchar(200) NOT NULL,
  `tag_id` int(11) DEFAULT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO `comments` VALUES ('1','Hey Guys, <br>\r\nDo check out this blog and share your feedback so that I can post blogs on more topics of your interest. <br>\r\n\r\n<ul>\r\n<li><a href=\"https://www.linkedin.com/in/hariketsheth\">Connect with me on LinkedIn</a></li>\r\n<li><a href=\"https://instagram.com/hariket_sheth\">Follow me on Instagram</a></li>\r\n<li><a href=\"https://github.com/hariketsheth\">Collaborate on GitHub</a></li>\r\n</ul>','Hariket Sukesh Kumar Sheth','7','2','2023-06-20 11:18:39'),
('2','Hey There','Hariket Sukesh Kumar Sheth','6','1','2023-10-27 00:07:45'); 


DROP TABLE IF EXISTS `newsletter`;
CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `visitor_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

INSERT INTO `newsletter` VALUES ('1','teamhariketacoustics@gmail.com',NULL),
('2','hariketacoustics@gmail.com',NULL),
('3','sfoyqityzlbkbqqkql@nthrl.com',NULL),
('4','saptarshi.mukherjee2020@vitstudent.ac.in',NULL),
('5','saptarshi.mukherjee2020@vitstudent.ac.in',NULL),
('6','arnab.mondal2020@vitstudent.ac.in',NULL),
('7','arnab.mondal2020@vitstudent.ac.in',NULL),
('8','sudha.a@vit.ac.in',NULL),
('9','sudha.a@vit',NULL),
('10','iothincvitc@gmail.com',NULL),
('11','sudha.anbazhagan@gmail.com',NULL),
('12','mail.to.aryankumar@gmail.com',NULL),
('13','student@gmail.com',NULL),
('14','sudarsun2002@gmail.com',NULL),
('15','shethhariket@gmail.com',NULL),
('16','manasvi.mm24@gmail.com',NULL),
('17','adarsh.kumar2020@vitstudent.ac.in',NULL),
('18','premanand.hci@gmail.com',NULL),
('19','shethhariket@gmail.com',NULL),
('20','shethhariket@gmail.com',NULL); 


DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `title` text NOT NULL,
  `header` text NOT NULL,
  `content` longtext NOT NULL,
  `status` text NOT NULL,
  `reason` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

INSERT INTO `posts` VALUES ('1','test1','A sample blog created 1','https://digitalpress.fra1.cdn.digitaloceanspaces.com/1veu1vr/2021/07/office-workplace.png',' <h2 id=\"problem-statement\">Problem Statement</h2><p>You are given a very large integer <code>n</code>, represented as a string, and an integer digit <code>x</code>. The digits in <code>n</code> and the digit <code>x</code> are in the <strong><strong>inclusive</strong></strong> range <code>[1, 9]</code>, and <code>n</code> may represent a <strong><strong>negative</strong></strong> number.</p><p>You want to <strong><strong>maximize </strong></strong><code>n</code><strong><strong>\'s numerical value</strong></strong> by inserting <code>x</code> anywhere in the decimal representation of <code>n</code>. You <strong><strong>cannot</strong></strong> insert <code>x</code> to the left of the negative sign.</p><ul><li>For example, if <code>n = 73</code> and <code>x = 6</code>, it would be best to insert it between <code>7</code> and <code>3</code>, making <code>n = 763</code>.</li><li>If <code>n = -55</code> and <code>x = 2</code>, it would be best to insert it before the first <code>5</code>, making <code>n = -255</code>.</li></ul><p>Return a string representing the <strong><strong>maximum</strong></strong> value of <code>n</code> after the insertion.</p><h3 id=\"example-1\"><strong><strong><strong>Example 1</strong></strong></strong></h3><p><strong><strong>Input:</strong></strong> n = \"99\", x = 9 <strong><strong>Output:</strong></strong> \"999\" <strong><strong>Explanation:</strong></strong> The result is the same regardless of where you insert 9.</p><h3 id=\"example-2\"><strong><strong><strong>Example 2</strong></strong></strong></h3><p><strong><strong>Input:</strong></strong> n = \"-13\", x = 2 <strong><strong>Output:</strong></strong> \"-123\" <strong><strong>Explanation:</strong></strong> You can make n one of {-213, -123, -132}, and the largest of those three is -123.</p><h2 id=\"constraints\"><strong>Constraints</strong></h2><ul><li><code>1 &lt;= n.length &lt;= 10<sup>5</sup></code></li><li><code>1 &lt;= x &lt;= 9</code></li><li>The digits in <code>n</code> are in the range <code>[1, 9]</code>.</li><li><code>n</code> is a valid representation of an integer.</li></ul><h2 id=\"approach\"><strong>Approach</strong></h2><p>We recommend that you try it out at <a href=\"https://leetcode.com/problems/maximum-value-after-insertion/\" rel=\"noreferrer noopener\">https://leetcode.com/problems/maximum-value-after-insertion/</a> before reading this solution.</p><p>The basic idea is that if the given number is negative, its absolute value has to be as small as possible, but if it is positive it has the be as large as possible.</p><p>First, we check if the given number is positive or negative. We can do this by comparing n[0] with \'-\'.</p><h3 id=\"if-the-string-is-negative\"><strong>If the string is negative</strong></h3><p>When we get n[0] to be equal to \'-\', we can conclude that the string is negative. Our goal, in this case, is to minimize the absolute number so that, we can get the maximum number. This is because the lesser the negative value, the larger the number.</p><p>We know that we can get the smallest resultant number by finding a position for the new digit such that it replaces the position of a higher digit.</p><p>For example, consider the given string as -13 and the digit to be added is 2. There are three possible ways that we can insert 2 in this string. {-132, -123, -213}. Among these, we can see that we get the maximum number (or the absolute minimum) in case 2.</p><p>An easy way to find this position would be to traverse the string from left to right and find the index where (n[i] &gt; x). It is at this place that we have to insert the new digit.</p><pre><code>Assume the given string (n) to be -345 and the given digit (x) to be inserted is 6. \r\ni = 0\r\nAs n[0] = \'-\'\r\nWe take the path of the negative number. \r\n\r\ni = 1\r\nn[1]&gt;6 FALSE\r\ni++\r\n\r\ni = 2\r\nn[2]&gt;6 FALSE\r\ni++\r\n\r\ni = 3\r\nn[3]&gt;6 FALSE\r\ni++\r\n\r\nNow we come out of the loop and because we did not find any i such that n[i]&lt;6, we insert 6 at the end of the string to get the maximum number (absolute minimum number). </code></pre><h3 id=\"if-the-string-is-positive\"><strong>If the string is positive</strong></h3><p>Similar to negative numbers, we have to traverse this string from left to right and find the index where <strong>(n[i] &lt; x)</strong>. It is at this place that we insert the new digit.</p><pre><code>Assume the given string (n) to be 345 and the given digit (x) to be inserted is 6. \r\ni = 0\r\nAs n[0] != \'-\'\r\nWe take the path of the positive number. \r\n\r\ni = 0\r\nn[0]&lt;6 TRUE\r\n\r\nSo we insert 6 here to get the number as 6345. </code></pre><h2 id=\"solution-in-c\">Solution in C++</h2><pre><code class=\"language-cpp\">class Solution\r\n{\r\npublic:\r\n    string maxValue(string n, int x)\r\n    {\r\n        int len = n.size(); //Length of the string\r\n        int ans = len;      //Initially we assume that we add the new digit at the end of the string.\r\n\r\n        if (n[0] == \'-\')\r\n        {\r\n            //If the number is negative\r\n            for (int i = 1; i &lt; len; ++i)\r\n            {\r\n                if (n[i] - \'0\' &gt; x)\r\n                {\r\n                    ans = i;\r\n                    break;\r\n                }\r\n            }\r\n        }\r\n        else\r\n        {\r\n            //If the number is positive\r\n            for (int i = 0; i &lt; len; ++i)\r\n            {\r\n                if (n[i] - \'0\' &lt; x)\r\n                {\r\n                    ans = i;\r\n                    break;\r\n                }\r\n            }\r\n        }\r\n        n.insert(n.begin() + ans, x + \'0\'); //Inserting the number at the index of ans\r\n        return n;\r\n    }\r\n};</code></pre>','Published','','2023-06-21 19:02:20','1'),
('2','test2','IoT and Industry 4.0: Driving the Fourth Industrial Revolution','https://hariketsheth.vercel.app/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fiot4.9b930a12.gif&w=1920&q=75','<img alt=\"\" srcset=\"https://cdn.hashnode.com/res/hashnode/image/upload/v1675528383048/f84ae25f-0f3b-4c1a-a2c5-ae4211495854.gif?w=1600&h=840&fit=crop&crop=entropy&auto=format,compress&gif-q=60&format=webm\" width=\"1600\" height=\"420\" decoding=\"async\" data-nimg=\"1\" loading=\"lazy\" style=\"color: transparent;\">\r\n\r\n<h1>IoT and Industry 4.0: Driving the Fourth Industrial Revolution</h1>\r\n<p>The <strong>Internet of Things (IoT)</strong> and <strong>Industry 4.0</strong> are two buzzwords that have been floating around the tech world for a while now, and it\'s time to take a closer look at what they\'re all about. After all, what\'s the point of having all this futuristic technology if we can\'t have a little fun with it?</p>\r\n<p>First things first, let\'s talk about <strong>IoT</strong>. It\'s the idea that every single device we own, from our toaster to our yoga mat, will eventually be connected to the internet. This means that our devices can collect and share data, making our lives easier and more convenient. Want to know how many times you snoozed your alarm this week? Just ask your smartwatch!</p>\r\n<p>Next up, we have <strong>Industry 4.0</strong>, which is all about transforming the way we manufacture goods. Basically, it\'s like upgrading from a horse and buggy to a Tesla, but for factories. By connecting all the machines in a factory and automating processes, we can make manufacturing faster, more efficient, and less wasteful. Who knew that the key to a better future was just a few wires and some computer magic?</p>\r\n<h2>Connection between IoT and Industry 4.0</h2>\r\n<p>So what\'s the connection between IoT and Industry 4.0? Well, think of IoT as the ingredients and Industry 4.0 as the recipe. When you put them together, you get a recipe for revolutionizing the manufacturing industry! With IoT devices, factories can collect data in real-time, making it possible to automate tasks and make better use of data. This leads to increased efficiency, lower costs, and the ability to quickly respond to changes in the market. It\'s like having a crystal ball that predicts what products you should be making!</p>\r\n<p>IoT and Industry 4.0 - the dynamic duo of the manufacturing world. Think of IoT as the sidekick and Industry 4.0 as the superhero - together, they\'re making factories faster, more efficient, and more flexible than ever before!</p>\r\n<p>The connection between the two is simple - IoT devices collect data and Industry 4.0 uses that data to automate processes and make smart decisions. It\'s like having a supercomputer in your factory that knows exactly what to do! For example, an IoT sensor on a machine can detect when it\'s about to break down and automatically send a maintenance request, saving precious time and avoiding costly downtime.</p>\r\n<p><img src=\"https://www.wipro.com/content/dam/nexus/en/service-lines/product-engineering/infographics/iot-in-the-manufacturing-industry-enabling-industry-4-0-1.png\" alt=\"IoT in the Manufacturing Industry Enabling Industry 4.0 - Wipro\"></p>\r\n<h2>Latest Updates</h2>\r\n<p>Now, let\'s talk about the latest updates. It\'s no secret that the world of technology is constantly evolving, and IoT and Industry 4.0 are no exception.</p>\r\n<ul>\r\n<li>\r\n<p>1. <strong>EDGE COMPUTING:</strong> One of the hottest trends right now is the use of <strong>edge computing</strong>, which allows data to be processed closer to the source. This is especially useful for IoT devices in remote or hard-to-reach areas, like oil rigs or wind turbines. With edge computing, data can be analyzed quickly and decisions can be made in real-time. It\'s like having a mini-factory control room right on the factory floor!</p>\r\n<ul>\r\n<li>Edge computing allows data to be processed closer to the source, instead of being sent to a remote server for analysis. This is especially useful for IoT devices in remote or hard-to-reach locations, such as oil rigs or wind turbines. With edge computing, data can be analyzed quickly, and decisions can be made in real-time, leading to increased efficiency and lower latency.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<ol>\r\n<li>\r\n<p><strong>5G TECHNOLOGY:</strong> Another trend that\'s making waves is the use of <strong>5G technology</strong>. With its lightning-fast speeds and low latency, 5G is perfect for IoT devices that need to communicate with each other in real-time. This means that factories can run even more smoothly, with machines communicating seamlessly and making split-second decisions.</p>\r\n<ul>\r\n<li>5G is the latest and greatest in mobile networks, offering lightning-fast speeds and low latency. This makes it perfect for IoT devices that need to communicate with each other in real-time. For example, in a factory setting, 5G-enabled IoT devices can communicate seamlessly and make split-second decisions, leading to increased efficiency and better decision-making.</li>\r\n</ul>\r\n</li>\r\n</ol>\r\n</li>\r\n<li>\r\n<ol>\r\n<li><strong>AI AND MACHINE LEARNING:</strong> AI and machine learning are becoming increasingly important in the world of IoT and Industry 4.0. By analyzing data from IoT devices, AI can make predictions and identify patterns, allowing factories to make smarter decisions and automate processes. For example, an AI system can predict when a machine is likely to break down and schedule maintenance accordingly, preventing downtime and saving money.</li>\r\n</ol>\r\n</li>\r\n<li>\r\n<ol>\r\n<li><strong>CYBER SECURITY:</strong> As the number of connected devices continues to grow, so too does the importance of cybersecurity. IoT devices are vulnerable to hacking, and it\'s important to ensure that they are secure to protect sensitive data and prevent unauthorized access. Industry 4.0 is taking cybersecurity seriously, with companies investing in technologies such as blockchain and encryption to protect their networks.</li>\r\n</ol>\r\n</li>\r\n<li>\r\n<ol>\r\n<li><strong>AUGMENTED REALITY AND VIRTUAL REALITY:</strong> Augmented and virtual reality are becoming increasingly important in the world of Industry 4.0, allowing workers to visualize and interact with data in new and exciting ways. For example, a worker can use augmented reality to view real-time data on a machine, making it easier to diagnose and fix problems.</li>\r\n</ol>\r\n</li>\r\n</ul>\r\n<h2>Different Perspective about IoT and Industry 4.0</h2>\r\n<p><strong>How is IoT driving the fourth industrial revolution?</strong><br>\r\nWell, let\'s just say that IoT is the DJ and Industry 4.0 is the dance floor - together they\'re making the factories of the future come to life! Here\'s how it works:</p>\r\n<p>IoT devices collect data from the <strong>factory floor</strong> and send it to the <strong>control room</strong>, where Industry 4.0 uses that data to make smart decisions. It\'s like having a <strong>party planner</strong> that knows exactly what the guests need - when a machine needs maintenance, Industry 4.0 gets the party started by sending a request to the maintenance team. <strong>No more downtime, no more delays</strong> - just smooth, efficient operation!</p>\r\n<p>IoT devices are like the <strong>paparazzi,</strong> always on the lookout for information. They gather data on everything from machine performance to energy usage, giving Industry 4.0 a 360-degree view of the factory floor. And with the latest trends in edge computing and 5G technology, the data is analyzed quickly and decisions are made in real-time - it\'s like having a party that never ends!</p>\r\n<p>AI and machine learning are like the <strong>cool kids at the party</strong> - they add a whole new level of excitement! By analyzing data from IoT devices, AI can make predictions and identify patterns, allowing Industry 4.0 to make even smarter decisions.</p>\r\n<p>Cybersecurity is like the <strong>bouncer at the party</strong> - making sure that everything stays safe and secure. With more and more connected devices on the factory floor, it\'s important to ensure that the data is protected from hackers and unauthorized access. Industry 4.0 is taking this seriously, investing in technologies like <strong>blockchain and encryption</strong> to keep the party going without any interruptions.</p>\r\n<blockquote>\r\n<p>So there you have it - IoT and Industry 4.0, the dynamic duo of the manufacturing world. With their ability to collect data, automate processes, and make smart decisions, they\'re making factories faster, more efficient, and more flexible than ever before. And who knows what the future will bring, but with these two on the job, I am sure it\'ll be a dance party like no other!</p>\r\n</blockquote>\r\n<h2>Advantages, Oh Mighty!</h2>\r\n<p>IoT and Industry 4.0 offer numerous advantages that are transforming the way we do business. Here are some of the key benefits:</p>\r\n<ol>\r\n<li>\r\n<p><strong>Increased Efficiency:</strong> IoT devices can collect real-time data and provide insights that can be used to optimize processes and increase efficiency. For example, IoT sensors can monitor machinery and alert maintenance teams when they need attention, reducing downtime and improving production.</p>\r\n<blockquote>\r\n<p>It\'s like getting all your friends to help you decorate your house for a party. With everyone working together, you can get the job done faster and more efficiently. That\'s what IoT devices do in the factory. By collecting data and communicating with each other, they can help optimize processes and make everything run smoother.</p>\r\n</blockquote>\r\n</li>\r\n<li>\r\n<p><strong>Predictive Maintenance:</strong> With the data collected by IoT devices, Industry 4.0 systems can predict when machinery will need maintenance, allowing companies to plan and schedule maintenance more effectively. This can reduce the costs associated with unexpected downtime and improve the overall performance of the equipment.</p>\r\n<blockquote>\r\n<p>It\'s like getting a weather forecast before your outdoor party. You know if it\'s going to rain, so you can plan accordingly. IoT devices do the same thing in the factory. By monitoring machinery and predicting when it will need maintenance, they help companies plan and schedule maintenance more effectively, reducing downtime and increasing efficiency.</p>\r\n</blockquote>\r\n</li>\r\n<li>\r\n<p><strong>Personalized Products and Services:</strong> IoT devices can collect data about individual preferences and usage patterns, which can be used to create personalized products and services. For example, an IoT-enabled coffee machine could suggest coffee flavors based on a user\'s preferred tastes and order history.</p>\r\n<blockquote>\r\n<p>It\'s like your best friend remembering your favorite ice cream flavor. With IoT devices, companies can remember and use your personal preferences to offer customized products and services. For example, an IoT-enabled coffee machine could suggest coffee flavors based on your preferred tastes and order history.</p>\r\n</blockquote>\r\n</li>\r\n<li>\r\n<p><strong>Improved Supply Chain Management:</strong> IoT devices can provide real-time tracking and monitoring of products as they move through the supply chain. This can help companies identify bottlenecks and optimize their operations, improving delivery times and reducing costs.</p>\r\n<blockquote>\r\n<p>It\'s like having a GPS tracker on a package you\'re sending to a friend. You can track its progress and know exactly when it will arrive. That\'s what IoT devices do in the supply chain. By providing real-time tracking and monitoring of products, they help companies identify bottlenecks and optimize their operations, improving delivery times and reducing costs.</p>\r\n</blockquote>\r\n</li>\r\n<li>\r\n<p><strong>Real-Time Data:</strong> IoT devices can provide real-time data about everything from production processes to customer preferences. This data can be analyzed in real-time, allowing companies to make informed decisions and respond quickly to changing market conditions.</p>\r\n<blockquote>\r\n<p>It\'s like having a live update on the number of guests arriving at your party. You always know how many people to expect. IoT devices provide real-time data about everything from production processes to customer preferences. This data can be analyzed in real-time, allowing companies to make informed decisions and respond quickly to changing market conditions.</p>\r\n</blockquote>\r\n</li>\r\n<li>\r\n<p><strong>Improved Safety:</strong> IoT devices can be used to monitor hazardous environments and alert workers to potential safety hazards, improving overall safety conditions.</p>\r\n<blockquote>\r\n<p>It\'s like having a designated driver at your party. They make sure everyone gets home safely. IoT devices do the same thing in the factory. By monitoring hazardous environments and alerting workers to potential safety hazards, they help improve overall safety conditions.</p>\r\n</blockquote>\r\n</li>\r\n<li>\r\n<p><strong>Better Customer Experience:</strong> IoT devices can collect data about customer preferences and usage patterns, which can be used to create a more personalized and satisfying customer experience.</p>\r\n<blockquote>\r\n<p>It\'s like having your favorite drink waiting for you at the bar. Companies can use the data collected by IoT devices to create a more personalized and satisfying customer experience. For example, an IoT-enabled retail store could suggest products based on your previous purchases and interests.</p>\r\n</blockquote>\r\n</li>\r\n</ol>\r\n<h2>Challenges, Ofcourse !</h2>\r\n<p><img src=\"https://cdn.hashnode.com/res/hashnode/image/upload/v1675531840274/f62279f1-ff95-4ed6-b27f-28674da3b7a8.png\" alt=\"\"></p>\r\n<p>Ah, challenges - just like the speed bump at a dance party! But fear not, because with the right moves, we can overcome these challenges and keep the IoT and Industry 4.0 party going strong!</p>\r\n<ol>\r\n<li>\r\n<p><strong>Data Overload:</strong> First up, we have the issue of data overload. With all those IoT devices collecting data, it\'s like trying to dance in a room filled with balloons - you\'ve got to keep your balance! To handle all this data, we need to make sure we have the right infrastructure in place, such as cloud computing and edge computing, to process and store all this information.</p>\r\n</li>\r\n<li>\r\n<p><strong>Cybersecurity:</strong> Next, we have the challenge of cybersecurity. Just like the bouncer at a party, we need to make sure that all the information is secure and protected from those who would like to crash the party! Industry 4.0 is investing in technologies like blockchain and encryption to keep the data safe and secure.</p>\r\n</li>\r\n<li>\r\n<p><strong>Communication:</strong> Another challenge is getting all the IoT devices to talk to each other. It\'s like trying to get all the guests at a party to mingle and have a good time - everyone has to be on the same page! To solve this, we need to make sure that all the devices are using the same language and protocols, so they can exchange information seamlessly.</p>\r\n</li>\r\n<li>\r\n<p><strong>Integration:</strong> integrating legacy systems with IoT and Industry 4.0. It\'s like trying to get your grandpa to dance to the latest pop hit - it might take a little coaxing, but it\'s worth it in the end! By carefully integrating legacy systems with IoT and Industry 4.0, we can ensure a smooth and seamless transition to the factories of the future.</p>\r\n</li>\r\n<li>\r\n<p><strong>Human Interaction:</strong> The fourth industrial revolution relies heavily on automation and machines, but it\'s important to remember that humans are still a crucial part of the process. Ensuring that the workers have the right skills and training to work with the new technology is a challenge that must be addressed.</p>\r\n<blockquote>\r\n<p>Think of it like learning a new dance move. Just like you need to practice and have the right instructor, factory workers need to have the right skills and training to work with the new technology.</p>\r\n</blockquote>\r\n</li>\r\n</ol>\r\n<h2>Conclusion</h2>\r\n<p>In conclusion, IoT and Industry 4.0 are taking the industrial world by storm and transforming the way we do business. Think of it like a superhero duo, with IoT as the \"Iron Man\" and Industry 4.0 as the \"Captain America.\" Together, they\'re making industrial processes faster, more efficient, and safer than ever before. From predictive maintenance to improved safety, the benefits of this technology are like a tool belt full of high-tech gadgets that make your work life easier and more productive.</p>\r\n<p>But, as with any superhero duo, it\'s important to remember to use their powers for good. It\'s up to us to make sure that the integration of IoT and Industry 4.0 is used ethically and responsibly, to create a better future for everyone. After all, we don\'t want the industrial world to become the next Thanos, now do we?</p>\r\n<p>In short, IoT and Industry 4.0 are the dynamic duo of the industrial world, bringing their powers to the table and transforming the way we do business. Food for thought: How can we use their powers to create a better tomorrow? The future is bright and the possibilities are endless. Let\'s use this technology to make the world a better place, one innovation at a time!</p>\r\n<p><img src=\"https://www.syfy.com/sites/syfy/files/styles/amp_featured_image/public/2021/10/capaim2021001014_col.jpg?h=84efe9b0\" alt=\"Exclusive: Captain America/Iron Man writer Derek Landy on \'tightrope\' of  comic | SYFY WIRE\"></p>','Published','','2023-06-21 18:38:50','24'),
('10','premanand662','Human Computer Interaction: Module 4','https://cdn.analyticsvidhya.com/wp-content/uploads/2023/05/HCI-300x286.png','<p>This is the sample text</p>\r\n\r\n<p><strong>This is the bold text<u>&nbsp;Underlining it</u></strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:center\">This is center</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Subject</td>\r\n			<td>Name</td>\r\n			<td>Marks</td>\r\n		</tr>\r\n		<tr>\r\n			<td>HCI</td>\r\n			<td>ABCD</td>\r\n			<td>90</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Maths</td>\r\n			<td>DEF</td>\r\n			<td>100</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><input name=\"Read Terms and Conditions\" required=\"required\" type=\"checkbox\" value=\"Terms and Conditions\" /></p>\r\n\r\n<pre>\r\n<code class=\"language-python\">a = input()\r\nprint(\"Hello World\")\r\n\r\nprint(\"Hello\")\r\n</code></pre>\r\n\r\n<p>&nbsp;</p>\r\n','Pending',NULL,'2023-10-27 00:43:44','10'); 


DROP TABLE IF EXISTS `pwd_change`;
CREATE TABLE `pwd_change` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `codekey` varchar(255) NOT NULL,
  `password_change` varchar(255) NOT NULL,
  `time_s_pwd` timestamp NOT NULL DEFAULT current_timestamp(),
  `time_e_pwd` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`username`),
  UNIQUE KEY `id` (`id`,`username`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO `pwd_change` VALUES ('1','test1','5694e54458ba800d754f0ce9e3c3cf8e','\"enabled\"','2023-06-20 00:00:00','2023-07-21 00:00:00'),
('2','hariketsheth','c9558c37ad15329bbd1e1a9f7c4c9d06','\"enabled\"','2023-06-21 11:51:48','2023-06-21 11:51:48'),
('6','premanand662','5694e54458ba800d754f0ce9e3c3cf8e','\"disabled\"','2023-10-27 00:00:00','2023-11-27 00:00:00'); 


DROP TABLE IF EXISTS `ratings`;
CREATE TABLE `ratings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) NOT NULL,
  `mac_adress` varchar(255) NOT NULL,
  `post_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `time_created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS `reports`;
CREATE TABLE `reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `mac_address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO `tags` VALUES ('1','Approved','2021-11-03 04:35:38'),
('2','Improvement','2021-11-03 04:35:38'),
('3','Best','2021-11-03 04:35:58'),
('4','Hatred','2021-11-03 04:35:58'),
('5','Spam','2021-11-03 04:36:17'),
('6','Enhancement','2021-11-03 04:36:17'),
('7','Author\'s Pinned','2023-06-20 11:27:46'),
('8','Uplifting','2021-11-03 04:36:43'),
('9','Helpful','2021-11-03 04:37:10'),
('10','Optimistic','2021-11-03 04:37:10'); 


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
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
  `postingdate` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`username`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `email_full` (`email`),
  UNIQUE KEY `email_full_2` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO `users` VALUES ('1','test1','5694e54458ba800d754f0ce9e3c3cf8e','#LearnWithHariket','Hariket Sukesh Kumar Sheth','Hariket','+91-9012312902','male','hariketdwij@gmail.com','\"mailto:hariketdwij@gmail.com\"','https://avatars.githubusercontent.com/u/72455881?v=4','active','Admin','active','87df76bf6bb0815f9bc5bba92c171555','1','Hariket Sukesh Kumar Sheth, a sophomore student pursuing Bachelor\'s Degree in Computer Science and Engineering at Vellore Institute of Technology, Chennai. Highly interested in fields such as Artificial Intelligence, Machine learning, Cloud Computing and Cyber Physical Systems.','hariketsheth','HariketAcoustics','https://www.linkedin.com/in/hariketsheth','https://www.facebook.com/HariketAcoustics','HariketSheth','https://hariketsheth.github.io','2021-08-03 12:48:18'),
('2','test2','5694e54458ba800d754f0ce9e3c3cf8e','Hariket Sheth','Hariket Sukesh Kumar Sheth','Hariket','+91-7012335112','male','shethhariket1@gmail.com','\"mailto:shethhariket1@gmail.com\"','https://media.licdn.com/dms/image/D5603AQHgs_oi5_p3nw/profile-displayphoto-shrink_800_800/0/1685394520664?e=2147483647&v=beta&t=9vkCPJd8d_JuK6QK4sXWSbzyyYUxrvzcAdIKZSwCwKc','active','Contributor','active','f8f3687f668f502895e352c2a86909e3','1','Aspiring Software Developer with expertise in Web Development, DSA, Data Science, & Cloud Deployment. Ranked number 1 in BTech CSE, have a strong academic background in Computer Science and Engineering (CSE). Detail-oriented, responsible, and have a proven track record of delivering high-quality software products on time. Passionate about solving complex problems and collaborating with cross-functional teams to develop innovative solutions.','hariketsheth','hariket_sheth','https://www.linkedin.com/in/hariketsheth','https://facebook.com/HariketSheth','HariketSheth','https://hariketsheth.vercel.app','2023-06-20 10:48:32'),
('3','hariketsheth','cdd4c62684d25e134edf838f27fd73b9','Hariket','Hariket HCI','Hariket','+91-4569012345','male','manasvi.mm24@gmail.com','\"mailto:manasvi.mm24@gmail.com\"','https://bit.ly/3Cb76ZO','active','Editor','active','8234653f56fadcdaf1797b70ea5704ce','1',NULL,'manasvi_mm24','','','','','','2023-06-21 11:51:48'),
('7','premanand662','5694e54458ba800d754f0ce9e3c3cf8e','SecretWriter','Premanand V','Premanand','+91-9878909081','male','shethhariket@gmail.com','\"mailto:shethhariket@gmail.com\"','https://bit.ly/3xgJuiM','active','Contributor','active','401d0b2e9fcd55d705943eb9159574d0','1','This is my official account','premanandV','','','','','','2023-10-27 00:28:18'); 


DROP TABLE IF EXISTS `visitors`;
CREATE TABLE `visitors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) NOT NULL,
  `mac_address` text NOT NULL,
  `link` text NOT NULL,
  `time_created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=351 DEFAULT CHARSET=latin1;

INSERT INTO `visitors` VALUES ('1','49.36.103.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/post.php?post_link=29','2023-06-20 20:10:02'),
('2','49.36.103.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/post.php?post_link=29','2023-06-20 20:10:07'),
('3','49.36.103.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-06-20 20:10:12'),
('4','49.36.103.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/post.php?post_link=1','2023-06-20 20:10:26'),
('5','49.36.103.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/post.php?post_link=29','2023-06-20 20:10:29'),
('6','49.36.103.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-06-20 20:10:52'),
('7','49.36.103.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/index.php','2023-06-20 20:11:33'),
('8','49.36.103.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/post.php?post_link=20','2023-06-20 20:15:52'),
('9','49.36.103.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-06-20 20:17:20'),
('10','49.36.103.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-06-20 20:17:44'),
('11','49.36.103.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/index.php','2023-06-20 20:18:39'),
('12','49.36.103.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-06-20 20:24:57'),
('13','49.36.103.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-06-20 20:31:10'),
('14','49.36.103.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/post.php?post_link=1','2023-06-20 20:31:13'),
('15','49.36.103.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/post.php?post_link=1','2023-06-20 20:31:19'),
('16','49.36.103.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/index.php','2023-06-20 20:31:56'),
('17','49.36.103.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-06-20 20:32:51'),
('18','49.36.103.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-06-20 20:35:32'),
('19','49.36.103.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/preview.php?post_link=2','2023-06-20 20:36:17'),
('20','49.36.103.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/preview.php?post_link=2','2023-06-20 20:42:08'),
('21','49.36.103.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/preview.php?post_link=2','2023-06-20 20:43:40'),
('22','49.36.103.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/preview.php?post_link=2','2023-06-20 20:45:09'),
('23','49.36.103.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/preview.php?post_link=2','2023-06-20 20:45:36'),
('24','49.36.103.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/preview.php?post_link=2','2023-06-20 20:45:57'),
('25','49.36.103.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/preview.php?post_link=2','2023-06-20 20:46:16'),
('26','49.36.103.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/preview.php?post_link=2','2023-06-20 20:47:38'),
('27','49.36.103.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/preview.php?post_link=2','2023-06-20 20:48:03'),
('28','49.36.103.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/index.php','2023-06-20 20:48:06'),
('29','49.36.103.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/post.php?post_link=2','2023-06-20 20:48:15'),
('30','49.36.103.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/post.php?post_link=2','2023-06-20 20:48:41'),
('31','49.36.103.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/post.php?post_link=2','2023-06-20 20:49:11'),
('32','49.36.103.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/index.php','2023-06-20 20:49:12'),
('33','49.36.103.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/preview.php?post_link=2','2023-06-20 20:49:13'),
('34','49.36.103.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-06-20 20:49:43'),
('35','49.36.103.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/post.php?post_link=2','2023-06-20 20:49:50'),
('36','49.36.103.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/post.php?post_link=2','2023-06-20 20:51:20'),
('37','49.36.103.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/post.php?post_link=2','2023-06-20 20:51:44'),
('38','49.36.103.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/post.php?post_link=2','2023-06-20 20:52:45'),
('39','49.36.103.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/post.php?post_link=2','2023-06-20 20:54:13'),
('40','49.36.103.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/post.php?post_link=2','2023-06-20 20:56:03'),
('41','49.36.103.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/post.php?post_link=2','2023-06-20 20:56:41'),
('42','49.36.103.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/post.php?post_link=2','2023-06-20 20:57:52'),
('43','49.36.103.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/post.php?post_link=2','2023-06-20 20:58:12'),
('44','49.36.103.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/post.php?post_link=2','2023-06-20 20:58:30'),
('45','49.36.97.255','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-06-21 12:23:27'),
('46','49.36.97.255','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/post.php?post_link=1','2023-06-21 12:23:45'),
('47','49.36.97.255','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-06-21 12:23:50'),
('48','49.36.97.255','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/post.php?post_link=2','2023-06-21 12:23:52'),
('49','49.36.97.255','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-06-21 12:30:48'),
('50','49.36.97.255','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/post.php?post_link=2','2023-06-21 12:30:51'),
('51','49.36.97.255','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-06-21 12:31:43'),
('52','49.36.97.255','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/preview.php?post_link=2','2023-06-21 12:32:31'),
('53','49.36.97.255','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/index.php','2023-06-21 14:33:37'),
('54','49.36.97.255','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/preview.php?post_link=2','2023-06-21 14:47:38'),
('55','49.36.97.255','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/preview.php?post_link=2','2023-06-21 14:48:18'),
('56','49.36.97.255','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/preview.php?post_link=2','2023-06-21 14:49:16'),
('57','49.36.97.255','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','pdc-fallsem.42web.io/?i=1','2023-06-21 15:41:56'),
('58','49.36.97.255','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','pdc-fallsem.42web.io/?i=1','2023-06-21 15:42:18'),
('59','49.36.97.255','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','pdc-fallsem.42web.io/?i=1','2023-06-21 15:42:19'),
('60','49.36.97.255','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','pdc-fallsem.42web.io/post.php?post_link=1','2023-06-21 15:42:23'),
('61','49.36.97.255','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-06-21 15:49:19'),
('62','49.36.97.255','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','pdc-fallsem.42web.io/','2023-06-21 15:57:06'),
('63','49.36.97.255','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-06-21 17:28:47'),
('64','49.36.97.255','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-06-21 18:16:27'),
('65','49.36.97.255','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-06-21 19:02:41'),
('66','49.36.97.255','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/post.php?post_link=1','2023-06-21 19:02:46'),
('67','49.36.97.255','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/index.php','2023-06-21 21:21:05'),
('68','49.36.97.255','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/index.php','2023-06-21 21:21:56'),
('69','49.36.97.255','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/index.php','2023-06-21 21:22:30'),
('70','49.36.97.255','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-06-21 21:23:27'),
('71','49.36.97.255','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-06-21 21:24:07'),
('72','49.36.97.255','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-06-21 21:24:33'),
('73','49.36.97.255','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/post.php?post_link=2','2023-06-21 21:24:46'),
('74','192.133.77.18','Twitterbot/1.0','athena-dbms.42web.io/post.php?post_link=2','2023-06-21 21:25:02'),
('75','49.36.97.255','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-06-22 00:09:36'),
('76','49.36.97.255','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-06-22 00:41:23'),
('77','49.36.97.255','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/index.php','2023-06-22 00:41:40'),
('78','49.36.97.255','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/index.php','2023-06-22 00:42:41'),
('79','220.245.56.58','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) HeadlessChrome/110.0.5478.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-06-22 06:40:08'),
('80','103.136.95.70','Mozilla/5.0 (Linux; Android 13; RMX3392) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Mobile Safari/537.36','athena-dbms.42web.io/?i=1','2023-06-26 08:35:28'),
('81','40.77.190.133','Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/112.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=3','2023-06-27 11:01:29'),
('82','115.242.251.74','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-06-27 11:24:18'),
('83','40.77.188.32','Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/112.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=2','2023-07-03 06:10:21'),
('84','66.249.66.14','Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.5735.179 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','athena-dbms.42web.io/','2023-07-03 10:30:54'),
('85','66.249.66.12','Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.84 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','athena-dbms.42web.io/','2023-07-03 10:31:13'),
('86','66.249.66.12','Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','athena-dbms.42web.io/','2023-07-03 10:31:14'),
('87','66.249.66.12','Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','athena-dbms.42web.io/','2023-07-03 11:18:51'),
('88','49.36.111.78','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-07-11 18:51:32'),
('89','49.36.111.78','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-07-11 18:58:47'),
('90','205.169.39.253','Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36','athena-dbms.42web.io/?i=1','2023-07-11 22:50:14'),
('91','205.169.39.253','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.79 Safari/537.36','athena-dbms.42web.io/?i=1','2023-07-11 22:50:37'),
('92','65.154.226.171','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) HeadlessChrome/112.0.5615.121 Safari/537.36','athena-dbms.42web.io/?i=1','2023-07-11 22:59:56'),
('93','34.254.53.125','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/114.0','www.athena-dbms.42web.io/?i=1','2023-07-12 01:33:40'),
('94','35.213.203.149','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko; compatible; BW/1.1; bit.ly/3eZNDnO; 7ef709fdc0) Chrome/84.0.4147.105 Safari/537.36','athena-dbms.42web.io/?i=1','2023-07-19 17:09:47'),
('95','27.122.61.27','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36/8vfJ8dsw-50','athena-dbms.42web.io/?i=1','2023-07-20 09:41:29'),
('96','49.36.187.56','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-07-23 02:51:39'),
('97','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-07-29 19:46:09'),
('98','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-07-29 20:22:40'),
('99','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','athena-dbms.42web.io/post.php?post_link=2','2023-07-29 20:23:04'),
('100','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-07-29 20:52:05'),
('101','49.37.195.30','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36 Edg/115.0.1901.183','athena-dbms.42web.io/?i=1','2023-07-29 21:38:09'),
('102','49.37.195.30','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36 Edg/115.0.1901.183','athena-dbms.42web.io/post.php?post_link=1','2023-07-29 21:38:22'),
('103','223.185.125.165','Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Mobile Safari/537.36','athena-dbms.42web.io/?i=1','2023-07-31 15:42:44'),
('104','220.158.183.14','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36 Edg/115.0.1901.188','athena-dbms.42web.io/?i=1','2023-07-31 23:01:33'),
('105','220.158.183.14','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36 Edg/115.0.1901.188','athena-dbms.42web.io/index.php','2023-07-31 23:01:49'),
('106','65.154.226.169','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) HeadlessChrome/114.0.5735.198 Safari/537.36','www.athena-dbms.42web.io/?i=1','2023-08-01 22:33:05'),
('107','65.154.226.167','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) HeadlessChrome/114.0.5735.198 Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-01 22:36:20'),
('108','223.187.119.147','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 OPR/100.0.0.0','athena-dbms.42web.io/?i=1','2023-08-02 01:54:18'),
('109','223.187.119.147','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 OPR/100.0.0.0','athena-dbms.42web.io/index.php','2023-08-02 01:54:37'),
('110','182.79.4.252','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-05 19:06:17'),
('111','182.79.4.252','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','athena-dbms.42web.io/index.php','2023-08-05 19:06:29'),
('112','111.93.74.158','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-06 19:54:03'),
('113','111.93.74.158','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','athena-dbms.42web.io/index.php','2023-08-06 19:54:41'),
('114','223.178.87.72','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-07 15:07:27'),
('115','223.178.87.72','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','athena-dbms.42web.io/index.php','2023-08-07 15:07:45'),
('116','223.178.87.72','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','athena-dbms.42web.io/index.php','2023-08-07 15:07:50'),
('117','223.178.87.72','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','athena-dbms.42web.io/post.php?post_link=2','2023-08-07 15:08:06'),
('118','136.233.9.107','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-11 11:47:56'),
('119','49.36.220.75','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-16 16:21:07'),
('120','49.36.220.75','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','athena-dbms.42web.io/index.php','2023-08-16 16:23:16'),
('121','152.57.174.38','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-16 19:25:13'),
('122','49.37.72.53','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36 Edg/115.0.1901.203','athena-dbms.42web.io/?i=1','2023-08-16 19:51:15'),
('123','117.239.185.165','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-16 23:26:23'),
('124','117.239.185.165','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36','athena-dbms.42web.io/index.php','2023-08-16 23:26:46'),
('125','223.233.84.49','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-16 23:45:46'),
('126','43.241.64.2','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-16 23:51:07'),
('127','117.99.243.171','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-17 00:33:52'),
('128','117.99.243.171','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','athena-dbms.42web.io/index.php','2023-08-17 00:34:10'),
('129','117.99.243.171','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','athena-dbms.42web.io/post.php?post_link=2','2023-08-17 00:34:17'),
('130','122.171.17.189','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-17 10:09:15'),
('131','223.233.64.167','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-17 13:46:55'),
('132','106.195.1.65','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-17 14:35:53'),
('133','112.196.62.6','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-17 19:45:26'),
('134','49.36.27.157','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-17 20:26:17'),
('135','49.36.27.157','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-17 20:26:37'),
('136','49.36.27.157','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','athena-dbms.42web.io/index.php','2023-08-17 20:26:39'),
('137','49.36.27.157','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-17 20:26:41'),
('138','27.4.113.59','Mozilla/5.0 (X11; CrOS x86_64 14541.0.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-18 08:12:25'),
('139','49.43.216.38','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-18 08:21:53'),
('140','49.43.216.38','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-18 08:22:27'),
('141','49.43.216.38','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-18 08:22:34'),
('142','49.43.216.38','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-18 08:22:53'),
('143','49.43.216.38','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','athena-dbms.42web.io/post.php?post_link=1','2023-08-18 08:22:55'),
('144','49.43.216.38','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-18 08:23:09'),
('145','49.43.216.38','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','athena-dbms.42web.io/post.php?post_link=2','2023-08-18 08:23:13'),
('146','49.43.216.38','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-18 08:23:40'),
('147','123.6.49.42','Mozilla/5.0 (Linux; Android 8.0; Pixel 2 Build/OPD3.170816.012) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Mobile Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-18 12:35:20'),
('148','183.82.152.228','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-18 15:56:12'),
('149','110.226.160.19','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/116.0','athena-dbms.42web.io/?i=1','2023-08-18 17:32:47'),
('150','110.226.160.19','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/116.0','athena-dbms.42web.io/index.php','2023-08-18 17:33:35'),
('151','103.211.18.206','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-18 18:50:15'),
('152','152.58.77.250','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-18 18:56:48'),
('153','103.211.15.206','Mozilla/5.0 (Linux; Android 13; SAMSUNG SM-E625F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/22.0 Chrome/111.0.5563.116 Mobile Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-18 20:54:16'),
('154','104.28.233.88','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-08-19 00:00:38'),
('155','104.28.233.88','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','athena-dbms.42web.io/post.php?post_link=2','2023-08-19 00:01:09'),
('156','43.241.193.246','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-19 12:48:20'),
('157','49.36.71.78','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-19 14:36:23'),
('158','49.36.71.78','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','athena-dbms.42web.io/index.php','2023-08-19 14:36:50'),
('159','110.235.232.98','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-19 15:16:22'),
('160','72.228.175.119','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.1 Safari/605.1.15','athena-dbms.42web.io/?i=1','2023-08-19 19:45:38'),
('161','72.228.175.119','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.1 Safari/605.1.15','athena-dbms.42web.io/index.php','2023-08-19 19:45:53'),
('162','103.235.2.149','Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Mobile Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-20 14:31:52'),
('163','103.235.2.149','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-08-20 14:32:24'),
('164','23.19.74.164','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-20 16:54:37'),
('165','42.105.10.229','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-20 20:26:48'),
('166','42.105.10.229','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-08-20 20:27:25'),
('167','117.222.196.192','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-21 22:17:37'),
('168','121.200.55.35','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-22 13:57:29'),
('169','49.37.112.37','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-23 00:58:42'),
('170','49.37.112.37','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','athena-dbms.42web.io/index.php','2023-08-23 00:59:15'),
('171','110.235.230.160','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/116.0','athena-dbms.42web.io/?i=1','2023-08-23 03:02:39'),
('172','110.235.230.160','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/116.0','athena-dbms.42web.io/index.php','2023-08-23 03:03:14'),
('173','110.235.230.160','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/116.0','athena-dbms.42web.io/index.php','2023-08-23 03:03:18'),
('174','110.235.230.160','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/116.0','athena-dbms.42web.io/post.php?post_link=1','2023-08-23 03:04:32'),
('175','52.24.67.13','Mozilla/5.0 (Linux; Android 13; SM-A037U) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Mobile Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-23 15:16:10'),
('176','154.30.116.31','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-23 15:23:46'),
('177','205.169.39.209','Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-23 17:00:36'),
('178','205.169.39.209','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.79 Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-23 17:01:04'),
('179','44.195.244.245','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) HeadlessChrome/113.0.5672.53 Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-23 18:14:07'),
('180','18.204.233.163','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) HeadlessChrome/113.0.5672.53 Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-23 19:18:08'),
('181','65.154.226.170','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) HeadlessChrome/115.0.5790.170 Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-23 22:07:29'),
('182','18.204.233.163','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) HeadlessChrome/113.0.5672.53 Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-24 12:14:06'),
('183','47.9.68.252','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-24 20:02:26'),
('184','47.9.68.252','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36','athena-dbms.42web.io/index.php','2023-08-24 20:02:42'),
('185','47.9.68.252','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36','athena-dbms.42web.io/index.php','2023-08-24 20:02:45'),
('186','47.9.68.252','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36','athena-dbms.42web.io/index.php','2023-08-24 20:02:59'),
('187','198.50.163.55','Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-24 20:26:40'),
('188','20.163.64.196','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.67 Safari/537.36','athena-dbms.42web.io/?i=1','2023-08-28 02:36:37'),
('189','20.163.64.196','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36','athena-dbms.42web.io/post.php?post_link=1&i=1','2023-08-28 02:37:48'),
('190','20.163.64.196','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36','athena-dbms.42web.io/post.php?post_link=2&i=1','2023-08-28 02:37:48'),
('191','152.58.223.225','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-09-05 01:41:45'),
('192','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-09-05 09:18:26'),
('193','171.78.164.107','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/117.0','athena-dbms.42web.io/?i=1','2023-09-12 00:18:37'),
('194','171.78.164.107','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/117.0','athena-dbms.42web.io/','2023-09-12 00:18:37'),
('195','171.78.164.107','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/117.0','athena-dbms.42web.io/index.php','2023-09-12 00:18:59'),
('196','47.128.52.240','Mozilla/5.0 (Linux; Android 5.0) AppleWebKit/537.36 (KHTML, like Gecko) Mobile Safari/537.36 (compatible; Bytespider; spider-feedback@bytedance.com)','athena-dbms.42web.io/post.php?post_link=13&i=1','2023-09-15 07:05:20'),
('197','103.97.240.154','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-09-17 14:32:12'),
('198','103.97.240.154','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36','athena-dbms.42web.io/index.php','2023-09-17 14:32:54'),
('199','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-09-20 22:26:16'),
('200','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-09-20 22:26:26'),
('201','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36','athena-dbms.42web.io/post.php?post_link=1','2023-09-20 22:38:49'),
('202','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36','athena-dbms.42web.io/index.php','2023-09-20 23:41:56'),
('203','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-09-20 23:55:42'),
('204','45.125.118.86','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-09-22 18:38:57'),
('205','45.125.118.86','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-09-22 18:39:07'),
('206','45.125.118.86','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-09-22 18:39:29'),
('207','152.58.204.65','Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Mobile Safari/537.36','athena-dbms.42web.io/?i=1','2023-09-25 10:10:17'),
('208','152.58.204.65','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-09-25 10:10:22'),
('209','152.58.204.65','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-09-25 10:10:43'),
('210','152.58.204.65','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-09-25 10:10:54'),
('211','152.58.204.129','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-09-25 13:41:27'),
('212','66.249.76.204','Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','athena-dbms.42web.io/','2023-09-26 07:36:24'),
('213','66.249.79.203','Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.5938.62 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','athena-dbms.42web.io/','2023-09-26 08:27:43'),
('214','66.249.76.203','Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','athena-dbms.42web.io/','2023-09-26 23:12:23'),
('215','66.249.76.204','Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.5938.62 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','athena-dbms.42web.io/','2023-09-26 23:39:27'),
('216','112.133.246.93','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36 Edg/117.0.2045.43','athena-dbms.42web.io/?i=1','2023-09-27 16:40:34'),
('217','115.99.163.78','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-09-28 15:03:05'),
('218','66.249.76.203','Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','athena-dbms.42web.io/','2023-09-28 22:53:27'),
('219','66.249.66.23','Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.5938.92 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','athena-dbms.42web.io/','2023-09-28 23:30:39'),
('220','66.249.76.205','Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.5938.92 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','athena-dbms.42web.io/','2023-09-29 05:20:08'),
('221','66.249.79.203','Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.5938.92 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','athena-dbms.42web.io/','2023-09-30 06:18:46'),
('222','49.43.101.81','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36 Edg/117.0.2045.43','athena-dbms.42web.io/?i=1','2023-09-30 14:42:24'),
('223','49.43.101.81','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36 Edg/117.0.2045.43','athena-dbms.42web.io/','2023-09-30 14:42:34'),
('224','49.43.101.81','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36 Edg/117.0.2045.43','athena-dbms.42web.io/','2023-09-30 14:42:36'),
('225','40.77.189.26','Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/112.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=3','2023-09-30 15:29:59'),
('226','66.249.76.203','Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','athena-dbms.42web.io/','2023-10-01 01:15:18'),
('227','66.249.79.203','Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.5938.92 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','athena-dbms.42web.io/','2023-10-01 07:38:23'),
('228','49.245.82.167','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-10-01 23:57:54'),
('229','66.249.76.204','Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.5938.92 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','athena-dbms.42web.io/','2023-10-02 10:51:37'),
('230','66.249.76.204','Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.5938.92 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','athena-dbms.42web.io/','2023-10-02 13:51:38'),
('231','66.249.74.44','Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.5938.132 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','athena-dbms.42web.io/','2023-10-04 06:19:07'),
('232','66.249.76.76','Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.5938.132 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','athena-dbms.42web.io/','2023-10-05 08:40:24'),
('233','38.137.38.179','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-10-05 17:34:02'),
('234','38.137.38.179','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-10-05 17:34:10'),
('235','38.137.38.179','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-10-05 17:34:59'),
('236','38.137.38.179','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-10-05 17:35:01'),
('237','152.58.56.206','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-10-05 23:52:47'),
('238','66.249.66.23','Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','athena-dbms.42web.io/','2023-10-06 08:49:40'),
('239','66.249.66.22','Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.5938.132 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','athena-dbms.42web.io/','2023-10-06 11:49:53'),
('240','66.249.66.22','Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.5938.132 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','athena-dbms.42web.io/','2023-10-07 15:16:00'),
('241','66.249.76.203','Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.5938.132 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','athena-dbms.42web.io/','2023-10-08 21:39:07'),
('242','66.249.66.23','Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','athena-dbms.42web.io/','2023-10-09 00:49:25'),
('243','66.249.76.204','Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.5938.132 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','athena-dbms.42web.io/','2023-10-09 23:04:27'),
('244','66.249.76.205','Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.5938.132 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','athena-dbms.42web.io/','2023-10-10 01:13:35'),
('245','66.249.66.1','Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','athena-dbms.42web.io/','2023-10-10 02:25:41'),
('246','47.128.27.216','Mozilla/5.0 (Linux; Android 5.0) AppleWebKit/537.36 (KHTML, like Gecko) Mobile Safari/537.36 (compatible; Bytespider; spider-feedback@bytedance.com)','athena-dbms.42web.io/post.php?post_link=4&i=1','2023-10-11 21:05:26'),
('247','47.128.17.53','Mozilla/5.0 (Linux; Android 5.0) AppleWebKit/537.36 (KHTML, like Gecko) Mobile Safari/537.36 (compatible; Bytespider; spider-feedback@bytedance.com)','athena-dbms.42web.io/?i=1','2023-10-11 21:32:14'),
('248','66.249.76.204','Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.5938.132 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','athena-dbms.42web.io/','2023-10-12 10:03:48'),
('249','66.249.66.1','Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.5938.132 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','athena-dbms.42web.io/','2023-10-13 11:58:07'),
('250','66.249.76.204','Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','athena-dbms.42web.io/','2023-10-13 21:19:53'),
('251','66.249.66.23','Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.5938.132 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','athena-dbms.42web.io/','2023-10-14 15:49:57'),
('252','66.249.66.1','Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.5938.132 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','athena-dbms.42web.io/','2023-10-14 16:12:22'),
('253','66.249.74.44','Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.5938.132 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','athena-dbms.42web.io/','2023-10-15 18:12:49'),
('254','66.249.74.43','Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','athena-dbms.42web.io/','2023-10-16 05:23:45'),
('255','66.249.76.205','Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.5938.132 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','athena-dbms.42web.io/','2023-10-16 20:16:39'),
('256','47.128.52.113','Mozilla/5.0 (Linux; Android 5.0) AppleWebKit/537.36 (KHTML, like Gecko) Mobile Safari/537.36 (compatible; Bytespider; spider-feedback@bytedance.com)','athena-dbms.42web.io/post.php?post_link=4&i=1','2023-10-16 21:36:32'),
('257','66.249.76.201','Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','athena-dbms.42web.io/','2023-10-16 23:12:21'),
('258','47.128.54.166','Mozilla/5.0 (Linux; Android 5.0) AppleWebKit/537.36 (KHTML, like Gecko) Mobile Safari/537.36 (compatible; Bytespider; spider-feedback@bytedance.com)','athena-dbms.42web.io/post.php?post_link=13&i=1','2023-10-17 02:57:55'),
('259','66.249.64.109','Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.5938.132 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','athena-dbms.42web.io/','2023-10-17 23:13:50'),
('260','66.249.64.108','Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','athena-dbms.42web.io/','2023-10-17 23:25:04'),
('261','73.232.85.74','Mozilla/5.0 (Linux; Android 5.0; SM-G900P Build/LRX21T) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.8980.1003 Mobile Safari/537.36','athena-dbms.42web.io/post.php?post_link=4&i=1','2023-10-21 21:12:01'),
('262','182.22.30.14','Mozilla/5.0 (compatible; Y!J-WSC/1.0; +https://yahoo.jp/3BSZgF)','athena-dbms.42web.io/','2023-10-23 10:06:28'),
('263','47.128.47.11','Mozilla/5.0 (Linux; Android 5.0) AppleWebKit/537.36 (KHTML, like Gecko) Mobile Safari/537.36 (compatible; Bytespider; spider-feedback@bytedance.com)','athena-dbms.42web.io/post.php?i=2&post_link=13','2023-10-24 18:35:58'),
('264','47.128.20.240','Mozilla/5.0 (Linux; Android 5.0) AppleWebKit/537.36 (KHTML, like Gecko) Mobile Safari/537.36 (compatible; Bytespider; spider-feedback@bytedance.com)','athena-dbms.42web.io/post.php?post_link=13&i=1','2023-10-24 20:11:30'),
('265','195.180.57.116','Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.3242.1825 Mobile Safari/537.36','athena-dbms.42web.io/post.php?post_link=4&i=1','2023-10-25 20:35:16'),
('266','122.177.4.121','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/?i=1','2023-10-26 10:26:22'),
('267','122.177.4.121','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-10-26 10:26:49'),
('268','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-10-26 20:16:38'),
('269','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-10-26 20:16:53'),
('270','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-10-26 20:17:02'),
('271','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-10-26 20:17:08'),
('272','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-10-26 20:18:08'),
('273','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-10-26 20:21:55'),
('274','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-10-26 20:25:29'),
('275','152.58.221.191','Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Mobile Safari/537.36','athena-dbms.42web.io/index.php','2023-10-26 20:26:06'),
('276','152.58.221.191','Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Mobile Safari/537.36','athena-dbms.42web.io/index.php','2023-10-26 20:26:12'),
('277','152.58.221.191','Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Mobile Safari/537.36','athena-dbms.42web.io/index.php','2023-10-26 20:26:14'),
('278','152.58.221.191','Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Mobile Safari/537.36','athena-dbms.42web.io/','2023-10-26 20:26:27'),
('279','152.58.221.191','Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Mobile Safari/537.36','athena-dbms.42web.io/','2023-10-26 20:26:30'),
('280','152.58.221.191','Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Mobile Safari/537.36','athena-dbms.42web.io/index.php','2023-10-26 20:26:36'),
('281','152.58.221.191','Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Mobile Safari/537.36','athena-dbms.42web.io/post.php?post_link=1','2023-10-26 20:26:41'),
('282','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-10-26 20:28:36'),
('283','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-10-26 20:39:23'),
('284','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-10-26 20:39:32'),
('285','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-10-26 20:39:33'),
('286','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-10-26 20:39:34'),
('287','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-10-26 20:39:34'),
('288','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-10-26 20:39:35'),
('289','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-10-26 20:39:36'),
('290','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-10-26 20:39:37'),
('291','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-10-26 20:43:35'),
('292','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-10-26 20:43:41'),
('293','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-10-26 20:44:39'),
('294','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-10-26 20:45:13'),
('295','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-10-26 20:48:20'),
('296','65.154.226.171','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) HeadlessChrome/117.0.5938.88 Safari/537.36','athena-dbms.42web.io/?i=1','2023-10-26 21:08:59'),
('297','34.254.53.125','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/114.0','www.athena-dbms.42web.io/?i=1','2023-10-26 21:09:58'),
('298','34.254.53.125','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/114.0','athena-dbms.42web.io/?i=1','2023-10-26 21:10:12'),
('299','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-10-26 21:17:20'),
('300','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-10-26 21:17:27'),
('301','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-10-26 21:17:30'),
('302','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-10-26 21:30:49'),
('303','205.169.39.78','Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36','athena-dbms.42web.io/?i=1','2023-10-26 21:51:44'),
('304','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-10-26 22:12:19'),
('305','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-10-26 22:28:30'),
('306','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-10-26 22:29:21'),
('307','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-10-26 23:44:58'),
('308','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-10-26 23:45:46'),
('309','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-10-26 23:46:48'),
('310','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-10-27 00:04:45'),
('311','152.58.226.111','Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Mobile Safari/537.36','athena-dbms.42web.io/post.php?post_link=1&i=1','2023-10-27 01:42:29'),
('312','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-10-27 08:52:47'),
('313','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-10-27 08:53:29'),
('314','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-10-27 08:58:35'),
('315','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-10-27 09:03:04'),
('316','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-10-27 09:11:54'),
('317','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/preview.php?post_link=3','2023-10-27 09:13:48'),
('318','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/preview.php?post_link=3','2023-10-27 09:14:11'),
('319','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-10-27 09:17:34'),
('320','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/preview.php?post_link=7','2023-10-27 09:27:00'),
('321','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-10-27 09:28:02'),
('322','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/preview.php?post_link=1','2023-10-27 09:37:42'),
('323','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/preview.php?post_link=1','2023-10-27 09:37:52'),
('324','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/preview.php?post_link=1','2023-10-27 09:38:06'),
('325','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-10-27 09:38:40'),
('326','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/post.php?post_link=1','2023-10-27 09:38:43'),
('327','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/post.php?post_link=1','2023-10-27 09:39:05'),
('328','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/post.php?post_link=1','2023-10-27 09:39:09'),
('329','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-10-27 09:41:29'),
('330','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-10-27 09:44:32'),
('331','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/index.php','2023-10-27 09:50:31'),
('332','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/index.php','2023-10-27 09:52:38'),
('333','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/post.php?post_link=1','2023-10-27 09:52:40'),
('334','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/post.php?post_link=1','2023-10-27 09:53:22'),
('335','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/index.php','2023-10-27 09:56:33'),
('336','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/index.php','2023-10-27 09:57:06'),
('337','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/post.php?post_link=1','2023-10-27 09:57:17'),
('338','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/index.php','2023-10-27 09:57:29'),
('339','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/index.php','2023-10-27 09:59:03'),
('340','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-10-27 10:07:13'),
('341','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/preview.php?post_link=10','2023-10-27 10:14:12'),
('342','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/preview.php?post_link=10','2023-10-27 10:15:09'),
('343','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-10-27 10:17:58'),
('344','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/post.php?post_link=1','2023-10-27 10:18:09'),
('345','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-10-27 10:18:12'),
('346','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/post.php?post_link=2','2023-10-27 10:18:13'),
('347','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/post.php?post_link=2','2023-10-27 10:18:21'),
('348','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/post.php?post_link=2','2023-10-27 10:18:31'),
('349','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/','2023-10-27 10:20:24'),
('350','115.240.194.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','athena-dbms.42web.io/index.php','2023-10-27 10:21:05'); 




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

