--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `errno` int(2) NOT NULL,
  `errtype` varchar(32) CHARACTER SET utf8 NOT NULL,
  `errstr` text CHARACTER SET utf8 NOT NULL,
  `errfile` varchar(255) CHARACTER SET utf8 NOT NULL,
  `errline` int(4) NOT NULL,
  `user_agent` varchar(255) CHARACTER SET utf8 NOT NULL,
  `ip_address` varchar(64) CHARACTER SET utf8 NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
