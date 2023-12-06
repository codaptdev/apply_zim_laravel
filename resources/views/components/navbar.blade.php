<div class=" flex flex-row items-center justify-start border-b-2 mb-5 w-full p-5 " >

    {{-- Logo --}}

    <a class="text-3xl w-1/5 font-bold text-black hover:text-indigo-500 cursor-pointer font-serif transition-all " >ApplyZim</a>

    @guest


    {{-- Nav Menu --}}
    <div class=" flex flex-row justify-center items-center text-xl font-bold  gap-1 w-full" >
        <a class="hover:text-indigo-500 mx-2 " href="/">Home</a>
        <a class="hover:text-indigo-500 mx-2 " href="/about">About</a>
        <a href="/register" class="hover:text-indigo-500 mx-2 " href="/register">Register</a>
    </div>

    {{-- Action Button --}}
    <div class="w-1/5 flex flex-col justify-end items-center " >
        <a href="/auth/signin" class="bg-indigo-500 drop-shadow-md px-9 py-3 rounded-xl text-white  " >Sign In</a>
    </div>

    @else
        {{-- Nav Menu --}}
        @if (auth()->user()->user_type == "STUDENT")
        <div class=" flex flex-row justify-center text-black items-center text-xl font-bold  gap-1 w-full" >
            <a class="hover:text-indigo-500 mx-2 text-black" href="/home">Home</a>
            <a class="hover:text-indigo-500 mx-2 text-black " href="/search">Search</a>
            <a class="hover:text-indigo-500 mx-2 text-black " href="/profile">Applications</a>
            <a class="hover:text-indigo-500 mx-2 text-black " href="/settings">Settings</a>
        </div>
        @else
        <div class=" flex flex-row justify-center text-black items-center text-xl font-bold  gap-1 w-full" >
            <a class="hover:text-indigo-500 mx-2 text-black" href="/home">Home</a>
            <a class="hover:text-indigo-500 mx-2 text-black " href="/applications">Applications</a>
            <a class="hover:text-indigo-500 mx-2 text-black " href="/profile">Profile</a>
            <a class="hover:text-indigo-500 mx-2 text-black " href="/settings">Settings</a>
        </div>
        @endif



    {{-- Action Button --}}
    <div class="w-1/5 flex flex-col justify-end items-center " >
        <a href="/auth/signout" class="bg-indigo-500 drop-shadow-md px-9 py-3 rounded-xl text-white  " >Sign Out</a>
    </div>
    @endguest

</div>
