INSERT INTO `user` (`id`, `username`, `password`, `registered`, `root`, `active`) VALUES
                     (1, 'test', '$2y$10$yX2aYVewjkhJywP8QIpyvOtFqr8xYIIAh4fIwZkP67DPVKk7WCt6.', '2018-04-23', 1, 1);

INSERT INTO `service` (`id`, `price`, `name`, `type`, `description`, `active`, `icon`) VALUES
                          (1, '499', 'Masáž hodinová', 'timeduse', '', 1 , '');

                        INSERT INTO `service` (`id`, `price`, `name`, `type`, `description`, `active`, `icon`) VALUES
                          (2, '399', 'Masáž pul hodina', 'timeduse', '', 1 , '');

                          INSERT INTO `service` (`id`, `price`, `name`, `type`, `description`, `active`, `icon`) VALUES
                          (3, '899', 'Masáž čínská', 'timeduse', '', 1 , '');
                          INSERT INTO `service` (`id`, `price`, `name`, `type`, `description`, `active`, `icon`) VALUES
                          (4, '0', 'Snídaně', 'timeduse', '', 1 , '');
                          INSERT INTO `service` (`id`, `price`, `name`, `type`, `description`, `active`, `icon`) VALUES
                          (5, '0', 'Anglická snídaně', 'timeduse', '', 1 , '');
                          INSERT INTO `service` (`id`, `price`, `name`, `type`, `description`, `active`, `icon`) VALUES
                          (6, '0', 'Donáška na pokoj', 'singleuse', '', 1 , '');
                          INSERT INTO `service` (`id`, `price`, `name`, `type`, `description`, `active`, `icon`) VALUES
                          (7, '0', 'Probudit', 'singleuse', '', 1 , '');

                          INSERT INTO `subservice` (`id`, `name`, `description`, `price`, `availablefrom`, `availableto`) VALUES
                          (8, 'Kačka', 'Kačka', '', '', 2018-10-01-12:00:000 , 2018-10-01-22:00:000);

                          INSERT INTO `subservice` (`id`, `name`, `description`, `price`, `availablefrom`, `availableto`) VALUES
                          (8, 'Vajčka se slaninou', '', '', '', null , null);


