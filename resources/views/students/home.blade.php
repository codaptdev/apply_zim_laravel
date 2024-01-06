<x-main-layout>

    <div class="flex flex-col w-full justify-center items-center" >
        <h1 class="text-2xl px-10 md:text-5xl text-center text-slate-950" >{{$greeting}} 👋</h1>
    </div>

    <div class="mt-10 flex flex-col justify-center items-center">
        <h1 class="text-2xl text-center text-slate-500" >{{$filter_message}}</h1>
        @if ($key != '')
            <a href="/">Remove Filter</a>
        @endif
    </div>



    <div class="my-10 w-full md:px-20 p-2 grid grid-cols-1 gap-3 ">

        @forelse ($schools as $school)
            <div class="w-full rounded-xl p-5 mx-2 bg-stone-50  flex flex-row items-center justify-start border-2 border-slate-300">
                {{-- Logo --}}
                <div class="flex border-slate-200 h-32 w-32 md:w-20 md:h-20 mb-5 md:mb-0 bg-slate-300 mr-5 rounded-xl" >
                    @if ($school->logo_url !== null)
                        <img src={{url('storage/'. $school->logo_url )}}  alt="School Logo" class='bg-slate-300  border-2 w-full h-full rounded-xl xl:aspect-square' >
                    @endif
                </div>

                <div class="flex flex-col h-full">
                    <h1 class="text-xl md:text-3xl" >{{$school->name}}</h1>

                    <div class="md:flex grid grid-cols-1 md:grid-cols-2 gap-2 md:flex-row w-full md:mt-0 mt-2">
                        <a  class="bg-indigo-50  font-semibold text-indigo-800 py-1 text-sm w-fit  px-2 mr-2 md:my-4 rounded-full hover:bg-indigo-300 cursor-pointer" href='{{url("schools/" . $school->id )}}'>Visit Profile</a>
                        <a  href="?key=town_city&value={{$school->town_city}}" class="bg-green-200 w-fit text-sm font-semibold text-green-800  py-1 px-2 mr-2 md:my-4 rounded-full hover:bg-green-400 cursor-pointer">{{strtoupper($school->town_city)}}</a>
                        <a  href="?key=level&value={{$school->level}}" class="bg-amber-200 text-sm w-fit font-semibold text-amber-800  py-1 px-2 mr-2 md:my-4 rounded-full hover:bg-amber-400 cursor-pointer">{{strtoupper($school->level)}}</a>
                    </div>
                </div>
            </div>
        @empty

            <p class="text-xl text-slate-400">No Schools Found</p>

    </div>

    @endforelse
</x-main-layout>
