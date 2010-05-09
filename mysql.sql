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

CREATE TABLE IF NOT EXISTS `blog_comments` (
	`id` int(11) NOT NULL auto_increment,
	`parent_id` int(11) NOT NULL,
	`state` varchar(8) NOT NULL,
	`date` int(10) NOT NULL,
	`name` varchar(64) NOT NULL,
	`email` varchar(128) NOT NULL,
	`url` varchar(128) NOT NULL,
	`text` text NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `b8_words` (
	`id` bigint unsigned NOT NULL auto_increment,
	`word` varchar(30) NOT NULL,
	`ham` bigint unsigned NULL,
	`spam` bigint unsigned NULL,
	PRIMARY KEY (`id`),
	INDEX (`word`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `b8_categories` (
	`id` bigint unsigned NOT NULL auto_increment,
	`category` varchar(4) NULL,
	`total` bigint unsigned NULL,
	PRIMARY KEY (`id`),
	UNIQUE INDEX (`category`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO b8_categories (id, category, total) VALUES (1, 'ham', 0);
INSERT INTO b8_categories (id, category, total) VALUES (2, 'spam', 0);

