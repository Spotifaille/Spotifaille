db = db.getSiblingDB('Spotifaille'); // Switch to the Spotifaille database

db.createCollection('music'); // Create a collection named 'users'

// use src/Spotify_songs_attributes.json to insert data into the collection
print('Start inserting data into the collection');
load('Spotify_songs_attributes.json');
print('Data inserted successfully');

// Create a unique index on the 'id' field
db.music.createIndex({id: 1}, {unique: true});
print('Index created successfully');

// Create a text index on the 'trackName' and 'artistName' fields
db.music.createIndex({trackName: 'text', artistName: 'text'});
print('Text index created successfully');