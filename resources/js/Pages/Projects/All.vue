<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Proyectos
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
                                       placeholder="Proyecto"
                                       v-model="form.title"
                            >
                            </jet-input>
                            <jet-input-error :message="form.errors.title"/>
                            <jet-input class="px-5 py-3 w-96 border border-gray-600 rounded mt-5"
                                       type="text"
                                       name="description"
                                       placeholder="Descripción"
                                       v-model="form.description"
                            >
                            </jet-input>
                            <jet-input-error :message="form.errors.description"/>

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

                            <select class="w-96 border border-gray-600 rounded mt-5"
                                    v-model="form.icon_name"
                            >
                                <option value="">Seleccione icon</option>
                                <option v-for="icon in iconsDisponibles" :value="icon"
                                >
                                    {{icon}}
                                </option>

                            </select>
                            <jet-input-error :message="form.errors.icon_name"/>



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
                <table v-if="proyectos.length > 0" class="w-full text-left">
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
import JetModal from "../../Components/Modal.vue";
import JetInput from "../../Components/TextInput.vue";
import JetInputError from "../../Components/InputError.vue";
import JetButton from "../../Components/PrimaryButton.vue";



export default {
    components: {
        JetButton, JetInputError, JetInput, JetModal,
        PrimaryButton,
        DangerButton,
        AppLayout,
        SecondaryButton,
    },
    methods: {
        componentName(name) {
            return () => import(`./${name}`)
        },
        submit(){
            this.form.submit('post', route('proyectos.store'), {
                onSuccess: () => {
                    this.form.reset('title');
                    this.form.reset('description');
                    this.form.reset('color');
                    this.form.reset('icon_name');
                    this.acting = null
                }
            })
        }
    },
    props: {
        proyectos: Object,
        coloresDisponibles: Object,
        iconsDisponibles: Object
    },
    data() {
        return {
            heroIcons: heroIcons,
            acting: null,
            form: this.$inertia.form({
                'title': '',
                'description': '',
                'color': '',
                'icon_name': ''
            })
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
