<template>
    <NuxtLayout name="navbar" /> 
    <div class="bg-blue-950 py-8">
        <div class="container mx-auto">
            <h2 class="text-6xl font-semibold tracking-wider text-center text-white py-2">Apartado de administradores</h2>
            <p class="mt-4 py-3 text-xl text-center text-slate-300">Gestiona las sesiones a tu manera...</p>
        </div>
    </div>
    <div class="container mx-auto text-center mb-9">
        <h3 class="text-4xl font-semibold text-center mt-8 text-white">Panel de administración</h3>
        <div class="flex flex-col m-9 justify-center items-center">
            <div class="bg-white p-4 rounded-lg shadow-md my-4 mt-9 w-2/3 hover:bg-gradient-to-r from-indigo-500 from-10% via-sky-500 via-30% to-emerald-500 to-90% hover:text-white">
                <h4 class="text-xl font-semibold">Películas</h4>
                <p class="mt-2">Gestiona las películas que se proyectarán en el cine.</p>
                <nuxt-link to="/admin/" class="block mt-4 text-blue-500">Ir a películas</nuxt-link>
            </div>
            <div class="bg-white p-4 rounded-lg shadow-md my-4 w-2/3 hover:bg-gradient-to-r from-indigo-500 from-10% via-sky-500 via-30% to-emerald-500 to-90% hover:text-white">
                <h4 class="text-xl font-semibold">Sesiones</h4>
                <p class="mt-2">Gestiona las sesiones de las películas.</p>
                <nuxt-link to="/admin/" class="block mt-4 text-blue-500">Ir a sesiones</nuxt-link>
            </div>
        </div>  
    </div>
</template>

<script>
import { useAppStore } from '~/store';
export default {
    data() {
        return {
            
        }
    }, mounted() {
        const store = useAppStore();
        console.log('Admin page mounted');
        if (store.user?.type != 1) {
            this.$router.push('/');
        }
    },
}
</script>