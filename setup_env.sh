#!/bin/bash

# Update the package list
sudo apt update

# Install Apache2
echo "Installing Apache2..."
sudo apt install -y apache2

# Install MariaDB
echo "Installing MariaDB..."
sudo apt install -y mariadb-server

# Restart Apache to apply changes
echo "Restarting Apache..."
sudo systemctl restart apache2

# Print completion message
echo "MariaDB, PHP, and Apache2 have been installed and configured successfully."
