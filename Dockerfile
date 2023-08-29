FROM nginx:alpine

ARG DEMO
ENV DEMO ${DEMO}

COPY /nginx/nginx.conf /etc/nginx/templates/default.conf.template
COPY ./app /var/www/html/portfolio2018

EXPOSE 80