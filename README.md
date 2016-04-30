# We Heart It Api : PHP

[<img src="http://cdn-img.easyicon.net/png/11454/1145431.gif">](http://weheartit.com)

A We heart it Api (see [http://weheartit.com]([http://weheartit.com) for more information)

---

- [Installation](#installation)
- [Requirements](#requirements)
- [Usage](#usage)

---

### Installation

To install PHP Curl, simply:

    $ apt-get install php5-curl

### Requirements

PHP Curl Class works with PHP 5.3, 5.4, 5.5, 5.6, 7.0, and HHVM.

```php
session_start();
require __DIR__ . '/autoload.php';

use Curl as cURL;
use Images as Image;

$img = new Image('username', 'password');

$img->__user();

```

### Usage and Examples

More examples are available under [/examples](https://github.com/iStorry/weheartit-api-php/tree/master/examples).
```php 

$result = $img->__getImages($_GET["query"]);

```
[Query Search](localhost/weheartit-api-php/examples/search_images.php?query=cats).

```
http://example.com/weheartit-api-php/examples/search_images.php?query=cats
```
