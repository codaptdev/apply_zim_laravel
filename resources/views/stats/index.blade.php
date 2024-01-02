<x-main-layout>
    <div class="flex p-10 flex-col justify-center items-center">
        <h1>Statistics</h1>

        <div class="grid xl:grid-cols-3 md:grid-cols-2 grid-cols-1  my-10 w-full gap-3">

            <x-stat-card
                :title="'City most popular with'"
                :value="'Chinhoyi'"
            />

            <x-stat-card
                :title="'Profile Visits'"
                :value="100"
            />


            <x-stat-card
                :title="'Times Bookmarked'"
                :value="26"
            />

            <x-stat-card
                :title="'Attempts to Apply'"
                :value="123"
            />

            <x-stat-card
                :title="'Redirects to your socials'"
                :value="56"
            />
        </div>
    </div>
</x-main-layout>
