<x-main-layout>
    <div class="p-10">

        <div class="flex-row flex">

            <div class="flex  bg-slate-300 w-32 h-32 mr-5 rounded-xl" >

            </div>

            <div class="flex flex-col flex-auto" >
                <h1>{{$school->name}}</h1>
                <p class="text-slate-400 text-3xl font-semibold ">{{$school->level}} SCHOOL</p>
            </div>
        </div>

        <br>
        <br>
        <div class="grid grid-cols-1 md:grid-cols-3 w-full h-full gap-3 ">

            <a href="">View School Info</a>
            <a href="/schools/{{$school->name}}">View School Profile</a>
            <a href="">Edit School Profile</a>

        </div>


    </div>
</x-main-layout>
