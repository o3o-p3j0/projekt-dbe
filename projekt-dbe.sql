-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 06. Mrz 2025 um 14:46
-- Server-Version: 10.4.32-MariaDB
-- PHP-Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `projekt-dbe`
--
CREATE DATABASE IF NOT EXISTS `projekt-dbe` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `projekt-dbe`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `fahrzeuge`
--

CREATE TABLE `fahrzeuge` (
  `id` int(11) NOT NULL,
  `wagennummer` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `fzgTyp` varchar(256) NOT NULL,
  `motor` varchar(255) NOT NULL,
  `preis` float NOT NULL,
  `km` int(11) NOT NULL,
  `getriebe` varchar(64) NOT NULL,
  `ez` int(11) NOT NULL,
  `leistung` int(11) NOT NULL,
  `anzahlTueren` int(16) NOT NULL,
  `unfallfrei` varchar(16) NOT NULL,
  `effizienzklasse` varchar(16) NOT NULL,
  `ausstattung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `fahrzeuge`
--

INSERT INTO `fahrzeuge` (`id`, `wagennummer`, `image`, `model`, `fzgTyp`, `motor`, `preis`, `km`, `getriebe`, `ez`, `leistung`, `anzahlTueren`, `unfallfrei`, `effizienzklasse`, `ausstattung`) VALUES
(1, 10010, 'img/auto.jpg', 'VW Golf 7', 'Limousine', 'Benzin', 18500, 24900, 'Schaltwagen', 2019, 100, 5, 'ja', 'A', 'Allgemein Bremsenergierückgewinnung, Ambientbeleuchtung, Bluetooth Audio-Streaming, Digitales Radio, Scheckheft, Verkehrszeichenerkennung, Euro6d_Temp, Spurhalteassistent, Spurwechselassistent,3. Bremsleuchte, Alarmanlage, Außentemperaturanzeige, Bremsassistent, Differential-Sperre, Distronic,el. Parkbremse,Innenspiegel automatisch abblendbar, Kollisionswarnung'),
(2, 10014, 'img/auto.jpg', 'BMW 3er', 'Cabrio', 'Elektro', 22900, 15600, 'Automatik', 2022, 145, 2, 'nein', 'B', 'Kollisionswarnung, Kopfstützen im Fonds, LED-Scheinwerfer, Linguatronic, Notbremsassistent, Notrufsystem, Reifendruckkontrolle, Rückleuchten LED, Spiegel automatisch abblendbar, Tagfahrlicht, Totwinkel-Assistent, Beifahrerairbag, Fenster-/Kopfairbags im Fond, enster-/Kopfairbags vorne, Seitenairbags im Fond,Seitenairbags vorne, 10 Airbags, Farbmonitor für Navigationssystem, Schaltwippen, abgedunkelte Scheiben im Fond,Abstandstempomat, Außenspiegel beheizbar,Außenspiegel elektr., Außenspiegel elektr. anklappbar, Einparkassistent, Fahrersitz höhenverstellbar, Geschwindigkeits-Begrenzungsanlage'),
(3, 10022, 'img/auto.jpg', 'Renault Scenic V', 'Kombi', 'Diesel', 7800, 110500, 'Automatik', 2011, 136, 5, 'unbekannt', 'C', 'Verkehrszeichenerkennung, Euro6d_Temp, Spurhalteassistent, Spurwechselassistent, 3. Bremsleuchte, Alarmanlage, Außentemperaturanzeige, Bremsassistent, Differential-Sperre,Distronic, el. Parkbremse, Innenspiegel automatisch abblendbar , Kollisionswarnung, Kopfstützen im Fonds, LED-Scheinwerfer, Linguatronic,Notbremsassistent, Notrufsystem, Reifendruckkontrolle, Rückleuchten LED, Spiegel automatisch abblendbar, Tagfahrlicht, Totwinkel-Assistent'),
(104, 10025, 'img/auto.jpg', 'Audi RS4', 'Kombi', 'Benzin', 99889, 11450, 'Automatik', 2024, 331, 5, 'ja', 'A+', 'Tiptronic; ASR; Airbag Beifahrerseite abschaltbar; Airbag Fahrer-/Beifahrerseite; Seitenairbags vorn und Kopfairbagsystem; beheizte Scheibenwaschdüsen; Diebstahl-Warnanlage + Innenraumabsicherung / Abschleppschutz; Kotflügelverbreiterung; Dynamiklenkung; Start-Stop-System; Progressivlenkung; Innenspiegel automatisch abblendend, rahmenlos; Sport-Fahrwerk RS plus mit Dämpferregelung; Insassen-Schutzsystem (Audi pre sense basic) inkl. Audi pre sense rear; Schadstoffarm nach Abgasnorm Euro 6d-TEMP; Halteassistent; Abbiege-Assistent links; Anhebung der Höchstgeschwindigkeit auf 290 km/h'),
(105, 10026, 'img/auto.jpg', 'Hyundai IONIQ 6', 'Limousine', 'Elektro', 34960, 11500, 'Automatik', 2024, 111, 5, 'ja', 'A+', 'Komfortschlüssel mit sensorgesteuerter Heckklappenentriegelung und Diebstahl-Warnanlage; Außenspiegel mit Bordsteinautomatik, rechts; Außenspiegel elektrisch einstell-, beheiz- und anklappbar, automatisch abblendend mit Memory-Funktion; Komfortschlüssel mit sensorgesteuerter Heckklappenentriegelung und Diebstahl-Warnanlage inkl. (öffnen + schliessen); Komfortschlüssel inkl. sensorgesteuerter Gepäckraumentriegelung inkl. Gepäckraum- klappe elektrisch öffnend und schließend; Komfortschlüssel ohne Safelock; Dachreling schwarz; Wärmeschutzverglasung grün getönt; Gepäckraumklappe elektrisch öffnend und schließend; Panorama-Glasdach; Dachkantenspoiler RS; Akustikverglasung für Türscheiben vorn; Frontscheibe in Wärmeschutz- und Akustikverglasung; Sonnenschutzverglasung abgedunkelt; Außenspiegelgehäuse in schwarz; RS-Frontstoßfänger Sport-Design Innenfarbe: schwarz-schwarz-felsgrau/schwarz-schwarz /schwarz/schwarz; Sitzheizung vorn; Komfortmittelarmlehne vorn; Sitze vorn elektr. verstellbar; Vordersitze elektrisch einstellbar mit Memory-Funktion für den Fahrersitz; Lendenwirbelstütze pneumatisch einstellbar mit Massagefunktion für die Vordersitze; Sitzbezug / Polsterung: Mikrofaser Dinamica / Lederkombination mit Logo-Prägung und Wabensteppung; Rücksitzlehne geteilt umklappbar; Sportsitze plus vorn; Sitze vorn mit ausziehbarer Oberschenkelauflage\n'),
(106, 10030, 'img/auto.jpg', 'Volkswagen Golf VII GTI TCR 2.0 TS', 'Limousine', 'Benzin', 29950, 79990, 'Automatik', 2019, 213, 5, 'ja', 'A', '    Audio-Navigationssystem Discover Pro (Touchscreen, CD/DVD, MP3, Festplattenspeicher, Bluetooth): Bluetooth-Schnittstelle für Mobiltelefon, Multimedia-Schnittstelle USB (iPhone / iPod), Audiosystem: CD-/DVD-Player, Sprachsteuerungs-System, Lautsprecher (8), Volkswagen Media Control und App-Connect / MirrorLink\n    Chrom-Paket 2: Chromeinfassung Lichtschalter, Chromeinfassung Fensterheberschalter, Chromeinfassung Spiegelverstellung\n    Fahrassistenz-Paket Plus: Safesicherung, Geschwindigkeits-Begrenzeranlage, Fahrassistenz-System: City-Notbremsfunktion, Fahrassistenz-System: Autom. Distanzregelung (ACC inkl. Stop&Go-Funktion) mit Umfeldbeobachtungssystem (Front assist), Fahrassistenz-System: Blind Spot Sensor mit Auspark-Assistent, Fahrassistenz-System: Dynamische Fernlichtregulierung (Dynamic Light Assist), Diebstahl-Warnanlage mit Innenraumüberwachung, Frontkamera (Multifunktionskamera Frontscheibe), Leuchtweitenregelung automatisch, Fahrassistenz-System: Automatische Distanzregelung (ACC), Fahrassistenz-System: Umfeldbeobachtungssystem (Front assist) mit City-Notbremsfunktion, Fahrassistenz-System: Fußgängererkennung, Scheinwerfer LED mit dynamischem Kurvenlicht, Fahrassistenz-System: Emergency Assist, Fahrassistenz-System: Stauassistent (Traffic Jam Assist), Fahrassistenz-System: Spurhalteassistent (Lane Assist)\n    Fahrassistenz-System: Umfeldbeobachtungssystem (Front assist) mit City-Notbremsfunktion: Fahrassistenz-System: City-Notbremsfunktion, Fahrassistenz-System: Fußgängererkennung\n    Fahrwerks-Paket mit LM-Felgen Reifnitz: Fahrassistenz-System: Fahrprofilauswahl, Fahrassistenz-System: Adaptive Fahrwerksregelung (DCC), Reifen: Sportreifen, LM-Felgen, Höchstgeschwindigkeit ohne Begrenzung\n    Klimaanlage Climatronic 2-Zonen: Innenraumfilter: Staub- und Pollenfilter mit Aktivkohlefilter\n    Mobiltelefon Schnittstelle Comfort mit kabelloser Ladefunktion: Bluetooth-Schnittstelle für Mobiltelefon, Multimedia-Schnittstelle 2 x USB (iPhone / iPod)\n    Sound-System DYNAUDIO: Subwoofer, Lautsprecher (8)\n    Spiegel-Paket: Außenspiegel mit Umfeldleuchte, Außenspiegel mit autom. Absenkfunktion, rechts, Außenspiegel elektr. anklappbar\n    Winter-Paket: Scheibenwaschdüsen heizbar, Scheinwerfer-Reinigungsanlage (SRA), Sitzheizung vorn,     Getriebe: Automatik\n    Technik: Bordcomputer, Sperrdifferential, Adaptives Daempfungssystem, Start-Stop-Automatik, Schaltwippen, Volldigitales Kombiinstrument\n    Assistenten: Totwinkel-Assistent, Müdigkeitserkennung, Verkehrszeichenerkennung, Regensensor, Fernlichtassistent, Lichtsensor, Notbremsassistent, Berganfahrassistent, Spurhalteassistent, Spurwechselassistent, Abstandsregeltempomat, Abstands-/Kollisionswarner\n    Komfort: Klimaautomatik, Servolenkung, Zentralverriegelung, Elektrischer Fensterheber, Lederausstattung, Sitzheizung, Elektrische Aussenspiegel, Teilbare Ruecksitzlehne, Tempomat, Multifunktionslenkrad, Innenspiegel autom. abblendbar, Mittelarmlehne, Innenraumfilter, Lenksaeule einstellbar, Sportsitze, ParkDistanceControl vorne und hinten, Ambientebeleuchtung, Lordosenstütze, Lederlenkrad, Geschwindigkeitsbegrenzungsanlage, Klimaautomatik-2-Zonen, Funkfernbedienung\n    Sicht: LED-Hauptscheinwerfer, Dynamisches Kurvenlicht, LED-Tagfahrlicht, LED-Rueckleuchten, Scheinwerferregulierung, Scheinwerferreinigung, Aussenspiegel beheizbar, Rückfahrkamera, Privacyverglasung\n    Sicherheit: ABS, Airbag, Beifahrer-Airbag, Wegfahrsperre, Alarmanlage, ESP, Antriebsschlupfregelung, Reifendruckkontrolle, Traktionskontrolle, Kopfairbag, Knieairbag, Kindersitzbefestigung, Notrufsystem, Pannenkit\n    Entertainment: Navigationssystem, CD, Soundsystem, Kommunikationspaket, Radio, Telefonvorbereitung, USB-Anschluss, MP3, Bluetooth, Freisprecheinrichtung, Dynaudio, Apple CarPlay, Android Auto, Sprachsteuerung, DAB, Touchscreen, Induktionsladen für Smartphones, Musikstreaming\n    Umwelt: Grüne Umweltplakette\n    Qualität: Garantie, Scheckheftgepflegt, HUAU neu, Nichtraucherfahrzeug, Inspektion neu\n    Sonstiges: Katalysator, Alufelgen, Gepaeckraumabdeckung, Sportpaket, Elektrische Parkbremse, Fahrerprofilauswahl, Allwetterreifen, Winterpaket, Spoiler\n    Weiteres:  Antriebs-Schlupfregelung (ASR), Getriebe 7-Gang - Doppelkupplungsgetriebe DSG, Isofix-Aufnahmen für Kindersitz an Rücksitz, Knieairbag Fahrerseite, Start/Stop-Anlage, Zentralverriegelung mit Fernbedienung, Stabilisator vorn, Dachspoiler, Multifunktionsanzeige Premium (Farbdisplay), Scheibenwischer mit Regensensor, Parkbremse elektrisch, Sitzbezug / Polsterung: Stoff, Lendenwirbelstütze Sitz vorn links, Lendenwirbelstütze Sitz vorn rechts, Mittelarmlehne vorn, Active Info-Display (Instrumentenanzeige digital), Automatische Fahrlichtschaltung (ALS) mit Leaving Home / Coming-Home-Lichtfunktion, Differentialsperre (Vorderachse), Schadstoffarm nach Abgasnorm Euro 6d-TEMP, Notrufsystem, Einparkhilfe vorn und hinten, Radioempfang digital (DAB+), Verglasung hinten abgedunkelt (90 %), Rückfahrkamera (Rear View), Anti-Blockier-System (ABS), Tagfahrlicht LED, Wegfahrsperre (elektronisch), Airbag Fahrer-/Beifahrerseite, Funkschlüssel (2) klappbar, Reifenkontroll-Anzeige, Kopf-Airbag-System vorn und hinten inkl. Seitenairbag vorn, Fensterheber elektrisch, Rücksitzlehne geteilt, Lenkrad (Sport/Leder - TCR) mit Multifunktion und S* Int.KnNr: A-213949\n'),
(107, 10031, 'img/auto.jpg', 'Abarth 695 esseesse', 'Limousine', 'Benzin', 33990, 5000, 'Automatik', 2022, 132, 3, 'nein', 'A+', 'Technik + Sicherheit: \nESP; ABS; Fahrerairbag; Beifahrer-Airbag; Heckscheibenwischer; Außentemperatur-Anzeige; Sport-Fahrwerk tiefergelegt; Partikelfilter; Servolenkung; Luftfilter: Sportluftfilter; Sport-Auspuffanlage Edelstahl (Akrapovic) Endrohre Titan; Motor 1,4 Ltr. - 132 kW\n\nMultimedia: \nInfotainment-System: UConnect mit MP3-Player, Navigationssystem und DAB Radioempfang (Touchscreen 7\"); Freisprecheinrichtung; Multimediabuchse: USB; Sound-System Beats Audio; Multimediabuchse; Bluetooth; Touch Screen; Smartphone Schnittstelle (Apple CarPlay & Android Auto)\n\nAssistenzsysteme: \nEinparkhilfe hinten; Lichtsensor\n\nInnen: \nKlimaautomatik; Multifunktionslenkrad; Schaltwippen; Fensterheber elektrisch vorn; Bordcomputer; Sportlederlenkrad; Lederlenkrad; Lenkrad verstellbar; Sportlenkrad; Dachhimmel schwarz; Dachhimmel; Pedale Carbon\n\nSitze + Polster: \nMittelarmlehne; Mittelarmlehne vorne; Lenkrad (Leder/Alcantara, mit Carbon-Einsatz); Rücksitz geteilt / klappbar; Rennsportsitze; Isofix-Aufnahmen für Kindersitz an Rücksitz\n\nAussen: \nZV mit Funkfernbedienung; Skydome - elektr. Panoramadach mit Sonnenrollo; Zentralverriegelung; Metallic-Lackierung; Außenspiegel elektr. verstell- und heizbar, beide; Seitenscheiben hinten und Heckscheibe abgedunkelt; Heckspoiler; Tankdeckel Aluminium; Motorhaube mit Powerdome Aluminium\n\nScheinwerfer + Leuchten: \nBi-Xenon-Scheinwerfer; Nebelscheinwerfer; Tagfahrlicht; LED-Tagfahrlicht\n\nRäder + Reifen: \nLM-Felgen; Ganzjahresreifen; Reifen-Reparaturkit\n\nPakete: \nUrban-Paket');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `fahrzeuge`
--
ALTER TABLE `fahrzeuge`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `wagennummer` (`wagennummer`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `fahrzeuge`
--
ALTER TABLE `fahrzeuge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
