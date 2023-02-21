<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title> {{config("app.name") ?? 'cms'}} </title>
    @vite('resources/css/admin.css')
</head>
<body>
<noscript>
    <strong>We're sorry but material doesn't work properly without JavaScript enabled. Please enable it to
        continue.</strong>
</noscript>
<div id="app"></div>
<!-- built files will be auto injected -->
@vite('resources/js/admin.js')
</body>

</html>
