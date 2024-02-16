<x-main-layout>

    <div class="flex flex-col justify-center items-center p-10" >
        <h1>Add Gallery Item</h1>

        <form action="/gallery" method="post" class="flex flex-col items-center justify-center" enctype="multipart/form-data" >
            @csrf
            <input type="file" name="gallery_item" id="gallery_item"   >
            <br>
            <button type="submit" class="link-btn" >Upload</button>
        </form>
    </div>

   @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger w-full p-5 bg-red-400">
                <p class="text-white" >{{$error}}</p>
            </div>
        @endforeach
   @endif

</x-main-layout>
