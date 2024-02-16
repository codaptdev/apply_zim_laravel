<x-main-layout>
    <div class="flex flex-col justify-center items-center mb-20" >

        <div class="flex flex-col w-full justify-center items-center pb-10" >
            <h1> Edit Gallery</h1>
        </div>


        <div class="grid grid-cols-1 w-full gap-3 px-10 h-56 justify-center items-center mb-10" >

            <a href="/gallery/create" class="w-full h-56 flex flex-col justify-center items-center p-5 bg-slate-100 hover:bg-slate-300 rounded-xl" >
                <i class="fa-solid fa-add text-3xl  text-slate-900"></i>
                <p>Upload New Image</p>
            </a>

            @forelse ($gallery_items as $item)
                <div class="flex md:flex-row flex-col" >
                    <div class="h-40 w-1/4 relative" >
                        <img src="/storage/{{($item->url)}}" alt="" class="w-full rounded-xl z-10 h-40 object-cover hover:h-96 hover:absolute hover:z-20 transition-all">
                    </div>

                    <div class="flex flex-row items-center p-10 justify-center ">

                        <a class="text-red-500 hover:rounded-full hover:bg-red-100 p-3" href="/gallery/delete/{{$item->id}}">
                            <i class="fa-solid fa-trash text-red-500 mr-2"></i>
                            Delete From Gallery
                        </a>
                    </div>
                </div>
            @empty

            @endforelse
        </div>
    </div>

    <br>
    <div class="w-full h-20">

    </div>
</x-main-layout>
