<x-main-layout>
    <div class="flex flex-col justify-center items-center" >
        <h1>404 : NOT FOUND</h1>

        @if ($isId)
            <p class="text-xl" >School with id <span class="text-slate-500 font-bold" >{{$nameOrId}}</span> was not found</p>
            @else
            <p class="text-xl" >School with the name <span class="text-slate-500 font-bold" >{{$nameOrId}}</span> was not found</p>
        @endif

        <br>

        <a href="/">Got back to home</a>
    </div>
</x-main-layout>
