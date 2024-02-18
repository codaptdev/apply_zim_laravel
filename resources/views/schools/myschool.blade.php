<x-main-layout>
    <div class="p-10">

        <div class="md:flex-row flex flex-col">
            <!-- Logo -->
            <div class="flex justify-center items-center   border-slate-300 w-60 h-60 md:h-40 md:w-40  mr-5 rounded-xl" >
                @if ($school->logo_url !== null)
                <img src="{{url('storage/'. $school->logo_url )}}"  alt="School Logo" class='bg-slate-300  border-2 w-full h-full rounded-xl' >
                @endif

            </div>


            <div class="flex flex-col flex-auto" >
                <h1>{{$school->name}}</h1>
                <p class="text-slate-400 text-3xl font-semibold ">{{$school->level}} SCHOOL</p>
            </div>
        </div>

        <br>
        <br>

        <h1 class="mb-5 text-slate-700" >Manage your School's Account</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 md:gap-5 w-full h-full gap-3 ">

            <x-action-card
            :title="'Applications Dashboard'"
            :action_url="'/applications/dashboard'"
            :description="'View, edit & manage your schools application statistics'"
            />

            <x-action-card
            :title="'Edit Your Schools Info'"
            :action_url="'myschool/edit'"
            :description="'Edit the basic information about your school like your locationing,
            name, address etc'"
            />

            <x-action-card
            :title="'View Your School Profile'"
            :action_url="'schools/' . $school->id"
            :description="'Get a preview your schools public profile just like how it will be shown to students
            when they visit your page '"
            />

            <x-action-card
            :title="'Edit Your School Profile'"
            :action_url="'/myschool/profile/edit'"
            :description="'Edit your schools public profile e.g social links, about and many more'"
            />

            <x-action-card
            :title="'Edit School Logo'"
            :action_url="'/myschool/logo/edit'"
            :description="'Upload a logo for your school if you already have not or replace your already uploaded logo with an new one!'"
            />

            <x-action-card
            :title="'Edit School Gallery'"
            :action_url="'/gallery/edit'"
            :description="'View, edit & upload to your schools gallery'"
            />

            {{-- <a href="/schools/{{$school->name}}">View School Profile</a> --}}
            {{-- <a href="/myschool/profile/edit">Edit School Profile</a> --}}
            {{-- <a href="/myschool/logo/edit">Edit School Logo</a> --}}

        </div>

    </div>
</x-main-layout>
