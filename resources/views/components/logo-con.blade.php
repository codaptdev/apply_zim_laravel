@props(['school'])

<div class="flex justify-center items-center   border-slate-300 w-60 h-60 md:h-40 md:w-40  mr-5 rounded-xl" >
    @if ($school->logo_url !== null)
        <img src="{{url('storage/'. $school->logo_url )}}"  alt="School Logo" class='bg-slate-300  border-2 w-full h-full rounded-xl' >
    @else
        @if (auth()->user()->id == $school->id)
            <a href="{{url('/myschool/logo/edit')}}" >Upload A logo</a>
        @endif
    @endif
</div>
