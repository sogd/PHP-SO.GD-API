# PHP-SO.GD-API
A Web Service for the SO.GD API

## DEPENDENCIES

##### File SOGD.php

This API use cURL, you need to enable lib curl, [http://php.net/manual/en/curl.installation.php](http://php.net/manual/en/curl.installation.php)

## Publishers

### GET

```

<?php
include 'SOGD.php';

$api = new Publishers('your_token');

$result = $api->GET('http://so.gd/XXXXX');
echo $result->full_url;
echo '<br />';
echo $result->folder;
echo '<br />';
echo $result->ad_type;
echo '<br />';
echo $result->views;
echo '<br />';
echo $result->profit;
?>

```

###  POST

```

<?php
include 'SOGD.php';

$api = new Publishers('your_token');

$result = $api->POST(
  [
     urlToShorten => 'http://www.bar.com', // required
     domain => 'so.ht', // optional
     alias => 'baz', // optional
     myFolder => 'foo', // optional
     adType => 'banner' // optional   
  ]
);

echo $result->status;

// status 'ok'
echo $result->shortenedUrl;

// status 'error'
echo $result->message;
?>

```


### PUT

```

<?php
include 'SOGD.php';

$api = new Publishers('your_token');

$result = $api->PUT(
  [
     shorten => 'http://so.gd/XXXXX', // required
     newUrl => 'http://www.baz.com', // optional
     myFolder => 'bar', // optional
     adType => 'noad' // optional   
  ]
);

echo $result->status;

// status 'ok'
echo $result->shortenedUrl;
echo '<br />';
echo $result->full_url;
echo '<br />';
echo $result->folder;
echo '<br />';
echo $result->ad_type;

// status 'error'
echo $result->message;
?>

```


### DELETE

```

<?php
include 'SOGD.php';

$api = new Publishers('your_token');

$result = $api->DELETE('http://so.gd/XXXXX');
echo $result->status;
echo '<br />';
echo $result->message;
?>

```

## Protection Iframe


### GET


```

<?php
include 'SOGD.php';

$api = new ProtectionIframe('your_token');

$result = $api->GET('http://so.gd/XXXXX');
echo $result->full_url;
echo '<br />';
echo $result->folder;
echo '<br />';
echo $result->ad_type;
echo '<br />';
echo $result->views;
echo '<br />';
echo $result->profit;
echo '<br />';
echo $result->name;
?>

```


### POST

```

<?php
include 'SOGD.php';

$api = new ProtectionIframe('your_token');

$result = $api->POST(
  [
     urlToShorten => 'http://www.bar.com', // required
     domain => 'so.ht', // optional
     alias => 'baz', // optional
     myFolder => 'foo', // optional
     adType => 'banner', // optional
     name => 'Name Foo' // optional 
  ]
);

echo $result->status;

// status 'ok'
echo $result->shortenedUrl;

// status 'error'
echo $result->message;
?>

```


### PUT

```

<?php
include 'SOGD.php';

$api = new ProtectionIframe('your_token');

$result = $api->PUT(
  [
     shorten => 'http://so.gd/XXXXX', // required
     newUrl => 'http://www.baz.com', // optional
     myFolder => 'bar', // optional
     adType => 'noad', // optional
     name => 'Name Bar' // optional   
  ]
);

echo $result->status;

// status 'ok'
echo $result->shortenedUrl;
echo '<br />';
echo $result->full_url;
echo '<br />';
echo $result->folder;
echo '<br />';
echo $result->ad_type;
echo '<br />';
echo $result->name;

// status 'error'
echo $result->message;
?>

```


### DELETE

```

<?php
include 'SOGD.php';

$api = new ProtectionIframe('your_token');

$result = $api->DELETE('http://so.gd/XXXXX');
echo $result->status;
echo '<br />';
echo $result->message;
?>

```
