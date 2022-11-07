-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2022 at 10:04 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `a_id` int(11) NOT NULL,
  `a_user` varchar(20) NOT NULL,
  `a_pass` varchar(20) NOT NULL,
  `a_name` varchar(100) NOT NULL,
  `datesave` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`a_id`, `a_user`, `a_pass`, `a_name`, `datesave`) VALUES
(2, '222', '222', 'k', '2018-11-16 05:34:50'),
(3, '333', '333', 'admin3', '2018-11-16 05:35:30'),
(4, '444', '789', 'pop', '2018-11-16 05:35:30'),
(5, 'min', 'mint', 'jir', '2022-09-24 20:08:12'),
(6, 'mint07', 'mint007', 'jiraphat', '2022-11-02 09:00:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buy`
--

CREATE TABLE `tbl_buy` (
  `b_id` int(11) NOT NULL,
  `type_id` int(11) DEFAULT NULL,
  `b_QTY` varbinary(255) DEFAULT NULL,
  `b_price` decimal(10,2) DEFAULT NULL,
  `b_time` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `b_status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_delivre`
--

CREATE TABLE `tbl_delivre` (
  `D_ID` int(11) NOT NULL,
  `S_ID` int(11) DEFAULT NULL,
  `D_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `D_location` varchar(255) DEFAULT NULL,
  `D_price` decimal(10,2) DEFAULT NULL,
  `D_note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expenses`
--

CREATE TABLE `tbl_expenses` (
  `e_id` int(11) NOT NULL,
  `e_list` varchar(255) CHARACTER SET utf8 NOT NULL,
  `e_time` datetime NOT NULL,
  `e_pay` varchar(255) CHARACTER SET utf8 NOT NULL,
  `e_note` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_expenses`
--

INSERT INTO `tbl_expenses` (`e_id`, `e_list`, `e_time`, `e_pay`, `e_note`) VALUES
(3, 'ค่าไฟ', '2022-09-28 10:30:00', '500', 'พนักงานไปจ่าย'),
(5, 'ค่าน้ำ', '2022-09-28 17:45:00', '300', 'เจ้าของร้านจ่าย'),
(6, 'ค่าไฟ', '2022-09-28 17:45:00', '1000', 'เจ้าของร้านไปจ่าย');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `member_id` int(11) NOT NULL,
  `m_user` varchar(20) NOT NULL,
  `m_pass` varchar(20) NOT NULL,
  `m_name` varchar(100) NOT NULL,
  `m_email` varchar(100) NOT NULL,
  `m_tel` varchar(20) NOT NULL,
  `m_address` varchar(200) NOT NULL,
  `date_save` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`member_id`, `m_user`, `m_pass`, `m_name`, `m_email`, `m_tel`, `m_address`, `date_save`) VALUES
(1, '111', '111', 'devtai', 'name@hotmail.com', '087657831', '181 หมู่ 10 ต.โนนสุง อ.บ้านผือ จ.อุดรธานี 41160', '2018-06-16 01:49:48'),
(2, '222', '222', 'sssss', 'wootlove@gmail.com', '0931294710', '28/38-39 ถนนยิงเป้า ต.สนามจันทร์ \r\nอ.เมือง จ.นครปฐม 73000', '2018-06-16 01:52:55'),
(3, '123', '213', 'waina', 'aaaa@gmail.com', '025837588', '46/148-9 ม.3 ถ.ศรีสมาน ต.บ้านใหม่ \r\nอ.ปากเกร็ด จ.นนทบุรี 11120', '2018-06-16 02:02:30'),
(4, '666', '666', 'eeee', 'eeee@amial.com', '0388241313', '72/33-34 ถ.ศุขประยูร ต.หน้าเมือง \r\nอ.เมือง จ.ฉะเชิงเทรา 24000', '2018-06-16 02:11:21'),
(5, '456', '654', 'waiya', 'waiy@gmail.com', '032419717', '252/1-2 ม.6 ถ.เพชรเกษม ต.บ้านหม้อ \r\nอ.เมือง จ.เพชรบุรี 76000', '2018-06-16 02:12:45'),
(6, '88', '8888', 'mmmm', 'mmmm@m.com', '038467809', '104/32 หมู่ 2 ถนนพระยาสัจจา ต.เสม็ด \r\nอ.เมือง จ.ชลบุรี 20000', '2018-06-16 02:18:42'),
(7, '999', '999', 'tbanbi', 'eoom@n.com', '038860799', '109/10-11 ถ.จันทอุดม ต.เชิงเนิน \r\nอ.เมือง จ.ระยอง 21000	', '2018-06-16 02:20:34'),
(8, '765', '765', 'moota', 'aaaa@gmail.com', '053302450', '459/98 ถ.เจริญเมือง ต.วัดเกตุ \r\nอ.เมือง จ.เชียงใหม่ 50000', '2018-06-16 02:23:37'),
(9, '777', '777', 'foodra', 'wsss@gmail.com', '053733708', '111/12-13 ม.13 ต.สันทราย \r\nอ.เมือง จ.เชียงราย 57000', '2018-06-16 02:26:55'),
(10, '144', '311', 'wiratai', 'boom@m.com', '043324754', '269/64-65 ม.4 ถ.มิตรภาพ \r\nอ.เมือง จ.ขอนแก่น 40000', '2018-06-16 02:29:48'),
(11, '333', '899', 'sadart', 'roomne@n.com', '044262223', '1982/4-5 ถ.มิตรภาพ ต.ในเมือง \r\nอ.เมือง จ.นครราชสีมา 30000', '2018-06-16 02:31:19'),
(16, 'admin', 'admin', 'จิราพัชร', '62040427120@udru.ac.th', '0934865752', 'fghk', '2022-09-27 12:32:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `o_id` int(11) NOT NULL,
  `p_id` int(11) DEFAULT NULL,
  `o_price` decimal(10,2) DEFAULT NULL,
  `o_time` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `o_usere` varchar(255) DEFAULT NULL,
  `c_id` int(11) DEFAULT NULL,
  `o_addres` varchar(255) DEFAULT NULL,
  `o_staus` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(11) NOT NULL,
  `payment_name` varchar(255) DEFAULT NULL,
  `payment_email` varchar(255) DEFAULT NULL,
  `payment_phone` varchar(10) DEFAULT NULL,
  `payment_subtotal` varchar(255) DEFAULT NULL,
  `payment_time` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `payment_noet` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(200) NOT NULL,
  `type_id` int(11) NOT NULL,
  `p_detail` text NOT NULL,
  `p_img` varchar(200) NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_qty` varchar(11) NOT NULL,
  `p_unit` varchar(20) NOT NULL,
  `datesave` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`p_id`, `p_name`, `type_id`, `p_detail`, `p_img`, `p_price`, `p_qty`, `p_unit`, `datesave`) VALUES
(4, 'แจกันดอกไม้กุหลาบสีฟ้า', 10, 'เป็นแจกันดอกไม้เน้นโทนสีน้ำเงินและสีฟ้า จัดเป็นแจกันทรงสูงบนแจกันเซรามิกสีขาว และประดับด้วยใบไม้ต่างๆให้ดูสวยงามอ่อนช้อย', '127914671120221102_144630.jpg', 700, '10', 'อัน', '2022-11-02 07:45:31'),
(5, 'แจกันดอกไม้กุหลาบชมพูอมขาว', 10, 'แจกันโทนสีชมพู จัดในรูปแบบทรงสูง โดยดอกไม้เน้นกุหลาบสีชมพู แซมด้วยดอกไม้สีขาวเล็กน้อย และเติมด้วยใบไม้ต่างๆ ', '8048314320221102_145248.jpg', 700, '15', 'อัน', '2022-11-02 07:52:16'),
(6, 'แจกันดอกไม้กุหลาบสีแดง-ลิลลี่ ', 10, 'เป็นแจกันดอกไม้โทนแดง-ชมพู ดอกไม้ประกอบด้วย ดอกกุหลาบ, ดอกคาร์เนชั่น และลิลลี่ ใช้เนื่องในหลากหลายโอกาส เช่น แจกันดอกไม้แสดงความยินดี , แจกันดอกไม้วันเกิด', '143661033520221102_145913.jpg', 700, '5', 'อัน', '2022-11-02 07:58:17'),
(7, 'ช่อดอกไม้ดอกกุหลาบสีโอรส', 11, 'ทำเป็นช่อกลมจัดตามแบบ แซมด้วยใบไม้อีกเล็กน้อย ห่อกระดาษโทนสีขาวให้กุหลาบแดงนั้นเด่นขึ้น กุหลาบแดงไม่มีของขวัญอะไรที่ดีไปกว่าช่อดอกไม้กุหลาบสีโอรส', '166614430720221102_150733.jpg', 500, '2', 'ช่อ', '2022-11-02 08:02:01'),
(8, 'ช่อดอกไม้กุหลาบแดง', 11, 'ทำเป็นช่อกลมจัดตามแบบ แซมด้วยใบไม้อีกเล็กน้อย ห่อกระดาษโทนสีขาวให้กุหลาบแดงนั้นเด่นขึ้น กุหลาบแดงไม่มีของขวัญอะไรที่ดีไปกว่าช่อดอกไม้กุหลาบแดง', '100880751620221102_150846.jpg', 500, '3', 'ช่อ', '2022-11-02 08:02:52'),
(9, 'ช่อดอกไม้กุหลาบชมพู', 11, 'ช่อดอกไม้กุหลาบสีชมพูหวาน จัดเป็นช่อยาว ประกอบด้วยดอกกุหลาบสีชมพูสีหวาน และเติมความสดใสจากสีเขียวจากดอกไลเซนทรัส และใบไม้ต่าง แซมด้วยดอกยิปโซ', '170189933020221102_150918.jpg', 500, '2', 'ช่อ', '2022-11-02 08:04:14'),
(10, 'ช่อดอกไม้ดอกไม้สีชมพู-แดง', 11, 'ช่อดอกไม้ช่อยาว ประกอบด้วยดอกกุหลาบสีส้มโอลด์โรส แซมด้วยดอกไลเซนทัส และดอกคาร์เนชั่นเสปร์สีชมพู สีส้มแสดงความสดใส ตัดด้วยสีชมพูอ่อนหวาน กระดาษห่อด้วยกระดาษป่านสีธรรมชาติดูคลาสสิก', '193969248720221102_151033.jpg', 500, '4', 'ช่อ', '2022-11-02 08:06:23'),
(11, 'ช่อดอกไม้ดอกกุหลาบสีแดง-ลิลลี่', 12, 'ประกอบด้วย ดอกลิลลี่สีขาวและสีชมพู เป็นดอกไม้หลัก และเพิ่มดอกกุหลาบแดงให้ดูหวานยิ่งขึ้น เติมไลเซนทรัสให้ดูอ่อนโยน แซมด้วยใบยูคาริปตัส', '33102171020221102_152032.jpg', 500, '2', 'ช่อ', '2022-11-02 08:20:14'),
(12, 'ช่อดอกไม้ดอกกุหลาบสีแดง', 13, 'ช่อดอกไม้ดอกกุหลาบสีแดง ประกอบด้วดอกกุหลาบแดงกับดอกไม้ขนาดเล็กชนิดต่าง', '59249707320221102_152239.jpg', 500, '2', 'ช่อ', '2022-11-02 08:22:21'),
(13, 'ช่อดอกไม้ดอกกุหลาบสีขาว', 14, 'ช่อดอกไม้ดอกกุหลาบสีขาว ขนาดกลาง', '212345230420221102_152413.jpg', 600, '2', 'ช่อ', '2022-11-02 08:23:50'),
(14, 'ดอกกุหลาบแดง', 15, 'กุหลาบแดง ', '27337900420221102_152719.jpg', 1, '10', 'ดอก', '2022-11-02 08:26:55'),
(15, 'กุหลาบชมพู', 15, 'กุหลาบชมพู', '148340200920221102_153138.jpg', 15, '45', 'ดอก', '2022-11-02 08:30:04'),
(16, 'ดอกมัม', 16, 'ดอกมัมสีขาว', '15978659120221102_153711.webp', 120, '10', 'กำ', '2022-11-02 08:36:54'),
(17, 'ดอกสร้อยทอง', 16, 'ดอกสร้อยทอง                                                                                                   ', '181282595220221102_153940.webp', 125, '50', 'กำ', '2022-11-02 08:39:24'),
(18, 'โบว์ผูกดอกไม้', 17, 'โบว์ผูกดอกไม้', '55359716720221102_154101.jpg', 35, '25', 'อัน', '2022-11-02 08:40:41'),
(19, 'กระดาษห่อช่อ', 17, 'กระดาษห่อช่อ                              ', '141269002820221102_154206.jpg', 10, '100', 'แผ่น', '2022-11-02 08:41:50'),
(20, 'พวงหรีดดอกไม้สด แบบวงกลม', 18, 'พวงหรีดดอกไม้สด แบบวงกลม สีขาว                                                                 ', '51184673020221102_154349.jpg', 1000, '6', 'อัน', '2022-11-02 08:43:27'),
(21, 'พวงหรีดแบบสองจุดบนล่าง  ขนาดเล็ก', 18, 'พวงหรีดแบบสองจุดบนล่าง  ขนาดเล็ก                                                         ', '54671846620221102_154507.jpg', 500, '4', 'อัน', '2022-11-02 08:44:47'),
(22, 'ดอกไม้หลังหีบตั้งเล็ก', 19, 'ดอกไม้หลังหีบตั้งเล็ก สีขาว', '130422556320221102_154751.jpg', 500, '5', 'จุด', '2022-11-02 08:47:32'),
(23, 'ดอกไม้หลังหีบชุดใหญ่             ', 19, 'ดอกไม้หลังหีบชุดใหญ่ สีขาว', '345913120221102_155232.jpg', 3500, '1', 'ชุด', '2022-11-02 08:52:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sell`
--

CREATE TABLE `tbl_sell` (
  `s_id` int(11) NOT NULL,
  `p_id` int(11) DEFAULT NULL,
  `s_qty` int(11) DEFAULT NULL,
  `s_time` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `s_price` decimal(10,2) DEFAULT NULL,
  `s_unitprice` varchar(255) DEFAULT NULL,
  `s_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staple`
--

CREATE TABLE `tbl_staple` (
  `st_id` int(11) NOT NULL,
  `st_list` varchar(255) DEFAULT NULL,
  `st_price` decimal(10,2) DEFAULT NULL,
  `st_qty` int(11) DEFAULT NULL,
  `sr_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type`
--

CREATE TABLE `tbl_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_type`
--

INSERT INTO `tbl_type` (`type_id`, `type_name`) VALUES
(10, 'แจกัน'),
(11, 'ช่อยาวดอกไม้แห้ง'),
(12, 'ช่อกลมดอกไม้แห้ง'),
(13, 'ช่อยาวดอกไม้สด'),
(14, 'ช่อกลมดอกไม้สด'),
(15, 'ดอกไม้ดอกเดียว'),
(16, 'ดอกไม้กำ'),
(17, 'อุปกรณ์'),
(18, 'พวงหรีดดอกไม้สด'),
(19, 'ดอกไม้หลังหีบ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_withdraw`
--

CREATE TABLE `tbl_withdraw` (
  `wd _id` int(11) NOT NULL,
  `p_id` int(11) DEFAULT NULL,
  `wd_quantity` varchar(255) DEFAULT NULL,
  `wd _time` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `wd _note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_workings`
--

CREATE TABLE `tbl_workings` (
  `w_id` int(11) NOT NULL,
  `w_name` varchar(255) DEFAULT NULL,
  `w_time` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `w_photo` tinyblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `tbl_buy`
--
ALTER TABLE `tbl_buy`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `tbl_delivre`
--
ALTER TABLE `tbl_delivre`
  ADD PRIMARY KEY (`D_ID`);

--
-- Indexes for table `tbl_expenses`
--
ALTER TABLE `tbl_expenses`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tbl_sell`
--
ALTER TABLE `tbl_sell`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `tbl_staple`
--
ALTER TABLE `tbl_staple`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `tbl_type`
--
ALTER TABLE `tbl_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `tbl_withdraw`
--
ALTER TABLE `tbl_withdraw`
  ADD PRIMARY KEY (`wd _id`);

--
-- Indexes for table `tbl_workings`
--
ALTER TABLE `tbl_workings`
  ADD PRIMARY KEY (`w_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_expenses`
--
ALTER TABLE `tbl_expenses`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_type`
--
ALTER TABLE `tbl_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
