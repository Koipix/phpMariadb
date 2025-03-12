<h1 align="center">PHP CRUD System </h1> 

### Pre-defined DB for testing:
**Table Name**: users <br>
**Column Names**: id (auto-increment), username, password, created_at (automatic timestamp)

![sample](https://i.imgur.com/ptEbhqr.png)

So you can do `INSERT INTO users (username, password) VALUES (..)` as usual. 

Feel free to change the parameters of `mysqli_connect()` in `connect_sql.php` for your own local host

### stuff used (not dpendencies)
- mariaDB with [Dbeaver](https://dbeaver.io/)

PS: This is for our college project o7 (ik will implement security measures later zz)
