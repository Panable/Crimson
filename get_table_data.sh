#!/bin/bash

# MySQL service name as specified in docker-compose file
service_name='crimson-mysql-1'

# Database credentials
username='user'
password='password'
database='cafe'

# Check if a table name argument is provided
if [ $# -ne 1 ]; then
    echo "Usage: $0 <table_name>"
    exit 1
fi

# Table name argument
table_name="$1"

# Execute SQL query to select all rows from the specified table
docker exec -i ${service_name} mysql -u${username} -p${password} ${database} -e "
SELECT Employees.Name, RosterRequest.ID AS RosterRequestID
FROM Employees
JOIN RosterRequest ON Employees.ID = RosterRequest.EmployeeID;
"
