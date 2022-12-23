<x-admin-layout>
    <x-slot name="title">{{$title}}</x-slot>

    <x-slot name="panel">
        <v-btn link to="{{route('admin.permissions.index')}}" class=" bg-indigo-500 hover:bg-indigo-600" :tooltip="{text: 'back'}" rounded icon>
            <i class="fas fa-arrow-left text-white hover:text-indigo-200 fa-xl"></i>
        </v-btn>
    </x-slot>

    <x-slot name="main">

    </x-slot>
</x-admin-layout>
