-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2022 at 08:51 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `instrumentstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(25) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `username`, `password`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `bid` int(3) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`bid`, `name`) VALUES
(10, 'Gibson'),
(15, 'Fender'),
(20, 'Epiphone'),
(25, 'Yamaha'),
(30, 'Gretsch'),
(35, 'Pearl'),
(50, 'Korg'),
(55, 'Roland'),
(80, 'Stentor'),
(100, 'Jupiter'),
(120, 'Hohner'),
(127, 'Kawai'),
(128, 'Azumi');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cid` int(11) NOT NULL,
  `sid` varchar(255) NOT NULL,
  `pid` int(8) NOT NULL,
  `price` float NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `mid` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`mid`, `first_name`, `last_name`, `email`, `message`) VALUES
(3, 'Mihail', 'Atanasovski', 'mihail.atanasovski@hotmail.com', 'Hello'),
(5, 'Mihail', 'Atanasovski', 'ma28434@seeu.edu.mk', 'Hello '),
(6, 'test1', 'test1', 'test1@a', 'test1');

-- --------------------------------------------------------

--
-- Table structure for table `family`
--

CREATE TABLE `family` (
  `fid` int(1) NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `family`
--

INSERT INTO `family` (`fid`, `name`) VALUES
(1, 'String'),
(2, 'Keyboard'),
(3, 'Percussion'),
(4, 'Brass'),
(5, 'Woodwind');

-- --------------------------------------------------------

--
-- Table structure for table `instrument`
--

CREATE TABLE `instrument` (
  `iid` int(4) NOT NULL,
  `fid` int(1) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instrument`
--

INSERT INTO `instrument` (`iid`, `fid`, `name`) VALUES
(1001, 1, 'Electric Guitar'),
(1002, 1, 'Acoustic Guitar'),
(1010, 1, 'Violin'),
(2001, 2, 'Acoustic Piano'),
(2002, 2, 'Electric Piano'),
(2010, 2, 'MIDI Keyboard'),
(3001, 3, 'Drum Kit'),
(4001, 4, 'Trumpet'),
(5001, 5, 'Flute'),
(5002, 5, 'Saxophone'),
(5010, 5, 'Accordion');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `oid` int(11) NOT NULL,
  `products` varchar(250) NOT NULL,
  `total_price` float NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_lastname` varchar(100) NOT NULL,
  `email` varchar(320) NOT NULL,
  `phone_number` int(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `zip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`oid`, `products`, `total_price`, `customer_name`, `customer_lastname`, `email`, `phone_number`, `address`, `city`, `country`, `zip`) VALUES
(100016, 'Roland FP 90 Digital Piano, Jupiter 1100 Performance Series JAS1100 Alto Saxophone,', 4528, 'Mihail', 'Atanasovski', 'mihail.atanasovski@hotmail.com', 70814413, 'UL 101 BR BB Vratnica', 'Tetovo', 'Macedonia', 1225),
(100019, 'Gibson Les Paul Special, Fender Vintera 50s Telecaster,', 2588, 'Mihail', 'Atanasovski', 'mihail.atanasovski@hotmail.com', 12312132, 'rewrerq', 'rewrer', 'Macedonia', 543543);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(8) NOT NULL,
  `bid` int(3) NOT NULL,
  `iid` int(4) NOT NULL,
  `name` varchar(80) NOT NULL,
  `description` varchar(1500) NOT NULL,
  `color` varchar(24) NOT NULL,
  `price` float NOT NULL,
  `photo1` varchar(64) DEFAULT NULL,
  `photo2` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `bid`, `iid`, `name`, `description`, `color`, `price`, `photo1`, `photo2`) VALUES
(0, 0, 1001, 'Vintera 50s Telecaster', 'For players who want the style and sound of Fender’s golden era, we created the Vintera ‘50s Telecaster. Equipped with the coveted features that defined the decade—including period-accurate neck profile and playing feel, along with re-voiced pickups—this guitar has all of the bite and twang that made the Telecaster a legend.   For authentic, vintage-style tone we recreated our favorite set of ‘50s Telecaster pickups. Twangy and articulate, they have the crisp, snarling sound that put Fender on the musical map. The thick, fat-shouldered “Early 50s U”-shaped neck has a 7.25”-radius maple fingerboard with 21 vintage-style frets for classic playing feel. A vintage-style Tele® bridge with three brass barrel saddles gives this Telecaster it’s characteristic twang, while vintage-style tuning machines provide original-era aesthetics, rock-solid performance and tuning stability. Other features include vintage-style strap buttons, chrome hardware and four-bolt neck plate. Includes deluxe gig bag.', 'Sonic Blue', 989, '212026.png', '78025-304913-fender-vintera-50s-telecaster-1.jpg'),
(111, 10, 1001, 'Les Paul Special', 'The Les Paul Special returns to the classic design that made it relevant. Originally introduced in 1955, the Les Paul Special has been embraced by musicians for over 60 years. It is based on the Les Paul Junior with a slab mahogany body, fat 50s-style mahogany neck, rosewood fingerboard, wraparound bridge, an additional rhythm P-90 pickup, binding on the neck and additional controls for the rhythm pickup and the 3-way toggle switch.', 'TV Yellow', 1599, 'lespaultvyellow1.jpg', 'lespaultvyellow2.jpg'),
(222, 20, 1002, 'Texan', 'Explore your individual creativity with the bold looks and inspiring sound of the Newporter Classic. Featuring a solid spruce top and solid mahogany back and sides, the mid-sized Newporter body shape provides a balanced voice that’s both articulate and powerful. Designed for performing, it also includes a premium Fender- and Fishman®-designed preamp system voiced specifically for the Newporter’s body shape, allowing you to reproduce the guitar’s natural sound when plugged into an amplifier. The mahogany neck features a comfortable, slim-taper \"C\"-shaped profile, inspired by Fender’s electric legacy.\r\n\r\nSince 1958, the Epiphone Texan has been the inspiration for generations of world-class songwriters including Paul McCartney, Peter Frampton and Noel Gallagher of Oasis. Now, the Texan is made in the USA once again and is proudly handcrafted in Bozeman, Montana by Gibson’s finest acoustic luthiers. Featuring all solid woods, X-bracing, and a 25.5” scale length for a powerful tone. Available in Antique Natural and Vintage Sunburst. Featuring Gibson™ Strings.', 'Antique Natural', 2699, 'texan1.jpg', 'texan2.jpg'),
(333, 25, 3001, 'RYDEEN RDP2F5', 'The new RYDEEN (5-piece shell pack) is exactly what any beginner or intermediate player would love to play. This drum set utilizes Yamaha hardware featuring Genuine Yamaha tom and pipe clamps and features solid and glitter finishes, each with three color options, for a total of six vibrant, stylish looks.', 'Hot Red', 879, 'rydeen1.jpg', 'rydeen2.jpg'),
(444, 25, 4001, 'YTR-6335\r\n', 'The YTR-6335 features a medium-large bore and a yellow-brass bell for a big sound with clear projection. It has the kind of flexibility needed for playing in a quintet or in the studio but enough tonal power for lead or orchestral work.\r\n\r\n', 'Gold Lacquer', 2399, 'YTR-6335-1.jpg', 'ytr2.jpg'),
(555, 50, 2010, 'microKEY', 'The microKEY is a compact USB MIDI keyboard that’s ideal for the musician who wants to assemble a convenient and compact music production system. All models feature the acclaimed velocity-sensitive Natural Touch mini-keyboard found on instruments such as the microKORG XL+ and microARRANGER.', 'Black', 120, 'microkey1.jpg', 'microkey2.jpg'),
(570, 100, 5002, '1100 Performance Series JAS1100 Alto Saxophone\r\n', 'The JAS1100 gold lacquered alto saxophone is a perfect example of the classic hand-crafted design practices that reside alongside state-of-the-art manufacturing processes. The JAS1100 is the perfect step-up alto saxophone for the committed student or practicing professional.\r\n', 'Gold Lacquer', 2379, 'jas1.jpg', 'jas2.jpg'),
(574, 15, 1001, 'Vintera 50s Telecaster', 'For players who want the style and sound of Fender’s golden era, we created the Vintera ‘50s Telecaster. Equipped with the coveted features that defined the decade—including period-accurate neck profile and playing feel, along with re-voiced pickups—this guitar has all of the bite and twang that made the Telecaster a legend.\r\n\r\n\r\nFor authentic, vintage-style tone we recreated our favorite set of ‘50s Telecaster pickups. Twangy and articulate, they have the crisp, snarling sound that put Fender on the musical map. The thick, fat-shouldered “Early 50s U”-shaped neck has a 7.25”-radius maple fingerboard with 21 vintage-style frets for classic playing feel. A vintage-style Tele® bridge with three brass barrel saddles gives this Telecaster it’s characteristic twang, while vintage-style tuning machines provide original-era aesthetics, rock-solid performance and tuning stability. Other features include vintage-style strap buttons, chrome hardware and four-bolt neck plate. Includes deluxe gig bag.', 'Sonic Blue', 989, '212026.png', '78025-304913-fender-vintera-50s-telecaster-1.jpg'),
(575, 80, 1010, 'Student 2', 'The Student 2 violin full size has long been regarded as one of the best student instruments available. As with all Stentor products, the Student 2 full size is built to keep up with the busy lifestyle of a music student.\r\nWarm and bright tones are clearly projected by the carved spruce body with maple back and sides. The traditional inlaid purfling and natural finish give the violin a classic look. The ebony fingerboard has a consistent feel for long-lasting, comfortable performances. The Stentor Student 2 Violin outfit also includes a quality bow and lightweight case, providing everything needed to continue your development.', 'Spruce and Maple', 219, 'stentorstudent1.jpg', 'stentorstudent2.jpg'),
(576, 127, 2001, 'K-15 Upright Piano', 'At the beginning stages of piano study, a student may not need a grand piano. A smaller upright piano could provide a good start and serve as a stepping stone to a larger instrument. But, in order to assure a positive piano experience during the all-important early stages of learning, a student must have a good-sounding, reliable instrument — one that will not only respond with pleasing tone but also with consistent touch that enables expressiveness and musicality to develop in an aspiring player. That’s why we created the K-15 upright piano. It has everything a developing pianist needs to grow as a musician. And its Ultra-Responsive Action with exclusive composite parts will provide the level of consistency and quality that pianist have come to expect from Kawai instruments. The Kawai K-15 will provide a great start on the road toward musical success and enjoyment.', 'Polished Ebony', 5599, 'Kawai-K-15-Polished-Ebony.jpg', 'K-15__87053.1537048842.jpg'),
(577, 30, 3001, 'GE2-E825TK Energy Kit', 'The GE2 Energy Kit is a complete and fully equipped set that is perfect for starting drummers. The 7-ply Poplar shells provide a warm sound and optimal resonance. All shells feature 30-degree bearing edges, for an open sound.', 'Wine Red', 779, 'gretsch-drums-ge2-e605tk-energy-kit-wine-red.jpg', 'gretsch-drums-ge2-e825tk-energy-kit-wine-red.jpg'),
(578, 55, 2002, 'FP 90 Digital Piano', 'The Roland FP 90 Digital Piano in white is an extensively detailed instrument for the advanced musician. The SuperNATURAL sound engine produces a range of rich, complex tones with similar organic response to an acoustic piano. The FP 90 benefits from Bluetooth and MIDI connectivity for access to a number of apps everything from your music playback to the piano\'s unique sound adjustments. The diverse range of piano sounds includes concert grands and uprights, as well as a range of organs and synths to suit adventurous musicians. The FP 90 packs high quality, detailed features into a smart, portable design.', 'White', 2149, 'rolandpiano1.jpg', 'rolandpiano2.jpg'),
(580, 128, 5001, 'AZ1', 'Designed by Altus founder and flutemaker Shuichi Tanaka, Azumi flutes are a perfect fit for the serious student and aspiring flutist. Featuring a handcrafted Altus Z-cut headjoint, this instrument responds quickly and easily, producing a full and rich tone in all three registers. All Azumi flutes feature pointed key arms for an elegant and refined look, improved key strength, and even pad wear. Using the Altus-Bennett scale, the Azumi offers excellent intonation, carefully tuned harmonics, and balanced registers.', 'Silver', 1339, 'Azumi-AZ1-3.jpg', 'Azumi-AZ1-1.jpg'),
(581, 120, 5010, 'Atlantic IV 120', 'When it comes to pop and rock music, a strong, clear sound is important to not be overpowered by drums and guitars. Incidentally, all instruments should be versatile enough to play both lead and rhythm – everyone who’s been to a rock show knows, at some point the audience will demand a drum solo. The Atlantic IV 120 is the double octave accordion, and meets these requirements without problem. Its crisp, loud sound matches the guitar, complements the bass, and thanks to the good articulation it can even follow a drum roll. Perfect for advanced players, it makes a good figure both in practice and on stage, solo and in an orchestra.', 'Black', 1099, '41peiiSojwL._AC_.jpg', 'ACCORDION-HOHNER-ATLANTIC-IV-de-luxe-120-BASS.jpg'),
(582, 35, 3001, 'Export EXL725S/C', 'New shells, hardware, and more make this Pearl Export EXL series 5-piece drum set an upgraded version of one of the most popular, affordable drum kits around. Pearl\'s Superior Shell Technology (SST) uses a combination of strategically arranged plies of premium wood and proprietary construction techniques to offer you a durable shell that maximizes frequency response. The Export EXL\'s Opti-Loc mounting system keeps your toms wobble free and reinforces the resonance of the kit. All of this makes the Export EXL a high-quality kit for an affordable price.\r\n\r\n\r\n', 'Black Smoke Lacquer', 979, 'EXL725S-C248-large.jpg', '750-EXL725S-C248_detail1.jpg'),
(583, 10, 1001, 'ES-335', 'The Gibson ES-335 DOT is the cornerstone of the Gibson ES line-up. From its inaugural appearance in 1958, the Gibson ES-335 immediately set an unmatched standard. The pearloid dot inlay rosewood fingerboard on a hand-rolled Rounded \'C\' mahogany neck remind players where it all started. The all-new Gibson Calibrated T-Type humbucking pickups paired with our hand-wired control assembly showcases the versatile Gibson ES tone that players have craved for over 60 years. Tuning stability and precise intonation are provided by the Vintage Deluxe tuners with Keystone buttons paired with light-weight Aluminum ABR-1 bridge and Stop bar tailpiece. Impressive yet subtle Satin Nitro finishes include Cherry, Vintage Burst and Vintage Natural.', 'Maple', 3149, '374580-ES-335 Satin Natural Front.jpg', '374579-ES-335 Satin Natural Hero.jpg'),
(584, 15, 1001, ' American Performer Stratocaster', 'Fender’s American Performer range brings an excellent selection of the most famous Fender designs, made in the USA and available at a great price. Each Fender American Performer guitar has been specially designed to give gigging guitarists the tones and tools they need for excellent, high quality performances. Special design features, custom wound pickups and fresh new finishes make this range stand out as one for players of all styles to get behind. Fender USA quality at a respectable price: sounds perfect to us!', 'Arctic White', 1349, 'arcticwhitestrat1.jpg', 'fender-american-performer-strat-rw-awt.jpg'),
(585, 20, 1001, 'Flying V', 'The Epiphone Flying V from the new Inspired by Gibson Collection recreates the ultra-rare 1958 classic with an a pair of Epiphone ProBucker™ humbuckers for that vintage tone, string-thru tailpiece, Epiphone Vintage Deluxe tuners, and the vintage ornament Epiphone logo on the headstock. This Epiphone Inspired by Gibson Original model also a rolled neck for a comfortable feel, GraphTech® NuBone™ nut, era-appropriate wiring, and CTS pots. Optional hardshell or EpiLite Case is available.', 'Ebony', 599, '70045_1.jpg', '70045_3.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `family`
--
ALTER TABLE `family`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `instrument`
--
ALTER TABLE `instrument`
  ADD PRIMARY KEY (`iid`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `bid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `family`
--
ALTER TABLE `family`
  MODIFY `fid` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `instrument`
--
ALTER TABLE `instrument`
  MODIFY `iid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5019;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100020;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=586;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
