<x-main-layout>
    <div class="flex flex-col items-center justify-center p-10">
        <h1>Create Application Form</h1>

        {{-- Form for added a questions --}}
        <div class="w-full p-10" >
            <form action="applications/dashboard/forms/create"  class="w-full bg-slate-100 p-10 flex flex-col items-center justify-center" method="post">
                @csrf
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-3 items-center justify-center mb-5 w-full" >
                    <input class="rounded-xl  p-3 w-full " type="text" placeholder="Label">
                    <input class="rounded-xl  p-3 w-full " type="text" placeholder="Response Type">
                    <input class="rounded-xl  p-3 w-full " type="text" placeholder="Hint Text">
                </div>

                <button class="link-btn">Add Question</button>
            </form>
        </div>

        {{-- List of added questions --}}
        <div id="form_body" class="flex flex-col" >

        </div>
    </div>
</x-main-layout>


