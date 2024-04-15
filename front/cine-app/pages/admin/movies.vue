<template>
    <div>
        <NuxtLayout name="navbar" />
        <div class="bg-blue-950 py-8">
            <div class="container mx-auto">
                <h2 class="text-6xl font-semibold tracking-wider text-center text-white py-2">
                    Administración de Películas
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
                            <label class="block text-gray-700 text-sm font-bold mb-2">Imagen</label>
                            <input v-model="image" type="text"
                                class="border rounded-md py-2 px-3 w-full focus:outline-none focus:border-blue-500" />
                        </div>
                        <div class="mb-4 flex justify-center items-center">
                            <div class="w-2/4 justify-center items-center mr-2">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Título:</label>
                                <input v-model="title" type="text"
                                    class="border rounded-md py-2 px-3 w-full focus:outline-none focus:border-blue-500" />
                            </div>
                            <div class="w-2/4 justify-center items-center ml-2">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Director:</label>
                                <input v-model="director" type="text"
                                    class="border rounded-md py-2 px-3 w-full focus:outline-none focus:border-blue-500" />
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Actores:</label>
                            <input v-model="actors" type="text"
                                class="border rounded-md py-2 px-3 w-full focus:outline-none focus:border-blue-500" />
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Sinopsis:</label>
                            <input v-model="sinopsis" type="text"
                                class="border rounded-md py-2 px-3 w-full focus:outline-none focus:border-blue-500" />
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Duración:</label>
                            <input v-model="duration" type="text"
                                class="border rounded-md py-2 px-3 w-full focus:outline-none focus:border-blue-500" />
                        </div>
                        <div class="mb-4 flex justify-center items-center">
                            <div class="w-2/4 justify-center items-center mr-2">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Premiere:</label>
                                <input v-model="premiere" type="date"
                                    class="border rounded-md py-2 px-3 w-full focus:outline-none focus:border-blue-500" />
                            </div>
                            <div class="w-2/4 justify-center items-center ml-2">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Género:</label>
                                <input v-model="genre" type="text"
                                    class="border rounded-md py-2 px-3 w-full focus:outline-none focus:border-blue-500" />
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Clasificación:</label>
                            <input v-model="classification" type="text"
                                class="border rounded-md py-2 px-3 w-full focus:outline-none focus:border-blue-500" />
                        </div>

                        <button @click="crearMovie()"
                            class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Crear Película
                        </button>

                        <button @click="actualizarMovie()"
                            class="bg-yellow-500 ml-4 hover:bg-yellow-600 text-white py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Actualizar Película
                        </button>

                        <button @click="eliminarMovie(id)"
                            class="bg-red-500 ml-4 hover:bg-red-600 text-white py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Eliminar Película
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mx-auto py-8">
            <h2 class="text-2xl font-semibold mb-4 text-center text-white">
                Lista de Películas
            </h2>
            <div class="overflow-x-auto">
                <table class="table-auto w-full border-collapse border border-gray-200 cursor-pointer">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 bg-gray-100 border border-gray-200">ID</th>
                            <th class="px-4 py-2 bg-gray-100 border border-gray-200">Título</th>
                            <th class="px-4 py-2 bg-gray-100 border border-gray-200">Director</th>
                            <th class="px-4 py-2 bg-gray-100 border border-gray-200">Actores</th>
                            <th class="px-4 py-2 bg-gray-100 border border-gray-200">Sinopsis</th>
                            <th class="px-4 py-2 bg-gray-100 border border-gray-200">Duración</th>
                            <th class="px-4 py-2 bg-gray-100 border border-gray-200">Premiere</th>
                            <th class="px-4 py-2 bg-gray-100 border border-gray-200">Género</th>
                            <th class="px-4 py-2 bg-gray-100 border border-gray-200">Clasificación</th>
                        </tr>
                    </thead>
                    <tbody class="text-white text-center">
                        <tr v-for="movie in movies" :key="movie.id_movie" @click="editarMovie(movie)">
                            <td class="px-4 py-2 border border-gray-200">{{ movie.id_movie }}</td>
                            <td class="px-4 py-2 border border-gray-200">{{ movie.title }}</td>
                            <td class="px-4 py-2 border border-gray-200">{{ movie.director }}</td>
                            <td class="px-4 py-2 border border-gray-200">{{ movie.actors }}</td>
                            <td class="px-4 py-2 border border-gray-200">{{ movie.sinopsis }}</td>
                            <td class="px-4 py-2 border border-gray-200">{{ movie.duration }}</td>
                            <td class="px-4 py-2 border border-gray-200">{{ movie.premiere }}</td>
                            <td class="px-4 py-2 border border-gray-200">{{ movie.genre }}</td>
                            <td class="px-4 py-2 border border-gray-200">{{ movie.classification }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div v-show="errorAlert">
            <ErrorPopup :error="error" />
        </div>

        <div v-show="succesAlert">
            <SuccessPopup :success="succes" />
        </div>
    </div>
</template>

<script>
import { useAppStore } from '~/store';
import { getAllMovies, addMovie, updateMovie, deleteMovie } from '~/services/communicationManager';

export default {
    data() {
        return {
            id: '',
            image: '',
            title: '',
            director: '',
            actors: [],
            sinopsis: '',
            duration: '',
            premiere: '',
            genre: '',
            classification: '',
            movies: [],
            error: '',
            errorAlert: false,
            succes: '',
            succesAlert: false
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
        crearMovie() {
            const store = useAppStore();
            const data = {
                image: this.image,
                title: this.title,
                director: this.director,
                actors: this.actors,
                sinopsis: this.sinopsis,
                duration: this.duration,
                premiere: this.premiere,
                genre: this.genre,
                classification: this.classification
            };
            addMovie(data, store.token).then((response) => {
                console.log(response);
                this.actualizarDatos();
                this.showSucces('Película creada correctamente');                
            }).catch((error) => {
                this.showError(error);
            });
        },
        actualizarMovie() {
            const store = useAppStore();
            const data = {
                id: this.id,
                image: this.image,
                title: this.title,
                director: this.director,
                actors: [`${this.actors}`],
                sinopsis: this.sinopsis,
                duration: this.duration,
                premiere: this.premiere,
                genre: this.genre,
                classification: this.classification
            };
            updateMovie(data, store.token).then((response) => {
                console.log(response);
                this.actualizarDatos();
                this.showSucces('Película actualizada correctamente');
                
            }).catch((error) => {
                this.showError(error);
            });
        },
        eliminarMovie() {
            const store = useAppStore();
            deleteMovie(this.id, store.token).then((response) => {
                console.log(response);
                this.actualizarDatos();
                this.showSucces('Película eliminada correctamente');                
            }).catch((error) => {
                this.showError(error);
            });
        },
        editarMovie(movie) {
            this.id = movie.id_movie;
            this.title = movie.title;
            this.director = movie.director;
            this.actors = movie.actors;
            this.sinopsis = movie.sinopsis;
            this.duration = movie.duration;
            this.premiere = movie.premiere;
            this.genre = movie.genre;
            this.classification = movie.classification;
        },
        actualizarDatos() {
            const store = useAppStore();
            moviesFreeSession(id, store.token).then((response) => {
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
        getAllMovies(store.token).then((response) => {
            this.movies = response;
            console.log(response);
        });
    }
}
</script>