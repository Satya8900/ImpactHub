# ImpactHub

ImpactHub is a platform designed to connect Non-Governmental Organizations (NGOs) with volunteers and donors. It facilitates NGOs in managing their activities and enhances their outreach to potential supporters.

## Features

- **NGO Management**: NGOs can register, create profiles, and manage their initiatives.
- **Volunteer Engagement**: Volunteers can sign up, browse NGO profiles, and participate in various activities.
- **Donation Handling**: Donors can contribute to NGOs through the platform.
- **Blog**: A section dedicated to sharing updates, stories, and news related to NGO activities.

## Project Structure

The repository is organized as follows:

- `Assets/`: Contains images and other media assets.
- `Database/`: Includes database-related files.
- `Donation/`: Manages donation-related functionalities.
- `NGO/`: Contains files specific to NGO operations.
- `PHPMailer/`: Utilized for email functionalities within the platform.
- `Volunteer/`: Manages volunteer-related functionalities.
- `blog/`: Contains files related to the blog section.
- `css/`: Stylesheets for the platform.
- `Num_Counter.js`: JavaScript file for numerical counters.
- `Volunteer.html`: Volunteer registration and management page.
- `aboutus.html`: Information about the ImpactHub platform.
- `connection.php`: Handles database connections.
- `contactus.html`: Contact page for users to reach out.
- `index.html`: The main landing page of the platform.
- `login.php` & `login_backend.php`: Files managing user authentication.
- `mail.php`: Handles email sending functionalities.
- `ngo.html`: NGO registration and management page.
- `script.js`: General JavaScript functionalities.
- `signUp-ngo.php` & `signUp-vol.php`: Registration scripts for NGOs and volunteers.

## Getting Started

To set up the project locally:

1. **Clone the repository**:
   ```bash
   git clone https://github.com/Satya8900/ImpactHub.git
   cd ImpactHub

2. Set up the database:

Ensure you have a MySQL server running.

Create a database named impacthub.

Import the provided SQL file located in the Database/ directory to set up the necessary tables.



3. Configure the application:

Update the connection.php file with your database credentials.

Ensure the PHPMailer configuration in mail.php is set up with your SMTP details for email functionalities.



4. Run the application:

Deploy the application on a local or remote server with PHP support.

Access the platform via http://localhost/ImpactHub or your configured domain.




Contributing

We welcome contributions to enhance the platform. To contribute:

1. Fork the repository.


2. Create a new branch for your feature or bug fix:

git checkout -b feature-name


3. Commit your changes:

git commit -m 'Description of feature or fix'


4. Push to the branch:

git push origin feature-name


5. Open a Pull Request detailing your changes.



License

This project is licensed under the MIT License.

Contact

For any inquiries or support, please contact Satya8900.
