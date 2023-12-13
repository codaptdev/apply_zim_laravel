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


        <div class="grid grid-cols-1 gap-3 w-full" >

            @forelse ($schools as $school)

            <x-school-short-card :school='$school' />

            @empty
            @if ($query == '')
            <p class="text-slate-400 text-xl text-center w-1/3" >Type a name of a school you are looking for in the search bar...</p>
            @else
            <p class="text-slate-400 text-xl " >The school "{{$query}}" was not found</p>
            @endif
            @endforelse

        </div>


        </div>
    </x-main-layout>
