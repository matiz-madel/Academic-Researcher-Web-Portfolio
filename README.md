# 🎓 Academic & Researcher Portfolio

A dynamic, fully multilingual, and SEO-driven portfolio built with **Laravel 13**, **Filament v5**, and **TailwindCSS**. This application is designed for researchers, academics, and highly specialized professionals who need their career trajectory to be globally searchable, beautifully presented, and easily translatable.

## ✨ Core Features

* **🌐 100% Internationalization (i18n):** Native database-driven content translation (via `spatie/laravel-translatable`). Instantly support English, French, Portuguese, Spanish, and more.
* **🔍 Academic SEO & Metadata:** Built-in visual management for Open Graph tags, JSON-LD schemas, and academic identifiers (ORCID, Lattes, Google Scholar, ResearchGate) to ensure your profile ranks perfectly on search engines.
* **🏗️ Dynamic Layout (Drag & Drop):** Reorder, hide, or prioritize your portfolio sections (Publications, Education, Funding, Professional Activities) directly from the admin panel without touching a single line of code.
* **🛡️ Security by Obscurity:** The admin panel URL is dynamic and securely defined via `.env` variables, preventing automated bot attacks.
* **🧠 Decoupled Architecture:** The public identity (`PublicProfile`) is strictly separated from the system authentication (`User`), adhering to the Single Responsibility Principle (SRP).

## 🚀 Installation & Local Deployment

This project uses **SQLite** as the default database to ensure a *zero-config* setup. You do not need to configure MySQL or external servers to get this running.

### 1. Prerequisites
* PHP 8.4 or higher
* Composer
* Node.js & NPM

### 2. Clone and Install
Clone the repository and install the required dependencies:

```bash
git clone [https://github.com/YOUR_USERNAME/YOUR_REPO_NAME.git](https://github.com/YOUR_USERNAME/YOUR_REPO_NAME.git)
cd YOUR_REPO_NAME
composer install
npm install
npm run build
```

### 3. Environment Configuration
Duplicate the environment template:

```bash
cp .env.example .env
php artisan key:generate
```

Open the `.env` file and **configure your admin panel credentials**. These variables will be read automatically by the database seeders:

```env
FILAMENT_ADMIN_PATH=my-secret-panel
ADMIN_NAME="Your Name"
ADMIN_EMAIL="you@example.com"
ADMIN_PASSWORD="AStrongPassword123"
```

### 4. Database Initialization
We do not use dummy data (Faker). The command below will create the necessary tables and inject the default languages, your admin user, and the layout structure:

```bash
php artisan migrate:fresh --seed
```

### 5. Run the Server

```bash
php artisan serve
```

Access your public portfolio at `http://localhost:8000` and manage your content securely at the route you defined in your `.env` (e.g., `http://localhost:8000/admin`).

---

## 🛠️ Technology Stack

* **Backend:** Laravel 13
* **Admin Panel:** Filament PHP v5
* **Database Translations:** Spatie Laravel Translatable (+ LaraZeus)
* **Frontend:** Blade Components + TailwindCSS + Alpine.js

## 📝 License
This project is open-sourced software licensed under the [MIT License](https://opensource.org/licenses/MIT). Feel free to fork it, customize the Blade views, and build your own globally accessible academic footprint!
