<x-main-layout>
    <div class="flex flex-col items-center justify-center p-10">
        <h1>Edit Application Form</h1>

        {{-- Form for added a questions --}}
        <div class="w-full p-10" >
            <form action="/applications/dashboard/forms/add"  class="w-full bg-slate-100 p-10 flex flex-col items-center justify-center" method="post">
                @csrf
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-3 items-center justify-center mb-5 w-full" >
                    <input class="rounded-xl  p-3 w-full " name="label" type="text" placeholder="Label">
                    <select class="rounded-xl  p-3 w-full " name="response_type" type="text" placeholder="Response Type">
                        @foreach ($reponse_types as $type)
                            <option value={{$type}}>{{$type}}</option>
                        @endforeach
                    </select>
                    <input class="rounded-xl  p-3 w-full " name="placeholder" type="text" placeholder="Placeholder Text">
                </div>

                <button type="submit" class="link-btn">Add Question</button>
            </form>
        </div>

        {{-- List of added questions --}}
        <div id="form_body" class="flex flex-col items-center justify-center p-10" >
            @forelse ($questions as $question)
                <div>
                    <p>{{$question->label}}</p>
                    <p>{{$question->type}}</p>
                </div>
            @empty
                <p class="text-slate-400 p-10 text-center" >Your Application form has no questions yet so Students won't be able to apply to your school through ApplyZim</p>
            @endforelse
        </div>
    </div>
</x-main-layout>
