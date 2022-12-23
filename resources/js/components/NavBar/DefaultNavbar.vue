<script setup>
import { ref, onMounted, watch } from "vue";
import { isDark, themeSwitch, themeCheck } from '@/Composables/useTheme';
import { useNavbar } from '@/Composables/useNavbar';

import VNavbarLg from '@/components/NavBar/Responsive//NavbarLg.vue';
import VNavbarSm from '@/components/NavBar/Responsive/NavbarSm.vue';

const { isNavbarDropdown, activeNavbarDropdown } = useNavbar();

const links = ref([
    { url: '/#hero', title: 'Strona główna',  name: 'home' , dropdown: false, route: false},
    { url: '/articles', title: 'Wiadomości',  name: 'articles', dropdown: true, route: true},
    { url: '/galleries', title: 'Gallerie',  name: 'galleries', dropdown: false, route: true},
    { url: '/#about-project', title: 'O projekcje',  name: 'home#about-project', dropdown: false, route: false},
    { url: '/#features', title: 'Features',  name: 'home#features', dropdown: false, route: false},
    { url: '/#contact', title: 'Kontakt', name: 'home#contact', dropdown: false, route: false},
]);
</script>

<template>
    <v-navbar class="h-16" action-field>
        <template #logo>
            <div class="h-full ml-3  flex items-center justify-between">
                logo
            </div>
        </template>

        <template #content>
            <v-navbar-lg  :links="links" />

            <v-navbar-sm  :links="links" >
                <template #action>
                    <div class="absolute -left-20 bottom-2 border-2 border-inverted rounded-full w-12 h-12 ">
                        logo
                    </div>

                    <v-btn color="secondary" :tooltip="{text: 'Wyszukaj'}" flat icon>
                        <i  class="text-lg hover:text-hover fa-solid fa-magnifying-glass"></i>
                    </v-btn>
                    <!--
                 <x-btn v-for="item in socialMedia" :key="item.id" :href="item.social_url" color="secondary" :tooltip="{text: item.name}" blank flat icon>
                        <x-icon class="text-lg"  color="secondary" :icon="`fa-brands fa-${item.icon}`" />
                    </x-btn>
                    -->
   

                    <v-btn @click="themeSwitch" color="secondary" :tooltip="{text: `Zmień motyw na ${isDark ? 'jasny' : 'ciemny'}`}" flat icon>
                        <i v-if="isDark" class="text-lg fa-solid fa-sun"></i>
                        <i v-else class="text-lg fa-solid fa-moon" ></i>
                    </v-btn>
                </template>

                <template #account>
                   
                </template>
            </v-navbar-sm>
        </template>

        <template #action>
            <div class="absolute -left-20 bottom-2 border-2 border-inverted rounded-full w-12 h-12 ">
                logo
            </div>

            <v-btn color="secondary" :tooltip="{text: 'Wyszukaj'}" flat icon>
                <i  class="text-lg hover:text-hover fa-solid fa-magnifying-glass"></i>
            </v-btn>

            <v-btn @click="themeSwitch" color="secondary" :tooltip="{text: `Zmień motyw na ${isDark ? 'jasny' : 'ciemny'}`}" flat icon>
                <i v-if="isDark" class="text-lg fa-solid fa-sun"></i>
                <i v-else class="text-lg fa-solid fa-moon" ></i>
            </v-btn>
        </template>

        <template #account>
            <slot name="account"></slot>
        </template>

        <template #dropdown>

        </template>
    </v-navbar>
</template>