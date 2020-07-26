	#!/bin/bash
help: ## Show this help message
	@echo 'usage: make [target]'
	@echo
	@echo 'targets:'
	@egrep '^(.+)\:\ ##\ (.+)' ${MAKEFILE_LIST} | column -t -c 2 -s ':#'

composer-install: ## Installs composer dependencies
	composer install --no-scripts --no-interaction --optimize-autoloader

prueba-logs: ## Tails the Symfony dev log
	tail -f var/log/dev.log
# End backend commands

code-style: ## Runs php-cs to fix code styling following Symfony rules
	php-cs-fixer fix src --rules=@Symfony
#	php-cs-fixer fix tests --rules=@Symfony

cc:
	php	bin/console cache:clear

env-dev:
	composer dump-env dev

env-prod:
	composer dump-env prod