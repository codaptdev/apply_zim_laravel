@use(App\Models\Student)

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
            <div class=" flex flex-row text-black justify-center items-center text-xl font-bold  gap-1 w-full" >
                <a class="text-black hover:text-indigo-500 mx-2 " href="/">Home</a>
                <a class=" text-black hover:text-indigo-500 mx-2 " href="/about">About</a>
                <a href="/register" class=" text-black hover:text-indigo-500 mx-2 " href="/register">Register</a>
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
                    <a class="hover:text-indigo-500 mx-2 text-black " href="{{url('/bookmarks')}}">Bookmarks</a>
                </div>
            @else
                {{-- Full Nav for Schools --}}
                <div class=" flex flex-row justify-center text-black items-center text-xl font-bold gap-1 w-full" >
                    <a class="hover:text-indigo-500 mx-2 text-black " href="/myschool">My School</a>
                    <a class="hover:text-indigo-500 mx-2 text-black " href="{{url('/applications')}}">Applications</a>
                    <a class="hover:text-indigo-500 mx-2 text-black " href="/statistics">Statistics</a>
                </div>
            @endif

            {{-- Action Row --}}
            <div class="w-2/5 flex h-full min-h-max flex-row justify-end items-center text-lg" >
                <div class="py-1 px-4 hover:bg-blue-100 rounded-full flex flex-row items-center " >
                    <i class="fa-solid fa-user-circle mr-2 text-xl text-slate-600"></i>
                    <p class="font-medium text-slate-600" >{{ucfirst(strtok(auth()->user()->name, " "))}}</p>
                </div>
                <div class="h-7 min-h-fit w-px bg-slate-500 mx-2 " ></div>
                <a href="/auth/signout" class="text-indigo-500 hover:ml-1 transition-all font-normal hover:text-indigo-800" >Sign Out</a>
            </div>

        @endguest

    </div>

</div>
