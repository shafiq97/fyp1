# Timeline Database Setup Instructions

This document provides instructions for setting up the database for the timeline component.

## Requirements

- XAMPP installed with MySQL and Apache running
- Access to phpMyAdmin or MySQL command line

## Setup Instructions

### Option 1: Using phpMyAdmin

1. Start XAMPP and ensure Apache and MySQL services are running
2. Open phpMyAdmin (usually at http://localhost/phpmyadmin/)
3. Click on the "Import" tab at the top of the page
4. Click "Browse" and select the `timeline_setup.sql` file from this folder
5. Click "Go" at the bottom of the page to execute the SQL script

### Option 2: Using MySQL Command Line

1. Start XAMPP and ensure MySQL service is running
2. Open a terminal or command prompt
3. Navigate to the MySQL bin directory (typically `/Applications/XAMPP/xamppfiles/bin/` on Mac)
4. Run the following command:
   ```
   ./mysql -u root < /Applications/XAMPP/xamppfiles/htdocs/FYP1/db/timeline_setup.sql
   ```

## Verification

To verify the database has been set up correctly:

1. Open phpMyAdmin
2. Check that a database named `fyp_malware_db` exists
3. Verify that there are two tables: `malware_types` and `timeline_events`
4. Check that sample data has been inserted into both tables

## Troubleshooting

- If you encounter a "Database already exists" error, you can either drop the existing database or modify the SQL script to remove the database creation statement
- If you encounter permission issues, ensure you're using the correct username and password for your MySQL installation
- If the images don't appear, check that the image paths in the `malware_types` table match the actual image filenames in the `images` folder
