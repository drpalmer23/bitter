-- Table structure for table `rant`
--

CREATE TABLE IF NOT EXISTS `rant` (
  `rant_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `parent_rant_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  PRIMARY KEY (`rant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(15) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(30) NOT NULL,
  `zip` int(5) DEFAULT NULL,
  `last_update` datetime NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bio` varchar(255) DEFAULT NULL,
  `dob` date NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;