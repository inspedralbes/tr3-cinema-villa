<template>
    <div class="flex-column text-center justify-center items-center bg-blue-950">
        <h2 class="text-5xl font-bold text-white m-4">Próxima Sessión</h2>
        <SessionCard :session="session" />
    </div>
</template>

<script>
import { getSessionByMovieId } from '~/services/communicationManager';
import { useAppStore } from '~/store';

export default {
    props: {
        id_movie: String
    },
    data() {
        return {
            session: {},
            id_movieSession: Number
        };
    },
    methods: {
    },
    mounted() {
        if (this.id_movie != undefined) {
            const store = useAppStore();
            // Llamada a la API para obtener la sesión
            let id = parseInt(this.id_movie);
            getSessionByMovieId(id).then((response) => {
                // id_session, day, hour, movie_id, total_tickets, tickets_sold
                this.session = response;
                this.id_movieSession = response.movie_id;
                store.setSession(response);
                store.setSessionId(parseInt(response.id_session));
            }).catch((error) => {
                console.error(error);
            });
        } else {
            console.error("El parámetro id no está definido");
        }
    }
};
</script>