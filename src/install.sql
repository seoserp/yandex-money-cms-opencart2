CREATE TABLE IF NOT EXISTS `oc_mws_return` (
`id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` text NOT NULL,
  `sum` varchar(10) NOT NULL,
  `status` int(11) NOT NULL,
  `techMessage` text NOT NULL,
  `error` int(11) NOT NULL,
  `cause` text NOT NULL,
  `clientOrderId` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `response` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;