<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import {Link} from '@inertiajs/vue3'
import Habilidades from "../Custom/Habilidades.vue";
import NavLink from "../Components/NavLink.vue";
import ResponsiveNavLink from "../Components/ResponsiveNavLink.vue";
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Panel principal
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white overflow-hidden shadow-xl
                    rounded-lg p-6 border-b border-gray-200 flex flex-row text-xl">
                    <p class="mb-5">Recursos</p>
                    <ul class="p-3">
                        <li class="ml-2 flex flex-row items-center">

                            <ResponsiveNavLink class="
                                hover:text-gray-800
                                mt-2
                                text-sm
                                text-indigo-500
                                border-b
                                border-gray-400"
                                               :href="route('habilidades.index')">
                                Habilidades
                            </ResponsiveNavLink>


                        </li>
                        <li class="ml-2 flex flex-row items-center">

                            <ResponsiveNavLink class="
                                    hover:text-gray-800
                                            mt-2
                                            text-sm
                                            text-indigo-500
                                            border-b
                                            border-gray-400"
                                               :href="route('proyectos.index')">
                                Proyectos
                            </ResponsiveNavLink>


                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
