#!/bin/bash
set -e

# Function to check MySQL connection
wait_for_mysql() {
  local host="$1"
  local port="$2"
  
  retries=0
  until (echo >/dev/tcp/$host/$port) &>/dev/null; do
    retries=$((retries+1))
    >&2 echo "Attempt $retries: MySQL is unavailable - sleeping"
    sleep 10
  done
}

# Function to run migrations
run_migrations() {
  echo "MySQL connection established. Skipping migrations..."
#  php spark migrate
}

# Wait for MySQL server to be ready
wait_for_mysql "mariadb" "3306"

# Run migrations only if the MySQL connection is established
run_migrations

# Set DirectoryIndex to index.php
echo "DirectoryIndex index.php" >> /etc/apache2/apache2.conf

# Start Apache
apache2-foreground