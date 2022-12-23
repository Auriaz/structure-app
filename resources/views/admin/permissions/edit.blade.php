<x-admin-layout>
    <x-slot name="title">{{$title}}</x-slot>

    <x-slot name="panel">
        <v-btn link to="{{route('admin.permissions.index')}}" class=" bg-indigo-500 hover:bg-indigo-600" :tooltip="{text: 'back'}" rounded icon>
            <i class="fas fa-arrow-left text-white hover:text-indigo-200 fa-xl"></i>
        </v-btn>
    </x-slot>

    <x-slot name="main">
        <div class="flex justify-center items-center">
            <div class="w-96 bg-secondary dark:bg-secondary-dark rounded-lg shadow-lg shadow-slate-900 p-4">
                <x-splade-form :default="$permission" :action="route('admin.permissions.update', $permission)" method="put" class="space-y-4">
                    <x-splade-input name="name" label="Name" />

                    <div class="w-full flex justify-end items-center">
                        <x-splade-submit  class="w-full" >Update</x-splade-submit>
                    </div>
                </x-splade-form>
            </div>
        </div>
    </x-slot>
</x-admin-layout>
