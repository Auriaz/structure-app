<div>
    <header class="w-full py-3 sticky top-0 z-40 backdrop-blur transition-all duration-300 ease-in bg-primary dark:bg-primary-dark opacity-95 shadow-md shadow-tertiary">
        <v-control-panel-navbar>
            <template #account>
                <x-dropdown placement="bottom-end">
                    <x-slot name="trigger">
                        <button class="relative block w-8 h-8 overflow-hidden rounded-full shadow focus:outline-none">
                        <img class="object-cover w-full h-full" src="https://images.unsplash.com/photo-1528892952291-009c663ce843?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=296&q=80" alt="Your avatar">
                        </button>
                    </x-slot>
    
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
    
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
    
                            <x-dropdown-link as="a" :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </template>
        </v-control-panel-navbar>
    </header>
    
    <div class="flex flex-row h-screen bg-background dark:bg-background-dark font-roboto">
        <x-sidebar></x-sidebar>

        <div class="flex-1 flex flex-col overflow-hidden">
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-background dark:bg-background-dark">
                <v-control-panel-section container>
                    <template #header-title>
                        {{$title}}
                    </template>

                    <template #header-panel>
                        {{ $panel }}
                    </template>

                    <template #main>
                        {{$main}}
                    </template>
                </v-control-panel-section>
            </main>
        </div>
    </div>
</div>
    


