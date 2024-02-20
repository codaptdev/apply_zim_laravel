<x-main-layout>
    <div class="flex p-10 flex-col justify-center items-center ">
        <h1 class="text-center" >Application Attempts From Students</h1>

        <p class="mt-5 text-center text-slate-600 font-medium text-md xl:w-1/2" >This is a list of students that have attempted to apply to your school and where redirected to your application site by pressing the <strong> Apply button</strong> on
            your school profile page. This doesn't neccessarily mean that these students applied to your school but they clicked on
            <strong>Apply Button</strong>
        </p>

        <br>


        @if (empty($applications))
            <div class="w-full flex flex-col items-center justify-center text-center p-20">
                <p class="text-slate-500 text-xl " >You don't have any application attempts yet 🙉</p>
            </div>
        @else
            <table>
                {{-- Head --}}
                <thead >
                    <tr>
                        <th>First Name</th>
                        <th>Surname</th>
                        <th>Date</th>
                        <th>View Application</th>
                    </tr>
                </thead>

                <tbody>


                    {{-- Data --}}
                    @foreach ($applications as $key => $application)
                    <tr>
                        <td class="hover:bg-slate-200" >{{$application->student->first_name}}</td>
                        <td class="hover:bg-slate-200" >{{$application->student->surname}}</td>
                        <td class="hover:bg-slate-200" >{{$application->date_applied}}</td>
                        <td class="hover:bg-slate-200" ><a href="/applications/dashboard/history/{{$application->id}}">View Application</a></td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        @endif



    </div>
</x-main-layout>
