#!/bin/bash

# nginx -g daemon off;
# php-fpm &;
# touch /run/openrc/softlevel;
php-fpm81 -F &
# rc-service nginx start;
echo "nginx and php-fpm started"
nginx -g "daemon off;"