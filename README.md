# InstagramApi
Using mgp25 unoffical api
-----------

Installation
Dependencies
Install/enable the required php extentions and depedencies. You can learn how to do so here.

Using Composer
composer require mgp25/instagram-php
require __DIR__.'/../vendor/autoload.php';

$ig = new \InstagramAPI\Instagram();
If you want to test new and possibly unstable code that is in the master branch, and which hasn't yet been released, then you can use master instead (at your own risk):

composer require mgp25/instagram-php dev-master

