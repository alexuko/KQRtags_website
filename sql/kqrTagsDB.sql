--
-- Database: `id4845629_kqrtags`
--
CREATE DATABASE IF NOT EXISTS `id4845629_kqrtags` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id4845629_kqrtags`;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `lid` int(11) NOT NULL,
  `ltime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `laction` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `kid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Table structure for table `qrkeys`
--

CREATE TABLE `qrkeys` (
  `kid` int(11) NOT NULL,
  `kname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `klocation` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `kdescription` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kstatus` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `uusername` varchar(32) NOT NULL,
  `upassword` varchar(32) NOT NULL,
  `utype` varchar(10) NOT NULL,
  `ustatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `uusername`, `upassword`, `utype`, `ustatus`) VALUES
(1, 'camilas', '4', 'user', 'active'),
(2, 'camilaf', '3', 'user', 'inactive'),
(3, 'alberto', '2', 'admin', 'active'),
(4, 'alejandro', '1', 'admin', 'active');

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`lid`),
  ADD KEY `uid` (`uid`),
  ADD KEY `kid` (`kid`);

--
-- Indexes for table `qrkeys`
--
ALTER TABLE `qrkeys`
  ADD PRIMARY KEY (`kid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `uusername` (`uusername`);

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qrkeys`
--
ALTER TABLE `qrkeys`
  MODIFY `kid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`),
  ADD CONSTRAINT `logs_ibfk_2` FOREIGN KEY (`kid`) REFERENCES `qrkeys` (`kid`);

ALTER TABLE `qrkeys` 
CHANGE COLUMN `kstatus` `kstatus` VARCHAR(10) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL DEFAULT 'active' ;


