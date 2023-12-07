<x-main-layout>
    <div class="flex flex-col px-5 md:px-16 items-center justify-center py-10 " >
        <h1 class="text-6xl font-bold mb-32">Register</h1>

        {{-- Options --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 w-full h-full justify-center items-center " >
            <div class="flex flex-col rounded-xl bg-slate-100 py-20 px-10 w-full h-full">
                <h1>Student</h1>
                <ul class=" list-disc pl-4 py-10" >
                    <li>Discover Students</li>
                    <li>Apply To Schools</li>
                </ul>
                <a class="link-btn drop-shadow-xl" href="/register/student">Register as Student</a>
            </div>

            <div class="flex flex-col rounded-xl bg-slate-100 py-20 px-10 w-full h-full">
                <h1>School</h1>
                <ul class=" list-disc pl-4 py-10" >
                    <li>Create a profile</li>
                    <li>Get discorvered by students</li>
                </ul>
                <a class="link-btn drop-shadow-xl" href="/register/school">Register as School</a>
            </div>
        </div>
    </div>

</x-main-layout>
