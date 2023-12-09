<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-stone-50 flex md:p-20 p-5 flex-col justify-center items-center py-20" >

    @foreach ($errors->all() as $error)
        <div class="w-full p-5 bg-red-300 mb-10">
            <p>{{$error}}</p>
        </div>
    @endforeach



    <h1 class=" text-3xl text-slate-400 font-serif" >ApplyZim</h1>

    <h1 class="text-4xl my-10 font-medium text-center w-1/2" >Welcome Back</h1>

    <form class="w-full" action={{url("auth/signin")}} method="POST" class="bg-white " >
        @csrf

        <label> Email</label>
        <input required type="email" name="email" placeholder="e.g mail@myschool.com" >

        <br>

        <label>Password</label>
        <input required type="password" name="password" >

        <br>
        <br>

        <button type="submit" class="link-btn shadow-md" href="">Sign In</button>

    </form>

    <br>
    <a href={{url('/register')}}>Don't have an account? Register</a>
</body>
</html>
