-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Gegenereerd op: 08 okt 2024 om 07:32
-- Serverversie: 9.0.1
-- PHP-versie: 8.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mbogodigital`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `docenten`
--

CREATE TABLE `docenten` (
  `id` int NOT NULL,
  `gebruikersnaam` varchar(255) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `rol` varchar(50) DEFAULT NULL,
  `creationDate` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `docenten`
--

INSERT INTO `docenten` (`id`, `gebruikersnaam`, `wachtwoord`, `email`, `rol`, `creationDate`) VALUES
(1, 'xavierd', '$2y$10$FWZ2.C4YQXevnPWSdnsd8uRfFpa5BOj.LV//1YtXEBDZqUYYHhlC6', 'XavierD@example.com', 'docent', '2024-10-01 10:44:59');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `education`
--

CREATE TABLE `education` (
  `id` char(36) NOT NULL,
  `creboNumber` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `level` int DEFAULT NULL,
  `description` blob,
  `registerUntil` date DEFAULT NULL,
  `graduateUntil` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `education`
--

INSERT INTO `education` (`id`, `creboNumber`, `name`, `level`, `description`, `registerUntil`, `graduateUntil`) VALUES
('6c93a885-9c11-4746-af76-b4b79ed3f1d0', '25998', 'Software developer (vanaf 1-8-2024)', 4, '', NULL, NULL),
('6e606817-054b-4752-b801-0459dd8c2789', '25604', 'Software developer', 4, 0x536f667477617265206f6e7477696b6b656c696e672069732065656e207370656369616c697374697363682076616b2e204465736f6e64616e6b73206469656e7420646520536f66747761726520646576656c6f706572207a696368206865656c206272656564207465206f7269c3ab6e746572656e20616c73206865742067616174206f6d206b656e6e697320656e2076616172646967686564656e20287a6f616c73207765726b6d6574686f6469656b656e2c2070726f6772616d6d65657274616c656e20656e206465206469766572736520696e666f726d6174696573797374656d656e20656e20706c6174666f726d656e20776161722064652070726f6772616d6d6174757572207765726b656e64206d6f6574207a696a6e292e20426f76656e6469656e206d6f65742068696a2f7a696a206272656564206f6e6465726c656764207a696a6e20646161722077616172206865742067616174206f6d20646520656e6f726d652064697665727369746569742061616e206d6f67656c696a6b6520736f66747761726520656e206465766963657320776161722068696a2f7a696a206d6565207465206d616b656e206b72696a67742e2044656e6b206869657262696a2062696a766f6f726265656c642061616e20686574206f6e7477696b6b656c656e2076616e20776562626173656420736f6674776172652c2077656273697465732c20746f6570617373696e6773736f6674776172652c2067616d657320656e20616e6465726520656e7465727461696e6d656e74736f66747761726520656e206d656469612d756974696e67656e2e0d0a0d0a446520536f66747761726520646576656c6f706572207765726b7420766f6f726e616d656c696a6b207a656c667374616e6469672061616e20686574207265616c69736572656e2076616e20736f6674776172652e2044652065696e64766572616e74776f6f7264656c696a6b6865696420766f6f72206865742065696e6470726f64756374206c696774207661616b2062696a2064652070726f6a6563746c6569646572206f66206c656964696e67676576656e64652e20496e207665656c20676576616c6c656e207765726b742068696a2f7a696a2073616d656e206d657420616e64657265206469736369706c696e65732c207a6f616c7320616e6465726520646576656c6f7065727320656e2064657369676e6572732e204765647572656e646520686574206f6e7477696b6b656c70726f6365732068656566742068696a2f7a696a20626f76656e6469656e20726567656c6d6174696720636f6e74616374206d6574206465206f7064726163687467657665722f206c656964696e67676576656e64652f2062656c616e6768656262656e64656e2c207761742073706563696669656b6520656973656e207374656c742061616e20636f6d6d756e69636174696576652076616172646967686564656e2e0d0a0d0a446520536f66747761726520646576656c6f706572207765726b7420696e207672696a77656c20616c6c6520736563746f72656e2076616e2064652065636f6e6f6d69652c207a6f616c73206465206272656465204943542d736563746f722c2067616d652d696e647573747269652c2064652063726561746965766520736563746f722c206465206c6f6769737469656b6520736563746f722c206465206d6f62696c6974656974736272616e6368652c206465206d61616b696e647573747269652c206465207a6f726720656e206e6f67207665656c206d6565722e2042696e6e656e20646520736563746f7220776161722068696a2f7a696a2067616174207765726b656e206d6f65742068696a2f7a696a20746576656e73206272656564206f6e6465726c656764207a696a6e206d657420646520766f6f722064696520736563746f722062656c616e6772696a6b65206f6e646572737465756e656e6465206b656e6e69732e205665656c616c20697320646520626567696e6e656e64206265726f65707362656f6566656e616172207765726b7a61616d20696e20686574206d696464656e2d20656e206b6c65696e62656472696a662e0d0a0d0a4865742069732076616e20657373656e746965656c2062656c616e672064617420646520536f66747761726520646576656c6f70657220646520707269766163792076616e206b6c616e74656e2c206f706472616368746765766572732c20656e2076616e20616c6c652028746f656b6f6d737469676529206765627275696b6572732076616e20646520736f66747761726520626573636865726d742e20446161726e61617374206d6f657420736f667477617265207665696c6967207a696a6e20656e20626573636865726d64207a696a6e20746567656e206f6e656967656e6c696a6b206f66206372696d696e65656c206765627275696b2e2020202020202020202020202020, '2024-08-01', '2030-08-01'),
('8749f1bb-ac9c-41d8-8f80-cb6ccb413f7a', '25605', 'Allround medewerker IT systems and devices', 3, 0x446520416c6c726f756e64206d6564657765726b65722049542073797374656d7320616e642064657669636573207765726b74207a656c667374616e646967206f702065656e2049435420616664656c696e67206f6620696e2065656e20736572766963656465736b6f6d676576696e672e2048696a2f7a696a207765726b7420766f6c67656e73207374616e64616172642070726f6365647572657320656e206d6574686f64657320656e20746f6f6e742062696e6e656e207661737467657374656c6465206b61646572732c20656967656e20696e7a6963687420656e20696e69746961746965662e2048696a2f7a696a20686565667420676f65646520636f6d6d756e69636174696576652076616172646967686564656e20656e207765726b74206b6c616e74676572696368742e, NULL, NULL),
('be7ee254-2ea6-45e3-860c-e762d54d04de', '25606', 'Expert IT systems and devices', 4, 0x4465204578706572742049542073797374656d7320616e642064657669636573207765726b74207a656c667374616e646967206f702064652049435420616664656c696e672076616e2065656e206f7267616e697361746965206f6620696e2065656e20736572766963656465736b6f6d676576696e672e2048696a2f7a696a206865656674206f6f6720766f6f72206465206f7267616e69736174696520656e2062657a69742065656e2068656c696b6f70746572766965772e2048696a2f7a696a20636f6d6d756e696365657274206d657420616c6c6520626574726f6b6b656e656e2e0d0a0d0a4e6161737420686574206265686572656e2076616e20646520495420696e6672617374727563747575722c206170706c6963617469657320656e206465766963657320686f756474206465204578706572742049542073797374656d7320616e642064657669636573207a6963682062657a6967206d6574206865742062657665696c6967656e2076616e20696e666f726d6174696573797374656d656e2e2048696a2f7a696a206765656674207365637572697479206164766965732c207665726265746572742064652073656375726974792076616e2073797374656d656e20656e207265616765657274206f7020637962657273656375726974792061616e76616c6c656e2e204f6f6b206865656674206465204578706572742049542073797374656d7320616e6420646576696365732065656e20726f6c2062696a2068657420636f6d6d756e69636572656e206f7665722077656e73656e2076616e206f7064726163687467657665727320656e206865742076657274616c656e2076616e2064657a652077656e73656e206e6161722061616e70617373696e67656e206f66207665726e69657577696e67656e20696e20646520495420696e667261737472756374757572206f66206170706c696361746965732e20486574206b756e6e656e207765726b656e206d65742064617461626173657320656e2070726f6772616d6d6565726572766172696e6720737065656c742068696572696e2065656e20726f6c2e, NULL, NULL),
('d6ba472d-c84c-4b33-a6be-e1af53b32276', '25999', 'Medewerker ICT (vanaf 1-8-2024)', 2, '', NULL, NULL),
('f0aa137e-3bd8-46b2-a716-c8bad5137a3c', '25607', 'Medewerker ICT support', 2, 0x4465204d6564657765726b65722049435420737570706f7274207765726b7420696e206f7064726163687420656e206f6e64657220626567656c656964696e672076616e2065656e206c656964696e67676576656e64652e2048696a2f7a696a207765726b7420696e2065656e207765696e696720636f6d706c657865206f6d676576696e6720656e20766f6572742065656e766f75646967652074616b656e2c20726f7574696e656d617469676520656e207374616e64616172647765726b7a61616d686564656e207569742e2048696a2f7a696a20686f756474207a696368206461617262696a20737472696b742061616e2064652067656c64656e646520726567656c732c20696e73747275637469657320656e2070726f636564757265732e2057616e6e656572206965747320616677696a6b742076616e206465206f70647261636874206f7665726c6567742068696a2f7a696a20646972656374206d6574206465206c656964696e67676576656e64652e0d0a4465204d6564657765726b65722049435420737570706f7274207765726b74206f7020686574206765626965642076616e20686172647761726520656e20646576696365732e2048657420676161742062696a766f6f726265656c64206f6d206865742061616e6c656767656e2c20696e7374616c6c6572656e20656e20636f6e66696775726572656e2076616e20686172647761726520656e2f6f66206e65747765726b656e20656e20686574206f706c6f7373656e2076616e2073746f72696e67656e2e204d65742062657472656b6b696e6720746f74206465766963657320766f657274206465204d6564657765726b65722049435420737570706f72742061637469766974656974656e20756974206f702068657420766c616b2076616e20617373656d626c6167652c207265706172617469652c207665726c656e656e2076616e20736572766963652c20676576656e2076616e207569746c656720656e2028696e20736f6d6d696765206272616e6368657329207665726b6f6f702076616e206465766963657320287a6f616c73206d6f6269656c652074656c65666f6f6e732c207461626c6574732c206c6170746f70732f6e6f7465626f6f6b732c206465736b746f70732c20496f5420646576696365732c20736d61727420686f6d6520646576696365732c2041562d617070617261747575722c2056522f41522d6465766963657320656e2064726f6e6573292e, '2024-08-01', '2028-08-01');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `keuzedeel`
--

CREATE TABLE `keuzedeel` (
  `id` char(36) NOT NULL,
  `code` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `sbu` int NOT NULL,
  `description` blob,
  `goalsDescription` blob,
  `preconditions` blob,
  `teachingMethods` blob,
  `certificate` tinyint(1) NOT NULL,
  `linkVideo` varchar(255) DEFAULT NULL,
  `linkKD` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `keuzedelen`
--

CREATE TABLE `keuzedelen` (
  `id` int NOT NULL,
  `naam` varchar(255) NOT NULL,
  `code` varchar(50) NOT NULL,
  `beschrijving` text NOT NULL,
  `wat_ga_je_doen` text,
  `wat_wordt_er_verwacht` text,
  `wat_levert_het_op` text,
  `creationDate` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `keuzedelen`
--

INSERT INTO `keuzedelen` (`id`, `naam`, `code`, `beschrijving`, `wat_ga_je_doen`, `wat_wordt_er_verwacht`, `wat_levert_het_op`, `creationDate`) VALUES
(1, 'Basis Programmeren', 'K0788', '<p>Ben jij iemand die gek is op games en wil je leren hoe je ze zelf kunt maken? Dan is het keuzedeel <strong>Basis Programmeren van Games</strong> echt iets voor jou! 🎮</p><p>In dit keuzedeel leer je de basis van het programmeren van toffe games. We duiken in de wereld van game engines en laten je zien hoe je met technische skills én je creatieve kant een eigen game kunt ontwikkelen. Denk aan eenvoudige, maar gave games die je kunt spelen op je mobiel of zelfs educatieve games!</p>', '<p><strong>Maak je eigen game:</strong> Je leert hoe je een eenvoudige game opzet, programmeert en test. Van het toevoegen van speciale effecten zoals licht en geluid, tot het zorgen dat je game perfect werkt.</p><p><strong>Samenwerken in een team:</strong> Je werkt niet alleen! Samen met een creatief team ga je aan de slag. Jij bent verantwoordelijk voor de technische kant van de game en zorgt dat alles soepel verloopt.</p><p><strong>Gebruik game engines:</strong> Je krijgt de kans om te werken met verschillende game engines en programmeertalen. En ja, we leren je ook hoe je met toekomstige trends in de gamewereld kunt omgaan.</p><p><strong>Testen, verbeteren, opleveren:</strong> Natuurlijk stopt het niet bij het maken van de game. Je gaat deze uitgebreid testen, optimaliseren en uiteindelijk presenteren aan je opdrachtgever!</p>', '<p><strong>Voorbereiding van je game:</strong> Je schrijft de benodigde programmacodes en maakt een gedetailleerd plan voor de technische realisatie van de game.</p><p><strong>Realiseer en test je game:</strong> Schrijf de programmacode en voeg de juiste game-assets toe. Test de game en zorg dat alles goed werkt.</p><p><strong>Lever je game op:</strong> Presenteer je game aan je opdrachtgever en zorg dat de documentatie van je werk op orde is en lever het tijdig in.</p>', '<p>Je krijgt niet alleen de kans om je programmeerskills te verbeteren, maar ook om je creativiteit te laten zien! Dit keuzedeel geeft je een supervoorsprong op de arbeidsmarkt. Het staat geweldig op je CV, vooral als je interesse hebt in functies zoals Applicatie- en Mediadeveloper. Klaar om de gamewereld te veroveren? <strong>Let’s go!</strong> 🚀</p>', '2024-10-01 11:40:16'),
(2, 'Basis Programmeren 2', 'K0788', '<p>Ben jij iemand die gek is op games en ', '<p><strong>Maak je eigen game:</strong>  er!</p>', '<p><strong>Voorbereiding van je game:</strong> Je schrijft de benodigde >', '<p>Je krijgt niet alleen de kans om je ', '2024-10-01 11:40:16');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `keuzedelen_student`
--

CREATE TABLE `keuzedelen_student` (
  `id` int NOT NULL,
  `student_id` int NOT NULL,
  `keuzedeel_id` int NOT NULL,
  `gekozen_op` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `keuzedelen_student`
--

INSERT INTO `keuzedelen_student` (`id`, `student_id`, `keuzedeel_id`, `gekozen_op`) VALUES
(1, 1, 1, '2024-10-07');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `levels`
--

CREATE TABLE `levels` (
  `id` char(36) NOT NULL,
  `educationId` char(36) NOT NULL,
  `level` int NOT NULL,
  `subject` varchar(50) NOT NULL,
  `description` blob NOT NULL,
  `deliverables` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `opleidingen`
--

CREATE TABLE `opleidingen` (
  `id` char(36) NOT NULL,
  `naam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `role`
--

CREATE TABLE `role` (
  `id` char(36) NOT NULL,
  `name` varchar(30) NOT NULL,
  `level` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `role`
--

INSERT INTO `role` (`id`, `name`, `level`) VALUES
('126c5a69-792c-427a-8bd9-0e20b8651f2b', 'Docent', 20),
('37914d3e-8e27-46e5-982f-30651d3276da', 'Applicatiebeheerder', 80),
('5482254d-709b-4f59-adf4-83d7f67d9553', 'Administrator', 100),
('6e27105c-c42a-46c8-9cd6-34ff1fe52572', 'Student', 10);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `studenten`
--

CREATE TABLE `studenten` (
  `id` int NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `prefix` varchar(50) DEFAULT NULL,
  `lastName` varchar(100) NOT NULL,
  `studentnummer` varchar(50) NOT NULL,
  `profielFoto` varchar(255) DEFAULT NULL,
  `duoNumber` varchar(50) NOT NULL,
  `klas` varchar(50) DEFAULT NULL,
  `jaar` year DEFAULT NULL,
  `opleiding` varchar(100) DEFAULT NULL,
  `keuzedeel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `studenten`
--

INSERT INTO `studenten` (`id`, `firstName`, `prefix`, `lastName`, `studentnummer`, `profielFoto`, `duoNumber`, `klas`, `jaar`, `opleiding`, `keuzedeel`) VALUES
(1, 'Anna', 'de', 'Vries', '987654', 'selfie-900.jpg', 'DUO987654', 'TILM125C', '2022', 'Applicatie Ontwikkelaar', 'test');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `id` char(36) NOT NULL,
  `duoNumber` int DEFAULT NULL,
  `firstName` varchar(50) NOT NULL,
  `prefix` varchar(20) DEFAULT NULL,
  `lastName` varchar(50) NOT NULL,
  `secret` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `changeSecretAtLogon` tinyint(1) DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL,
  `roleId` char(36) DEFAULT NULL,
  `educationId` char(36) DEFAULT NULL,
  `cohort` bigint DEFAULT NULL,
  `creationDate` datetime NOT NULL,
  `modificationDate` datetime NOT NULL,
  `opleiding_id` char(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `duoNumber`, `firstName`, `prefix`, `lastName`, `secret`, `email`, `phone`, `changeSecretAtLogon`, `enabled`, `roleId`, `educationId`, `cohort`, `creationDate`, `modificationDate`, `opleiding_id`) VALUES
('23a4b3e7-9e01-47b7-b73a-ce7544379d89', 0, 'Test', 'van', 'Administrator', '$2y$10$FuDLLcVEd.PE0I1QCJHZUej2JnVrSh/Y5vkKv.YphQkjaN7B/H2Yy', 't.van.administrator@vistacollege.nl', '0677778888', 0, 1, '5482254d-709b-4f59-adf4-83d7f67d9553', '6e606817-054b-4752-b801-0459dd8c2789', 2024, '2024-08-10 13:35:23', '2024-08-10 13:35:23', NULL),
('2e71e52d-0d12-4ac5-9f06-1ece4190a30f', 111222, 'Test', 'van', 'Student', '$2y$10$JwZm9zgLZDVC.i8sGiKywO0O0qgTuOnxYnT3k2AhwTnRYCYV/8C3O', 't.van.student@vistacollege.nl', '0611112222', 0, 1, '6e27105c-c42a-46c8-9cd6-34ff1fe52572', 'f0aa137e-3bd8-46b2-a716-c8bad5137a3c', 2024, '2024-08-10 13:26:07', '2024-08-10 13:26:24', NULL),
('8d2408cd-89cd-4c9c-95cc-9c97ae841a5f', 0, 'Test', 'van', 'Docent', '$2y$10$/XL14jtCw5l.Xh8AgLbgm.bKkhK3NmsQ0V.7A6mtqlkjnTdjozyzS', 't.van.docent@vistacollege.nl', '0633334444', 0, 1, '126c5a69-792c-427a-8bd9-0e20b8651f2b', '8749f1bb-ac9c-41d8-8f80-cb6ccb413f7a', 2024, '2024-08-10 13:32:05', '2024-08-10 13:32:05', NULL),
('c530cb1d-d60b-4a45-b066-892f040d5059', 0, 'Test', 'van', 'Applicatiebeheerder', '$2y$10$jYDnL7r1Il.JTvewCdjvZewAedEWnqoZVBB4wJ.jtUeLJ/ULlsPkG', 't.van.applicatiebeheerder@vistacollege.nl', '0655556666', 0, 1, '37914d3e-8e27-46e5-982f-30651d3276da', 'be7ee254-2ea6-45e3-860c-e762d54d04de', 2024, '2024-08-10 13:33:41', '2024-08-10 13:33:57', NULL);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `docenten`
--
ALTER TABLE `docenten`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gebruikersnaam` (`gebruikersnaam`);

--
-- Indexen voor tabel `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `education_crebonumber_unique` (`creboNumber`),
  ADD UNIQUE KEY `education_name_unique` (`name`);

--
-- Indexen voor tabel `keuzedeel`
--
ALTER TABLE `keuzedeel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `keuzedeel_code_unique` (`code`);

--
-- Indexen voor tabel `keuzedelen`
--
ALTER TABLE `keuzedelen`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `keuzedelen_student`
--
ALTER TABLE `keuzedelen_student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `keuzedeel_id` (`keuzedeel_id`);

--
-- Indexen voor tabel `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `levels_educationid_foreign` (`educationId`);

--
-- Indexen voor tabel `opleidingen`
--
ALTER TABLE `opleidingen`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role_name_unique` (`name`);

--
-- Indexen voor tabel `studenten`
--
ALTER TABLE `studenten`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_email_unique` (`email`),
  ADD KEY `user_educationid_foreign` (`educationId`),
  ADD KEY `user_roleid_foreign` (`roleId`),
  ADD KEY `fk_user_opleiding` (`opleiding_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `docenten`
--
ALTER TABLE `docenten`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `keuzedelen`
--
ALTER TABLE `keuzedelen`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `keuzedelen_student`
--
ALTER TABLE `keuzedelen_student`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `studenten`
--
ALTER TABLE `studenten`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `keuzedelen_student`
--
ALTER TABLE `keuzedelen_student`
  ADD CONSTRAINT `keuzedelen_student_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `studenten` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `keuzedelen_student_ibfk_2` FOREIGN KEY (`keuzedeel_id`) REFERENCES `keuzedelen` (`id`) ON DELETE CASCADE;

--
-- Beperkingen voor tabel `levels`
--
ALTER TABLE `levels`
  ADD CONSTRAINT `levels_educationid_foreign` FOREIGN KEY (`educationId`) REFERENCES `education` (`id`);

--
-- Beperkingen voor tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_opleiding` FOREIGN KEY (`opleiding_id`) REFERENCES `opleidingen` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `user_educationid_foreign` FOREIGN KEY (`educationId`) REFERENCES `education` (`id`),
  ADD CONSTRAINT `user_roleid_foreign` FOREIGN KEY (`roleId`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
