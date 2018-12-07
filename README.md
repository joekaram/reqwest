# Reqwest

Reqwest is a simple request handler built over guzzle http.<br>
The main purpose behind **Reqwest** is to simplify the code for making http requests.<br>

<a name="table-of-contents"></a>

## Table of Contents

1. [Installing Request](#installing-request)
2. [Requests](#requests)
3. [Request Headers](#request-headers)
4. [JSON Requests](#json-requests)
5. [Responses](#responses)
6. [Response Status Code](#response-status-code)
6. [Response Headers](#response-headers)
6. [Failed Requests](#failed-requests)
6. [JSON Response](#json-response)

<a name="installing-reqwest"></a>

## Installing Reqwest

The recommended way to install Reqwest is using composer.
```
# Install Composer
curl -sS https://getcomposer.org/installer | php
```

Next, run the composer command to install the latest version of Reqwest.
```
php composer.phar require karam/reqwest
// or
composer require karam/reqwest
```

[Back to Table of Contents](#table-of-contents)

<a name="requests"></a>

## Requests

<a name="request-headers"></a>

### Request Headers

#### Adding Request Headers
When making requests, you can add, update, or remove headers.
```
// Adding a single header.
$request->addHeader($key, $value);
$request->addHeader('Content-Type', 'appilcation/json');
```
Of course you can add multiple headers by chaining the `addHeader($key, $value)` method, but there is another way to do so using the `addHeaders()` method.
```
// Method chaining:
$request->addHeader('Content-Type', 'application/json')
    ->addHeader('Auhtorization', 'Bearer ' . $token);

// Using arrays:
$request->addHeaders([
    'Content-Type' => 'application/json',
    'Authorization' => 'Bearer ' . $token
])
```

#### Updating Headers
You can update an existing header using the following function:
```
$request->updateHeader('Content-Type', 'application/json');
```

#### Deleting Headers
You can remove an added header using the `deleteHeader($key)` method.
```
$request->deleteHeader('Content-Type');
```

[Back to Table of Contents](#table-of-contents)

<a name="json-requests"></a>

### JSON Requests
JSON Requests are regular requests with `Content-Type` header automatically set to `application/json`.

#### GET, DELETE
To perform a get or delete request, you only need to pass the `$url`.
```
$url = "http://example.com/api/json";

// GET Request
$response = $json_request->get($url);

// DELETE Request
$response = $json_request->delete($url);
```

#### POST, PUT, PATCH
To perform a post, put, or patch request, you will need to pass the `$url` and an optional `$body` array.
```
// POST Request
$response = $json_request->post($url, [
    'field1' => 'value1',
    'field2' => 'value2',
    'field3' => 'value3'
]);

// PUT Request
$response = $json_request->put($url, [
    'field1' => 'value1',
    'field2' => 'value2',
    'field3' => 'value3'
]);

// PATCH Request
$response = $json_request->patch($url, [
    'field1' => 'value1',
    'field2' => 'value2',
    'field3' => 'value3'
]);
```

[Back to Table of Contents](#table-of-contents)

<a name="responses"></a>

## Responses

<a name="response-status-code"></a>

### Response Status Code
Use `getStatusCode()` on the response object to get the status code. The method returns `int`.
```
$response->getStatusCode().
```

[Back to Table of Contents](#table-of-contents)

<a name="response-headers"></a>

### Response Headers
You can get all headers from the response as a key-value array.
```
$headers = $response->headers();
```

To check if a response has a certain header, use the `hasHeader($key)` method.
```
$response->hasHeader('Content-Type');
```

To get a single header, use the `header($key)` method.<br>
If the specified header doesn't exist, `null` will be returned.
```
$response->header('Content-Type');
```

[Back to Table of Contents](#table-of-contents)

<a name="failed-requests"></a>

### Failed Requests
If a request failed for some reason (e.g: connection issues), the status code will be set to zero (`0`).
```
$failed_response = $request->get($url);
$failed_response->getStatusCode(); // returns 0
```

[Back to Table of Contents](#table-of-contents)

<a name="json-response"></a>

### JSON Response
JSON responses are returned from JSON Requests.<br>

To get the body of a JSON response as an array:
```
$json_response->all(); // Returns a key-value array.
```

To check if the body of the JSON Response has a certain field:
```
$json_response->has('field_name');
```

Use the `get($field)` method to get a certain field from the JSON Response. If the field doesn't exist, `null` will be returned. 
```
$json_response->get('field_name');
```

##### Failed JSON Requests
A failed JSON request will return a status code equal to zero (`0`) with the following body:
```
[
    'message' => 'Failed to make request.'
]
```

[Back to Table of Contents](#table-of-contents)