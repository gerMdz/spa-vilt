<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Habilidades
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <table v-if="habilidades.length > 0" class="w-full">
                    <thead
                        class="border-b-2 border-gray-300 text-indigo-600"
                    >
                    <tr>
                        <th class="px-6 py-3 text-left">
                            Nombre
                        </th>
                        <th class="px-6 py-3 text-left">
                            Color
                        </th>
                        <th class="px-6 py-3 text-left">
                            Actions
                        </th>
                    </tr>
                    </thead>
                    <tbody v-for="habilidad in habilidades">
                    <tr
                        class="text-sm text-indigo-900 border-b border-gray-400"
                    >
                        <td class="px-6 py-4">
                            {{ habilidad.name }}
                        </td>
                        <td class="px-6 py-4">
                            <p>
                                <span class="mr-5 p-4 rounded"
                                      :class="habilidad.color">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                {{ habilidad.color }}
                            </p>
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


export default {
    components: {
        PrimaryButton,
        DangerButton,
        AppLayout,
        SecondaryButton
    },
    props: {
        habilidades: Object,
    }
}
</script>
