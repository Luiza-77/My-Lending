---
name: Existing database choice
description: User's database setup scope for the imported site.
---

Connect an existing MySQL database. Do not substitute SQLite, migrate to PostgreSQL, or create a fresh database as part of import setup.

**Why:** The user explicitly selected “Connect an existing MySQL database” when asked how to handle the missing database.

**How to apply:** Request connection credentials securely and verify with read-only checks. Ask before creating a schema or modifying existing database records.
