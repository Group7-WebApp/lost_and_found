# lost-and-found
A project that allows students and staff to **report**, **search**, and **claim** lost or found items within the school campus.  
It helps users post details, upload item images, and manage claims easily.

 Project Setup
1. Install XAMPp
   - Start **Apache** and **MySQL** in the Control Panel.
2. create and Copy Project Folder
   - Move the folder `lost_and_found portal` into:
     C:\xampp\htdocs\
3. Create Database
   - Go to: http://localhost/phpmyadmin  
   - Click **New**, create a database named `lost_and_found_db`.  
   - Import the file `sql/export.sql`.
4. Check Database Connection
   - Open `config.php` and make sure it looks like this: php
     $host = "localhost";
     $user = "root";
     $pass = "";
     $dbname = "lost_and_found";
5. Run the Project
   - In your browser, go to:
     http://localhost/lost_and_found_/

### GROUP MEMBERS, MATRIC NUMBERS, CONTRIBUTIONS
OLATEJU RASHIDAT OLAMIDE |23/0781| TEAM LEADER, GITHUB REPOSITORY, DOCUMENTATION, DATABASE
SALAU OLABODE |23/0911| FRONTEND & BACKEND DEVELOPER
ONWUKA DOMINION |23/0727| SHORT PRESENTATION & SUMMARY
UBAJAKA IZUCHUKWU ONYEDIKA |23/1843| SCREENSHOT & SCREENSHOT UPLOAD
OGUNDEYIN OLUWATIMILEYIN OLUWATOFARATI |23/1203| CODE LINKING PHP TO DATABASE
MICHEAL BLESSEDSTEVE O. |23/2026|
NKWOJI DANIEL |23/1902| TESTING AND DEBUGGING

