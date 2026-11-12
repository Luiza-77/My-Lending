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

The user chose to connect an existing MySQL database. Set these in Replit Secrets:

- `DB_HOST`: reachable MySQL hostname (not the original computer's loopback address).
- `DB_NAME`: existing database name.
- `DB_USER`: database account, preferably restricted to this site's database.
- `DB_PASS`: database password.

Optional settings: `DB_PORT` (default `3306`) and `DB_SSL_CA` (path to the provider's CA certificate file, enabling verified TLS). Follow the database provider's network access and TLS requirements. Restart the workflow after changing settings.

No SQL schema or database export was included. The connected database must already contain the application's `users`, `news`, and `orders` tables. Connection setup must not create tables, seed accounts, or modify existing records. Until configured, database-backed routes return HTTP 503 without exposing connection details; the homepage remains available.

A local SQLite file appeared during setup; it is left untouched, ignored by Git, and is not used by the MySQL connection.

Do not replace MySQL with another database or add sample accounts/data without the user's approval. Use Replit Secrets for credentials, never chat or source files.

The PHP built-in server is for development preview, not a production deployment configuration.
