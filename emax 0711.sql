-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2017 at 02:22 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emax`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `activityId` int(10) NOT NULL,
  `ipAddress` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL,
  `logTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `userId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `answerId` int(10) NOT NULL,
  `questionId` int(10) NOT NULL,
  `answer` varchar(500) NOT NULL,
  `answerTrue` varchar(10) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `answer_user`
--

CREATE TABLE `answer_user` (
  `answer_userId` int(10) NOT NULL,
  `form_userId` int(10) NOT NULL,
  `answerId` int(10) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auction`
--

CREATE TABLE `auction` (
  `auctionId` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(10) NOT NULL,
  `auction_categoryId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auction_category`
--

CREATE TABLE `auction_category` (
  `auction_categoryId` int(10) NOT NULL,
  `title` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

CREATE TABLE `bid` (
  `bidId` int(10) NOT NULL,
  `price` float NOT NULL,
  `userId` int(10) NOT NULL,
  `itemId` int(10) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `competition`
--

CREATE TABLE `competition` (
  `competitionId` int(10) NOT NULL,
  `title` varchar(500) NOT NULL,
  `display` varchar(10) NOT NULL,
  `startDate` datetime NOT NULL,
  `endDate` datetime NOT NULL,
  `status` varchar(10) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `formId` int(10) NOT NULL,
  `title` varchar(500) NOT NULL,
  `competitionId` int(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `form_user`
--

CREATE TABLE `form_user` (
  `form_userId` int(10) NOT NULL,
  `formId` int(10) NOT NULL,
  `userId` int(10) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `galleryId` int(10) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `eventName` varchar(500) NOT NULL,
  `imageLink` varchar(1000) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `imageId` int(10) NOT NULL,
  `userId` int(10) NOT NULL,
  `imageLink` varchar(1000) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `galleryId` int(10) NOT NULL,
  `reportStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `image_comment`
--

CREATE TABLE `image_comment` (
  `image_commentId` int(10) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `imageId` int(10) NOT NULL,
  `userId` int(10) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reportStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `itemId` int(10) NOT NULL,
  `name` varchar(500) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `startingPrice` int(10) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `auctionId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `messageId` int(10) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `createdOn` datetime NOT NULL,
  `reportStatus` varchar(10) NOT NULL,
  `userId` int(10) NOT NULL,
  `threadId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notificationId` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `questionId` int(10) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `questionNo` int(1) NOT NULL,
  `formId` int(10) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `response`
--

CREATE TABLE `response` (
  `responseId` int(10) NOT NULL,
  `messageId` int(10) NOT NULL,
  `userId` int(10) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reportStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

CREATE TABLE `thread` (
  `topicId` int(10) NOT NULL,
  `thread_subcategoryId` int(10) NOT NULL,
  `userId` int(10) NOT NULL,
  `title` varchar(500) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `view` int(10) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `thread_category`
--

CREATE TABLE `thread_category` (
  `thread_categoryId` int(10) NOT NULL,
  `title` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `thread_subcategory`
--

CREATE TABLE `thread_subcategory` (
  `therad_subCategoryId` int(10) NOT NULL,
  `thread_categoryId` int(10) NOT NULL,
  `title` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(10) NOT NULL,
  `username` varchar(500) NOT NULL,
  `passwordHash` varchar(500) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `birthDate` date DEFAULT NULL,
  `emailAddress` varchar(500) NOT NULL,
  `status` varchar(10) DEFAULT 'Active',
  `role` varchar(10) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `imageName` varchar(1000) NOT NULL,
  `imageContent` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `username`, `passwordHash`, `fullName`, `birthDate`, `emailAddress`, `status`, `role`, `createdOn`, `imageName`, `imageContent`) VALUES
(1, 'jerry1147', '$2y$12$UVChj1mcwisqlyPJWWOkMu0gA4PjRynfn7lLNCxHh6zlq.Spg0loG', 'Jerry Lee', '1990-08-01', 'jerry@gmail.com', 'Active', 'Admin', '2017-11-05 15:50:34', 'img_avatar2.png', 0x89504e470d0a1a0a5c305c305c300d494844525c305c3001f35c305c3001f208035c305c305c30c88dd7dc5c305c305c301974455874536f6674776172655c3041646f626520496d616765526561647971c9653c5c305c300180504c5445719d45ffffff74a0468cc1516b954284b64e88bc4f587d387faf4b86b94e45454579a6487aa84987ba4f82b34cb1a08580b14cf2d0d1e7d7abcdd1958e6c31efe7d5ddc9adf0e8d86e9943668248d959678d8573f5e8c986994d9e785085532193a46a7baa49727533948839648c3eebafb367635bacc674e28690f8f3ebbfae91586747787365975c5c2576a34787a345a79479bbc989a26328db6672e8a29cf8ede8afb7808a555c22f3e1b374994cede2aba16b2cc55756779153faf6f2fde9bd6890404b5443fdfbf8e9dfd1db878893b864df7a8255703e749649a8662afeeabb8dc2518e57234e623e9b54337da84c9ebf668bc050525d4689b6528abe506d8d49789f4c8bbf5083b54d9d793283b44d8abf507dac4a81b24c7ead4a82ae4c89be5082b44d8abe4f84b54d77a44889bd4f4d4e498c5d2ef7f4f15c5c5953cfbfa2fae9c1f2ece085b74ef7dfe2e5979d85b153a8553e90532a8cba548ebd5583b44ededb9f76602890b95982b14dddd5c28cb45b8ab75395bf5b7e672a82b34da25f704f5c305c301f404944415478daecddfb431b577607f0abd6f6b595da988720026351037e5c302a601b90436cc0648da592c5650305d7364dd215e6656f76374e4a93f5bf5e0904d268e6cedcf73d67b8e7c7b67175e7c3f9dec7cc48e4dfd352ffcc55ff9154ff19a8ff3aabffaed777a1faa1567faed715765d67d5b5c83a8aaacbf5faf1c7add67a7d56dfd7ea73bd6e34eaed59dd6cafabf55c229efca291a7c6dc937393a7c5dc93f393a7c4dc930b90a7c3dc938b90a7c2dc930b91a7c1dc938b91a7c0dc930b92e337f7e4a2e4e8cd3db930f93be2c92f1a3972734f2e418edbdc93cb90a336f7e452e498cd3db91c3962734f2e498ed7dc93cb92a335f7e4d2e458cd3db93c3952734fae408ed3dc93ab90a334f7e44ae418cd3db91a3942734fae488ecfdc93ab92a333f7e4cae4d8cc3db93a3932734fae81fc0df1e4178d1c95b95c27d7428ec9dc93eb214764eec93591e331f7e4bac8d1987b726de458cc3db93e7224e69e5c5c23390e734fae931c85b95c27d74a8ec1dc93eb254760eec93593c337f7e4bac9c19b7b72ede4ff4a3cf94523076eeec90d90c336f7e426c8419b7b7223e490cd3db91972c0e69edc10395c5c734f6e8a1cacb95c2737460ed5dc939b23076aeec90d92c334f7e426c9419a7b72a3e410cd3db9597280e69edc30393c734f6e9a1c9cb95c27374e0ecddc939b5c270766eec92d90c332f7e436c8ff8578f28b460ec9dc93db210764eec92d91c331f7e4b6c8c1987b726be450cc3db93d7220e69edc5c22390c734f6e931c84b95c27b74a0ec1dc93db250760eec92d93bb37f7e4b6c99d9b7b72ebe4aecd3db97d72c7e69edc01f917c4935f3472a7e69edc09b94b734fee86dca1b95c277744eecedc93bb5c227766ee98fce7cd465d407257e64ec8d73637f2e3e3e3d56c5b556bffc37c7e73f3e78b41eec8dc36f9ce93fcf85236b96af62fbf483bb91b73abe46b1be1ce4e90cf6f7c9162725c27e6f6c82f0b7b37f33eff24a5e42ecc6d91ef6cac67d56a3cff450ac91d985b5c22df18cfeaa8a595976923b76f6e857c5c275fcd6aabeacac6ffa689dcbab90df2cd95ace6aaaebc4c0fb96d730be49be3591355cdafa584dcb2b979f21d33e2a74bba8d5490db35374e7e79256bb41acd8e9bdcaab971f28d6ad678adac615c27b7696e9adc64ac075c22fe096e728be6a6c96d3479a3d6373193db33374c7e793c6bb356d6f092ff0f4907f9da52d672e577b092db32374c6e31d79b6bf80da4e496cccd926f6e649dd4fa1a4a723be606c99fe4d7b3ceaa9ac7486ec5dc18f993956ad66dadafe123b7616e88fc28bf94755fd597e8c82d989b213fca57b3306a051bb9797323e470c4ebf97e1517b9717323e44f96b2906a7d0d15b9697313e447e3596055ddc4446ed8dc04f966359b058b8e81dcacb909f27c166235d051901b3537400e2fd75b177238c8ff8de05c225fcf42ad7534e406cd0d90af55b3706b050bb939f38b469ecd6e202137667ef1c8b3d5351ce4a6cc4dcce5c0c96b533a0e7243e6176bf9d67c760605b9197313fbf271f8e4d9ea3b0ce446cc2fce514ce831680ce426cc8d1cb86671d41304e406cc8ddc56a95c22315f4740aedfdcc8cdd3f12c967a099f5c5cbbb999fbe568c8eb8d0e9dfc9f08027234c97ed2e8e0c9359b9b79f62d8f883cbb0e9e5c5cafb919f2b52caa7a099d5c5cabb9a1879ac77199af405c27d7696e887c338bacbe5c304eaed1dcd4db2ae3d8ccf3c0c9f5999b5c2247d7e6d925e0e4dacc8dbd93b682ce3cbb019b5c5c97b931f21d7ce4d971d8e49acccdbd6c9c47685e7d039a5c5c8fb9c1f7cb97109a9f843b5c5c722de606c9373192d7c31d30b90e73935f1cb282d23c0b9a5c5c83b9d1ef8aa9e234df804cae6e6e941c67b4d7c21d32b9b2b9d96f84ca23355f824cae6a6ef87bdfd6919a679f5c3026573437fd859e58c9b379c0e46ae6a6bfb6f7095af32502975c5cc9dcf8f7b1e7d19a6729014bae626efe8736c6f19aaf34d001922b985bf8399d2a5ef36fe9093a447279730be43b78c9b34bb48e0e925c5cdadccaefa42136afd23a3a487259732bbf86b881d8bc36a1b7a183219734b7f39ba779f4e62de880c8095c5cf2efc6319b7f4b03e890c8095c5c72dce64bb4151d1439814bfedd5216fb5c22ee0c1d1639814bfe5d1675d1263a307202971cb9f94a131d1839814b8edcfcdb7373fa252c720297fc726accdbd05d9313b0e45a8ee1aa0363ae0eed972803dd3939014baec1fcee58a952290d5c30306f41774f4ec0922b9b0fec574e6bffaedb857b5c301d5c3039014bae66be3755aa346bc2bd79031d0239014bae623e3156095469cfe966ad890e829c802597dfab9d877ab37aabeecd6be830c8095c5c7239f3ea405725a2c6dc6ed61ae830c8095c5c7219f36a601a6fad295c30e6017477e4042ef90f1ac56b657dcbb64ee3d01d9213b8e43fe8147780be4463d05d9213b8e43f6815b78f1e69de40774a4ee0920b990f248adb47a74c74b7e4042ef99ff99f9399e8ad70d55c305c30f31aba637202979cdbbcda51e1ad015c30e6f44bc7e4042e39aff944a95201894eb9d1ed9213b8e47ce6024d6e7b9fbec28b6e999cc025e732bfdb5b11ac315c30e64174dbe4042ef99571cdb97e766bb5eadebc15dd3a39814b7e25f93d96818a4cf546dd4faf4e546d9a37d1ed9313b8e4c9e672e4954a29ea7e7a757fc2a6f919ba037202973cd15c5c969cb17cbf5beaa85a343f4577414ee0925c2799df2dc99b57a21e8dbc5be9d2daeadfd244745c27e4042e798279b5aba2525193fa80dead5c5c9239fdd20d39814b9e60de5151aba8497dacf6b7b067cfbc0ddd1639814b7e25f681b8898a727584ffd55ec602cf90795c30dd1a39814b1e6fdeab6e1ed1d37ba5e8bf0553e62de8d6c8bf2470c963cd072a3a2adcd303d17f0bc6cccfd1ed91479943218f35efaae8a9504fef3337f066cc1be816c923ccc190c7990f5474557b4fef9592efbfede9343f41b7491e3687437ee567f36d5e09bfcf36c5dec0378fecaa1ace645ad0ad9287cc01915fb96272d1ce3e9fe94a7e0d628ceb1d095e737ac92a79bb392872b6f99856f34ad7dda879a37437666ae141e7368f423747de660e8b9c69be57d15d03511307fb2de6da07d8d7691e4637481e3407467ec5fc0a2ef2a6fa40dca9cdf99fc5984ef3767493e4017368e4cc87267af59b07b6675db1b762ce2697019de64174a3e4ade6e0c859e67b1523d51195238ce399019e179c299544374bde620e8f9c653e60c6bce95b4d7abee274e3b0afd5bc896e98bc690e909c65be6fc8bcb9681b4b7c3c9ae7c1692a876e9afcdc1c5c2239eb666ac55c5c35e6ef81c45c27654fa6fc5255abf929ba71f2337390e40cf30983e68d4729aa89df52b19ffcdcf4129541374fde308749ce309f3269dec8f7b69d41f878a6f1c4c69e5e737ac902f9a93950f22b1b76a7f396f57b47d2439353c92f48ac53457443e45c27e650c91937d64a86cdeb513e9174287f16367bcab7d598e8a6c8ebe660c9af6f5adc9d07a37c2fe9a1c989e437a1e4cccfd18d91d7cce1925fff6c7d09771ee549375dcf3fc59e9e63b810ba39f22f0960f2eb7fb7bf84e37da8665c22f93d5759f3137483e49ce66ec85f7d55199b307d1f55f2a19a73f32ec60b17535343541edd24399fb923f252e45d8e7d87e6cd7c9f88fd2ed98993231b057493e45c5ce68e82fdabe8039152c56935fe065c27624ee9aa8d282a6d6840d74fce63ee86fcfa34e314ace2b84e1faa695955b407d1ddf35bb1dd5419dd5c303987b923f2bf37fb793ff85c22a1f39a0a9a0fb05f9ddc504537419e6cee88fcfa3dc677c04cb837afecefb59a07c3bdda3af7cc52357423e489e6aec8af7f6abdc8776199574a812f88af325f9deca24ae866c893cc9d915f0f361688ed39ab26d84fde3f554237439e60ee8efc1eeb160740f331f67263889a405723bf4460923757eded5c271f5c30cdbbd8cf6dcd5203e88ae4b1e60ec9dbcd9b8d0ed0bc75b9d176e3bd9bea4757258f3377491e5c5cc2b5e6e73e40f301e64dbf4f543bba32798cb953f2907905b2f918fb915c5caa1b5d9d9c6dee963c6c3e01d8bcc47edb826a46d740ce34774c1e361f036c7e7e133d7c48a86e4e173593b3cc5d935f0ff75215b0f904f3bbaca856742de40c73e7e4d7bf622d94409a4f31bf0a81ea44d7431e6dee9e3c9ced67e10ed27c9f792e4c35a26b5c228f3407401e61de9834419a97988ff0507de8bac8a3cc219047994fc1353ffd7b8c7a5c22976a43d7461e610e823ccabc04d87c827144f8896a43d7461e3687411e3a7b3d5fc5c1349f627c995537b585ce4f1e3207421e69de05d7bc8371677f9a5a4217206f378742de7e2fb599a030cdf7199f6c96da4117216f3307437efd77d6959d0269dec578506f885a41175c220f9ac3218f38886bcce830cd2b8c772d9e521be862e4017348e4d73e45b65315aa7935fad5494a2da00b92b79a835c22bfd6cd581f03359f88fcd9886e6a015d94bcc51c16f9b57b8c4752a09a47be5e334bcda30b9337cd81915ffb3dfadaf64ec0348f7ea36a881a47175c273f3787467eedda575c22171768e5a9697409f2337378e48c091d557da2d430ba0c79c31c20396b42c754b3d430ba14f9a93944f26bd74ae8cd9f52b3e872e45c27e630c9f1877b17a546d125c9ebe640c9f187fb2c358a2e4b5e33874a8e3fdc37a8497469f24b042e39f670efa6d415fa25357377e4ac63192c35445da15f523377487e2dfa3e0b962a51ea08fd929ab95372dcabb859ea08fd929ab95b72e6f92b8a36cf5337e897d4cc5d93636e740b6d5eab1109f2450299fce8e8936f7331740ef238735c30e447affca25d089d873cc61c0239da46efa2d4053a1739db1c06f9d1df701ec60d5217e87ce44c7320e44747f7fc028e179d939c650e86fce808e109ec5c274a1da0f39233cc01911ffd0ddd26bdb4411da07393479b435c223f3afa1ddb94fe9452fbe8fce491e6b0c86b1b365c5ce843d4418df09347994323afa1238af79213f264f4c5387378e4b5391dcd36fdd3534a21a22fc69943243f3aba7c0f45ab9766a9bb1ae1240f990325afd5ab69e0cdde353b449dd6081f79bb395c5cf2cb3ffe08fc786696baae112ef23673d0e45bbffaf5ba14fa629c396cf2ad2dd8733aa530d117e3cca1936f813e86eda630d117e3ccc1936fbdf2d12e8cbe18670e9f7c6b0bf281dc068588be18678e811c72b877510a107d31ce1c05f916e0ddda2c0588be18678e837ceb377f334d047d31ce1c09f9d6d65c271fedfce88b71e668c8e186fb2c0587be18678e87fcf56f3eda79d117e3cc1191bf7efdc9473b5c277a9c392af2d7f77cb42ba3135c5ce4af7f2bf96857455c27b8c85fbfeef6d1ae883e429091c30cf7218a077d24608e81fcf5f7106fa86e5034e82301731ce4df030cf76e4ab1a08f04cc91907fffab8f7679f491803916f2ef3f83dba2972845823e1230c743fe19dc2a6e965c22411f0998235c22fffcb9e4577052e823017354e49fbbfd0a4e067d24608e8bfcc6af7e055c27813e123047467ee306a8555c5c17a518d04702e6e8c86fdcf32b3851f49180393ef21b37209dc5e529367482911c52a34f538a0d9d6024bff1a792dfa8c9a3138ce46fdf4efb8d9a3c3a4149fef64f50cc07293e748292fceddb6edfe6d2e8045c27f95b20e7324314213ac1490ea4d1bb2845884e9092c368f4218a119d2025bf79b3dbb7b9243ac14a7ef357dfe692e8042b398046c7d8e675748296fce6b46f73b95c2268c99d9b7753b4e658c96fbabed13288d61c2df9cd57becd75996321776dbe911e7334e48ecd67696accf190bbdda097f2a93147447ef3a66f731de6a8c8bdb90e735c5ce44ecd8752628e8cfca6df9c2b9b6323bffa9537573447477ef593375733c747eecd15cd11927b7335738ce4de5c5cc91c25f9d56e6f2e6f8e93fceab4379736474aeecde5cdb1927b736973b4e4de5c5cd61c2fb9375730474aeecde5cdb1925f7de5cd25cdd1927b735973bce4efbcb982394e726fae608e94dc9bcb9b6325f7e6d2e668c9bdb9ac395e726faedf1c3af9bb77de5c5cb3397c726faed91c01b937d76b8e81dc9b6b354740fe7fd3d30beecca7679fa6cc1c3ef95fba73b9dc813bf3dafff7de8d349923203fce3937cf2d3f4d8f3982603f21776d9e5bcea7c51c017977ceb1f9c2e907384e893902f27b39d7e6078d4f309d0a7344e4b95bcecd51a2137ce47f5806649e1b426f8e8a1c8439427482981c86393e7482983c9773667e2b87189d602677b6705f087c8adc2c5a737ce4ce1afd56dbc798466a8e91dc51a32fb47f0c5c5ce80411f9ab10792eb75c30a1cdebe8797ce6988e625aeb160cf25c5cee388fcd1c2bb90bf483e80f82079d60219fce31eac0f964de2834b75609ae3b69eed117d81f040b3ac1f3540c08f485b80f82e47486e0792a06027a3c3992d3198280fc0f09e4f6d093c873b97d042b3982807c39f14a5b423f48fe201896ef043cf93d0e723b5b361e720c2b39029d7c3ac757b7169c1cc5605c5cc911e0e4dd39ee329bef0bb7f83fc92c467328e47f39ce09d42de7b97e56bd7974e630c8d75edeb92d74a50de6fb2db10f923bbe83cc1c02f9e6f03f0a85c2ed43c16b7d5c30a0c94fcc0b855fee2032774ebe367c67b7705acffb72ce5b7de1564ec6bc56bffc82c4dc31f9e449839f55e681f0e5bee5bcc973b90763e7235c30d8ee0412f9e4e0f06e2150c79943f12b7ee0b8c9738799a9d641fcf28f3ba0cd9d914f0e6fcf97cbe562d0bc37239cee5a035e463cd7f73cd31318c55c5cb93cdf7307aab913f23783c3dbe546b5998f6524d25d9bba4cacd7933d73181cc5eae9d86aee77e099db5c276fb47799613e95c9c8a4bb96803fb825477e98c9f40647516c19205c3078e28e7c72b8d9dee7f53078b56ed7cc65d25d5d5d563cd757fbc81d6cf393ea710a4f5c5c90ef44724799176a17502eddeb017f6077e9765acf6a9ff87670100f2387ea0c9e58269f6c0ff3f66a335fce48a7bbbcfa81bc786ea6fe79db0611335c5c17514fec91d77662f1dc51e6fb198574974b7815f19364cfec472ee1c0c0131be431591eaad5e0f5eac8a8a4fba9fa8235f1d3640feece23a6f3b2dbac5c2786c977b89a9bbd70bf7d622e9fee623bb70535f0fa36ad5ebb3cd3b9bb965c2726c95c278785b8a3cc0bef33aae9ce3db11fa88ad7b76999d04ead207c0d0c9fdf1073e493e2e0110bf7e38c7abaf334fbc2414ebd9e675c22a27d55e632f498363741beb35d96ab42d484ae9aee49eacaa1de92ecedd15e94bb0e778c9a9b20976bf27acd454ee8cae91e7bcf4d478f9f257b28da1f4a5e881e83e626c807cbd2153da1eb4877d6d64d4f93d76fad4445fb9cf495e831666e827cb8accf7c3fa32fdd23d1f53479639b96c9bcd713ed5c278b7843e6d0c8438bb8a98cce740fa3eb5c226f247bfb818c74b49b435c27d0c84313faee99b9a6746f435fd044de77f6296feb8a7663e8041c7928dc8f337ad33df87d2439bdc91e3a6b2faa5d8c1e4be6ce966fd1e61d19cde97e4bf54118f6362db482538a7643e844fb264d953c34a1f764b4a47b5fbd131ff405d3fd34d91fd456dccf0eb5247bfb0a6e4ef972dcb160ee6a5fce9cd05bc25d21dd4f1b71a6b3b777f4f179f5f6f62e9fefb19e29a4c8f3b30f38a637da8da013cd07aedbea630c85fb544639dd973b471fdfbfdf1f598fee7f1cedac87c0f343e5646f7bf8513dda4dace3885ef2610de4a1706faedce5d2bdf3fea3fec47af1f883748c1c9e7fbc7dfd6dae7f4a5c277a6fab94b5d41ceb58462eddeff7f3d5a35139f4bef3646fdfa8e96873fde94e7492efcceb316f0ff7db19a5747fd1cf8b3ef3b15329d98f0bba5770a765d05c5cf57ef9b0a621b6877be15025dd97fb05ea51a742b287dabca8e982f41833577e44a2acabe6985b748974ffa65f087d59769b66aecd35a73bd1f820d4bcb62116635671a2e9feb85fac5e481ec0196c73cd6b77a28f7c58db08c3e1deba8a134bf7de7ed17a2c9beced6dae6905a7bdd18936f2497d6d1e7afab5f52c4e2cdd971f099bf7f7ca257b686f5ed47841ca06ccd59f701dd639c250a31f4ba6fb37e2e442537a4bb2ef1b6c73adcb38a28b7cb2acb5e662b66b02e93eda2f531f25b66999f746db5c5c67ba135daf2e6ceb1d6131b6d179d35d26d945d2bd750f3966b4cd75363ad144aeb9cdc3e13e959148f76fe4c8b9d3fd79cb5fe1aed936d7d8e844d30b4adbba47588c3b97e14cf7d17ed9fa289aeca1fbe6badb5c5c63a3133de4badb3ca2d183333a4fbacb267bbd3a05933db44fd3dee6fa1a9de8790d715bff081366748e74ff284fce7332d3726b25bc4f9bd37f41b4353ad1423e696084498d9e98ee9dfd2af55828d9c78c5c27bbc6465c275a5e36de3631c284464f4cf7174ae689cbb8d6645f6effa8ab262e88ae465c273ac85c278d8c30a9d113d27db45fad3ef21fc0850edacdb4b9ae465c273abe4562dbcc088bb1a7ee09e9aeb280e359c63d8b4bf6a2990ba2a9d18906f24943230c35faee7bfe747fac4a1ebf8c6b9dcc97dbb7e67386da5c5cd3a93bd1f05d31c3a646186af431ee74576ff3d8d3385c27c9aeabd1893af98eb111861abded602626ddefab93f73f924cf6d5b2b932602ef38d50c3e646584c58c631d3bdb35f478d72257bc15e9beb59c511f52f019b2f5b6cf47dbe747fa1c59cb55f6b4d9bd0ed34630b386d0fcc1065f24193432c262de31e687a3846e46026705c30376533d9f5343a51feaabf6da3435c5c8dbfbfc648773d6ddeff68b42f29d9f7ad26bb9e551c51fe7647b3430ca77b6f72ba6b69f3471f3ba363e4306e9b6636d9f5ace288ea77b80e1b1ea24cbaabb7f9a3c79da7ff7a5f6cb2875c27f355d3e41a1a9da87e6defbce1213e9c134ef799ce5195adda8b8f9d33317f51cfe22673d3c9aea5d1895c22f9a0f1218aa7fb49237ea8c10b9fcbbcb87ffa866a4bf5893c0e65835c5c7d154714bf9c7bdbfc1843cbb8ddf893999996ff5567cc3bc8e103f64c443d631fc0f516ac4fe65ac29da8914f5a1863b8d1e34f669e47c8cdf0cce199c8ea63257b78fdb65ab6525acce5bf827fb8ec043deedc7d26528ea3d7ef479b3f633ddb7cdb49b26b0877a2f6431bf35606194af7f6c75c271e24b4792de4394e5a33898d7e187767c516b9f2591c515c229fb433c8f0da9d7d5775862197dce81f18ffe583c8bfa7293793b98e465c274a3fa7336c699089537a33dd9f33e43a25a7f3d6467f10b7645fb546aeba8a234abfa0346f6b94a19399e02be9cd663c64ca2535fa47e67f19f16f878f5c5ce71eda332f6b3097251fb437cab9a43b6c87e11393b6b5d80b899d5a6ba3b71cc0857769059be48ae14e547e5c276dd8de28c3e9bebb1c91eeec36cf643ec84de7e78dfe20669766975c5c31dc89caaf21ce979da2bf0fc33c8b31ef94eef34cf0cf2982bc58b65b8ae6f2e4835687199ed26fbf6f4ff7be8cbcf968cc7f3ad3fa4f0320570b77a2f09ba7c376c719dea5b7bdab7a7818d7e69951d9355c5cf09f8e388b59b54dae16ee44e1676ee7ed8e33bc4b0fdd62cb2898dfe7fb575c22c8e71e5a37570a775c224f3e687b9ce129bd7df1ae62de8f895c5c29dc89fc8f590f9771a15c276dd067e4c80b2ec895c29dc8ff7ef9bcfd9186d771ed37d315cc3b11912b853b91ffc97a17232d266dd363ea45bffcc21d1cb94ab813597207d11ebd78e746efef975fb833c98b8ec855c29dc892bb88f6e8c53b2fbae4fdf3e6bebc0710b94ab81359f24947438d58c7f1a13f4bbc999a40be0b8a5c5c21dc8924b9a36857404f7e6a620613b942b81349721b0f3fea45ef947b06f2ec4e1a347285a7658824f98ec3d1caa1774a3f1c1579bfdc35b942b8133972fb877009dbf4dd63d563b8b885fb184072257319f2abdb6560e8895c2772a3fdd20bf72988e4f2e14ee4c8afce97b1a1733cedccbf2d07402ebf5b2372e483aec71b853ea66a1eb9705f864a2e1dee448afcea70195c22fa94a279d4c2fd78172ab9f46e8d48913b9ece99e86d4fce081dc3452fdca3566fceced835853b915c229f8430e248f44315f3fb5c5cab3730e4b2e14e64c8dd4fe74c74f6469de755e4f6771fa3a6f23930e44ae6a2e45c30a673d6e10c73f9cef5ed611c53392072d9dd1a912177bd538b479f9237ff903895af025c22979dd0890cf924984147a2474eea5c5ce69d09bb72200b76c5705c2712e450a29d713f3dfa2096ebabbd47e3731d1ab9e46e8d489043d8a9c5a3471ccf7099df8fcd7570e492133a912007339db397efe19d3ad78fb3bc8859af03daa3294ee844827c10d8c023d1777b858fe1ce16eebd91b93e07905c5c6e425c27e2e490a6f318f442c77b71f3dac2fdfd5474ae4324979bd0893839a8e93c66f95eb8dd7a3ec3f75d719d99e31e1c53b942b81371f2ab5c30871ebd926b5dca717e91734701cb542e1fee449c7c10e2d81f16135a9d8bfcebbf16d04ce54ae682e4f0a6f3b849fdacd53ff090ff54403495cb4fe84498fcdd36d0e1474fea859e63ce63b8afe70aa8a672e9099d0893bf033b7cc6a45e987acf61fef51f0bd8725d36dc8930f920e00bc0c8f7ddfdc463b89f187f2fabc0c915ccf9c9df0d97f1a1176e7f23b376839eeb92133a1125073b9dc7e77be15c27f158079feb92133a11257f370ffc1ab05a7dee5c27c15807bd5e5709775c224a3e09fe5c2230d6ef85c25fbf1689f5020a7149732172d8d379037d955b9d2dbe8a845c5c62425c2782e418ccd9f95e28fcf16b9e891cc3e24d7e425c2782e4e0a7f384a55c5c8bfad73f31ff6fe61ee221170f775c22483e89e54ab05bfd543d461c5393ab987392833e91e16ef5dabc1e238eaac96526745c22468e633a4f6ef5425a9abc2cf1501c1123077e5c2223d0ea29697299451c11237f87ec7214d3dee432133a11231fc4763dd87b75cc7b72b5099d0891a39ace938ee5d2d1e452e65c22e4b8a6f333f4629a9b5c5c62425c2742e4484e6424027e0eafb8f0844e84c8d7b05e95624a635d8b792c39be251c5fc0af3e444d2e3aa11311728c4bb8e4809f432e2e7c2a4344c8512ee1928e688a65fca5609e44fe661ef9b5295c227d1646ef844e44c85c27d15f9cb6697d3515e20ae689e46f065370795ad4e7525c222eba882302e46f86537181ced48be5f4949c3907f99bed945c5ca1fa12bef8b07cd1cd79c8d12fe15ad453252e38a11301f2c9b2af344ce8849f3c154b386fde30e7234fc9122e9d256ace499e9a255c5c1aeb8e98392f798a967017dd9c9bdc2fe15232a1136e72bf844ba7791cb95fc2a5651147b8c9fd122e2d133ae126f74bb8b498ffbf5c30035c30aab80a21358a36155c305c305c305c3049454e44ae426082);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`activityId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answerId`),
  ADD KEY `questionId` (`questionId`);

--
-- Indexes for table `answer_user`
--
ALTER TABLE `answer_user`
  ADD PRIMARY KEY (`answer_userId`);

--
-- Indexes for table `auction`
--
ALTER TABLE `auction`
  ADD PRIMARY KEY (`auctionId`);

--
-- Indexes for table `auction_category`
--
ALTER TABLE `auction_category`
  ADD PRIMARY KEY (`auction_categoryId`);

--
-- Indexes for table `bid`
--
ALTER TABLE `bid`
  ADD PRIMARY KEY (`bidId`),
  ADD KEY `auctionId` (`itemId`);

--
-- Indexes for table `competition`
--
ALTER TABLE `competition`
  ADD PRIMARY KEY (`competitionId`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`formId`),
  ADD KEY `competitionId` (`competitionId`) USING BTREE;

--
-- Indexes for table `form_user`
--
ALTER TABLE `form_user`
  ADD PRIMARY KEY (`form_userId`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`galleryId`),
  ADD KEY `eventId` (`eventName`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`imageId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `galleryId` (`galleryId`) USING BTREE;

--
-- Indexes for table `image_comment`
--
ALTER TABLE `image_comment`
  ADD PRIMARY KEY (`image_commentId`),
  ADD KEY `imageId` (`imageId`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemId`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`messageId`),
  ADD KEY `threadId` (`threadId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notificationId`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`questionId`);

--
-- Indexes for table `response`
--
ALTER TABLE `response`
  ADD PRIMARY KEY (`responseId`),
  ADD KEY `messageId` (`messageId`);

--
-- Indexes for table `thread`
--
ALTER TABLE `thread`
  ADD PRIMARY KEY (`topicId`),
  ADD KEY `subCategoryId` (`thread_subcategoryId`);

--
-- Indexes for table `thread_category`
--
ALTER TABLE `thread_category`
  ADD PRIMARY KEY (`thread_categoryId`);

--
-- Indexes for table `thread_subcategory`
--
ALTER TABLE `thread_subcategory`
  ADD PRIMARY KEY (`therad_subCategoryId`),
  ADD KEY `categoryId` (`thread_categoryId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `activityId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `answerId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `answer_user`
--
ALTER TABLE `answer_user`
  MODIFY `answer_userId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `auction`
--
ALTER TABLE `auction`
  MODIFY `auctionId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `auction_category`
--
ALTER TABLE `auction_category`
  MODIFY `auction_categoryId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bid`
--
ALTER TABLE `bid`
  MODIFY `bidId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `competition`
--
ALTER TABLE `competition`
  MODIFY `competitionId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `formId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `form_user`
--
ALTER TABLE `form_user`
  MODIFY `form_userId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `galleryId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `imageId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `image_comment`
--
ALTER TABLE `image_comment`
  MODIFY `image_commentId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `itemId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `messageId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notificationId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `questionId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `response`
--
ALTER TABLE `response`
  MODIFY `responseId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `thread`
--
ALTER TABLE `thread`
  MODIFY `topicId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `thread_category`
--
ALTER TABLE `thread_category`
  MODIFY `thread_categoryId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `thread_subcategory`
--
ALTER TABLE `thread_subcategory`
  MODIFY `therad_subCategoryId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`questionId`) REFERENCES `question` (`questionId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `bid`
--
ALTER TABLE `bid`
  ADD CONSTRAINT `bid_ibfk_1` FOREIGN KEY (`itemId`) REFERENCES `auction` (`auctionId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `form`
--
ALTER TABLE `form`
  ADD CONSTRAINT `form_ibfk_1` FOREIGN KEY (`competitionId`) REFERENCES `competition` (`competitionId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`galleryId`) REFERENCES `gallery` (`galleryId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `image_comment`
--
ALTER TABLE `image_comment`
  ADD CONSTRAINT `image_comment_ibfk_1` FOREIGN KEY (`imageId`) REFERENCES `image` (`imageId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `response`
--
ALTER TABLE `response`
  ADD CONSTRAINT `response_ibfk_1` FOREIGN KEY (`messageId`) REFERENCES `message` (`messageId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `thread_subcategory`
--
ALTER TABLE `thread_subcategory`
  ADD CONSTRAINT `thread_subcategory_ibfk_1` FOREIGN KEY (`therad_subCategoryId`) REFERENCES `thread` (`thread_subcategoryId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `thread_subcategory_ibfk_2` FOREIGN KEY (`thread_categoryId`) REFERENCES `thread_category` (`thread_categoryId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
