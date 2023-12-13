<div class=" flex flex-row items-center justify-start border-b-2 mb-5 w-full p-5 " >

    {{-- Hamburger on small screens --}}
    <div class="md:hidden flex flex-row w-full justify-start items-center" >

        {{-- Logo --}}
        <a href="/" class="text-3xl w-4/5 font-bold text-black hover:text-indigo-500 cursor-pointer font-serif transition-all " >ApplyZim</a>

        {{-- Link to full menu --}}
        <a href="/menu" class="w-full flex justify-end items-center " >
            <div class="flex flex-col w-1/4 h-full">
                <div class="bg-black rounded-full shadow-xl w-full h-2 m-1"></div>
                <div class="bg-black rounded-full shadow-xl w-full h-2 m-1"></div>
                <div class="bg-black rounded-full shadow-xl w-full h-2 m-1"></div>
            </div>
        </a>

    </div>

    {{-- Full menu bigger screen --}}
    <div class="md:flex-row items-center justify-start w-full hidden md:flex" >


        {{-- Logo --}}

        <a href="/" class="text-3xl w-1/5 font-bold text-black hover:text-indigo-500 cursor-pointer font-serif transition-all " >ApplyZim</a>

        @guest

            {{-- Nav Menu for UnAuthenticated Users --}}
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

                {{-- Nav Menu for Students --}}
                <div class=" flex flex-row justify-center text-black items-center text-xl font-bold  gap-1 w-full" >
                    <a class="hover:text-indigo-500 mx-2 text-black" href="/home">Home</a>
                    <a class="hover:text-indigo-500 mx-2 text-black " href="{{url('/search')}}">Search</a>
                    <a class="hover:text-indigo-500 mx-2 text-black " href="{{url('/applications')}}">Applications</a>
                </div>
            @else
                {{-- Full Nav for Schools --}}
                <div class=" flex flex-row justify-center text-black items-center text-xl font-bold  gap-1 w-full" >
                    <a class="hover:text-indigo-500 mx-2 text-black " href="/myschool">My School</a>
                    <a class="hover:text-indigo-500 mx-2 text-black " href="{{url('/applications')}}">Applications</a>
                </div>
            @endif

            {{-- Action Button --}}
            <div class="w-1/5 flex flex-col justify-end items-center " >
                <a href="/auth/signout" class="bg-indigo-500 drop-shadow-md px-9 py-3 rounded-xl text-white" >Sign Out</a>
            </div>

        @endguest

    </div>

</div>
