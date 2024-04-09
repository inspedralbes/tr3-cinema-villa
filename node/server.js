const express = require('express');
const { createServer } = require('http');
const { Server } = require('socket.io');

const app = express();
const port = 3727;
const server = createServer(app);

//Variables 
var roomsList = {};


const io = new Server(server, {
    cors: {
        origin: '*',
        methods: ['GET', 'POST'],
        credentials: true,
        allowedHeaders: ["Access-Control-Allow-Origin"],
    }
});

io.on('connection', (socket) => {
    console.log('user conectado');
    // console.log(socket.id);

    socket.on('connectToRoom', (room) => {
        console.log('conectado a la sala', room);
        socket.join(room);
    });

    socket.on('selectSeat', (data) => {
        console.log('asiento seleccionado', data);
        selectedSeatsSockets[data] = socket.id;
        socket.broadcast.emit('selectedSeat', data);
    });

    socket.on('disconnect', () => {
        console.log('user desconectado');
        //recibir la lista de sus seleccionados o su socket.id y los que el haya tenido selected se marcan como libres ahora
        socket.disconnect();
    });
})


server.listen(port, () => {
    console.log(`Server running on port ${port}`)
})
