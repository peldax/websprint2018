CREATE TABLE IF NOT EXISTS `log_error`(
  `id`          INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `ip_address`  VARBINARY(16)               NOT NULL,
  `url`         VARCHAR(255)                NOT NULL,
  `return_code` VARCHAR(10)                 NOT NULL,
  `datetime`    DATETIME                    NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS `log_cron`(
    `id`          INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `name`        VARCHAR(100)                NOT NULL,
    `value`       VARCHAR(100)                         DEFAULT NULL,
    `datetime`    DATETIME                    NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS `subscription` (
  `id`          INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `user_id`     INT(10) unsigned        DEFAULT NULL,
  `endpoint`    VARCHAR(511)                NOT NULL,
  `key`         VARCHAR(255)                NOT NULL,
  `token`       VARCHAR(255)                NOT NULL,
  `encoding`    VARCHAR(255)                NOT NULL,
  `active`      TINYINT DEFAULT 1           NOT NULL,
  
  CONSTRAINT `subscription_endpoint_uindex` UNIQUE (`endpoint`),
  INDEX `subscription_active_index` (`active`)
) ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS `log_login`
(
  `id`         INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `ip_address` VARBINARY(16)               NOT NULL,
  `username`   VARCHAR(255)                NOT NULL,
  `result`     ENUM('success', 'failure')  NOT NULL,
  `datetime`   DATETIME                    NOT NULL DEFAULT CURRENT_TIMESTAMP,
  
  INDEX `log_login_ip_address_index` (`ip_address`)
) ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS `role`
(
  `id`        INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `name`      VARCHAR(255)                NOT NULL,
  `description` TEXT,
  `active`    TINYINT DEFAULT 1           NOT NULL
) ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS `role_access`
(
  `id`        INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `role_id`   INT(10) UNSIGNED            NOT NULL,
  `resource`  VARCHAR(255)                NOT NULL,
  `privilege` VARCHAR(255)                DEFAULT NULL,

  CONSTRAINT `role_access_role_id_fk`
  FOREIGN KEY (`role_id`) REFERENCES `role` (`id`)
) ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS `user`
(
  `id`         INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `role_id`    INT(10) UNSIGNED            DEFAULT NULL,
  `username`   VARCHAR(255)                NOT NULL,
  `password`   VARCHAR(255)                NOT NULL,
  `registered` DATE                        NOT NULL,
  `root`       TINYINT DEFAULT 0           NOT NULL,
  `active`     TINYINT DEFAULT 1           NOT NULL,

  CONSTRAINT `user_role_id_fk`
  FOREIGN KEY (`role_id`) REFERENCES `role` (`id`),
  INDEX `user_active_username_index` (`active`, `username`)
) ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS `subscription_type` (
  `id`         INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `name`       VARCHAR(255)                NOT NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `user_subscription_type`
(
  `id`                   INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `user_id`              INT(10) UNSIGNED            NOT NULL,
  `subscription_type_id` INT(10) UNSIGNED            NOT NULL,

  CONSTRAINT `user_subscription_type_user_id_fk`
  FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `user_subscription_type_subscription_type_id_fk`
  FOREIGN KEY (`subscription_type_id`) REFERENCES `subscription_type` (`id`)
) ENGINE = INNODB;

ALTER TABLE `subscription`
  ADD CONSTRAINT `subscription_user_id_fk` 
  FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
  
INSERT INTO `user` (`id`, `username`, `password`, `registered`, `root`, `active`) VALUES
(1, 'test', '$2y$10$yX2aYVewjkhJywP8QIpyvOtFqr8xYIIAh4fIwZkP67DPVKk7WCt6.', '2018-04-23', 1, 1);

CREATE TABLE IF NOT EXISTS `service` (
  `id`          INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `price`       INT(11)                NOT NULL,
  `type`        ENUM('singleuse','timeduse','uniquetimeduse')                NOT NULL,
  `description`       VARCHAR(255)                NOT NULL,
  `icon`    VARCHAR(255)                NOT NULL
  
) ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS `room` (
  `id`          INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `number`     int(10)         NOT NULL,
  `password`       VARCHAR(255)                NOT NULL,
  `from`     DATETIME               NOT NULL,
  `to`       DATETIME               NOT NULL
  
) ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS `subservice` (
  `id`          INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `name`     VARCHAR(255)         NOT NULL,
  `price`       INT(11)                NOT NULL,
  `availablefrom`     DATETIME               NOT NULL,
  `availableto`       DATETIME               NOT NULL
  
) ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS `event`
(
  `id`         INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `datetime`   DATETIME DEFAULT CURRENT_TIMESTAMP,
  `room_id`    INT(10) UNSIGNED            NOT NULL,
  `service_id`    INT(10) UNSIGNED            NOT NULL,
  `subservice_id`    INT(10) UNSIGNED            NOT NULL,
  `calday`   DATE               DEFAULT NULL,
  `start`   TIME                DEFAULT NULL,
  `end`   TIME                DEFAULT NULL,
  `registered` DATE                        NOT NULL,
  `root`       TINYINT DEFAULT 0           NOT NULL,
  `active`     TINYINT DEFAULT 1           NOT NULL,

  CONSTRAINT `event_role_id_fk`
  FOREIGN KEY (`room_id`) REFERENCES `room` (`id`),
  CONSTRAINT `event_service_id_fk`
  FOREIGN KEY (`service_id`) REFERENCES `service` (`id`),
  CONSTRAINT `event_subservice_id_fk`
  FOREIGN KEY (`subservice_id`) REFERENCES `subservice` (`id`)
) ENGINE = INNODB;