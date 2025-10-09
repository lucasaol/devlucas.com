cnf ?= .env
include $(cnf)
export $(shell sed 's/=.*//' $(cnf))

check:
	@echo "Makefile funcionando ✅"

up:
	@docker compose up -d

rebuild:
	@docker compose up --build -d

exec:
	@docker exec --env-file ${PWD}/.env -it portfolio_app $(cmd)

art:
	$(MAKE) exec cmd="php artisan $(cmd)"

enter:
	$(MAKE) exec cmd="/bin/bash"

migrate:
	$(MAKE) art cmd="migrate"

seed:
	$(MAKE) art cmd="db:seed"

