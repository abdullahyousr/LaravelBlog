# Blog Laravel 12 with Breeze Authentication

A modern blog application built with Laravel 12 and Laravel Breeze for authentication. This project provides a complete blogging platform with user authentication, post management, and commenting system.

## 🚀 Features

### Authentication & User Management
- **User Registration & Login**: Complete authentication system powered by Laravel Breeze
- **Email Verification**: Built-in email verification for new user accounts
- **Password Reset**: Secure password reset functionality
- **Profile Management**: Users can update their profile information and change passwords
- **Session Management**: Secure session handling with CSRF protection

### Blog Functionality
- **Post Management**: Create, read, update, and delete blog posts
- **Rich Content**: Support for formatted text content in posts
- **User Attribution**: Posts are linked to their authors
- **Public & Private Access**: Posts can be viewed publicly, but creation/editing requires authentication

### Comment System
- **Interactive Comments**: Users can comment on blog posts
- **User Attribution**: Comments are linked to their authors
- **Moderation**: Comment management with delete functionality
- **Real-time Updates**: Comments appear immediately after posting

### Modern UI/UX
- **Responsive Design**: Mobile-friendly interface using Tailwind CSS
- **Modern Components**: Beautiful UI components with Alpine.js
- **Clean Layout**: Professional and clean design
- **Navigation**: Intuitive navigation with dropdown menus

## 🛠️ Technology Stack

### Backend
- **Laravel 12**: Latest Laravel framework with modern PHP features
- **PHP 8.2+**: Modern PHP with type hints and features
- **MySQL**: Database support (configurable)
- **Laravel Breeze**: Authentication scaffolding
- **Laravel Policies**: Authorization for post management

### Frontend
- **Tailwind CSS**: Utility-first CSS framework
- **Alpine.js**: Lightweight JavaScript framework for interactivity
- **Vite**: Modern build tool for fast development
- **Blade Templates**: Laravel's templating engine

### Development Tools
- **Pest**: Modern PHP testing framework
- **Laravel Pint**: PHP code style fixer
- **Laravel Sail**: Docker development environment
- **Faker**: Data generation for testing

## 📋 Requirements

- PHP 8.2 or higher
- Composer
- Node.js & NPM
- MySQL, PostgreSQL, or SQLite
- Web server (Apache/Nginx) or Laravel's built-in server

## 🚀 Installation

### 1. Clone the Repository
```bash
git clone <repository-url>
cd BlogLaravel12WithBreezeAuth
```

### 2. Install PHP Dependencies
```bash
composer install
```

### 3. Install Node.js Dependencies
```bash
npm install
```

### 4. Environment Setup
```bash
cp .env.example .env
php artisan key:generate
```

### 5. Configure Database
Edit your `.env` file and configure your database settings:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 6. Run Migrations
```bash
php artisan migrate
```

### 7. Seed the Database (Optional)
```bash
php artisan db:seed
```

### 8. Build Assets
```bash
npm run build
```

### 9. Start the Development Server
```bash
php artisan serve
```

The application will be available at `http://localhost:8000`

## 🎯 Quick Start with Development Script

For a faster development experience, you can use the provided development script:

```bash
composer run dev
```

This command will start:
- Laravel development server
- Queue listener
- Vite development server for hot reloading

## 📁 Project Structure

```
BlogLaravel12WithBreezeAuth/
├── app/
│   ├── Http/Controllers/     # Application controllers
│   │   ├── Auth/            # Authentication controllers
│   │   ├── PostController.php
│   │   └── CommentController.php
│   ├── Models/              # Eloquent models
│   │   ├── User.php
│   │   ├── Post.php
│   │   └── Comment.php
│   └── Policies/            # Authorization policies
├── database/
│   ├── migrations/          # Database migrations
│   ├── seeders/            # Database seeders
│   └── factories/          # Model factories
├── resources/views/         # Blade templates
│   ├── auth/               # Authentication views
│   ├── posts/              # Post-related views
│   └── layouts/            # Layout templates
└── routes/                 # Application routes
```

## 🔐 Authentication Features

### User Registration
- Email and password registration
- Email verification required
- Password strength validation

### User Login
- Email/password authentication
- Remember me functionality
- Session management

### Password Management
- Password reset via email
- Password confirmation for sensitive actions
- Secure password hashing

## 📝 Blog Features

### Post Management
- **Create Posts**: Authenticated users can create new blog posts
- **Edit Posts**: Authors can edit their own posts
- **Delete Posts**: Authors can delete their posts
- **View Posts**: Public access to view all posts

### Comment System
- **Add Comments**: Authenticated users can comment on posts
- **Delete Comments**: Users can delete their own comments
- **Real-time Display**: Comments appear immediately

## 🎨 UI Components

The application uses modern UI components built with Tailwind CSS and Alpine.js:

- **Navigation**: Responsive navigation with dropdown menus
- **Forms**: Styled forms with validation
- **Buttons**: Primary, secondary, and danger button variants
- **Modals**: Modal dialogs for confirmations
- **Cards**: Post and comment display cards

## 🧪 Testing

The project includes comprehensive tests using Pest:

```bash
# Run all tests
composer test

# Run tests with coverage
composer test -- --coverage
```

### Test Structure
- **Feature Tests**: Authentication, posts, comments, and profile tests
- **Unit Tests**: Individual component tests
- **Pest Framework**: Modern PHP testing with expressive syntax

## 🔧 Development Commands

```bash
# Start development environment
composer run dev

# Run tests
composer test

# Code style fixing
./vendor/bin/pint

# Clear application cache
php artisan cache:clear

# Clear config cache
php artisan config:clear

# Generate application key
php artisan key:generate

# Run migrations
php artisan migrate

# Rollback migrations
php artisan migrate:rollback

# Seed database
php artisan db:seed
```

## 🌐 Deployment

### Production Setup
1. Set `APP_ENV=production` in your `.env` file
2. Configure your production database
3. Run `php artisan config:cache`
4. Run `php artisan route:cache`
5. Run `php artisan view:cache`
6. Build assets: `npm run build`

### Server Requirements
- PHP 8.2+
- MySQL 5.7+ or PostgreSQL 9.6+
- Composer
- Node.js & NPM (for asset building)

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Add tests for new functionality
5. Ensure all tests pass
6. Submit a pull request

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 🆘 Support

If you encounter any issues or have questions:

1. Check the Laravel documentation
2. Review the Laravel Breeze documentation
3. Open an issue in the repository
4. Check the application logs in `storage/logs/`

## 🔄 Updates

To update the application:

```bash
# Update dependencies
composer update
npm update

# Run migrations
php artisan migrate

# Clear caches
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

---

**Built with ❤️ using Laravel 12 and Laravel Breeze**
