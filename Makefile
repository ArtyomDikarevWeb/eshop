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
	@echo "npm: "
	@echo " - make npm/install"
	@echo " - make npm/build"
	@echo " - make npm/dev"

composer/install:
	docker compose run composer install

artisan/key-generate:
	docker compose run artisan key:generate

artisan/migrate:
	docker compose run artisan migrate

artisan/seed:
	docker compose run artisan db:seed

artisan/migrate-refresh:
	docker compose run artisan migrate:refresh

artisan/migrate-seed:
	docker compose run artisan migrate --seed

artisan/storage-link:
	docker compose run artisan storage:link

artisan/scribe-generate:
	docker compose run artisan scribe:generate

artisan/exec-list: artisan/key-generate artisan/migrate-seed artisan/storage-link artisan/scribe-generate

npm/install:
	docker compose run npm install

npm/build:
	docker compose run npm run build

npm/dev:
	docker compose run npm run dev

up: run composer/install npm/install npm/build artisan/exec-list

run:
	docker compose -f docker-compose.yaml up -d

down:
	docker compose -f docker-compose.yaml down