<template>
    <div v-if="showSession == true" >
        <div class="flex flex-col items-center justify-center">
            <img :src="movie.image" :alt="movie.title" class="w-full object-cover h-auto max-h-40 mb-4">
            <h1 class="text-white text-6xl font-mono font-bold tracking-widest mb-6">{{ movie.title }}</h1>
            <div class="flex flex-col items-center justify-center w-full md:m-7 text-slate-300">
                <div class="flex flex-col md:flex-row justify-center items-center w-full md:w-5/6 md:mb-3">
                    <h2 class="text-lg md:text-xl font-mono font-bold tracking-widest mb-2 md:m-0 mr-0 md:mr-4">Duración: {{ movie.duration }}</h2>
                    <h2 class="text-lg md:text-xl font-mono font-bold tracking-widest mb-2 md:m-0 ml-0 md:ml-4">Fecha de Estreno: {{ movie.premiere }}</h2>
                </div>
                <div class="flex flex-col md:flex-row justify-center items-center w-full md:w-5/6 md:mb-3">
                    <h2 class="text-lg md:text-xl font-mono font-bold tracking-widest mb-2 md:m-0 mr-0 md:mr-4">Session: {{ session.day }}, {{ session.hour }}</h2>
                </div>
            </div>
        </div>

        <SelectSeats :ocuppiedSeats="this.ocuppiedSeats" />

        <div v-show="showResumen" class="flex justify-center mt-3 mb-9">
            <div class="flex flex-col items-center mx-9 text-white">
                <div class="p-4 text-3xl font-bold tracking-wider">
                    Asientos seleccionados
                </div>
                <div class="flex flex-col items-center justify-center">
                    <div v-for="seat in selectedSeats" :key="seat" class="px-2 mx-2 text-lg">
                        {{ seat }} || {{ seat.includes('VIP') ? (parseFloat(session.priceBase) + 2.00).toFixed(2) : session.priceBase }} €
                    </div>
                </div>
                <div class="m-5">
                    <button class="mx-3 px-3 py-1 text-xl bg-violet-500 rounded-lg" @click="formForBuy()">
                        Comprar
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <div v-if="showSession == false" class="flex items-center justify-center h-screen">
        <div class="loader ease-linear rounded-full border-4 border-t-4 border-gray-200 h-12 w-12"></div>
    </div>
</template>

<script>
import { getSession, getMovie, getOccupiedSeats } from '~/services/communicationManager.js';
import { useAppStore } from '~/store';

export default {
    data() {
        return {
            session: {},
            movie: {},
            ocuppiedSeats: [],
            selectedSeats: [],
            showSession: false,
            showResumen: false
        };
    },
    methods: {
        formForBuy() {
            
        }
    },
    mounted() {
        const store = useAppStore();
        store.setSessionId(this.$route.params.id);
        // Llamada a la API para obtener las películas
        getSession(store.id_session).then((response) => {
            this.session = response;
            store.setSession(response);
            //Buscar la película
            store.setMovieId(this.session.movie_id);
            getMovie(store.id_movie).then((response) => {
                this.movie = response;
                store.setMovie(response);
            }).catch((error) => {
                console.error(error);
            });
            //Buscar los asientos ocupados
            getOccupiedSeats(store.id_session).then((response) => {
                if (response.message) {
                    console.log(response.message);
                } else {
                    this.ocuppiedSeats = response;
                    store.setOccupiedSeats(this.ocuppiedSeats);
                }
                this.showSession = true;
            }).catch((error) => {
                console.error(error);
            });
        }).catch((error) => {
            console.error(error);
        });

        setInterval(() => {
            this.selectedSeats = store.selectedSeats;
            // console.log(this.selectedSeats);
            if (this.selectedSeats.length > 0) {
                this.showResumen = true;
            } else {
                this.showResumen = false;
            }
        }, 500);
    }
}
</script>

<style scoped>
@keyframes loader {
    0% {
        transform: rotate(0deg);
    }

    100% {
        transform: rotate(360deg);
    }
}

.loader {
    border-top-color: #3498db;
    animation: loader 1.5s linear infinite;
}
</style>