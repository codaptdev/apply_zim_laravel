<x-main-layout>
    <div class="p-5 md:px-20">

        {{-- Check if the owner of the school account is viewing the page --}}
        @auth
            @if (auth()->user()->id == $school->user_id)
                <div  class="text-xl  bg-slate-200 mb-10 w-full p-4 rounded-xl text-center " href="">ℹ️ This is how your public profile will look when students visit it</div>
            @endif
        @endauth



        <div class="md:flex-row flex flex-col">

        {{-- Logo --}}
        <x-logo-con :school="$school"></x-logo-con>

            <div class="flex flex-col flex-auto" >
                <h1>{{$school->name}}</h1>
                <p class="text-slate-400 text-2xl font-semibold ">{{$school->level}} SCHOOL</p>

                @auth
                    @if (auth()->user()->id == $school->user_id)
                        <a  class="text-xl" href="{{url('/myschool/profile/edit')}}">Edit</a>
                    @endif
                @endauth


            </div>
        </div>

        {{-- Links --}}
        <div class="w-full  grid grid-cols-1 md:grid-cols-3 gap-2 md:flex-row md:flex mt-3">
            @if ($school->website_url != null)
                <a target="blank" class="bg-green-200 border-2 border-green-400 text-green-800 py-2 px-4 rounded-full hover:bg-green-400" href="{{$school->website_url}}">
                    <i class="fa-solid fa-link"></i>
                    Website
                </a>
            @endif
            @if ($school->instagram != null)
            <a target="blank" class="bg-violet-200 border-2 border-violet-400  text-violet-800 py-2 px-4 rounded-full hover:bg-violet-400" href="{{$school->instagram}}">
                <i class="fa-brands fa-instagram"></i>
                Instagram
            </a>

            @endif

            @if ($school->facebook != null)
                <a target="blank" class="bg-blue-200 border-2 border-blue-400  text-blue-800 py-2 px-4 rounded-full hover:bg-blue-400" href="{{$school->facebook}}">
                    <i class="fa-brands fa-facebook"></i>
                    Facebook
                </a>
            @endif

            @if ($school->twitter != null)
                <a target="blank" class="bg-stone-200 border-2 border-stone-400  text-stone-800 py-2 px-4 rounded-full hover:bg-stone-400" href="{{$school->twitter}}">
                    <i class="fa-brands fa-x-twitter"></i>
                    X (Twitter)
                </a>
            @endif

            @auth
                @if(auth()->user()->user_type === 'STUDENT')
                    @if ($is_bookmarked)
                        <x-pill
                        :href="'/bookmarks/delete/' . $school->id"
                        :color="'red'"
                        >
                        <i class="fa-solid fa-trash"></i>
                        Unbookmark</x-pill>
                    @else
                        <x-pill
                        :href="'/bookmarks/add/' . $school->id"
                        :color="'grey'"
                        >
                        <i class="fa-solid fa-bookmark"></i>
                        Bookmark</x-pill>
                    @endif
                @endif
            @endauth

        </div>

        <div class="w-full p-10 bg-slate-100 mt-5 rounded-2xl text-slate-700" >
            <p>{{$school->about}}</p>
        </div>

        <br>
        <br>
        <div class="grid md:grid-cols-3 w-full h-full gap-3 ">

            <div class=" text-center bg-slate-100 rounded-xl p-5 flex flex-col items-center justify-center" >
                <p class="text-slate-400 text-xl font-semibold "  >City <i class="fa-solid fa-city"></i></p>
                <h1 class="text-3xl">{{$school->town_city}}</h1>
            </div>

            <div class=" text-center bg-slate-100 rounded-xl p-5 flex flex-col items-center justify-center" >
                <p class="text-slate-400 text-xl font-semibold "  >Year Established <i class="fa-solid fa-calendar"></i></p>
                <h1 class="text-3xl" >{{$school->year_established}}</h1>
            </div>

            <div class=" text-center h-full  w-full bg-slate-100 rounded-xl p-5 flex flex-col items-center justify-center" >
                <p class="text-slate-400 text-xl  font-semibold "  >Address <i class="fa-solid fa-location-dot"></i> </p>
                <h1 class="text-xl text-center " >{{$school->address}}</h1>
            </div>

        </div>



        <br>
        <br>
        <br>
        <x-markdown id="mdc" class=" p-5 w-full h-full flex flex-col rounded-xl" >{{$school->body}}</x-markdown>

        <div class="grid w-full grid-cols-1 mt-10 gap-3 ">

            {{-- If the max tuition is 0 then school is free --}}

            @if ($school->tuition_max === 0)
            <div class=" text-center bg-green-100 rounded-xl p-5 w-full flex-auto h-full flex flex-col items-center justify-center" >
                <p class="text-slate-400 text-2xl font-semibold "  >This Schools Tuition is</p>
                <h1>Free</h1>
            </div>
            @else

                @if ($school->tuition_min != null && $school->tuition_min !== 0)
                <div class=" text-center bg-green-100 rounded-xl p-5 flex flex-col items-center justify-center" >
                        <p class="text-slate-400 text-2xl font-semibold "  >Min Tuition USD</p>
                        <h1>${{$school->tuition_min}}</h1>
                    </div>
                @endif

                    @if ($school->tuition_min === 0)
                    <div class=" text-center bg-green-100 rounded-xl p-5 flex flex-col items-center justify-center" >
                        <p class="text-slate-400 text-2xl font-semibold "  >Min Tuition USD</p>
                        <h1>Free</h1>
                    </div>
                    @endif

                    @if ($school->tuition_max != null)
                    <div class=" text-center bg-orange-100 rounded-xl p-5 flex flex-col items-center justify-center" >
                        <p class="text-slate-400 text-2xl font-semibold "  >Max Tuition USD</p>
                        <h1>${{$school->tuition_max}}</h1>
                    </div>
                    @endif

                @endif
            </div>

        @if ($school->application_process != null)
            <div class="bg-slate-100 p-10 rounded-2xl my-10" >
                <h1 class="text-4xl" >Application Process</h1>
                <br>
                <p class="text-xl text-slate-600" >{{$school->application_process}}</p>
            </div>
        @endif

        @auth

            @if (auth()->user()->user_type == 'STUDENT' && $school->application_url != null)
                <div class="fixed  bottom-0 justify-center items-center  flex flex-row left-0 w-full p-10">
                    <a target="blank" href="/apply?school_id={{$school->id}}" class="flex flex-row link-btn md:w-1/2 shadow-xl md:p-3 md:hover:w-3/5 " href=""> <span class='flex flex-row justify-center items-center' >Apply to {{$school->name}} <i class="fa-solid fa-arrow-right ml-2"></i></span> </a>
                </div>
            @endif
        @endauth

    </div>
</x-main-layout>
