DOCKER_COMPOSE = docker compose -f docker-compose.yaml
DOCKER_RUN = docker compose run
DOCKER_EXEC_TERM = docker exec -it

all:
	@echo "Docker: "
	@echo " - make up"
	@echo " - make run"
	@echo "Composer: "
	@echo " - make composer/install"
	@echo "Artisan: "
	@echo " - make artisan/key-generate"
	@echo " - make artisan/migrate"
	@echo " - make artisan/seed"
	@echo " - make artisan/migrate-refresh"
	@echo " - make artisan/migrate-seed"
	@echo " - make artisan/storage-link"
	@echo " - make artisan/make"
	@echo "npm: "
	@echo " - make npm/install"
	@echo " - make npm/build"
	@echo " - make npm/dev"

composer/install:
	${DOCKER_RUN} composer install

composer/require:
	${DOCKER_RUN} composer require $(REQ)

composer/require-dev:
	${DOCKER_RUN} composer require --dev $(REQ)

composer/autoload:
	${DOCKER_RUN} composer dump-autoload

artisan/key-generate:
	${DOCKER_RUN} artisan key:generate

artisan/migrate:
	${DOCKER_RUN} artisan migrate

artisan/seed:
	${DOCKER_RUN} artisan db:seed

artisan/migrate-refresh:
	${DOCKER_RUN} artisan migrate:refresh

artisan/migrate-seed:
	${DOCKER_RUN} artisan migrate --seed

artisan/storage-link:
	${DOCKER_RUN} artisan storage:link

artisan/scribe-generate:
	${DOCKER_RUN} artisan scribe:generate

artisan/make:
	${DOCKER_RUN} artisan make:$(ENT) $(NAME) $(FLAGS)

artisan/publish:
	${DOCKER_RUN} artisan vendor:publish $(PARAM)

artisan/generate-jwt:
	${DOCKER_RUN} artisan jwt:secret

artisan/exec-list: artisan/key-generate artisan/migrate-seed artisan/storage-link artisan/scribe-generate artisan/generate-jwt

npm/install:
	${DOCKER_RUN} npm install

npm/build:
	${DOCKER_RUN} npm run build

npm/dev:
	${DOCKER_RUN} npm run dev

run: build up composer/install npm/install npm/build artisan/exec-list

build:
	${DOCKER_COMPOSE} build

up:
	${DOCKER_COMPOSE} up -d

down:
	${DOCKER_COMPOSE} down

api_bash:
	${DOCKER_EXEC_TERM} eshop_php /bin/bash
