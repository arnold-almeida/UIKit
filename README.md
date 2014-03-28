# UIKit

@todo - Build status
[![License](https://poser.pugx.org/almeida/ui-kit/license.png)](https://packagist.org/packages/almeida/ui-kit)

UIKit is a php toolset to encourage the maintenence of a "Pattern Libary".

This is an alpha alpha release, im just making it public so i am forced to maintain it.

Suggestions welcome.

## Goals

* Reduce time writing redundant markup
* Use a standard language when refering to UI components
* Best practices approach to markup
* Allow users to switch between presentation frameworks easily (Foundation/Bootstrap/SemanticUI)
* Allow users to extend an implementation and maintain their own internal pattern libary

## Todo

- [x] Public release
- [ ] Work out a nice way to manage configuration
- [ ] Write phpspec's for all implementations
- [ ] Docs - How to use with examples
- [ ] Public contents, templates and examples, and more
- [ ] How to for extending


## Testing

``` bash
$ phpspec run
```

## Standards

This package aims to be compliant with [PSR-1][], [PSR-2][] and [PSR-4][]. If you
notice compliance oversights, please send a patch via pull request.

[PSR-1]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md
[PSR-2]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md
[PSR-4]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader.md

## Requirements

The following versions of PHP are supported by this version.

* PHP 5.4+

## Bibliography

 - Inspired by [Mailchimp](http://ux.mailchimp.com/patterns/), Thanks for sharing!
 - [SemanticUI](http://semantic-ui.com/)

## Versioning

For transparency into our release cycle and in striving to maintain backward compatibility, Bootstrap is maintained under the Semantic Versioning guidelines. Sometimes we screw up, but we'll adhere to these rules whenever possible.

Releases will be numbered with the following format:

`<major>.<minor>.<patch>`

And constructed with the following guidelines:

- Breaking backward compatibility **bumps the major** while resetting minor and patch
- New additions without breaking backward compatibility **bumps the minor** while resetting the patch
- Bug fixes and misc changes **bumps only the patch**

For more information on SemVer, please visit <http://semver.org/>.


## Credits

- [Arnold Almeida](http://twitter.com/arn_e)
- [All Contributors](https://github.com/arnold-almeida/UIKit/graphs/contributors)


## Contributing

Please see [CONTRIBUTING](https://github.com/arnold-almeida/UIKit/blob/master/CONTRIBUTING.md) for details.

## Copyright and license

Code released under [the MIT license](LICENSE).