-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2020 at 09:10 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sourcedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `approval` varchar(30) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `admin_name`, `admin_username`, `email`, `password`, `phone_number`, `approval`, `date_time`) VALUES
(3, 'M ahmed mushtaq ', 'm_ahmed_mushtaq_', 'mahmedmushtaq296@gmail.com', '$2y$10$/w.RVSPmBjuN/.MK7kLPUuE9fae5VsE9nZMf1GkwvqO3ssezjtPF6', '03316062251', 'proved', '2019-09-06 04:32:34'),
(4, 'Calvin F. Walker', 'calvin_f._walker', 'CalvinFWalker@armyspy.com', '$2y$10$jnN0qE8I1yqAjNKhX69MqOzmKUekB4k6DmNu.owCWbOT3sOgLmKFm', '03017980875', 'pending', '2020-02-04 12:12:12');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL,
  `categories_name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories_name`) VALUES
(4, 'Physics'),
(5, 'islamiat');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `user_message` text NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `full_name`, `email`, `user_message`, `date_time`) VALUES
(1, 'M Ahmed Mushtaq', 'test@gmail.com', 'plz create my email\r\n', '2020-02-04 12:10:43');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL,
  `notification_by` varchar(50) NOT NULL,
  `notification_link` varchar(250) NOT NULL,
  `notification_type` varchar(100) NOT NULL,
  `notification_message` text NOT NULL,
  `notification_open` varchar(30) NOT NULL,
  `notification_read` varchar(30) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `notification_by`, `notification_link`, `notification_type`, `notification_message`, `notification_open`, `notification_read`, `date_time`) VALUES
(1, 'test@gmail.com', 'open_contact_request.php?id=1', 'contactRequest', 'plz create my e..', 'yes', 'yes', '2020-02-04 12:10:43');

-- --------------------------------------------------------

--
-- Table structure for table `posts_data`
--

CREATE TABLE IF NOT EXISTS `posts_data` (
  `id` int(11) NOT NULL,
  `search_engine_title` text NOT NULL,
  `search_engine_description` text NOT NULL,
  `search_engine_keyword` text NOT NULL,
  `post_heading` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `post_text` longtext NOT NULL,
  `title_image` varchar(200) NOT NULL,
  `posted_by` varchar(200) NOT NULL,
  `post_link` text NOT NULL,
  `delete_post` varchar(20) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts_data`
--

INSERT INTO `posts_data` (`id`, `search_engine_title`, `search_engine_description`, `search_engine_keyword`, `post_heading`, `category`, `post_text`, `title_image`, `posted_by`, `post_link`, `delete_post`, `date_time`) VALUES
(1, 'Force linear motion work and energy', 'Force defination : it is an interaction with bodies that causes push or pull of bodies in certain direction \r\nEnergy :The ability of a body to do work is called energy\r\nNewtons all laws explaination', 'force,energy,newtonlaws,newtonlawsexp', 'Defination and explaination of force,energy,work , netwon laws and linear motion', 'Physics', '&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;h1&gt;&amp;nbsp;Defination of force&lt;/h1&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; Force is an interaction with a bodies that causes push or pull of bodies in a certain direction&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&amp;nbsp;&lt;strong&gt;EXPLAINATION OF FORCE DEFINATION&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;&amp;nbsp;&amp;nbsp;&lt;/strong&gt;Suppose a person standing near stationary body ,when he/she apply force than it move in a specific direction&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;h2&gt;Little introduction About Newton&lt;/h2&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;Newton was one of the influential scientist of the past.His ideas became the basis of modern physics.He worked in many fields of science And also invented calculus.&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; He published his book in 1687 &amp;quot;&lt;strong&gt;PHILOSOPHIAE NATURALIS PRINCIPIA MATHEMATICA&amp;quot;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;h1&gt;Defination of newton first law OR Law of inertia&lt;/h1&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;Everybody continue in its state of rest or motion when no net force acts on it&lt;/p&gt;\r\n\r\n&lt;h2&gt;Explaination of newton first law&lt;/h2&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;Simplify the meaning of first defination that object does not start or stop itself but it required an external push or pull(force) to change in it state&lt;/p&gt;\r\n\r\n&lt;h1&gt;Defination of newton second law&lt;/h1&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;1- &amp;quot;The acceleration of an object is directly proportional to net force and inversly proportional to mass object &amp;quot;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;2- &amp;quot;When force act on a body ,it produce acceleration in its own direction&amp;quot;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;h2&gt;FORMULA :-&amp;nbsp; &amp;nbsp;a = F/m or F=ma&lt;/h2&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;h2&gt;Explaination of newton second law&lt;/h2&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;strong&gt;First&amp;nbsp;condition&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;&lt;/strong&gt;When object is rest and force applied on it then it produce acceleration ,mean change in velocity of object occur ,When object is rest its initial velocity is zero but when&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; force apply then its velocity change occur which produce acceleration&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;&lt;strong&gt;Second condition&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;/strong&gt;&amp;nbsp; &amp;nbsp;When object is moving and force is applied then body might be slow down ,speed up or change direction depending upon the direction of force&lt;/p&gt;\r\n\r\n&lt;h1&gt;Defination Of Newton Third Law &lt;!--1--&gt;&lt;/h1&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;quot;When an one object exert force on another object then another object also exert force on it ; this force equal in magnitude but opposite in direction&amp;quot;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;&lt;strong&gt;Note :-&amp;nbsp;&lt;/strong&gt;Action and reaction force never balance each other because they react on different bodies&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;h2&gt;Restriction of newton laws is it applied on those object which is not move with a speed of light&lt;/h2&gt;\r\n\r\n&lt;h1&gt;Defination And Types of Equilibrium&lt;/h1&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Defination :- 1-&amp;nbsp;&lt;/strong&gt;The condition of a system when state and internal energy of a system does not change&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 2- When all the forces acting on a body are balanced then body said to be in equilibrium&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Explaination :-&amp;nbsp;&amp;nbsp;&lt;/strong&gt;here balance mean net force (sum of all forces by vector addition) is&amp;nbsp; &lt;strong&gt;0&amp;nbsp;&lt;/strong&gt;and acceleration is&amp;nbsp;&lt;strong&gt;0&lt;/strong&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;strong&gt;Zero&amp;nbsp;&lt;/strong&gt;acceleration does not mean body is at rest two possibilities are&amp;nbsp; possible&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 1- Body is at rest&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;2-Body is moving with uniform motion&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &lt;strong&gt;==&amp;gt;&lt;/strong&gt;&amp;nbsp;Equilibrium concept drive from newton first law&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;strong&gt;TYPES&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 1-&amp;nbsp;&lt;/strong&gt;STATIC Equilibrium&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;2-Dynamic equilibrium&lt;/p&gt;\r\n\r\n&lt;h2&gt;Static equilibrium&lt;/h2&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; When some of external forces and torque is zero&lt;/p&gt;\r\n\r\n&lt;h2&gt;Dynamic equilibrium&lt;/h2&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; It is an equilibrium in which net force acting on a moving object&amp;nbsp;&amp;nbsp;is zero&lt;/p&gt;\r\n\r\n&lt;h2&gt;Defination of momentum :&lt;/h2&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&amp;nbsp;Dot product of mass and velocity is called momentum&lt;/p&gt;\r\n\r\n&lt;h2&gt;Formula: &lt;strong&gt;p&lt;/strong&gt;&amp;nbsp;= m.&lt;strong&gt;v&lt;/strong&gt;&lt;/h2&gt;\r\n\r\n&lt;h2&gt;Work done by constant force&lt;/h2&gt;\r\n\r\n&lt;h3&gt;Formula : W = &lt;strong&gt;F&lt;/strong&gt;.&lt;strong&gt;d&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n&lt;h2&gt;Work done by a variable force&lt;/h2&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;=&amp;gt; Divide the complete path into small patches in which force is contant and then add all patches by sigma&lt;/p&gt;\r\n\r\n&lt;p&gt;=&amp;gt; or direct way of find area under the curve by definate integral&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Imp points about work&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;1- Work done of conservative force is independent of path&lt;/p&gt;\r\n\r\n&lt;p&gt;2-Potential energy can be defined only for conservative force&lt;/p&gt;\r\n\r\n&lt;p&gt;3-Work done W = &lt;strong&gt;-(negative)&amp;nbsp;&lt;/strong&gt;change in potential energy&lt;/p&gt;\r\n\r\n&lt;p&gt;4-Work done W = change in kinetic energy&lt;/p&gt;\r\n\r\n&lt;p&gt;5- when change in internal energy is zero then work = change in kinetic energy&amp;nbsp; = change in potential energy&lt;/p&gt;\r\n\r\n&lt;h1&gt;Potential energy further types&lt;/h1&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Mechanical energy :&amp;nbsp;&lt;/strong&gt;Energy stored due to force&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Nuclear Energy :&lt;/strong&gt;&amp;nbsp;Energy stored in nucleus of atom and hold nucleus together&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Chemical Energy :&lt;/strong&gt;&amp;nbsp;Energy stored in the bond b/w atoms and hold molecules together&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Radiant Energy :&amp;nbsp;&lt;/strong&gt;Electromagnetic energy that travel in the form of transeverse wave vibrating at right angle ,it is radiated by the sun&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;h1&gt;Keplers all laws&lt;/h1&gt;\r\n\r\n&lt;h2&gt;Keplers first law :-&lt;/h2&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; The orbit of planet around the sun is in the shape of eillipse and sun is at anyone focus of ellipse&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;strong&gt;Explaination :&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; Planet around the sun is revolving ,at the path which they followed is elliptical .&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; Shape of ellipse&amp;nbsp; are ..go to google it to understand deeply.It has two focus ,and one major axis and one minor axi&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp;&lt;img alt=&quot;&quot; src=&quot;/source/php/file/kcfinder/upload/images/ellipse.jpg&quot; style=&quot;height:226px; width:400px&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;keplar say that sun is lie at anyone of focus ,it may be left focus or right focus&lt;/p&gt;\r\n\r\n&lt;h2&gt;Keplers second law :-&lt;/h2&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;When planet moves in orbit , radius vector sweep out(carry) equal area in equal in equal interval of time&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Explaination :&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;&amp;nbsp;&amp;nbsp;&lt;img alt=&quot;&quot; src=&quot;/source/php/file/kcfinder/upload/images/keplers%20second%20law%20expl.jpg&quot; style=&quot;height:800px; width:600px&quot; /&gt;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;h1&gt;Keplers third law&lt;/h1&gt;\r\n\r\n&lt;p&gt;Square of period is proportional to cube of radius of semi-major axi&lt;/p&gt;\r\n\r\n&lt;h2&gt;Formula :- &amp;nbsp; T^2 directly proportional to r^3&lt;/h2&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;Lecture slide Link&amp;nbsp;&amp;nbsp;&lt;a href=&quot;https://drive.google.com/open?id=1VRfCBqg60o60bycIPbJR6bsSOns1EThR&quot;&gt;Force,energy,newtonLaw slide&lt;/a&gt;&lt;/p&gt;\r\n\r\n&lt;h2&gt;&amp;nbsp;Defination of mass :-&lt;/h2&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; resistance of an object to change its velocity&lt;/p&gt;\r\n', '/php/file/kcfinder/upload/images/title_image/5d7e060652b59newtonlaws.jpg', 'm_ahmed_mushtaq_', 'force-linear-motion-work-and-energy', 'no', '2019-09-15 09:36:06'),
(2, 'Islamiat Notes For Nust Students Part 1', 'Islamiat notes ', 'notesislamiat,nuststudents', 'Islamiat Notes For Nust Students OHT 1', 'islamiat', '&lt;h1&gt;Divine Revelation (Wahy)&lt;/h1&gt;\r\n\r\n&lt;p&gt;At starting every men try to find a right&amp;nbsp;path in which he spend his life and deal with his problems he must uses his&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;1- Five senses&lt;/p&gt;\r\n\r\n&lt;p&gt;2-Intellect&lt;/p&gt;\r\n\r\n&lt;p&gt;3-Wahy&lt;/p&gt;\r\n\r\n&lt;p&gt;3rd point explaination&lt;/p&gt;\r\n\r\n&lt;p&gt;If he is not able to find a right path then ALLAH (SWT) send his messangers which spread his message ALLAH (SWT) send his wahy to his messengers&amp;nbsp;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;DIVINE REVELATION MEANING :&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;/strong&gt;The message of Allah toward his men&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Types&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;1-&amp;nbsp;&lt;strong&gt;Quranic Wahy :&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;&lt;/strong&gt;&amp;nbsp;Message of Allah send to Holy Prophet (&lt;em&gt;SALLALLAHOU ALAYHE WASALLAM) and mention in the quran&lt;/em&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;2-&amp;nbsp;&lt;strong&gt;Non-quranic Wahy :&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;/strong&gt;&amp;nbsp;Hadith of Holy Prophet (&lt;em&gt;SALLALLAHOU ALAYHE WASALLAM&lt;/em&gt;) ,actually message of Allah Through Holy Prophet (&lt;em&gt;SALLALLAHOU ALAYHE WASALLAM&lt;/em&gt;)&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;&lt;strong&gt;Reference :&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;Translation : Nor does he speak from (his own) inclination&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;/strong&gt;Surah&amp;nbsp; An-Najm 3&amp;nbsp;ayat&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;h1&gt;Meaning Of Quran&lt;/h1&gt;\r\n\r\n&lt;p&gt;1-Word From Allah&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &lt;strong&gt;Translation&lt;/strong&gt;&lt;strong&gt;&amp;nbsp;:&amp;nbsp;&lt;/strong&gt;&amp;quot;By The Honored Quran&amp;quot;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;&lt;strong&gt;Reference :&amp;nbsp;&lt;/strong&gt;Surah Qaaf&lt;/p&gt;\r\n\r\n&lt;p&gt;2-Revealed On Holy Prophet&amp;nbsp;(&lt;em&gt;SALLALLAHOU ALAYHE WASALLAM&lt;/em&gt;)&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;&lt;strong&gt;Translation : &amp;quot;&lt;/strong&gt;Immensely Blessed is He Who has sent down the Quran to His Bondman that he may be a warner to the entireworld&lt;strong&gt;&amp;quot;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;strong&gt;Reference :&amp;nbsp;&lt;/strong&gt;Surah Furaqan ayat 1,2&lt;/p&gt;\r\n\r\n&lt;p&gt;3-Throught jibreal&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &lt;strong&gt;Inference&lt;/strong&gt;&amp;nbsp;: &amp;quot;No doubt , we have sent&amp;nbsp;down this quran and we most surely are its guardian&amp;quot;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &lt;strong&gt;Reference&lt;/strong&gt; : &amp;quot;Surah Hijar verse 1&amp;quot;&lt;/p&gt;\r\n\r\n&lt;p&gt;4-Written in scripture&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;strong&gt;Inference&lt;/strong&gt; : &amp;quot;By the clear book&amp;quot;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;strong&gt;Reference&lt;/strong&gt; : &amp;quot;Surah Dakhan verse 2&amp;quot;&lt;/p&gt;\r\n\r\n&lt;p&gt;5-Transfer Undoubtely&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;&lt;strong&gt;Inference&lt;/strong&gt; &amp;quot;Allah (SWT ) has sent down this book and he is a protector of this book&amp;quot;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &lt;strong&gt;Reference&lt;/strong&gt; : Surah Hijar verse 1&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;h1&gt;Name of Quran&lt;/h1&gt;\r\n\r\n&lt;p&gt;1- Al kitaab&amp;nbsp;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;2- Al Furqaan (The criterion)&lt;/p&gt;\r\n\r\n&lt;p&gt;3- Al zikar&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;4- Al Quran&lt;/p&gt;\r\n\r\n&lt;p&gt;5- Al tanzeel (Surely it is a revelation)&lt;/p&gt;\r\n\r\n&lt;h1&gt;Truthfulness and Authenticity of Quran&lt;/h1&gt;\r\n\r\n&lt;p&gt;When Kafir said this is not a book of Allah then Allah revealed ayat in quran&lt;/p&gt;\r\n\r\n&lt;p&gt;1-&amp;nbsp;&lt;strong&gt;Translation&lt;/strong&gt; : &amp;quot;Then bring a book from Allah which is more guiding either of them that i may follow it, if you should be truthful&amp;nbsp;&amp;quot; -&lt;strong&gt;(surah Al-qasas ayat 49)&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;2- &lt;strong&gt;Inference&lt;/strong&gt;&amp;nbsp;: &amp;quot;If mankind&amp;nbsp;and jin get together to make a book like Quraan they would not be able to produce it,if they were assist to each other &amp;quot; &lt;strong&gt;(surah Al-isra ayat 88)&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;3-Translation:&amp;nbsp; &amp;quot;&lt;/strong&gt;Or&amp;nbsp; do they say &amp;quot;He invented it&amp;quot; Say &amp;quot;bring ten suras like it that have been&amp;nbsp;invented and call upon whomever you can&amp;nbsp; beside Allah ,if you should truthful&amp;quot; -&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;strong&gt;(Surah Hud ayat 13 14)&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;4-&lt;strong&gt;Translation :&lt;/strong&gt; &amp;quot;If you are doubtful about what we have sent down our servant (Muhammad) then produce a surah like there&amp;nbsp;and call upon your witness other than Allah ,if you&amp;nbsp; &amp;nbsp; &amp;nbsp; should be&amp;nbsp;truthful&amp;quot; &lt;strong&gt;(Surah Baqarah ayat 23)&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;h1&gt;Reason to reveal the Quraan gradually&lt;/h1&gt;\r\n\r\n&lt;p&gt;1- To stabilize the Holy Prophet&amp;nbsp;(&lt;em&gt;SALLALLAHOU ALAYHE WASALLAM)&amp;nbsp;&lt;/em&gt;From the suffering caused by unbelievers&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;em&gt;2-&amp;nbsp;&lt;/em&gt;To relax&amp;nbsp; the Holy Prophet&amp;nbsp;(&lt;em&gt;SALLALLAHOU ALAYHE WASALLAM)&lt;/em&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;3- To release the akhamat gradually&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; -&amp;gt;&amp;nbsp; basic believes&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp;-&amp;gt; commandments&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp;-&amp;gt; Prohibition&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;PROHIBITION OF WINE&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;strong&gt;First Stage :&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;&lt;strong&gt;Translation :&amp;nbsp;&lt;/strong&gt;&amp;quot;And from the fruits of palm and grapevines you take intoxicants and provision .Indeed it is the sign for a people who reason&amp;quot; -&amp;nbsp;&lt;strong&gt;(Surah Nahl ayat 67)&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; Second Stage :&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;Inference&amp;nbsp;&amp;nbsp;:&amp;nbsp;&lt;/strong&gt;&amp;quot;And they ask about gambling and wine Say ,&amp;quot;In them is a great sin and (&amp;nbsp;yet some) &amp;nbsp;benefit but their sin is greater than their benefit&amp;quot;&amp;quot; -&amp;nbsp;&lt;strong&gt;(Surah&amp;nbsp;&amp;nbsp;Baqarah ayat&amp;nbsp; 219 half translation)&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;Third stage :&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;Translation :&amp;nbsp;&lt;/strong&gt;&amp;quot;O you have believed , (do)not go near prayer when you have intoxicated&amp;quot;&lt;strong&gt; (Surah Nisa ayat 43)&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;strong&gt;Fourth stage :&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;Translation :&amp;nbsp;&lt;/strong&gt;&amp;quot;O believers&amp;nbsp;, wine and gambling and idols and divining arrow are unclean thing , a work of devil save yourself from them so you may prosper&amp;quot;&lt;strong&gt; (Surah&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; Maida ayat 90)&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;&amp;nbsp; &amp;nbsp;&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;h1&gt;Total Quranic Ayat , Parah, Ahzab/manzil , chapters/Surah&lt;/h1&gt;\r\n\r\n&lt;p&gt;====&amp;gt;&amp;nbsp; &amp;nbsp;114 chapters/Surah , 30 Parah , 7 manzil/Ahzab , 6236 ayat ,540 ruku&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;h1&gt;Quran First And Last Revelation&lt;/h1&gt;\r\n\r\n&lt;h2&gt;First Revelation :&amp;nbsp;&lt;/h2&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &lt;strong&gt;Transaltion&lt;/strong&gt; : &amp;quot;Read in the name of your Lord .Who created man by a clot . Recite ,and your Lord is most Generous .Who taught by pen.Taught man that which he knew&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; not&amp;quot; &lt;strong&gt;- (Surah Al-Alaq 1-5)&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;h2&gt;Last Revelation :&lt;/h2&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &lt;strong&gt;Translation&lt;/strong&gt; : &amp;quot;This day I have completed for you ,your relegion and completed my favour upon you and selected Islam as a religion for you&amp;nbsp;&amp;quot; &lt;strong&gt;(Surah Al Maida ayat 3)&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &lt;strong&gt;Translation&lt;/strong&gt; : &amp;quot;And fear a day when you returned to ALLAH , And every soul compensated for what it earned ,And they will not be treated unjustly&amp;quot;&lt;strong&gt;-(Surah Baqarah Ayat&amp;nbsp; 281 )&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;h1&gt;Main Subjects of Quran&lt;/h1&gt;\r\n\r\n&lt;p&gt;1-&amp;nbsp; Belives&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;2- Commandments&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;3- Stories&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;4- Examples or parables&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;5- Allah&amp;#39;s power&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Believes :&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;/strong&gt;1- Oneness&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp;2-Messengership&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp;3-Hereafter&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp;==&amp;gt;&amp;nbsp; Recorded Arguments&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp;==&amp;gt; Logical Arguments&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp;==&amp;gt; Observation Arguments&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp;==&amp;gt; Experimental Arguments&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &lt;strong&gt;Recorded Arguments :&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;&amp;nbsp;&lt;/strong&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;strong&gt;Translation&lt;/strong&gt; :&amp;nbsp; &amp;nbsp; &amp;quot;And indeed it is (mentioned) in the scripture of former people&amp;quot;&amp;nbsp;&amp;nbsp;&lt;strong&gt;-(Surah Ash-Shu&amp;#39;araah ayat 196)&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;&amp;nbsp; &amp;nbsp;Logical Arguments :&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;&lt;strong&gt;Translation&lt;/strong&gt; : &amp;quot;Yes [we are] able [even] to proportion his fingertips &amp;quot; &lt;strong&gt;(Surah qiyamah ayat 4)&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;Translation : &amp;quot;&lt;/strong&gt;And when Abraham said &amp;quot;My Lord , show me how you give life to the&amp;nbsp;dead &amp;quot;&lt;strong&gt;&amp;quot; (Surah baqarah ayat 260)&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &lt;strong&gt;&amp;nbsp;Translation : &amp;quot; &lt;/strong&gt;Have you not considered the one who argued with Abraham&lt;strong&gt;&amp;quot;(Surah Baqarah ayat 258)&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;strong&gt;Observation Arguments&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &lt;strong&gt;&amp;nbsp; Translation : &amp;quot;&lt;/strong&gt;He created the heaven without pillar&lt;strong&gt;&amp;quot;(Surah luqman ayat 10)&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;&lt;strong&gt;Translation : &amp;quot;&lt;/strong&gt;Have they not looked at the heaven above them -How we structure it adorned it and (how) it has no cracks?&lt;strong&gt;&amp;quot;(Surah qaaf ayat 6)&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;&lt;strong&gt;Translation : &amp;quot;&lt;/strong&gt;And send down from the rain cloud , pouring water .That we may bring forth grain and vegetation.And garden of entwind growth&lt;strong&gt;&amp;quot;(Surah Al Naba ayat 14,15,16)&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;&lt;/strong&gt;&amp;nbsp; &lt;strong&gt;Translation : &amp;quot;&lt;/strong&gt;And the sun moves toward its appointing resting place .This is the commandment of the Dominant,,the Knowing.And the moon we have determined its phase until its return like an old branch of palm tree.It is not for the sun to catch the moon and nor the night supercede the day.And each one isoflating in an orbit&lt;strong&gt;&amp;quot;(Surah Yaseen ayat 38,39,40)&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;&amp;nbsp; Experimental Arguments&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;&lt;/strong&gt;&lt;strong&gt;Translation &amp;quot;&lt;/strong&gt;Hava they not traveled through the earth and observed how was the end of those&amp;nbsp;before them ? They were greater than them in a power&lt;strong&gt;&amp;quot;(Surah room ayat 9)&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp;&lt;strong&gt;Punishment&lt;/strong&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;strong&gt;Name&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;&amp;nbsp;&amp;nbsp;&lt;/strong&gt;&amp;nbsp;Storm&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;Quom-e-Nooh&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp;The wind&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; Quom-e-Aad&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; The rain of storm&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;Quom-e-Lut&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; The Shouting&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;Quom-e-Samado-aad&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; to&amp;nbsp;drown&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;Quom-e-Musa&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; The sink in the earth&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; Qaroon&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Surah Muminun 1-10 translation&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;&amp;nbsp; Translation : &amp;quot;&lt;/strong&gt;Indeed,the believer reached to the goal.And those beseech in their prayers.And those who obstain from vain talking.And those who pay zakat.And those who protect their private parts.Except for their wife and the lawful handmaids who are the property of their hands they are not to be blamed.Then those desire more anything than to .They are the transgressor.Those who regards their trust and their promise and those who keeps watch&amp;nbsp;to the prayers .They are indeed the inheritors&amp;nbsp;&lt;strong&gt;&amp;quot;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;h1&gt;Meaning of tafseer&lt;/h1&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; Explaination meaning of word of Quran and infer shar-e-Ahkamat&lt;/p&gt;\r\n\r\n&lt;p&gt;Sources;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;1- Quran itself&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;2- Prophet traditions&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;3-Saying of companion&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; inference : &amp;quot;O Allah , give him the knowledge of Quran&amp;quot; .Holly Prophet (&lt;em&gt;SALLALLAHOU ALAYHE WASALLAM)&lt;/em&gt;&amp;nbsp;say about Hazrat Abdullah Bin Abbas&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &lt;strong&gt;&amp;nbsp;Inference : &amp;quot; &lt;/strong&gt;Those who desbelived and not considerd the earth and heaven were a joined entity .We seperated them&amp;nbsp;&lt;strong&gt;&amp;quot;(Surah Anbia ayat 30)&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;4-Arabic Lexicon&lt;/p&gt;\r\n\r\n&lt;p&gt;5-common sense&lt;/p&gt;\r\n', '/php/file/kcfinder/upload/images/title_image/5d979b2a305a5islamiat.png', 'm_ahmed_mushtaq_', 'islamiat-notes-for-nust-students-part-1', 'no', '2019-10-04 19:19:06');

-- --------------------------------------------------------

--
-- Table structure for table `send_important_alerts`
--

CREATE TABLE IF NOT EXISTS `send_important_alerts` (
  `id` int(11) NOT NULL,
  `imp_message` text NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trending_posts`
--

CREATE TABLE IF NOT EXISTS `trending_posts` (
  `id` int(11) NOT NULL,
  `no_of_times_visit` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trending_posts`
--

INSERT INTO `trending_posts` (`id`, `no_of_times_visit`, `post_id`) VALUES
(1, 17, 1),
(2, 15, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_email`, `date_time`) VALUES
(1, 'test@gmail.com', '2020-02-04 12:10:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts_data`
--
ALTER TABLE `posts_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `send_important_alerts`
--
ALTER TABLE `send_important_alerts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trending_posts`
--
ALTER TABLE `trending_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `posts_data`
--
ALTER TABLE `posts_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `send_important_alerts`
--
ALTER TABLE `send_important_alerts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trending_posts`
--
ALTER TABLE `trending_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
