# How to use

- Execute [prepare-app.sh] to build Docker images

- Execute [start-app.sh] to start Docker containers

- Execute [stop-app.sh] to stop Docker containers

- **When you are done**, Execute [remove-app.sh] to remove Docker containers, networks and volumes



# File decriptions

- [src/script/script.js](https://github.com/a-vtn/DevOps/blob/main/src/script/script.js): Contains scripts used in other files

- [src/style/style.css](https://github.com/a-vtn/DevOps/blob/main/src/style/style.css): Contains the main style used in other files

- [src/Spotify_songs_attributes.json](https://github.com/a-vtn/DevOps/blob/main/src/Spotify_songs_attributes.json): Json file containing spotify tracks information

- [src/display_tracks.php](https://github.com/a-vtn/DevOps/blob/main/src/display_tracks.php): Page displaying the tracks information

- [src/index.php](https://github.com/a-vtn/DevOps/blob/main/src/index.php): Main page, displaying spotifaille logo

- [docker-composer.yaml](https://github.com/a-vtn/DevOps/blob/main/docker-composer.yaml): Contains Docker volumes configurations

- [Dockerfile](https://github.com/a-vtn/DevOps/blob/main/Dockerfile): Define the docker image, and instructions to build Docker environment

- [prepare-app.sh](https://github.com/a-vtn/DevOps/blob/main/prepare-app.sh): Builds Docker images

- [remove-app.sh](https://github.com/a-vtn/DevOps/blob/main/remove-app.sh): Remove Docker containers, networks and volumes

- [restart.sh](https://github.com/a-vtn/DevOps/blob/main/restart.sh): Restart the Docker application

- [start-app.sh](https://github.com/a-vtn/DevOps/blob/main/start-app.sh): Start Docker containers

- [stop-app.sh](https://github.com/a-vtn/DevOps/blob/main/stop-app.sh): Stop Docker containers

- [init-mongo.js](https://github.com/a-vtn/DevOps/blob/main/init-mongo.js): Initialisation and configuration of mongoDB