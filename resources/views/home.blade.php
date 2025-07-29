<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style= "border:3px-solid-black">
        <h2>Register</h2>
        
        <form action="/register" method="POST">
            @csrf
            <input type="text" placholder="name" />
            <input type="email" placholder="Email" />
            <input type="password" placholder="Password" />
            <button>Register</button>
        </form>
    </div>
</body>
</html>