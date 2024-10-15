CREATE TABLE job_applications (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    job_position VARCHAR(100) NOT NULL,
    resume_link TEXT,
    status ENUM('applied', 'in-review', 'rejected', 'accepted') DEFAULT 'applied',
    date_applied TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
