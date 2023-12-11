<x-main-layout>
    <div class="p-10 md:px-20">

        @auth
            @if (auth()->user()->id == $school->id)
                <div  class="text-xl  bg-slate-200 mb-10 w-full p-4 rounded-xl text-center " href="">ℹ️ This is how your public profile will look when students visit it</div>
            @endif
        @endauth

        <div class="flex-row flex">

            {{-- Logo --}}
        <div class="flex justify-center items-center   border-slate-300 w-40 h-40  mr-5 rounded-xl" >
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

        <br>
        <br>
        <div class="grid md:grid-cols-3 w-full h-full gap-3 ">

            <div class=" text-center bg-slate-100 rounded-xl p-10 flex flex-col items-center justify-center" >
                <p class="text-slate-400 text-3xl font-semibold "  >City</p>
                <h1>{{$school->town_city}}</h1>
            </div>

            <div class=" text-center bg-slate-100 rounded-xl p-10 flex flex-col items-center justify-center" >
                <p class="text-slate-400 text-3xl font-semibold "  >Year Established</p>
                <h1>{{$school->year_established}}</h1>
            </div>

            <div class=" text-center h-full  w-full bg-slate-100 rounded-xl p-10 flex flex-col items-center justify-center" >
                <p class="text-slate-400 text-3xl font-semibold "  >Address</p>
                <h1 class="text-3xl text-center" >{{$school->address}}</h1>
            </div>

        </div>


    </div>
</x-main-layout>
