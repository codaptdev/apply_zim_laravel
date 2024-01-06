<x-main-layout>
    <div class="flex md:px-20 px-5 flex-col items-center justify-center" >
        <h1 class="md:text-5xl text-3xl text-center" >Search for Schools</h1>

        {{-- Search Area --}}
        <div class="w-full flex flex-row md:w-3/4 " >
            <form  action="" method="GET" class=" flex flex-row p-0 border-none w-full my-10 "  >
                <input value="{{$query}}" class="search" name="name" type="search" placeholder="Search by name ..." >
                <button class="search-btn" type="submit" >Search</button>
            </form>
        </div>

        {{-- <div class="w-full mb-5 h-scroll hidden" >

            @if (strtoupper($query) === 'ALL')
                <a class="w-auto  bg-slate-300 mx-3" :href="''" >Showing All Schools</a>
                <a class="w-auto  bg-slate-300 mx-3" :href="''" >Showing All Schools</a>
                <a class="w-auto  bg-slate-300 mx-3" :href="''" >Showing All Schools</a>
                <a class="w-auto  bg-slate-300 mx-3" :href="''" >Showing All Schools</a>
                <a class="w-auto  bg-slate-300 mx-3" :href="''" >Showing All Schools</a>
                <a class="w-auto  bg-slate-300 mx-3" :href="''" >Showing All Schools</a>
                <a class="w-auto  bg-slate-300 mx-3" :href="''" >Showing All Schools</a>
                <a class="w-auto  bg-slate-300 mx-3" :href="''" >Showing All Schools</a>
                <a class="w-auto  bg-slate-300 mx-3" :href="''" >Showing All Schools</a>
                <a class="w-auto  bg-slate-300 mx-3" :href="''" >Showing All Schools</a>
                <a class="w-auto  bg-slate-300 mx-3" :href="''" >Showing All Schools</a>
                <a class="w-auto  bg-slate-300 mx-3" :href="''" >Showing All Schools</a>
                <a class="w-auto  bg-slate-300 mx-3" :href="''" >Showing All Schools</a>

            @else
                <x-pill :color="'slate'" :href="'/search?name=all'" >Show All Schools</x-pill>
            @endif

        </div> --}}


        <div class="grid grid-cols-1 gap-3 items-center justify-center w-full" >

            @forelse ($schools as $school)

            <x-school-short-card :school='$school' />

            <div class="w-full justify-center items-center flex flex-col" >
                @empty
                @if ($query == '')
                <p class="text-slate-400 text-xl text-center w-full" >Type a name of a school you are looking for in the search bar...</p>
                @else
                <p class="text-slate-400 text-xl text-center w-full" >The school "{{$query}}" was not found</p>
                @endif
                @endforelse
            </div>

        </div>


        </div>
    </x-main-layout>
