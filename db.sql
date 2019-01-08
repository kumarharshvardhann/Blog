
-- creating table for the posts
CREATE TABLE `posts` (
 `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 `user_id` int(11) DEFAULT NULL,
 `title` varchar(255) NOT NULL,
 `slug` varchar(255) NOT NULL UNIQUE,
 `views` int(11) NOT NULL DEFAULT '0',
 `image` varchar(255) NOT NULL,
 `body` text NOT NULL,
 `published` tinyint(1) NOT NULL,
 `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB

-- creating table for users
CREATE TABLE `users` (
  `id` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('Author','Admin') DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB

-- Inserting data into the table posts

INSERT INTO `posts` (`id`, `user_id`, `title`, `slug`, `views`, `image`, `body`, `published`, `created_at`, `updated_at`) VALUES
(1, 1, 'What is Github?', 'what-is-github', 0, 'git.png', 'At a high level, GitHub is a website and cloud-based service that helps developers store and manage their code, as well as track and control changes to their code. To understand exactly what GitHub is, you need to know two connected principles:

    Version control
    Git
(Source: https://kinsta.com/knowledgebase/what-is-github/)', 1, '2018-11-23 15:24:02', '2018-11-25 19:14:31'),
(2, 1, 'Weekly Sprints', 'weekly-sprints', 1, 'weekl_sprint.jpg', 'n product development, a sprint is a set period of time during which specific work has to be completed and made ready for review.

Each sprint begins with a planning meeting. During the meeting, the product owner (the person requesting the work) and the development team agree upon exactly what work will be accomplished during the sprint.
 (source: https://searchsoftwarequality.techtarget.com/definition/Scrum-sprint)', 1, '2018-11-28 11:40:14', '2018-11-28 13:04:36');

INSERT INTO posts (id, user_id, title, slug, views, image, body, published, created_at, updated_at) VALUES
(3, 1, 'Social Media Detox ?', 'social-media-detox', 0, 'social_media_detox.jpg', 'In this generation of social media, where everyone is running a race of making their social media presence in the virtual dimension of this world, what the h*#@ is a social media detox? ', 1, '2018-11-12 11:32:12', '2018-11-12 12:14:31'),
(4, 1, 'Namma Bengaluru', 'namma-bengaluru', 0, 'banagalore.jpg', 'At the heart of Karnataka lies, Namma Benagluru! From it\'s ravishing street food to its classic and aesthetic cafes, it is the center of the cultural fusion of its traditional cultural and modern practices. The IT sectors scaling the edges of the city and have earned it the title of "Indian Silicon Valley". ', 1, '2018-10-11 8:40:10', '2018-11-21 13:44:16');
