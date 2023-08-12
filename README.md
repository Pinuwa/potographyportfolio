Portfolio-WebPage


This is simple portfolio webpage of Photography.

HTML, CSS, JS are used to design the web page.

In here I used mysql database and I hosted it locally using Wamp . Therefore when you use this webpage you have to host it your own. I attached the sql dump.
photography_dbnew.sql 

 You have to import photography_db.sql your machine. Open the command prompt (CMD). Navigate to the directory where your MySQL installation's bin folder is located.
 This is where the mysql command is located. If you're using a standard XAMPP or WAMP setup, you might find it in the MySQL installation directory.
 Use the following command to import the database:
     mysql -u root -p photographt_dbnew < backup.sql
  After pressing Enter, you'll be prompted to enter your MySQL password. Enter your password and press Enter.
The database will be imported from the backup file.
Remember that the mysql command must be accessible in your command-line environment. If it's not recognized, you might need to locate the mysql executable and provide the full path to it in your command.
Make sure you have created an empty database with the same name before importing the backup. If your backup file contains the CREATE DATABASE statement, you can skip creating an empty database.
Please be cautious when working with database backups to avoid any data loss.

After run the index.php
bottom of the page has loging form it can logging only admin. for this,
  username:- Rashi
  password:-123


  



