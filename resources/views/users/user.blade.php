<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>User Management</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body>
    <div id="app" class="bg-gray-100">
        <h1 class="text-3xl font-bold mb-4 bg-gray-100">User Management</h1>
        <user-form></user-form>
        <user-list></user-list>
    </div>
</body>
</html>
