#!/usr/bin/env bash

user=`id -u`

docker exec --user $user example-app-laravel.test-1 bash -c "vendor/bin/ecs check --fix"

