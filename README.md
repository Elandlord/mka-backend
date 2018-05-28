# MKA-backend

MKA backend that facilitates user and tenant management among others.

## Set up environment
Pull latest laradock from GitHub in laradock_mka directory.

`cp laradock_mka/env-example laradock_mka/.env`

`cp env.example .env`

`./docker-up.sh`

Docker should now build the environment. Set up your Laravel .env with correct database credentials.

## Styling
Run `npm install` to install dependencies. Project uses Laravel Mix.

`npm run watch` to start compilation for all JS and SCSS files.


