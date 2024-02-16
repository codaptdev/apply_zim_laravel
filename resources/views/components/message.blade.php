@if (session()->has('message'))
    <div class="p-5 w-full bg-green-400 bottom-0 left-0 fixed text-white">
        <p>{{session('message')}}</p>
    </div>
@endif

@if (session()->has('error'))
    <div class="p-5 w-full bg-red-400 bottom-0 left-0 fixed text-white">
        <p>{{session('error')}}</p>
    </div>
@endif

@if (session()->has('notice'))
    <div class="p-5 w-full bg-orange-400 bottom-0 left-0 fixed text-white">
        <p>{{session('notice')}}</p>
    </div>
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger w-full p-5 bg-red-400 bottom-0 left-0 fixed">
            <p class="text-white" >{{$error}}</p>
        </div>
    @endforeach
@endif
