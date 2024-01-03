<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ApplyZim</title>
    @vite('resources/css/app.css')
</head>
<body>


    <main class="flex flex-col mb-24 pb-5 w-full h-full" >
        <x-navbar></x-navbar>
        {{$slot}}
    </main>

    <x-message />

    @guest
        <footer class=" text-white fixed bottom-0 left-0  w-full p-3 justify-center items-center flex  flex-col md:flex-row bg-indigo-500" >

            <div class="flex flex-col w-full text-xl flex-auto h-full  justify-center items-start" >
                <p>Apply Zim is a platform here for both</p>
                <p class="font-semibold text-2xl" >Student & Schools</p>
            </div>

            <div class="flex md:mt-0 mt-2 justify-start md:justify-end  items-center w-full  md:w-3/4 font-bold h-full" >
                <a href="/auth/login" class="bg-indigo-500 mr-2 py-2 px-6  border-2 border-white rounded-full text-white hover:bg-white hover:text-black" >Sign In</a>
                <a href="/register" class="bg-white hover:text-indigo-700 py-2 px-6 rounded-full text-black" >Join ApplyZim</a>
            </div>

        </footer>
    @endguest

    </body>
</html>
