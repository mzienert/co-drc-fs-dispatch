# Deployment Guide

## Pre-Deployment: Build Step

Before deploying, you must build the production dependencies:

```bash
cd /path/to/your/project

# Install production dependencies only (excludes PHPUnit and dev tools)
composer install --no-dev --optimize-autoloader
```

This creates the `vendor/` directory with only the necessary runtime dependencies.

**What gets excluded with `--no-dev`:**
- PHPUnit testing framework
- Development tools
- Test files

**What gets included:**
- Composer autoloader
- Any production packages you add in the future

## Files to Deploy

Deploy these files/directories:
- ✅ `vendor/` - Composer dependencies (generated above)
- ✅ All PHP application files (`index.php`, `helpers/`, `lib/`, `components/`, etc.)
- ✅ `assets/` - CSS, images, SVG files
- ✅ `config/`, `data/`, `layouts/` - Configuration and templates
- ✅ `composer.json` - Dependency definition (optional but recommended)
- ❌ `tests/` - DO NOT deploy
- ❌ `.git/` - DO NOT deploy
- ❌ `DOCS/` - DO NOT deploy
- ❌ `phpunit.xml` - DO NOT deploy
- ❌ `.phpunit.result.cache` - DO NOT deploy

## WebDAV Connection Setup

This site deploys via WebDAV (not SFTP) to the NIFC server.

### Connection Details

- **Protocol**: WebDAV over HTTPS
- **Host**: `gacc.nifc.gov`
- **Path**: `/rm_drc_dav/`
- **Port**: 443 (HTTPS)
- **Authentication**: Basic auth with username and password

### Initial Setup

Before uploading files for the first time, you must create the WebDAV collection (directory):

```bash
curl -X MKCOL https://gacc.nifc.gov/rm_drc_dav/ -u username
```

Replace `username` with your WebDAV username. You'll be prompted for your password.

**Response**: You should see a `201 Created` response confirming the collection was created.

### Troubleshooting 409 Conflict Errors

If you receive a `409 Conflict` error when uploading files:

**Problem**: The WebDAV collection doesn't exist on the server yet.

**Solution**: Run the MKCOL command above to create the collection first.

### Uploading Files

Once the collection is created, upload files using the PUT method:

```bash
curl -T /path/to/local/file.txt https://gacc.nifc.gov/rm_drc_dav/file.txt -u username
```

**Response**: You should see a `201 Created` response confirming the file was uploaded.

### Testing the Connection

Test your connection and credentials:

```bash
curl -v https://gacc.nifc.gov/rm_drc_dav/ -u username
```

A successful connection will return an empty response (if directory is empty) or list contents.

### Notes

- The server redirects HTTP to HTTPS, so always use `https://` in your URLs
- WebDAV uses standard HTTP methods (MKCOL, PUT, GET, DELETE, etc.)
- Authentication is Basic auth over HTTPS
