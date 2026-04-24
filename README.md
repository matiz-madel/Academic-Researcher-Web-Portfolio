# 🚀 Academic Researcher Portfolio

A dynamic, fully-featured portfolio platform built with **Laravel 13** and **Filament 5**, supporting multi-language content, publication management, and layout customization.

---

## 📋 Server Prerequisites (Ubuntu Production)

To run this project on an Ubuntu server (VPS), you must install the following stack. Run the commands below as a `root` or `sudo` user to set up your environment.

### 1. PHP 8.4 & Required Extensions
Filament 5 and Laravel 13 require PHP 8.4 and specific extensions (including `sqlite3` for the database).
```bash
sudo add-apt-repository ppa:ondrej/php -y
sudo apt update
sudo apt install -y php8.4 php8.4-cli php8.4-fpm php8.4-mysql php8.4-xml php8.4-mbstring php8.4-curl php8.4-zip php8.4-gd php8.4-intl php8.4-bcmath unzip
```

### 2. Composer (PHP Package Manager)
Required to install Laravel and its backend dependencies.
```bash
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
```

### 3. Node.js 20+ & NPM
Required for compiling Vite 8 assets (Tailwind CSS, JavaScript).
```bash
curl -fsSL https://deb.nodesource.com/setup_20.x | sudo -E bash -
sudo apt-get install -y nodejs
```

### 4. Git
Required to clone the repository.
```bash
sudo apt install git -y
```

---

## ⚙️ Installation Guide (Ubuntu / HestiaCP / Nginx)

Follow these steps strictly in order to ensure a perfect deployment, especially if you are behind reverse proxies or strict control panels.

### 1. Clone the Repository
Navigate to your domain's public folder (e.g., `public_html`) and clone the project:
```bash
git clone https://github.com/matiz-madel/Academic-Researcher-Web-Portfolio.git .
```

Markdown
### 2. Back-end Setup & Dependencies
Laravel's command-line tool (`artisan`) requires the vendor packages to be installed first. Run Composer to download the dependencies before setting up your environment variables:
```bash
composer install --optimize-autoloader --no-dev
cp .env.example .env
```
### 3. Environment & Database Setup (MySQL)
The project uses MySQL for the production database. You must create an empty database and a database user in your server (e.g., via the HestiaCP panel or MySQL CLI) before proceeding.

```bash
nano .env
```

Edit the `.env` file to reflect the production environment. **Pay special attention to URL and Proxy variables**:

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-domain.com
ASSET_URL=https://your-domain.com

ADMIN_NAME="Admin Name"
ADMIN_EMAIL="name@example.com"
ADMIN_PASSWORD="YourStrongPasswordHere"

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database_name
DB_USERNAME=database_username
DB_PASSWORD=MyPassword
```

Press `Ctrl + O` to save and `Ctrl + X` to close the file.

Once the .env file is saved with your valid MySQL credentials, generate the application key and run the database migrations:

```bash
php artisan key:generate
php artisan migrate --seed
```

> **💡 Important Note regarding the Seeder:** > The database seeder (`--seed`) is pre-configured with reduced sample information. It automatically fills out the public profile and layout sections to serve as an example of what kind of content should be entered in each field. It also provisions the default languages to prevent routing errors.

### 4. Front-end Dependencies (Vite Build)
Install NPM packages and compile the visual assets:
```bash
npm install
npm run build
```

### 5. Symlinks & Permissions (Crucial for Proxies/HestiaCP)
Strict security panels block absolute paths, which causes 403 Errors on uploaded images. Delete the native folder and create a secure *relative symlink*:
```bash
# Create a secure relative symlink
cd public
rm -rf storage
ln -s ../storage/app/public storage
cd ..

# Adjust permissions for the Web Server to write files safely
find storage -type d -exec chmod 755 {} \;
find storage -type f -exec chmod 644 {} \;
chmod -R 775 storage/app/public storage/framework storage/logs bootstrap/cache
```

### 6. Final Optimization & Caching
Whenever you change the `.env` file or update the code, clear and rebuild the cache. This step guarantees peak performance and prevents the "403 Forbidden" error in the Livewire/Filament admin panel:
```bash
php artisan optimize:clear
php artisan view:clear
php artisan optimize
```
### 7. Access the Admin Panel
Once the installation is complete, you can access the Filament admin panel by navigating to:
```text
URL: https://your-domain.com/admin  (or your .env's custom path)
Email: name@example.com             (Replace with your .env's email)
Password: YourStrongPasswordHere    (Replace with your .env's password)
```

---
Developed by *Matiz Madel*®
