<!DOCTYPE html>
<html>
<body>

<h1>My first PHP page</h1>

<?php
$opts = array(
'http'=>array(
'method'=>"GET",
'header'=>"X-aws-ec2-metadata-token-ttl-seconds: 21600\r\n"
)
);

$context = stream_context_create($opts);

// Open the file using the HTTP headers set above
$token = file_get_contents('http://169.254.169.254/latest/api/token', false, $context);

$opts = array(
'http'=>array(
'method'=>"GET",
'header'=>"X-aws-ec2-metadata-token: " . $token . '\r\n'
)
);

$context = stream_context_create($opts);

$content = file_get_contents('http://169.254.169.254/latest/meta-data', false, $context);

echo $content
?>

</body>
</html>
