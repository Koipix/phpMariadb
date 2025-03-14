-- CREATE DATABASE userdb;
-- USE userdb;

-- SELECT * FROM users;
-- SELECT * FROM post_data;

-- CREATE TABLE post_data (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     title VARCHAR(255) NOT NULL,
--     content TEXT NOT NULL,
--     react_count INT DEFAULT 0,
--     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
--     updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
-- );

-- CREATE TABLE `users` (
--   `id` INT NOT NULL AUTO_INCREMENT,
--   `username` VARCHAR(50) NOT NULL UNIQUE,
--   `password` VARCHAR(255) NOT NULL,
--   `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
--   PRIMARY KEY (`id`)
-- )

-- INSERT INTO users (`username`, `password`) 
-- VALUES 
-- ('koi_dev', 'pass123'),
-- ('pix_master', 'pix2004'),
-- ('test_user', 'randomhash789');

-- INSERT INTO post_data (title, content, created_at) VALUES
-- ('Mystery in the Attic', 'I keep hearing strange noises at night. Either my house is haunted, or I have a very active imagination.', NOW()),
-- ('The Pineapple Pizza Debate', 'Is pineapple on pizza a crime or a masterpiece? The internet remains divided.', NOW()),
-- ('Time Travel Theories', 'If time travel were possible, wouldn’t we have met someone from the future by now?', NOW()),
-- ('Unexpected Cat Problems', 'My cat just knocked over my coffee… onto my keyboard. I think she’s trying to send me a message.', NOW()),
-- ('The Sock Dimension', 'Where do all the missing socks go? I swear my washing machine is a portal to another world.', NOW());