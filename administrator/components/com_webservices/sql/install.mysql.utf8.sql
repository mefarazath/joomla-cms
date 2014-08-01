CREATE TABLE `#__webservices`(
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `name` varchar(30) NOT NULL,
    `publicKey` varchar(100),
    `privateKey` varchar(100),
    `otherKeys` varchar(1000),
    
    PRIMARY KEY(`id`),
    UNIQUE(`name`)
)ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;