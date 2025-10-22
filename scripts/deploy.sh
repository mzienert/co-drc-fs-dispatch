#!/bin/bash

# WebDAV Deployment Script for USFS Dispatch Center Template
# Deploys to: https://gacc.nifc.gov/rm_drc_dav/

set -e  # Exit on error

# Configuration
WEBDAV_URL="https://gacc.nifc.gov/rm_drc_dav"
WEBDAV_USER="mzienert"
SOURCE_DIR="/Users/matthewzienert/Documents/USFS/website"

# Check if password is set
if [ -z "$WEBDAV_PASSWORD" ]; then
    echo "Error: WEBDAV_PASSWORD environment variable not set"
    echo "Set it with: export WEBDAV_PASSWORD='your_password'"
    exit 1
fi

echo "=========================================="
echo "Pre-Deployment: Building production files"
echo "=========================================="
echo ""

# Build production dependencies
cd "$SOURCE_DIR"
echo "Running: composer install --no-dev --optimize-autoloader"
composer install --no-dev --optimize-autoloader --quiet
echo "✓ Production dependencies installed"
echo ""

echo "=========================================="
echo "Starting deployment to $WEBDAV_URL"
echo "=========================================="
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

# Directories to exclude from deployment
EXCLUDE_DIRS=(
    "tests"
    "DOCS"
    ".git"
    "scripts"
)

# Files to exclude from deployment
EXCLUDE_FILES=(
    ".DS_Store"
    "phpunit.xml"
    ".phpunit.result.cache"
    "composer.lock"
    ".gitignore"
    "notes.txt"
    "notes2.txt"
)

# Function to check if directory should be excluded
should_exclude_dir() {
    local dir_name="$1"
    for exclude in "${EXCLUDE_DIRS[@]}"; do
        if [[ "$dir_name" == *"/$exclude"* ]] || [[ "$dir_name" == "$exclude"* ]]; then
            return 0  # true, should exclude
        fi
    done
    return 1  # false, should not exclude
}

# Function to check if file should be excluded
should_exclude_file() {
    local file_name="$1"
    local base_name=$(basename "$file_name")

    # Check file patterns
    for exclude in "${EXCLUDE_FILES[@]}"; do
        if [[ "$base_name" == "$exclude" ]]; then
            return 0  # true, should exclude
        fi
    done

    # Check directory patterns
    for exclude in "${EXCLUDE_DIRS[@]}"; do
        if [[ "$file_name" == *"/$exclude/"* ]]; then
            return 0  # true, should exclude
        fi
    done

    return 1  # false, should not exclude
}

# Find all directories (excluding hidden and excluded dirs) and create them on the server
echo "Creating directory structure..."
cd "$SOURCE_DIR"
find . -type d -not -path "*/\.*" | while read -r dir; do
    if [ "$dir" != "." ] && ! should_exclude_dir "$dir"; then
        remote_dir="${dir#./}"
        create_remote_dir "/$remote_dir"
    fi
done
echo ""

# Upload all files (excluding hidden and excluded files)
echo "Uploading files..."
find . -type f -not -path "*/\.*" | while read -r file; do
    if ! should_exclude_file "$file"; then
        local_file="$SOURCE_DIR/$file"
        remote_file="${file#./}"
        upload_file "$local_file" "/$remote_file"
    fi
done
echo ""

echo "Deployment complete!"
echo "Site URL: https://gacc.nifc.gov/rm_drc_dav/"
