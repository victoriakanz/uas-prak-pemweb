-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2023 at 04:25 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_blog`
--

CREATE TABLE `tb_blog` (
  `id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `category_id` int(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `publish_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_blog`
--

INSERT INTO `tb_blog` (`id`, `title`, `content`, `category_id`, `image`, `slug`, `user_id`, `update_at`, `publish_at`) VALUES
(1, 'How to photograph Star Trails - Step by Step tutorial', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc pharetra nulla at tempus tincidunt. Ut eu purus magna. Phasellus interdum, ante et pharetra tincidunt, tortor diam vestibulum velit, sit amet mattis nibh quam at metus. Quisque porta convallis commodo. Ut libero diam, fringilla nec fermentum ut, gravida non felis. Vivamus volutpat purus augue, vel aliquam nulla volutpat quis. Fusce tristique lobortis dui ut hendrerit. Sed bibendum et est a malesuada. Sed nec congue justo. Morbi molestie rhoncus turpis eu dignissim. Proin et arcu sed massa vulputate varius. Sed mollis, erat a tempus finibus, arcu ex semper lorem, et mattis massa sapien id orci. In condimentum eros eu quam tempor, fringilla imperdiet neque facilisis.</p>\r\n\r\n<p>In faucibus diam vulputate felis convallis, nec dignissim mi sodales. Aenean volutpat velit a augue fringilla placerat. Curabitur in ipsum ullamcorper, iaculis tortor sed, pretium mauris. Nulla faucibus est ac urna iaculis elementum. Fusce blandit, ipsum quis aliquam tincidunt, diam tellus rhoncus tortor, sit amet gravida velit eros et dolor. Aliquam nec nisl ac turpis dictum suscipit. Mauris sit amet hendrerit felis. Integer accumsan auctor augue, iaculis euismod turpis eleifend non. Praesent sit amet erat felis. Aliquam erat volutpat. Nulla condimentum, nisl vel egestas fermentum, turpis neque aliquet tellus, et pulvinar dolor libero vitae quam. In justo elit, pellentesque ut diam id, posuere porta orci. Pellentesque rutrum arcu dui, at semper dolor sollicitudin quis. Mauris mattis turpis vitae mauris consequat tristique.</p>\r\n\r\n<p>Donec sit amet elit nec leo porta dictum quis eu mauris. Praesent sit amet dolor tincidunt, rhoncus metus eu, malesuada mauris. Sed condimentum justo in ante maximus sollicitudin. Suspendisse potenti. Mauris bibendum nisi lectus, eu tincidunt turpis aliquam sit amet. Fusce in risus in diam tempus posuere. Ut eu dui pretium, elementum ex non, dignissim nisi. Praesent placerat nisl dui, et pellentesque nisl accumsan quis.</p>\r\n\r\n<p>Integer tincidunt eleifend massa et rutrum. Aenean ultrices iaculis orci. Integer eu convallis ante, non euismod ante. Pellentesque et enim non urna sagittis placerat eu vel sapien. Nunc hendrerit magna quis vulputate dignissim. Morbi dapibus ullamcorper orci, eu porttitor leo commodo ac. Curabitur vel vestibulum diam. Donec ut enim ligula. Duis luctus, sapien in suscipit interdum, justo magna lacinia elit, sed aliquam ante enim non odio. Donec mattis enim ac arcu volutpat, nec mattis leo pharetra. Duis dolor lectus, lobortis in efficitur sodales, efficitur pulvinar sapien.</p>\r\n', 1, '64b38b0986744.jpg', 'how-to-photograph-star-trails-step-by-step-tutorial', 1, '2023-07-16 06:15:37', '2023-07-05 02:02:04'),
(2, 'SPY x FAMILY&#039;s First Movie Shares New Trailer And Release Date', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc pharetra nulla at tempus tincidunt. Ut eu purus magna. Phasellus interdum, ante et pharetra tincidunt, tortor diam vestibulum velit, sit amet mattis nibh quam at metus. Quisque porta convallis commodo. Ut libero diam, fringilla nec fermentum ut, gravida non felis. Vivamus volutpat purus augue, vel aliquam nulla volutpat quis. Fusce tristique lobortis dui ut hendrerit. Sed bibendum et est a malesuada. Sed nec congue justo. Morbi molestie rhoncus turpis eu dignissim. Proin et arcu sed massa vulputate varius. Sed mollis, erat a tempus finibus, arcu ex semper lorem, et mattis massa sapien id orci. In condimentum eros eu quam tempor, fringilla imperdiet neque facilisis.</p>\r\n\r\n<p>In faucibus diam vulputate felis convallis, nec dignissim mi sodales. Aenean volutpat velit a augue fringilla placerat. Curabitur in ipsum ullamcorper, iaculis tortor sed, pretium mauris. Nulla faucibus est ac urna iaculis elementum. Fusce blandit, ipsum quis aliquam tincidunt, diam tellus rhoncus tortor, sit amet gravida velit eros et dolor. Aliquam nec nisl ac turpis dictum suscipit. Mauris sit amet hendrerit felis. Integer accumsan auctor augue, iaculis euismod turpis eleifend non. Praesent sit amet erat felis. Aliquam erat volutpat. Nulla condimentum, nisl vel egestas fermentum, turpis neque aliquet tellus, et pulvinar dolor libero vitae quam. In justo elit, pellentesque ut diam id, posuere porta orci. Pellentesque rutrum arcu dui, at semper dolor sollicitudin quis. Mauris mattis turpis vitae mauris consequat tristique.</p>\r\n\r\n<p>Donec sit amet elit nec leo porta dictum quis eu mauris. Praesent sit amet dolor tincidunt, rhoncus metus eu, malesuada mauris. Sed condimentum justo in ante maximus sollicitudin. Suspendisse potenti. Mauris bibendum nisi lectus, eu tincidunt turpis aliquam sit amet. Fusce in risus in diam tempus posuere. Ut eu dui pretium, elementum ex non, dignissim nisi. Praesent placerat nisl dui, et pellentesque nisl accumsan quis.</p>\r\n\r\n<p>Integer tincidunt eleifend massa et rutrum. Aenean ultrices iaculis orci. Integer eu convallis ante, non euismod ante. Pellentesque et enim non urna sagittis placerat eu vel sapien. Nunc hendrerit magna quis vulputate dignissim. Morbi dapibus ullamcorper orci, eu porttitor leo commodo ac. Curabitur vel vestibulum diam. Donec ut enim ligula. Duis luctus, sapien in suscipit interdum, justo magna lacinia elit, sed aliquam ante enim non odio. Donec mattis enim ac arcu volutpat, nec mattis leo pharetra. Duis dolor lectus, lobortis in efficitur sodales, efficitur pulvinar sapien.</p>\r\n', 2, '64b392573fca8.jpg', 'spy-x-family-039-s-first-movie-shares-new-trailer-and-release-date', 1, '2023-07-16 07:21:45', '2023-07-05 06:09:32'),
(3, 'Benedict Cumberbatch teases Doctor Strange return Next Year in New MCU Project', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc pharetra nulla at tempus tincidunt. Ut eu purus magna. Phasellus interdum, ante et pharetra tincidunt, tortor diam vestibulum velit, sit amet mattis nibh quam at metus. Quisque porta convallis commodo. Ut libero diam, fringilla nec fermentum ut, gravida non felis. Vivamus volutpat purus augue, vel aliquam nulla volutpat quis. Fusce tristique lobortis dui ut hendrerit. Sed bibendum et est a malesuada. Sed nec congue justo. Morbi molestie rhoncus turpis eu dignissim. Proin et arcu sed massa vulputate varius. Sed mollis, erat a tempus finibus, arcu ex semper lorem, et mattis massa sapien id orci. In condimentum eros eu quam tempor, fringilla imperdiet neque facilisis.</p>\r\n\r\n<p>In faucibus diam vulputate felis convallis, nec dignissim mi sodales. Aenean volutpat velit a augue fringilla placerat. Curabitur in ipsum ullamcorper, iaculis tortor sed, pretium mauris. Nulla faucibus est ac urna iaculis elementum. Fusce blandit, ipsum quis aliquam tincidunt, diam tellus rhoncus tortor, sit amet gravida velit eros et dolor. Aliquam nec nisl ac turpis dictum suscipit. Mauris sit amet hendrerit felis. Integer accumsan auctor augue, iaculis euismod turpis eleifend non. Praesent sit amet erat felis. Aliquam erat volutpat. Nulla condimentum, nisl vel egestas fermentum, turpis neque aliquet tellus, et pulvinar dolor libero vitae quam. In justo elit, pellentesque ut diam id, posuere porta orci. Pellentesque rutrum arcu dui, at semper dolor sollicitudin quis. Mauris mattis turpis vitae mauris consequat tristique.</p>\r\n\r\n<p>Donec sit amet elit nec leo porta dictum quis eu mauris. Praesent sit amet dolor tincidunt, rhoncus metus eu, malesuada mauris. Sed condimentum justo in ante maximus sollicitudin. Suspendisse potenti. Mauris bibendum nisi lectus, eu tincidunt turpis aliquam sit amet. Fusce in risus in diam tempus posuere. Ut eu dui pretium, elementum ex non, dignissim nisi. Praesent placerat nisl dui, et pellentesque nisl accumsan quis.</p>\r\n\r\n<p>Integer tincidunt eleifend massa et rutrum. Aenean ultrices iaculis orci. Integer eu convallis ante, non euismod ante. Pellentesque et enim non urna sagittis placerat eu vel sapien. Nunc hendrerit magna quis vulputate dignissim. Morbi dapibus ullamcorper orci, eu porttitor leo commodo ac. Curabitur vel vestibulum diam. Donec ut enim ligula. Duis luctus, sapien in suscipit interdum, justo magna lacinia elit, sed aliquam ante enim non odio. Donec mattis enim ac arcu volutpat, nec mattis leo pharetra. Duis dolor lectus, lobortis in efficitur sodales, efficitur pulvinar sapien.</p>\r\n', 2, '64b3926429089.jpg', 'benedict-cumberbatch-teases-doctor-strange-return-next-year-in-new-mcu-project', 1, '2023-07-16 06:47:00', '2023-07-05 08:09:32'),
(4, 'NASA&#039;s Space Shuttle Endeavour Will Stand Tall Once More', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc pharetra nulla at tempus tincidunt. Ut eu purus magna. Phasellus interdum, ante et pharetra tincidunt, tortor diam vestibulum velit, sit amet mattis nibh quam at metus. Quisque porta convallis commodo. Ut libero diam, fringilla nec fermentum ut, gravida non felis. Vivamus volutpat purus augue, vel aliquam nulla volutpat quis. Fusce tristique lobortis dui ut hendrerit. Sed bibendum et est a malesuada. Sed nec congue justo. Morbi molestie rhoncus turpis eu dignissim. Proin et arcu sed massa vulputate varius. Sed mollis, erat a tempus finibus, arcu ex semper lorem, et mattis massa sapien id orci. In condimentum eros eu quam tempor, fringilla imperdiet neque facilisis.</p>\r\n\r\n<p>In faucibus diam vulputate felis convallis, nec dignissim mi sodales. Aenean volutpat velit a augue fringilla placerat. Curabitur in ipsum ullamcorper, iaculis tortor sed, pretium mauris. Nulla faucibus est ac urna iaculis elementum. Fusce blandit, ipsum quis aliquam tincidunt, diam tellus rhoncus tortor, sit amet gravida velit eros et dolor. Aliquam nec nisl ac turpis dictum suscipit. Mauris sit amet hendrerit felis. Integer accumsan auctor augue, iaculis euismod turpis eleifend non. Praesent sit amet erat felis. Aliquam erat volutpat. Nulla condimentum, nisl vel egestas fermentum, turpis neque aliquet tellus, et pulvinar dolor libero vitae quam. In justo elit, pellentesque ut diam id, posuere porta orci. Pellentesque rutrum arcu dui, at semper dolor sollicitudin quis. Mauris mattis turpis vitae mauris consequat tristique.</p>\r\n\r\n<p>Donec sit amet elit nec leo porta dictum quis eu mauris. Praesent sit amet dolor tincidunt, rhoncus metus eu, malesuada mauris. Sed condimentum justo in ante maximus sollicitudin. Suspendisse potenti. Mauris bibendum nisi lectus, eu tincidunt turpis aliquam sit amet. Fusce in risus in diam tempus posuere. Ut eu dui pretium, elementum ex non, dignissim nisi. Praesent placerat nisl dui, et pellentesque nisl accumsan quis.</p>\r\n\r\n<p>Integer tincidunt eleifend massa et rutrum. Aenean ultrices iaculis orci. Integer eu convallis ante, non euismod ante. Pellentesque et enim non urna sagittis placerat eu vel sapien. Nunc hendrerit magna quis vulputate dignissim. Morbi dapibus ullamcorper orci, eu porttitor leo commodo ac. Curabitur vel vestibulum diam. Donec ut enim ligula. Duis luctus, sapien in suscipit interdum, justo magna lacinia elit, sed aliquam ante enim non odio. Donec mattis enim ac arcu volutpat, nec mattis leo pharetra. Duis dolor lectus, lobortis in efficitur sodales, efficitur pulvinar sapien.</p>\r\n', 1, '64b392474961c.jpg', 'nasa-039-s-space-shuttle-endeavour-will-stand-tall-once-more', 1, '2023-07-16 06:46:31', '2023-07-05 04:36:04'),
(5, 'Porter Robinson has made himself into a Vocaloid called Po-uta', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc pharetra nulla at tempus tincidunt. Ut eu purus magna. Phasellus interdum, ante et pharetra tincidunt, tortor diam vestibulum velit, sit amet mattis nibh quam at metus. Quisque porta convallis commodo. Ut libero diam, fringilla nec fermentum ut, gravida non felis. Vivamus volutpat purus augue, vel aliquam nulla volutpat quis. Fusce tristique lobortis dui ut hendrerit. Sed bibendum et est a malesuada. Sed nec congue justo. Morbi molestie rhoncus turpis eu dignissim. Proin et arcu sed massa vulputate varius. Sed mollis, erat a tempus finibus, arcu ex semper lorem, et mattis massa sapien id orci. In condimentum eros eu quam tempor, fringilla imperdiet neque facilisis.</p>\r\n\r\n<p>In faucibus diam vulputate felis convallis, nec dignissim mi sodales. Aenean volutpat velit a augue fringilla placerat. Curabitur in ipsum ullamcorper, iaculis tortor sed, pretium mauris. Nulla faucibus est ac urna iaculis elementum. Fusce blandit, ipsum quis aliquam tincidunt, diam tellus rhoncus tortor, sit amet gravida velit eros et dolor. Aliquam nec nisl ac turpis dictum suscipit. Mauris sit amet hendrerit felis. Integer accumsan auctor augue, iaculis euismod turpis eleifend non. Praesent sit amet erat felis. Aliquam erat volutpat. Nulla condimentum, nisl vel egestas fermentum, turpis neque aliquet tellus, et pulvinar dolor libero vitae quam. In justo elit, pellentesque ut diam id, posuere porta orci. Pellentesque rutrum arcu dui, at semper dolor sollicitudin quis. Mauris mattis turpis vitae mauris consequat tristique.</p>\r\n\r\n<p>Donec sit amet elit nec leo porta dictum quis eu mauris. Praesent sit amet dolor tincidunt, rhoncus metus eu, malesuada mauris. Sed condimentum justo in ante maximus sollicitudin. Suspendisse potenti. Mauris bibendum nisi lectus, eu tincidunt turpis aliquam sit amet. Fusce in risus in diam tempus posuere. Ut eu dui pretium, elementum ex non, dignissim nisi. Praesent placerat nisl dui, et pellentesque nisl accumsan quis.</p>\r\n\r\n<p>Integer tincidunt eleifend massa et rutrum. Aenean ultrices iaculis orci. Integer eu convallis ante, non euismod ante. Pellentesque et enim non urna sagittis placerat eu vel sapien. Nunc hendrerit magna quis vulputate dignissim. Morbi dapibus ullamcorper orci, eu porttitor leo commodo ac. Curabitur vel vestibulum diam. Donec ut enim ligula. Duis luctus, sapien in suscipit interdum, justo magna lacinia elit, sed aliquam ante enim non odio. Donec mattis enim ac arcu volutpat, nec mattis leo pharetra. Duis dolor lectus, lobortis in efficitur sodales, efficitur pulvinar sapien.</p>\r\n', 3, '64b3928791ca2.jpg', 'porter-robinson-has-made-himself-into-a-vocaloid-called-po-uta', 1, '2023-07-16 06:47:35', '2023-07-05 07:10:32'),
(6, 'First World War drama &#039;1917&#039; wins big at BAFTA awards', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc pharetra nulla at tempus tincidunt. Ut eu purus magna. Phasellus interdum, ante et pharetra tincidunt, tortor diam vestibulum velit, sit amet mattis nibh quam at metus. Quisque porta convallis commodo. Ut libero diam, fringilla nec fermentum ut, gravida non felis. Vivamus volutpat purus augue, vel aliquam nulla volutpat quis. Fusce tristique lobortis dui ut hendrerit. Sed bibendum et est a malesuada. Sed nec congue justo. Morbi molestie rhoncus turpis eu dignissim. Proin et arcu sed massa vulputate varius. Sed mollis, erat a tempus finibus, arcu ex semper lorem, et mattis massa sapien id orci. In condimentum eros eu quam tempor, fringilla imperdiet neque facilisis.</p>\r\n\r\n<p>In faucibus diam vulputate felis convallis, nec dignissim mi sodales. Aenean volutpat velit a augue fringilla placerat. Curabitur in ipsum ullamcorper, iaculis tortor sed, pretium mauris. Nulla faucibus est ac urna iaculis elementum. Fusce blandit, ipsum quis aliquam tincidunt, diam tellus rhoncus tortor, sit amet gravida velit eros et dolor. Aliquam nec nisl ac turpis dictum suscipit. Mauris sit amet hendrerit felis. Integer accumsan auctor augue, iaculis euismod turpis eleifend non. Praesent sit amet erat felis. Aliquam erat volutpat. Nulla condimentum, nisl vel egestas fermentum, turpis neque aliquet tellus, et pulvinar dolor libero vitae quam. In justo elit, pellentesque ut diam id, posuere porta orci. Pellentesque rutrum arcu dui, at semper dolor sollicitudin quis. Mauris mattis turpis vitae mauris consequat tristique.</p>\r\n\r\n<p>Donec sit amet elit nec leo porta dictum quis eu mauris. Praesent sit amet dolor tincidunt, rhoncus metus eu, malesuada mauris. Sed condimentum justo in ante maximus sollicitudin. Suspendisse potenti. Mauris bibendum nisi lectus, eu tincidunt turpis aliquam sit amet. Fusce in risus in diam tempus posuere. Ut eu dui pretium, elementum ex non, dignissim nisi. Praesent placerat nisl dui, et pellentesque nisl accumsan quis.</p>\r\n\r\n<p>Integer tincidunt eleifend massa et rutrum. Aenean ultrices iaculis orci. Integer eu convallis ante, non euismod ante. Pellentesque et enim non urna sagittis placerat eu vel sapien. Nunc hendrerit magna quis vulputate dignissim. Morbi dapibus ullamcorper orci, eu porttitor leo commodo ac. Curabitur vel vestibulum diam. Donec ut enim ligula. Duis luctus, sapien in suscipit interdum, justo magna lacinia elit, sed aliquam ante enim non odio. Donec mattis enim ac arcu volutpat, nec mattis leo pharetra. Duis dolor lectus, lobortis in efficitur sodales, efficitur pulvinar sapien.</p>\r\n', 2, '64b39271b40a8.jpg', 'first-world-war-drama-039-1917-039-wins-big-at-bafta-awards', 1, '2023-07-16 14:14:03', '2023-07-05 04:09:32'),
(8, 'YOASOBI’s ‘Idol’ Logs 13th Week at No. 1, Tied for Most Weeks Atop Japan Hot 100', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc pharetra nulla at tempus tincidunt. Ut eu purus magna. Phasellus interdum, ante et pharetra tincidunt, tortor diam vestibulum velit, sit amet mattis nibh quam at metus. Quisque porta convallis commodo. Ut libero diam, fringilla nec fermentum ut, gravida non felis. Vivamus volutpat purus augue, vel aliquam nulla volutpat quis. Fusce tristique lobortis dui ut hendrerit. Sed bibendum et est a malesuada. Sed nec congue justo. Morbi molestie rhoncus turpis eu dignissim. Proin et arcu sed massa vulputate varius. Sed mollis, erat a tempus finibus, arcu ex semper lorem, et mattis massa sapien id orci. In condimentum eros eu quam tempor, fringilla imperdiet neque facilisis.</p>\r\n\r\n<p>In faucibus diam vulputate felis convallis, nec dignissim mi sodales. Aenean volutpat velit a augue fringilla placerat. Curabitur in ipsum ullamcorper, iaculis tortor sed, pretium mauris. Nulla faucibus est ac urna iaculis elementum. Fusce blandit, ipsum quis aliquam tincidunt, diam tellus rhoncus tortor, sit amet gravida velit eros et dolor. Aliquam nec nisl ac turpis dictum suscipit. Mauris sit amet hendrerit felis. Integer accumsan auctor augue, iaculis euismod turpis eleifend non. Praesent sit amet erat felis. Aliquam erat volutpat. Nulla condimentum, nisl vel egestas fermentum, turpis neque aliquet tellus, et pulvinar dolor libero vitae quam. In justo elit, pellentesque ut diam id, posuere porta orci. Pellentesque rutrum arcu dui, at semper dolor sollicitudin quis. Mauris mattis turpis vitae mauris consequat tristique.</p>\r\n\r\n<p>Donec sit amet elit nec leo porta dictum quis eu mauris. Praesent sit amet dolor tincidunt, rhoncus metus eu, malesuada mauris. Sed condimentum justo in ante maximus sollicitudin. Suspendisse potenti. Mauris bibendum nisi lectus, eu tincidunt turpis aliquam sit amet. Fusce in risus in diam tempus posuere. Ut eu dui pretium, elementum ex non, dignissim nisi. Praesent placerat nisl dui, et pellentesque nisl accumsan quis.</p>\r\n\r\n<p>Integer tincidunt eleifend massa et rutrum. Aenean ultrices iaculis orci. Integer eu convallis ante, non euismod ante. Pellentesque et enim non urna sagittis placerat eu vel sapien. Nunc hendrerit magna quis vulputate dignissim. Morbi dapibus ullamcorper orci, eu porttitor leo commodo ac. Curabitur vel vestibulum diam. Donec ut enim ligula. Duis luctus, sapien in suscipit interdum, justo magna lacinia elit, sed aliquam ante enim non odio. Donec mattis enim ac arcu volutpat, nec mattis leo pharetra. Duis dolor lectus, lobortis in efficitur sodales, efficitur pulvinar sapien.</p>\r\n', 3, '64b3fb7395a82.jpg', 'yoasobi-s-idol-logs-13th-week-at-no-1-tied-for-most-weeks-atop-japan-hot-100', 1, '2023-07-16 14:15:32', '2023-07-16 08:36:01'),
(9, 'Kim Rae Won And Lee Jong Suk Must Save Their City In Upcoming Action Thriller Film “Decibel”', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc pharetra nulla at tempus tincidunt. Ut eu purus magna. Phasellus interdum, ante et pharetra tincidunt, tortor diam vestibulum velit, sit amet mattis nibh quam at metus. Quisque porta convallis commodo. Ut libero diam, fringilla nec fermentum ut, gravida non felis. Vivamus volutpat purus augue, vel aliquam nulla volutpat quis. Fusce tristique lobortis dui ut hendrerit. Sed bibendum et est a malesuada. Sed nec congue justo. Morbi molestie rhoncus turpis eu dignissim. Proin et arcu sed massa vulputate varius. Sed mollis, erat a tempus finibus, arcu ex semper lorem, et mattis massa sapien id orci. In condimentum eros eu quam tempor, fringilla imperdiet neque facilisis.</p>\r\n\r\n<p>In faucibus diam vulputate felis convallis, nec dignissim mi sodales. Aenean volutpat velit a augue fringilla placerat. Curabitur in ipsum ullamcorper, iaculis tortor sed, pretium mauris. Nulla faucibus est ac urna iaculis elementum. Fusce blandit, ipsum quis aliquam tincidunt, diam tellus rhoncus tortor, sit amet gravida velit eros et dolor. Aliquam nec nisl ac turpis dictum suscipit. Mauris sit amet hendrerit felis. Integer accumsan auctor augue, iaculis euismod turpis eleifend non. Praesent sit amet erat felis. Aliquam erat volutpat. Nulla condimentum, nisl vel egestas fermentum, turpis neque aliquet tellus, et pulvinar dolor libero vitae quam. In justo elit, pellentesque ut diam id, posuere porta orci. Pellentesque rutrum arcu dui, at semper dolor sollicitudin quis. Mauris mattis turpis vitae mauris consequat tristique.</p>\r\n\r\n<p>Donec sit amet elit nec leo porta dictum quis eu mauris. Praesent sit amet dolor tincidunt, rhoncus metus eu, malesuada mauris. Sed condimentum justo in ante maximus sollicitudin. Suspendisse potenti. Mauris bibendum nisi lectus, eu tincidunt turpis aliquam sit amet. Fusce in risus in diam tempus posuere. Ut eu dui pretium, elementum ex non, dignissim nisi. Praesent placerat nisl dui, et pellentesque nisl accumsan quis.</p>\r\n\r\n<p>Integer tincidunt eleifend massa et rutrum. Aenean ultrices iaculis orci. Integer eu convallis ante, non euismod ante. Pellentesque et enim non urna sagittis placerat eu vel sapien. Nunc hendrerit magna quis vulputate dignissim. Morbi dapibus ullamcorper orci, eu porttitor leo commodo ac. Curabitur vel vestibulum diam. Donec ut enim ligula. Duis luctus, sapien in suscipit interdum, justo magna lacinia elit, sed aliquam ante enim non odio. Donec mattis enim ac arcu volutpat, nec mattis leo pharetra. Duis dolor lectus, lobortis in efficitur sodales, efficitur pulvinar sapien.</p>\r\n', 2, '64b3fcb25ab77.jpg', 'kim-rae-won-and-lee-jong-suk-must-save-their-city-in-upcoming-action-thriller-film-decibel', 2, '2023-07-16 14:20:34', '2023-07-16 09:06:46');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id` int(100) NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `slug` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id`, `name`, `slug`, `image`) VALUES
(1, 'Astronomy', 'astronomy', '64b37030518ac.jpg'),
(2, 'Movies &amp; TV Shows', 'movies-amp-tv-shows', '64b37056899f8.jpeg'),
(3, 'Music', 'music', '64b3706a145d8.jpg'),
(4, 'wibu', 'wibu', '64b3759b17dc6.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `email`, `name`, `username`, `password`, `is_admin`) VALUES
(1, 'nasakennedy40@gmail.com', 'Aqilah Syaima\' Fadel', 'aqilah', '$2y$10$RyGGYq9VIzyKzRVOAVcqKO9ywq/7hpd25DCfLMAPuDlzYz3hbQm5y', 1),
(2, 'nasakennedy40@gmail.com', 'aqilah syaima', 'kenzie', '$2y$10$RyGGYq9VIzyKzRVOAVcqKO9ywq/7hpd25DCfLMAPuDlzYz3hbQm5y', 0),
(3, 'nasakennedy40@gmail.com', 'ravi', 'ravi12', '$2y$10$Fl7k2Zpq7LMDy01QMaCv7.AQxZlQVowTivi5ptCUMmD5he.0ud46u', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_blog`
--
ALTER TABLE `tb_blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_blog`
--
ALTER TABLE `tb_blog`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_blog`
--
ALTER TABLE `tb_blog`
  ADD CONSTRAINT `tb_blog_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tb_kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_blog_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
