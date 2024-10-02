#!/bin/bash

# build images
docker-compose build

# creation of named volumes
docker volume create webdata
docker volume create dbdata

