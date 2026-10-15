CREATE TABLE data_engineer_applications (
    application_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email_address VARCHAR(100) NOT NULL,
    preferred_cloud VARCHAR(50) NOT NULL,
    years_experience INT NOT NULL,
    github_url VARCHAR(255) NOT NULL,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
