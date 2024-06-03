
## Required

- Docker
## Installation

#### Linux / MacOS:
`make setup`
`make migrate`

### Windows:
- `docker-compose up --build -d`
- `docker-compose exec php /bin/sh -c "cp .env.example .env && composer install && php artisan key:generate && chown -R www-data:www-data storage/"`
- `docker-compose exec php /bin/sh -c "php artisan migrate"`

## Application
Try access on browser:
http://localhost:8888