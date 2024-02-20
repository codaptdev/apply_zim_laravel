<x-main-layout>
    <div class="flex p-10 flex-col justify-center items-center ">
        <h1 class="text-center text-2xl md:text-6xl " >Your Applications Attempts History</h1>

        <p class="mt-5 text-center text-slate-600 font-medium text-md" >This is a list of schools that you have attempted to apply to by pressing the <strong>Apply button</strong> on
            their school profile page. This doesn't neccessarily mean that you applied for this schools but you clicked on
            <strong>Apply Button</strong>
        </p>

        <br>


        @if (empty($applications))
            <div class="w-full flex flex-col items-center justify-center text-center p-20">
                <p class="text-slate-500 text-xl " >You have not Applied to any schools yet🤭</p>
                <a class=" text-xl " href="/search" >Search Schools</a>
            </div>
        @else
            <table>
                {{-- Head --}}
                <thead >
                    <tr>
                        <th>School</th>
                        <th>Application Url</th>
                        <th>Date Applied</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>


                    {{-- Data --}}
                    @foreach ($applications as $application)
                    <tr  >
                        <td class="hover:bg-slate-200" > <a href="/schools/{{$application->school->id}}">{{$application->school->name}}</a></td>
                        <td class="hover:bg-slate-200"> <a href="/applications/{{$application->id}}">View Application</a></td>
                        <td class="hover:bg-slate-200" >{{$application->date_applied}}</td>
                        <td class="hover:bg-red-200 hover:text-red-800 bg-red-400">
                            <a href="/applications/delete/{{$application->id}}">Delete</a>
                        </td>
                    </tr>
                    {{-- @endforeach --}}
                    @endforeach

                </tbody>
            </table>
        @endif



    </div>
</x-main-layout>

