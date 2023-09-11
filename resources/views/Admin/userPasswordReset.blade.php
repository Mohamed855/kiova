<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset password</title>
</head>
<body>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        @method('PUT')

        <input type="hidden" name="email" value="{{ $email }}">
        <label>
            <input type="password" name="password" placeholder="new password">
        </label>
        <label>
            <input type="password" name="password_confirmation" placeholder="confirm password">
        </label>

        <button type="submit">Save</button>
    </form>
</body>
</html>
