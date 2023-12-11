<x-main-layout>
    <div class="flex p-10 flex-col justify-center items-center ">
        <h1>Your Applications Attempts History</h1>

        <p class="mt-5 text-slate-600 font-medium text-lg" >This is a list of schools that you have attempted to apply to by pressing the <strong>Apply button</strong> on
            their school profile page. This doesn't neccessarily mean that you applied for this schools but you clicked on
            <strong>Apply Button</strong>
        </p>

        <br>

        <table >
            {{-- Head --}}
            <thead >
                <tr>
                    <th>School</th>
                    <th>Level</th>
                    <th>Date Applied</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                {{-- Data --}}
                @foreach ($schools as $key => $school)
                <tr  >
                    <td class="hover:bg-slate-200" > <a href="/schools/{{$school->id}}">{{$school->name}}</a></td>
                    <td class="hover:bg-slate-200" >{{$school->level}}</td>
                    <td class="hover:bg-slate-200" >{{$applications[$key]->created_at}}</td>
                    <td class="hover:bg-red-200 hover:text-red-800 bg-red-400" >
                        <a href="/application/delete/{{$school->id}}">Delete</a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>

    </div>
</x-main-layout>

