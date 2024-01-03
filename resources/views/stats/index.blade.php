<x-main-layout>
    <div class="flex p-10 flex-col justify-center items-center">
        <h1>Statistics</h1>

        <br>

        <div class="w-full " >
            <x-pill :color="'blue'" :href="''" >Profile Visits By Cities</x-pill>
        </div>

        <div class="grid xl:grid-cols-3 md:grid-cols-2 grid-cols-1  my-10 w-full gap-3">

            <x-stat-card
                :title="'Profile Visits'"
                :value="$profile_visits_count"
            />

            <x-stat-card
            :title="'City most popular with'"
            :value="$max_city"
            />

            <x-stat-card
                :title="'Visits from '. $max_city"
                :value="$city_counts[$max_city]"
            />

            <x-stat-card
                :title="'Times Bookmarked'"
                :value="$times_bookmarked"
            />

            <x-stat-card
                :title="'Attempts to Apply'"
                :value="$application_attempts"
            />

            {{-- <x-stat-card
                :title="'Redirects to your socials'"
                :value="56"
            /> --}}

        </div>

        <div class="w-full p-10 justify-center items-center flex flex-col">

            <h1 class="mb-10" >Breakdown of Profile Visits by Cities</h1>

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

    </div>
</x-main-layout>
