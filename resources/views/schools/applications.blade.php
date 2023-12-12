<x-main-layout>
    <div class="flex p-10 flex-col justify-center items-center ">
        <h1 class="text-center" >Application Attempts From Students</h1>

        <p class="mt-5 text-center text-slate-600 font-medium text-md xl:w-1/2" >This is a list of students that have attempted to apply to your school and where redirected to your application site by pressing the <strong> Apply button</strong> on
            your school profile page. This doesn't neccessarily mean that these students applied to your school but they clicked on
            <strong>Apply Button</strong>
        </p>

        <br>


        @if (empty($students))
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
                    </tr>
                </thead>

                <tbody>


                    {{-- Data --}}
                    @foreach ($students as $key => $student)
                    <tr>
                        <td class="hover:bg-slate-200" >{{$student->first_name}}</td>
                        <td class="hover:bg-slate-200" >{{$student->surname}}</td>
                        <td class="hover:bg-slate-200" >{{$student->date_applied}}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        @endif



    </div>
</x-main-layout>
