@props(['school'])

<div class="flex flex-col w-full mb-5 mx-10 cursor-pointer hover:bg-slate-200 bg-slate-50 p-10 rounded-xl" >

    {{-- Header --}}
    <div class="flex flex-row justify-start items-center w-full">
        {{-- Logo --}}
        <div class="h-20 bg-slate-300 w-20 mr-10 rounded-md " >
            <div class="  w-20 h-20 " ></div>
        </div>

        {{-- Name --}}
        <div class="w-full h-full flex  justify-start items-start" >
            <h1>{{$school->name}}</h1>
        </div>
    </div>

    {{-- Payload --}}
    <div>
        {{-- Tags --}}
        <div class="flex flex-row" >
            <a class="bg-stone-600 font-semibold text-white py-1 px-4 mr-2 my-4 rounded-full hover:bg-indigo-600 cursor-pointer">{{strtoupper($school->town_city)}}</a>
            <a class="bg-slate-600 font-semibold text-white py-1 px-4 mr-2 my-4 rounded-full hover:bg-indigo-600 cursor-pointer">{{strtoupper($school->level)}}</a>
        </div>


    </div>
</div>
