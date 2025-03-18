# UNEP Staff Portal

## Technology Stack
- PHP 8.1+
- Laravel 10.x
- MySQL 8.0+
- Node.js 16+
- Composer 2.x

## Features
- User Authentication & Role-based Access
- Employee Profile Management
- Staff Rostering System
- Reporting & Analytics
- Notification System

## Installation

1. Clone the repository:
```bash
git clone https://github.com/your-org/unep-portal.git
cd unep-portal
```

2. Install dependencies:
```bash
composer install
npm install
```

3. Configure environment:
```bash
cp .env.example .env
php artisan key:generate
```

4. Configure database in .env:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=unep_portal
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

5. Run migrations:
```bash
php artisan migrate --seed
```

6. Start the development server:
```bash
php artisan serve
npm run dev
```

## Database Schema Overview
- users: Core user information
- employee_profiles: Extended employee information
- roles_permissions: Access control
- schedules: Staff rostering
- notifications: System notifications

## Testing
```bash
php artisan test
```

## Contributing
1. Fork the repository
2. Create feature branch
3. Commit changes
4. Push to branch
5. Create Pull Request

## License
MIT License
