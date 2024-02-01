# donations-tracking

**Project Description:**
Application to track charities donations with GUI

## Setup Instructions

### 1. Instal & Run XAMPP

Install xampp if don't have it and run Apache and MySQL
Relocate your project to

```bash
.\xampp\htdocs
```

### 2. Configure Database Connection

In root directory create 'config.php' file. Configure your database connection following variables with your database credentials:

```php
<?php
$rootDsn = 'your-database';
$rootUsername = 'your-username';
$rootPassword = 'your-password';
$dbName = 'your-database-name';
```

### 3. Run Migration

Navigate to directory .\database\migrations and run migration to create database with tables

```bash
php .\MigrationRunner.php
```

### 4. Run Database Seeders

Navigate to directory .\database\seeders and run seeders to populate database with charities and donations

```bash
php RunSeeders.php
```

### 4. Run project

http://localhost/DonationsTracking/public/index.php
