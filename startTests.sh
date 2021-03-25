#!/usr/bin/env bash

php ./artisan migrate:fresh --env=testing

./vendor/bin/phpunit
