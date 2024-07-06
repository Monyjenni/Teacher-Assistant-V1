<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Class Request</title>
</head>
<body>
    <h3>Hello Admin!!!,</h3>
    <p>A new class request has been created by a student:</p>
    <ul>
        <li><strong>Class Name:</strong> {{ $class->name }}</li>
        <li><strong>Description:</strong> {{ $class->description }}</li>
        <li><strong>Status:</strong> {{ $class->status }}</li>
    </ul>

    <p>You can view this class request by clicking the link below:</p>
    <p><a href="{{ route('admin.show', $class->id) }}">View Class Request</a></p>
    <p>Regards,<br>{{ $from }}</p>
</body>
</html>
