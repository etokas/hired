#!/bin/sh


WORKDIR=/var/www/front

cd ${WORKDIR}

yarn install && yarn serve