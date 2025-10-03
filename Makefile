DOCKER_COMPOSE = docker-compose -f docker/docker-compose.yml

up:
	$(DOCKER_COMPOSE) up -d

build:
	$(DOCKER_COMPOSE) build

down:
	$(DOCKER_COMPOSE) down

bash:
	$(DOCKER_COMPOSE) exec php bash

migrate:
	$(DOCKER_COMPOSE) exec php php artisan migrate

key:
	$(DOCKER_COMPOSE) exec php php artisan key:generate

composer:
	$(DOCKER_COMPOSE) exec php composer i

env:
	cp app/.env.example app/.env || true

init: build up env composer key migrate
	@echo "Done! Visit http://localhost:8080"
