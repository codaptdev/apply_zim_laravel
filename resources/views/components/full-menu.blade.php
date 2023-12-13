<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ApplyZim | Menu</title>
    @vite('resources/css/app.css')
</head>
<body>

    <div class="flex mt-32 w-full flex-col justify-center items-center">
        {{-- Logo --}}
        <a href="/" class="text-3xl font-bold text-slate-500 hover:text-indigo-500 cursor-pointer font-serif transition-all " >ApplyZim</a>

        @guest
            {{-- Nav Menu --}}
            <div class=" flex flex-col justify-center mt-10 items-center text-xl font-bold  gap-1 w-full" >
                <a class="hover:text-indigo-500 my-2 " href="/">Home</a>
                <a class="hover:text-indigo-500 my-2 " href="/about">About</a>
            <a href="/register" class="hover:text-indigo-500 mx-2 " href="/register">Register</a>

             {{-- Action Button --}}
             <div class="w-full mt-10 flex flex-col justify-end items-center " >
                <a href="/auth/signin" class="bg-indigo-500 drop-shadow-md px-9 py-3 rounded-xl text-white w-1/2 flex justify-center items-center " >Sign In</a>
            </div>
        @endguest

        @auth
            @if (auth()->user()->user_type == "STUDENT")
                <div class="  flex flex-col justify-center mt-10 items-center text-xl font-bold  gap-1 w-full" >
                    <a class="hover:text-indigo-500 my-2 " href="/home">Home</a>
                    <a class="hover:text-indigo-500 my-2 " href="/search">Search</a>
                    <a class="hover:text-indigo-500 my-2 " href="/applications">Applications</a>
                </div>
            @else
                <div class=" flex flex-col justify-center text-black items-center text-xl font-bold  gap-1 w-full" >
                    <a class="hover:text-indigo-500 my-2 " href="/myschool">My School</a>
                        <a class="hover:text-indigo-500 my-2 " href="/myschool/applications">Applications</a>
                </div>
            @endif

            {{-- Action Button --}}
            <div class="w-full flex flex-col justify-end items-center " >
                <br>
                <a href="/auth/signout" class="bg-indigo-500 drop-shadow-md px-9 py-3 rounded-xl text-white w-1/2 flex justify-center items-center " >Sign Out</a>
            </div>
        @endauth

        <br>

        <a class="text-slate-500" href="{{$prev}}">🔙 Go Back</a>

    </div>

</body>
</html>
