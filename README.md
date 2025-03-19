<h1 align="center">Confession Bulletin  Board</h1> <br>

![sample](https://i.imgur.com/SLLoTQm.png)

## Startup

**Start your local server through `router.php` for it to work**

While on terminal: 
```bash
cd phpMariadb/
php -S localhost:3000 router.php
```

Note: You might need the [php runtime](https://windows.php.net/download/) to start the server for **Windows**

## User Data

**DB Name**: userdb <br>
**Table Name**: users <br>
**Column Names**: id (auto-increment), username, password, created_at (automatic timestamp)

![sample](https://i.imgur.com/ptEbhqr.png)

So you can do `INSERT INTO users (username, password) VALUES (..)` as usual. 

## Post Data

**Table Name**: post_data <br>
**Column Names**: id (auto-increment), title, content, react_amount, comment_amount, created_at (automatic timestamp)

![sample](https://i.imgur.com/XStXKkX.png)

## Comment Section

**Table Name**: comments <br>
**Column Names**: id (auto-increment), post_id (referenced from post_data's id), content created_at (automatic timestamp)

![sample](https://i.imgur.com/UaWsNpx.png)

Feel free to change the parameters of `mysqli_connect()` in `connect_sql.php` for your own local host

## tools used (not dpendencies)
- mariaDB with [Dbeaver](https://dbeaver.io/)

PS: This is for our college project o7 (ik will implement security measures later zz)
