print('Start #################################################################');

db.createUser({
    user: 'root',
    pwd: 'rootpassword',
    roles: [
        {
            role: 'readWrite',
            db: 'Spotifaille',
        },
    ],
});