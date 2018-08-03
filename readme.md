## new in laravel activity log

** it's Help us to express the names of the concept of the fields

for example, the use of "account number" instead of "acc_num"
by
protected static $logAttributes = ['account number'=>'acc_num'];


## Installation

* rename (.env.example) to (.env)

* connect to your database.

* Run the Composer require command from the Terminal:
	```sh
    $ composer install
    $ php artisan key:generate
    $ php artisan migrate
	$ php artisan serve
	```
* open：localhost:8000

