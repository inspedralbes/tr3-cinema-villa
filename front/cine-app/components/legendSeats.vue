<template>
    <div class="flex flex-col items-center justify-center text-center mt-3 ">
        <h1 class="text-white text-3xl font-mono font-bold tracking-widest underline decoration-sky-500">Elije tus asientos</h1>
        <div class="flex items-center justify-center w-4/5 md:m-7 text-slate-300 border-t-2 border-b-2 border-slate-400">
            <h2 class="text-base p-9 md:text-xl font-mono font-bold tracking-widest mb-2 md:m-0 mr-0 md:mr-4 relative">
                <Seat class="fill-green-300 absolute left-0 top-1/2 transform -translate-y-1/2"/>
                Seleccionado
            </h2>
            <h2 class="text-base p-9 md:text-xl font-mono font-bold tracking-widest mb-2 md:m-0 mr-0 md:mr-4 relative">
                <Seat class="fill-slate-300 absolute left-0 top-1/2 transform -translate-y-1/2"/>
                Disponible
            </h2>
            <h2 class="text-base p-9 md:text-xl font-mono font-bold tracking-widest mb-2 md:m-0 mr-0 md:mr-4 relative">
                <Seat class="fill-red-500 absolute left-0 top-1/2 transform -translate-y-1/2"/>
                Ocupado
            </h2>
        </div>
    </div>
</template>

<script>
export default {
    setup () {
        

        return {}
    }
}
</script>

<style lang="scss" scoped>

</style>