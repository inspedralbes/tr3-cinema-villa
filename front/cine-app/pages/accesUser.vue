<template>
    <NuxtLayout name="navbar" /> 
    <div class="m-9 p-9 bg-blue-950">
        <div class="bg-blue-950 py-8">
            <div class="container mx-auto">
                <h2 class="text-6xl font-semibold tracking-wider text-center text-white py-2">¡Bienvenido al CineVilla!
                </h2>
            </div>
        </div>
        <div class="flex flex-col items-center justify-center">
            <div v-if="!showRegister" class="w-full max-w-md">
                <div class="bg-white shadow-md rounded-lg px-8 py-6 mt-4 max-w-md w-full mx-4">
                    <h2 class="text-3xl font-semibold text-center mb-4">Login CineVilla</h2>
                    <div class="mb-4">
                        <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                        <input v-model="email" type="email" id="email" name="email"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-6">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Contraseña</label>
                        <input v-model="password" type="password" id="password" name="password"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-150 ease-in-out hover:scale-110"
                            @click="postLoginForm()">
                            Iniciar Sesión
                        </button>
                        <p class="text-gray-700 text-sm mt-4">Si no estás registrado en nuestro cine, <a href="#"
                                @click="showRegister = true" class="text-blue-500">regístrate ahora</a>.</p>
                    </div>
                </div>
            </div>
            <div v-else class="w-full max-w-md">
                <div class="bg-white shadow-md rounded-lg px-8 py-6 mt-8 max-w-md w-full mx-4">
                    <h2 class="text-3xl font-semibold text-center mb-4">Registro CineVilla</h2>
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="first_name" class="block text-gray-700 text-sm font-bold mb-2">Nombre</label>
                            <input v-model="firstName" type="text" id="first_name" name="first_name"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div>
                            <label for="last_name" class="block text-gray-700 text-sm font-bold mb-2">Apellido</label>
                            <input v-model="lastName" type="text" id="last_name" name="last_name"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                    </div>
                    <div class="my-3">
                        <label for="phone_number" class="block text-gray-700 text-sm font-bold mb-2">Número de
                            teléfono</label>
                        <input v-model="phoneNumber" type="text" id="phone_number" name="phone_number"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="my-3">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Correo electrónico</label>
                        <input v-model="email" type="email" id="email" name="email"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div>
                            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Contraseña</label>
                            <input v-model="password" type="password" id="password" name="password"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div>
                            <label for="password_confirmation"
                                class="block text-gray-700 text-sm font-bold mb-2">Confirmar contraseña</label>
                            <input v-model="passwordConfirmation" type="password" id="password_confirmation"
                                name="password_confirmation"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-150 ease-in-out hover:scale-110"
                            @click="postRegisterForm()">Registrarse</button>
                        <p class="text-gray-700 text-sm mt-4">¿Ya tienes una cuenta? <a href="#"
                                @click="showRegister = false" class="text-blue-500">Inicia sesión</a>.</p>
                    </div>
                </div>
            </div>
        </div>
        <div v-show="errorAlert">
            <ErrorPopup :error="this.error"/>
        </div>
    </div>
</template>

<script>
import { useAppStore } from '~/store';
import { postLogin, postRegister } from '~/services/communicationManager';

export default {
    data() {
        return {
            password: '',
            firstName: '',
            lastName: '',
            phoneNumber: '',
            email: '',
            passwordConfirmation: '',
            error: '',
            showRegister: false,
            errorAlert: false
        };
    },
    methods: {
        showError(message) {
            this.error = message;
            this.errorAlert = true; // Mostrar el mensaje de error
            setTimeout(() => {
                this.error = '';
                this.errorAlert = false;
            }, 15000); // Ocultar el mensaje después de 15 segundos
        },
        postLoginForm() {
            const store = useAppStore();
            // Agrega aquí la lógica para iniciar sesión
            // console.log('Iniciar sesión con usuario:', this.email, 'y contraseña:', this.password);
            if (this.email == '' || this.password == '') {
                this.showError('Por favor, llena todos los campos');
            } else {
                let user = {
                    email: this.email,
                    password: this.password,
                    password_confirmation: this.password
                };
                postLogin(user).then(response => {
                    // console.log('Respuesta del servidor:', response);
                    store.setUser(response.user);
                    store.setToken(response.token);
                    this.$router.push('/');
                }).catch(error => {
                    console.error(error);
                });
            }
        },
        postRegisterForm() {
            const store = useAppStore();
            // Agrega aquí la lógica para el registro
            // console.log('Registro con:', this.firstName, this.lastName, this.phoneNumber, this.email, this.password, this.passwordConfirmation);
            if (this.firstName == '' || this.lastName == '' || this.phoneNumber == '' || this.email == '' || this.password == '' || this.passwordConfirmation == '') {
                this.showError('Por favor, llena todos los campos');
            } else {
                let user = {
                    first_name: this.firstName,
                    last_name: this.lastName,
                    phone_number: this.phoneNumber,
                    email: this.email,
                    password: this.password,
                    password_confirmation: this.passwordConfirmation
                };
                postRegister(user).then((response) => {
                    // console.log('Respuesta del servidor:', response);
                    store.setUser(response.user);
                    store.setToken(response.token);
                    this.$router.push('/');                 
                }).catch((error) => {
                    console.error(error);
                });
            }
        }
    }
}
</script>