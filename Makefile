setup:
	docker-compose up --build -d
	@if [ ! -e .env ]; then\
	 	cp .env.example .env ;\
	fi
	docker-compose exec php /bin/sh -c "composer install"
	docker-compose exec php /bin/sh -c "php artisan key:generate"
	docker-compose exec php /bin/sh -c "chown -R www-data:www-data storage/"
web-cli:
	docker-compose exec php /bin/sh
db-cli:
	docker-compose exec database /bin/sh -c "mysql -uroot -ppassword"
migrate:
	docker-compose exec php /bin/sh -c "php artisan migrate"
