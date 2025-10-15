#!/bin/bash

# WebDAV Deployment Script for CoDRC Template
# Deploys to: https://gacc.nifc.gov/rm_drc_dav/

set -e  # Exit on error

# Configuration
WEBDAV_URL="https://gacc.nifc.gov/rm_drc_dav"
WEBDAV_USER="mzienert"
SOURCE_DIR="/Users/matthewzienert/Documents/USFS/website/CoDrcTemplate"

# Check if password is set
if [ -z "$WEBDAV_PASSWORD" ]; then
    echo "Error: WEBDAV_PASSWORD environment variable not set"
    echo "Set it with: export WEBDAV_PASSWORD='your_password'"
    exit 1
fi

echo "Starting deployment to $WEBDAV_URL..."
echo ""

# Function to create a directory on the server
create_remote_dir() {
    local remote_path="$1"
    echo "Creating directory: $remote_path"
    curl -s -X MKCOL "$WEBDAV_URL$remote_path" -u "$WEBDAV_USER:$WEBDAV_PASSWORD" > /dev/null || true
}

# Function to upload a file
upload_file() {
    local local_file="$1"
    local remote_path="$2"
    echo "Uploading: $remote_path"
    curl -s -T "$local_file" "$WEBDAV_URL$remote_path" -u "$WEBDAV_USER:$WEBDAV_PASSWORD" > /dev/null
}

# Create base collection if it doesn't exist
echo "Ensuring base collection exists..."
curl -s -X MKCOL "$WEBDAV_URL/" -u "$WEBDAV_USER:$WEBDAV_PASSWORD" > /dev/null 2>&1 || true
echo ""

# Find all directories (excluding .DS_Store) and create them on the server
echo "Creating directory structure..."
cd "$SOURCE_DIR"
find . -type d -not -path "*/\.*" | while read -r dir; do
    if [ "$dir" != "." ]; then
        remote_dir="${dir#./}"
        create_remote_dir "/$remote_dir"
    fi
done
echo ""

# Upload all files (excluding .DS_Store)
echo "Uploading files..."
find . -type f -not -name ".DS_Store" -not -path "*/\.*" | while read -r file; do
    local_file="$SOURCE_DIR/$file"
    remote_file="${file#./}"
    upload_file "$local_file" "/$remote_file"
done
echo ""

echo "Deployment complete!"
echo "Site URL: https://gacc.nifc.gov/rm_drc_dav/"
