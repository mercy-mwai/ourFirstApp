<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@auth
    <p>Congrats you are logged in</p>
    <form action="/logout" method="POST">
     @csrf
     <button>Log out</button>
    </form>
<div style= "border:3px solid black;padding: 20px">
    <h2>Create a new Post</h2>
    <form action="/create_post" method="POST">
    @csrf
    <input type="text" name="title" placeholder="post title"/>
    <textarea name="body" placeholder="body content..."></textarea>
    <button>Save post</button>
    </form>
</div>

@else 
 <div style= "border:3px solid black;padding: 20px">
        <h2>Register</h2>
        <form action="/register" method="POST">
            @csrf
            <input name="name" type="text" placeholder="name" />
            <input name="email" type="email" placeholder="Email" />
            <input name="password" type="password" placeholder="Password" />
            <button>Register</button>
        </form>
    </div>
 <div style= "border:3px solid black;padding:20px;">
        <h2>Login</h2>
        <form action="/login" method="POST">
            @csrf
            <input name="loginname" type="text" placeholder="name" />
            <input name="loginpassword" type="password" placeholder="Password" />
            <button>Log in</button>
        </form>
    </div>
@endauth

   
</body>
</html>