  `pop_start` datetime DEFAULT '0000-00-00 00:00:00' COMMENT '노출 시작일',
  `pop_end` datetime DEFAULT '0000-00-00 00:00:00' COMMENT '노출 종료일',
  `pop_order` int(11) unsigned DEFAULT '0' COMMENT '정렬 순서',
  KEY `IDX_POP_ORDER` (`pop_order`),
INSERT INTO `geumsa_popup` (`pop_id`, `pop_type`, `pop_title`, `pop_contents`, `usr_id`, `pop_img`, `pop_top`, `pop_left`, `pop_start`, `pop_end`, `pop_order`, `is_view`, `is_delete`, `created`, `updated`) VALUES
        (1, 'layer', 'test', '<p>레이어 테스트</p>\r\n', 'admin', 'img_20161212202046XceJa1lKTu.JPEG', 0, 0, '2016-12-01 00:00:00', '2016-12-31 23:59:59', 1, 'N', 'N', '2016-12-13 06:24:42', '2016-12-22 19:54:08'),
        (2, 'noti', 'test', '<p>레이어 테스트</p>\r\n', 'admin', 'no-image', 0, 0, '2016-12-20 00:00:00', '2016-12-30 23:59:59', 2, 'N', 'N', '2016-12-21 07:51:48', '2016-12-22 15:14:22'),
        (3, 'noti', 'NOTI TEST!', '<p>NOTI TEST!</p>\r\n', 'admin', 'no-image', 0, 0, '2016-12-22 00:00:00', '2016-12-31 23:59:59', 3, 'N', 'N', '2016-12-22 06:14:44', '0000-00-00 00:00:00');
