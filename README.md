# Detect Credit Card Types
[![Build Status](https://travis-ci.org/mcred/detect-credit-card-type.svg?branch=master)](https://travis-ci.org/mcred/detect-credit-card-type)
[![Code Climate](https://codeclimate.com/github/mcred/detect-credit-card-type/badges/gpa.svg)](https://codeclimate.com/github/mcred/detect-credit-card-type)
[![Test Coverage](https://codeclimate.com/github/mcred/detect-credit-card-type/badges/coverage.svg)](https://codeclimate.com/github/mcred/detect-credit-card-type/coverage)

<p>Utility to determine credit card type by PAN</p>

### Installation

```
composer require mcred/detect-credit-card-type
```

### Usage

```
require "PATH_TO/vendor/autoload.php";

$detector = new CardDetect\Detector();
$card = '4111111111111111';

echo $detector->detect($card); //Visa
```
