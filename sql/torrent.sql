-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 30 Oca 2017, 22:25:27
-- Sunucu sürümü: 10.1.16-MariaDB
-- PHP Sürümü: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `torrent`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `site_title` varchar(160) NOT NULL,
  `site_description` varchar(400) NOT NULL,
  `site_keywords` varchar(400) NOT NULL,
  `site_metalar` varchar(1000) NOT NULL,
  `site_adres` varchar(200) NOT NULL,
  `editorDizi` int(11) NOT NULL DEFAULT '1',
  `indexEnCokInd` tinyint(4) NOT NULL DEFAULT '4',
  `indexFilmSayi` tinyint(4) NOT NULL DEFAULT '8',
  `indexOyunSayi` tinyint(4) NOT NULL DEFAULT '4',
  `indexDiziBolumSayi` tinyint(4) NOT NULL DEFAULT '4',
  `indexProgramSayi` tinyint(4) NOT NULL DEFAULT '4',
  `Sidebar1Baslik` varchar(150) NOT NULL,
  `Sidebar1Icerik` text NOT NULL,
  `Sidebar2Baslik` varchar(150) NOT NULL,
  `Sidebar3Baslik` varchar(150) NOT NULL,
  `Sidebar3Sayi` tinyint(4) NOT NULL DEFAULT '6',
  `Sidebar4Baslik` varchar(150) NOT NULL,
  `Sidebar5Baslik` varchar(150) NOT NULL,
  `Sidebar5Sayi` tinyint(4) NOT NULL DEFAULT '6',
  `Sidebar6Baslik` varchar(150) NOT NULL,
  `Sidebar6Sayi` tinyint(4) NOT NULL DEFAULT '6',
  `SayfaFilm` tinyint(4) NOT NULL DEFAULT '16',
  `SayfaOyun` tinyint(4) NOT NULL DEFAULT '16',
  `SayfaProgram` tinyint(4) NOT NULL DEFAULT '16',
  `SayfaDizi` tinyint(4) NOT NULL DEFAULT '16',
  `reklamSidebarDurum` tinyint(1) NOT NULL DEFAULT '0',
  `reklamSidebar` text NOT NULL,
  `reklamKisaltmaDurum` tinyint(1) NOT NULL DEFAULT '0',
  `reklamKisaltma` varchar(500) NOT NULL,
  `reklamPosterDurum` tinyint(1) NOT NULL DEFAULT '0',
  `reklamPoster` text NOT NULL,
  `reklamIcDurum` tinyint(1) NOT NULL DEFAULT '0',
  `reklamIc` text NOT NULL,
  `reklamPopupDurum` tinyint(1) NOT NULL DEFAULT '0',
  `reklamPopup` text NOT NULL,
  `reklamSplashDurum` tinyint(1) NOT NULL DEFAULT '0',
  `reklamSplash` text NOT NULL,
  `reklamAltDurum` tinyint(1) NOT NULL DEFAULT '0',
  `reklamAlt` text NOT NULL,
  `yatayHeryerDurum` tinyint(1) NOT NULL DEFAULT '0',
  `yatayHeryer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`site_title`, `site_description`, `site_keywords`, `site_metalar`, `site_adres`, `editorDizi`, `indexEnCokInd`, `indexFilmSayi`, `indexOyunSayi`, `indexDiziBolumSayi`, `indexProgramSayi`, `Sidebar1Baslik`, `Sidebar1Icerik`, `Sidebar2Baslik`, `Sidebar3Baslik`, `Sidebar3Sayi`, `Sidebar4Baslik`, `Sidebar5Baslik`, `Sidebar5Sayi`, `Sidebar6Baslik`, `Sidebar6Sayi`, `SayfaFilm`, `SayfaOyun`, `SayfaProgram`, `SayfaDizi`, `reklamSidebarDurum`, `reklamSidebar`, `reklamKisaltmaDurum`, `reklamKisaltma`, `reklamPosterDurum`, `reklamPoster`, `reklamIcDurum`, `reklamIc`, `reklamPopupDurum`, `reklamPopup`, `reklamSplashDurum`, `reklamSplash`, `reklamAltDurum`, `reklamAlt`, `yatayHeryerDurum`, `yatayHeryer`) VALUES
('Torrent Sitesi', 'Torrent sitesi açıklaması', 'torrent,indir,torrent indir', '', 'http://localhost/torrent', 9, 4, 8, 4, 4, 4, ' Torrent İndirme', 'Torrentleri sorunsuz indirin.', 'Detaylı Arama', 'En Çok Bakılan Filmler', 6, 'Editörün Seçtiği Dizi:', 'En Çok Bakılan Programlar', 6, 'İMDB Puanı En Yüksek Filmler', 9, 16, 16, 16, 14, 0, '<a href="/reklam/"><img src="http://www.ekonomibilgisi.com/img/250x300-reklam.jpg" width="300" height="250" /></a>', 0, 'http://bc.vc/10454/', 0, '<a href="/reklam/"><img src="http://i.hizliresim.com/o3jyR7.gif" /></a>', 0, '<a href="/reklam/"><img src="http://www.ekonomibilgisi.com/img/250x300-reklam.jpg" width="300" height="250" /></a>', 0, '', 0, '', 0, '<a href="/reklam/"><img src="https://lh5.ggpht.com/NFYFP2H9CCP50vAQNLa7AtCj_mbbYmOzY978fZqd31oL5qOdvXgxU3KW8ek2VgvIOvTqWY0=w728" width="728" height="90" /></a>', 0, '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `diziler`
--

CREATE TABLE `diziler` (
  `id` int(11) NOT NULL,
  `adi` varchar(200) NOT NULL,
  `seo` varchar(200) NOT NULL,
  `aciklama` varchar(300) NOT NULL,
  `icerik` text NOT NULL,
  `turu` varchar(20) NOT NULL,
  `imdb` float NOT NULL,
  `fragman` varchar(50) NOT NULL,
  `eklenme` datetime NOT NULL,
  `sayac_goruntuleme` int(11) NOT NULL DEFAULT '0',
  `durum` tinyint(1) NOT NULL DEFAULT '0',
  `user` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `dizi_bolumler`
--

CREATE TABLE `dizi_bolumler` (
  `id` int(11) NOT NULL,
  `adi` varchar(200) NOT NULL,
  `seo` varchar(200) NOT NULL,
  `copySeo` varchar(200) NOT NULL DEFAULT '0',
  `dizi_id` int(11) NOT NULL,
  `sezon` tinyint(2) NOT NULL,
  `bolum` tinyint(2) NOT NULL,
  `aciklama` varchar(300) NOT NULL,
  `icerik` text NOT NULL,
  `surum` varchar(50) NOT NULL,
  `kalite` tinyint(1) NOT NULL,
  `boyut` varchar(20) NOT NULL,
  `link1` varchar(200) NOT NULL,
  `link2` varchar(200) NOT NULL,
  `altyazi1` varchar(200) NOT NULL,
  `altyazi2` varchar(200) NOT NULL,
  `fragman` varchar(50) NOT NULL,
  `eklenme` datetime NOT NULL,
  `sayac_goruntuleme` int(11) NOT NULL DEFAULT '0',
  `sayac_indirilme` int(11) NOT NULL DEFAULT '0',
  `inTur` tinyint(1) NOT NULL DEFAULT '3',
  `durum` tinyint(1) NOT NULL DEFAULT '0',
  `user` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `dizi_turleri`
--

CREATE TABLE `dizi_turleri` (
  `id` int(11) NOT NULL,
  `adi` varchar(50) NOT NULL,
  `seo` varchar(50) NOT NULL,
  `aciklama` varchar(300) NOT NULL,
  `anahtar` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `dizi_turleri`
--

INSERT INTO `dizi_turleri` (`id`, `adi`, `seo`, `aciklama`, `anahtar`) VALUES
(3, 'Komedi', 'komedi-dizileri', '', ''),
(4, 'Aile', 'aile-dizileri', '', ''),
(5, 'Animasyon', 'animasyon-anime-dizileri', '', ''),
(6, 'Belgesel', 'belgesel-dizileri', '', ''),
(7, 'Biyografi', 'biyografi-dizileri', '', ''),
(9, 'Fantastik', 'fantastik-dizileri', '', ''),
(10, 'Gerilim', 'gerilim-dizileri', '', ''),
(11, 'Gizem', 'gizem-dizileri', '', ''),
(12, 'Korku', 'korku-dizileri', '', ''),
(13, 'Macera', 'macera-dizileri', '', ''),
(14, 'Romantik', 'romantik-dizileri', '', ''),
(15, 'Savaş', 'savas-dizileri', '', ''),
(16, 'Spor', 'spor-dizileri', '', ''),
(17, 'Suç', 'suc-dizileri', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `filmler`
--

CREATE TABLE `filmler` (
  `id` int(11) NOT NULL,
  `adi` varchar(200) NOT NULL,
  `adiEng` varchar(200) NOT NULL,
  `seo` varchar(200) NOT NULL,
  `copySeo` varchar(200) NOT NULL DEFAULT '0',
  `aciklama` varchar(300) NOT NULL,
  `icerik` text NOT NULL,
  `turu` varchar(20) NOT NULL,
  `surum` varchar(100) NOT NULL,
  `imdb` float NOT NULL DEFAULT '0',
  `imdbCode` int(11) NOT NULL,
  `boyut` varchar(10) NOT NULL,
  `kalite` tinyint(1) NOT NULL,
  `eklenme` datetime NOT NULL,
  `seriMi` int(11) NOT NULL DEFAULT '0',
  `yili` varchar(4) NOT NULL,
  `link1` varchar(250) NOT NULL,
  `link2` varchar(250) NOT NULL,
  `fragman` varchar(150) NOT NULL,
  `altyazi1` varchar(300) NOT NULL,
  `altyazi2` varchar(300) NOT NULL,
  `sayac_goruntuleme` int(11) NOT NULL DEFAULT '0',
  `sayac_indirilme` int(11) NOT NULL DEFAULT '0',
  `inTur` tinyint(1) NOT NULL DEFAULT '1',
  `durum` tinyint(1) NOT NULL DEFAULT '0',
  `user` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `film_seri`
--

CREATE TABLE `film_seri` (
  `id` int(11) NOT NULL,
  `adi` varchar(200) NOT NULL,
  `seo` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `film_turleri`
--

CREATE TABLE `film_turleri` (
  `id` int(11) NOT NULL,
  `adi` varchar(50) NOT NULL,
  `seo` varchar(50) NOT NULL,
  `aciklama` varchar(300) NOT NULL,
  `anahtar` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `film_turleri`
--

INSERT INTO `film_turleri` (`id`, `adi`, `seo`, `aciklama`, `anahtar`) VALUES
(1, 'Aksiyon', 'aksiyon-filmleri-indir', 'Torrent film indirin aksiyon filmlerini torrent ile full indirin. 720p, 1080p BluRay filmleri torrent indirin.', 'torrent,full torrent,fulltorrent,film torrent,torrent film,aksiyon film,aksiyon filmi torrent,torrent aksiyon indir,torrent action films,torrent aksiyon filmleri,film indir torrent'),
(2, 'Bilim Kurgu', 'bilim-kurgu-filmleri-indir', 'Torrent bilim kurgu - science fiction filmleri indirin. Yüksek kalite 720p, 1080p torrent film indirip bilim kurgu filmleri izleyin.', 'bilim kurgu,bilim kurgu film indir,torrent bilim kurgu,torrent indir,torrent film,torrent,full torrent,fulltorrent,torrent film indir,torrent bilim kurgu filmi'),
(3, 'Komedi', 'komedi-filmleri-indir', 'Komedi filmlerini görüp torrent indirin. Full yüksek kalitede filmleri torrent ile indirip seyredebilirsiniz. BluRay 720p 1080p film indir. Torrent komedi indir izle.', 'komedi,komedi filmi,torrent komedi,torrent,torrent indir,torrent film,torrent film indir,torrent komedi film,torrent full komedi film indir'),
(5, 'Animasyon', 'animasyon-anime-filmleri-indir', 'Animasyon ve Anime filmleri torrent indir. Full torrent ile yüksek çözünürlüklü filmleri indirip seyredin.', 'torrent,torrent indir,torrent film,torrent film indir,full indir,full torrent,fulltorrent,torrent animasyon indir,torrent anime indir,torrent full animasyon indir'),
(6, 'Belgesel', 'belgesel-filmleri-indir', 'Torrent ile belgesel filmleri indirin. 1080p, 720p gibi yüksek çözünürlükte indirin ve seyredin', 'torrent,torrent indir,torrent film,torrent film indir,full indir,full torrent,fulltorrent,belgesel indir,belgesel torrent,torrent belgesel,full belgesel indir,torrent belgesel indir'),
(7, 'Biyografi', 'biyografi-filmleri-indir', 'Biyografi filmleri, torrent biyografi filmleri listesi, biyografi filmlerini torrent ile full indir.', 'torrent,torrent indir,torrent film,torrent film indir,full indir,full torrent,fulltorrent,biyografi,biyografi indir,full biyografi indir,torrent biyografi film indir'),
(8, 'Dram', 'dram-filmleri-indir', 'Dram filmleri, dram filmlerini görüntüleyip torrent ile yüksek kalitede indirebilirsiniz.', 'torrent,torrent indir,torrent film,torrent film indir,full indir,full torrent,fulltorrent,dram filmleri,dram,torrent,torrent dram,torrent dram indir,torrent dram filmi indir'),
(9, 'Fantastik', 'fantastik-filmler-indir', 'Fantasik, can alıcı süper filmleri görüntüleyip indirebileceğiniz torrenti kullanıp yüksek çözünürlüklü filmleri indirip seyredebileceğiniz sayfa.', 'torrent,torrent indir,torrent film,torrent film indir,full indir,full torrent,fulltorrent,fantastik filmler,torrent,torrent film fantastik,fantastik torrent indir,fantastik filmler indir'),
(10, 'Gerilim', 'gerilim-filmleri', '', ''),
(11, 'Gizem', 'gizem-filmleri', '', ''),
(12, 'Korku', 'korku-filmleri', '', ''),
(13, 'Macera', 'macera-filmleri', 'Macera filmlerinin torrent dosyalarının bulunduğu filmler burada listelenmiştir. Tıkadlığınız filmin torrentini indirebilirsiniz.', 'macera filmleri,torrent film,torrent film indir,bluray film torrent,1080p film indir,720p film indir,torrent 1080p,torrent macera film indir'),
(14, 'Romantik', 'romantik-filmler', 'Romantik filmleri torrent indirebilirsiniz. Romantizm tür filmlerin torrent listeleri burada yer almaktadır.', 'romantik,romantizm,romantik film,romantik film indir,romantik film torrent indir,romantizm filmi indir,romantizm filmi torrent indir'),
(15, 'Savaş', 'savas-filmleri', '', ''),
(16, 'Spor', 'spor-filmleri', '', ''),
(17, 'Suç', 'suc-filmleri', '', ''),
(18, 'Western', 'western-filmleri-indir', 'Western türü filmleri torrent indir. Film indir, torrent indir, Torrent ile filmlerin western türü olanları listeleyip tek tek indirebilirsiniz.', 'torrent,film,film indir,film indir izle,torrent film,torrent film izle,torrent western film,western filmleri,western film indir,western film torrent indir'),
(19, 'Müzik', 'muzik-filmleri-indir', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `tarih` datetime NOT NULL,
  `ip` varchar(20) NOT NULL,
  `referans` varchar(200) NOT NULL,
  `uri` varchar(200) NOT NULL,
  `agent` varchar(200) NOT NULL,
  `arama` varchar(150) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `logs`
--

INSERT INTO `logs` (`id`, `tarih`, `ip`, `referans`, `uri`, `agent`, `arama`) VALUES
(1, '2017-01-30 23:06:42', '::1', '', '/torrent/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '0'),
(2, '2017-01-30 23:06:51', '::1', '', '/torrent/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '0'),
(3, '2017-01-30 23:07:13', '::1', '', '/torrent/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '0'),
(4, '2017-01-30 23:08:02', '::1', '', '/torrent/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '0'),
(5, '2017-01-30 23:08:04', '::1', '', '/torrent/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '0'),
(6, '2017-01-30 23:08:42', '::1', '', '/torrent/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '0'),
(7, '2017-01-30 23:08:43', '::1', '', '/torrent/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '0'),
(8, '2017-01-30 23:08:58', '::1', '', '/torrent/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '0'),
(9, '2017-01-30 23:08:58', '::1', '', '/torrent/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '0'),
(10, '2017-01-30 23:08:58', '::1', '', '/torrent/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '0'),
(11, '2017-01-30 23:08:59', '::1', '', '/torrent/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '0'),
(12, '2017-01-30 23:08:59', '::1', '', '/torrent/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '0'),
(13, '2017-01-30 23:09:19', '::1', '', '/torrent/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '0'),
(14, '2017-01-30 23:09:21', '::1', '', '/torrent/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '0'),
(15, '2017-01-30 23:09:29', '::1', '', '/torrent/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '0'),
(16, '2017-01-30 23:11:03', '::1', '', '/torrent/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '0'),
(17, '2017-01-30 23:11:03', '::1', '', '/torrent/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '0'),
(18, '2017-01-30 23:11:51', '::1', '', '/torrent/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '0'),
(19, '2017-01-30 23:12:15', '::1', '', '/torrent/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '0'),
(20, '2017-01-30 23:12:18', '::1', '', '/torrent/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '0'),
(21, '2017-01-30 23:12:20', '::1', '', '/torrent/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '0'),
(22, '2017-01-30 23:12:51', '::1', '', '/torrent/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '0'),
(23, '2017-01-30 23:14:54', '::1', '', '/torrent/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '0'),
(24, '2017-01-30 23:15:21', '::1', '', '/torrent/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '0'),
(25, '2017-01-30 23:19:51', '::1', '', '/torrent/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '0'),
(26, '2017-01-30 23:19:52', '::1', '', '/torrent/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '0'),
(27, '2017-01-30 23:19:56', '::1', '', '/torrent/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '0'),
(28, '2017-01-30 23:20:54', '::1', '', '/torrent/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '0'),
(29, '2017-01-30 23:20:55', '::1', '', '/torrent/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '0'),
(30, '2017-01-30 23:23:19', '::1', '', '/torrent/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '0'),
(31, '2017-01-30 23:23:21', '::1', '', '/torrent/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '0'),
(32, '2017-01-30 23:23:45', '::1', '', '/torrent/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '0'),
(33, '2017-01-30 23:24:40', '::1', '', '/torrent/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '0'),
(34, '2017-01-30 23:25:07', '::1', '', '/torrent/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '0');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `oyunlar`
--

CREATE TABLE `oyunlar` (
  `id` int(11) NOT NULL,
  `adi` varchar(200) NOT NULL,
  `seo` varchar(200) NOT NULL,
  `aciklama` varchar(300) NOT NULL,
  `icerik` text NOT NULL,
  `turu` varchar(10) NOT NULL,
  `surum` varchar(50) NOT NULL,
  `platform` varchar(50) NOT NULL,
  `boyut` varchar(20) NOT NULL,
  `yili` int(4) NOT NULL,
  `tanitim` varchar(20) NOT NULL,
  `link1` varchar(200) NOT NULL,
  `link2` varchar(200) NOT NULL,
  `eklenme` datetime NOT NULL,
  `sayac_goruntuleme` int(11) NOT NULL DEFAULT '0',
  `sayac_indirilme` int(11) NOT NULL DEFAULT '0',
  `inTur` tinyint(1) NOT NULL DEFAULT '2',
  `durum` tinyint(1) NOT NULL DEFAULT '0',
  `user` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `oyun_turleri`
--

CREATE TABLE `oyun_turleri` (
  `id` int(11) NOT NULL,
  `adi` varchar(200) NOT NULL,
  `site_ad` varchar(200) NOT NULL,
  `seo` varchar(200) NOT NULL,
  `aciklama` varchar(300) NOT NULL,
  `anahtar` varchar(300) NOT NULL,
  `icon` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `oyun_turleri`
--

INSERT INTO `oyun_turleri` (`id`, `adi`, `site_ad`, `seo`, `aciklama`, `anahtar`, `icon`) VALUES
(3, 'Strateji', 'Strateji', 'strateji-oyunlari-full-torrent-indir', '', '', 'icon-strateji.png'),
(4, 'Yarış', 'Yarış', 'yaris-oyunlari-full-torrent-indir', '', '', 'icon-yaris.png'),
(5, 'Similasyon', 'Similasyon', 'similasyon-oyunlari-full-torrent-indir', 'Similasyon oyunlarını indirmek için bu sayfada bulunan oyunların resimleri üzerine tıklayarak sayfadan torrent indirebilirsiniz.', 'torrent,torrent oyun,torrent oyun indir,torrent full oyun,full oyun indir,full torrent oyun,similasyon oyunları,torrent similasyon oyun indir', 'icon-similasyon.png'),
(6, 'Küçük Bilgisayar', 'Oyunlar', 'kucuk-oyunlar-full-torrent-indir', '', '', 'icon-oyun.png'),
(7, 'Spor', 'Spor', 'spor-oyunlari-torrent-indir', 'Torrent spor oyunları bu kategori altında bulunmaktadır. Pes, Fifa ve benzeri spor oyunlarını torrent indirebilirsiniz.', 'torrent,torrent oyun,torrent indir,torrent oyun indir,full oyun,full oyun indir,pes torrent,fifa torrent,nba torrent,futbool manager torrent,spor oyunları torrent indir', 'icon-spor.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `programlar`
--

CREATE TABLE `programlar` (
  `id` int(11) NOT NULL,
  `adi` varchar(200) NOT NULL,
  `seo` varchar(200) NOT NULL,
  `aciklama` varchar(300) NOT NULL,
  `icerik` text NOT NULL,
  `turu` varchar(20) NOT NULL,
  `yili` varchar(4) NOT NULL,
  `platform` varchar(100) NOT NULL,
  `boyut` varchar(20) NOT NULL,
  `tanitim` varchar(50) NOT NULL,
  `eklenme` datetime NOT NULL,
  `kullanim` varchar(100) NOT NULL,
  `link1` varchar(200) NOT NULL,
  `link2` varchar(200) NOT NULL,
  `sayac_goruntuleme` int(11) NOT NULL,
  `sayac_indirilme` int(11) NOT NULL,
  `inTur` tinyint(1) NOT NULL DEFAULT '4',
  `durum` tinyint(1) NOT NULL DEFAULT '0',
  `user` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `program_turleri`
--

CREATE TABLE `program_turleri` (
  `id` int(11) NOT NULL,
  `adi` varchar(200) NOT NULL,
  `site_ad` varchar(200) NOT NULL,
  `seo` varchar(200) NOT NULL,
  `aciklama` varchar(300) NOT NULL,
  `anahtar` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `program_turleri`
--

INSERT INTO `program_turleri` (`id`, `adi`, `site_ad`, `seo`, `aciklama`, `anahtar`) VALUES
(2, 'Program', 'Program', 'full-program-indir', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `icerik_id` varchar(150) NOT NULL,
  `icerik_link` varchar(200) NOT NULL,
  `icerik_tur` varchar(20) NOT NULL,
  `tarih` datetime NOT NULL,
  `ip` varchar(20) NOT NULL,
  `durum` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `surumler`
--

CREATE TABLE `surumler` (
  `id` int(11) NOT NULL,
  `adi` varchar(30) NOT NULL,
  `turu` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `surumler`
--

INSERT INTO `surumler` (`id`, `adi`, `turu`) VALUES
(2, 'BluRay', 'film'),
(3, 'x264', 'film'),
(4, 'YİFY', 'film'),
(5, 'SATELLITE', 'film'),
(6, 'SPARKS', 'film'),
(7, 'ROVERS', 'film'),
(8, 'WAF', 'film'),
(9, 'TLF', 'film'),
(10, 'aXXo', 'film'),
(11, 'BDRip', 'film'),
(12, 'HDTV', 'film'),
(13, 'GENEL', 'film'),
(14, 'GENEL', 'oyun'),
(15, 'HC', 'film'),
(16, 'XViD', 'film'),
(17, 'AC3', 'film'),
(18, 'ETRG', 'film'),
(19, 'CODEX', 'oyun'),
(20, 'SKIDROW', 'oyun'),
(21, 'BlackBox', 'oyun'),
(22, 'RELOADED', 'oyun'),
(23, 'FLT', 'oyun'),
(24, 'Early Access', 'oyun'),
(25, 'RePack', 'oyun'),
(26, '3DM', 'oyun'),
(27, 'PROPHET', 'oyun'),
(28, 'HI2U', 'oyun'),
(29, 'WaLMaRT', 'oyun'),
(30, 'DIMENSION', 'film'),
(31, 'x265', 'film'),
(32, 'HEVC', 'film'),
(33, 'O69', 'film'),
(34, 'TS', 'film'),
(35, 'CPG', 'film'),
(36, 'AAC', 'film'),
(37, 'H264', 'film'),
(38, 'RARBG', 'film'),
(39, 'WEBRip', 'film'),
(40, 'MD', 'film'),
(41, 'BzB', 'film'),
(42, 'WEB-DL', 'film'),
(43, 'anoXmous', 'film'),
(44, 'Deceit', 'film'),
(45, 'DVDRIP', 'film'),
(46, 'LoL', 'film'),
(47, 'DD5', 'film'),
(48, 'KiNGS', 'film'),
(49, 'Joy', 'film'),
(50, 'ShAaNiG', 'film'),
(51, '6CH', 'film'),
(52, 'DTS', 'film'),
(53, '3Li', 'film'),
(54, 'DVDSCR', 'film'),
(55, 'CAMRip', 'film'),
(56, 'HDRip', 'film'),
(57, 'HDTS', 'film'),
(58, 'KILLERS', 'film'),
(59, '2HD', 'film'),
(60, 'EVO', 'film'),
(61, '5.1 CH', 'film'),
(62, 'ReEnc-DeeJayAhmed', 'film'),
(63, 'AFG', 'film'),
(64, 'RLSM', 'film'),
(65, 'JYK', 'film'),
(66, 'FUM', 'film'),
(67, 'SPARROW', 'film'),
(68, 'İFT', 'film'),
(69, 'MZABI', 'film'),
(70, 'TRiPS', 'film'),
(71, 'MkvCage', 'film'),
(72, 'CiNEFiLE', 'film');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yoneticiler`
--

CREATE TABLE `yoneticiler` (
  `id` int(11) NOT NULL,
  `yonetici_kullanici` varchar(100) NOT NULL,
  `yonetici_sifre` varchar(100) NOT NULL,
  `yonetici_durum` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `yoneticiler`
--

INSERT INTO `yoneticiler` (`id`, `yonetici_kullanici`, `yonetici_sifre`, `yonetici_durum`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

CREATE TABLE `yorumlar` (
  `id` int(11) NOT NULL,
  `yapan` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `eklenme` datetime NOT NULL,
  `ip` varchar(25) NOT NULL,
  `icerik` text NOT NULL,
  `durum` tinyint(1) NOT NULL,
  `tur` varchar(10) NOT NULL,
  `turID` int(11) NOT NULL,
  `cevap` int(11) NOT NULL DEFAULT '0',
  `user` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `diziler`
--
ALTER TABLE `diziler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `dizi_bolumler`
--
ALTER TABLE `dizi_bolumler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `dizi_turleri`
--
ALTER TABLE `dizi_turleri`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `filmler`
--
ALTER TABLE `filmler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `film_seri`
--
ALTER TABLE `film_seri`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `film_turleri`
--
ALTER TABLE `film_turleri`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `oyunlar`
--
ALTER TABLE `oyunlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `oyun_turleri`
--
ALTER TABLE `oyun_turleri`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `programlar`
--
ALTER TABLE `programlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `program_turleri`
--
ALTER TABLE `program_turleri`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `surumler`
--
ALTER TABLE `surumler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yoneticiler`
--
ALTER TABLE `yoneticiler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `diziler`
--
ALTER TABLE `diziler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `dizi_bolumler`
--
ALTER TABLE `dizi_bolumler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `dizi_turleri`
--
ALTER TABLE `dizi_turleri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Tablo için AUTO_INCREMENT değeri `filmler`
--
ALTER TABLE `filmler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `film_seri`
--
ALTER TABLE `film_seri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `film_turleri`
--
ALTER TABLE `film_turleri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Tablo için AUTO_INCREMENT değeri `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- Tablo için AUTO_INCREMENT değeri `oyunlar`
--
ALTER TABLE `oyunlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `oyun_turleri`
--
ALTER TABLE `oyun_turleri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Tablo için AUTO_INCREMENT değeri `programlar`
--
ALTER TABLE `programlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `program_turleri`
--
ALTER TABLE `program_turleri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Tablo için AUTO_INCREMENT değeri `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `surumler`
--
ALTER TABLE `surumler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- Tablo için AUTO_INCREMENT değeri `yoneticiler`
--
ALTER TABLE `yoneticiler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `yorumlar`
--
ALTER TABLE `yorumlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
