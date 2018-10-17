INSERT INTO `user` (`id`, `username`, `password`, `registered`, `root`, `active`) VALUES
                     (1, 'test', '$2y$10$yX2aYVewjkhJywP8QIpyvOtFqr8xYIIAh4fIwZkP67DPVKk7WCt6.', '2018-04-23', 1, 1);

INSERT INTO `service` ( `price`, `name`, `type`, `description`, `active`, `icon`) VALUES
                          ( '499', 'Masáž hodinová', 'timeduse', '', 1 , '');

                        INSERT INTO `service` ( `price`, `name`, `type`, `description`, `active`, `icon`) VALUES
                          ( '399', 'Masáž pul hodina', 'timeduse', '', 1 , '');

                          INSERT INTO `service` ( `price`, `type`,  `name` , `description`, `active`, `icon`) VALUES
                          ( '899', 'Masáž čínská', 'timeduse', '', 1 , '');
                          INSERT INTO `service` ( `price`,  `type`, `name` ,`description`, `active`, `icon`) VALUES
                          ( '0', 'Snídaně', 'timeduse', '', 1 , '');
                          INSERT INTO `service` ( `price`,  `type`,`name` , `description`, `active`, `icon`) VALUES
                          ( '0', 'Anglická snídaně', 'timeduse', '', 1 , '');
                          INSERT INTO `service` ( `price`,  `type`,`name` , `description`, `active`, `icon`) VALUES
                          ( '0', 'Donáška na pokoj', 'singleuse', '', 1 , '');
                          INSERT INTO `service` ( `price`,  `type`,`name` ,`description`, `active`, `icon`) VALUES
                          ( '0', 'Probudit', 'singleuse', '', 1 , '');

                          INSERT INTO `subservice` ( `name`, `description`, `price`, `availablefrom`, `availableto`) VALUES
                          ( 'Kačka', 'Kačka', '', '', 2018-10-01 12:00.000 , 2018-10-01 22:00.000);

                          INSERT INTO `subservice` ( `name`, `description`, `price`, `availablefrom`, `availableto`) VALUES
                          ( 'Vajčka se slaninou', '', '', '', null , null);


