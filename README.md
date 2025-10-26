### Lost-And-Found
A project that allows students and staff to **report**, **search**, and **claim** lost or found items within the school campus.  
It helps users post details, upload item images, and manage claims easily.

 ### Project Setup
1. Install XAMPp
   - Start **Apache** and **MySQL** in the Control Panel.
2. create and Copy Project Folder
   - Move the folder `lost_and_found portal` into:
     C:\xampp\htdocs\
3. Create Database
   - Go to: http://localhost/phpmyadmin  
   - Click **New**, create a database named `lost_and_found`.  
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

### GROUP MEMBERS, MATRIC NUMBERS,Team Role CONTRIBUTIONS
OLATEJU RASHIDAT OLAMIDE |23/0781| |TEAM LEADER, GITHUB REPOSITORY, DOCUMENTATION, DATABASE|
SALAU OLABODE |23/0911| | FRONTEND & BACKEND DEVELOPER|
ONWUKA DOMINION |23/0727| | SHORT PRESENTATION & SUMMARY| 
UBAJAKA IZUCHUKWU ONYEDIKA |23/1843| | SCREENSHOT & SCREENSHOT UPLOAD|
OGUNDEYIN OLUWATIMILEYIN OLUWATOFARATI |23/1203| | CSS CODE |
MICHEAL BLESSEDSTEVE O. |23/2026| | CODE LINKING PHP |
NKWOJI DANIEL |23/1902| |TESTING AND DEBUGGING|

### Grading Criteria Covered
Functionality (40%) – All features work correctly with DB integration.
Code Quality (25%) – Clean, readable PHP with modular functions.
User Interface (15%) – Neat and responsive HTML/CSS.
Documentation (10%) – Detailed README with setup guide.
Collaboration (10%) – Clear roles and logical project flow.

### Expected Output
Students can now report any lost and found issues
Then submit their request
Its will now show that youve succesfully submitted the lost or found item. 
Afterwards item can also be viewed.

### Key Features:
	1.	Item Reporting (POST):
	•	Users can report lost or found items by submitting details (name, description, date, location).
	2.	Item Filtering (GET):
	•	View or search items using filters such as Lost or Found categories.
	3.	Image Upload:
	•	Allows users to upload an image of the lost/found item for easier identification.
	4.	Search Functionality:
	•	Search items by keyword or location to quickly find relevant reports.
	5.	Claim Confirmation:
	•	A verification/confirmation process to ensure rightful claiming of items.
 
#### Database Design:
### Tables:
	•	users – stores user information (e.g., name, email).
	•	items – stores details of reported items (e.g., item name, description, status, image, date, location, user_id).

### Relationships:
	•	One-to-many: A user can report multiple items.

### Technologies Used:
	•	Frontend: HTML, CSS (for user interface design)
	•	Backend: PHP (form handling and logic)
	•	Database: MySQL (data storage and retrieval)
