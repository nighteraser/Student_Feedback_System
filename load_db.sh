#!/bin/bash

dbname="mydb"
dbuser="myapp"
dbpass="1234"
sql_file="database/mydb.sql"

# Check if the SQL file exists
if [ ! -f "$sql_file" ]; then
    echo "Error: SQL file '$sql_file' not found."
    exit 1
fi

# Create user
mysql -u root -e "
CREATE USER IF NOT EXISTS $dbuser IDENTIFIED BY '$dbpass';
CREATE DATABASE IF NOT EXISTS $dbname;
GRANT ALL PRIVILEGES ON $dbname.* TO $dbuser;
"

# Load data
mysql -u$dbuser -p$dbpasswd $dbname < $sql_file

# Check exit status
if [ $? -ne 0 ]; then
  echo "Error: Failed to execute SQL file $sql_file on database $dbname."
  exit 1
else
  echo "SQL file $sql_file executed successfully on database $dbname."
fi