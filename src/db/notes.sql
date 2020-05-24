

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notes`
--

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `file_id` int(11) NOT NULL,
  `file_name` varchar(225) NOT NULL,
  `file_description` text NOT NULL,
  `file_type` varchar(225) NOT NULL,
  `file_uploader` varchar(225) NOT NULL,
  `file_uploaded_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `file_uploaded_to` varchar(225) NOT NULL,
  `file` varchar(225) NOT NULL,
  `status` varchar(225) NOT NULL DEFAULT 'not approved yet'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `uploads` (`file_id`, `file_name`, `file_description`, `file_type`, `file_uploader`, `file_uploaded_on`, `file_uploaded_to`, `file`, `status`) VALUES
(61, 'DEVOPS Project Report', 'Handwriting recognition', 'pdf', 'srikar', '2020-05-23 09:49:51', 'Electrical', '866298.pdf', 'approved'),
(62, 'SPE', 'goods availability management', 'pdf', 'harsha', ' 2020-05-23 11:03:47', 'Electrical', '981571.pdf', 'approved'),
(60, 'E Commerce Website', 'e commerce website in devops', 'pdf', 'manideep', ' 2020-05-23 09:34:23', 'Computer Science', '804917.pdf', 'approved'),
(63, 'SPE Project Report', 'auto attendance management', 'pdf', 'harsha', '2020-05-23 11:05:10', 'Electrical', '38391.pdf', 'approved');


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `about` varchar(300) NOT NULL DEFAULT 'N/A',
  `role` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `token` varchar(225) NOT NULL,
  `gender` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `course` varchar(225) NOT NULL,
  `image` varchar(225) NOT NULL DEFAULT 'profile.jpg',
  `joindate` varchar(225) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `about`, `role`, `email`, `token`, `gender`, `password`, `course`, `image`, `joindate`) VALUES
(1, 'admin', 'admin', 'N/A', 'admin', 'root@gmail.com', '', 'N/A', '$2y$10$UExd.f8vQXogrZELXF8KGulQJKUn32p8x4B5SVQ7V/D6.mrSAkAjW', 'Computer Science', 'profile.jpg', '2000-01-01'),
(29, 'sumanth', 'sumanth', 'N/A', 'student', 'sumanth@gmail.com', '', 'Male', '$2y$10$xEEu0hAtrJWCh3klz4DBF.5a4EMFsWaIAsFT7Jt2RBVgMVrRxz3Li', 'Computer Science', 'profile.jpg', 'May 23, 2020'),
(31, 'manideep', 'manideep', 'N/A', 'student', 'manideep@gmail.com', '', 'Male', '$2y$10$JYLVNL/IHWLJBFk8Chkfg.umjWu1Zbymy6piqja2lvZv3wxktmqRy', 'Computer Science', 'profile.jpg', 'May 23, 2020'),
(32, 'harsha', 'harsha', 'N/A', 'student', 'harsha@gmail.com', '', 'Male', '$2y$10$4JK2uRNN8FHrY/Zs96AmvurQpMP8p409ShvQ9zGAYOTAeAd7ppozS', 'Electrical', '771547.jpg', 'May 23, 2020'),
(34, 'srikar', 'srikar', 'N/A', 'student', 'srikar@gmail.com', '', 'Male', '$2y$10$nld.q3PLHGktG3/Q.xCpheGRZ5omPXJpWlgHgU5CANJPSajp8i//a', 'Electrical', '421040.jpg', 'May 23, 2020');
--
-- Indexes for dumped tables
--

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
