#!/bin/bash
echo What wold you like the database name to be
read dbname

mysql -u root -e "CREATE DATABASE $dbname"
echo Database set up, use $dbname with user root and no password