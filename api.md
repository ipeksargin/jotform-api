## Table of contents

- [\JotForm\JotForm](#class-jotformjotform)
- [\JotForm\ClientFunctions\AbstractClient (abstract)](#class-jotformclientfunctionsabstractclient-abstract)
- [\JotForm\ClientFunctions\User](#class-jotformclientfunctionsuser)
- [\JotForm\ClientFunctions\System](#class-jotformclientfunctionssystem)
- [\JotForm\ClientFunctions\Submission](#class-jotformclientfunctionssubmission)
- [\JotForm\ClientFunctions\Folder](#class-jotformclientfunctionsfolder)
- [\JotForm\ClientFunctions\Form](#class-jotformclientfunctionsform)
- [\JotForm\ClientFunctions\Report](#class-jotformclientfunctionsreport)
- [\JotForm\Errors\AuthorizationException](#class-jotformerrorsauthorizationexception)
- [\JotForm\Errors\ServerException](#class-jotformerrorsserverexception)
- [\JotForm\Errors\ForbiddenException](#class-jotformerrorsforbiddenexception)
- [\JotForm\Errors\NotFoundException](#class-jotformerrorsnotfoundexception)
- [\JotForm\Errors\DefaultException](#class-jotformerrorsdefaultexception)
- [\JotForm\Errors\BadRequestException](#class-jotformerrorsbadrequestexception)
- [\JotForm\Errors\BadGatewayException](#class-jotformerrorsbadgatewayexception)
- [\JotForm\Errors\NotImplementedException](#class-jotformerrorsnotimplementedexception)
- [\JotForm\Errors\ServiceUnavailableException](#class-jotformerrorsserviceunavailableexception)
- [\JotForm\JotFormAPI\RequestHandler](#class-jotformjotformapirequesthandler)
- [\JotForm\JotFormAPI\DateOptions\StartDate](#class-jotformjotformapidateoptionsstartdate)
- [\JotForm\JotFormAPI\DateOptions\Action](#class-jotformjotformapidateoptionsaction)
- [\JotForm\JotFormAPI\DateOptions\Date](#class-jotformjotformapidateoptionsdate)
- [\JotForm\JotFormAPI\DateOptions\SortBy](#class-jotformjotformapidateoptionssortby)
- [\JotForm\JotFormAPI\FilterOptions\OrderBy](#class-jotformjotformapifilteroptionsorderby)
- [\JotForm\JotFormAPI\FilterOptions\Limit](#class-jotformjotformapifilteroptionslimit)
- [\JotForm\JotFormAPI\FilterOptions\Filter](#class-jotformjotformapifilteroptionsfilter)
- [\JotForm\JotFormAPI\FilterOptions\Offset](#class-jotformjotformapifilteroptionsoffset)

<hr />

### Class: \JotForm\JotForm

> Class JotForm

| Visibility | Function |
|:-----------|:---------|
| public | <strong>__construct(</strong><em>[\JotForm\JotFormAPI\RequestHandler](#class-jotformjotformapirequesthandler)</em> <strong>$handler</strong>, <em>\string</em> <strong>$baseURL=`'https://api.jotform.com'`</strong>)</strong> : <em>void</em><br /><em>JotForm constructor.</em> |
| public static | <strong>create(</strong><em>\string</em> <strong>$apiKey</strong>, <em>string</em> <strong>$baseURL=`'https://api.jotform.com'`</strong>)</strong> : <em>[\JotForm\JotForm](#class-jotformjotform)</em> |
| public | <strong>filterOrder(</strong><em>int/[\JotForm\JotFormAPI\FilterOptions\Offset](#class-jotformjotformapifilteroptionsoffset)</em> <strong>$offset</strong>, <em>int/[\JotForm\JotFormAPI\FilterOptions\Limit](#class-jotformjotformapifilteroptionslimit)</em> <strong>$limit</strong>, <em>string/null/[\JotForm\JotFormAPI\FilterOptions\OrderBy](#class-jotformjotformapifilteroptionsorderby)</em> <strong>$orderBy</strong>, <em>string/null/[\JotForm\JotFormAPI\FilterOptions\Filter](#class-jotformjotformapifilteroptionsfilter)</em> <strong>$filter</strong>)</strong> : <em>array</em> |
| public | <strong>historyDetail(</strong><em>[\JotForm\JotFormAPI\DateOptions\Action](#class-jotformjotformapidateoptionsaction)</em> <strong>$action</strong>, <em>[\JotForm\JotFormAPI\DateOptions\Date](#class-jotformjotformapidateoptionsdate)</em> <strong>$date</strong>, <em>[\JotForm\JotFormAPI\DateOptions\SortBy](#class-jotformjotformapidateoptionssortby)</em> <strong>$sortBy</strong>, <em>[\JotForm\JotFormAPI\DateOptions\StartDate](#class-jotformjotformapidateoptionsstartdate)</em> <strong>$startDate</strong>, <em>[\JotForm\JotFormAPI\DateOptions\StartDate](#class-jotformjotformapidateoptionsstartdate)</em> <strong>$endDate</strong>)</strong> : <em>void</em> |
| public | <strong>registerDetails(</strong><em>\string</em> <strong>$username</strong>, <em>\string</em> <strong>$password</strong>, <em>\string</em> <strong>$email</strong>)</strong> : <em>array</em> |
| public | <strong>request(</strong><em>\string</em> <strong>$requestType</strong>, <em>\string</em> <strong>$endpoint</strong>, <em>array</em> <strong>$params=array()</strong>)</strong> : <em>array/bool/float/int/object/string/null</em> |

<hr />

### Class: \JotForm\ClientFunctions\AbstractClient (abstract)

> Class AbstractClient

| Visibility | Function |
|:-----------|:---------|
| public | <strong>__construct(</strong><em>[\JotForm\JotForm](#class-jotformjotform)</em> <strong>$client</strong>)</strong> : <em>void</em><br /><em>AbstractClient constructor.</em> |
| protected | <strong>getBodyContent(</strong><em>mixed</em> <strong>$response</strong>)</strong> : <em>mixed</em> |

<hr />

### Class: \JotForm\ClientFunctions\User

> Class User

| Visibility | Function |
|:-----------|:---------|
| public | <strong>createForm(</strong><em>array</em> <strong>$formDetails</strong>)</strong> : <em>array Returns new form.</em><br /><em>createForm Create a new form.</em> |
| public | <strong>getFolders()</strong> : <em>array Returns details like name, owner etc.</em><br /><em>getFolders Get list of folders for this account.</em> |
| public | <strong>getForms(</strong><em>integer/[\JotForm\JotFormAPI\FilterOptions\Offset](#class-jotformjotformapifilteroptionsoffset)</em> <strong>$offset</strong>, <em>integer/[\JotForm\JotFormAPI\FilterOptions\Limit](#class-jotformjotformapifilteroptionslimit)</em> <strong>$limit</strong>, <em>string/[\JotForm\JotFormAPI\FilterOptions\OrderBy](#class-jotformjotformapifilteroptionsorderby)</em> <strong>$orderBy</strong>, <em>string/[\JotForm\JotFormAPI\FilterOptions\Filter](#class-jotformjotformapifilteroptionsfilter)</em> <strong>$filter</strong>)</strong> : <em>array Returns details like title, creation date etc.</em><br /><em>getForms Get list of forms for this user.</em> |
| public | <strong>getHistory(</strong><em>mixed/[\JotForm\JotFormAPI\DateOptions\Action](#class-jotformjotformapidateoptionsaction)</em> <strong>$action</strong>, <em>mixed/[\JotForm\JotFormAPI\DateOptions\Date](#class-jotformjotformapidateoptionsdate)</em> <strong>$date</strong>, <em>mixed/[\JotForm\JotFormAPI\DateOptions\SortBy](#class-jotformjotformapidateoptionssortby)</em> <strong>$sortBy</strong>, <em>string/[\JotForm\JotFormAPI\DateOptions\StartDate](#class-jotformjotformapidateoptionsstartdate)</em> <strong>$startDate</strong>, <em>string/[\JotForm\JotFormAPI\DateOptions\StartDate](#class-jotformjotformapidateoptionsstartdate)</em> <strong>$endDate</strong>)</strong> : <em>array Returns updated settings.</em><br /><em>getHistory Get user activity.</em> |
| public | <strong>getReports()</strong> : <em>array Returns reports including CSV, Excel, charts etc.</em><br /><em>getReports Get list of reports.</em> |
| public | <strong>getSettings()</strong> : <em>array Returns account's time zone and language.</em><br /><em>getSettings Get settings for this account.</em> |
| public | <strong>getSubmissions(</strong><em>integer/[\JotForm\JotFormAPI\FilterOptions\Offset](#class-jotformjotformapifilteroptionsoffset)</em> <strong>$offset</strong>, <em>integer/[\JotForm\JotFormAPI\FilterOptions\Limit](#class-jotformjotformapifilteroptionslimit)</em> <strong>$limit</strong>, <em>string/[\JotForm\JotFormAPI\FilterOptions\OrderBy](#class-jotformjotformapifilteroptionsorderby)</em> <strong>$orderBy</strong>, <em>string/[\JotForm\JotFormAPI\FilterOptions\Filter](#class-jotformjotformapifilteroptionsfilter)</em> <strong>$filter</strong>)</strong> : <em>array Returns details like title, creation date etc.</em><br /><em>getSubmissions Get list of submissions.</em> |
| public | <strong>getSubusers()</strong> : <em>array Returns list of subusers and forms with access privileges.</em><br /><em>getSubusers Get subuser account list.</em> |
| public | <strong>getUsage()</strong> : <em>array Returns details like submission count, payments, uploads etc.</em><br /><em>getUsage Get number of submission received.</em> |
| public | <strong>getUser()</strong> : <em>array Returns details like username, account type, email etc.</em><br /><em>summary getUser Get user account details for this Jotform user.</em> |
| public | <strong>updateSettings(</strong><em>array</em> <strong>$params</strong>)</strong> : <em>array Returns updated settings.</em><br /><em>updateSettings Update settings for account.</em> |
| public | <strong>userLogin(</strong><em>array</em> <strong>$userCredentials</strong>)</strong> : <em>array Returns status of request.</em><br /><em>userLogin Login user.</em> |
| public | <strong>userLogout()</strong> : <em>array Returns status of request.</em><br /><em>userLogout Logout user.</em> |
| public | <strong>userRegister(</strong><em>string</em> <strong>$username</strong>, <em>string</em> <strong>$password</strong>, <em>string</em> <strong>$email</strong>)</strong> : <em>array Returns new user's details.</em><br /><em>userRegister Register a new user.</em> |

*This class extends [\JotForm\ClientFunctions\AbstractClient](#class-jotformclientfunctionsabstractclient-abstract)*

<hr />

### Class: \JotForm\ClientFunctions\System

> Class System

| Visibility | Function |
|:-----------|:---------|
| public | <strong>getSystemPlan(</strong><em>string</em> <strong>$planName</strong>)</strong> : <em>array Returns details like limit, prices etc.</em><br /><em>getSystemPlan Get system plan details.</em> |

*This class extends [\JotForm\ClientFunctions\AbstractClient](#class-jotformclientfunctionsabstractclient-abstract)*

<hr />

### Class: \JotForm\ClientFunctions\Submission

> Class Submission

| Visibility | Function |
|:-----------|:---------|
| public | <strong>deleteSubmission(</strong><em>integer</em> <strong>$submissionId</strong>)</strong> : <em>array Returns status of the request.</em><br /><em>deleteSubmission Delete a specific submission.</em> |
| public | <strong>editSubmission(</strong><em>integer</em> <strong>$submissionId</strong>, <em>array</em> <strong>$submissionDetails</strong>)</strong> : <em>array Returns content of the submission.</em><br /><em>editSubmission Edit a specific submission.</em> |
| public | <strong>getSubmission(</strong><em>integer</em> <strong>$submissionId</strong>)</strong> : <em>array Returns content of the submission.</em><br /><em>getSubmission Get submission details.</em> |

*This class extends [\JotForm\ClientFunctions\AbstractClient](#class-jotformclientfunctionsabstractclient-abstract)*

<hr />

### Class: \JotForm\ClientFunctions\Folder

> Class Folder

| Visibility | Function |
|:-----------|:---------|
| public | <strong>getFolder(</strong><em>integer</em> <strong>$folderId</strong>)</strong> : <em>array Returns details like owner,color,subfolders,forms etc.</em><br /><em>getFolder Get folder details.</em> |

*This class extends [\JotForm\ClientFunctions\AbstractClient](#class-jotformclientfunctionsabstractclient-abstract)*

<hr />

### Class: \JotForm\ClientFunctions\Form

> Class Form

| Visibility | Function |
|:-----------|:---------|
| public | <strong>cloneForm(</strong><em>integer</em> <strong>$formId</strong>)</strong> : <em>array Returns status of the request.</em><br /><em>cloneForm Clone a specific form.</em> |
| public | <strong>createForm(</strong><em>array</em> <strong>$formDetail</strong>)</strong> : <em>array Returns new form.</em><br /><em>createForm Create a new form.</em> |
| public | <strong>createFormQuestion(</strong><em>integer</em> <strong>$formId</strong>, <em>array</em> <strong>$questionDetail</strong>)</strong> : <em>array Returns properties of new question.</em><br /><em>createFormQuestion Create a new question of a form.</em> |
| public | <strong>createFormReport(</strong><em>integer</em> <strong>$formId</strong>, <em>array</em> <strong>$reportDetails</strong>)</strong> : <em>array Returns report details and URL.</em><br /><em>createFormReport Create a new report of a form.</em> |
| public | <strong>createFormSubmission(</strong><em>integer</em> <strong>$formId</strong>, <em>array/\JotForm\ClientFunctions\JotForm\SubmissionDetails</em> <strong>$submissionDetails</strong>)</strong> : <em>array Returns details like submissionId and URL.</em><br /><em>createFormSubmission Create a single form submission using API.</em> |
| public | <strong>createFormSubmissions(</strong><em>integer</em> <strong>$formId</strong>, <em>array</em> <strong>$createFormSubmissionDetail</strong>)</strong> : <em>array Returns details like submissionId and URL.</em><br /><em>createFormSubmission Create form submissions using API.</em> |
| public | <strong>createFormWebhook(</strong><em>integer</em> <strong>$formId</strong>, <em>array</em> <strong>$webHookURL</strong>)</strong> : <em>array Returns list of webhooks in form.</em><br /><em>createFormWebhook Create a new webhook in form.</em> |
| public | <strong>createForms(</strong><em>array</em> <strong>$formDetail</strong>)</strong> : <em>array Returns new forms.</em><br /><em>createForms Create multiple forms.</em> |
| public | <strong>deleteForm(</strong><em>integer</em> <strong>$formId</strong>)</strong> : <em>array Returns status of the request.</em><br /><em>deleteForm Delete a specific form.</em> |
| public | <strong>deleteFormQuestion(</strong><em>integer</em> <strong>$formId</strong>, <em>integer</em> <strong>$questionId</strong>)</strong> : <em>array Returns status of the request.</em><br /><em>deleteFromQuestion Delete a specific question in form.</em> |
| public | <strong>deleteFormWebhook(</strong><em>integer</em> <strong>$formId</strong>, <em>integer</em> <strong>$webhookId</strong>)</strong> : <em>array Returns remaining list of webhooks in form.</em><br /><em>deleteFormWebhook Delete a specific webhook in form.</em> |
| public | <strong>editFromQuestion(</strong><em>integer</em> <strong>$formId</strong>, <em>integer</em> <strong>$questionId</strong>, <em>array</em> <strong>$questionDetail</strong>)</strong> : <em>array Returns status of the request.</em><br /><em>editFormQuestion Add or edit a specific question in the form.</em> |
| public | <strong>getForm(</strong><em>integer</em> <strong>$formId</strong>)</strong> : <em>array Returns details like formId,status,creation dates etc.</em><br /><em>getForm Get form details.</em> |
| public | <strong>getFormFiles(</strong><em>integer</em> <strong>$formId</strong>)</strong> : <em>array Returns file details like name,URL etc.</em><br /><em>getFromFiles Get all files in form.</em> |
| public | <strong>getFormProperties(</strong><em>integer</em> <strong>$formId</strong>)</strong> : <em>array Returns details like width, style, expiration date etc.</em><br /><em>getFormProperties Get all properties in form.</em> |
| public | <strong>getFormPropertyDetail(</strong><em>integer</em> <strong>$formId</strong>, <em>integer</em> <strong>$propertyKey</strong>)</strong> : <em>array Returns given property key.</em><br /><em>getFormPropertyDetail Get a specific property of the form.</em> |
| public | <strong>getFormQuestionDetail(</strong><em>integer</em> <strong>$formId</strong>, <em>integer</em> <strong>$questionId</strong>)</strong> : <em>array Returns details like if question is required or valid.</em><br /><em>getFormQuestionDetails Get a specific question.</em> |
| public | <strong>getFormQuestions(</strong><em>integer</em> <strong>$formId</strong>)</strong> : <em>array Returns question properties of form.</em><br /><em>getFormQuestions Get list of all questions in the form.</em> |
| public | <strong>getFormReports(</strong><em>integer</em> <strong>$formId</strong>)</strong> : <em>array Returns list of reports in the form and report details like title.</em><br /><em>getFormReports Get all reports of a form including excel, csv etc.</em> |
| public | <strong>getFormSubmissions(</strong><em>integer</em> <strong>$formId</strong>, <em>[\JotForm\JotFormAPI\FilterOptions\Offset](#class-jotformjotformapifilteroptionsoffset)</em> <strong>$offset</strong>, <em>[\JotForm\JotFormAPI\FilterOptions\Limit](#class-jotformjotformapifilteroptionslimit)</em> <strong>$limit</strong>, <em>[\JotForm\JotFormAPI\FilterOptions\OrderBy](#class-jotformjotformapifilteroptionsorderby)</em> <strong>$orderBy</strong>, <em>[\JotForm\JotFormAPI\FilterOptions\Filter](#class-jotformjotformapifilteroptionsfilter)</em> <strong>$filter</strong>)</strong> : <em>array Returns details like submissionId and URL.</em><br /><em>getFormSubmission Get form submission.</em> |
| public | <strong>getFormWebhooks(</strong><em>integer</em> <strong>$formId</strong>)</strong> : <em>array Returns list of webhooks in form.</em><br /><em>getFormWebhooks Get list of Webhooks in form.</em> |
| public | <strong>setFormProperties(</strong><em>integer</em> <strong>$formId</strong>, <em>array</em> <strong>$formProperties</strong>)</strong> : <em>array Returns edited properties.</em><br /><em>setFormProperties Add or edit properties of a specific form.</em> |

*This class extends [\JotForm\ClientFunctions\AbstractClient](#class-jotformclientfunctionsabstractclient-abstract)*

<hr />

### Class: \JotForm\ClientFunctions\Report

> Class Report

| Visibility | Function |
|:-----------|:---------|
| public | <strong>deleteReport(</strong><em>integer</em> <strong>$reportId</strong>)</strong> : <em>array Returns status of the request.</em><br /><em>deleteReport Delete a specific report.</em> |
| public | <strong>getReport(</strong><em>integer</em> <strong>$reportId</strong>)</strong> : <em>array Returns report details like title, status, fields etc.</em><br /><em>getReport Get report details.</em> |

*This class extends [\JotForm\ClientFunctions\AbstractClient](#class-jotformclientfunctionsabstractclient-abstract)*

<hr />

### Class: \JotForm\Errors\AuthorizationException

> Class AuthorizationException

| Visibility | Function |
|:-----------|:---------|

*This class extends \Exception*

*This class implements \Throwable*

<hr />

### Class: \JotForm\Errors\ServerException

> Class ServerException

| Visibility | Function |
|:-----------|:---------|

*This class extends \Exception*

*This class implements \Throwable*

<hr />

### Class: \JotForm\Errors\ForbiddenException

> Class ForbiddenException

| Visibility | Function |
|:-----------|:---------|

*This class extends \Exception*

*This class implements \Throwable*

<hr />

### Class: \JotForm\Errors\NotFoundException

> Class NotFoundException

| Visibility | Function |
|:-----------|:---------|

*This class extends \Exception*

*This class implements \Throwable*

<hr />

### Class: \JotForm\Errors\DefaultException

> Class DefaultException

| Visibility | Function |
|:-----------|:---------|

*This class extends \Exception*

*This class implements \Throwable*

<hr />

### Class: \JotForm\Errors\BadRequestException

> Class BadRequestException

| Visibility | Function |
|:-----------|:---------|

*This class extends \Exception*

*This class implements \Throwable*

<hr />

### Class: \JotForm\Errors\BadGatewayException

> Class BadGatewayException

| Visibility | Function |
|:-----------|:---------|

*This class extends \Exception*

*This class implements \Throwable*

<hr />

### Class: \JotForm\Errors\NotImplementedException

> Class NotImplementedException

| Visibility | Function |
|:-----------|:---------|

*This class extends \Exception*

*This class implements \Throwable*

<hr />

### Class: \JotForm\Errors\ServiceUnavailableException

> Class ServiceUnavailableException

| Visibility | Function |
|:-----------|:---------|

*This class extends \Exception*

*This class implements \Throwable*

<hr />

### Class: \JotForm\JotFormAPI\RequestHandler

> Class RequestHandler

| Visibility | Function |
|:-----------|:---------|
| public | <strong>__construct(</strong><em>\GuzzleHttp\Client</em> <strong>$client</strong>)</strong> : <em>void</em><br /><em>RequestHandler constructor.</em> |
| public | <strong>executeHttpRequest(</strong><em>string</em> <strong>$requestType</strong>, <em>string</em> <strong>$url</strong>, <em>array</em> <strong>$params=array()</strong>)</strong> : <em>\Psr\Http\Message\ResponseInterface</em> |

<hr />

### Class: \JotForm\JotFormAPI\DateOptions\StartDate

| Visibility | Function |
|:-----------|:---------|
| public | <strong>getStartDate()</strong> : <em>string</em> |
| public | <strong>setStartDate(</strong><em>mixed/\string</em> <strong>$startDate</strong>)</strong> : <em>void</em> |

<hr />

### Class: \JotForm\JotFormAPI\DateOptions\Action

| Visibility | Function |
|:-----------|:---------|

<hr />

### Class: \JotForm\JotFormAPI\DateOptions\Date

| Visibility | Function |
|:-----------|:---------|

<hr />

### Class: \JotForm\JotFormAPI\DateOptions\SortBy

| Visibility | Function |
|:-----------|:---------|

<hr />

### Class: \JotForm\JotFormAPI\FilterOptions\OrderBy

> Class OrderBy

| Visibility | Function |
|:-----------|:---------|

<hr />

### Class: \JotForm\JotFormAPI\FilterOptions\Limit

> Class Limit

| Visibility | Function |
|:-----------|:---------|
| public | <strong>getLimit()</strong> : <em>string</em> |
| public | <strong>setLimit(</strong><em>mixed/\int</em> <strong>$limit</strong>)</strong> : <em>void</em> |

<hr />

### Class: \JotForm\JotFormAPI\FilterOptions\Filter

> Class Filter

| Visibility | Function |
|:-----------|:---------|
| public | <strong>getFilter()</strong> : <em>string</em> |
| public | <strong>setFilter(</strong><em>mixed/\string</em> <strong>$filter</strong>)</strong> : <em>void</em> |

<hr />

### Class: \JotForm\JotFormAPI\FilterOptions\Offset

> Class Offset

| Visibility | Function |
|:-----------|:---------|
| public | <strong>getOffset()</strong> : <em>string</em> |
| public | <strong>setOffset(</strong><em>mixed/\int</em> <strong>$offset</strong>)</strong> : <em>void</em> |


Fatal error: Uncaught TypeError: Return value of "PHPDocsMD\Console\PHPDocsMDCommand::execute()" must be of the type int, "null" returned. in /Users/ipek/Desktop/jotform-api/vendor/symfony/console/Command/Command.php:261
Stack trace:
#0 /Users/ipek/Desktop/jotform-api/vendor/symfony/console/Application.php(911): Symfony\Component\Console\Command\Command->run(Object(Symfony\Component\Console\Input\ArgvInput), Object(Symfony\Component\Console\Output\ConsoleOutput))
#1 /Users/ipek/Desktop/jotform-api/vendor/symfony/console/Application.php(264): Symfony\Component\Console\Application->doRunCommand(Object(PHPDocsMD\Console\PHPDocsMDCommand), Object(Symfony\Component\Console\Input\ArgvInput), Object(Symfony\Component\Console\Output\ConsoleOutput))
#2 /Users/ipek/Desktop/jotform-api/vendor/symfony/console/Application.php(140): Symfony\Component\Console\Application->doRun(Object(Symfony\Component\Console\Input\ArgvInput), Object(Symfony\Component\Console\Output\ConsoleOutput))
#3 /Users/ipek/Desktop/jotform-api/vendor/victorjonsso in /Users/ipek/Desktop/jotform-api/vendor/symfony/console/Command/Command.php on line 261