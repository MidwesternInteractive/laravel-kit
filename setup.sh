#!/bin/bash
bold=$(tput bold)
normal=$(tput sgr0)
green=$(tput setaf 2)
yellow=$(tput setaf 3)
cyan=$(tput setaf 6)

# Prompt user for information
echo "${cyan}What is the name of the project?${normal}"
read project

echo "\n${cyan}What will the local domain be? Normally the project folder name: e.g. project-app${normal}"
read domain

echo "\n${cyan}What name do you want for the database?${normal}"
read dbname

echo "\n${cyan}What will the admin email address be?${normal}"
read admin

# Create database and user
mysql -u root -e "CREATE DATABASE $dbname"
mysql -u root -e "CREATE USER ${dbname}_user@localhost"
mysql -u root -e "GRANT ALL PRIVILEGES ON $dbname.* TO ${dbname}_user@localhost"

# Update the .env file
sed -i '' "s/APP_NAME=Laravel/APP_NAME='${project}'/g" .env
sed -i '' "s|APP_URL=http://localhost|APP_URL=http://${domain}.loc|g" .env
sed -i '' "s/DB_DATABASE=homestead/DB_DATABASE=${dbname}/g" .env
sed -i '' "s/DB_USERNAME=homestead/DB_USERNAME=${dbname}_user/g" .env
sed -i '' "s/DB_PASSWORD=secret/DB_PASSWORD=/g" .env

echo "\nADMIN_EMAIL=${admin}" >> .env

# Display Results
echo "\n\n${green}${bold}Project set up!"
echo "${yellow}${bold}Database: ${normal}Connect to ${dbname} on localhost with user ${dbname}_user and no password"
echo "You can access your site at http://${domain}.loc/\n"