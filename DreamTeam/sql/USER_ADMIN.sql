
--
-- Table structure for table `users`
--
DROP DATABASE IF EXISTS useradmin;
CREATE DATABASE useradmin;
USE useradmin;

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;

INSERT INTO `users` VALUES (1,'Colver','Prydden','cprydden0','cprydden0@dedecms.com','585-686-1406','Male',49,'$2y$10$JHV0Y0yfYhTA2rTA//1CweCZWwfkGEHxK/TnT8VIJIwjDTlGkCCDi');
UNLOCK TABLES;

