<v-sidebar>
    <template #dashboard-link>
        <v-sidebar-link name="{{ __('Dashboard') }}"  icon icon-name="fas fa-tachometer-alt" href="{{route('dashboard.index')}}" :active="{{ request()->routeIs('dashboard.index') }}" />
    </template>

    <template #admin-link>
        @if (Auth::user()->hasRole('admin'))
            <v-sidebar-link name="{{ __('Admin') }}"  icon icon-name="fas fa-user-shield" href="{{route('admin.index')}}" :active="{{ request()->routeIs('admin.index') }}" />

            <v-sidebar-link name="{{ __('Roles') }}"  icon icon-name="fas fa-user-tag" :open="{{ request()->routeIs('admin.roles.index') ? true : false }}"  children>
                <template #children>
                    <v-sidebar-link name="All"  icon icon-name="fas fa-user-tag" href="{{route('admin.roles.index')}}" :active="{{ request()->routeIs('admin.roles.index') }}" />

                    <v-sidebar-link name="Create" icon icon-name="fas fa-calendar-plus"  href="{{route('admin.roles.create')}}" :active="{{ request()->routeIs('admin.roles.create') }}" />

                    <v-sidebar-link name="{{ __('Permission') }}" icon icon-name="fas fa-user-lock" href="{{route('admin.permissions.index')}}"  :active="{{ request()->routeIs('admin.permissions.index') }}" />
                </template>
            </v-sidebar-link>
        @endif
    </template>

    <template #setting-link>

    </template>
</v-sidebar>

            


