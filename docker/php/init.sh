#!/bin/sh


WORKDIR=/var/www/symfony


cd ${WORKDIR}

composer install --no-interaction

/usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf