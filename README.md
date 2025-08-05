# 💼 Freelancing Portal

A complete Freelancing Platform built using **HTML**, **CSS**, **JavaScript**, and **PHP**, enabling clients to post jobs and freelancers to apply, submit work, and get hired — just like a mini version of platforms like Fiverr or Upwork.

## 🌐 Overview

This Freelancing Portal allows:
- Clients to register, log in, and post job listings
- Freelancers to sign up, view job listings, and submit proposals
- Admin to manage users and jobs (optional if included)

---

## 💻 Tech Stack

| Technology   | Description                         |
|--------------|-------------------------------------|
| HTML/CSS     | Front-end structure and styling     |
| JavaScript   | Interactive client-side scripting   |
| PHP          | Server-side logic and routing       |
| MySQL        | Database to store user and job data |

---

## 🧰 Features

- 🔐 User Authentication (Client & Freelancer login/signup)
- 📝 Job Posting by Clients
- 📬 Proposal Submission by Freelancers
- 👤 Profile Management
- 📊 Admin Panel (if applicable)
- ⭐ratings 

---

## ⚙️ Setup Instructions

1. **Clone the Repository**
   ```bash
   git clone https://github.com/yourusername/freelancing-portal.git
   cd freelancing-portal
````

2. **Set Up Local Server**

   * Use [XAMPP](https://www.apachefriends.org/) to host the project.
   * Place the project folder in the `htdocs` directory (`C:/xampp/htdocs`).

3. **Create MySQL Database**

   * Open `phpMyAdmin`
   * Create a new database (e.g., `freelance_portal`)
   * Import the provided SQL file (`database.sql` if available)

4. **Update Database Credentials**

   * Open `config.php` or wherever your DB connection is defined
   * Update:

     ```php
     $host = "localhost";
     $user = "root";
     $password = "";
     $database = "freelance_portal";
     ```

5. **Run the Project**

   * Start Apache and MySQL in XAMPP
   * Visit `http://localhost/freelancing-portal/` in your browser.



## 📚 Learnings

* Built an end-to-end dynamic website using PHP and MySQL
* Handled user roles and sessions
* Designed interactive frontend using HTML, CSS, and JavaScript



## 🚀 Future Improvements

* Add messaging/chat feature between users
* Integrate payment gateway (like Razorpay or PayPal)
* Enable project status tracking (in progress, completed)


> ⭐ If this project helped you or inspired you, please star the repository!

