<x-main-layout>
    <div class="flex flex-col justify-center items-center w-full">
        <h1>Apply to {{$school->name}}</h1>

        <form action="/applications/forms/respond?school_id={{$school->id}}" class="p-10 mt-10 flex flex-col items-center justify-center" method="post">

            @csrf
            {{-- Fields --}}

            @foreach ($questions as $question)
                <div class="flex flex-col items-start justify-center w-full pb-3" >
                    <label class="py-3" >{{$question->label}}</label>
                    <input type="{{strtolower($question->response_type)}}" name="{{$question->label}}" placeholder="{{$question->placeholder}}" class="border-solid w-full p-3 rounded-xl border-slate-400 border-2" type="text">
                </div>
            @endforeach

            {{-- Submit button --}}

            <button class="mt-5 link-btn" >Submit Application Form</button>

        </form>

    </div>
</x-main-layout>
