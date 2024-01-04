# Set Up Test Environment

- Copy the the `.env.example` file into a `.env.testing`

- Set up the database, you can use the following configurations

``` javascript
DB_CONNECTION=sqlite
DB_DATABASE=tests/database/test_db.sqlite
```

### Run migrations

```bash
$ php artisan migrate --env=testing
```

### Generate app key

``` bash
$ php artisan key:generate --env=testing
```

### Run a test

``` bash
$ php artisan test
```

### Now you are good to go! 😊


