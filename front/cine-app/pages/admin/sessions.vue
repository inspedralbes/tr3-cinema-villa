<template>
    <NuxtLayout name="navbar" />
    <div class="bg-blue-950 py-8">
        <div class="container mx-auto">
            <h2 class="text-6xl font-semibold tracking-wider text-center text-white py-2">Administración de Sesiones
            </h2>
        </div>
    </div>

    <div class="flex justify-center items-center">
        <div class="flex flex-col w-2/5">
            <div class="bg-white p-6 rounded-lg shadow-md my-9">
                <div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Número ID:</label>
                        <input v-model="id" type="number"
                            class="border rounded-md py-2 px-3 w-full focus:outline-none focus:border-blue-500">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Día:</label>
                        <input v-model="day" type="date"
                            class="border rounded-md py-2 px-3 w-full focus:outline-none focus:border-blue-500">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Hora: (00:00:00)</label>
                        <input v-model="hour" type="text" placeholder="00:00:00"
                            class="border rounded-md py-2 px-3 w-full focus:outline-none focus:border-blue-500">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Pelicula:</label>
                        <select v-model="selectedMovie"
                            class="border rounded-md py-2 px-3 w-full focus:outline-none focus:border-blue-500">
                            <option value="" selected>Seleccionar película</option>
                            <option v-for="movie in movies" :key="movie.id_movie" :value="movie.id_movie">{{ movie.title }}</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Precio Base:</label>
                        <input v-model="priceBase" type="number" class="border rounded-md py-2 px-3 w-full focus:outline-none focus:border-blue-500">
                    </div>
                    <div class="mb-4 flex justify-center items-center">
                        <div class="w-2/4 justify-center items-center">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Día del Espectador:</label>
                            <input v-model="isDiscount" type="checkbox" class="border rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                        </div>
                        <div class="w-2/4 justify-center items-center">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Asientos VIP:</label>
                            <input v-model="hasVipSeats" type="checkbox" class="border rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                        </div>
                    </div>
                    <button @click="crearSession()"
                        class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">Crear
                        Sesión</button>

                    <button @click="actualizarSession()" class="bg-yellow-500 ml-4 hover:bg-yellow-600 text-white py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Actualizar Sesión</button>

                    <button @click="eliminarSession()" class="bg-red-500 ml-4 hover:bg-red-600 text-white py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Eliminar Sesión</button>
                </div>
            </div>

        </div>
    </div>

    <div class="container mx-auto py-8">
    <h2 class="text-2xl font-semibold mb-4 text-center text-white">Selecciona la session que deseas editar:</h2>
    <div class="overflow-x-auto">
        <table class="table-auto w-full border-collapse border border-gray-200 cursor-pointer">
            <thead>
                <tr>
                    <th class="px-4 py-2 bg-gray-100 border border-gray-200">ID de Sesión</th>
                    <th class="px-4 py-2 bg-gray-100 border border-gray-200">Día</th>
                    <th class="px-4 py-2 bg-gray-100 border border-gray-200">Hora</th>
                    <th class="px-4 py-2 bg-gray-100 border border-gray-200">ID de Película</th>
                    <th class="px-4 py-2 bg-gray-100 border border-gray-200">Día del Público</th>
                    <th class="px-4 py-2 bg-gray-100 border border-gray-200">Precio Base</th>
                    <th class="px-4 py-2 bg-gray-100 border border-gray-200">VIP</th>
                    <th class="px-4 py-2 bg-gray-100 border border-gray-200">Total de Tickets</th>
                    <th class="px-4 py-2 bg-gray-100 border border-gray-200">Tickets Vendidos</th>
                </tr>
            </thead>
            <tbody class="text-white text-center">
                <tr v-for="session in sessions" @click="editarSession(session)">
                    <td class="px-4 py-2 border border-gray-200">{{ session.id_session }}</td>
                    <td class="px-4 py-2 border border-gray-200">{{ session.day }}</td>
                    <td class="px-4 py-2 border border-gray-200">{{ session.hour }}</td>
                    <td class="px-4 py-2 border border-gray-200">{{ session.movie_id }}</td>
                    <td class="px-4 py-2 border border-gray-200">{{ session.audienceDay }}</td>
                    <td class="px-4 py-2 border border-gray-200">{{ session.priceBase }}</td>
                    <td class="px-4 py-2 border border-gray-200">{{ session.vip }}</td>
                    <td class="px-4 py-2 border border-gray-200">{{ session.total_tickets }}</td>
                    <td class="px-4 py-2 border border-gray-200">{{ session.tickets_sold }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>

    <div v-show="errorAlert">
        <ErrorPopup :error="this.error" />
    </div>

    <div v-show="succesAlert">
        <SuccesPopup :succes="this.succes" />
    </div>

</template>

<script>
import { useAppStore } from '~/store';
import { moviesFreeSession, addSession, getAllSessions, updateSession, deleteSession } from '~/services/communicationManager';

export default {
    data() {
        return {
            day: '',
            hour: '',
            selectedMovie: '',
            priceBase: '',
            isDiscount: false,
            hasVipSeats: false,
            movies: [],
            error: '',
            errorAlert: false,
            succes: '',
            succesAlert: false,
            sessions: []
        };
    },
    methods: {
        showSucces(message) {
            this.succes = message;
            this.succesAlert = true; // Mostrar el mensaje de error
            setTimeout(() => {
                this.succes = '';
                this.succesAlert = false;
            }, 15000); // Ocultar el mensaje después de 15 segundos
        },
        showError(message) {
            this.error = message;
            this.errorAlert = true; // Mostrar el mensaje de error
            setTimeout(() => {
                this.error = '';
                this.errorAlert = false;
            }, 15000); // Ocultar el mensaje después de 15 segundos
        },
        crearSession() {
            const store = useAppStore();
            const data = {
                day: this.day,
                hour: this.hour,
                movie_id: this.selectedMovie,
                priceBase: this.priceBase,
                audienceDay: this.isDiscount,
                vip: this.hasVipSeats
            };
            addSession(data, store.token).then((response) => {
                console.log(response);
                this.showSucces('Sesión creada correctamente');
                this.actualizarDatos();
            }).catch((error) => {
                this.showError(error);
            });
        },
        actualizarSession() {
            const store = useAppStore();
            const data = {
                id: this.id,
                day: this.day,
                hour: this.hour,
                movie_id: this.selectedMovie,
                priceBase: this.priceBase,
                audienceDay: this.isDiscount,
                vip: this.hasVipSeats
            };
            updateSession(data, store.token).then((response) => {
                console.log(response);
                this.showSucces('Sesión actualizada correctamente');
                this.actualizarDatos();
            }).catch((error) => {
                this.showError(error);
            });
        },
        eliminarSession() {
            const store = useAppStore();
            deleteSession(this.id, store.token).then((response) => {
                console.log(response);
                this.showSucces('Sesión eliminada correctamente');
                this.actualizarDatos();
            }).catch((error) => {
                this.showError(error);
            });
        },
        editarSession(session) {
            this.id = session.id_session;
            this.day = session.day;
            this.hour = session.hour;
            this.selectedMovie = session.movie_id;
            this.priceBase = session.priceBase;
            this.isDiscount = session.audienceDay;
            this.hasVipSeats = session.vip;
        },
        actualizarDatos() {
            const store = useAppStore();
            moviesFreeSession(store.token).then((response) => {
                this.movies = response;
                console.log(response);
            });
            getAllSessions().then((response) => {
                this.sessions = response;
                console.log(response);
            });
        }
    },
    mounted() {
        const store = useAppStore();
        moviesFreeSession(store.token).then((response) => {
            this.movies = response;
            console.log(response);
        });
        getAllSessions().then((response) => {
            this.sessions = response;
            console.log(response);
        });
    }
}
</script>