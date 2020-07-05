-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 05-Jul-2020 às 17:50
-- Versão do servidor: 5.7.30-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news_portal`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Politica', 'politica', '1', '2020-07-04 04:17:13', '2020-07-04 04:17:13'),
(2, 'Economia', 'economia', '1', '2020-07-04 21:54:17', '2020-07-04 21:54:17'),
(3, 'Artes', 'artes', '1', '2020-07-04 21:54:32', '2020-07-04 21:54:32');

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_06_28_115936_create_categories_table', 1),
(5, '2020_06_28_120240_create_posts_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spotlight` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id`, `category`, `title`, `slug`, `content`, `author`, `image`, `spotlight`, `created_at`, `updated_at`) VALUES
(1, 2, 'Ku Kux Klan, atores brancos e estrelas negras ‘embranquecidas’: o lado mais racista de Hollywood em seus cartazes de cinema', 'ku-kux-klan-atores-brancos-e-estrelas-negras-embranquecidas-o-lado-mais-racista-de-hollywood-em-seus-cartazes-de-cinema', '<p><span style=\"color: #333333; font-family: BentonSans; font-size: 18px; background-color: #ffffff;\">A epifania e a &eacute;pica do cinema norte-americano s&atilde;o apontadas pelo filme &lsquo;O Nascimento de Uma Na&ccedil;&atilde;o&rsquo;(D.W. Griffith, 1915), f&aacute;bula hist&oacute;rica que glorificava um&nbsp;</span><a style=\"text-decoration-line: none; color: #016ca2; border-bottom: 1px dotted currentcolor; font-family: BentonSans; font-size: 18px; background-color: #ffffff;\" href=\"https://brasil.elpais.com/noticias/kkk-ku-klux-klan/\" target=\"_blank\" rel=\"noopener\" data-link-track-dtm=\"\">movimento supremacista como o Ku Kux Klan</a><span style=\"color: #333333; font-family: BentonSans; font-size: 18px; background-color: #ffffff;\">&nbsp;e a representa&ccedil;&atilde;o da popula&ccedil;&atilde;o negra como um povo ignorante, selvagem e violador (o filme s&oacute; teve uma resposta 100 anos depois, com a vers&atilde;o de Nat Parker, em 2016). Os personagens afro-americanos interpretados por atores brancos maquiados de preto revelam o racismo de uma incipiente ind&uacute;stria cinematogr&aacute;fica.&nbsp;</span><a style=\"text-decoration-line: none; color: #016ca2; border-bottom: 1px dotted currentcolor; font-family: BentonSans; font-size: 18px; background-color: #ffffff;\" href=\"https://brasil.elpais.com/cultura/2020-06-14/quando-o-racismo-e-um-grande-espetaculo.html\" target=\"_blank\" rel=\"noopener\" data-link-track-dtm=\"\">O debate cinema-racismo</a><span style=\"color: #333333; font-family: BentonSans; font-size: 18px; background-color: #ffffff;\">&nbsp;se inseria &ndash; desde o primeiro momento &ndash; na pr&oacute;pria hist&oacute;ria do nascimento do cinema.&nbsp;</span></p>', 'Brenda', 'images/TK4WNCnDIndS5ukuqUrX3AbYgC65Shk3qizNrJnQ.jpeg', 1, '2020-07-04 04:18:50', '2020-07-05 18:33:26'),
(2, 1, 'Lava Jato denuncia José Serra e realiza buscas e apreensão em imóveis do ex-governador', 'lava-jato-denuncia-jose-serra-e-realiza-buscas-e-apreensao-em-imoveis-do-ex-governador', '<p>O Minist&eacute;rio P&uacute;blico Federal denunciou nesta sexta-feira&nbsp;o senador Jos&eacute; Serra (PSDB), ex-governador de S&atilde;o Paulo, e a filha dele, Ver&ocirc;nica Allende Serra,&nbsp;sob a acusa&ccedil;&atilde;o de lavagem de dinheiro.&nbsp; De acordo com a den&uacute;ncia da for&ccedil;a-tarefa Lava Jato de S&atilde;o Paulo, Serra usou o cargo e a influ&ecirc;ncia pol&iacute;tica para receber da Odebrecht pagamentos indevidos em troca de benef&iacute;cios relacionados &agrave;s obras do Rodoanel Sul, entre 2006 e 2007. Policiais federais cumprem mandados de busca e apreens&atilde;o em im&oacute;veis do ex-governador e da filha dele desde o in&iacute;cio da manh&atilde; desta sexta.&nbsp; Ainda segundo o MPF, a empreiteira pagou &ldquo;milh&otilde;es de reais por meio de uma sofisticada rede de offshores no exterior, para que o real benefici&aacute;rio dos valores n&atilde;o fosse detectado pelos &oacute;rg&atilde;os de controle.&rdquo; Paralelamente &agrave; den&uacute;ncia,&nbsp;a for&ccedil;a-tarefa cumpre oito mandados de busca e apreens&atilde;o em S&atilde;o Paulo e no Rio de Janeiro, como parte da&nbsp;opera&ccedil;&atilde;o Revoada, para aprofundar as investiga&ccedil;&otilde;es em rela&ccedil;&atilde;o a outros fatos relacionados a esse mesmo esquema de lavagem de dinheiro. &ldquo;At&eacute; agora, a for&ccedil;a-tarefa j&aacute; detectou que, no esquema envolvendo Odebrecht e Jos&eacute; Serra, podem ter sido lavados dezenas de milh&otilde;es de reais ao longo dos &uacute;ltimos anos. Com as provas colhidas at&eacute; o momento, o MPF obteve autoriza&ccedil;&atilde;o na Justi&ccedil;a Federal para o bloqueio de cerca de R$ 40 milh&otilde;es em uma conta na Su&iacute;&ccedil;a&rdquo;, diz a nota do Minist&eacute;rio P&uacute;blico Federal.</p>', 'Brenda', 'images/44IBFBQ9YCeHgXyYGtk5H26Sedgxbm9lNGCI5rQH.jpeg', 1, '2020-07-04 04:18:50', '2020-07-05 14:26:39'),
(3, 1, 'A nova vida do ‘vilão’ Mike Tyson: Podcasts, maconha e amizade com o homem de quem arrancou a orelha', 'a-nova-vida-do-vilao-mike-tyson-podcasts-maconha-e-amizade-com-o-homem-de-quem-arrancou-a-orelha', '<p class=\"\" style=\"margin: 0px 0px 3rem; font-size: 1.8rem; line-height: 2.8rem; color: #333333; font-family: BentonSans; background-color: #ffffff;\">A vida de&nbsp;<a style=\"text-decoration-line: none; color: #016ca2; border-bottom: 1px dotted currentcolor;\" href=\"https://brasil.elpais.com/noticias/mike-tyson/\" target=\"_blank\" rel=\"noopener\" data-link-track-dtm=\"\">Mike Tyson</a>&nbsp;(Nova York, 1966) n&atilde;o tem sentido. &Eacute;, em todas as suas facetas, extraordin&aacute;ria. Cresceu pobre em um bairro violento. Preparou-se com o legend&aacute;rio treinador de boxe Cus D&rsquo;Amato. Aos 20 anos tornou-se o campe&atilde;o mais jovem da hist&oacute;ria dos pesos pesados. Depois, passou tr&ecirc;s anos na pris&atilde;o por estupro, acusa&ccedil;&atilde;o da qual se diz inocente. Descreve sua reclus&atilde;o como uma experi&ecirc;ncia maravilhosa na qual teve tempo de ler (<em>Os Irm&atilde;os Karam&aacute;zov</em>, de Dostoi&eacute;vski, por exemplo) sem ser incomodado.</p>\r\n<div id=\"elpais_gpt-INTEXT\" style=\"color: #333333; font-family: BentonSans; font-size: 10px; background-color: #ffffff; width: 0px; height: 0px;\" data-google-query-id=\"CMGH29CAtuoCFVwFuQYdC5QCbA\">\r\n<div id=\"google_ads_iframe_7811748/elpais_brasil_web/icon/intext_0__container__\" style=\"border: 0pt none; display: inline-block;\"><iframe id=\"google_ads_iframe_7811748/elpais_brasil_web/icon/intext_0\" style=\"max-width: 100%; border-width: 0px; border-style: initial; vertical-align: bottom;\" title=\"3rd party ad content\" name=\"google_ads_iframe_7811748/elpais_brasil_web/icon/intext_0\" width=\"1\" height=\"1\" frameborder=\"0\" marginwidth=\"0\" marginheight=\"0\" scrolling=\"no\" data-google-container-id=\"5\" data-load-complete=\"true\"></iframe></div>\r\n</div>\r\n<p class=\"\" style=\"margin: 0px 0px 3rem; font-size: 1.8rem; line-height: 2.8rem; color: #333333; font-family: BentonSans; background-color: #ffffff;\">Ao sair da pris&atilde;o, uma conta corrente com 400 milh&otilde;es de d&oacute;lares (cerca de 2,125 bilh&otilde;es de reais) o aguardava. O lutador de&nbsp;<a style=\"text-decoration-line: none; color: #016ca2; border-bottom: 1px dotted currentcolor;\" href=\"https://brasil.elpais.com/noticias/boxeo/\" target=\"_blank\" rel=\"noopener\" data-link-track-dtm=\"\">boxe</a>&nbsp;gastou tudo, entre outras coisas, com drogas e acabou com uma d&iacute;vida de 60 milh&otilde;es. Arrancou um peda&ccedil;o da orelha de seu advers&aacute;rio&nbsp;<a style=\"text-decoration-line: none; color: #016ca2; border-bottom: 1px dotted currentcolor;\" href=\"https://brasil.elpais.com/noticias/evander-holyfield/\" target=\"_blank\" rel=\"noopener\" data-link-track-dtm=\"\">Evander Holyfield.</a>&nbsp;Teve oito filhos e muitos pombos, aos quais d&aacute; &aacute;gua Fiji para beber. Chegou a possuir v&aacute;rios tigres, dos quais teve que se desfazer porque arrancaram o bra&ccedil;o de um ladr&atilde;o que entrou em sua casa. Reinventou-se como ator e participou de sucessos como&nbsp;<em>Se Beber, N&atilde;o Case!</em>. Sua autobiografia fez dele um escritor&nbsp;<em>best-seller</em>. Ent&atilde;o se tornou monologuista; criou sua pr&oacute;pria s&eacute;rie de desenhos animados,&nbsp;<em>Mike Tyson Mysteries</em>, e agora voltou a se reinventar como empres&aacute;rio de&nbsp;<a style=\"text-decoration-line: none; color: #016ca2; border-bottom: 1px dotted currentcolor;\" href=\"https://brasil.elpais.com/noticias/marihuana/\" target=\"_blank\" rel=\"noopener\" data-link-track-dtm=\"\">maconha</a>.</p>', 'Brenda', 'images/0wBXXj16eRJFl0Qgg3O4qO13HJZXIs0TqVB7xDun.webp', 1, '2020-07-04 04:18:50', '2020-07-05 14:28:24'),
(4, 2, 'Wall Street fecha seu melhor trimestre desde 1998 em meio ao declínio econômico provocado pela pandemia', 'wall-street-fecha-seu-melhor-trimestre-desde-1998-em-meio-ao-declinio-economico-provocado-pela-pandemia', '<p class=\"\" style=\"margin: 0px 0px 3rem; font-size: 1.8rem; line-height: 2.8rem; color: #333333; font-family: BentonSans; background-color: #ffffff;\">Para alguns economistas, a recupera&ccedil;&atilde;o de&nbsp;<a style=\"text-decoration-line: none; color: #016ca2; border-bottom: 1px dotted currentcolor;\" href=\"https://brasil.elpais.com/noticias/wall-street/\" target=\"_blank\" rel=\"noopener\" data-link-track-dtm=\"\">Wall Street</a>&nbsp;no segundo trimestre deste ano foi como a ressurrei&ccedil;&atilde;o de L&aacute;zaro. Depois de ter eliminado em mar&ccedil;o todos os lucros obtidos desde que&nbsp;<a style=\"text-decoration-line: none; color: #016ca2; border-bottom: 1px dotted currentcolor;\" href=\"https://brasil.elpais.com/noticias/donald-trump/\" target=\"_blank\" rel=\"noopener\" data-link-track-dtm=\"\">Donald Trump</a>&nbsp;chegou &agrave; Casa Branca, em 2017, as a&ccedil;&otilde;es norte-americanas obtiveram uma recupera&ccedil;&atilde;o que selaram nesta ter&ccedil;a-feira o melhor trimestre desde 1998. Os &iacute;ndices Dow Jones e S&amp;P 500 recuperaram mais de 18%, e o Nasdaq, que envolve apenas a&ccedil;&otilde;es de empresas de tecnologia, subiu 30%. O temor dos investidores quanto aos preju&iacute;zos com o coronav&iacute;rus foi se dissipando, em parte pelo otimismo com o papel das empresas tecnol&oacute;gicas e energ&eacute;ticas, resguardado tamb&eacute;m pelos trilion&aacute;rios est&iacute;mulos do Federal Reserve (banco central dos EUA). O potente ressurgimento se d&aacute; quando os Estados Unidos&nbsp;<a style=\"text-decoration-line: none; color: #016ca2; border-bottom: 1px dotted currentcolor;\" href=\"https://brasil.elpais.com/noticias/crisis-economica-coronavirus-covid-19/\" target=\"_blank\" rel=\"noopener\" data-link-track-dtm=\"\">enfrentam uma recess&atilde;o como resultado da paralisa&ccedil;&atilde;o econ&ocirc;mica devido &agrave; pandemia.</a></p>\r\n<div id=\"elpais_gpt-INTEXT\" style=\"color: #333333; font-family: BentonSans; font-size: 10px; background-color: #ffffff; width: 0px; height: 0px;\" data-google-query-id=\"CI6Otv6AtuoCFZMvuQYdW_4C0A\">\r\n<div id=\"google_ads_iframe_7811748/elpais_brasil_web/economia/intext_0__container__\" style=\"border: 0pt none; display: inline-block;\"><iframe id=\"google_ads_iframe_7811748/elpais_brasil_web/economia/intext_0\" style=\"max-width: 100%; border-width: 0px; border-style: initial; vertical-align: bottom;\" title=\"3rd party ad content\" name=\"google_ads_iframe_7811748/elpais_brasil_web/economia/intext_0\" width=\"1\" height=\"1\" frameborder=\"0\" marginwidth=\"0\" marginheight=\"0\" scrolling=\"no\" data-google-container-id=\"5\" data-load-complete=\"true\"></iframe></div>\r\n</div>\r\n<p class=\"\" style=\"margin: 0px 0px 3rem; font-size: 1.8rem; line-height: 2.8rem; color: #333333; font-family: BentonSans; background-color: #ffffff;\">Em meados de mar&ccedil;o, os principais &iacute;ndices acion&aacute;rios sofreram um estrondo de tal magnitude que p&ocirc;s fim a 11 anos de mercado em alta, o mais longo de que se tem registro. A principal pot&ecirc;ncia econ&ocirc;mica mundial tamb&eacute;m se despediu no primeiro trimestre do maior per&iacute;odo de crescimento continuado da sua hist&oacute;ria, 128 meses, quando a economia retrocedeu 1,2% ― equivalente a uma queda de 4,8% em taxa trimestre anualizada ―, o que resultou numa recess&atilde;o que ainda n&atilde;o acabou. Entretanto, as perdas de Wall Street, em torno de 35% em menos de seis semanas, j&aacute; ficou para a hist&oacute;ria, e agora a&nbsp;<a style=\"text-decoration-line: none; color: #016ca2; border-bottom: 1px dotted currentcolor;\" href=\"https://brasil.elpais.com/economia/2020-03-13/panico-pelo-coronavirus-afunda-bolsas-pelo-mundo-em-queda-livre.html\" target=\"_blank\" rel=\"noopener\" data-link-track-dtm=\"\">Bolsa de Nova York celebra um segundo trimestre com cifras recordes.</a></p>', 'Brenda', 'images/h1vYgahor3AocA54YIwK2xfzkWaCxWGUUH9bAh55.jpeg', 0, '2020-07-04 04:18:50', '2020-07-05 14:33:50');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Admin', 'admin@email.com', NULL, '$2y$10$WdHtZBOEcu3pqnLauPZmL.NAtfqFr84B0ObU1G6Wx5TMXL/nxDmlu', NULL, '2020-07-05 23:49:17', '2020-07-05 23:49:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_category_foreign` (`category`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_foreign` FOREIGN KEY (`category`) REFERENCES `categories` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
