<x-main-layout>
    <div class="flex flex-col justify-center items-center" >

        <div class="flex flex-col w-full justify-center items-center pb-10" >
            <h1> {{$school->name}}'s Gallery</h1>
        </div>


        <div class="grid grid-cols-1 lg:grid-cols-3 w-full gap-3 px-10 h-56 justify-center items-center mb-10" >

            @forelse ($gallery_items as $item)
                <div class="h-56 w-full relative" >
                    <img src="/storage/{{($item->url)}}" alt="" class="w-full rounded-xl z-10 h-56 object-cover hover:h-96 hover:absolute hover:z-20 transition-all">
                </div>
            @empty

            @endforelse
        </div>
    </div>

    <br>
    <div class="w-full h-20">

    </div>
    </div>

</x-main-layout>
