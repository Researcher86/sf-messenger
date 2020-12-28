export WIN_HOST = $(shell cat /etc/resolv.conf | grep nameserver | awk '{print $$2; exit;}')

up:
	docker-compose up -d --build

down:
	docker-compose down -v --remove-orphans --rmi local

php-cli:
	docker-compose exec php-cli bash -c "\
		export XDEBUG_CONFIG=client_host=${WIN_HOST} && \
		export XDEBUG_MODE=debug && \
		export XDEBUG_SESSION=PHPSTORM && \
		export PHP_IDE_CONFIG=serverName=php-cli && \
		export | grep -E 'XDEBUG|PHP_IDE' && \
		bash"

messenger:
	#docker-compose exec php-cli bin/console config:dump framework messenger
	docker-compose exec php-cli bin/console debug:config framework messenger
	#docker-compose exec php-cli bin/console debug:container --show-arguments debug.traced.messenger.bus.default.inner
	docker-compose exec php-cli bin/console debug:container --show-arguments messenger.bus.default

bus:
	docker-compose exec php-cli bin/console debug:container | grep messenger.bus

producer:
	docker-compose exec php-cli bash -c "\
		export XDEBUG_CONFIG=client_host=${WIN_HOST} && \
		export XDEBUG_MODE=debug && \
		export XDEBUG_SESSION=PHPSTORM && \
		export PHP_IDE_CONFIG=serverName=php-cli && \
		export | grep -E 'XDEBUG|PHP_IDE' && \
		bin/console app:producer"

consumer-es:
	docker-compose exec php-cli bash -c "\
    		export XDEBUG_CONFIG=client_host=${WIN_HOST} && \
    		export XDEBUG_MODE=debug && \
    		export XDEBUG_SESSION=PHPSTORM && \
    		export PHP_IDE_CONFIG=serverName=php-cli && \
    		export | grep -E 'XDEBUG|PHP_IDE' && \
    		php bin/console messenger:consume async_es -vv"

consumer-telegram:
	docker-compose exec php-cli bash -c "\
    		export XDEBUG_CONFIG=client_host=${WIN_HOST} && \
    		export XDEBUG_MODE=debug && \
    		export XDEBUG_SESSION=PHPSTORM && \
    		export PHP_IDE_CONFIG=serverName=php-cli && \
    		export | grep -E 'XDEBUG|PHP_IDE' && \
    		php bin/console messenger:consume async_telegram -vv"

consumer-email:
	docker-compose exec php-cli bash -c "\
    		export XDEBUG_CONFIG=client_host=${WIN_HOST} && \
    		export XDEBUG_MODE=debug && \
    		export XDEBUG_SESSION=PHPSTORM && \
    		export PHP_IDE_CONFIG=serverName=php-cli && \
    		export | grep -E 'XDEBUG|PHP_IDE' && \
    		php bin/console messenger:consume async_email -vv"
