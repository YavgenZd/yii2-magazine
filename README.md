
installing using Docker
Install the application dependencies

`docker-compose run --rm backend composer install`
Initialize the application by running the init command within a container

`docker-compose run --rm backend /app/init`

Add a database service like and adjust the components['db'] configuration in common/config/main-local.php accordingly.

    'dsn' => 'mysql:host=shop_db;dbname=shop',
    'username' => 'admin',
    'password' => 'admin',
    

Run the migrations

`docker-compose run --rm backend yii migrate`