@props(['school'])

<div class="flex flex-col w-full mb-5 mx-10 cursor-pointer hover:bg-slate-200 bg-slate-50 p-5 md:p-10 rounded-xl" >

    {{-- Header --}}
    <div class="flex flex-col  md:flex-row justify-start items-start w-full">

            {{-- Logo --}}
            <div class="flex  border-slate-200 md:w-1/4 w-1/2 h-40 mb-5 md:mb-0 bg-slate-300 mr-5 rounded-xl" >
                @if ($school->logo_url !== null)
                    <img src={{url('storage/'. $school->logo_url )}}  alt="School Logo" class='bg-slate-300  border-2 w-full h-full rounded-xl' >
                @endif
            </div>

        {{-- Name --}}
        <div class="w-full h-full flex flex-col  justify-start items-start" >
        <h1 class="md:text-5xl text-3xl" >{{$school->name}}</h1>
        <p class="mt-3 font-semibold w-3/4 text-slate-600 text-lg" >{{$school->about}}</p>
        </div>
    </div>

    {{-- Payload --}}
    <div>
        {{-- Tags --}}
        <div class="flex flex-row" >
            <a class="bg-stone-600 font-semibold text-white py-1 px-4 mr-2 my-4 rounded-full hover:bg-indigo-600 cursor-pointer">{{strtoupper($school->town_city)}}</a>
            <a class="bg-slate-600 font-semibold text-white py-1 px-4 mr-2 my-4 rounded-full hover:bg-indigo-600 cursor-pointer">{{strtoupper($school->level)}}</a>
        </div>


        <a href="/schools/{{$school->name}}">View School Profile</a>

    </div>
</div>
