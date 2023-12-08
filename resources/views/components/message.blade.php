@if (session()->has('message'))
    <div class="p-5 w-full bg-green-400 bottom-0 left-0 fixed text-white">
        <p>{{session('message')}}</p>
    </div>
@endif
