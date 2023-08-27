FROM nginx:alpine

ARG PUBLIC_URL
ARG DEMO

ENV PUBLIC_URL ${PUBLIC_URL}
ENV DEMO ${DEMO}

RUN if [ "DEMO" = "true" ] ; then mv /nginx/nginx.demo.conf /nginx/nginx.conf; fi

COPY nginx/nginx.conf /etc/nginx/conf.d/default.conf
COPY ./app /var/www/html

EXPOSE 80