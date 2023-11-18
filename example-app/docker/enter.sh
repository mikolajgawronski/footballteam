#!/usr/bin/env bash

user=`id -u`

docker exec -it --user $user example-app-laravel.test-1 /bin/bash
