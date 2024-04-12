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
            <div class="bg-white p-6 rounded-lg shadow-md my-3">
                <h3 class="text-xl font-semibold mb-4">Crear Sesión</h3>
                <div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="day1">Día:</label>
                        <input v-model="day" type="date" id="day1" name="day1"
                            class="border rounded-md py-2 px-3 w-full focus:outline-none focus:border-blue-500">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="hour1">Hora: (00:00:00)</label>
                        <input v-model="hour" type="text" id="hour1" name="hour1"
                            class="border rounded-md py-2 px-3 w-full focus:outline-none focus:border-blue-500">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="movie1">Pelicula:</label>
                        <select v-model="selectedMovie" id="movie" name="movie"
                            class="border rounded-md py-2 px-3 w-full focus:outline-none focus:border-blue-500">
                            <option value="" selected>Seleccionar película</option>
                            <option v-for="movie in movies" :key="movie.id" :value="movie.id">{{ movie.title }}</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="priceBase">Precio Base:</label>
                        <input v-model="priceBase" type="number" id="priceBase" name="priceBase" class="border rounded-md py-2 px-3 w-full focus:outline-none focus:border-blue-500">
                    </div>
                    <div class="mb-4 flex justify-center items-center">
                        <div class="w-2/4 justify-center items-center">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="isDiscount">Día del Espectador:</label>
                            <input v-model="isDiscount" type="checkbox" id="isDiscount" name="isDiscount" class="border rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                        </div>
                        <div class="w-2/4 justify-center items-center">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="hasVipSeats">Asientos VIP:</label>
                            <input v-model="hasVipSeats" type="checkbox" id="hasVipSeats" name="hasVipSeats" class="border rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                        </div>
                    </div>
                    <button @click="crearSession()"
                        class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">Crear
                        Sesión</button>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md my-3">
                <h3 class="text-xl font-semibold mb-4">Crear Sesión 1</h3>
                <form @submit.prevent="submitForm1">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="day1">Día:</label>
                        <input v-model="day1" type="date" id="day1" name="day1"
                            class="border rounded-md py-2 px-3 w-full focus:outline-none focus:border-blue-500">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="hour1">Hora:</label>
                        <input v-model="hour1" type="text" id="hour1" name="hour1"
                            class="border rounded-md py-2 px-3 w-full focus:outline-none focus:border-blue-500">
                    </div>
                    <!-- Agrega más campos según sea necesario -->
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">Crear
                        Sesión</button>
                </form>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md my-3">
                <h3 class="text-xl font-semibold mb-4">Crear Sesión 1</h3>
                <form @submit.prevent="submitForm1">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="day1">Día:</label>
                        <input v-model="day1" type="date" id="day1" name="day1"
                            class="border rounded-md py-2 px-3 w-full focus:outline-none focus:border-blue-500">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="hour1">Hora:</label>
                        <input v-model="hour1" type="text" id="hour1" name="hour1"
                            class="border rounded-md py-2 px-3 w-full focus:outline-none focus:border-blue-500">
                    </div>
                    <!-- Agrega más campos según sea necesario -->
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">Crear
                        Sesión</button>
                </form>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md my-3">
                <h3 class="text-xl font-semibold mb-4">Crear Sesión 1</h3>
                <form @submit.prevent="submitForm1">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="day1">Día:</label>
                        <input v-model="day1" type="date" id="day1" name="day1"
                            class="border rounded-md py-2 px-3 w-full focus:outline-none focus:border-blue-500">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="hour1">Hora:</label>
                        <input v-model="hour1" type="text" id="hour1" name="hour1"
                            class="border rounded-md py-2 px-3 w-full focus:outline-none focus:border-blue-500">
                    </div>
                    <!-- Agrega más campos según sea necesario -->
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">Crear
                        Sesión</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
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
        };
    },
    methods: {
        
    }
}
</script>