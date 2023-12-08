<x-main-layout>
    <div class="flex flex-col justify-center items-center" >

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="p-5 bg-red-400 font-semibold text-white w-full">{{$error}}</div>
            @endforeach
        @endif

        <h1>Upload Your School Logo</h1>
        <form action='{{url("/myschool/logo/update")}}' method="POST" enctype="multipart/form-data" >
            @csrf
            <label for="logo">Select logo file </label>
            <input type="file" name="logo" id="logo">
            <button class="link-btn" type="submit">Upload File</button>
        </form>
    </div>
</x-main-layout>
