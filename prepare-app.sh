#!/bin/bash

# build images
docker compose build
# docker build -t spotifaille .

# creation of named volumes
#docker volume create webdata
docker volume create dbdata

