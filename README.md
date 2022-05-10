# Instalation
1. Clone code to your local machine
1. run 'composer install'
1. run 'npm run dev'
1. cp .env.example .env
1. php artisan key:generate
1. put DB and Cache credentials in .env file
1. run 'php artisan migrate'
1. put google and OpenWeather credential in .env file
1. Add correct Callback URL to Authorized redirect URIs in Google Cloud Console
1. Go to /login page
1. After you register with google the API key will show up on /home once, use with the same route /home as Bearer token (Make sure your request Acceps application/json)

