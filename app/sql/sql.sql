CREATE TABLE IF NOT EXISTS `users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(128) NOT NULL,
  `email` VARCHAR(128) NOT NULL,
  `pwd` VARCHAR(128) NOT NULL,
  `status` TINYINT(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `user_data` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `image` VARCHAR(128) NULL,
  `address` VARCHAR(256) NULL,
  `zip` INT(8) NULL,
  `user_id` INT NOT NULL,
  `ether_wallet` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `user_id_UNIQUE` (`user_id` ASC),
  CONSTRAINT `fk_user_data_1`
    FOREIGN KEY (`user_id`)
    REFERENCES `users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `ether_payment` (
  `payment_id` INT NOT NULL,
  `payment_amount` DOUBLE NOT NULL,
  `payment_token` VARCHAR(64) NOT NULL,
  `user_id` INT(11) NOT NULL,
  `wallet_addr` VARCHAR(64) NOT NULL,
  PRIMARY KEY (`payment_id`),
  UNIQUE INDEX `payment_token_UNIQUE` (`payment_token` ASC),
  INDEX `fk_uwallet_epaymnt_idx` (`wallet_addr` ASC),
  INDEX `fk_uid_epaymnt_idx` (`user_id` ASC),
  CONSTRAINT `fk_uid_epaymnt`
    FOREIGN KEY (`user_id`)
    REFERENCES `users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE TABLE `login_sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `token` varchar(135) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `token_UNIQUE` (`token`),
  KEY `fk_login_sections_1_idx` (`user_id`),
  CONSTRAINT `fk_login_sections_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

delimiter $$
create procedure create_user(in userName varchar(100), in userEmail varchar(100), in pwd varchar(100))
	begin
		declare lid int default 0;

		insert into users (name, email, pwd, status)
        values (userName, userEmail, pwd, 1);

        set lid = (
			select id from users order by id desc limit 1
        );

        insert into user_data (user_id) values (lid);

    end$$