<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Header -->
    <meta charSet="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="My Express JS website">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">
    <!-- component -->
    <div class="h-screen bg-gradient-to-br from-blue-600 to-cyan-300 flex justify-center items-center w-full">
		{{ $slot }}
    </div>
</body>
</html>