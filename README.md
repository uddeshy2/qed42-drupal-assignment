# qed42-drupal-assignment

# Setting Up a Drupal Project Locally with DDEV

1. **Clone the Repository:**
    - Clone your GitHub repository:
        ```
        git clone https://github.com/uddeshy2/qed42-drupal-assignment.git
        ```

2. **Navigate to the Project Directory:**
    - Change into the project directory:
        ```
        cd <project_directory>
        ```

3. **Start DDEV:**
    - Initialize DDEV for your project:
        ```
        ddev config --project-type=drupal10 --docroot=web
        ```
    - Start DDEV:
        ```
        ddev start
        ```

4. **Import the Database:**
    - The database file is already in the root of the project directory.
    - Import the database using DDEV:
        ```bash
        ddev import-db --src=db.sql.gz
        ```


5. **Clear Cache:**
    - Clear the cache to ensure your changes take effect:
        ```bash
        ddev drush cr
        ```

6. **use ddev drush uli to access site as admin**


