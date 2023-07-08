-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2023 at 05:49 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodbee`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_comment`
--

CREATE TABLE `blog_comment` (
  `bgc_id` int(11) NOT NULL,
  `bgc_comment` varchar(100) NOT NULL,
  `bgc_reply_id` int(11) DEFAULT NULL,
  `bgc_us_id` int(11) NOT NULL,
  `bgc_bg_id` int(11) NOT NULL,
  `bgc_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_comment`
--

INSERT INTO `blog_comment` (`bgc_id`, `bgc_comment`, `bgc_reply_id`, `bgc_us_id`, `bgc_bg_id`, `bgc_time`) VALUES
(1, 'Well Said', 0, 1, 1, '2023-04-08 18:21:09'),
(2, 'Very Good. I appriciate your comment. I like YOu', NULL, 2, 1, '2023-04-08 18:23:03'),
(3, 'wow. tHIS BLOG was very informative', NULL, 3, 1, '2023-04-08 18:24:15'),
(4, 'Nicely Spoken. I like your blog very much.', NULL, 4, 1, '2023-04-08 18:24:59'),
(5, 'very good food', NULL, 1, 5, '2023-04-09 09:49:18'),
(6, 'good', NULL, 1, 1, '2023-04-09 09:58:48'),
(7, 'iiii', NULL, 1, 3, '2023-05-03 10:52:35');

-- --------------------------------------------------------

--
-- Table structure for table `blog_post`
--

CREATE TABLE `blog_post` (
  `bg_id` int(10) NOT NULL,
  `bg_title` varchar(60) NOT NULL,
  `bg_post` varchar(200) NOT NULL,
  `bg_us_id` int(10) NOT NULL,
  `bg_time` date NOT NULL DEFAULT current_timestamp(),
  `bg_img` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_post`
--

INSERT INTO `blog_post` (`bg_id`, `bg_title`, `bg_post`, `bg_us_id`, `bg_time`, `bg_img`) VALUES
(1, 'Butter Chicken Meatballs', 'These butter chicken meatballs are covered in a rich and mildly spiced tomato gravy that is made lux', 1, '2023-04-16', 'bg2.jpg'),
(2, 'Carrot Cake Coffee Cake', '\r\nI know it might be confusing – carrot cake, which is like vegetables meets cake, but also still ca', 2, '2023-04-08', 'bg2.jpg'),
(3, 'Sheet Pan Meatballs with Tomato Salad and Green Sauce', 'We’re no strangers to sheet pan meatballs around here. We love to love them! Easy clean-up, no frying mess, but still oven-crisp goodness, and they’re always the easiest option for straight-off-the-pa', 1, '2023-04-08', 'bg3.jpg'),
(4, 'Spaghetti with Crispy Zucchini', 'Hi-ho! It’s crispy zucchini spaghetti day, which means a big happy plate of steamy, twirly, saucy spaghetti (nothing too fancy here) piled high with roasty zucchini pieces surrounded by crispities of ', 1, '2023-04-08', 'bg4.jpg'),
(5, 'Portobello French Dip with Horseradish Aioli', 'It’s hard to describe how much there is to love about these sandwiches, but I’ll try:\r\n\r\nCrunchy, buttery, toasted bread is going to meet up with roasted steak-seasoned portobello strips, sweet and go', 1, '2023-04-08', 'bg5.jpg'),
(6, 'Tiktok Green Goddess Salad', 'Its pretty green tint is what inspired the name “green goddess.” Invented in San Francisco, the original recipe calls for anchovies, green onions, parsley, tarragon, mayo, sour cream, and chives all b', 2, '2023-04-08', 'bg6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `fooddet`
--

CREATE TABLE `fooddet` (
  `f_id` int(11) NOT NULL,
  `f_name` varchar(25) NOT NULL,
  `f_r_id` int(25) NOT NULL,
  `f_det` varchar(50) NOT NULL,
  `f_price` int(25) NOT NULL,
  `f_type` int(25) NOT NULL,
  `f_pic` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fooddet`
--

INSERT INTO `fooddet` (`f_id`, `f_name`, `f_r_id`, `f_det`, `f_price`, `f_type`, `f_pic`) VALUES
(1, 'Basmati Kacchi', 2, '1:1 - A delightful preparation of slow-cooked arom', 290, 2, '1.jpg'),
(2, 'Kacchi Khadok - 1:1', 2, 'Served with 4 pcs of meat', 460, 2, '2.jpg'),
(3, 'Basmati Kacchi - 1:3', 2, 'A delightful preparation of slow-cooked aromatic b', 860, 2, '3.jpg'),
(4, 'Basmati Kacchi - 1:5', 2, 'A delightful preparation of slow-cooked aromatic b', 1430, 2, '4.jpg'),
(5, 'Chicken Roast', 2, 'Succulent, juicy & tender', 150, 1, '5.jpg'),
(6, ' Beef Rezala', 2, 'Classic beef rezala prepared with secret spice mix', 200, 1, '6.jpg'),
(7, ' Chui Jhal Gosht - 1:1', 2, ' Chui Jhal Gosht - 1:1', 160, 1, '7.jpg'),
(8, 'Jali Kebab', 2, 'A special dhakaiya kebab', 60, 1, '8.jpg'),
(9, ' Firni', 2, 'Rich in flavours with right amount of sweetness', 70, 3, '9.jpg'),
(10, 'Jorda', 2, 'Shahi jorda with sweets & raisins', 70, 3, '10.jpg'),
(11, 'Borhani', 2, 'A refreshing yogurt drink with a blend of coriande', 70, 4, '11.jpg'),
(12, ' Badam Sharbat', 2, 'A delicious almond drink prepared with milk, you c', 90, 4, '12.jpg'),
(13, 'Plain Polao', 2, 'Simple & classic, goes great with curries', 120, 1, '13.jpg'),
(14, 'Kacchi(Basmati)', 1, 'Half Basmati Kacchi', 299, 2, '14.jpg'),
(15, 'Kacchi(Basmati)', 1, 'Half with Barhani and Jarda/Firni', 379, 2, '15.jpg'),
(16, 'Kacchi (Basmati)', 1, 'Half with Chicken Roast,Barhani,Jali Kabab', 539, 2, '16.jpg'),
(17, 'Kacchi(Basmati)', 1, '1:3 Basmati Kacchi, Chicken Roast, Jali Kabab,Beef', 2249, 2, '17.jpg'),
(19, 'Mutton Tehari', 1, '1:2 Take  Away Only(Special Addition)', 230, 1, '18.jpg'),
(20, 'Plain Polao with Chicken ', 1, 'Deliciously cooked Polao and Chicken Roast', 299, 1, '19.jpg'),
(21, 'Jali Kabab', 1, 'A special dhakaiya kebab', 60, 1, '20.jpg'),
(22, 'Beef Rezala', 1, 'Classic beef rezala prepared with secret spice mix', 200, 1, '21.jpg'),
(23, 'Firni', 1, 'Rich in flavours with right amount of sweetness', 70, 3, '22.jpg'),
(24, 'Zarda', 1, 'Rich in flavours with right amount of sweetness', 70, 3, '23.jpg'),
(25, 'Barhani', 1, 'Rich in flavours ', 70, 4, '24.jpg'),
(26, 'Zafrani Sharbat', 1, 'Perfect sweetness', 70, 4, '25.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `rc_id` int(10) NOT NULL,
  `rc_title` varchar(60) NOT NULL,
  `rc_post` longtext NOT NULL,
  `rc_us_id` int(10) NOT NULL,
  `rc_time` date NOT NULL DEFAULT current_timestamp(),
  `rc_img` varchar(25) NOT NULL,
  `rc_rating` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`rc_id`, `rc_title`, `rc_post`, `rc_us_id`, `rc_time`, `rc_img`, `rc_rating`) VALUES
(1, 'Chicken Biryani', 'Ingredients of Chicken Biryani\r\n\r\n1 Serving-\r\n3 and 1/4 tablespoon basmati rice\r\nmint leaves as required\r\nsalt As required\r\n1/2 tablespoon refined oil\r\n1/2 green cardamom\r\n1/2 clove\r\n1/2 onion\r\n1/4 teaspoon turmeric\r\n1/4 tablespoon garlic paste\r\n3 and 1/4 tablespoon hung curd\r\n1/2 tablespoon coriander leaves\r\nwater As required\r\n1/4 tablespoon ghee\r\n1/2 cup and 1 and 1/2 tablespoon chicken\r\n1/4 tablespoon garam masala powder\r\n1/4 teaspoon saffron\r\n1/4 tablespoon bay leaf\r\n1/4 black cardamom\r\n1/4 teaspoon cumin seeds\r\n3/4 green chillies\r\n1/4 tablespoon ginger paste\r\n\r\nStep 1 Prepare saffron-kewra water and chop veggies\r\nTo make a delightful chicken biryani dish firstly soak saffron in water to prepare saffron water (One tsp saffron can be soaked in 1/4 cup water). Next, mix kewra drops in water and mix well to make kewra water. Set them aside for later usage. Now chop the onion and coriander leaves and keep them aside.\r\n\r\nStep 2 Saute the onions\r\nMeanwhile, heat refined oil in a deep bottomed pan. Once the oil is hot enough, add cumin seeds, bay leaf, green cardamom, black cardamom, cloves in it, and saute for about a minute. Then, add chopped onion to it and saute until pink. Now, add chicken into it with slit green chillies, turmeric, salt to taste, ginger garlic paste, red chilli powder and green chilli paste. Mix well all the spices and cook for 2-3 minutes. Then, add hung curd into it and give a mix. (Make sure the chicken is washed properly and patted dry before adding it to the dish)\r\n\r\nStep 3 Cook biryani on low heat for 5-6 minutes\r\nTurn the flame to medium again and add garam masala in it along with ginger julienned, coriander and mint leaves. Add kewra water, rose water and saffron water in it. Cook till the chicken is tender. Then add 1 cup cooked rice and spread evenly. Then add saffron water and pour ghee over it. You can now cook the dish without the lid or cover it with a lid to give a dum-effect due to the steam formation.\r\n\r\nStep 4 Serve hot chicken ', 1, '2023-04-09', 'rec1.jpg', 7.5),
(3, 'Orange Carrot Kheer', 'Ingredients of Orange Carrot Kheer\r\n\r\n2 Servings\r\n15 gm oats\r\n50 gm grated carrot\r\n1 teaspoon orange zest\r\n1 teaspoon honey\r\n300 ml skimmed milk\r\n1 green cardamom\r\n5 chopped almonds\r\n\r\nStep 1 Roast the oats\r\nAdd oats to a pan and dry roast them for a few minutes while stirring continuously. Once done, take them out on a plate.\r\n\r\nStep 2 Boil the milk\r\nAdd skimmed milk to a pot and keep it on medium flame. Let it come to a boil.\r\n\r\nStep 3 Add carrots\r\nAdd grated carrots to the boiling milk and lower the flame. Let it cook for 10 minutes.\r\n\r\nStep 4 Add oats\r\nNow add oats to the pot and give a good mix. Let the kheer cook till it thickens.\r\n\r\nStep 5 Add the final ingredients\r\nCrush the green cardamom and take out the seeds. Crush the seeds and add to the oats. Also add honey, orange zest and chopped almonds. Cook for last 2 minutes and switch off the flame.\r\n\r\nStep 6 Ready to be served\r\nYour ​Orange Carrot Kheer is now ready to be served. Enjoy either hot or chilled.', 2, '2023-04-09', 'rec3.jpg', 8.5),
(4, 'Banana Walnut Pancake with Fruit Medley', 'Ingredients of Banana Walnut Pancake with Fruit Medley\r\n\r\n6 Servings\r\n1 large mango\r\n1/4 cup blueberry\r\n2 tablespoon granulated sugar\r\n1 1/3 cup low fat milk\r\n1/2 cup chopped walnuts\r\n1/4 teaspoon salt\r\n1 teaspoon virgin olive oil\r\n1/4 cup strawberry\r\n1 1/2 cup all purpose flour\r\n1 teaspoon baking powder\r\n1 egg\r\n1/2 cup mashed banana\r\nmaple syrup as required\r\n\r\nStep 1 Chop the fruits\r\nPeel the mango and then slice the fruit into chunks. Also cut the strawberries and blueberries into pieces. Mix all the fruits well and set aside.\r\n\r\nStep 2 Mix the dry ingredients\r\nIn a bowl, mix together flour, sugar, baking powder and salt.\r\n\r\nStep 3 Make the batter\r\nIn another bowl, mash the banana well and mix in milk, egg and chopped walnuts. Now add the dry ingredients mixture to this mixture and mix well. If the mixture seems too thick, add little bit of milk.\r\n\r\nStep 4 Make pancakes\r\nHeat griddle or skillet, preferably nonstick, until medium hot. Brush it properly with oil. Pour the batter on the pan, using 1/4 cup per pancake. Cook the pancake for about 2 minutes, then flip it and cook up to 1 minute or until golden in colour. Make more such pancakes with the leftover batter.\r\n\r\nStep 5 Ready to be served\r\nServe the pancakes with the prepared fruit medley and drizzle them with maple syrup or honey, if desired.', 2, '2023-04-09', 'rec4.jpg', 8),
(5, 'Crispy Meatballs', 'Ingredients of Crispy Meatballs\r\n\r\n2 Servings\r\n300 gm chicken\r\n4 green chilli\r\n1 teaspoon ginger paste\r\n1/2 teaspoon paprika powder\r\nwater as required\r\nblack pepper as required\r\n6 cloves garlic\r\n2 handfuls coriander leaves\r\n1 teaspoon lemon juice\r\n1 tablespoon corn flour\r\nsalt as required\r\nrefined oil as required\r\n\r\nStep 1 Boil the chicken\r\nTo make this simple dish, wash, clean and pressure cook the chicken for 2-3 whistles. Once the chicken attains room temperature.\r\n\r\nStep 2 Make a smooth mixture\r\nTake a grinder, add the chicken after shredding it using a knife. Make a mixture with green chilies, coriander leaves, lemon juice, ginger, garlic, paprika, salt and pepper. Make a smooth coarse mixture and mix it with corn flour.\r\n\r\nStep 3 Fry and serve hot\r\nMake small meatballs. In the meantime, take a pan and add oil. Once the oil is hot enough gently slide the meatballs, shallow fry by tossing the sides. Serve hot with a dip or sauce and enjoy.', 2, '2023-04-09', 'rec5.jpg', 7.5);

-- --------------------------------------------------------

--
-- Table structure for table `recipes_comment`
--

CREATE TABLE `recipes_comment` (
  `rc_c_ID` int(10) NOT NULL,
  `rc_c_comment` varchar(300) NOT NULL,
  `rc_c_reply_id` int(11) DEFAULT NULL,
  `rc_c_us_id` int(11) NOT NULL,
  `rc_c_time` date NOT NULL DEFAULT current_timestamp(),
  `rc_c_instruction` int(10) NOT NULL,
  `rc_c_taste` int(10) NOT NULL,
  `rc_c_rc_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipes_comment`
--

INSERT INTO `recipes_comment` (`rc_c_ID`, `rc_c_comment`, `rc_c_reply_id`, `rc_c_us_id`, `rc_c_time`, `rc_c_instruction`, `rc_c_taste`, `rc_c_rc_id`) VALUES
(1, 'Good Recipe', NULL, 1, '2023-04-09', 7, 8, 4),
(2, 'Well instructed', NULL, 2, '2023-04-09', 9, 7, 4),
(3, 'good', NULL, 1, '2023-04-09', 8, 8, 2),
(4, 'good ', NULL, 1, '2023-04-09', 7, 7, 4);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `r_name` varchar(50) NOT NULL,
  `r_pic` varchar(25) NOT NULL,
  `r_id` int(25) NOT NULL,
  `r_address` varchar(100) NOT NULL,
  `r_email` varchar(50) DEFAULT NULL,
  `r_rating` double NOT NULL,
  `r_food_type` varchar(20) NOT NULL,
  `r_us_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`r_name`, `r_pic`, `r_id`, `r_address`, `r_email`, `r_rating`, `r_food_type`, `r_us_id`) VALUES
('Sultan Dine', 'sultandine.jpg', 1, '1st floor, Samsuddin Mansion, House: 41 Road: 52, Dhaka 1212', '01844-505930', 7.5, 'Bengali', 3),
('Kacchi Bhai', 'kacchibhai.jpg', 2, 'House No: 2/A, Section- 6, Block- A, Road No: 4, Dhaka 1216', '01844-505931', 7, 'Bengali', 1),
(' Pizza hut', 'pizzahut.jpg', 3, 'Sony Cinema Bhaban, Ist Floor, Plot-1, Block-D,Sector-02, Mirpur, Dhaka-1216, Dhaka 1230', '09613-999333', 8, 'Fast Food', 4),
('Yum cha', 'yumcha.jpg', 4, 'Dhanmondi Level 5, Hs 42 & 43, 9/A Satmasjid Road, Dhaka 1209', '01730-944216', 6.9, 'Chinese', 5),
('Cooper\'s', 'coopers.jpg', 5, 'Zoo Road, 2 Near Sony Cinema Hall, Dhaka 1216', '01730-009510', 8, 'Dessert', 6),
('Chillox', 'chillox.jpg', 6, 'Block-D, Plot No, 2nd Floor, Plot No-76, Zoo Road, Block-D, Mirpur-2 East Side Of Idgah Ground Dhaka', '01810-035197', 8.5, 'Fast Food', 7),
('Sama Rkk', 'rec1.jpg', 7, ',kkl', 'mjklji', 0, 'sama', 3),
('ssfsf', 'bg2.jpg', 8, 'sfsfsf', 'sfsf', 0, 'sfsf', 4);

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

CREATE TABLE `review_table` (
  `c_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `food_quality` int(11) NOT NULL,
  `service` int(11) NOT NULL,
  `punctuality` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `title_review` varchar(50) NOT NULL,
  `review` varchar(500) NOT NULL,
  `c_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review_table`
--

INSERT INTO `review_table` (`c_id`, `user_id`, `r_id`, `food_quality`, `service`, `punctuality`, `price`, `title_review`, `review`, `c_time`) VALUES
(18, 1, 2, 7, 8, 7, 6, 'Good ', 'I like the test and enjoyable', '2023-04-02 02:09:53'),
(19, 2, 2, 7, 8, 8, 7, 'Not bad', 'Amr valoi lagse but not worth it', '2023-04-02 02:11:09'),
(29, 1, 2, 7, 7, 4, 3, 'valo na', 'kharap', '2023-04-02 09:24:07'),
(30, 1, 2, 7, 5, 9, 8, 'good', 'good', '2023-04-02 09:55:28'),
(31, 1, 2, 6, 3, 7, 4, 'good', '', '2023-04-08 21:49:01'),
(32, 1, 2, 6, 6, 5, 3, 'good', '', '2023-04-09 10:01:05');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `us_name` varchar(25) NOT NULL,
  `us_pass` varchar(25) NOT NULL,
  `us_email` varchar(25) DEFAULT NULL,
  `us_address` varchar(25) DEFAULT NULL,
  `us_id` int(25) NOT NULL,
  `us_type` int(25) NOT NULL,
  `us_pic` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`us_name`, `us_pass`, `us_email`, `us_address`, `us_id`, `us_type`, `us_pic`) VALUES
('Osman Goni', '12345', 'Osmangoni25524@gmail.com', 'mirpur 14', 1, 2, '1us.jpg'),
('Arka', '12345', 'arka@gmail.com', 'United States', 2, 1, '2us.jpg'),
('sama', '12345', 'sama@gmail.com', NULL, 3, 2, ''),
('dd', '12345', 'dd@gmail.com', NULL, 4, 2, ''),
('sm', '12345', 'sm@gmail.com', NULL, 5, 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_comment`
--
ALTER TABLE `blog_comment`
  ADD PRIMARY KEY (`bgc_id`);

--
-- Indexes for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD PRIMARY KEY (`bg_id`);

--
-- Indexes for table `fooddet`
--
ALTER TABLE `fooddet`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`rc_id`);

--
-- Indexes for table `recipes_comment`
--
ALTER TABLE `recipes_comment`
  ADD PRIMARY KEY (`rc_c_ID`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `review_table`
--
ALTER TABLE `review_table`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`us_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_comment`
--
ALTER TABLE `blog_comment`
  MODIFY `bgc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `bg_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `fooddet`
--
ALTER TABLE `fooddet`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `rc_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `recipes_comment`
--
ALTER TABLE `recipes_comment`
  MODIFY `rc_c_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `r_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `review_table`
--
ALTER TABLE `review_table`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `us_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
