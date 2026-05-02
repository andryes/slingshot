FROM wordpress:php8.3-apache

ARG WP_CLI_VERSION=2.12.0

RUN set -eux; \
	apt-get update; \
	apt-get install -y --no-install-recommends \
		ca-certificates \
		curl \
		default-mysql-client \
		less; \
	rm -rf /var/lib/apt/lists/*

RUN set -eux; \
	for client in mysql mariadb; do \
		printf '%s\n' \
			'#!/bin/sh' \
			'first=""' \
			'case "${1:-}" in' \
			'  --no-defaults|--defaults-file=*|--defaults-extra-file=*|--defaults-group-suffix=*)' \
			'    first="$1"' \
			'    shift' \
			'    ;;' \
			'esac' \
			'client="${0##*/}"' \
			'if [ -n "$first" ]; then' \
			'  exec "/usr/bin/$client" "$first" --ssl=0 "$@"' \
			'fi' \
			'exec "/usr/bin/$client" --ssl=0 "$@"' \
			> "/usr/local/bin/$client"; \
		chmod +x "/usr/local/bin/$client"; \
	done

RUN set -eux; \
	curl -fsSL -o /usr/local/bin/wp "https://github.com/wp-cli/wp-cli/releases/download/v${WP_CLI_VERSION}/wp-cli-${WP_CLI_VERSION}.phar"; \
	chmod +x /usr/local/bin/wp; \
	wp --allow-root --version

RUN a2enmod rewrite
