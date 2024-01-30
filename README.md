# donations-tracking

**Project Description:** CLI application to track charities donations

## Setup Instructions

### 1. Configure Database Connection

In root directory create 'config.php' file. Configure your database connection following variables with your database credentials:

```php
<?php
$rootDsn = 'your-database';
$rootUsername = 'your-username';
$rootPassword = 'your-password';
$dbName = 'your-database-name';
```

### 2. Run Migration

Navigate to the 'MigrationsRuner' directory using the command line and run migration.

```bash
php .\MigrationRunner.php
```

This will create or update the necessary database tables for the application.
