# Hotel Management System

A comprehensive web-based Hotel Management System developed using HTML, CSS, and PHP. This application facilitates seamless hotel operations by providing functionalities for both customers and administrators.

## Table of Contents

- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Technologies Used](#technologies-used)
- [Project Structure](#project-structure)
- [Contributing](#contributing)
- [License](#license)


## Features

### As a Customer

- **Room Booking**: Users can view available rooms and make reservations.
- **Service Information**: Access details about facilities like gym, spa treatments, laundry, parking, and transportation.
- **User Authentication**: Secure registration and login system for customers.
- **Contact Form**: Users can reach out to the hotel administration through a contact page and also can report any complaints if wishes to.

### Admin Panel

- **Dashboard**: Overview of hotel operations and quick access to management tools.
- **Booking Management**: View, confirm, or cancel room bookings.
- **Service Charge Management**: Add or update charges for various services offered.
- **Employee Status Control**: Manage employee information and statuses.

## Installation

1. **Clone the Repository**:

   ```bash
   git clone https://github.com/suhanaislam52/Hotel-Management-System.git
   ```
2. **Set Up the Environment:**
   
- Ensure you have a local server environment like XAMPP or WAMP installed.

- Place the cloned repository in the server's root directory (e.g., htdocs for XAMPP).

3. **Database Configuration:**

- Create a MySQL database named hotel_management.

- Import the provided SQL file (if available) to set up the necessary tables.

- Update the db.php file with your database credentials:
  
   ```bash
   $conn = mysqli_connect("localhost", "username", "password", "hotel_management");
   ```
4. **Run the Application:**

- Start your local server.

- Navigate to http://localhost/Hotel-Management-System/ in your web browser.

## Usage:

- Homepage: Provides an overview of the hotel and available services.

- Booking: Customers can select rooms and make reservations.

- Admin Panel: Accessible via admin/ directory, allowing administrators to manage bookings and services.

## Technologies Used:

- Frontend: HTML, CSS

- Backend: PHP

- Database: MySQL

## Project Structure:

```bash
Hotel-Management-System/
├── admin/
├── css/
├── images/
├── inc/
├── OutdoorActivities.php
├── ViewServiceCharge.php
├── about.php
├── bookroom.php
├── contact.php
├── cost.php
├── db.php
├── facilities.php
├── forgetpassword.php
├── gym.php
├── index.php
├── laundry.php
├── login.php
├── parking.php
├── payment.php
├── register.php
├── rooms.php
├── services.php
├── spatreatment.php
├── transportation.php
├── viewbookings.php
└── README.md
```
## Contributing:
   
 Contributions are welcome! Please fork the repository and submit a pull request for any enhancements or bug fixes.
  
## License:

 This project is licensed under the MIT License - see the LICENSE file for details. 
   

