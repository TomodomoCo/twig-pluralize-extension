# Twig Pluralize

A simple extension for Twig that allows you to pluralize a given string.

## Usage

Register the function : 

### Symfony
Register the function in services.yml with : 

```
Tomodomo\Twig\Pluralize: ~
```

Register the function, then reference it in your template:

```twig
This section has {{ pluralize(categories|length, 'one category', '%d categories', 'no categories') }}.
```

Given the values 0, 1, and 5, the above would output:

```html
0: This section has no categories.
1: This section has one category.
5: This section has 5 categories.
```

The last parameter (the "zero items" string) is optional. If omitted, the 3rd parameter (the "many items" string) will be used, as in the following:

```twig
This section has {{pluralize(categories|length, 'one category', '%d categories')}}.
```

```html
0: This section has 0 categories.
1: This section has one category.
5: This section has 5 categories.
```

The strings are passed through sprintf. You can use the %d token to insert the count into your string, if desired.

## About Tomodomo

Tomodomo is a creative agency for magazine publishers. We use custom design and technology to speed up your editorial workflow, engage your readers, and build sustainable subscription revenue for your business.

Learn more at [tomodomo.co](https://tomodomo.co) or email us: [hello@tomodomo.co](mailto:hello@tomodomo.co)

## License & Conduct

This project is licensed under the terms of the MIT License, included in `LICENSE.md`.

All open source Tomodomo projects follow a strict code of conduct, included in `CODEOFCONDUCT.md`. We ask that all contributors adhere to the standards and guidelines in that document.

Thank you!
