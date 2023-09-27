# Web Oprec
Web registration and management for Open Recruitment of FOSTI UMS

## How to use
1. Create database on your MySQL server
```sql
CREATE DATABASE oprec;
```
2. Import `database.sql` to your database
3. Create password using MD5 and insert to table `admin`
```sql
SELECT md5('password');
```

## Open and close registration
Edit file `index.php` on variable `$status` with "open" or "close"
```php
<?php

$status = "open";

if ($status == "open") {
    require('./homepage/opening.php');
} else if ($status == "closed") {
    require('./homepage/closing.php');
}

?>
```