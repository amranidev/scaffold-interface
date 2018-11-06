# Contribution Guide

Thank you for considering contributing to this project!, this project follows some code standards and practices.

## Pull requests.

Please consider running tests before opening any pull request.

An ideal pull request should have:

- Detailed descrition of the change.
- Unit/integration tests.

Any pull request without test won't be merged unless the maintainer decides to merge it in some specific cases.

## Coding style.

scaffold-interface follows the [PSR-2](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md) coding standard and the [PSR-4](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader.md) autoloading standard.

### Doc blocks

Below is an example of a valid Laravel documentation block. Note that the @param attribute is followed by two spaces, the argument type, two more spaces, and finally the variable name:

```php
/**
 * Register a binding with the container.
 *
 * @param  string|array  $abstract
 * @param  \Closure|string|null  $concrete
 * @param  bool  $shared
 * @return void
 */
public function bind($abstract, $concrete = null, $shared = false)
{
    //
}
```

### Style CI

Don't worry if your code styling isn't perfect! [StyleCI](https://styleci.io/) will automatically merge any style fixes into the **Scaffold Interface** after pull requests are merged. This allows us to focus on the content of the contribution and not the code style.
