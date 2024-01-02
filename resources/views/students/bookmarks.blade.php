<x-main-layout>

    <div class="flex flex-col items-center justify-center">

        <h1 class="mb-10" >Bookmarks</h1>

        @if (count($bookmarks) > 0)
        <table>
            {{-- Head --}}
            <thead >
                <tr>
                    <th>School</th>
                    <th>Date Bookmarked</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($bookmarks as $bookmark)
                    <tr>
                        <td><a href="/schools/{{$bookmark->school->id}}">{{$bookmark->school->name}}</a></td>
                        <td><p>{{$bookmark->created_at}}</p></td>
                        <td><a href="/bookmarks/delete/{{$bookmark->school->id}}">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        @else
            <p>You have not bookmarked any schools yet</p>
        @endif

    </div>
</x-main-layout>
