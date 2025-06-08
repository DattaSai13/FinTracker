# 💸 FinTracker – Personal Finance Management Web App

**FinTracker** is a web-based personal finance manager built using **PHP**, **MySQL**, **Bootstrap**, and **JavaScript**. The platform empowers users to effectively track their income and expenses, gain financial insights, and manage budgets through a clean, responsive interface.

---

## 🌐 Live Demo

📁 GitHub Repository: [DattaSai13/FinTracker](https://github.com/DattaSai13/FinTracker)

---

## ✨ Features

- 🔐 **User Authentication**  
  Register and log in securely using email and password.

- ➕ **Income & Expense Management**  
  Add, edit, and delete transactions with date, category/source, and description.

- 📊 **Financial Summary Dashboard**  
  View total income, total expenses, and net savings in a single glance.

- 📅 **Data Analysis**  
  Analyze income and expenses by **year**, **month**, or a **custom date range**.

- 📱 **Responsive UI**  
  Built with Bootstrap for mobile and desktop compatibility.

- 🧭 **Easy Navigation**  
  Navbar includes quick access to Home, Add, Income, Expenses, Analysis, and Logout.

---

## 🛠️ Tech Stack

**Frontend:**
- HTML5, CSS3
- Bootstrap 5.3.3
- JavaScript (for form enhancements)
- Font Awesome 6.7.2

**Backend:**
- PHP 7.4+
- MySQL (Database: `expense_tracker`)

---

## 🗃️ Database Schema Overview

### 👤 `admin` Table – User Authentication
| Field     | Type        | Description            |
|-----------|-------------|------------------------|
| Name      | VARCHAR(100) | User's full name       |
| DOB       | DATE        | Date of birth          |
| Phone     | VARCHAR(15) | Contact number         |
| Email     | VARCHAR(100) | Unique identifier (PK) |
| Password  | VARCHAR(255) | Hashed password        |

### 💰 `income` Table – Income Records
| Field     | Type         | Description                         |
|-----------|--------------|-------------------------------------|
| Sno       | INT (PK)     | Auto-incremented serial number      |
| Names     | VARCHAR(100) | Linked to `admin.Email`             |
| Source    | VARCHAR(100) | Source of income                    |
| Amount    | DECIMAL      | Amount received                     |
| Date      | DATE         | Date of income                      |
| Description | TEXT       | Additional details                  |

### 🧾 `expenses` Table – Expense Records
| Field     | Type         | Description                         |
|-----------|--------------|-------------------------------------|
| Sno       | INT (PK)     | Auto-incremented serial number      |
| Names     | VARCHAR(100) | Linked to `admin.Email`             |
| Category  | VARCHAR(100) | Expense category                    |
| Amount    | DECIMAL      | Amount spent                        |
| Date      | DATE         | Date of expense                     |
| Description | TEXT       | Additional details                  |

---


#  **Some Snapshots of the project**

home page before login  -->  ![Screenshot 2025-06-08 201337](https://github.com/user-attachments/assets/7ad084cd-4f65-4092-a496-004e05e1f246)

home page after login  -->  ![Screenshot 2025-06-08 201409](https://github.com/user-attachments/assets/dae9ec94-56e1-4349-8225-c62b0118c942)

add income/expenses  -->   ![Screenshot 2025-06-08 201429](https://github.com/user-attachments/assets/2aea1a11-1249-48a0-b8a9-2ec5c801a715)

income records -->   ![Screenshot 2025-06-08 201437](https://github.com/user-attachments/assets/b8adad2a-ca47-473a-b2b9-bc2a9b43d492)

analysis  -->  ![Screenshot 2025-06-08 201513](https://github.com/user-attachments/assets/6e72ba5f-b60f-436b-ae08-0728ce69e0fd)


🐞 **Known Issues**

SQL Injection Vulnerability: PHP files use unsanitized $_GET/$_POST inputs in SQL queries. Fix: Implement prepared statements (e.g., in upinc.php, income.php).
Textarea Bug: In edinc.php and edexp.php, textareas incorrectly use the value attribute. Fix: Replace with <textarea><?php echo htmlspecialchars($des ?? ''); ?></textarea>.
Error Message in exptable.php: Displays "No income records found" for empty expense tables. Fix: Update to "No expense records found".
Missing dele() Function: exptable.php lacks the delete confirmation function. Fix: Add <script>function dele() { return confirm("Are you sure you want to delete this expense?"); }</script>.


🔒 **Security Recommendations**

Prepared Statements: Use MySQLi prepared statements to prevent SQL injection.$stmt = $con->prepare("INSERT INTO income (Source, Amount, Date, Description, Names) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sdsss", $src, $amt, $dt, $des, $name);


Password Hashing: Hash passwords in signin.php using password_hash() and verify in login.php with password_verify().
Session Management: Replace $_GET["name"] with PHP sessions for secure user authentication.
CSRF Protection: Add CSRF tokens to forms to prevent cross-site request forgery.
Input Validation: Validate inputs (e.g., positive amounts, valid dates) on the server side.


🌟 **Future Enhancements**

Visualizations: Add Chart.js bar/pie charts to new.php or analysis.php for income vs. expense visuals.
Pagination: Implement pagination in inctable.php and exptable.php for large datasets.
Export Functionality: Allow users to export records as CSV or PDF.
Mobile App: Develop a companion mobile app for on-the-go finance tracking.
Budget Alerts: Enhance new.php with customizable budget alerts.


📬 **Contact**
For questions or feedback, contact the project maintainer at [datta81069@gmail.com].
