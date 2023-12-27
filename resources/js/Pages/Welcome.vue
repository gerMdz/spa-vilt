<script>
import {defineComponent} from 'vue'
import {Head, Link} from '@inertiajs/vue3'

import JetApplicationMark from '../Components/ApplicationMark.vue'
import JetButton from '../Components/PrimaryButton.vue'
import JetModal from '../Components/Modal.vue'
import JetInput from '../Components/TextInput.vue'


import Section from '../Custom/Section.vue'
import Skill from '../Custom/Habilidades.vue'
import Project from '../Custom/Projects.vue'
import * as heroIcons from "@heroicons/vue/24/solid";


export default defineComponent({
    components: {
        Head,
        Link,
        JetApplicationMark,
        JetButton,
        JetModal,
        JetInput,
        Section,
        Skill,
        Project,
    },

    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        skills: Object,
        projects: Object,

    },
    methods: {
        submit() {
            this.form.post(route('contacto'));
        }
    },

    data() {
        return {
            heroIcons: heroIcons,
            contacting: null,
            form: this.$inertia.form({
                'email': '',
                'message': ''
            })
        }

    },


})
</script>

<template>
    <Head title="Bienvenidos"/>
    <div class="
        grid grid-cols-2
        text-right py-10 px-72
        bg-gray-800 text-gray-300
    ">
        <div>
            <jet-application-mark class="h-12 w-auto"></jet-application-mark>
        </div>
        <div v-if="canLogin">
            <Link v-if="$page.props.user" :href="route('dashboard')" class="text-sm underline">
                Dashboard
            </Link>

            <template v-else>
                <Link :href="route('login')" class="text-base underline">
                    Ingresar
                </Link>

                <Link v-if="canRegister" :href="route('register')" class="text-base underline place-self-end ml-4">
                    Registrarse
                </Link>
            </template>
        </div>
    </div>

    <Section class="bg-gray-800 pt-16 h-screen">
        <div class="h-2/3 flex flex-wrap content-between border-gray-600 pb-36">
            <p class="border-b-2 font-bold border-gray-400 pb-3 text-2xl text-gray-300 uppercase">
                Hola: Estamos en esta gran página.</p>
            <div class="h-1/3 flex  items-end border-b-2 border-gray-500">
                <p class="font-bold  mr-5 text-gray-400 text-xl">
                    ¿Conocer más?</p>
                <br/>
                <jet-button class="bg-green-400 rounded font-bold text-sm text-gray-800
                hover:bg-green-600"
                            @click="contacting=true"
                >
                    Hablemos.
                </jet-button>
            </div>
        </div>

        <div class="h-1/3 animate-pulse  mt-3 text-gray-300 text-center text-9xl">
            <a href="#skill" class="text-white">
                &#8675;
            </a>
        </div>


    </Section>
    <Section id="skill" class="bg-gray-200 text-gray-800 h-screen">
        <h2 class="text-6xl font-bold pt-3">Habilidades propias</h2>

        <div class="grid grid-cols-2">
            <div v-for="skill in skills">
                <Skill :background="skill.color">
                    {{ skill.name }}
                </Skill>

            </div>
        </div>

        <div class="flex justify-center mt-10">
            <jet-button class="bg-indigo-400 rounded font-bold text-sm text-green-600
                hover:bg-indigo-700" @click="contacting=true">
                Veamos.
            </jet-button>
        </div>
    </Section>
    <Section class="bg-gray-600 text-gray-200 h-screen">
        <h2 class="text-6xl font-bold pt-3">Proyectos</h2>

        <div v-for="(project, index) in projects">
            <Project :title="project.title" :description="project.description" :color="project.color">
                <component :is="heroIcons[project.icon_name+'Icon']"></component>
            </Project>

        </div>

        <div class="flex justify-center mt-10">
            <jet-button class="bg-purple-400 rounded font-bold text-sm text-gray-800
                hover:bg-purple-800" @click="contacting=true">
                Hay varios.
            </jet-button>
        </div>
    </Section>

    <Section class="
    flex justify-between bg-gray-800 text-gray-300 text-xl
">
        <p>&copy; gerMdz 2023</p>
        <div class="flex justify-evenly items-center">
            <Link href="#" target="_blank" class="border-b pb-1 px-2 hover:bg-gray-50">
                GitHub
            </Link>
        </div>
    </Section>


    <jet-modal :show="contacting" closeable="closeable" @close="contacting = null">
        <div class="bg-gray-50 shadow-2xl p-8">
            <p class="text-gray-600 text-2xl font-extrabold text-center">
                Cuentame algo más
            </p>
            <form @submit.prevent="submit" class="flex flex-col items-center p-16">
                <jet-input class="px-5 py-3 w-96 border border-gray-600 rounded"
                           type="email"
                           name="email"
                           placeholder="Tú email"
                           v-model="form.email"
                >
                </jet-input>
                <textarea class="px-5 py-3 w-96 border border-gray-600 rounded mt-5"
                          name="message" placeholder="Los detalles"
                          v-model="form.message"
                >

                </textarea>
                <jet-button class="px-5 py-3 mt-5 w-96 bg-purple-400 justify-center
                                    rounded-xl text-sm">
                    Enviar
                </jet-button>
            </form>
        </div>
    </jet-modal>
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
