<template>
    <LegendSeats v-show="showSession" />
    <div v-show="showSession" v-for="row in rows" class="flex justify-center">
        <div class="flex flex-row">
            <div v-for=" n in 10" class="flex flex-row items-center justify-center">
                <Seat :id="`${row}-${n}`" class="mx-1 my-1 "/>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        session: Object
    },
    data(){
        return {
            rows: "ABCDEFGHIJKL",
            showSession: false
        }

    }, 
    methods: {
        
    }, 
    mounted() { 
        if(this.session != null){
            this.showSession = true;
        }
    }
}
</script>

<style scoped>

</style>