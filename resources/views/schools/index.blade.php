<x-main-layout>
    <div class="p-10 md:px-20">

        @auth
            @if (auth()->user()->id == $school->id)
                <div  class="text-xl  bg-slate-200 mb-10 w-full p-4 rounded-xl text-center " href="">ℹ️ This is how your public profile will look when students visit it</div>
            @endif
        @endauth

        <div class="md:flex-row flex flex-col">

        {{-- Logo --}}
        <div class="flex justify-center items-center   border-slate-300 w-60 h-60 md:h-40 md:w-40  mr-5 rounded-xl" >
            @if ($school->logo_url !== null)
                <img src={{url('storage/'. $school->logo_url )}}  alt="School Logo" class='bg-slate-300  border-2 w-full h-full rounded-xl' >
            @else
                @if (auth()->user()->id == $school->id)
                    <a href="{{url('/myschool/logo/edit')}}" >Upload A logo</a>
                @endif
            @endif
        </div>

            <div class="flex flex-col flex-auto" >
                <h1>{{$school->name}}</h1>
                <p class="text-slate-400 text-2xl font-semibold ">{{$school->level}} SCHOOL</p>

                @auth
                    @if (auth()->user()->id == $school->id)
                        <a  class="text-xl" href="{{url('/myschool/profile/edit')}}">Edit</a>
                    @endif
                @endauth


            </div>
        </div>

        {{-- Links --}}
        <div class="w-full  grid grid-cols-3 gap-2 md:flex-row md:flex mt-3">
            @if ($school->website_url != null)
                <a class="bg-green-200 border-2 border-green-400 text-green-800 py-2 px-4 rounded-full hover:bg-green-400" href="{{$school->website_url}}">Website</a>
            @endif
            @if ($school->instagram != null)
            <a class="bg-violet-200 border-2 border-violet-400  text-violet-800 py-2 px-4 rounded-full hover:bg-violet-400" href="{{$school->instagram}}">Instagram</a>

            @endif

            @if ($school->facebook != null)
                <a class="bg-blue-200 border-2 border-blue-400  text-blue-800 py-2 px-4 rounded-full hover:bg-blue-400" href="{{$school->facebook}}">Facebook</a>
            @endif

            @if ($school->twitter != null)
                <a class="bg-stone-200 border-2 border-stone-400  text-stone-800 py-2 px-4 rounded-full hover:bg-stone-400" href="{{$school->twitter}}">X (Twitter)</a>
            @endif
        </div>

        <div class="w-full p-10 bg-slate-100 mt-5 rounded-2xl text-slate-700" >
            <p>{{$school->about}}</p>
        </div>

        <br>
        <br>
        <div class="grid md:grid-cols-3 w-full h-full gap-3 ">

            <div class=" text-center bg-slate-100 rounded-xl p-5 flex flex-col items-center justify-center" >
                <p class="text-slate-400 text-2xl font-semibold "  >City</p>
                <h1>{{$school->town_city}}</h1>
            </div>

            <div class=" text-center bg-slate-100 rounded-xl p-5 flex flex-col items-center justify-center" >
                <p class="text-slate-400 text-2xl font-semibold "  >Year Established</p>
                <h1>{{$school->year_established}}</h1>
            </div>

            <div class=" text-center h-full  w-full bg-slate-100 rounded-xl p-5 flex flex-col items-center justify-center" >
                <p class="text-slate-400 text-2xl font-semibold "  >Address</p>
                <h1 class="text-3xl text-center" >{{$school->address}}</h1>
            </div>

        </div>



        <br>
        <br>
        <br>
        <x-markdown>{{$school->body}}</x-markdown>

        <div class="grid grid-cols-1 mt-10 gap-3 md:grid-cols-2">

            @if ($school->tuition_min != null)
                <div class=" text-center bg-green-100 rounded-xl p-5 flex flex-col items-center justify-center" >
                    <p class="text-slate-400 text-2xl font-semibold "  >Min Tuition USD</p>
                    <h1>${{$school->tuition_min}}</h1>
                </div>
            @endif

            @if ($school->tuition_max != null)
                <div class=" text-center bg-orange-100 rounded-xl p-5 flex flex-col items-center justify-center" >
                    <p class="text-slate-400 text-2xl font-semibold "  >Max Tuition USD</p>
                    <h1>${{$school->tuition_max}}</h1>
                </div>
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

            @if (auth()->user()->user_type == 'STUDENT')

            @endif
            <div class="fixed  bottom-0 justify-center items-center  flex left-0 w-full p-10">
                <a href="/apply?school_id={{$school->id}}" class="link-btn md:w-1/2 shadow-xl md:p-7 md:hover:w-3/5 " href="">Apply to {{$school->name}}</a>
            </div>
        @endauth

    </div>
</x-main-layout>
