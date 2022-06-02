-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 30. Mai 2022 um 14:15
-- Server-Version: 10.4.24-MariaDB
-- PHP-Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `bibliothek`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ausleihe`
--

CREATE TABLE `ausleihe` (
  `AusleiheID` int(11) NOT NULL,
  `Leihdatum` datetime NOT NULL,
  `Rückgabedatum` datetime NOT NULL,
  `BuchID` int(11) NOT NULL,
  `KundenID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `autor`
--

CREATE TABLE `autor` (
  `AutorID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Geburtsdatum` datetime DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `autor`
--

INSERT INTO `autor` (`AutorID`, `Name`, `Geburtsdatum`, `Email`) VALUES
(1, 'Michael Farr', NULL, NULL),
(2, 'Julia Boehme', NULL, NULL),
(3, 'Herdis Albrecht', NULL, NULL),
(4, 'Julia Ginsbach', NULL, NULL),
(5, 'Paul-Eduard Rück', NULL, NULL),
(6, 'Dirk Labudde', NULL, NULL),
(7, 'Valentin Groebner', NULL, NULL),
(8, 'Tim Weiner', NULL, NULL),
(9, 'Hektor Haarkötter', NULL, NULL),
(10, 'Andreas Götz', NULL, NULL),
(11, 'Lea Kaib', NULL, NULL),
(12, 'Peter Fischer', NULL, NULL),
(13, 'Otto Berger', NULL, NULL),
(14, 'Heyner Böttger', NULL, NULL),
(15, 'Oliver Meyer', NULL, NULL),
(16, 'Timm Fuhrmann', NULL, NULL),
(17, 'Jean-Christophe Grangé', NULL, NULL),
(18, 'C. C. BENISON', NULL, NULL),
(19, 'M. C. Beaton', NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `autorbuchzuordnung`
--

CREATE TABLE `autorbuchzuordnung` (
  `AbzID` int(11) NOT NULL,
  `AutorID` int(11) NOT NULL,
  `BuchID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `autorbuchzuordnung`
--

INSERT INTO `autorbuchzuordnung` (`AbzID`, `AutorID`, `BuchID`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 4, 2),
(4, 2, 3),
(5, 4, 3),
(6, 7, 6),
(7, 8, 7),
(8, 6, 5),
(9, 5, 4),
(10, 9, 8),
(11, 10, 9),
(12, 11, 10),
(13, 13, 11),
(14, 12, 11),
(15, 14, 12),
(16, 15, 12),
(17, 16, 13),
(18, 17, 14),
(19, 18, 15),
(20, 19, 16);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `buch`
--

CREATE TABLE `buch` (
  `BuchID` int(11) NOT NULL,
  `Titel` varchar(300) NOT NULL,
  `ISBN` varchar(17) NOT NULL,
  `Seitenzahl` int(11) NOT NULL,
  `Erschienen` datetime DEFAULT NULL,
  `Beschreibung` varchar(5000) NOT NULL,
  `LagerplatzID` int(11) NOT NULL,
  `VerlagID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `buch`
--

INSERT INTO `buch` (`BuchID`, `Titel`, `ISBN`, `Seitenzahl`, `Erschienen`, `Beschreibung`, `LagerplatzID`, `VerlagID`) VALUES
(1, 'Auf den Spuren von Tim & Struppi', '978-3-551-77110-0', 208, '2006-12-22 11:39:50', 'Aus den Archiven des Tim-Schöpfers Hergé fördert Michael Farr eine beeindruckende Fülle von Material zu jedem einzelnen Abenteuer von »Tim und Struppi« zu Tage. Hunderte von Fotos und Zeitungsausschnitten zeigen, wie sehr die Serie ein Abbild ihrer Zeit ist und wie gründlich Hergé recherchierte, um seine Geschichten so realistisch wie möglich zu gestalten. Ein großes Lesevergnügen für alle Tim-Fans, das voller amüsanter Details steckt.', 4, 4),
(2, 'Tafiti - Nur Mut, kleine Fledermaus!', '978-3-551-03295-9', 24, '2022-07-27 11:45:43', 'So ein Mist! Die leckeren Früchte hängen einfach zu hoch. Da entdecken die Freunde die kleine Fledermaus im Gras. Sie könnte doch hochfliegen und ein paar Früchte vom Baum pflücken – aber Rusha traut sich nicht zu fliegen. Dann taucht plötzlich der Löwe King Kofi auf … \r\n\r\nEine spannende Geschichte über Ängste und wie man sie überwinden kann.\r\n\r\nMaxi Pixi – die kleinen großen Bilderbücher im Softcover', 4, 4),
(3, 'Tafiti: Auch beste Freunde streiten mal', '978-3-551-03294-2', 24, '2022-07-27 11:47:45', 'Als eines Abends ein Stern vom Himmel fällt, sind das Erdmännchen und das Pinselohrschwein ganz aufgeregt. Pinsel entdeckt das Sternchen zuerst im hohen Savannengras, doch Tafiti ist schneller und schnappt sich den funkelnden Himmelskörper. Und schon entsteht ein großer Beste-Freunde-Streit. Ob die besten Freunde sich wohl wieder versöhnen?\r\n\r\nEine funkelnde Bilderbuchgeschichte über Freundschaft, Streit und Versöhnung. \r\n\r\nMaxi Pixi – die kleinen großen Bilderbücher im Softcover', 4, 4),
(4, 'Professor Schwurbelstein und die Aluhüte des Grauens', '978-3-404-61737-1', 320, '2022-05-27 11:54:52', 'Verschwörungsfantasien sind spätestens seit der Erfindung der YouTube-Universität ein fester Bestandteil des Internets und mittlerweile besonders aus den sozialen Netzwerken nicht mehr wegzudenken. Anhänger diverser Verschwörungsmythen rotten sich in zahlreichen Online-Communities zusammen, um sich gegenseitig in ihrer Anschauungsweise zu bestätigen. Dabei reicht die Auswahl von dubiosen unwissenschaftlichen Märchengebilden, krassen politischen Aussagen an der Grenze der Strafbarkeit, über skurrile pseudowissenschaftliche „Enthüllungen“ bis hin zu schrägen esoterischen Weltanschauungen. Mit Witz und Scharfsinn erzählt der Autor von Verschwörungstheorien, die alles andere als harmlos zu bewerten sind und von Hirngespinsten, die weitrechende Konsequenzen haben können.', 1, 1),
(5, 'Digitale Forensik. Die Zukunft der Verbrechensaufklärung', '978-3-431-05032-5', 240, '2022-04-29 11:56:49', 'Es sind scheinbar aussichtslose Fälle: Das Kind, das von einer Brücke in den Tod stürzte. Das Video, auf dem zu hören und zu sehen ist, wie im Leipziger Rockerkrieg ein Mann erschossen wird. Oder der Tatort eines schweren Raubes, an dem es zwar viele Spuren aber nur wenige Erkenntnisse gibt. Er rekonstruiert Tatorte in 3-D-Modellen, simuliert den Tathergang und schafft digitale Doubles von Opfern und Tätern. Immer dann, wenn Ermittler mit klassischen Methoden der Spurenauswertung nicht weiterkommen, wenden sie sich an Dirk Labudde. Anhand seiner spannendsten Fälle zeigt er, dass die Zukunft der digitalen Forensik längst begonnen hat, welche Chancen darin liegen, aber auch welche Risiken.', 1, 1),
(6, 'Bin ich das?\r\nEine kurze Geschichte der Selbstauskunft', '978-3-10-397099-9', 192, '2021-11-24 12:08:51', 'Was steckt eigentlich hinter dem neuen Zwang, sich zu zeigen? Mit viel Humor, Selbstironie und klugen Beobachtungen erzählt Valentin Groebner – »eine(r) der coolsten Geschichtswissenschaftler momentan überhaupt« (litera.taz) – seine kurze Geschichte der Selbstauskunft.\r\nDenn ob im Bewerbungsgespräch oder per Instagram-Account, bei der Teambildung oder im Dating-Profil: Ohne Selbstauskunft geht heute nichts. Sie ist sowohl Lockstoff als auch Pflicht, steht für Reklame in eigener Sache und das Ver', 2, 3),
(7, 'Macht und Wahn\r\nDer politische Krieg zwischen den USA und Russland seit 1945', '978-3-10-091072-1', 352, '2021-07-28 12:11:01', 'Wieder liefert Tim Weiner, der Geheimdienstexperte und Pulitzer-Preisträger, eine packende und eindringliche Darstellung politischer Machtspiele. In »Macht und Wahn« beleuchtet er die bilaterale Beziehung zwischen den Großmächten Russland und USA.\r\nGespickt mit Insiderberichten zeichnet Weiner fesselnd und anschaulich die Wurzeln dieses inzwischen über 75 Jahre andauernden Kampfes nach, den Amerika und Russland von 1945 bis 2020 mit Spionage, Diplomatie, Sabotage und Desinformation miteinander ausfechten. Weiner führt hinter verschlossene Türen und lässt die Protagonisten – Präsidenten, Politiker, Hintermänner – beider Seiten des Ost-West-Konflikts zu Wort kommen. Er beleuchtet die Machenschaften des KGB und der CIA und ihre Folgen für die Zeitgeschichte.\r\nHeute sehen die einst als Sieger aus dem Kalten Krieg hervorgegangenen USA ihre Demokratie in Gefahr. Denn Russland griff unter Wladimir Putin bereits zu einem Rückschlag an, der die USA gänzlich unvorbereitet traf: Mittels einer verdeckten Kampagne über Internet und Soziale Medien nahm die russische Regierung Einfluss auf die US-Präsidentschaftswahl 2016 und stellte so sicher, dass ihr Wunschkandidat, Donald Trump, das Weiße Haus bezog. Auch das dagegen eingeleitete Amtsenthebungsverfahren richtete nichts aus. Erneut verhärten sich die Fronten, der Ausgang dieses realen Politthrillers jedoch bleibt ungewiss.', 3, 3),
(8, 'Notizzettel\r\nDenken und Schreiben im 21. Jahrhundert', '978-3-10-397330-3', 592, '2021-04-28 13:48:09', '»Ohne die Zettel, also allein durch Nachdenken, würde ich auf solche Ideen nicht kommen.«\r\nNiklas Luhmann\r\n\r\nDer Kommunikations- und Medienwissenschaftler Hektor Haarkötter hat die erste Kulturgeschichte des Notizzettels geschrieben und gleichzeitig eine Philosophie dieses unscheinbaren Mediums verfasst. Denn Notizzettel – Einkaufszettel, Spickzettel, Schmierzettel, Skizzen, Entwürfe, Karteikarten, Haftnotizen, Wandkritzeleien – sind der erste Haltepunkt vom Gedanken zum Geschriebenen: Ich denke, also notiere ich. Wer den Menschen beim Notieren zusieht, der kann ihnen beim Denken zusehen.\r\nErstmals erzählt Hektor Haarkötter die Kulturgeschichte des Notizzettels von den dunklen Anfängen bis in die unklare Zukunft und formuliert gleichzeitig dessen Theorie. Ob als Knochengerüst der Literatur, als Laborbuch der Naturwissenschaften oder als handgeschriebene Notiz im zeitgeistigen Notizbuch: Der Notizzettel ist Hard- und Software in einem, nicht nur ein Medium des Denkens, sondern vielleicht das Denken selbst.\r\n»Notizzettel« schließt eine Lücke, die bisher überhaupt noch niemand vermisst hat, und geht zwei so spektakulären wie spekulativen Hypothesen nach: Medien sind nicht zum Kommunizieren da, und Medien sind auch nicht zum Erinnern da! Mit auf die Reise durch die schillernde Welt der Notizzettel gehen Lionardo da Vinci, Ludwig Wittgenstein, Astrid Lindgren, Robert Walser, Hans Heberle, Georg Christoph Lichtenberg, Arno Schmidt, Herta Müller, Niklas Luhmann uvm. Die Wahrheit hinter »Zettel’s Traum« wird ebenso erzählt wie die Geschichte der Graffiti als »Notizen an der Wand«: Der erste »Sprayer« war übrigens ein Österreich zu Beginn des 19. Jahrhunderts, dessen Name heute weitgehend vergessen ist, obwohl er ihn manisch an Wände, Felsen und Mobiliar geschrieben hat.\r\nDie Entwicklung des Zettelkastens wird ebenso geschildert wie seine Bedeutung für den Büroalltag des 20. Jahrhunderts.\r\nVor allem geht »Notizzettel« aber der Frage nach, wie sich die Praxis des Notierens und des Schreibens im Übergang zum digitalen Zeitalter verändert hat und welche Auswirkungen das auf das Denken und die Kommunikation hat. Die Bedeutung des Notizzettels für die Kulturgeschichte des Denkens ist nach der Lektüre dieses Buches nicht mehr zu unterschätzen.', 3, 3),
(9, 'Die Nachtigall singt nicht mehr\r\nDie Karl-Wieners-Reihe, Band 2', '978-3-596-00030-2', 448, '2022-03-30 13:50:38', 'München 1955. Zwischen Aufschwung, Fortschrittsglauben und neuen Feindbildern geraten drei Menschen ins Visier eines mächtigen Gegners – der zweite Band der 1950er-Jahre-Trilogie um den Journalisten Karl Wieners, seine Nichte Magda und den Privatdetektiv Ludwig Gruber\r\n\r\nIm Sommer 1955 arbeitet der Journalist Karl Wieners an einer Reportage über Emigranten in München. Seine Nichte Magda ist als Fotografin dabei und freundet sich mit der jungen Agota aus Litauen an, die Karl merkwürdig vorkommt, ohne dass er sagen könnte, weshalb. Und sie ist nicht die Einzige, die Karl und Magda Rätsel aufgibt.\r\n\r\nZur gleichen Zeit versucht der Privatdetektiv Ludwig Gruber den angeblichen Selbstmord eines Jugendlichen aufzuklären. Doch womit er es wirklich zu tun hat, ahnt er erst, als sich Verbindungen zu Karls und Magdas Recherche ergeben.\r\n\r\nNoch bevor sie alle die genauen Zusammenhänge begreifen, geht in einem Schwabinger Postamt eine Paketbombe hoch und tötet zwei Menschen ...', 6, 3),
(10, 'Love with Pride', '978-3-7335-5019-6', 384, '2021-08-25 13:52:53', 'Neue Stadt, neues Ich: Als die introvertierte Stella ihr Studium am College in Haydensburgh beginnt, ist sie froh, ihr altes Leben hinter sich zu lassen. Sie möchte nicht länger die unbeliebte, unsichtbare Außenseiterin sein. Dieses Mal wird alles anders, dieses Mal wird sie Freund*innen finden und ganz sie selbst sein können.\r\n\r\nDann trifft sie auf Ellie, die so ganz anders ist als sie selbst – impulsiv, immer fröhlich –, und ihr ganzes Leben steht plötzlich Kopf. Denn diese Freundschaft fühlt sich nach mehr an, so etwas hat Stella noch nie erlebt. Doch im Gegensatz zu Ellie kann sie mit ihren Gefühlen nicht offen umgehen, und das könnte den Anfang vom Ende der beiden bedeuten.\r\n\r\nDieser New-Adult-Roman ist perfekt geeignet für alle, die sich mehr Diversity und LGBTQIAP+ Repräsentation in Liebesromanen wünschen – und für alle, die bereits mit Micah und Julian (»Someone New«, Laura Kneidl) mitgefiebert haben!', 4, 3),
(11, 'Wir orientieren uns in Europa\r\n', '978-3-464-65658-7', 32, NULL, 'Wir orientieren uns · Topographische Arbeitshefte', 5, 2),
(12, 'Going CLIL - Prep Course\r\nMaterialien für den bilingualen Unterricht\r\nFachübergreifende Begleitmaterialien · 5./6. Schuljahr', '978-3-06-031051-7', 88, NULL, 'Bundesland\r\nBaden-Württemberg, Bayern, Berlin, Brandenburg, Bremen, Hamburg, Hessen, Mecklenburg-Vorpommern, Niedersachsen, Nordrhein-Westfalen, Rheinland-Pfalz, Saarland, Sachsen, Sachsen-Anhalt, Schleswig-Holstein, Thüringen\r\nSchulform\r\nAbendschulen, Gesamtschulen, Grundschulen, Gymnasien, Realschulen, Seminar 2. und 3.Phase\r\nFach\r\nEnglisch, Erdkunde/Geographie, Geschichte, Gesellschaftswissenschaften\r\nKlasse\r\n5. Klasse, 6. Klasse', 5, 2),
(13, 'Physik für die Forscherkiste · Sofort einsetzbare Freiarbeitsmaterialien zu zentralen Lehrplaninhalten\r\nEntdecken und Forschen in Naturwissenschaften - Sekundarstufe I\r\nKlassen 5-10\r\n', '978-3-589-16603-9', 68, NULL, 'Physik erforschen und entdecken\r\nMithilfe dieser Lernkarten setzen sich Schüler/-innen selbstständig und motiviert mit spannenden Fragen der Physik auseinander. Sie lernen nicht einfach, sondern forschen und entdecken. Gleichzeitig schulen sie ihre Problemlösungskompetenz und üben, den eigenen Lösungsweg zu dokumentieren. Das abwechslungsreiche Material behandelt die Themen\r\n\r\nMechanik,\r\nkomplexe Schaltungen,\r\nAuftrieb und Verdrängung sowie\r\nWärmelehre.\r\nMateriallisten erleichtern die Vorbereitung, knappe didaktisch-methodische Hinweise den passgenauen Einsatz.', 5, 2),
(14, 'DIE LETZTE JAGD', '978-3-404-18778-2', 399, '2022-05-27 14:02:50', 'Wie ein Wild erlegt – so wurde Jürgen von Geyersberg, Erbe eines Millionenvermögens, auf den französischen Ländereien seiner Familie aufgefunden. Kommissar Pierre Niémans und seine junge Kollegin Ivana verlieren keine Zeit, sich in die süddeutsche Heimat der von Geyersbergs zu begeben. In einer mondänen Villa am Titisee scheint ihnen die schillernde Laura, die Schwester des Opfers, etwas zu verschweigen. Ein weiterer Mord in selber Manier geschieht, und Niémans und Ivana erkennen zu spät, dass im Schatten des mächtigen Schwarzwaldes abermals die Jagd begonnen hat – auf jeden, der dem abgründigen Familiengeheimnis der von Geyersbergs auf die Spur kommt …', 6, 1),
(15, 'Tod auf Schloss Windsor', '978-3-404-18581-8', 512, '2022-05-27 00:04:56', 'Die Queen ist erschüttert. Während der Vorbereitung der \"Woche des Prunks\" kommt es zu einem Mord auf Schloss Windsor! Der liebenswürdige Kunstkurator Roger Pettibon wird tot aufgefunden. In seinem Rücken steckt ein Schwert, das normalerweise für die Investitur neuer Ritter des Hosenbandordens genutzt wird, um sein Knie ist ein royales Hosenband gebunden. Wer kann eine solch furchtbare Tat begangen haben? Die Polizei leitet umgehend Ermittlungen ein, aber auch der Spürsinn der Queen ist wieder geweckt. Und daher macht sie sich erneut gemeinsam mit Hausmädchen Jane Bee auf die Suche nach dem kaltblütigen Mörder ... ', 6, 1),
(16, 'Agatha Raisin und das tödliche Kirchenfest', '978-3-404-18579-5', 253, '2022-05-27 14:06:31', 'Agatha Raisin kommt es mehr als gelegen, dass der attraktive Witwer George Selby sie bittet, ihn bei der Organisation eines Kirchenfestes zu unterstützen. Die Freude ist groß, als dieses ein großer Erfolg zu werden scheint und die Gäste von überallher herbeiströmen. Doch dann geschieht das Unfassbare: Einigen der Marmeladen, die auf dem Fest angeboten werden, wurde Gift beigemischt, und die fröhliche Feier wird zum Tatort, als gleich zwei Menschen daran sterben. Gemeinsam mit ihrer Assistentin Toni macht sich Agatha auf die Suche nach dem hinterhältigen Mörder und stößt dabei auf die dunklen Geheimnisse des Dorfes ...', 6, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `buchgenrezuordnung`
--

CREATE TABLE `buchgenrezuordnung` (
  `BgzID` int(11) NOT NULL,
  `BuchID` int(11) NOT NULL,
  `GenreID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `buchgenrezuordnung`
--

INSERT INTO `buchgenrezuordnung` (`BgzID`, `BuchID`, `GenreID`) VALUES
(1, 1, 5),
(2, 2, 2),
(3, 3, 2),
(4, 5, 1),
(5, 6, 1),
(6, 8, 1),
(7, 9, 3),
(8, 9, 4),
(9, 10, 2),
(10, 11, 1),
(11, 12, 1),
(12, 13, 1),
(13, 14, 4),
(14, 15, 4),
(15, 16, 4),
(16, 1, 2),
(17, 2, 5),
(18, 3, 5);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `genre`
--

CREATE TABLE `genre` (
  `GenreID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `genre`
--

INSERT INTO `genre` (`GenreID`, `Name`) VALUES
(1, 'Sachbuch'),
(2, 'Kinderbuch'),
(3, 'Roman'),
(4, 'Krimi'),
(5, 'Comic');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kunde`
--

CREATE TABLE `kunde` (
  `KundenID` int(11) NOT NULL,
  `Nachname` varchar(30) NOT NULL,
  `Vorname` varchar(30) NOT NULL,
  `Straße` varchar(30) NOT NULL,
  `Hausnummer` int(11) NOT NULL,
  `PLZ` varchar(12) NOT NULL,
  `Geburtsdatum` datetime NOT NULL,
  `Email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `kunde`
--

INSERT INTO `kunde` (`KundenID`, `Nachname`, `Vorname`, `Straße`, `Hausnummer`, `PLZ`, `Geburtsdatum`, `Email`) VALUES
(1, 'Doe', 'Jane', 'Westwood Avenue', 3929, '10001 ', '1980-05-30 11:05:12', 'jane.doe@mail.com'),
(2, 'Maurer', 'Janine', 'Willy-Brandt-Platz ', 1, '60311', '1992-11-11 11:11:50', 'maurer.janine@gmx.de'),
(3, 'Mustermann', 'Max', 'Lessingstr', 11, '76135', '2001-08-30 11:13:59', 'max_mustermann@mail.de'),
(4, 'Berger', 'Klaus', 'Schlossplatz', 14, '76131', '1971-01-10 11:18:23', 'bergerklaus@gmail.com'),
(5, 'Paulsen', 'Ingrid', 'Alstertor', 21, '20095', '1965-04-20 11:20:43', 'paulsen_ingrid@web.de');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `lagerplatz`
--

CREATE TABLE `lagerplatz` (
  `LagerplatzID` int(11) NOT NULL,
  `Stockwerksnummer` int(11) NOT NULL,
  `Regalnummer` int(11) NOT NULL,
  `Regalfach` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `lagerplatz`
--

INSERT INTO `lagerplatz` (`LagerplatzID`, `Stockwerksnummer`, `Regalnummer`, `Regalfach`) VALUES
(1, 0, 10, 5),
(2, 0, 10, 8),
(3, 1, 5, 100),
(4, 2, 150, 25),
(5, 4, 61, 3),
(6, 2, 120, 1),
(7, 3, 2, 50),
(8, 3, 15, 4);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ort`
--

CREATE TABLE `ort` (
  `PLZ` varchar(12) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Land` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `ort`
--

INSERT INTO `ort` (`PLZ`, `Name`, `Land`) VALUES
('10001 ', 'New York City, NY', 'USA'),
('10115', 'Berlin-Mitte', 'GERMANY'),
('20095', 'Hamburg-Mitte', 'GERMANY'),
('51063', 'Köln', 'Germany'),
('60311', 'Frankfurt am Main', 'GERMANY'),
('76131', 'Karlsruhe-Innenstadt', 'GERMANY'),
('76135', 'Karlsruhe-West', 'GERMANY'),
('79098', 'Freiburg im Breisgau', 'GERMANY');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `verlag`
--

CREATE TABLE `verlag` (
  `VerlagID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Telefonnummer` varchar(25) NOT NULL,
  `Straße` varchar(30) NOT NULL,
  `Hausnummer` int(11) NOT NULL,
  `PLZ` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `verlag`
--

INSERT INTO `verlag` (`VerlagID`, `Name`, `Email`, `Telefonnummer`, `Straße`, `Hausnummer`, `PLZ`) VALUES
(1, 'Bastei Lübbe AG', 'info@luebbe.de', '0221 - 8200 0', 'Schanzenstr', 6, '51063'),
(2, 'Cornelsen Verlag GmbH', 'service@cornelsen.de', '(030) 897 85-0', 'Mecklenburgische Straße', 53, '10115'),
(3, 'S. FISCHER Verlag GmbH', 'kontakt@fischerverlage.de', '(0) 69/6062-0', 'Hedderichstraße', 114, '60311'),
(4, 'CARLSEN Verlag GmbH', 'info@carlsen.de', '040 39 804 0', 'Völckersstraße ', 14, '20095');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `ausleihe`
--
ALTER TABLE `ausleihe`
  ADD PRIMARY KEY (`AusleiheID`),
  ADD UNIQUE KEY `ausleihe_fk_buch` (`BuchID`),
  ADD KEY `ausleihe_fk_kunde` (`KundenID`);

--
-- Indizes für die Tabelle `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`AutorID`);

--
-- Indizes für die Tabelle `autorbuchzuordnung`
--
ALTER TABLE `autorbuchzuordnung`
  ADD PRIMARY KEY (`AbzID`),
  ADD KEY `abz_fk_autor` (`AutorID`),
  ADD KEY `abz_fk_buch` (`BuchID`);

--
-- Indizes für die Tabelle `buch`
--
ALTER TABLE `buch`
  ADD PRIMARY KEY (`BuchID`),
  ADD KEY `buch_fk_lagerplatz` (`LagerplatzID`),
  ADD KEY `buch_fk_verlag` (`VerlagID`);

--
-- Indizes für die Tabelle `buchgenrezuordnung`
--
ALTER TABLE `buchgenrezuordnung`
  ADD PRIMARY KEY (`BgzID`),
  ADD KEY `bgz_fk_buch` (`BuchID`),
  ADD KEY `bgz_fk_genre` (`GenreID`);

--
-- Indizes für die Tabelle `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`GenreID`);

--
-- Indizes für die Tabelle `kunde`
--
ALTER TABLE `kunde`
  ADD PRIMARY KEY (`KundenID`),
  ADD UNIQUE KEY `PLZ` (`PLZ`);

--
-- Indizes für die Tabelle `lagerplatz`
--
ALTER TABLE `lagerplatz`
  ADD PRIMARY KEY (`LagerplatzID`);

--
-- Indizes für die Tabelle `ort`
--
ALTER TABLE `ort`
  ADD PRIMARY KEY (`PLZ`);

--
-- Indizes für die Tabelle `verlag`
--
ALTER TABLE `verlag`
  ADD PRIMARY KEY (`VerlagID`),
  ADD KEY `verlag_fk_ort` (`PLZ`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `ausleihe`
--
ALTER TABLE `ausleihe`
  MODIFY `AusleiheID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `autor`
--
ALTER TABLE `autor`
  MODIFY `AutorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT für Tabelle `autorbuchzuordnung`
--
ALTER TABLE `autorbuchzuordnung`
  MODIFY `AbzID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT für Tabelle `buch`
--
ALTER TABLE `buch`
  MODIFY `BuchID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT für Tabelle `buchgenrezuordnung`
--
ALTER TABLE `buchgenrezuordnung`
  MODIFY `BgzID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT für Tabelle `genre`
--
ALTER TABLE `genre`
  MODIFY `GenreID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `kunde`
--
ALTER TABLE `kunde`
  MODIFY `KundenID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `lagerplatz`
--
ALTER TABLE `lagerplatz`
  MODIFY `LagerplatzID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `verlag`
--
ALTER TABLE `verlag`
  MODIFY `VerlagID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `ausleihe`
--
ALTER TABLE `ausleihe`
  ADD CONSTRAINT `ausleihe_fk_buch` FOREIGN KEY (`BuchID`) REFERENCES `buch` (`BuchID`),
  ADD CONSTRAINT `ausleihe_fk_kunde` FOREIGN KEY (`KundenID`) REFERENCES `kunde` (`KundenID`);

--
-- Constraints der Tabelle `autorbuchzuordnung`
--
ALTER TABLE `autorbuchzuordnung`
  ADD CONSTRAINT `abz_fk_autor` FOREIGN KEY (`AutorID`) REFERENCES `autor` (`AutorID`),
  ADD CONSTRAINT `abz_fk_buch` FOREIGN KEY (`BuchID`) REFERENCES `buch` (`BuchID`);

--
-- Constraints der Tabelle `buch`
--
ALTER TABLE `buch`
  ADD CONSTRAINT `buch_fk_lagerplatz` FOREIGN KEY (`LagerplatzID`) REFERENCES `lagerplatz` (`LagerplatzID`),
  ADD CONSTRAINT `buch_fk_verlag` FOREIGN KEY (`VerlagID`) REFERENCES `verlag` (`VerlagID`);

--
-- Constraints der Tabelle `buchgenrezuordnung`
--
ALTER TABLE `buchgenrezuordnung`
  ADD CONSTRAINT `bgz_fk_buch` FOREIGN KEY (`BuchID`) REFERENCES `buch` (`BuchID`),
  ADD CONSTRAINT `bgz_fk_genre` FOREIGN KEY (`GenreID`) REFERENCES `genre` (`GenreID`);

--
-- Constraints der Tabelle `kunde`
--
ALTER TABLE `kunde`
  ADD CONSTRAINT `kunde_fk_ort` FOREIGN KEY (`PLZ`) REFERENCES `ort` (`PLZ`);

--
-- Constraints der Tabelle `verlag`
--
ALTER TABLE `verlag`
  ADD CONSTRAINT `verlag_fk_ort` FOREIGN KEY (`PLZ`) REFERENCES `ort` (`PLZ`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
