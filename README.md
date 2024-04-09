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

   **About the project**
   It contains 5 dummy users with content editor roles, 50 dummy published articles, custom_module named related_content_block.
   as per the assignment requirement: once you visit any article content page, on the side region you'll see the related articls block which will display related articles based on the priortize criteria mentioned in the requirement doc.
   

Tools used for developing, testing and debugging:
1.DDEV
2.VSCODE (WSL)
3.Xdebug

Attaching screenshots of codebase:
 **Fetching the related articles based on priority:**
 1. Priority 1 :
  ![image](https://github.com/uddeshy2/qed42-drupal-assignment/assets/53985373/31d0d727-ff30-439b-b9c8-bfee2d26964c)
2. Priority 2:
  ![image](https://github.com/uddeshy2/qed42-drupal-assignment/assets/53985373/8ccaa1db-d295-4e70-83b8-bf5f1a9b1be4)
3. Priority 3:
  ![image](https://github.com/uddeshy2/qed42-drupal-assignment/assets/53985373/793e6508-d982-4a4d-934c-1851ee02df82)
4. Priority 4:
   ![image](https://github.com/uddeshy2/qed42-drupal-assignment/assets/53985373/aff14ebe-b524-4566-bc13-35e882e63e2b)

**Logic behind keeping the required articles and limiting the results:**
![image](https://github.com/uddeshy2/qed42-drupal-assignment/assets/53985373/169f5f65-1179-43bc-8178-ca9ace02ccd5)

**Logic behind error handling:**
![image](https://github.com/uddeshy2/qed42-drupal-assignment/assets/53985373/3f0373c8-7ed2-4f89-9de0-a9b7e6edbd8b)

**The code is tested using xdebug with proper error handling:**
  ![image](https://github.com/uddeshy2/qed42-drupal-assignment/assets/53985373/17071aaf-63bc-4ced-89ce-ef7a8d50457c)
above image shows actual results for each priority when current article node is 32.

The complete_list array in the end contains only the results as per the requirement based on code on line 94 and 97 :
![image](https://github.com/uddeshy2/qed42-drupal-assignment/assets/53985373/89ca4cdd-eba8-40af-a670-552e2e3dae02)

finally, the iterative logic allows us to have the expected output which is rendered using twig and block:
![image](https://github.com/uddeshy2/qed42-drupal-assignment/assets/53985373/890bab7d-c410-4c89-90d4-f17c70cbef5e)


If in case, there are zero results from all the queries, the return_data will look like this:
![image](https://github.com/uddeshy2/qed42-drupal-assignment/assets/53985373/ce2dcd47-d3fb-4dd0-a98b-4a3768f080eb)













