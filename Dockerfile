FROM nginx:alpine as build

COPY . .

ARG DEMO

RUN if [ "$DEMO" = "true" ] ; then mv /nginx/nginx.demo.conf /nginx/nginx.conf ; fi

FROM nginx:alpine as run

ARG DEMO
ENV DEMO ${DEMO}

COPY --from=build /app /usr/share/nginx/html
COPY --from=build /nginx/nginx.conf /etc/nginx/conf.d/default.conf

EXPOSE 80