<x-main-layout>
    <div class="flex flex-col w-full p-10 justify-center items-center" >
        <h1>Applications Dashboard</h1>

        <br>

        <div class="grid grid-cols-1 p-10 md:grid-cols-3 gap-3 justify-center items-center" >
            <x-action-card
            :title="'Applications History'"
            :action_url="'/applications/dashboard/history'"
            :description="'View statistics on applications made by students to your schools'"
            />

            <x-action-card
            :title="'Edit Application Form'"
            :action_url="'/applications/dashboard/forms/edit'"
            :description="'Edit the form that students will fill in to apply to your schools'"
            />

            <x-action-card
            :title="'Preview Application Form'"
            :action_url="'/applications/dashboard/forms/preview'"
            :description="'Preview the form that students will fill in to apply to your schools'"
            />

        </div>
    </div>
</x-main-layout>
