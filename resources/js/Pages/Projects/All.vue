<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Proyectos
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <table v-if="proyectos.length > 0" class="w-full">
                    <thead
                        class="border-b-2 border-gray-300 text-indigo-600"
                    >
                    <tr>
                        <th class="px-6 py-3 text-left">
                            Título
                        </th>
                        <th class="px-6 py-3 text-left">
                            Descripción
                        </th><th class="px-6 py-3 text-left">
                            Color
                        </th>
                        <th class="px-6 py-3 text-left">
                            Icons
                        </th>
                        <th class="px-6 py-3 text-left">
                            Actions
                        </th>
                    </tr>
                    </thead>
                    <tbody v-for="( proyecto, index) in proyectos">
                    <tr
                        class="text-sm text-indigo-900 border-b border-gray-400"
                    >
                        <td class="px-6 py-4">
                            {{ proyecto.title }}
                        </td>
                        <td class="px-6 py-4">
                            {{ proyecto.description }}
                        </td>
                        <td class="px-6 py-4">
                            <p>
                                <span class="mr-5 p-4 rounded"
                                      :class="proyecto.color">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                {{ proyecto.color }}
                            </p>
                        </td>
                        <td class="px-6 py-4" :class="proyecto.color">
                            <component :is="heroIcons[proyecto.icon_name+'Icon']"></component>
                        </td>
                        <td class="px-6 py-4">
                            <secondary-button
                                class="border border-indigo-500 text-indigo-500 bg-indigo-50 hover:bg-indigo-100 mr-2"
                            >
                                Editar
                            </secondary-button>
                            <danger-button
                                class="border border-red-500 text-red-500 bg-red-50 hover:bg-red-100 ml-2"
                            >
                                Borrar
                            </danger-button>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div v-else class="bg-red-100 border border-red-400 p-3 rounded-lg text-red-800">
                    No hay habilidades para mostrar. Quieres agregar una? :)
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '../../Layouts/AppLayout.vue'
import PrimaryButton from '../../Components/PrimaryButton.vue'
import DangerButton from "../../Components/DangerButton.vue";
import SecondaryButton from "../../Components/SecondaryButton.vue";
import * as heroIcons from "@heroicons/vue/24/solid";


export default {
    components: {
        PrimaryButton,
        DangerButton,
        AppLayout,
        SecondaryButton,
    },
    methods: {
        componentName(name) {
            return () => import(`./${name}`)
        }
    },
    props: {
        proyectos: Object,
    },
    data() {
        return {
            heroIcons: heroIcons,
        }

    },
}
</script>
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
