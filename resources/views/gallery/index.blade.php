<x-main-layout>
    <div class="flex flex-col justify-center items-center" >

        <div class="flex flex-col w-full justify-center items-center pb-10" >
            <h1> {{$school->name}}'s Gallery</h1>
        </div>


        <div class="grid grid-cols-1 lg:grid-cols-3 w-full gap-3 p-10 justify-center items-center" >
            @for ($i = 0; $i < 10; $i++)
                <div class="w-full h-52 p-5 bg-slate-100 rounded-xl" ></div>
            @endfor
        </div>
    </div>

</x-main-layout>
