<template>
    <NuxtLayout name="navbar" /> 
    <div class="bg-blue-950 py-8 min-h-[38.5rem]">
        <div class="container mx-auto">
            <h2 class="text-6xl font-semibold tracking-wider text-center text-white py-2">¡Consulta tus compras!</h2>
            <p class="mt-4 py-3 text-xl text-center text-slate-300">Puedes buscar todos tus registros de compras del CineVilla.</p>
            <!-- Formulario de búsqueda por ID de sesión y correo electrónico -->
            <div class="m-9">
                <div class="flex justify-center mt-6">
                    <input type="number" v-model="sessionId" placeholder="ID de sesión" class="mr-4 px-4 py-2 rounded-lg border border-gray-400 focus:outline-none focus:border-blue-500">
                    <input type="email" v-model="email" placeholder="Correo electrónico" class="mr-4 px-4 py-2 rounded-lg border border-gray-400 focus:outline-none focus:border-blue-500">
                    <button @click="searchEntradas()"  class="px-4 py-2 bg-blue-500 text-white rounded-lg focus:outline-none hover:bg-blue-600">Buscar</button>
                </div>
                <div v-if="showTickets1 && tickets1">
                    <TableListTickets :tickets="tickets1" />
                </div>
            </div>
            <!-- Formulario de búsqueda por correo electrónico -->
            <div class="m-9">
                <div class="flex justify-center mt-6">
                    <input type="email" v-model="email2" placeholder="Correo electrónico" class="mr-4 px-4 py-2 rounded-lg border border-gray-400 focus:outline-none focus:border-blue-500">
                    <button @click="searchEntradas()" class="px-4 py-2 bg-blue-500 text-white rounded-lg focus:outline-none hover:bg-blue-600">Buscar</button>
                </div>
                <div v-if="showTickets2 && tickets2">
                    <TableListTickets :tickets="tickets2" />
                </div>
            </div>
        </div>
    </div>
</template>


<script>
import { useAppStore } from '~/store';
import { getEntradasWithEmail, getEntradasWithEmailSession } from '~/services/communicationManager';

export default {
    data() {
        return {
            sessionId: Number,
            email: '',
            email2: '',
            tickets1: {},
            tickets2: {},
            showTickets1: false,
            showTickets2: false
        }
    },
    methods: {
        searchEntradas() {
            const store = useAppStore();
            if (this.sessionId && this.email) {
                this.showTickets1 = false;
                const data = {
                    id: this.sessionId,
                    email: this.email
                }
                getEntradasWithEmailSession(data, store.token).then((response) => {
                    // console.log(response);
                    this.tickets1 = response;
                    this.showTickets1 = true;
                });
            } else if (this.email2) {
                this.showTickets2 = false;
                const data = {
                    email: this.email2
                }
                getEntradasWithEmail(data, store.token).then((response) => {
                    // console.log(response);
                    this.tickets2 = response;
                    this.showTickets2 = true;
                });
            }
        }
    }
}
</script>
