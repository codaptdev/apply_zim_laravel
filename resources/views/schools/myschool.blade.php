<x-main-layout>
    <div class="p-10">

        <div class="flex-row flex">
            {{-- Logo --}}
            <div class="flex   border-slate-200 w-40 h-40  mr-5 rounded-xl" >
                @if ($school->logo_url !== null)
                    <img src={{url('storage/'. $school->logo_url )}}  alt="School Logo" class='bg-slate-300  border-2 w-full h-full rounded-xl' >
                @endif
            </div>


            <div class="flex flex-col flex-auto" >
                <h1>{{$school->name}}</h1>
                <p class="text-slate-400 text-3xl font-semibold ">{{$school->level}} SCHOOL</p>
            </div>
        </div>

        <br>
        <br>
        <div class="grid grid-cols-1 md:grid-cols-3 w-full h-full gap-3 ">

            <a href="/myschool/edit">Edit School Info</a>
            <a href="/schools/{{$school->name}}">View School Profile</a>
            <a href="/myschool/profile/edit">Edit School Profile</a>
            <a href="/myschool/logo/edit">Edit School Logo</a>

        </div>


    </div>
</x-main-layout>
