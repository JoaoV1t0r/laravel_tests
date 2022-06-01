#!/bin/bash

while [[ true ]]; do
    php artisan db:seed --class=UserSeeder
done
