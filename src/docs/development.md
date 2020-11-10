# Development

*work in progress...*


## Testing

This project uses testing to guarantee stability. Testing is split to HTTP tests
and browser tests (Chrome).

## HTTP tests

HTTP tests are used to check stability of the API routes as well as other controllers. 

Use the following comand to run HTTP tests:

```console
onni@omaonni:/var/www/onni$ ./vendor/bin/phpunit
PHPUnit 8.1.6 by Sebastian Bergmann and contributors.

....................                                              20 / 20 (100%)

Time: 17.14 seconds, Memory: 28.00 MB

OK (20 tests, 71 assertions)
```

## Browser testing

Browser tests check the Web UI functionality end-to-end.

*wip*
