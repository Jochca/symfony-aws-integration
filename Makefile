start:
	docker-compose up -d

stop:
	docker-compose down

restart:
	docker-compose down && docker-compose up -d --build

bash:
	docker-compose exec php bash

composer-install:
	docker-compose exec php composer install

console:
	docker-compose exec php php bin/console

migrate:
	docker-compose exec php php bin/console doctrine:migrations:migrate
