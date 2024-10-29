ARG IMAGE=alpine:3.19
FROM ${IMAGE}

USER root
RUN apk update && \
    apk add --no-cache \
        php83-sqlite3 \
        php83-pdo_sqlite \
        php83-intl \
        && rm -rf /var/cache/apk/*
USER docker

# Set SSH private key, make sure you have it installed on ~/.ssh/id_rsa
ARG SSH_PRIVATE_KEY
RUN echo "$SSH_PRIVATE_KEY" >> ~/.ssh/id_rsa &&\
    chmod 600 ~/.ssh/id_rsa
