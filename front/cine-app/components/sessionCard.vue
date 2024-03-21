<template>
    <nuxt-link :to="{ name: 'sessions-id', params: { id: session.id_session } }">
        <div class="text-center max-w-[520px] mx-auto bg-gradient-to-r from-indigo-500 from-10% via-sky-500 via-60% to-indigo-500 to-90%  hover:from-pink-500 hover:to-yellow-500 bg-opacity-50 rounded-lg shadow-md p-6">
            <h3 class="text-3xl font-bold text-white m-2">{{ session.day }}</h3>
            <p class="text-xl text-white mt-3">{{ session.hour }}</p>
            <p class="text-lg text-white">{{ session.total_tickets }} entradas totales</p>
            <p class="text-lg text-white">{{ session.tickets_sold }} entradas vendidas</p>
            <p class="text-xl text-white m-4">Disponibles: {{session.total_tickets - session.tickets_sold}}</p>
        </div>
    </nuxt-link>
</template>

<script>
export default {
    props: {
        session: Object
    },
    data() {
        return {
            
        };
    },
    methods: {
    },
};
</script>

<style lang="scss" scoped>

</style>