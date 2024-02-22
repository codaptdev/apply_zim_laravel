<x-main-layout>
    <div class="flex flex-col w-full items-center justify-center" >
        <h1>Application for {{$application->student->surname}}</h1>


        <dl>
            hie
        </dl>

        <div class="flex flex-col items-center justify-center w-full p-10" >
            @foreach ($questions as $question)
            <div class="items-center justify-center w-full p-5" >
                <p class="text-slate-400 text-xl" >{{$question->label}}</p>
                <p class="text-3xl font-bold" >{{$question->answer->response}}</p>
            </div>
            @endforeach
        </div>

        <a href="mailto:{{$application->student->email}}" class="link-btn md:w-1/2 w-3/4 ">Email</a>

    </div>


</x-main-layout>
