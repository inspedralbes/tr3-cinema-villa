<template>
    <LegendSeats />
    <div class="m-9 text-2xl text-white">
        <div v-for="row in rows" class="flex justify-center my-1">
            <div class="flex items-center mr-9"> {{ row }} </div>
            <div class="flex flex-row">
                <div v-for="n in 10" class="flex flex-row items-center justify-center">
                    <div v-if="row == 'A'" class="flex flex-row items-center justify-center text-2xl">
                        <div class="absolute transform -translate-y-9 mb-9" :class="n % 5 == 0 ? 'mr-8  ml-1' : 'mx-1'">{{ n }}</div>
                        <Seat   :id="`${row}-${n}`" 
                                :class="n % 5 == 0 ? 'mr-8 my-1 ml-1' : 'mx-1 -my-1'"
                                class="cursor-pointer fill-slate-300"
                                @click="handleSeatClick(`${row}-${n}`)"/>
                    </div>
                    <div v-else-if="row == 'F'" class="flex flex-row items-center justify-center text-2xl">
                        <Seat   :id="`${row}-${n}-VIP`" 
                                :class="n % 5 == 0 ? 'mr-8 my-1 ml-1' : 'mx-1 -my-1'"
                                class="cursor-pointer fill-yellow-500"
                                @click="handleSeatClick(`${row}-${n}-VIP`)"/>
                    </div>
                    <div v-else class="flex flex-row items-center justify-center text-2xl">
                        <Seat   :id="`${row}-${n}`" 
                                :class="n % 5 == 0 ? 'mr-8 my-1 ml-1' : 'mx-1 -my-1'"
                                class="cursor-pointer fill-slate-300"
                                @click="handleSeatClick(`${row}-${n}`)"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            rows: ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L'],
            selectedSeats: []
        }
    },
    methods: {
        selectedSeat(seat){
            seat.classList.remove('fill-slate-300');
            seat.classList.remove('fill-yellow-500');
            seat.classList.add('fill-green-300');
        },
        unselectedSeat(seat, seatID){
            seat.classList.remove('fill-green-300');
            if (seatID[0] == 'F') {
                seat.classList.add('fill-yellow-500');
            } else {
                seat.classList.add('fill-slate-300');
            }
        },
        handleSeatClick(seatId) {
            let seat = document.getElementById(seatId);
            // console.log(seatId);
            if (seat.classList.contains('fill-red-500')) {
                alert('Este asiento ya está ocupado');
            } else if (this.selectedSeats.length == 10 && seat.classList.contains('fill-slate-300')) {
                alert('No puedes seleccionar más de 10 asientos');
            } else {
                if (this.selectedSeats.includes(seatId)) {
                    this.selectedSeats = this.selectedSeats.filter(id => id != seatId);
                    this.unselectedSeat(seat, seatId);
                    // console.log(this.selectedSeats);
                } else {
                    this.selectedSeats.push(seatId);
                    this.selectedSeat(seat);
                    // console.log(this.selectedSeats);
                }
            }
        }
    }
}
</script>