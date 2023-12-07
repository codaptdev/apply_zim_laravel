<x-main-layout>
    <div class="flex md:px-20 px-5 flex-col items-center justify-center" >
        <h1>Search for Schools</h1>

        {{-- Search Area --}}
        <div class="w-full flex flex-row md:w-3/4 " >
            <form  action="" method="GET" class=" flex flex-row p-0 border-none w-full my-10 "  >
                <input value="{{$query}}" class="search" name="name" type="search" placeholder="Search by name ..." >
                <button class="search-btn" type="submit" >Search</button>
            </form>
        </div>

        @forelse ($schools as $school)
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
        @empty
            @if ($query == '')
                <p class="text-slate-400 text-xl text-center w-1/3" >Type a name of a school you are looking for in the search bar...</p>
            @else
                <p class="text-slate-400 text-xl " >The school "{{$query}}" was not found</p>
            @endif
        @endforelse

    </div>
</x-main-layout>
