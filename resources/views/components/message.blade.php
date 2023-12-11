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
