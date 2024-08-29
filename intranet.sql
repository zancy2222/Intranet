-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2023 at 12:04 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intranet`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `image`, `title`, `description`, `date`) VALUES
(2, '655c7c8c3da5e6.77534423.jpg', 'College Of Education Holds Its Third Pinning Ceremony', '                The College of Education marked its 3rd Pinning Ceremony with the theme \"Molding Teachers Through Resilient Education and Best Teaching-Learning Practice \'\' yesterday, September 27, at the Bulwagang Katipunan, City Hall.\r\n\r\nThe ceremony starts with the Master of Ceremonies honoring and recognizing the student\'s dedication, followed by acknowledging the presence of the Coordinators from different Departments; the Dean of the College of Education, Dr. Ramona A. Prado; and the Officer in Charge and Vice Chairman Marilyn T. De Jesus, DPA.\r\n\r\nProf. Jeffrey Dela Cruz, Science Department Coordinator, expressed his heartfelt message in his opening remarks, telling the students that this marks a significant milestone, and reminding them that this is not just a commitment to education but a commitment to humanity. On the other hand, the OIC and Vice Chairman Marilyn T. De Jesus, delivered her inspirational message where she reminded the students to have integrity, respond with care and love to students, and set a good example of being a Batang Kankaloo.\r\n\r\nMeanwhile, Dr. Ramona A. Prado congratulated the parents during her Purpose Statement of the Ceremony for their undying support to their children and reminded student-teachers again to teach with their hearts and souls. To finally mark their milestone, the Ceremonial Pinning Proper was led by Prof. Jennilyn Ombid while the student-teacher conducted the Pledge of Commitment led by Mr. Rex Hornillos of BSE Science, followed by Words of Gratitude from Mrs. Gloria Hornillos. Before the ceremony ended, Prof. Rosalie D. Esteban congratulated the students and their parents and reminded them that they are the future of our education, the future of the city, and the future of our nation. To finally end the ceremony, the student-teachers sang their community song, entitled \"No Boundaries\" by Kris Allen.\r\n                ', '2023-10-12'),
(3, '655c7cd4965737.17700844.jpg', 'Psychology Society Conducts Its Annual Psychology Week', '                                The Psychology Week, with the theme “That Shore Up Above: Mental Wellness in Deep Breaths and Calm Water” which was held every year to honor Mental Health Month, wrapped today, October 28, at the Congressional Extension Campus Covered Court.\r\nAfter three years of commemorating this annual event online due to the impending threat of COVID 19 pandemic, Psych Week is returning in 2023, putting the spotlight on the significance of mental well-being and highlighting the need to break down the stigma around disorders associated with mental illness. This annual event, which runs from October 23 to 28, gained immense momentum in less than a week and has become a platform for engaging booths, random activities, and art galleries that serve as an advocate to remind all UCCians that having fun is essential despite academic stress.\r\n\r\nPsych Week was an initiative conducted by Psychology Society with the support of Psychology Students in order to raise awareness about the value of mental health, encourage discussions, and promote access to services for individuals who needed support.\r\n\r\nAll psychology students gathered in the Covered Court at the end of this long-week event to wrap up and celebrate what they had accomplished by applauding themselves for their unwavering efforts.\r\nThe final event includes intermission numbers by Freshmen to Juniors, a BSAIS short film, and a Team Building carried out by Psychology 3-C.\r\n                                ', '2023-10-29'),
(4, '655c7d0fdd19e8.04836336.jpg', 'Tumindig At Umibig: Uccians Experience Amusement With Peta Once Again', '                                The University of Caloocan City students filled their heart with enjoyment, laughter, and kilig as they watched a theater masterpiece of Philippine Educational Theater Association (PETA), entitled \"Walang Aray\" 2023, yesterday, October 8. The story started with Julia (Marynor Madamesila), a charismatic and beautiful zarzuela star performing on stage that captures Don Tadeo\'s attention leading to an arranged marriage with his son, Miguel (Bene Manaois). While Julia and her secret boyfriend, Tenyong (Gio Gahol) find their own way to fight for their love, a lot of things and revelation happens. The play uses different slang and up-to-date terms that every audience can surely relate while also looking back to our history. \r\nThe cleverness, creativity, and outstanding musical makes it more interesting and must-watch.\r\n\"Walang Aray\" originally written by Rody Vera and directed by Ian Segarra is a humorous, satirical adaptation of Severino Reyes’ classic zarzuela Walang Sugat year 1898.\r\n                                ', '2023-10-09'),
(5, '655c7dd3aa5433.37337734.jpg', 'UCC - Alert Projects Another Deed Of Compassion Through Their 2nd Bloodletting Event', '                The University of Caloocan City’s Advanced Lifesavers and Emergency Response Team (UCC-ALERT) demonstrated another act of compassion as they accomplished their 2nd Annual Bloodletting Event titled as, “Blood Letting Activity: Type mo ba ako? Kasi type kita!,” today, October 17 at the UCC-Congressional Campus. \r\n\r\n48 bags of donated blood were accumulated from the 71 participants of the event. On the other hand, some of the attendees were pronounced not eligible to donate. \r\nThe organization was able to partner with the National Kidney Transplant Institute, to which they would be allocating the blood collected.  It was also sponsored by the UCC’s Psychology Society (UCC-Psych Soc) and UCC’s Supreme Student Council (UCC-SSC). \r\n\r\nThe preparation of the event was supervised by the Committee on Special Project of ALERT, the principal facilitator of the project.\r\n                ', '2023-10-18'),
(6, '655c7e1edb8832.42796412.jpg', 'Psychology Society - North Holds Its Annual Psych Week Fair 2023 ', '                                                                Psychology Society - North dives into Mental Health Awareness Month giving life to the theme, “Mental health is a universal human right”, today October 23, 2023 at UCC - Congressional Campus, as they celebrate Psych Week Fair 2023 entitled “That Shore Up Above: Mental Wellness in Deep Breaths and Calm Waters”.\r\n\r\nThe event started with a warm greetings from Psychology Society’s President, Rea Moran, followed by a powerful speech delivered by Guidance Counsellor and the Peer Counseling Club Adviser, Ms. Marjorie Tiu, giving importance to mental health awareness for today’s generation.“We should treat our mental health as same as our physical health,” she said.  The Psych Week Fair 2023 continued its celebration as different booths opened for all programs, in relation to Mental Health Awareness Month. \r\n                                                                ', '2023-10-23'),
(7, '655c7e97a0af35.40140283.jpg', 'Dthim Expo Features Diverse Cultures Of Various Countries In An Engrossing Event', '                The Department of Tourism and Hospitality Industry Management (DTHIM) featured diverse cultures through their expo with a theme of, \"A Celebration of Diversity Recognizing Beyond Borders: Tourism and Hospitality Exploration\" yesterday, October 24 at the University of Caloocan City - Congressional Campus.\r\n\r\nThe event was participated by students from both Bachelor of Science in Tourism Management (BSTM) and Bachelor of Science in Hospitality Management (BSHM). Different booths that displayed the vibrant cultures of a few Asian nations were exhibited by Hospitality Management students. Tourism Management students competed in the event by utilizing their travel service abilities in promoting tour packages about several countries. It also included other forms of competition that challenged the skills required in tourism and hospitality industries. The exhibition was primarily facilitated by the Event Management Class 2023 (EMC 2023) of Tourism and Hospitality Management. In addition to the program, the coronation night for the Mr. and Ms. DTHIM 2023 also took place immediately after the former.\r\n                ', '2023-10-25'),
(8, '655c83b44381a4.73491819.jpg', 'BSKE 2023: Barangay at Kabataan Kabilang Ka Dito', '                Today, October 30, we will exercise our fundamental right to elect our future leaders in the eagerly anticipated Barangay and Sangguniang Kabataan elections, an event that profoundly influences the trajectory of our local community\'s future.\r\nThe University of Caloocan City\'s Supreme Student Council earnestly urges our fellow Yusisistas to be deliberate in selecting our leaders, whose attributes emphasize the welfare of our communities and the aspirations of our youth. Remember that each vote cast represents a measured stride towards a progressive nation.\r\n                ', '2023-10-30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `department`) VALUES
(12, 'Tards', 'tards@yahoo.com', '$2y$10$LMYsBhDoG8YOsNaJbKtzXeXBQstyrB2Zsz./yziLvdstzCAsAsIi.', 'ABC'),
(13, 'Keanel Soriano', 'keanelsoriano@gmail.com', '$2y$10$VKFjaljjQPQgqgqSpaQETugN3f.qjMmW/ETivGcqcM1sr41sQJ9/q', 'IT');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
