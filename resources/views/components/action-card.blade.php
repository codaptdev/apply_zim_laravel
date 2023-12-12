@props(['title', 'action_url', 'description'])

<div class="bg-slate-100 grid grid-cols-1 justify-center items-start w-full  p-10 rounded-xl">
    <h1 class="text-3xl" >{{$title}}</h1>
    <p class="text-slate-500 my-5 font-medium" >{{$description}}</p>
    <a   class="link-btn" href="{{url($action_url)}}">Take Me there</a>
</div>
