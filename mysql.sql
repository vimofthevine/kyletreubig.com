CREATE TABLE IF NOT EXISTS `users` (
	`id` int(11) NOT NULL auto_increment,
	`username` varchar(32) NOT NULL,
	`password` varchar(50) NOT NULL,
	`email` varchar(64) NOT NULL,
	`role` varchar(16) NOT NULL,
	`token` varchar(32) NOT NULL,
	`last_login` int(10) NOT NULL,
	`logins` int(10) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `pages` (
	`id` int(11) NOT NULL auto_increment,
	`version` int(4) NOT NULL,
	`title` varchar(100) NOT NULL,
	`slug` varchar(32) NOT NULL,
	`text` text NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `page_revisions` (
	`id` int(11) NOT NULL auto_increment,
	`page_id` int(11) NOT NULL,
	`version` int(4) NOT NULL,
	`date` int(10) NOT NULL,
	`editor_id` int(11) NOT NULL,
	`diff` text NOT NULL,
	`comment` text NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO pages (id, title, slug, text) VALUES
(1, 'Homepage', 'home', 'Initial homepage text.'),
(2, 'Biography', 'about', 'Initial biography text.'),
(3, 'Contact Me', 'contact', 'Initial contact text.');

CREATE TABLE IF NOT EXISTS `articles` (
	`id` int(11) NOT NULL auto_increment,
	`version` int(4) NOT NULL,
	`title` varchar(128) NOT NULL,
	`slug` varchar(128) NOT NULL,
	`text` text NOT NULL,
	`date` int(10) NOT NULL,
	`state` varchar(16) NOT NULL,
	`author_id` int(11) NOT NULL,
	`category_id` int(11) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `categories` (
	`id` int(11) NOT NULL auto_increment,
	`name` varchar(32) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO categories (id, name) VALUES
(1, 'uncategorized');

CREATE TABLE IF NOT EXISTS `statistics` (
	`id` int(11) NOT NULL auto_increment,
	`article_id` int(11) NOT NULL,
	`total` int(11) NOT NULL,
	`views` int(11) NOT NULL,
	`data` varchar(256) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `tags` (
	`id` int(11) NOT NULL auto_increment,
	`name` varchar(32) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `articles_tags` (
	`article_id` int(11) NOT NULL,
	`tag_id` int(11) NOT NULL,
	PRIMARY KEY (`article_id`, `tag_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

