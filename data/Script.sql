s-- CREATE DATABASE userdb;
-- USE userdb;

-- SELECT * FROM users;
-- SELECT * FROM post_data ORDER BY id DESC;
-- DROP TABLE post_data;

-- TABLES

-- CREATE TABLE comments (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     post_id INT NOT NULL,
--     content TEXT NOT NULL,
--     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
--     FOREIGN KEY (post_id) REFERENCES post_data(id) ON DELETE CASCADE
-- );

-- CREATE TABLE post_data (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     title VARCHAR(255) NOT NULL,
--     content TEXT NOT NULL,
--     react_count INT DEFAULT 0,
--     comment_count INT DEFAULT 0,
--     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
-- );

-- CREATE TABLE `users` (
--   `id` INT NOT NULL AUTO_INCREMENT,
--   `username` VARCHAR(50) NOT NULL UNIQUE,
--   `password` VARCHAR(255) NOT NULL,
--   `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
--   PRIMARY KEY (`id`)
-- )

-- SAMPLE DATA

-- INSERT INTO users (`username`, `password`) 
-- VALUES 
-- ('koi_dev', 'pass123'),
-- ('pix_master', 'pix2004'),
-- ('test_user', 'randomhash789');

-- INSERT INTO post_data (title, content, react_count) VALUES
-- ('My Cat is a Spy', 'I swear my cat is gathering intelligence. He stares at me for hours, then disappears without a trace.', 23),
-- ('Pineapple on Pizza Debate', 'I will never understand why people hate it. It’s the perfect combo of sweet and savory.', 48),
-- ('Aliens Stole My Socks', 'Every time I do laundry, at least one sock goes missing. This is proof we are not alone.', 15),
-- ('The Curse of the Left Shoe', 'No matter what I do, I always lose my left shoe. The universe is mocking me.', 7),
-- ('I Accidentally Ate Dog Food', 'It looked like beef jerky, okay? No regrets, 7/10 taste-wise.', 56),
-- ('Why Do Birds Stare at Me?', 'Every time I go outside, birds just stop and look at me. Am I being recruited for something?', 33),
-- ('AI is Taking Over My Dreams', 'Last night, ChatGPT was narrating my dream. This is getting out of hand.', 42),
-- ('I Invented a New Language', 'It’s just a mix of grunts and hand gestures, but my dog understands it.', 9),
-- ('The Time I Met a Time Traveler', 'He said he was from 2077 and warned me never to eat sushi on a Wednesday.', 27),
-- ('Help! My Shadow is Acting Weird', 'It doesn’t move when I do. It’s either a glitch in the matrix or I’m losing it.', 13);

-- INSERT INTO comments (post_id, content) VALUES
-- (11, 'This is an interesting post!'),
-- (11, 'I totally agree with your point.'),
-- (11, 'Can you elaborate more on this?'),
-- (11, 'Great insight, thanks for sharing!'),
-- (11, 'I have a different perspective on this.');

-- UPDATE post_data  
-- SET comment_count = (SELECT COUNT(*) FROM comments WHERE post_id = 11)  
-- WHERE id = 11;
