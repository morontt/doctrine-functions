doctrine-functions
==================

Additional DQL functions for Doctrine2

### Numeric functions

* `RAND()` [ref](http://dev.mysql.com/doc/refman/5.0/en/mathematical-functions.html#function_rand)

### Datetime functions

* `MONTH()` [ref](http://dev.mysql.com/doc/refman/5.0/en/date-and-time-functions.html#function_month)

### String functions

* `substr(string, from, count)` [ref](https://www.postgresql.org/docs/9.1/static/functions-string.html#FUNCTIONS-STRING-OTHER)

Installation
------------

Just add the package to your `composer.json`

```json
{
    "require": {
        "morontt/doctrine-functions": "dev-master"
    }
}
```

Integration
-----------

### 1) Doctrine Only

According to the [Doctrine documentation](http://docs.doctrine-project.org/en/latest/cookbook/dql-user-defined-functions.html) you can register the functions in this package this way.

```php
<?php
$config = new \Doctrine\ORM\Configuration();
$config->addCustomNumericFunction('rand', 'Morontt\DQL\Numeric\Rand');
?>
```

### 2) Using Symfony 2

With symfony 2 you can register you functions in the `config.yml` file.

```yaml
doctrine:
    orm:
        entity_managers:
            default:
                dql:
                    numeric_functions:
                        rand: Morontt\DQL\Numeric\Rand
                    datetime_functions:
                        month: Morontt\DQL\DateTime\Month
                    string_functions:
                        substr: Morontt\DQL\String\Substr
```
