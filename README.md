# JotForm PHP API

JotForm PHP client library.

## Installation 

### Composer
Download the repository by using `git clone` or GUI. 

## Authentication

### User Access Token
Create a client using JotForm account user access token. <br />
```php
$jotForm  = JotForm::create("YOUR API KEY");
```
You can create your JotForm api key in your account by clicking the API section in settings page. 


## Usage
Client methods are divided in 6 resources. These resources are `forms`,`users`, `submissions`, `folders`,` systems` and `reports`. <br />

__The methods on that resource will be shown when you chose which resource you want to use.__<br />

Simple usage example: <br />
```php
$jotForm->users->getUser();
``` 
To get the user information.<br />

```php
$jotForm->folders->getFolder("folderId");
```
Type the id of the folder to get folder details.<br />

```php
$jotForm->systems->getSystemPlan("planName");
``` 
Type the name of the plan to get system plan details.<br />

```php
$jotForm->reports->deleteReport("reportId");
``` 
Type the id of the report you want to delete.<br />

```php
$submissionDetails = ["offset" => "5"];
$jotForm->submissions->editSubmission("submissionId","submissionDetails");
```
Type the id of the submission you want to edit as a first parameter. Then, you must provide an array including your
new submission details.<br />

```php
$formDetails = ["title" => "form title"];
$jotForm->forms->createForm("formDetails");
``` 
To create a form, you must provide form details including title, name etc as an array.

## Tests
After running `composer install`, run the test by using following:

`vendor/bin/phpunit tests`

or if you want to see test names and status, run the command with `--testdox` parameter.

`vendor/bin/phpunit tests --testdox`
