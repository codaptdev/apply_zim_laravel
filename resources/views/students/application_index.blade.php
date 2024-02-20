<x-main-layout>
    <div class="flex flex-col w-full items-center justify-center" >
        <h1>Application for {{$application->student->surname}}</h1>

        <div class="flex flex-col items-center justify-center w-full p-10" >
            @foreach ($questions as $question)
            <div class="items-center justify-center w-full p-5" >
                <p class="text-slate-400 text-xl" >{{$question->label}}</p>
                <p class="text-3xl font-bold" >{{$question->answer->response}}</p>
            </div>
            @endforeach
        </div>

        <a href="/applications/delete/{{$application->id}}" class="link-btn bg-red-400 md:w-1/2 w-3/4 ">Delete Application</a>

    </div>


</x-main-layout>
