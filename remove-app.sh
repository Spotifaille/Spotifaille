#!/bin/bash

# remove containers, networks and volumes
docker-compose down --volumes

# message
echo "Application removed"
