-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2023 at 06:18 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_project_care`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_username` varchar(200) NOT NULL,
  `admin_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_username`, `admin_password`) VALUES
('admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `patient_email` varchar(200) NOT NULL,
  `patient_gender` varchar(100) NOT NULL,
  `patient_city` int(100) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `appointment_status` varchar(50) NOT NULL DEFAULT 'pending',
  `doctor_id` int(11) NOT NULL,
  `patient_age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `patient_id`, `patient_email`, `patient_gender`, `patient_city`, `date`, `time`, `appointment_status`, `doctor_id`, `patient_age`) VALUES
(13, 1, '', 'Male', 1, '2023-11-10', '00:00:00', 'Accepted', 15, 0),
(14, 1, '', 'Male', 1, '2023-11-22', '00:00:00', 'declined', 15, 0),
(15, 1, '', 'Male', 1, '2023-11-22', '00:00:00', 'declined', 15, 0),
(16, 1, '', 'Male', 4, '2023-11-24', '03:36:00', 'pending', 23, 19);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`, `status`) VALUES
(1, 'Karachi', 0),
(2, 'Islamabad', 1),
(3, 'Peshawar', 1),
(4, 'Multan', 0),
(5, 'Sukkur', 1),
(6, 'Rawalpindi', 1),
(7, 'Hyderabad', 0),
(8, 'Peshawar', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doctor_id` int(11) NOT NULL,
  `doctor_name` varchar(100) NOT NULL,
  `doctor_email` varchar(100) NOT NULL,
  `doctor_password` varchar(100) NOT NULL,
  `doctor_pic` varchar(500) NOT NULL,
  `doctor_exp` int(11) NOT NULL,
  `doctor_qualification` varchar(100) NOT NULL,
  `doctor_contact` bigint(20) NOT NULL,
  `doctor_degree_pic` varchar(500) NOT NULL,
  `doctor_nic_front_pic` varchar(100) NOT NULL,
  `doctor_nic_back_pic` varchar(100) NOT NULL,
  `doctor_city` int(11) NOT NULL,
  `doctor_whatsapp` bigint(20) NOT NULL,
  `doctor_gender` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `doctor_specialization` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctor_id`, `doctor_name`, `doctor_email`, `doctor_password`, `doctor_pic`, `doctor_exp`, `doctor_qualification`, `doctor_contact`, `doctor_degree_pic`, `doctor_nic_front_pic`, `doctor_nic_back_pic`, `doctor_city`, `doctor_whatsapp`, `doctor_gender`, `status`, `doctor_specialization`) VALUES
(12, 'Johnson ', 'johnson@gmail.com', 'johnson123 ', '../doctors_images/istockphoto-1470505351-170667a.webp', 3, '4', 3226301906, '../degree_images/gettyimages-53289036-612x612.jpg', '../nic_images/9e6c9b3c155e80d609fcf50bf3c0df9f.jpg', '../nic_images/e8e446b1c9cdf2559ccc1d077b674acc.jpg', 4, 3226301906, 'male', 'Accepted', 10),
(13, 'Aliana ', 'aliana@gmail.com', 'aliana123 ', '../doctors_images/istockphoto-1189304032-612x612.jpg', 6, '3', 3226301906, '../degree_images/doctor-of-divinity-degree.png', '../nic_images/9e6c9b3c155e80d609fcf50bf3c0df9f.jpg', '../nic_images/e8e446b1c9cdf2559ccc1d077b674acc.jpg', 1, 3226301906, 'female', 'Accepted', 7),
(14, 'john herry ', 'harry@gmail.com', 'harry123 ', '../doctors_images/depositphotos_80150956-Confident-female-doctor-at-office-desk.jpg', 0, '2', 3226301906, '../degree_images/7783365118_ceac1b72a7_b.jpg', '../nic_images/9e6c9b3c155e80d609fcf50bf3c0df9f.jpg', '../nic_images/e8e446b1c9cdf2559ccc1d077b674acc.jpg', 7, 3226301906, 'female', 'Accepted', 6),
(15, 'Michael ', 'michael@gmail.com', 'michael123 ', '../doctors_images/clinic-doctor-image.png', 8, '1', 32263, '../degree_images/Juris_Doctor_diploma.jpg', '../nic_images/download.jfif', '../nic_images/download (1).jfif', 1, 3226301906, 'male', 'Accepted', 5),
(17, 'Elizabeth ', 'elizabeth@gmail.com', 'elizabeth123 ', '../doctors_images/360_F_317854905_2idSdvi2ds3yejmk8mhvxYr1OpdVTrSM.jpg', 6, '1', 32263, '../degree_images/Juris_Doctor_diploma.jpg', '../nic_images/download.jfif', '../nic_images/download (1).jfif', 1, 3226301906, 'female', 'Accepted', 9),
(18, 'Isabella ', 'isabella@gmail.com', 'isabella123 ', '../doctors_images/360_F_116743793_5vlsF6CKEwIPj0ItS68Kvj458t7NYrMT.jpg', 4, '1', 32263, '../degree_images/Juris_Doctor_diploma.jpg', '../nic_images/download.jfif', '../nic_images/download (1).jfif', 1, 3226301906, 'female', 'Accepted', 6),
(19, 'Joseph ', 'joseph@gmail.com', 'joseph123 ', '../doctors_images/360_F_136187711_qeBMOwkPdTg1dCN8e5TR1AmduXDz60Xn.jpg', 8, '1', 32263, '../degree_images/Juris_Doctor_diploma.jpg', '../nic_images/download.jfif', '../nic_images/download (1).jfif', 1, 3226301906, 'male', 'Accepted', 10),
(20, 'Anna ', 'anna@gmail.com', 'anna123 ', '../doctors_images/istockphoto-638647058-612x612.jpg', 3, '1', 32263, '../degree_images/Juris_Doctor_diploma.jpg', '../nic_images/download.jfif', '../nic_images/download (1).jfif', 4, 3226301906, 'female', 'Accepted', 5),
(21, 'Sophia ', 'sophia@gmail.com', 'sophia123 ', '../doctors_images/30734.jpg', 0, '1', 32263, '../degree_images/Juris_Doctor_diploma.jpg', '../nic_images/download.jfif', '../nic_images/download (1).jfif', 4, 3226301906, 'female', 'Accepted', 6),
(22, 'William ', 'william@gmail.com', 'william123 ', '../doctors_images/Albin-Abraham-Profile.jpg', 3, '1', 32263, '../degree_images/Juris_Doctor_diploma.jpg', '../nic_images/download.jfif', '../nic_images/download (1).jfif', 4, 3226301906, 'male', 'Accepted', 7),
(23, 'Oliver ', 'oliver@gmail.com', 'oliver123 ', '../doctors_images/doctor-standing-with-folder-stethoscope_1291-14.avif', 12, '1', 3161267933, '../degree_images/Juris_Doctor_diploma.jpg', '../nic_images/download.jfif', '../nic_images/download (1).jfif', 4, 3226301906, 'male', 'Accepted', 9),
(24, 'Andrew ', 'andrew@gmail.com', 'andrew123 ', '../doctors_images/doctor-offering-medical-teleconsultation_23-2149329007.avif', 8, '1', 3161267933, '../degree_images/Juris_Doctor_diploma.jpg', '../nic_images/download.jfif', '../nic_images/download (1).jfif', 7, 3226301906, 'male', 'Accepted', 5),
(25, 'Clara ', 'clara@gmail.com', 'clasra123 ', '../doctors_images/woman-doctor-wearing-lab-coat-with-stethoscope-isolated_1303-29791.avif', 2, '1', 3161267933, '../degree_images/Juris_Doctor_diploma.jpg', '../nic_images/download.jfif', '../nic_images/download (1).jfif', 7, 3226301906, 'female', 'Accepted', 7),
(26, 'Abigail ', 'abigail@gmail.com', 'abigail123 ', '../doctors_images/file-20191203-66986-im7o5.avif', 5, '1', 3161267933, '../degree_images/Juris_Doctor_diploma.jpg', '../nic_images/download.jfif', '../nic_images/download (1).jfif', 7, 3226301906, 'female', 'Accepted', 9),
(27, 'Benjamin ', 'benjamin@gmail.com', 'benjamin123 ', '../doctors_images/young-male-doctor-close-up-happy-looking-camera-56751540.webp', 1, '1', 3161267933, '../degree_images/Juris_Doctor_diploma.jpg', '../nic_images/download.jfif', '../nic_images/download (1).jfif', 7, 3226301906, 'male', 'Accepted', 10),
(28, 'Henry ', 'henry@gmail.com', 'henry123 ', '../doctors_images/young-male-doctor-close-up-happy-looking-camera-56751540 (1).webp', 6, '1', 3226301906, '../degree_images/Juris_Doctor_diploma.jpg', '../nic_images/download.jfif', '../nic_images/download (1).jfif', 1, 3161267933, 'male', '', 10),
(45, 'Fahad  ', 'fahad@gmail.com', 'fahad123 ', '../doctors_images/fb4-removebg-preview.png', 5, '1', 3161267933, '../degree_images/fb4.png', '../nic_images/Untitled.png', '../nic_images/fb4.png', 1, 3161267933, 'male', '', 5),
(47, 'Tendra Bavuma', 'tendra@gmail.com', 'Tendra123? ', '../doctors_images/male-doctor_101945-639.avif', 3, '1', 3161267933, '../degree_images/Juris_Doctor_diploma.jpg', '../nic_images/download.jfif', '../nic_images/download (1).jfif', 1, 3226301906, 'male', '', 5),
(48, 'Tendra Bavuma', '', 'Tendra123? ', '../doctors_images/male-doctor_101945-639.avif', 3, '1', 3161267933, '../degree_images/Juris_Doctor_diploma.jpg', '../nic_images/download.jfif', '../nic_images/download (1).jfif', 1, 3226301906, 'male', '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `medical_inventions`
--

CREATE TABLE `medical_inventions` (
  `inven_id` int(11) NOT NULL,
  `inven_title` varchar(200) NOT NULL,
  `inven_image` varchar(5000) NOT NULL,
  `inven_content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medical_news`
--

CREATE TABLE `medical_news` (
  `news_id` int(11) NOT NULL,
  `news_title` varchar(300) NOT NULL,
  `news_image` varchar(500) NOT NULL,
  `news_content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medical_news`
--

INSERT INTO `medical_news` (`news_id`, `news_title`, `news_image`, `news_content`) VALUES
(10, 'Managing chronic inflammation with psoriasis', '../medical_news_images/chronic-inflammation.png', 'Although the exact cause of psoriasis is unknown, doctors consider it an immune-mediated inflammatory disease. This means that inflammation is at the root of this condition.\r\n\r\nIn people with psoriasis, immune system dysfunction causes inflammatory cells to build up in the middle layer of the skin, known as the dermis. The condition also speeds the growth of skin cells in the epidermis, the outer skin layer.\r\n\r\nTypically, skin cells grow and flake off in the span of a month. This process speeds up to just a few days in people with psoriasis. Instead of shedding, skin cells pile up on the skin’s surface, leading to uncomfortable symptoms such as raised plaques, scales, swelling, and redness or discoloration.\r\n\r\nEven though psoriasis is a skin condition, the inflammation associated with psoriasis affectsTrusted Source the entire body. It can increase the risk of heart disease, cancer, inflammatory bowel disease, and psoriatic arthritis.\r\n\r\nIs there a way to treat inflammation?\r\nAlthough inflammation in psoriasis is due to immune system dysregulation, studiesTrusted Source suggest that people can reduce this inflammation through lifestyle and dietary changes. This can help reduce symptoms and improve quality of life.\r\n\r\nUsing these methods, many people who have psoriasis can maintain remission, which is a long period without experiencing psoriasis symptoms.\r\n\r\nAdditionally, certain medications to treat psoriasis work by reducing inflammation. These include topical corticosteroids, injectable biologics, and oral medications.\r\n\r\nEveryone with psoriasis is different. Some people will require more extensive treatment than others.\r\n\r\nWhile there is currently no cure for psoriasis, the following habits may help reduce psoriasis-related inflammation and increase a person’s chances of experiencing remission.\r\n\r\nObesity is a risk factor for psoriasis development. People with psoriasis who have overweight or obesity may also experience more severe symptoms than people with a moderate weight.\r\n\r\nWeight loss may reduce inflammatory markers and help reduce psoriasis symptoms in people with excess body weight.\r\n\r\nA 2020 study found that people with psoriasis and overweight or obesity who reduced their body weight by 12% through a 10-week program experienced a 50–75% reduction in psoriasis severity. Participants experienced an average weight loss of 23 pounds.'),
(11, 'Common drug may help manage osteoarthritis symptoms and pain', '../medical_news_images/f8690290-456f-11eb-87d5-15e76591973e.jpg', 'People use their hands daily to accomplish tasks and go about their lives. When the joints in the hand become stiff and rigid to move, it can be debilitating and hard to function. This can be the case for people who have hand osteoarthritis. Researchers are interested in understanding the most effective treatment options for people with hand osteoarthritis.\r\n\r\nA recent studyTrusted Source published in The LancetTrusted Source examined how well the drug methotrexate may help treat hand osteoarthritis.\r\n\r\nThe study found that participants who received methotrexate over six months had moderate pain improvement.\r\n\r\nThe results indicate that methotrexate, which is helpful in treating other types of arthritis such as psoriatic or rheumatoid arthritis, may benefit people with hand osteoarthritis and inflammation.\r\n\r\nOsteoarthritisTrusted Source is a condition that affects the joints of the body. One of the most common places it happens is in the hands. People with osteoarthritis in their hands may report trouble with movement, swelling of the joints, and pain. The joint swelling or synovitis can be particularly troubling.\r\n\r\nDr.Fiona E. Watt, a reader in rheumatology, honorary consultant rheumatologist, UKRI Future Leaders Fellow, and part of the Osteoarthritis Research Group, Department of Immunology and Inflammation, Imperial College London, who was not involved in the study, explained to Medical News Today:\r\n\r\n“Hand osteoarthritis is the [most common] form of arthritis affecting the hands—it is usually associated with some inflammation of the lining of the joint, also known as synovial inflammation (synovitis) although this may not be present all the time, or at all stages in the condition.”\r\n\r\n\r\nHand osteoarthritis and associated joint swelling can be difficult to manage and treat. The current study’s authors wanted to see if the medication methotrexate may be useful in helping with pain relief among people with hand osteoarthritis and synovitis. Methotrexate is a common treatment for other types of arthritis, like rheumatoid arthritis.\r\n\r\nProfessor Philip Conaghan,director of the NIHR Leeds Biomedical Research Centre in the U.K., and arthritis expert, who was also not involved in the study, explained to MNT why this drug is not usually considered as first-line treatment for osteoarthritis:\r\n\r\n“Methotrexate is the [most common] drug used around the world for treating immune-mediated inflammatory arthritis such as rheumatoid arthritis or psoriatic arthritis. It has multiple anti-inflammatory actions. Because the inflammation in osteoarthritis is not primarily driven by the immune system, it has not been clear if methotrexate would work in osteoarthritis.”\r\n\r\n\r\nMethotrexate improves pain, stiffness with osteoarthritis\r\nStudy author Professor Flavia Cicuttini, the head of the musculoskeletal unit at Monash University and the head of rheumatology at Alfred Hospital, explained the difficulty surrounding treatment options for hand osteoarthritis.\r\n\r\n“Hand osteoarthritis is a disabling condition that causes pain and affects function, impeding daily activities such as dressing and eating. It can significantly reduce quality of life,” she told MNT.'),
(12, 'Can semaglutide injections like Ozempic help prevent heart attacks and stroke?', '../medical_news_images/semaglutide-istock-485.jpg', 'Semaglutide is the chemical name for the blood-sugar management drugs Ozempic, Wegovy, and Rybelsus, developed for people with diabetes. Ozempic and Wegovy are also approved as weight-loss medications in the U.S.\r\n\r\nPrevious researchTrusted Source has suggested that semaglutide reduces cardiovascular risk in people with diabetes. Now, a large, international trial finds that even for people without diabetes, semaglutide may deliver cardiovascular benefits.\r\n\r\nFor people with overweight or obesity and pre-existing cardiovascular disease (CVD), taking semaglutide for three years resulted in 20% fewer heart attacks, strokes, and deaths, compared to those taking a placebo, according to the new study.\r\n\r\nThe randomized, controlled study recruited over 17,000 people with overweight or obesity and preexisting cardiovascular disease. None had type 1 or type 2 diabetes. In the end, 15,425 people completed the trial.\r\n\r\nParticipants in the study lost an average of 9.4% of their body weight on semaglutide.\r\n\r\nWeight loss from semaglutide persists as long as one remains on the medication. Typically, it is taken for the remainder of one’s life.\r\n\r\nWhile such a loss of weight may reduce risk factors for cardiovascular disease, the trial suggests that something more is going on.\r\n\r\nThe study was published in The New England Journal of Medicine.\r\n\r\nDr. A. Michael Lincoff explained that semaglutide is a GLP-1 agonist, and “It’s a hormone that’s derived from the gut.”\r\n\r\n“GLP-1 agonists are released into the [gastrointestinal] system, and act by reducing appetite and hunger cravings by traveling to the hunger centers of the brain,” said Dr. Jayne Morgan, a cardiologist and clinical director of the Covid Task Force at the Piedmont Healthcare Corporation in Atlanta, GA, who was not involved in the study.\r\n\r\nBy stimulating receptors in the pancreas, semaglutide can stimulate the production of insulin, suppress glucagon, and slow gastric emptying. All of these actions have the effect of reducing appetite, and food intake.\r\n\r\nThe authors of the study suspect that it is not just weight loss that improved participants’ heart health.\r\n\r\n“The maximum weight loss didn’t occur until 65 weeks after starting the drug, but we saw differences in the [number of cardiovascular] event rates very early on, within a few months of starting the drug,” said Dr. Lincoff.\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patient_id` int(11) NOT NULL,
  `patient_name` varchar(100) NOT NULL,
  `patient_email` varchar(200) NOT NULL,
  `patient_password` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `patient_name`, `patient_email`, `patient_password`, `status`) VALUES
(1, 'Mohtasham', 'mohtasham@gmail.com', 'MOHTASHAM123', 0),
(2, 'usman', 'usman@gmail.com', 'usman123', 0),
(3, 'fahad', 'fahad@gmail.com', 'fahad123', 0),
(4, 'fahad', 'fahad@gmail.com', 'fahad123', 0),
(6, 'usman', 'usman@gmail.com', 'usman123', 0),
(7, 'fahad', 'fahad@gmail.com', 'fahad123', 0),
(8, 'fahad', 'fahad@gmail.com', 'fahad123', 0),
(9, 'usman', 'usman@gmail.com', 'usman123', 0),
(10, 'fahad', 'fahad@gmail.com', 'fahad123', 0),
(11, 'fahad', 'fahad@gmail.com', 'fahad123', 0),
(12, 'fahad', 'fahad@gmail.com', 'fahad123', 0),
(13, 'fahad', 'fahad@gmail.com', 'fahad123', 0),
(14, 'usman', 'usman@gmail.com', 'usman123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

CREATE TABLE `qualification` (
  `qualification_id` int(11) NOT NULL,
  `qualification_name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `qualification`
--

INSERT INTO `qualification` (`qualification_id`, `qualification_name`, `status`) VALUES
(1, 'MBBS', 0),
(2, 'BMBS', 0),
(3, 'BmedSci', 0),
(4, 'DRSH', 0);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name`, `status`, `image`) VALUES
(5, 'Pathology', 1, '../service_image/pathology.jpeg'),
(6, 'psychology', 1, '../service_image/psychology-degree-in-medical-field.jpg'),
(7, 'Neurology', 0, '../service_image/90437.webp'),
(8, 'Pediatric', 0, '../service_image/units-474324900-img.jpg'),
(9, 'Cardiology', 0, '../service_image/Services-Cardiology.jpg'),
(10, 'Urology', 0, '../service_image/Advanced-Urology-Feb-2021-What-to-expect-in-a-male-urology-exam-min.jpg'),
(11, 'Dermatology', 0, '../service_image/plym_What-is-Cosmetic-Dermatology.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `specialization`
--

CREATE TABLE `specialization` (
  `specialization_id` int(11) NOT NULL,
  `specialization_name` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `specialization`
--

INSERT INTO `specialization` (`specialization_id`, `specialization_name`, `status`) VALUES
(1, 'General Physician 1', 1),
(2, 'Pathologist', 1),
(3, 'Psychiatrist', 1),
(4, 'Orthopaedist', 1),
(5, 'Neurologist', 0),
(6, 'Urologist', 0),
(7, 'Pediatrician', 0),
(8, 'General surgeon', 1),
(9, 'Cardiologist', 0),
(10, 'Dermatologist', 0),
(11, 'Geriatrics', 1),
(12, 'Gynaecologist', 1),
(13, 'Ophthalmologist', 1),
(14, 'Anesthesiologist', 1),
(15, 'BMBS', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `fk` (`doctor_id`),
  ADD KEY `gk` (`patient_id`),
  ADD KEY `kl` (`patient_city`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctor_id`),
  ADD KEY `hk` (`doctor_city`),
  ADD KEY `jk` (`doctor_specialization`);

--
-- Indexes for table `medical_inventions`
--
ALTER TABLE `medical_inventions`
  ADD PRIMARY KEY (`inven_id`);

--
-- Indexes for table `medical_news`
--
ALTER TABLE `medical_news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `qualification`
--
ALTER TABLE `qualification`
  ADD PRIMARY KEY (`qualification_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `specialization`
--
ALTER TABLE `specialization`
  ADD PRIMARY KEY (`specialization_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `medical_inventions`
--
ALTER TABLE `medical_inventions`
  MODIFY `inven_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medical_news`
--
ALTER TABLE `medical_news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `qualification`
--
ALTER TABLE `qualification`
  MODIFY `qualification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `specialization`
--
ALTER TABLE `specialization`
  MODIFY `specialization_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `fk` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`doctor_id`),
  ADD CONSTRAINT `gk` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`),
  ADD CONSTRAINT `kl` FOREIGN KEY (`patient_city`) REFERENCES `city` (`city_id`);

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `jk` FOREIGN KEY (`doctor_specialization`) REFERENCES `specialization` (`specialization_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
