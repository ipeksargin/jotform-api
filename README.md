# JotForm PHP API

Offical JotForm PHP client library.

## Installation 

## Authentication

### User Access Token
Create a client using JotForm account user access token.
` $jotformUser  = JotForm::create("YOUR API KEY");` 

## Usage
Client methods are divided in 6 resources. These resources are `forms`,` users`, `submissions`, `folders`,` systems` and `reports`. 

Simple usage example to get the user information;
`$jotformUser->users->getUser();`

## Tests
After running `composer install`, run the test by using following:

`vendor/bin/phpunit tests`

or if you want to see test names and status, run the command with `--testdox` parameter.
