# Graduation Filament CMS

This project is a web application built with Laravel and Filament, designed to manage and visualise content for a fictional blog written by Napoleon Bonaparte, in which he discusses films, books, blogs, and—naturally—himself. Developed as part of a school assignment, it functions as a minimal proof of concept, with certain features potentially incomplete or absent.

The project investigates the viability of using Filament and the Laravel ecosystem to build administrative interfaces as a modern CMS solution. It aims to assess how effectively Filament satisfies common functional and technical requirements, with a focus on modularity, maintainability, and developer convenience.

The current implementation includes core content management functionalities, developed through an iterative process. It serves as a foundation for further evaluation regarding the potential adoption of Filament as a CMS.

> Note: This is an unfinished project, developed as part of a school assignment. It serves as a minimal proof of concept, and some features may be incomplete or missing.

## Features
* Manage films, books, blogs, and reviews.
* Track actors, directors, and categories.
* Integration with Filament for admin panel functionalities.
* Database seeding and migrations for easy setup.
* Tailwind CSS for styling and Vite for frontend tooling.

## Requirements
* PHP 8.1 or higher
* Composer
* Node.js and npm
* Docker
* SQLite (or another database supported by Laravel)

## Development with Docker
__1. Clone the repository:__
```bash
git clone https://github.com/quitzchell/graduation-filament-cms.git
```
__2. Navigate to the project directory and copy the environment file:__
```bash
cd graduation-filament-cms
cp .env.example .env
```
_make sure to update the .env file_

__3. Build and start the Docker containers using the Makefile:__
```bash
make dev
```

__4. Find the container ID of the running application:__
```bash
docker ps
```
__5. Locate the container for the application and note its ID.__

__6. Enter the container's shell:__
```bash
docker exec -it <container-id> /bin/sh
```
_Replace <container-id> with the first few characters of the container ID._

__7. Install backend and frontend dependencies and run the database setup:__
```bash
composer install && npm install
php artisan key:generate
php artisan migrate --seed
npm run build
```

__8. Access the application at <a>http://localhost:8080</a>__

## Testing
__Run the test suite in the container using Pest:__
```bash
php artisan test
```

## License
This project is licensed under the MIT Licence. See the [LICENSE](LICENSE) file for details.

## Contact
For questions, reach out via [GitHub @quitzchell](https://github.com/quitzchell).
