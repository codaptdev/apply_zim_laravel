@props(['school'])

<div class="w-full rounded-xl p-5 mx-2 bg-stone-50  flex flex-col items-center justify-start border-2 border-slate-300" >

    <div class="w-full  mx-2  flex flex-row items-center justify-start ">
            {{-- Logo --}}
        <div class="flex border-slate-200 w-28 h-28 mb-5 md:mb-0 bg-slate-300 mr-5 rounded-xl" >
            @if ($school->logo_url !== null)
            <img src={{url('storage/'. $school->logo_url )}}  alt="School Logo" class='bg-slate-300  border-2 w-full h-full rounded-xl' >
            @endif
        </div>

        <div class="flex flex-col flex-auto  h-full">
            <h1 class="text-3xl" >{{$school->name}}</h1>

            <div class="md:flex grid grid-cols-2 gap-2 md:flex-row w-full md:mt-0 mt-2">
                <a  class="bg-indigo-50 font-semibold text-indigo-800 py-1 px-4 mr-2 md:my-4 rounded-full hover:bg-indigo-300 cursor-pointer" href='{{url("schools/" . $school->id )}}'>Visit Profile</a>
                <a  class="border-stone-400 border-2 bg-stone-200 font-semibold text-stone-800  py-1 px-4 mr-2 md:my-4 rounded-full hover:bg-stone-400 cursor-pointer">{{strtoupper($school->town_city)}}</a>
                <a  class="border-stone-400 border-2 bg-stone-200 font-semibold text-stone-800  py-1 px-4 mr-2 md:my-4 rounded-full hover:bg-stone-400 cursor-pointer">{{strtoupper($school->level)}}</a>
            </div>
        </div>
    </div>

    <div class="flex mt-3 flex-col w-full justify-start items-start">
        <p class="lg:w-3/4 w-full font-medium text-slate-600 " >{{$school->about}}</p>
    </div>
</div>
