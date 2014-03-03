[![Latest Stable Version](https://poser.pugx.org/3rdpartyeve/perry/v/stable.png)](https://packagist.org/packages/3rdpartyeve/perry)
[![Total Downloads](https://poser.pugx.org/3rdpartyeve/perry/downloads.png)](https://packagist.org/packages/3rdpartyeve/perry)
[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/3rdpartyeve/perry/badges/quality-score.png?s=aba3d207e2697ef3c25f3617f0741c69cfa29386)](https://scrutinizer-ci.com/g/3rdpartyeve/perry/)
[![Code Coverage](https://scrutinizer-ci.com/g/3rdpartyeve/perry/badges/coverage.png?s=85d3c6798ca96726961c7e4fa4059ab9206bc786)](https://scrutinizer-ci.com/g/3rdpartyeve/perry/)

# Perry
a PHP Library for accessing EVE Online's CREST API


## WARNING
this is a prototype / work in progress.
As CCP has not released much of the CREST API yet its use is extremly limited,
also this library is not to be considered complete or stable, most likely
backward compatibility will break during further development.
Do not use this if you don't know what you are doing.


## Status on the Completeness:
Implemented:
- https://wiki.eveonline.com/en/wiki/CREST_Documentation (all thats documented here is in, but not tested, since not public yet - this will most likely need some additional work when public, to play well with oauth2)
- https://forums.dust514.com/default.aspx?g=posts&t=103783 (districts have alot of references which dont resolve yet, also for some of those references i made guessing on what exactly they might refer to, so even when those are published there might be some extra work needed)
- https://forums.eveonline.com/default.aspx?g=posts&t=257854
- https://forums.eveonline.com/default.aspx?g=posts&m=3393341#post3393341 (Realtime Tournament Stuff)
- Killmail API
- https://forums.eveonline.com/default.aspx?g=posts&m=4303155 (Alliances, Incursions)

Also you might find some files to access Thora, a Proxy for the old API,
which is mostly not working yet, so don't use it.


## LICENSE
This library is released under the MIT style license.
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
- "3rdpartyeve/perry": "0.3.*"
or (dev-master, changing source)
- "3rdpartyeve/perry": "dev-master"
to your composer.json


### Usage Examples
here are a few examples, based on composer having been used to install perry

#### Killmail
```php
<?php
// lets set an url here for this example
$url = "http://public-crest.eveonline.com/killmails/34940735/32a1ed47430a4bf247d0544b399014067a734994/";

// require composers autoload.php
require_once 'vendor/autoload.php';

// import the Perry class, alternatively you can allways use the full qualified name)
use Perry\Perry;


// since we have a use import on Perry\Perry, we can just use the classname here, otherwise
// it would be $killmail = \Perry\Perry::fromUrl($url);
$killmail = Perry::fromUrl($url);

// now there should be either an exception throw (in RL you want to catch those) or
// $killmail will contain a killmail. You can now access the values of the document
// quite easy.

// check if the victim has a character (not the cases for poses for example)
if (isset($killmail->victim->character)) {
    $killstring = sprintf(
        '%s of %s lost a %s to ',
        $killmail->victim->character->name,     // since we do have a character we can use its name
        $killmail->victim->corporation->name,   // victims allways have a corporation
        $killmail->victim->shipType->name       // the shiptype is what was actually lost
    );
} else {
    $killstring = sprintf(
        '%s lost by %s to ',
        $killmail->victim->shipType->name,
        $killmail->victim->corporation->name
    );
}

// attackers is a list of KillmailAttacker Objects.
$attackers = array();
foreach ($killmail->attackers as $attacker) {
    // like the victim there might not be a character with the attacker (sentry guns?)
    $attackers[] = isset($attacker->character) ? $attacker->character->name : $attacker->corporation->name;
}

$killstring .= join(',', $attackers);

echo $killstring;


// for more examples on what data is available in killmails, look at a killmail json string. If in doubt, there are some
// in tests/mock/kill*.json
// the references (character for example) which would be called like $killmail->victim->character(), do not work,
// since CCP has not opened those endpoints yet. :(
// except: the alliance endpoint work (at the moment on SISI only, but they will go live soon)
```


#### District
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
