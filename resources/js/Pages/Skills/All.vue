<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Habilidades
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-right">
                <jet-button
                    class="p-3 border-2 border-blue-500 text-blue-500 bg-blue-100 font-bold rounded-xl
                    hover:bg-blue-200"
                    @click="acting =  true"
                >
                    Agregar +
                </jet-button>
                <jet-modal :show="acting" closeable="closeable" @close="acting = null">

                    <div class="bg-gray-50 shadow-2xl p-8">

                        <form @submit.prevent="submit" class="flex flex-col items-center p-16">
                            <jet-input class="px-5 py-3 w-96 border border-gray-600 rounded"
                                       type="text"
                                       name="name"
                                       placeholder="Habilidad"
                                       v-model="form.name"
                            >
                            </jet-input>
                            <jet-input-error :message="form.errors.name"/>

                            <select class="w-96 border border-gray-600 rounded mt-5"
                                    v-model="form.color"
                            >
                                <option value="">Seleccione color</option>
                                <option v-for="color in coloresDisponibles" :value="color"
                                >
                                    {{color}}
                                </option>

                            </select>
                            <jet-input-error :message="form.errors.color"/>



                            <jet-button class="px-5 py-3 mt-5 w-96 bg-purple-400 justify-center
                                    rounded-xl text-sm"
                                        :disabled="form.processing">
                    <span class="animate-spin mr-1" v-show="form.processing">
                        &#9696;
                    </span>
                                <span v-show="!form.processing">
                    Guardar
                    </span>
                            </jet-button>
                        </form>
                    </div>
                </jet-modal>

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
import JetInputError from "../../Components/InputError.vue";
import JetModal from "../../Components/Modal.vue";
import Section from "../../Custom/Section.vue";
import JetInput from "../../Components/TextInput.vue";
import JetButton from "../../Components/PrimaryButton.vue";
import * as heroIcons from "@heroicons/vue/24/solid";


export default {
    components: {
        JetButton, JetInput, Section, JetModal, JetInputError,
        PrimaryButton,
        DangerButton,
        AppLayout,
        SecondaryButton
    },
    data() {
        return {
            acting: null,
            form: this.$inertia.form({
                'name': '',
                'color': ''
            })
        }

    },
    methods: {
        submit(){
            this.form.submit('post', route('habilidades.store'), {
                onSuccess: () => {
                    this.form.reset('name');
                    this.form.reset('color');
                    this.acting = null
                }
            })
        }
    },
    props: {
        habilidades: Object,
        coloresDisponibles: Object
    }
}
</script>
