import { ref, computed } from 'vue';

export function useNavbar() {
    let isNavbarDropdown = ref(false);

    function activeNavbarDropdown() {
        isNavbarDropdown.value = true
    }

    return {
        isNavbarDropdown,
        activeNavbarDropdown
    };
}
