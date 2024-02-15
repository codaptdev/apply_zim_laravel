<x-main-layout>
    <div class="flex flex-col justify-center items-center" >

        <div class="flex flex-col w-full justify-center items-center pb-10" >
            <h1> Edit Gallery</h1>
        </div>


        <div class="grid grid-cols-1 lg:grid-cols-3 w-full gap-3 p-10 justify-center items-center" >

            <a href="/gallery/create" class="w-full h-52 flex flex-col justify-center items-center p-5 bg-slate-100 hover:bg-slate-300 rounded-xl" >
                <i class="fa-solid fa-add text-3xl  text-slate-900"></i>
                <p>Upload New Image</p>
            </a>

            @for ($i = 0; $i < 9; $i++)
                <div class="w-full h-52 p-5 bg-slate-100 rounded-xl" ></div>
            @endfor
        </div>
    </div>
</x-main-layout>
