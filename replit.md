# Anna Flowers

This imported site uses plain HTML, CSS, JavaScript, and PHP 8.2. Keep the existing stack and root-level structure.

## Running on Replit

Use the **Start application** workflow (or Run). It runs:

```sh
php -S 0.0.0.0:5000
```

No Composer dependencies or frontend build step are needed. The PHP module includes PDO MySQL.

## Database prerequisite

The homepage and policy pages are static. News (`blog.php`), order submissions (`api.php`), and administration require the original MySQL database.

The imported configuration targets a local Open Server database that is not present in this workspace. No SQL schema or database export was included. Database-backed features cannot work until a MySQL database and its schema are supplied or a new database setup is explicitly chosen.

Do not replace MySQL with another database or add sample accounts/data without the user's approval. Use Replit Secrets for credentials, never chat or source files.

The PHP built-in server is for development preview, not a production deployment configuration.
