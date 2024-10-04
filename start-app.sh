#!/bin/bash

# start contaienrs
docker compose up -d

# docker run -dp 8080:80 --name spotifaille spotifaille 


# time to wait until the database is running well
# sleep 9
# message
echo "The app is available at http://localhost:8080"

