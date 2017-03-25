
# Muffeen Framework
---
##### System Requirements
- Server Production Minimum Requirements
  - PHP 5.3+
    - PDO Extension
    - MBString Extension
	- Composer
- Server Development Minimum Requirements
  - PHP 5.6+
    - PDO Extension
    - MBString Extension
	- Composer
##### Installation Instructions
- Copy files to root directory of choice
- Run composer update
- Update database connection on config/app.php
- Update server url (base_url) at config/app.php
- Configure web server's document/web root to be the public directory
##### Other Instructions
- to debug, set environment to development at config/app.php (do not forget to return it back)