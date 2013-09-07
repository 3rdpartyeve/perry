# Perry
a PHP Library for accessing EVE Online's CREST API


## WARNING
this is a prototype / work in progress.
As CCP has not released much of the CREST API yet its use is extremly limited,
also this library is not to be considered complete or stable, most likely
backward compatibility will break during further development.
Do not use this if you don't know what you are doing.

## LICENSE
This library is released unter the MIT style license.
See LICENSE.txt for details.

## REQUIREMENTS
- PHP 5.4+
- Composer: http://getcomposer.org

## INSTALLATION
### Assumptions
A few assumptions are made before you start:
1. you are on linux, and you have commandline access.
2. you know how to handle yourself on linux
3. the requirements (see README) are installed.

###  Quick Install
Perry is installed and updated through the great composer dependency management,
it is available through Packagist, so your composer installer should find the packages
by default.

If you don't know your way around with composer, have never used it and need examples,
please go to http://getcomposer.org/ and read up on it. Composer is a great system, and if you
are serious about PHP development you should know it.

add either (releases)
- "3rdpartyeve/perry": "0.1.*"
or (dev-master, changing source)
- "3rdpartyeve/perry": "dev-master"
to your composer.json


### Usage
This is an example which assumes composer has been used to install the package:
```php
<?php
// declare namespace of your script (optional, but recommended)
namespace MyScript;

// require composers autoload.php
require_once 'vendor/autoload.php';

// import Perry\Representation\Eve\v1\DistrictCollection class as DistrictCollection to the current namespace
// you don't have to do this, you can use the fully qualified name as well, but i'd recommed this.
use Perry\Representation\Eve\v1\DistrictCollection;

// we get the DistrictCollection Object, which will cause Perry to make a request to CCP's CREST API, and
// populate the DistrictCollection (and the Districts it holds)
// please note that we do have to use the getInstance() method here, since CCP has not fully published
// the CREST API yet. Normaly you would get the Api Representation, and from that use a Reference to the
// DistrictCollection Representation.
$districtCollection = DistrictCollection::getInstance();


// districtCollection has a member called "items" which contains a list of districts
// we iterate over those items, and print a short info for every district.
// owner,system and infrastructure are references, which means they refer to further
// api representations, sadly, at the moment they refer to parts of the CREST API that
// CCP has not made public yet.
// If those reprenstations where public you could access them by doing $district->owner(), which would return a
// Corporation Representation. Again, this this is not working yet, hence we only use the name of the
// reference in this example.

foreach ($districtCollection->items as $district) {
    printf(
        "District: %s\n Owner: %s\n System: %s\n Clone Capacity: %s\n cloneRate: %s\n Infrastructure: %s\n\n",
        $district->name,
        $district->owner->name,
        $district->system->name,
        $district->cloneCapacity,
        $district->cloneRate,
        $district->infrastructure->name
    );
}
```