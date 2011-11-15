--
-- Table structure for table `controllers`
--

CREATE TABLE IF NOT EXISTS `controllers` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `controller` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `controller` (`controller`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `controllers`
--

INSERT INTO `controllers` (`ID`, `controller`, `active`) VALUES
(1, 'authenticate', 1);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `dino_name` varchar(255) NOT NULL,
  `dino_dob` varchar(255) NOT NULL,
  `dino_breed` varchar(255) NOT NULL,
  `dino_gender` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`user_id`, `dino_name`, `dino_dob`, `dino_breed`, `dino_gender`) VALUES
(1, 'Mr Glen', '01/01/1990', 'T-Rex', '0');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` longtext NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`ID`, `key`, `value`) VALUES
(1, 'view', 'default'),
(2, 'sitename', 'DINO SPACE!'),
(3, 'siteurl', 'http://localhost/mkpbook5/trunk/chapter3/'),
(4, 'captcha.enabled', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `password_salt` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `reset_key` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `reset_expires` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `password_hash`, `password_salt`, `email`, `active`, `admin`, `banned`, `reset_key`, `reset_expires`, `deleted`) VALUES
(1, 'michael', '5f4dcc3b5aa765d61d8327deb882cf99', '', 'mkpeacock@gmail.com', 1, 0, 0, '', '0000-00-00 00:00:00', 0);
