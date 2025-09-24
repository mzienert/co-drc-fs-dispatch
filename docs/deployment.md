# Deployment Guide

## Server Architecture Overview

### Shared Hosting Environment
- **PHP-based template system** with centralized asset management
- **Limited SFTP access** to your assigned subdirectory only
- **External dependencies** (CSS/JS) managed centrally by IT
- **No direct server configuration** access

### Directory Structure
```
/rmcc/
├── assets/
│   ├── css/
│   │   └── main.css          # Shared, DO NOT MODIFY
│   └── js/                   # Shared JavaScript libraries
├── dispatch-centers/
│   └── your-center/          # Your deployment directory
│       ├── DispatchCenterTemplate/
│       └── [custom files]
```

## Deployment Process

### 1. Pre-Deployment Setup
- Obtain SFTP credentials from your IT administrator
- Verify your assigned directory path
- Test SFTP connection before making changes

### 2. File Preparation
- **Configure** `dispatch_config.php` with your center's information
- **Customize** template files as needed
- **Optimize** images for web delivery (< 1MB each recommended)
- **Validate** HTML and accessibility compliance

### 3. Upload Process
1. Connect via SFTP to your assigned directory
2. Upload all files maintaining directory structure
3. Set appropriate file permissions (typically 644 for files, 755 for directories)
4. Test functionality immediately after upload

### 4. Post-Deployment Testing
- Verify all pages load correctly
- Test dynamic content (headlines rotation)
- Confirm contact information displays properly
- Check mobile responsiveness

## Configuration Files

### dispatch_config.php
Required variables to customize:
```php
$dispatch_center_name = "Your Center Name";
$dispatch_center_id = "YDC";
$dispatch_center_24_hour_phone = "800-xxx-xxxx";
$dispatch_center_office_phone = "xxx-xxx-xxxx";
$dispatch_center_fax_number = "xxx-xxx-xxxx";
$dispatch_center_email = "your.center@firenet.gov";
$dispatch_center_address_line_1 = "Street Address";
$dispatch_center_address_line_2 = "City, State ZIP";
```

### Dynamic Content Files
- **headlines.txt**: One headline per line, rotates every 30 seconds
- **pl.txt**: Personnel list content (format as needed)
- **images/**: Center-specific images and logos

## File Permissions

### Recommended Settings
- **PHP files**: 644 (read/write owner, read group/other)
- **Text files**: 644 (read/write owner, read group/other)
- **Images**: 644 (read/write owner, read group/other)
- **Directories**: 755 (full owner, read/execute group/other)

### Security Considerations
- Never upload files with 777 permissions
- Ensure no sensitive information in publicly accessible files
- Use government-issued email addresses only

## Troubleshooting Common Issues

### CSS Not Loading
- **Cause**: Shared CSS path may have changed
- **Solution**: Contact IT to verify `/rmcc/assets/css/main.css` path

### PHP Errors
- **Cause**: Syntax errors in configuration or template files
- **Solution**: Validate PHP syntax before upload

### Images Not Displaying
- **Cause**: File permissions or path issues
- **Solution**: Check file permissions and verify image paths

### Dynamic Content Not Working
- **Cause**: JavaScript blocked or file read permissions
- **Solution**: Ensure text files are readable (644 permissions)

## Maintenance Schedule

### Regular Updates
- **Weekly**: Review and update headlines.txt as needed
- **Monthly**: Verify contact information accuracy
- **Quarterly**: Test all functionality and accessibility
- **Annually**: Review compliance with current standards

### Emergency Updates
- Critical announcements can be added via headlines.txt
- Contact information changes should be immediate
- Coordinate with IT for urgent technical issues

## Backup and Recovery

### What Gets Backed Up
- Your customized PHP template files
- Configuration settings
- Dynamic content files (headlines.txt, pl.txt)
- Uploaded images

### What Doesn't Get Backed Up
- Shared CSS/JavaScript (managed centrally)
- Server configuration
- Database content (if applicable)

### Recovery Process
1. Contact IT administrator for backup restoration
2. Re-upload only your customized files if needed
3. Verify functionality after any recovery

## Support and Contacts

### Technical Issues
- **Server Problems**: Contact your IT administrator
- **SFTP Access**: Submit request through proper channels
- **CSS/JavaScript Issues**: May require coordination with central IT

### Content Questions
- **Accessibility Compliance**: Refer to requirements.md
- **USFS Standards**: Consult with your supervisor
- **Emergency Protocols**: Follow established procedures

## Version Control Recommendations

### Local Development
- Keep local copies of all customized files
- Document changes made to templates
- Test locally when possible before upload

### Change Management
- Coordinate major changes with supervisor
- Test accessibility after any modifications
- Document custom modifications for future reference
