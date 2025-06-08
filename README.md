📊 #FinTracker - Personal Finance Management
A dynamic personal finance management website built with a responsive front-end using HTML, CSS, Bootstrap, and Font Awesome, and a robust backend using PHP and MySQL. FinTracker enables users to track income and expenses, analyze financial data, and manage their budget through an intuitive interface.

🔗 #Live Demo
🧑‍💻 GitHub Repository: Your-Repository-Link-HereReplace with your actual repository link.

⚙️ #Features

👤 User Authentication: Register and log in with email and password to manage personal finances.
💰 Add Income & Expenses: Record income (source, amount, date, description) and expenses (category, amount, date, description).
📈 Financial Summary: View total income, total expenses, and net savings on the dashboard.
📊 Financial Analysis: Filter and analyze income/expense records by year, month, or specific date range.
🧾 Record Management: Edit or delete income and expense records with a tabular view.
🧭 Navigation Bar:
Home (Welcome Page)
Add (Income/Expense)
Income (View Records)
Expenses (View Records)
Analysis (Financial Insights)
Log Out




🛠️ #Tech Stack
Frontend:

HTML5
CSS3
Bootstrap 5.3.3
Font Awesome 6.7.2

Backend:

PHP
MySQL


🗃️ Database Tables Overview
👤 admin Table:



Field
Type
Description



Name
VARCHAR(100)
User's full name


DOB
DATE
Date of birth


Phone
VARCHAR(15)
Phone number


Email
VARCHAR(100)
Unique email (Primary Key)


Password
VARCHAR(255)
Password (plain text)


💵 income Table:



Field
Type
Description



Sno
INT (PK)
Unique record ID


Names
VARCHAR(100)
User email (Foreign Key)


Source
VARCHAR(100)
Income source (e.g., Salary)


Amount
DECIMAL(10,2)
Income amount


Date
DATE
Date of income


Description
TEXT
Optional description


🛒 expenses Table:



Field
Type
Description



Sno
INT (PK)
Unique record ID


Names
VARCHAR(100)
User email (Foreign Key)


Category
VARCHAR(100)
Expense category (e.g., Rent)


Amount
DECIMAL(10,2)
Expense amount


Date
DATE
Date of expense


Description
TEXT
Optional description



📋 Setup Instructions
Prerequisites

Web Server: Apache or similar
PHP: Version 7.4 or higher with MySQLi extension
MySQL: MySQL server
Browser: Any modern web browser

Installation Steps

Clone the Repository:
git clone https://github.com/YourUsername/FinTracker.git
cd FinTracker



🚀 Usage

Register: Navigate to login.html and click the sign-up link (assuming a sign-up page exists) to create an account.
Log In: Use your email and password in login.html to access the dashboard.
Manage Finances:
Add Records: Use in.php for income or exp.php for expenses. Alternatively, use the quick transaction form in new.php.
View Records: Check income (inctable.php) or expenses (exptable.php) in tabular format with edit/delete options.
Analyze Data: Use ana.php to select a time period (yearly, monthly, date range) and view results in analysis.php.

#  Some Snapshots of the project

home page before login  -->  ![Screenshot 2025-06-08 201337](https://github.com/user-attachments/assets/7ad084cd-4f65-4092-a496-004e05e1f246)

home page after login  -->  ![Screenshot 2025-06-08 201409](https://github.com/user-attachments/assets/dae9ec94-56e1-4349-8225-c62b0118c942)

add income/expenses  -->   ![Screenshot 2025-06-08 201429](https://github.com/user-attachments/assets/2aea1a11-1249-48a0-b8a9-2ec5c801a715)

income records -->   ![Screenshot 2025-06-08 201437](https://github.com/user-attachments/assets/b8adad2a-ca47-473a-b2b9-bc2a9b43d492)

analysis  -->  ![Screenshot 2025-06-08 201513](https://github.com/user-attachments/assets/6e72ba5f-b60f-436b-ae08-0728ce69e0fd)


🐞 Known Issues

SQL Injection Vulnerability: PHP files use unsanitized $_GET/$_POST inputs in SQL queries. Fix: Implement prepared statements (e.g., in upinc.php, income.php).
Textarea Bug: In edinc.php and edexp.php, textareas incorrectly use the value attribute. Fix: Replace with <textarea><?php echo htmlspecialchars($des ?? ''); ?></textarea>.
Error Message in exptable.php: Displays "No income records found" for empty expense tables. Fix: Update to "No expense records found".
Missing dele() Function: exptable.php lacks the delete confirmation function. Fix: Add <script>function dele() { return confirm("Are you sure you want to delete this expense?"); }</script>.


🔒 Security Recommendations

Prepared Statements: Use MySQLi prepared statements to prevent SQL injection.$stmt = $con->prepare("INSERT INTO income (Source, Amount, Date, Description, Names) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sdsss", $src, $amt, $dt, $des, $name);


Password Hashing: Hash passwords in signin.php using password_hash() and verify in login.php with password_verify().
Session Management: Replace $_GET["name"] with PHP sessions for secure user authentication.
CSRF Protection: Add CSRF tokens to forms to prevent cross-site request forgery.
Input Validation: Validate inputs (e.g., positive amounts, valid dates) on the server side.


🌟 Future Enhancements

Visualizations: Add Chart.js bar/pie charts to new.php or analysis.php for income vs. expense visuals.
Pagination: Implement pagination in inctable.php and exptable.php for large datasets.
Export Functionality: Allow users to export records as CSV or PDF.
Mobile App: Develop a companion mobile app for on-the-go finance tracking.
Budget Alerts: Enhance new.php with customizable budget alerts.


📬 Contact
For questions or feedback, contact the project maintainer at [datta81069@gmail.com].
