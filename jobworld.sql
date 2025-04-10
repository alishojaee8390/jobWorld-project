-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2025 at 04:39 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobworld`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(120) NOT NULL,
  `image` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'برنامه نویسی و طراحی وب', 'public/images/categories/2023-11-21-19-04-12.jpeg', '2023-11-04 12:14:37', '2023-11-21 21:34:12'),
(2, 'اپلیکشین اندرویدی و بازی', 'public/images/categories/2023-11-21-19-03-01.jpeg', '2023-11-04 12:14:37', '2023-11-21 21:33:01'),
(3, 'طراحی گرافیگ و لگو', 'public/images/categories/2023-11-21-19-02-46.jpeg', '2023-11-04 15:23:06', '2023-11-21 21:32:46'),
(4, 'طراحی قالب وردپرس', 'public/images/categories/2023-11-21-19-02-37.jpeg', '2023-11-04 15:24:00', '2023-11-21 21:32:37'),
(7, 'تایپ ترجمه', 'public/images/categories/2023-11-21-19-02-28.jpeg', '2023-11-04 15:26:33', '2023-11-21 21:32:28'),
(8, 'تولید محتوا', 'public/images/categories/2023-11-21-19-05-05.jpeg', '2023-11-04 15:53:48', '2023-11-21 21:35:05'),
(10, 'نصب و راه اندازی وردپرس', 'public/images/categories/2023-11-21-19-01-12.jpeg', '2023-11-21 20:03:11', '2023-11-21 21:31:12'),
(11, 'خدمات سو', 'public/images/categories/2023-11-21-19-00-43.png', '2023-11-21 20:03:18', '2023-11-21 21:30:43');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `university_name` varchar(255) NOT NULL,
  `feild_study` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date_start` varchar(255) NOT NULL,
  `date_end` varchar(255) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `university_name`, `feild_study`, `description`, `date_start`, `date_end`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'فردوسی', 'کامپیوتر', 'در دانشگاه فردوسی درس خواندم', '۱۳۹۹/۰۷/۰۱', '۱۴۰۲/۰۳/۲۳', 16, '2024-10-18 19:04:37', NULL),
(3, 'شریف', 'کامپیوتر کارشناسی', 'در دشماسیبشکس شسیت کشم سیهبتشخ شمت شستیمک تشسیمدشسدروشس شوسد بشس خشتسیخه شمسیتبشت شیب تش ش کت خشست شت شخبت شختب خشت شخ تشخ شخ تشسم شوسوشسد شتم شتسم ', '۱۴۰۳/۰۷/۲۷', '۱۴۰۳/۰۷/۲۷', 16, '2024-10-18 19:20:10', NULL),
(4, 'شریف', 'کامپیوتر', 'در دانشگاه شرف درس خوانده ام', '۱۳۹۶/۱۱/۱۰', '۱۳۹۸/۱۱/۱۵', 26, '2024-11-18 19:53:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `escrow`
--

CREATE TABLE `escrow` (
  `id` int(11) NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `milestone_id` int(10) UNSIGNED NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'held => 1 , released => 2',
  `created_at` datetime NOT NULL,
  `released_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `escrow`
--

INSERT INTO `escrow` (`id`, `project_id`, `milestone_id`, `amount`, `status`, `created_at`, `released_at`, `updated_at`) VALUES
(8, 13, 4, 200000, 2, '2024-12-01 19:16:02', '2024-12-01 17:15:24', '2024-12-01 19:45:24'),
(9, 13, 5, 500000, 2, '2024-12-01 19:56:25', '2024-12-01 17:27:33', '2024-12-01 19:57:33'),
(10, 13, 6, 500000, 2, '2024-12-01 20:02:49', '2024-12-01 17:50:24', '2024-12-01 20:20:24'),
(11, 13, 7, 3, 1, '2024-12-01 20:24:10', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `freelancers`
--

CREATE TABLE `freelancers` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `expertise` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `skills` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(120) NOT NULL,
  `url` varchar(255) NOT NULL,
  `parent_id` int(11) UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `url`, `parent_id`, `created_at`, `updated_at`) VALUES
(6, 'پروژه ها', 'show-projects', NULL, '2023-11-13 23:10:43', '2024-08-21 13:17:23'),
(9, 'فریلنسر ها', 'show-freelancers', NULL, '2023-11-13 23:12:19', '2024-10-15 12:24:56'),
(12, 'درباره ما', 'about-us', NULL, '2024-11-18 23:04:58', NULL),
(13, 'تماس با ما', 'contact-us', NULL, '2024-11-18 23:05:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `seen` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 => unseen , 1 => seen',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `receiver_id`, `project_id`, `message`, `seen`, `created_at`, `updated_at`) VALUES
(40, 19, 16, 11, 'سلام من کارفرما هستم', 1, '2024-11-17 10:38:25', '2025-01-22 17:02:49'),
(41, 16, 19, 11, 'سلام من فریلنسر هستم', 1, '2024-11-17 10:38:42', '2024-11-30 12:32:47'),
(42, 19, 16, 11, 'خوبی فریلنسر', 1, '2024-11-17 10:38:56', '2025-01-22 17:02:49'),
(43, 16, 19, 11, 'ممنون شما خوبی', 1, '2024-11-17 10:39:13', '2024-11-30 12:32:47'),
(44, 19, 15, 11, 'سلام امیر رضایی', 1, '2024-11-17 11:14:36', '2024-12-07 18:19:06'),
(45, 15, 19, 11, 'سلام کارفرما عزیزم', 1, '2024-11-17 11:18:45', '2024-11-30 12:32:47'),
(46, 19, 15, 11, 'خوبی امیر جان', 1, '2024-11-17 11:20:53', '2024-12-07 18:19:06'),
(47, 15, 19, 11, 'ممنون شما خوبی کارفرمای عزیزم', 1, '2024-11-17 11:22:24', '2024-11-30 12:32:47'),
(48, 19, 15, 11, 'اره عزیزم تو خوبی فریلنسر', 1, '2024-11-17 11:23:24', '2024-12-07 18:19:06'),
(49, 15, 19, 11, 'چخبر کارفرمای عزیزم', 1, '2024-11-17 11:23:54', '2024-11-30 12:32:47'),
(50, 15, 19, 11, 'ی پروژه دارم', 1, '2024-11-17 12:43:11', '2024-11-30 12:32:47'),
(51, 19, 15, 11, 'پروژه چی', 1, '2024-11-17 12:43:47', '2024-12-07 18:19:06'),
(52, 19, 15, 11, 'چقد داری', 1, '2024-11-17 12:44:45', '2024-12-07 18:19:06'),
(53, 15, 19, 11, 'مبلغم کمه', 1, '2024-11-17 12:48:33', '2024-11-30 12:32:47'),
(54, 19, 15, 11, 'خب چقدره', 1, '2024-11-17 12:49:29', '2024-12-07 18:19:06'),
(55, 15, 19, 11, 'زیاد نیست', 1, '2024-11-17 12:49:53', '2024-11-30 12:32:47'),
(56, 15, 19, 11, 'کمه', 1, '2024-11-17 12:54:43', '2024-11-30 12:32:47'),
(57, 15, 19, 11, 'باشه اوکی', 1, '2024-11-17 13:01:40', '2024-11-30 12:32:47'),
(58, 19, 15, 11, 'فروشگاه اینترنتی', 1, '2024-11-17 13:12:10', '2024-12-07 18:19:06'),
(59, 19, 15, 11, '', 1, '2024-11-17 13:21:07', '2024-12-07 18:19:06'),
(60, 19, 15, 11, '', 1, '2024-11-17 13:22:13', '2024-12-07 18:19:06'),
(61, 19, 15, 11, '', 1, '2024-11-17 13:22:27', '2024-12-07 18:19:06'),
(62, 19, 15, 11, '', 1, '2024-11-17 13:23:03', '2024-12-07 18:19:06'),
(63, 19, 15, 11, '', 1, '2024-11-17 13:23:20', '2024-12-07 18:19:06'),
(64, 15, 19, 11, '', 1, '2024-11-17 13:23:26', '2024-11-30 12:32:47'),
(65, 15, 19, 11, 'شسیب', 1, '2024-11-17 13:23:47', '2024-11-30 12:32:47'),
(66, 15, 19, 11, 'asd', 1, '2024-11-17 13:26:14', '2024-11-30 12:32:47'),
(67, 19, 15, 11, 'بازیه', 1, '2024-11-17 13:32:09', '2024-12-07 18:19:06'),
(68, 15, 19, 11, 'اره', 1, '2024-11-17 13:33:34', '2024-11-30 12:32:47'),
(69, 19, 15, 11, 'باشه انجام میدم', 1, '2024-11-17 13:36:09', '2024-12-07 18:19:06'),
(70, 15, 19, 11, 'باشه', 1, '2024-11-17 13:36:58', '2024-11-30 12:32:47'),
(71, 19, 15, 11, 'ad', 1, '2024-11-17 13:37:33', '2024-12-07 18:19:06'),
(72, 27, 26, 13, 'سلام ', 1, '2024-11-18 21:13:19', '2024-12-01 18:26:18'),
(73, 26, 27, 13, 'سلام', 1, '2024-11-18 21:13:29', '2024-12-01 18:20:56'),
(74, 26, 27, 13, 'خوبین ', 1, '2024-11-18 21:13:33', '2024-12-01 18:20:56'),
(75, 27, 26, 13, 'ممنون شما خوبی', 1, '2024-11-18 21:13:38', '2024-12-01 18:26:18'),
(76, 27, 26, 13, 'مرسی سریع میخوام پروژم انجام شه لطفا', 1, '2024-11-18 21:14:04', '2024-12-01 18:26:18'),
(77, 26, 27, 13, 'چشم حتما', 1, '2024-11-18 21:14:14', '2024-12-01 18:20:56'),
(78, 27, 16, 13, 'سلام ', 1, '2024-11-18 21:17:59', '2024-11-18 21:53:49'),
(79, 27, 16, 13, 'خوب هستین؟', 1, '2024-11-18 21:18:06', '2024-11-18 21:53:49'),
(80, 16, 27, 13, 'سلام', 1, '2024-11-18 21:18:12', '2024-12-01 18:20:56'),
(81, 16, 27, 13, 'بله مرسی', 1, '2024-11-18 21:18:14', '2024-12-01 18:20:56'),
(82, 27, 16, 13, 'وقت برای من مهمه باید سریع پروژه طراحی شود', 1, '2024-11-18 21:18:46', '2024-11-18 21:53:50'),
(83, 16, 27, 13, 'بله حتما', 1, '2024-11-18 21:18:59', '2024-12-01 18:20:56'),
(84, 27, 15, 13, 'سلام ', 1, '2024-11-18 21:53:16', '2024-11-18 21:53:26'),
(85, 27, 15, 13, 'خسته نباشید', 1, '2024-11-18 21:53:18', '2024-11-18 21:53:26'),
(86, 15, 27, 13, 'سلام ', 1, '2024-11-18 21:53:41', '2024-12-01 18:20:56'),
(87, 15, 27, 13, 'بله', 1, '2024-11-18 21:53:42', '2024-12-01 18:20:56');

-- --------------------------------------------------------

--
-- Table structure for table `milestones`
--

CREATE TABLE `milestones` (
  `id` int(11) UNSIGNED NOT NULL,
  `project_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `amount` decimal(10,0) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 => pending , 2 => doing , 3 => completed',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `milestones`
--

INSERT INTO `milestones` (`id`, `project_id`, `name`, `description`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(4, 13, 'طراحی صفحه وب سایت', 'طراحی فرانت سایت', 200000, 3, '2024-12-01 11:48:50', '2024-12-01 19:16:47'),
(5, 13, 'درباره ما', 'طراحی صفحه فرانت درباره ما ', 500000, 3, '2024-12-01 19:56:06', '2024-12-01 19:57:25'),
(6, 13, 'کد نویسی بک اند', 'سمت بک اند باید کد نویسی شود', 500000, 3, '2024-12-01 20:01:45', '2024-12-01 20:23:43'),
(7, 13, '3', '3', 3, 2, '2024-12-01 20:23:59', '2024-12-01 20:24:10');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `description`, `title`, `created_at`, `updated_at`) VALUES
(1, '<p>ما یک بازار کار آنلاین نیستیم. در واقع ما یک کارخانه آنلاین هستیم که با فراهم کردن ابزار مناسب برای انسانهای با انگیزه، کمک می کنیم تا جهان به مکان بهتری برای زندگی تبدیل شود. ما باور داریم کارآفرینان، فریلنسرها/کارمندان موفق می توانند دنیای بهتری را برای همه ما خلق کنند. هدف ما جهانی شدن است و برای رسیدن به این هدف گام بر میداریم و تلاش می کنیم. پونیشا یک پلتفرم نیست، پونیشا یک سبک زندگیست. سبک زندگی برای فریلنسرها، کارآفرینان و کارمندان ما. ما برای همه امکاناتی را فراهم می آوریم تا بتوانند با اطمینان و بدون حضور فیزیکی با یکدیگر کار کنند، پروژه ها را انجام دهند، محصولات جدید خلق کنند، و یا کیفیت محصولات فعلی را بهبود بخشند. ما کمک می کنیم بهره وری افزایش یابد و ساعات مفید کاری بیشتر شود. ما کمک می کنیم از وقت خود بهتر استفاده کنید و درآمد بیشتری کسب کنید. همینطور با کم کردن رفت و آمدهای غیر ضروری، به بهبود محیط زیست کمک می کنیم. در این چند سال توانستیم به رونق و اشتغال فریلنسرها و کارآفرینان در شهرهای کوچک تر نیز کمک کنیم، تا جایی که توانستیم تا حدودی جلوی مهاجرت های غیر ضروری نیروهای متخصص به شهرهای بزرگ را بگیریم. باید اعلام کنیم که ما همه این اتفاقات خوب را مدیون اعتماد و پیگیری کاربرانمان هستیم، کاربرانی که از پونیشا استفاده می کنند، کاربرانی که هر روز پیشنهادها و نظرات خود را برای بهتر شدن این پلتفرم برایمان ارسال می کنند، و کاربرانی که ما را از خود می دانند و با ما همراه هستند. اگر افرادی را می شناسید که به خدمات پونیشا نیاز دارند، همین امروز آنها را به پونیشا دعوت کنید. صاحب امتیاز : شرکت پویندگان نیرو شایسته منطقه آزاد انزلی (سهامی خاص)</p>\r\n', 'درباره ما', '2023-12-25 11:01:12', '2023-12-25 14:00:09'),
(2, '<p>شرایط و قوانین استفاده از خدمات وب&zwnj;سایت کارلنسر لطفا قوانین و شرایط استفاده ذکر شده در این متن را پیش از شروع به استفاده از سایت با دقت مطالعه فرمایید . استفاده از وب&zwnj;سایت، عضویت و ایجاد اشتراک در وب&zwnj;سایت و یا انتخاب گزینه&zwnj;ی موافقت با شرایط استفاده به این معناست که شما قوانین و مقررات استفاده و خط مشی&zwnj;های مربوط به حریم خصوصی در کارلنسر را متوجه شده و پذیرفته&zwnj;اید. در صورت عدم موافقت با این شرایط حق استفاده از وب&zwnj;سایت ، اپلیکیشن تلفن همراه و سایر خدمات کارلنسر از شما سلب می&zwnj;شود. این سایت مطابق با قوانین جمهوری اسلامی ایران اداره می&zwnj;شود و تبادل هرگونه محتوای مجرمانه، خلاف شئونات اخلاقی، عرفی، حقوق بشر و مقررات جمهوری اسلامی ایران منجر به لغو دسترسی و مسدود شدن حساب کاربری فرد خاطی می&zwnj;گردد. تعریف و تبیین واژگان: منظور از &quot;وب&zwnj;سایت ما&quot; ، &quot;سایت&quot;، &quot;ما&quot; و &quot;کارلنسر&quot; وب&zwnj;سایت karlancer.com می&zwnj;باشد کاربر و کاربران سایت هر شخصی است که به هر شکلی از خدمات این وب سایت استفاده نماید. حتی بازدید از صفحات و محتوای آموزشی سایت نیز شامل وارد استفاده از وب&zwnj;سایت می&zwnj;باشد. اکانت یا حساب کاربری داشبورد شخصی استفاده هر کاربر از خدمات حرفه&zwnj;ای وب&zwnj;سایت است. خریدار، کارفرما یا سفارش دهنده فردی است که با عضویت در سایت درخواست انجام کار یا برون&zwnj;سپاری پروژه&zwnj;ای را دارد. فریلنسر، مجری یا پیمانکار شخصی است که ضمن اعلام آمادگی جهت ارایه مهارت&zwnj;های حرفه&zwnj;ای خود اقدام به ارسال پیشنهاد و انجام پروژه&zwnj;های حرفه&zwnj;ای به قصد کسب در آمد می&zwnj;کند. کسب درآمد و دریافت دستمزد منوط به رضایت کامل کارفرما و حسن انجام کار می&zwnj;باشد. سایت کارلنسر صرفا به عنوان یک بنگاه واسطه بین کارفرما ( خریدار) و پیمانکار ( فریلنسرها) ایفای نقش می&zwnj;کند. از طریق سایت کارلنسر کارفرماها این امکان را دارند که با برون&zwnj;سپاری پروژه&zwnj;های خود آنها را در معرض دید فریلنسرهای حرفه&zwnj;ای قرار داده و از بین فریلنسرهای متقاضی اقدام به انتخاب فرد مورد نیاز خود نمایند. همچنین فریلنسرها این امکان را دارند که با ارایه خدمات حرفه&zwnj;ای خود اقدام به قبول پروژه و کسب درآمد نمایند. چکیده شرایط : تمامی پروژه&zwnj;ها و سفارشات باید از طریق Karlancer.com ثبت و تحویل گردند. خروج از این شرایط تحت هر شرایطی بدون کسب موافقت رسمی سایت منجر به لغو پشتیبانی سایت شده و می&zwnj;تواند مسدود شدن حساب کاربری خریدار و فروشنده خاطی را به دنبال داشته باشد. برخی خدمات در کارلنسر با انتخاب یا اعلام به کارفرما توسط مدیر پروژه خود سایت انجام می&zwnj;شود. در این خدمات کارلنسر با توجه به نیاز کارفرما و رعایت اصول کیفی کار را به یک فریلنسر یا تیمی از فریلنسرها می&zwnj;سپارد. برای برخی خدمات ممکن است یک قیمت پایه محاسبه گردد. این قیمت بر مبنای میانگین پروژه&zwnj;های انجام شده مجاسبه می&zwnj;شود. مبلغ نهایی هر پروژه مبلغی است که پس از ارسال پیشنهاد توسط فریلنسر و نهایی کردن پروژه توافق می&zwnj;شود. در هنگام برون&zwnj;سپاری پروژه مبلغ کل آن پروژه به توسط روش&zwnj;های پرداخت در نظر گرفته شده در قالب پرداخت امن به سایت پرداخت می&zwnj;گردد. این وجه در خلال اجرای کارمگر در صورتی که فریلنسر اقدام به لغو پروژه نماید قابل بازگشت به کارفرما نیست و تا انتهای پروژه به عنوان ضمانت حسن انجام کار توسط فریلنسر نزد کارلنسر می&zwnj;ماند. کارفرما تا ۵ روز بعد از اتمام پروژه می&zwnj;تواند نسبت به تایید پروژه یا درخواست اصلاح یا اعمال تغییرات اقدام کند. در صورت عدم انجام فعالیت از سمت کارفرما پس از ۵ روز پروژه به صورت اتوماتیک تایید شده و وجه انجام پروژه پس از کسر درصدهای کارمزد سایت به حساب کاربری فریلنسر انتقال داده می&zwnj;شود. در صورت بروز اختلاف بین فریلنسر و کارفرما و عدم حل اختلاف بین طرفین سایت به عنوان مرجع حل اختلاف بین طرفین عمل می&zwnj;کند. در صورت ارجاع اختلاف به کارلنسر دو طرف ملزم به قبول نتیجه داوری نهایی سایت می&zwnj;باشند. در صورت برنده شدن کارفرما در حل اختلاف کل مبلغ پروژه به کارفرما بازگردانده می&zwnj;شود. شرایط ثبت نام : ثبت نام در کارلنسر برای تمامی افراد به شرط موافقت با قوانین و مقررات سایت و قوانین جمهوری اسلامی ایران امکان پذیر است. حداقل سن ثبت نام در کارلنسر ۱۸ سال است. هر کاربر مجاز به ساخت یک حساب کاربری به عنوان فریلنسر و یک حساب کاربری به عنوان کارفرما می&zwnj;باشد. ایجاد بیش از این تعداد اکانت تخلف محسوب شده و می&zwnj;تواند منجر به عواقبی مانند مسدود شدن تمام حساب&zwnj;های کاربری کاربر خاطی گردد. ثبت نام در سایت به قصد سو استفاده ، کپی رایت غیر قانونی ، انجام فعالیت&zwnj;های مجرمانه و خارج از عرف و شیونات مجاز نیست و با این گونه فعالیت&zwnj;های متخلفانه برخورد خواهد شد.</p>\r\n', 'قوانین و مقررات', '2023-12-25 11:01:12', '2023-12-25 13:59:49');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `project_id` int(11) UNSIGNED NOT NULL,
  `payer_id` int(11) UNSIGNED NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `status` enum('pending','completed','refunded','') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_galleries`
--

CREATE TABLE `portfolio_galleries` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `budget` decimal(11,0) NOT NULL,
  `suggested_time` int(10) UNSIGNED NOT NULL,
  `time_expire` int(11) NOT NULL,
  `description` text NOT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 => open, 2 => completed , 3 => assigned',
  `image` text DEFAULT NULL,
  `freelancer_id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `cat_id` int(10) UNSIGNED NOT NULL,
  `file` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `budget`, `suggested_time`, `time_expire`, `description`, `tags`, `status`, `image`, `freelancer_id`, `user_id`, `cat_id`, `file`, `created_at`, `updated_at`) VALUES
(11, 'طراحی صفحه وب', 5000000, 20, 0, 'یک پروژه ساده دارم که میخوام برام طراحی کنید ', 'bootstrap,html ,css', 1, NULL, 16, 19, 1, 'public/files/projects/2024-12-08-10-35-03.png', '2024-10-18 22:27:09', '2024-12-08 13:05:03'),
(12, 'طراحی بازی اندرویدی', 233333, 2, 0, 'ی پروژه اندوریدی میخوام که بازی های متنوع رو اجرا کنه', 'flutter,java', 3, NULL, 15, 19, 2, NULL, '2024-10-18 22:32:34', '2024-12-07 20:25:22'),
(13, 'طراحی سایت فروشگاهی', 15000000, 7, 0, 'ی سایت فروشگاهی میخوام با امکانات کامل با تشکر.', 'html , css , javasctip , php', 3, NULL, 26, 27, 1, NULL, '2024-11-18 20:08:07', '2024-12-01 18:33:17');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(10) UNSIGNED NOT NULL,
  `skills` varchar(255) DEFAULT NULL,
  `expertise_title` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skills`, `expertise_title`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 'html,css,js,php,', 'برنامه نویس بک اند', 15, '2023-11-27 11:11:38', NULL),
(4, 'js,reactjs,sass,typescript', 'برنامه نویس فرانت اند', 16, '2023-11-27 11:11:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suggestions`
--

CREATE TABLE `suggestions` (
  `id` int(11) NOT NULL,
  `suggestions` int(11) NOT NULL DEFAULT 10,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `suggestions`
--

INSERT INTO `suggestions` (`id`, `suggestions`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 7, 16, '2024-10-21 20:17:00', '2024-11-18 21:16:54'),
(2, 9, 15, '2024-10-22 10:58:43', '2024-11-18 21:51:44'),
(6, 7, 26, '2024-11-18 19:43:04', '2024-12-07 17:13:35'),
(63, 10, 32, '2024-11-19 01:38:52', NULL),
(64, 10, 27, '2024-11-19 01:41:27', NULL),
(65, 10, 12, '2024-12-05 12:58:56', NULL),
(66, 10, 19, '2024-12-06 19:18:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suggestion_project`
--

CREATE TABLE `suggestion_project` (
  `id` int(10) UNSIGNED NOT NULL,
  `pirce` int(11) NOT NULL,
  `guaranteed_expertise` int(11) NOT NULL,
  `deadline_work` int(11) NOT NULL,
  `description` text NOT NULL,
  `file` text DEFAULT NULL,
  `project_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `suggestion_project`
--

INSERT INTO `suggestion_project` (`id`, `pirce`, `guaranteed_expertise`, `deadline_work`, `description`, `file`, `project_id`, `user_id`, `created_at`, `updated_at`) VALUES
(22, 60000, 50, 2, 'gfjgjkk khgkjj jh\r\n', NULL, 11, 16, '2024-10-19 12:19:20', NULL),
(23, 2222224, 60, 23, 'من میتونم دوستس عزیز', NULL, 11, 15, '2024-10-19 12:25:48', NULL),
(24, 500000, 100, 5, 'من به راحتی میتونم طراحی کنم نگران نباشید', NULL, 12, 15, '2024-10-19 12:46:52', NULL),
(25, 22222, 80, 2, 'خواهشنسی کشسی شمسیت شدیدئو سیوو یس', NULL, 12, 16, '2024-10-19 12:52:25', NULL),
(40, 5000000, 50, 5, 'من میتونم برادر', NULL, 13, 26, '2024-11-18 20:10:27', NULL),
(42, 6000000, 70, 2, 'سلام خسته نباشید من میتونم سایت شما رو طراحی کنم ', NULL, 13, 16, '2024-11-18 21:16:54', NULL),
(43, 9000000, 100, 2, 'سلام خسته نباشید سایت ورپرسی باشد یا کدنویسی شود.', NULL, 13, 15, '2024-11-18 21:51:44', NULL),
(44, 5000000, 100, 20, 'سلام خسته نباشید چیکاری از دستم بر میاد', NULL, 17, 26, '2024-12-07 17:13:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0 => closed , 1 => opend',
  `category_id` int(10) UNSIGNED NOT NULL,
  `ticket_id` int(11) UNSIGNED DEFAULT NULL,
  `priority_id` int(11) UNSIGNED NOT NULL COMMENT '1 => low , 2 => medium , 3 => high',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `user_id`, `title`, `description`, `status`, `category_id`, `ticket_id`, `priority_id`, `created_at`, `updated_at`) VALUES
(17, 26, 'سیستم برداشت', 'سیستم برداشت خراب است لطفا درست شود', 0, 5, NULL, 3, '2025-01-27 18:08:03', '2025-01-27 18:11:46'),
(18, 26, 'خراب است', 'سلام خراب است', 0, 6, NULL, 3, '2025-01-27 18:17:49', '2025-01-27 19:04:41');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_categories`
--

CREATE TABLE `ticket_categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ticket_categories`
--

INSERT INTO `ticket_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(5, 'مالی', '2024-12-01 22:04:21', '2024-12-01 22:08:41'),
(6, 'سایت', '2024-12-05 12:28:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_priorities`
--

CREATE TABLE `ticket_priorities` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ticket_priorities`
--

INSERT INTO `ticket_priorities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'پایین', '2024-12-05 08:23:17', '2024-12-05 11:59:43'),
(2, 'متوسط', '2024-12-05 11:59:47', NULL),
(3, 'فوری', '2024-12-05 11:59:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_replies`
--

CREATE TABLE `ticket_replies` (
  `id` int(11) NOT NULL,
  `ticket_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `is_admin` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ticket_replies`
--

INSERT INTO `ticket_replies` (`id`, `ticket_id`, `user_id`, `description`, `is_admin`, `created_at`, `updated_at`) VALUES
(2, 17, 12, '<p>سلام خسته نباشد مشکل رفع شد</p>\r\n', 1, '2025-01-27 18:11:46', NULL),
(3, 18, 12, '<p>سلام رفع شد</p>\r\n', 1, '2025-01-27 19:04:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `type` enum('deposit','withdraw','transfer','') NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 => notComfired , 2 => comfired',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `type`, `amount`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 27, 'deposit', 5, NULL, 1, '2024-11-25 21:59:21', NULL),
(2, 27, 'deposit', 10000, NULL, 1, '2024-11-25 21:59:37', NULL),
(3, 27, 'withdraw', 50, NULL, 2, '2024-11-25 22:24:19', '2024-12-07 19:13:36'),
(4, 27, 'withdraw', 35, NULL, 1, '2024-11-25 22:25:26', NULL),
(5, 26, 'withdraw', 100000, NULL, 1, '2024-12-01 20:37:55', NULL),
(6, 26, 'withdraw', 1000000, NULL, 1, '2024-12-07 18:15:56', NULL),
(7, 26, 'withdraw', 1000, NULL, 1, '2024-12-07 18:29:22', NULL),
(8, 26, 'withdraw', 1000, NULL, 1, '2024-12-07 18:30:15', NULL),
(9, 26, 'withdraw', 1000, NULL, 1, '2024-12-07 18:30:29', NULL),
(10, 26, 'withdraw', 1000, NULL, 1, '2024-12-07 18:31:16', NULL),
(11, 26, 'withdraw', 6000, NULL, 1, '2024-12-07 18:31:35', NULL),
(12, 26, 'withdraw', 6, NULL, 1, '2024-12-07 18:32:51', NULL),
(13, 15, 'deposit', 500000, NULL, 1, '2025-01-22 17:57:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `id` int(10) UNSIGNED NOT NULL,
  `skills` varchar(255) DEFAULT NULL,
  `expertise_title` varchar(255) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `work_experience` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`id`, `skills`, `expertise_title`, `education`, `work_experience`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 'php, csss , javascript', 'برنامه نویس بک اند', 'دکترای کامپیوتر\r\nلیسانس مدیریت', 'کار کردن در شرکت X به مدت دوسال', 16, '2023-11-27 11:11:38', '2023-12-23 16:48:31'),
(23, 'css , html', NULL, NULL, NULL, 15, '2024-10-18 20:32:01', '2024-10-18 20:41:54'),
(24, ' php , javascript , css ,c , c#', NULL, NULL, NULL, 26, '2024-11-18 19:49:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userportfolio`
--

CREATE TABLE `userportfolio` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `skills` varchar(255) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `userportfolio`
--

INSERT INTO `userportfolio` (`id`, `title`, `description`, `skills`, `image`, `user_id`, `created_at`, `updated_at`) VALUES
(6, 'نمونه کار جدید', 'جدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استجدیدی استاست', 'css', 'public/images/portfolio/2024-10-15-21-49-20.png', 16, '2024-10-15 23:19:20', '0000-00-00 00:00:00'),
(7, 'پروژه وب سایت سارینا', 'طراحی و توسعه وب سایت ساریینا', 'php , javascript , css , html , bootstrap', 'public/images/portfolio/2024-11-18-17-24-19.png', 26, '2024-11-18 19:54:19', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `city` varchar(120) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `expertise_title` varchar(255) DEFAULT NULL,
  `number_shaba` varchar(255) DEFAULT NULL,
  `account_balance` int(11) NOT NULL DEFAULT 0,
  `remember_tokens` varchar(255) DEFAULT NULL,
  `password` text NOT NULL,
  `permission` enum('admin','user') NOT NULL DEFAULT 'user',
  `activity_user` enum('freelancer','employer') NOT NULL DEFAULT 'freelancer',
  `image` text DEFAULT NULL,
  `verify_token` text DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'enable => 1 , desable => 0',
  `forgot_token` text DEFAULT NULL,
  `forgot_token_expire` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `first_name`, `last_name`, `phone_number`, `city`, `about`, `expertise_title`, `number_shaba`, `account_balance`, `remember_tokens`, `password`, `permission`, `activity_user`, `image`, `verify_token`, `is_active`, `forgot_token`, `forgot_token_expire`, `created_at`, `updated_at`) VALUES
(12, 'jobWorld.online1@gmail.com', 'jobWorld', 'علی', 'شجاعی', '09151498456', 'مشهد', NULL, NULL, NULL, 0, NULL, '$2y$10$qrfCHQ96qkCujU/qf8Spy.X4Od6eYtEZVUZD00BbCSDtWhB1jsJxm', 'admin', 'freelancer', 'public/images/profile-image/2023-11-13-18-37-20.jpeg', '99afae65fe608585dcb71f8cc3cd709b8f6d55a8ee7d8b63ce5a7eefa6ad88e4', 1, '6ea8c03fe79c16aaa3d0d6e42422466f5525003e651871f1039dd5994a9e677e', '2023-11-13 11:19:23', '2023-11-11 18:59:53', '2023-11-13 21:07:20'),
(15, 'amirreza@gmail.com', 'amirreza256', 'امیر', 'رضایی', '09153623025', 'تهران', NULL, 'برنامه نویس فرانت اند', '232323', 0, NULL, '$2y$10$qrfCHQ96qkCujU/qf8Spy.X4Od6eYtEZVUZD00BbCSDtWhB1jsJxm', 'user', 'freelancer', 'public/images/profile-image/2024-10-18-18-26-02.png', '811960318dd702fb0fd6e2a105316e8769f61c2b4bce0f6997ab7e3487256380', 1, NULL, NULL, '2023-11-13 11:04:52', '2024-10-18 21:12:47'),
(16, 'asd@gamil.com', 'hassan', 'رضا', 'حسینی', '09157565325', 'مشهد', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaasdfasf', 'برنامه نویس بک اند', NULL, 100000, NULL, '$2y$10$qrfCHQ96qkCujU/qf8Spy.X4Od6eYtEZVUZD00BbCSDtWhB1jsJxm', 'user', 'freelancer', 'public/images/profile-image/2024-10-15-12-22-56.jpeg', 'cc5a29a63d197ff72742b7211253b72b1b8572f7d7af6fc95236254d9afb13b2', 1, NULL, NULL, '2023-11-27 13:33:04', '2024-10-25 23:43:53'),
(19, 'alishjay.90o@gmail.com', 'root', 'امیرحسیین', 'دلبری', '09157136569', 'تهران', NULL, NULL, NULL, 600000, NULL, '$2y$10$qrfCHQ96qkCujU/qf8Spy.X4Od6eYtEZVUZD00BbCSDtWhB1jsJxm', 'user', 'employer', 'public/images/profile-image/2024-10-15-13-18-56.jpeg', 'f6f562c1079f144c5bf6bfa24fd10c5222fd70e7da9b2af4633857fb011a0903', 1, 'f26220eb6d19b6c2f9c6f5b0469d211eaea2e4bcc85f10c1ccc949e909aa85b2', '2024-10-15 14:52:04', '2024-07-07 07:21:31', '2024-10-15 14:48:56'),
(26, 'bughunter696@gmail.com', 'bughunter696', 'جواد', 'نظری', '09392558565', 'مشهد', 'سال هاست که در حیطه هوش مصنوعی فعالیت میکنم.', 'برنامه نویس هوش مصنوعی', '66', 0, NULL, '$2y$10$qrfCHQ96qkCujU/qf8Spy.X4Od6eYtEZVUZD00BbCSDtWhB1jsJxm', 'user', 'freelancer', 'public/images/profile-image/2024-11-18-17-18-21.jpeg', '41a78c941b75e4fe54e274889eda2d980ade08e3d92b541f442637933b2e937b', 1, NULL, NULL, '2024-11-18 19:42:39', '2024-12-01 20:57:54'),
(27, 'alishjay.966@gmail.com', 'alishjay.9oo', 'محمد', 'نیازی', '09396553625', 'لرستان', NULL, NULL, '66666666666666666666666666', 0, NULL, '$2y$10$qrfCHQ96qkCujU/qf8Spy.X4Od6eYtEZVUZD00BbCSDtWhB1jsJxm', 'user', 'employer', 'public/images/profile-image/2024-11-18-17-36-45.jpeg', '9ab1b405b1a1f32ec94db82adf29cb1caecda6b7ce52c657168ae49d30528618', 1, NULL, NULL, '2024-11-18 20:02:08', '2024-11-18 20:07:05'),
(32, 'alishjay.9oo@gmail.com', 'alishjay.9oo@gmail.com', 'alishjay.9oo@gmail.com', 'alishjay.9oo@gmail.com', '09392115636', NULL, NULL, NULL, NULL, 0, NULL, '$2y$10$qrfCHQ96qkCujU/qf8Spy.X4Od6eYtEZVUZD00BbCSDtWhB1jsJxm', 'user', 'freelancer', NULL, '42e2d054732050f7f450a1141636a7a0435486abae66c589f23472821c338ab6', 1, NULL, NULL, '2024-11-19 01:38:32', '2024-11-19 01:38:46');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` int(11) NOT NULL,
  `balance` decimal(10,0) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `balance`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2, 27, '2024-11-25 21:22:44', '2024-12-01 20:24:10'),
(4, 100000, 26, '2024-12-01 17:14:08', '2024-12-07 18:15:56'),
(5, 500000, 15, '2024-12-05 10:06:34', '2025-01-22 17:57:52'),
(6, 0, 32, '2024-12-05 12:29:43', NULL),
(7, 0, 12, '2024-12-05 12:58:56', NULL),
(8, 0, 19, '2024-12-06 19:18:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `websetting`
--

CREATE TABLE `websetting` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `title_header` varchar(255) DEFAULT NULL,
  `description_header` varchar(255) DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `logo` text DEFAULT NULL,
  `icon` text DEFAULT NULL,
  `background_head` text NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(120) NOT NULL,
  `instagram` varchar(120) NOT NULL,
  `telegram` varchar(120) NOT NULL,
  `twitter` varchar(120) NOT NULL,
  `linkedin` varchar(120) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `websetting`
--

INSERT INTO `websetting` (`id`, `title`, `description`, `title_header`, `description_header`, `keywords`, `logo`, `icon`, `background_head`, `phone`, `email`, `instagram`, `telegram`, `twitter`, `linkedin`, `created_at`, `updated_at`) VALUES
(1, 'jobWorld', '<p><strong>این جا <span class=\"marker\">توضیحات </span>سایت قرار دارد</strong></p>\r\n', 'دورکاری - برونسپاری - استخدام فریلنسر ', '<h3>شغل مورد علاقه تو پیدا کن</h3>\r\n\r\n<h3>پروژه بگیر درامد تو به 100 برسون&nbsp;</h3>\r\n', 'فریلنسری - درامد', 'public/images/setting/logo.png', 'public/images/setting/icon.png', 'public/images/setting/background_head.jpeg', ' 02116448956', ' jobWorld@gmail.com', 'https://www.instagram.com/username/jobworld', 'https://t.me/jobworld', 'https://twitter.com/jobworld', 'https://www.linkedin.com/jobworld', '2023-11-07 16:43:31', '2023-12-03 19:58:15');

-- --------------------------------------------------------

--
-- Table structure for table `work_experience`
--

CREATE TABLE `work_experience` (
  `id` int(11) NOT NULL,
  `compony_name` varchar(255) NOT NULL,
  `job` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date_start` varchar(255) NOT NULL,
  `date_end` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `work_experience`
--

INSERT INTO `work_experience` (`id`, `compony_name`, `job`, `description`, `date_start`, `date_end`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'ایرانیان', 'برنامه نویس وب', 'در شرکت ایرانیان کار کردم و تجربیات خاص به دست اوردم', '۱۳۹۶/۰۱/۳۱', '۱۴۰۳/۰۷/۲۷', 16, '2024-10-18 18:41:50', NULL),
(3, 'شرکت سهام داران ایران', 'برنامه نویس وب', 'به مدت 2 سال همکاری در این شرکت تجربه های خوبی بدست اورده ام.', '۱۴۰۱/۰۸/۱۷', '۱۴۰۲/۰۸/۲۳', 26, '2024-11-18 19:50:17', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `escrow`
--
ALTER TABLE `escrow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `milestone_id` (`milestone_id`);

--
-- Indexes for table `freelancers`
--
ALTER TABLE `freelancers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `milestones`
--
ALTER TABLE `milestones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `payer_id` (`payer_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_skills` (`user_id`);

--
-- Indexes for table `suggestions`
--
ALTER TABLE `suggestions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suggestion_project`
--
ALTER TABLE `suggestion_project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `user_id_project` (`user_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `ticket_id` (`ticket_id`),
  ADD KEY `priority_id` (`priority_id`);

--
-- Indexes for table `ticket_categories`
--
ALTER TABLE `ticket_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_priorities`
--
ALTER TABLE `ticket_priorities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_replies`
--
ALTER TABLE `ticket_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_id` (`ticket_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_skills` (`user_id`);

--
-- Indexes for table `userportfolio`
--
ALTER TABLE `userportfolio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_portfolio` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `websetting`
--
ALTER TABLE `websetting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_experience`
--
ALTER TABLE `work_experience`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `escrow`
--
ALTER TABLE `escrow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `freelancers`
--
ALTER TABLE `freelancers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `milestones`
--
ALTER TABLE `milestones`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `suggestion_project`
--
ALTER TABLE `suggestion_project`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `ticket_categories`
--
ALTER TABLE `ticket_categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ticket_priorities`
--
ALTER TABLE `ticket_priorities`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ticket_replies`
--
ALTER TABLE `ticket_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `userportfolio`
--
ALTER TABLE `userportfolio`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `websetting`
--
ALTER TABLE `websetting`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `work_experience`
--
ALTER TABLE `work_experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `escrow`
--
ALTER TABLE `escrow`
  ADD CONSTRAINT `escrow_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `escrow_ibfk_2` FOREIGN KEY (`milestone_id`) REFERENCES `milestones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `parent_id` FOREIGN KEY (`parent_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_3` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `milestones`
--
ALTER TABLE `milestones`
  ADD CONSTRAINT `milestones_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`payer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `user_id_skills` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `ticket_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_ibfk_3` FOREIGN KEY (`priority_id`) REFERENCES `ticket_priorities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket_replies`
--
ALTER TABLE `ticket_replies`
  ADD CONSTRAINT `ticket_replies_ibfk_1` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `userportfolio`
--
ALTER TABLE `userportfolio`
  ADD CONSTRAINT `user_id_portfolio` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `work_experience`
--
ALTER TABLE `work_experience`
  ADD CONSTRAINT `work_experience_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
