#!/bin/bash

# Start PHP development server
cd "$(dirname "$0")/../CoDrcTemplate"
echo "Starting PHP development server at http://localhost:8000"
php -S localhost:8000
