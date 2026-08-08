# SIZA – Deployment & Production Manual

This document provides a detailed technical walkthrough of the process used to transform SIZA from a static HTML prototype into a live, enterprise-grade Laravel platform deployed on Render.

---

## 1. Overview
**Project:** SIZA (Study In Zambia)  
**Stack:** Laravel 12, Vue 3, Inertia.js, Tailwind CSS  
**Target Platform:** Render (Free Tier)  
**Database:** PostgreSQL

---

## 2. Phase 1: Modernization & Local Setup
The project was first migrated from static HTML files into a structured Laravel framework.
- **Backend:** Models, Migrations, and Controllers were created to handle Universities, Programmes, and Student Applications.
- **Frontend:** A premium UI was built using Vue 3 and Tailwind CSS.
- **Local DB:** Initially developed using MySQL (XAMPP).

---

## 3. Phase 2: Deployment Strategy (Blueprints)
We chose the **Infrastructure as Code (IaC)** approach using Render Blueprints.
- **Action:** Created a `render.yaml` file in the root directory.
- **Purpose:** To automatically provision both the Web Service and the PostgreSQL database simultaneously.

---

## 4. Troubleshooting: Errors & Solutions

During the deployment, we encountered several production-level hurdles. Below is the log of issues and how we engineered our way through them.

### 🔴 Error 1: `invalid runtime php`
- **Cause:** Render's native PHP environment is currently in limited early access.
- **Solution:** Switched to **Docker**. We created a `Dockerfile` using a standard `php:8.2-apache` image, which provides more control and reliability.

### 🔴 Error 2: Build Failure (`Unable to locate package border-js`)
- **Cause:** A typo in the `Dockerfile`'s `apt-get install` command.
- **Solution:** Removed the non-existent package and corrected the command to only install `nodejs`.

### 🔴 Error 3: Build Failure (Apache Config Path)
- **Cause:** The `Dockerfile` tried to edit `/etc/apache2/sites-available/0000-default.conf`.
- **Solution:** Corrected the path to the standard Debian filename: `/etc/apache2/sites-available/000-default.conf` (three zeros).

### 🔴 Error 4: 500 Internal Server Error (Missing Database Tables)
- **Cause:** On Render's free tier, interactive shell access is restricted. We couldn't manually run `php artisan migrate`.
- **Solution:** Automated the database setup by modifying the Docker `CMD` to run migrations and seeding on every container startup:
  `CMD php artisan migrate --seed --force && apache2-foreground`

### 🔴 Error 5: Blank Page (Mixed Content Errors)
- **Cause:** Render uses an HTTPS proxy. Laravel was generating internal asset links (CSS/JS) via HTTP, which the browser blocked for security.
- **Solution:** Forced the HTTPS scheme in `app/Providers/AppServiceProvider.php` using:
  `URL::forceScheme('https');`

### 🔴 Error 6: Build Failure (Missing Facade Import)
- **Cause:** In the rush to fix Error 5, the `URL` facade was used in `AppServiceProvider.php` without being imported at the top of the file.
- **Solution:** Added `use Illuminate\Support\Facades\URL;` to the imports section.

### 🔴 Error 7: Startup Crash (SQL Unique Constraint Violation)
- **Cause:** Because we automated seeding in the `Dockerfile`, every time the app restarted, it tried to insert the same universities into the DB, causing a crash when it hit existing records.
- **Solution:** Refactored `UniversitySeeder.php` to use **`updateOrCreate()`**. This made the seeding "idempotent"—safe to run as many times as needed.

---

## 5. Final Result: Live Production
The application is now live at: **[https://siza-app.onrender.com](https://siza-app.onrender.com)**

### Features in Production:
1. **Automated CI/CD:** Any push to the GitHub `main` branch triggers an automatic rebuild and deploy.
2. **Persistence:** Data is stored securely in a managed PostgreSQL instance.
3. **Optimized Assets:** Vue components are compiled and minified via Vite during the Docker build phase.
4. **Proxy Awareness:** All links and routes are served over secure HTTPS.

---

## 6. Maintenance Guide
To update the application in the future:
1. **Develop locally** and test changes.
2. **Commit and Push** to GitHub:
   ```bash
   git add .
   git commit -m "Your update message"
   git push origin main
   ```
3. **Monitor Render:** The build will start automatically. If you add new database tables, the automated migration script in the `Dockerfile` will handle them during the next deploy.

---
*Documentation prepared for Samuel Sianamate - SIZA Platform.*
