<x-admin-layout>
    <x-slot name="title">{{$title}}</x-slot>

    <x-slot name="panel">
        <v-btn link to="{{route('admin.roles.create')}}" class="group bg-indigo-400 hover:bg-indigo-600" :tooltip="{text: 'New Role'}"  icon rounded>
            <i class="fas fa-calendar-plus text-white group-hover:text-indigo-200 fa-xl"></i>
        </v-btn>
    </x-slot>

    <x-slot name="main">
        <x-splade-table :for="$roles" striped>
            <x-splade-cell name>
                <p class="text-blue-500">{{ $item->name }}</p>
            </x-splade-cell>

            @cell('action', $role)
            <div class="flex justify-center items-center space-y-3">
                <v-btn to="{{ route('admin.roles.edit', $role->id) }}" :tooltip="{text: 'Edit'}" link icon>
                    <i class="fas fa-edit fa-xl text-indigo-600 hover:text-hover"></i>
                </v-btn>

                <v-btn to="{{ route('admin.roles.show', $role->id) }}" :tooltip="{text: 'Show'}" link icon>
                    <i class="fas fa-eye fa-xl text-green-600 hover:text-hover"></i>
                </v-btn>

                <x-splade-form method="DELETE" action="{{ route('admin.roles.destroy', $role->id) }}" confirm="Are you sure you want to deleted'{{$role->name}}'?" confirm-button="Yes, Deleted!" cancel-button="No!" >
                    <v-btn  type="submit" :tooltip="{text: 'Deleted'}"  icon>
                        <i class="fas fa-trash-alt fa-xl text-red-600 hover:text-hover"></i>
                    </v-btn>
                </x-splade-form>
            </div>
            @endcell
        </x-splade-table>
    </x-slot>
</x-admin-layout>

