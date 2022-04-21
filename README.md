<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and
creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in
many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache)
  storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

### 3. Install Composer Dependencies

Whenever you clone a new Laravel project you must now install all of the project dependencies. This is what actually
installs Laravel itself, among other necessary packages to get started.

When we run composer, it checks the composer.json file which is submitted to the github repo and lists all of the
composer (PHP) packages that your repo requires. Because these packages are constantly changing, the source code is
generally not submitted to github, but instead we let composer handle these updates. So to install all this source code
we run composer with the following command.

```shell script
$ composer install
```

### 4. Create a copy of your .env file

`.env` files are not generally committed to source control for security reasons. But there is a `.env.example` which is
a template of the `.env` file that the project expects us to have. So we will make a copy of the `.env.example` file and
create a `.env` file that we can start to fill out to do things like database configuration in the next few steps.

```shell script
$ cp .env.example .env
```

This will create a copy of the `.env.example` file in your project and name the copy simply `.env`.

### 5. Generate an app encryption key

Laravel requires you to have an app encryption key which is generally randomly generated and stored in your `.env` file.
app will use this encryption key to encode various elements of your application from cookies to password hashes and
more.

``` shell script
$ php artisan key:generate
```

If you check the `.env` file again, you will see that it now has a long random string of characters in the `APP_KEY`
field. We now have a valid app encryption key.

### 6. In the .env file, add database information to allow Laravel to connect to the database

We will want to allow Laravel to connect to the database that you just created in the previous step. To do this, we must
add the connection credentials in the `.env` file and Laravel will handle the connection from there.

In the `.env` file fill in the `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` options to match
the credentials of the database you want to connect to. This will allow us to run migrations and seed the database in
the next step.

### 7. Migrate the database

Once your credentials are in the `.env` file, now you can migrate your database.

``` shell script
$ php artisan migrate
```

It’s not a bad idea to check your database to make sure everything migrated the way you expected.

### 8. Seed the database

The repository has a seeding file setup, then now is the time to run the seed, which fills your database with starter or
dummy data.

After the migrations are complete and you have the database structure required, then you can seed the database (which
means add dummy data to it).

``` shell script
$ php artisan db:seed
```

## Authors

* **Damian Breuer** - *Student* - [damianbreuer](https://github.com/damianbreuer)
* **Ivy Dekker** - *Student* - [ivydk](https://github.com/ivydk)
* **Jos Geerink** - *Student* - [jos-hz](https://github.com/Jos-HZ)
* **Kevin van Herwijnen** - *Student* - [kvherwijnen](https://github.com/kvherwijnen)
* **Diego Punte** - *Student* - [Shadowblack03](https://github.com/Shadowblack03)

See also the list of [contributors](url-to-project-contributors-page) who participated in this project.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in
the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by
the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell
via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
