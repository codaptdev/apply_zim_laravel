<x-main-layout>
    <div class="flex p-10 flex-col justify-center items-center">
        <h1>Statistics</h1>

        <br>

        <div class="w-full mb-10" >
            <x-pill :color="'blue'" :href="'/statistics/profile_visits_by_cities'" >Profile Visits By Cities</x-pill>
        </div>

        <x-stat-card
                :title="'Profile Visits'"
                :value="$profile_visits_count"
        />

        <div class="grid xl:grid-cols-3 md:grid-cols-2 grid-cols-1  mt-3 mb-10 w-full gap-3">

            @if (count($city_counts) != 0)
                <x-stat-card
                :title="'City most popular with'"
                :value="$max_city"
                />
            @endif

            @if (count($city_counts) != 0)
                <x-stat-card
                    :title="'Visits from '. $max_city"
                    :value="$city_counts[$max_city]"
                />
            @endif

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



    </div>
</x-main-layout>
