#!/bin/bash

# Check if the user is root or has sudo privileges
if [[ $EUID -ne 0 ]]; then
   echo "This script must be run as root or with sudo privileges" 
   exit 1
fi

# Prompt user for database type
echo "Which database type would you like to use? (mysql/postgresql)"
read db_type

# Prompt user for database name
echo "Enter the name of the new database:"
read db_name

# Prompt user for database username
echo "Enter the username for the new database:"
read db_user

# Prompt user for database password
echo "Enter the password for the new database:"
read -s db_password

# Check if the selected database type is supported
if [[ "$db_type" != "mysql" && "$db_type" != "postgresql" ]]; then
    echo "Unsupported database type. Please choose either mysql or postgresql."
    exit 1
fi

# Create the new database
if [[ "$db_type" == "mysql" ]]; then
    mysql -e "CREATE DATABASE $db_name;"
    mysql -e "CREATE USER '$db_user'@'localhost' IDENTIFIED BY '$db_password';"
    mysql -e "GRANT ALL PRIVILEGES ON $db_name.* TO '$db_user'@'localhost';"
    mysql -e "FLUSH PRIVILEGES;"
    echo "MySQL database $db_name created successfully."
elif [[ "$db_type" == "postgresql" ]]; then
    sudo -u postgres psql -c "CREATE DATABASE $db_name;"
    sudo -u postgres psql -c "CREATE USER $db_user WITH PASSWORD '$db_password';"
    sudo -u postgres psql -c "GRANT ALL PRIVILEGES ON DATABASE $db_name TO $db_user;"
    echo "PostgreSQL database $db_name created successfully."
fi

# Optional: Load initial data into the database
echo "Do you want to load initial data into the database? (yes/no)"
read load_data

if [[ "$load_data" == "yes" ]]; then
    echo "Please provide the path to the SQL file:"
    read sql_file

    if [[ ! -f "$sql_file" ]]; then
        echo "File not found. Please provide a valid path to the SQL file."
        exit 1
    fi

    if [[ "$db_type" == "mysql" ]]; then
        mysql $db_name < $sql_file
        echo "Initial data loaded into MySQL database $db_name."
    elif [[ "$db_type" == "postgresql" ]]; then
        sudo -u postgres psql $db_name < $sql_file
        echo "Initial data loaded into PostgreSQL database $db_name."
    fi
fi

echo "Database setup completed."
