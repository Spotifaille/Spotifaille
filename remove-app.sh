#!/bin/bash

# remove containers, networks and volumes
docker compose down --volumes


# docker rm -f spotifaille
# message
echo "Application removed"
