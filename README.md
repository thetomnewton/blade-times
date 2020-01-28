# blade-times

A few handy date and time related Blade directives to use in your Laravel applications.

## Installation

Simply run the following command in your terminal:

`composer require thetomnewton/blade-times`

The package automatically adds the service provider to your Laravel application.

## Usage

```php
@until('2020-03-01')
    <div>Brand New Product</div>
@enduntil
```

```php
@between('Friday 5pm', 'Sunday 10pm')
    <div>The weekend is here!</div>
@endbetween
```

```php
@after('January 1st 2021, 9am')
    <div>Registration is now live! Sign up below.</div>
@endafter
```
