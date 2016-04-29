# We Heart It Api : PHP

[<img src="http://cdn-img.easyicon.net/png/11454/1145431.gif">](http://weheartit.com)

A We heart it Api (see [http://weheartit.com]([http://weheartit.com) for more information)

---

- [Installation](#installation)
- [Requirements](#requirements)

---

### Installation

To install PHP Curl Class, simply:

    $ apt-get install php5-curl

### Requirements

PHP Curl Class works with PHP 5.3, 5.4, 5.5, 5.6, 7.0, and HHVM.

### Quick Start and Examples

More examples are available under [/examples](https://github.com/php-curl-class/php-curl-class/tree/master/examples).

```php
require __DIR__ . '/autoload.php';

use Curl as cURL;
use Images as Image;

$img = new Image('username', 'password');