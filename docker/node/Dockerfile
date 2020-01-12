FROM node:alpine

RUN npm install --no-optional -g webpack webpack-cli yarn \
    yarn global add @vue/cli

RUN npm config set registry http://registry.npmjs.org/

COPY init.sh /
RUN chmod +x /init.sh

CMD ["/init.sh"]