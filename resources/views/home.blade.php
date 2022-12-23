<x-default-layout>

    <x-slot>
        <x-splade-toggle>
            <button @click.prevent="toggle">Show text</button>

            <div v-show="toggled">
                <p>...</p>
                <button @click.prevent="setToggle(false)">Hide text</button>
            </div>
        </x-splade-toggle>
    </x-slot>
</x-default-layout>
