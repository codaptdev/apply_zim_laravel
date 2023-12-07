<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register School</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-stone-50 flex flex-col justify-center items-center py-20" >

    @foreach ($errors->all() as $error)
        <div class="w-full p-5 bg-red-300 mb-10">
            <p>{{$error}}</p>
        </div>
    @endforeach



    <h1 class=" text-3xl text-slate-400 font-serif" >ApplyZim</h1>
    <h1 class="text-4xl my-10 font-medium text-center w-1/2" >Student Registration</h1>


    <form action="/register/student" method="POST" class="bg-white " >
        @csrf

        <label> First Name</label>
        <input required type="text" placeholder="e.g Tadiwanashe" name="first_name" >

        <br>

        <label> Surname</label>
        <input required type="text" placeholder="e.g Shangwa" name="surname" >

        <br>

        <label> Email</label>
        <input required type="email" name="email" placeholder="e.g mail@myschool.com" >

        <br>

        <label>Password</label>
        <input required type="password" name="password" >

        <br>

        <label> Town or City </label>
        <select required type="text" name="town_city" placeholder="e.g Harare" >
            @foreach ($cities as $city)
                <option value="{{$city}}">{{$city}}</option>
            @endforeach
                <option value="Other">Other</option>
        </select>

        <br>

        <label>Education Level</label>
        <select required type="text" name="level"  placeholder="e.g Secondary" >
            <option value="Primary">Primary</option>
            <option value="Secondary">Secondary</option>
            <option value="Tertiary">Tertiary</option>
        </select>

        <br>
        <br>

        <input type="submit" class="link-btn shadow-md" href="" />

    </form>

    <br>
    <a href="auth/signin">Already have an account? Sign In</a>
</body>
</html>
