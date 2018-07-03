SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `dbackupexpro_databases` (
  `id` int(200) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title` varchar(255) NOT NULL,
  `host` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pw` varchar(255) NOT NULL,
  `pw_security_token` varchar(255) NOT NULL,
  `db_name_security_token` varchar(255) NOT NULL,
  `db_user_security_token` varchar(255) NOT NULL,
  `cronjob_token` varchar(255) NOT NULL,
  `max_files_to_retain` int(3) NOT NULL DEFAULT '100',
  `max_files_to_retain_on_ftp` int(11) NOT NULL DEFAULT '100',
  `use_ftp_id` int(1) NOT NULL DEFAULT '0',
  `last_backup_time` timestamp NULL DEFAULT NULL,
  `last_backup_time_to_ftp` timestamp NULL DEFAULT NULL,
  `main_cronjob_active` int(11) NOT NULL DEFAULT '0',
  `main_cronjob_interval` varchar(255) NOT NULL,
  `cronjob_job` varchar(255) NOT NULL,
  `parcial_tables_activated` int(1) NOT NULL DEFAULT '0',
  `parcial_tables` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `dbackupexpro_ftp` (
  `id` int(200) NOT NULL,
  `ftp_title` varchar(255) NOT NULL,
  `ftp_server` varchar(255) NOT NULL,
  `ftp_subfolder` varchar(255) NOT NULL,
  `ftp_username` varchar(255) NOT NULL,
  `ftp_pw` varchar(255) NOT NULL,
  `ftp_pw_token` varchar(255) NOT NULL,
  `ftp_user_token` varchar(255) NOT NULL,
  `ftp_server_token` varchar(255) NOT NULL,
  `use_ssl_connection` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `dbackupexpro_languages` (
  `id` int(20) NOT NULL,
  `language_name` varchar(255) NOT NULL,
  `language_code` varchar(255) NOT NULL,
  `language_code_ini` varchar(255) NOT NULL,
  `lang_on` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `dbackupexpro_languages` (`id`, `language_name`, `language_code`, `language_code_ini`, `lang_on`) VALUES
(2, 'English', 'en_EN', 'en', '1'),
(3, 'Deutsch', 'de_DE', 'de', '1');

CREATE TABLE `dbackupexpro_litos_media` (
  `id` int(255) NOT NULL,
  `version` varchar(5) NOT NULL,
  `copyright` longtext NOT NULL,
  `software_name` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `dbackupexpro_litos_media` (`id`, `version`, `copyright`, `software_name`) VALUES
(1, '2.6', '<a href=\"https://codecanyon.net/item/regex-the-speed-inproved-php-login-website-user-management/20625901?ref=litostop\" target=\"_blank\">Proudly powered by Regex - Litos Media</a>', 'Regex - The Speed Inproved PHP Login, Website & User Management');

CREATE TABLE `dbackupexpro_permalinks` (
  `id` int(200) NOT NULL,
  `file` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `dbackupexpro_permalinks` (`id`, `file`, `slug`) VALUES
(10, 'login.php', 'login'),
(11, '404.php', 'not-found'),
(12, 'logout.php', 'logout'),
(13, 'my_account.php', 'my-account');

CREATE TABLE `dbackupexpro_site_options` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `use_ssl` int(1) NOT NULL DEFAULT '0',
  `language` varchar(10) NOT NULL,
  `multilanguage_active` int(1) NOT NULL DEFAULT '0',
  `domain` varchar(255) NOT NULL,
  `site_email` varchar(255) NOT NULL,
  `site_support_email` varchar(255) NOT NULL,
  `assinatura` varchar(255) NOT NULL,
  `copyright` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `favicon` varchar(200) NOT NULL,
  `default_avatar` varchar(255) NOT NULL,
  `notification_sound` int(11) NOT NULL,
  `default_user_role` varchar(255) NOT NULL,
  `login_life_time` varchar(255) NOT NULL,
  `pw_min_length` int(200) NOT NULL,
  `token_reset_pw_life_time` varchar(255) NOT NULL,
  `token_confirm_new_account_life_time` varchar(255) NOT NULL,
  `avatar_max_width` int(200) NOT NULL,
  `avatar_upload_max_size` int(200) NOT NULL,
  `logo_max_width` int(200) NOT NULL,
  `logo_upload_max_size` int(200) NOT NULL,
  `redirect_url_after_login` varchar(255) NOT NULL,
  `redirect_url_admin_after_login` varchar(255) NOT NULL,
  `redirect_url_after_logout` varchar(255) NOT NULL,
  `redirect_url_after_pw_recovery` varchar(255) NOT NULL,
  `redirect_url_not_logged_in` varchar(255) NOT NULL,
  `recaptcha_login` int(1) NOT NULL DEFAULT '0',
  `recaptcha_register` int(1) NOT NULL DEFAULT '0',
  `recaptcha_reset_pw` int(1) NOT NULL DEFAULT '0',
  `recaptcha_contact_site` int(1) NOT NULL DEFAULT '0',
  `recaptcha_support_site` int(1) NOT NULL DEFAULT '0',
  `recaptcha_site_key` varchar(255) NOT NULL,
  `recaptcha_secret_key` varchar(255) NOT NULL,
  `new_account_mail_subject` longtext NOT NULL,
  `new_account_mail_body` longtext NOT NULL,
  `admin_new_account_mail_subject` longtext NOT NULL,
  `admin_new_account_mail_body` longtext NOT NULL,
  `pw_reset_mail_subject` longtext NOT NULL,
  `pw_reset_mail_body` longtext NOT NULL,
  `mail_header` longtext NOT NULL,
  `mail_footer` longtext NOT NULL,
  `email_to_admin_new_user` int(1) NOT NULL DEFAULT '0',
  `skin` varchar(200) NOT NULL,
  `skin_color` varchar(200) NOT NULL,
  `facebook_login` int(1) NOT NULL DEFAULT '0',
  `twitter_login` int(1) NOT NULL DEFAULT '0',
  `facebook_site_key` longtext NOT NULL,
  `facebook_secret_key` longtext NOT NULL,
  `twitter_site_key` longtext NOT NULL,
  `twitter_secret_key` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `dbackupexpro_site_options` (`id`, `name`, `description`, `use_ssl`, `language`, `multilanguage_active`, `domain`, `site_email`, `site_support_email`, `assinatura`, `copyright`, `logo`, `favicon`, `default_avatar`, `notification_sound`, `default_user_role`, `login_life_time`, `pw_min_length`, `token_reset_pw_life_time`, `token_confirm_new_account_life_time`, `avatar_max_width`, `avatar_upload_max_size`, `logo_max_width`, `logo_upload_max_size`, `redirect_url_after_login`, `redirect_url_admin_after_login`, `redirect_url_after_logout`, `redirect_url_after_pw_recovery`, `redirect_url_not_logged_in`, `recaptcha_login`, `recaptcha_register`, `recaptcha_reset_pw`, `recaptcha_contact_site`, `recaptcha_support_site`, `recaptcha_site_key`, `recaptcha_secret_key`, `new_account_mail_subject`, `new_account_mail_body`, `admin_new_account_mail_subject`, `admin_new_account_mail_body`, `pw_reset_mail_subject`, `pw_reset_mail_body`, `mail_header`, `mail_footer`, `email_to_admin_new_user`, `skin`, `skin_color`, `facebook_login`, `twitter_login`, `facebook_site_key`, `facebook_secret_key`, `twitter_site_key`, `twitter_secret_key`) VALUES
(1, 'DbackupeX Pro', 'BbackupexPro is a Multi-Mysql Database Backup & Restore script with Login and User Management, To-do Tasks and inproved to be FAST!', 0, '2', 0, 'DbackupexPro', 'info@litos.top', 'support@litos.top', 'Your DbackupeX Pro Team ', 'Copyright ©  {CURRENT-YEAR} {WEBSITE_NAME}. Alle Rechte vorbehalten. Ausgewiesene Marken gehören ihren jeweiligen Eigentümern.', 'logo-1518531748.png', 'favicon-1511099152.png', 'defautl-avatar-1510499367.png', 10, '', '80', 6, '24', '2', 200, 4, 300, 4, '_admin_back/', '_admin_back/', 'login', '_admin_back/', 'login', 0, 0, 0, 0, 0, '', '', '', '', '', '', 'Password reset for your account at {WEBSITE_NAME}', '<p>Dear User,</p>\r\n<p>Someone asked to reset your password.If this aren t you, please ignore this email and nothing will happen.</p>\r\n<p>If you need to resete your password please click this link: </p>\r\n<p><b>Link:</b> <a href=\"{CONFIRMATION_LINK}\">Hier klicken</a></p>\r\n<p>If the link is not clickable please copy and past this line on your web browser:<br>\r\n<div style=\"background:#EAEAF1;word-wrap: break-word; max-width:450px; padding:5px;\">{CONFIRMATION_LINK}</div></p>\r\n\r\nBest Regards,\r\n\r\n{SIGNATURE}', '<!doctype html>\r\n<html>\r\n   <head>\r\n      <meta charset=\"utf-8\">\r\n      <title></title>\r\n   </head>\r\n   <body style=\"font-family:Gotham, \'Helvetica Neue\', Helvetica, Arial, sans-serif; background-color:#f0f2ea; margin:0; padding:0; color:#333333;\">\r\n      <table width=\"100%\" bgcolor=\"#f0f2ea\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\">\r\n      <tbody>\r\n         <tr>\r\n            <td style=\"padding:40px 0;\">\r\n               <!-- begin main block -->\r\n               <table cellpadding=\"0\" cellspacing=\"0\" width=\"608\" border=\"0\" align=\"center\">\r\n      <tbody>\r\n         <tr>\r\n            <td style=\"background-color:#428BCA; \">\r\n               <p style=\"margin:0 0 36px; text-align:center; font-size:14px; line-height:20px; text-transform:uppercase;vertical-align:middle; padding-top:30px; color:#FFFFFF\">\r\n                 {SUBJECT}\r\n               </p>\r\n               <!-- begin wrapper -->\r\n               <table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"100%\">\r\n      <tbody>\r\n         <tr>\r\n            <td>\r\n               <p style=\"margin:0; font-size:1px; line-height:1px;\"> </p>\r\n            </td>\r\n            <td>\r\n               <p style=\"margin:0; font-size:1px; line-height:1px;\"> </p>\r\n            </td>\r\n            <td>\r\n               <p style=\"margin:0; font-size:1px; line-height:1px;\"> </p>\r\n            </td>\r\n         </tr>\r\n         <tr>\r\n            <td>\r\n               <p style=\"margin:0; font-size:1px; line-height:1px;\"> </p>\r\n            </td>\r\n            <td colspan=\"3\" rowspan=\"3\" bgcolor=\"#FFFFFF\" style=\"padding:0 0 30px;\">\r\n               <!-- begin content --><!-- begin articles -->\r\n               <table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"100%\">\r\n      <tbody>\r\n         <tr valign=\"top\">\r\n            <td width=\"30\">\r\n               <p style=\"margin:0; font-size:1px; line-height:1px;\"> </p>\r\n            </td>\r\n            <td rowspan=\"2\"><br>', '<br>\r\n{SIGNATURE}\r\n<br>\r\n<br>\r\n</td>\r\n<td width=\"30\"> </td>\r\n<tr valign=\"top\">\r\n   <td width=\"30\">\r\n      <p style=\"margin:0; font-size:1px; line-height:1px;\"> </p>\r\n   </td>\r\n   <td width=\"30\">\r\n      <p style=\"margin:0; font-size:1px; line-height:1px;\"> </p>\r\n   </td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- /end articles -->\r\n<p style=\"margin:0; border-top:2px solid #e5e5e5; font-size:5px; line-height:5px; margin:0 30px 29px;\"> </p>\r\n<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"100%\">\r\n   <tbody>\r\n      <tr valign=\"top\">\r\n         <td width=\"30\">\r\n            <p style=\"margin:0; font-size:1px; line-height:1px;\"> </p>\r\n         </td>\r\n         <td>\r\n            <p style=\"margin:0 0 4px; font-weight:bold; color:#333333; font-size:14px; line-height:22px;\">{WEBSITE_NAME}</p>\r\n            <p style=\"margin:0; color:#333333; font-size:11px; line-height:18px;\">\r\n               <br>\r\n               {WEBSITE_DESCRIPTION}<br>\r\n              Copyright ©  {CURRENT-YEAR} {WEBSITE_NAME}. Alle Rechte vorbehalten. Ausgewiesene Marken gehören ihren jeweiligen Eigentümern.<br>\r\n               Website: <span style=\"color:#428BCA; text-decoration:none; font-weight:bold;\">{DOMAIN}</span>\r\n            </p>\r\n         </td>\r\n         <td width=\"30\">\r\n            <p style=\"margin:0; font-size:1px; line-height:1px;\"> </p>\r\n         </td>\r\n         <td width=\"120\">\r\n            <p style=\"margin:0; font-weight:bold; clear:both; font-size:12px; line-height:22px;\"> </p>\r\n         </td>\r\n         <td width=\"30\">\r\n            <p style=\"margin:0; font-size:1px; line-height:1px;\"> </p>\r\n         </td>\r\n      </tr>\r\n   </tbody>\r\n</table>\r\n<!-- end content --> \r\n</td>\r\n<td>\r\n   <p style=\"margin:0; font-size:1px; line-height:1px;\"> </p>\r\n</td>\r\n</tr>\r\n<tr>\r\n   <td>\r\n      <p style=\"margin:0; font-size:1px; line-height:1px;\"> </p>\r\n   </td>\r\n   <td>\r\n      <p style=\"margin:0; font-size:1px; line-height:1px;\"> </p>\r\n   </td>\r\n</tr>\r\n<tr>\r\n   <td >\r\n      <p style=\"margin:0; font-size:1px; line-height:1px;\"> </p>\r\n   </td>\r\n   <td>\r\n      <p style=\"margin:0; font-size:1px; line-height:1px;\"> </p>\r\n   </td>\r\n</tr>\r\n<tr>\r\n   <td>\r\n      <p style=\"margin:0; font-size:1px; line-height:1px;\"> </p>\r\n   </td>\r\n   <td>\r\n      <p style=\"margin:0; font-size:1px; line-height:1px;\"> </p>\r\n   </td>\r\n   <td>\r\n      <p style=\"margin:0; font-size:1px; line-height:1px;\"> </p>\r\n   </td>\r\n   <td>\r\n      <p style=\"margin:0; font-size:1px; line-height:1px;\"> </p>\r\n   </td>\r\n   <td>\r\n      <p style=\"margin:0; font-size:1px; line-height:1px;\"> </p>\r\n   </td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- end wrapper-->\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- end main block -->\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</body>\r\n</html>', 0, 'light_blue', '', 0, 0, '', '', '', '');

CREATE TABLE `dbackupexpro_todo` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `text` longtext NOT NULL,
  `date_limit` varchar(255) DEFAULT NULL,
  `done` int(1) NOT NULL DEFAULT '0',
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `dbackupexpro_users` (
  `id` int(255) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `language` varchar(50) NOT NULL DEFAULT '0',
  `register_token` varchar(255) NOT NULL,
  `user_ip` varchar(255) NOT NULL,
  `user_ip_last_login` longtext NOT NULL,
  `login_token` varchar(255) NOT NULL,
  `last_login` varchar(255) NOT NULL,
  `reset_pw_token` varchar(255) NOT NULL,
  `reset_pw_token_date` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `profile_headline` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `profile_description` longtext NOT NULL,
  `social_login_id` varchar(255) NOT NULL,
  `social_login_plataforma` varchar(255) NOT NULL,
  `social_login_profile` varchar(255) NOT NULL,
  `banned` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `dbackupexpro_databases`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `dbackupexpro_ftp`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `dbackupexpro_languages`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `dbackupexpro_litos_media`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `dbackupexpro_permalinks`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `dbackupexpro_site_options`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `dbackupexpro_todo`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `dbackupexpro_users`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `dbackupexpro_databases`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
ALTER TABLE `dbackupexpro_ftp`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
ALTER TABLE `dbackupexpro_languages`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
ALTER TABLE `dbackupexpro_litos_media`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
ALTER TABLE `dbackupexpro_permalinks`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
ALTER TABLE `dbackupexpro_site_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
ALTER TABLE `dbackupexpro_todo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
ALTER TABLE `dbackupexpro_users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
