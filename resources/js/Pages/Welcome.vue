<script setup>
import {Head, Link} from '@inertiajs/vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,

});
</script>

<template>
    <header class="bg-gray-800 pt-16 h-screen px-72">
        <div class="h-2/3 flex flex-wrap content-between border-gray-600 pb-36" >
            <p class="border-b-2 font-bold border-gray-400 pb-3 text-2xl text-gray-300 uppercase">
                Hola: Estamos en esta gran página.</p>
        </div>
    </header>
    <section class="bg-gray-200 text-gray-800 px-72 py-10 h-screen">
        <h2 class="text-6xl font-bold pt-3">Habilidades</h2>
    </section>
    <section class="bg-gray-600 text-gray-200 px-72 py-10 h-screen">
        <h2 class="text-6xl font-bold pt-3">Proyectos</h2></section>
    <footer class="
    flex justify-between py-10 px-72 bg-gray-800 text-gray-300 text-xl
">
        <p>&copy; gerMdz 2023</p>
        <div class="flex justify-evenly items-center">
            GitHub
        </div>
    </footer>

    <Head title="Welcome"/>


</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}

@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>
