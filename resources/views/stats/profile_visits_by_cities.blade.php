<x-main-layout>

    <div class="flex p-10 flex-col justify-center items-center">

        <a href="/statistics">Back to Statistics Dashbaord 🔙</a>

        <div class="w-full p-10 justify-center items-center flex flex-col">

            <h1 class="mb-10" >Breakdown of Profile Visits by Cities</h1>

            @if (count($city_counts) === 0)
                <p>You do not have any Profile Visits</p>
            @else
                <table class="">

                    <thead>
                        <tr>
                            <th>Town/City</th>
                            <th>Count</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($city_counts as $key => $count)
                        <tr>
                            <td>{{$key}}</td>
                            <td>{{$count}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        @endif

    </div>

</x-main-layout>
