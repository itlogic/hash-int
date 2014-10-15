##Encoding and decoding integer in 6-character hash

[![Build Status](https://travis-ci.org/itlogic/hash-int.svg?branch=master)](https://github.com/itlogic/hash-int)

### Installation

To get the latest version of HashInt simply require it in your `composer.json` file.

~~~
"itlogic/hash-int": "dev-master",
~~~

You'll then need to run `composer update` to download it and have the autoloader updated.

Once this operation completes, open app/config/app.php, and add a new item to the providers array.
~~~
'providers' => array(

    'ItLogic\HashInt\HashIntServiceProvider',

)
~~~

You can register the facade in the `aliases` key of your `app/config/app.php` file.

~~~
'aliases' => array(

    'HashInt'			=> 'ItLogic\HashInt\Facades\HashInt',

)
~~~
