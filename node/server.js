const express = require('express');
const { createServer } = require('http');
const { Server } = require('socket.io');

const app = express();
const port = 3727;
const server = createServer(app);

const roomsList = {};

const io = new Server(server, {
    cors: {
        origin: '*',
        methods: ['GET', 'POST'],
        credentials: true,
        allowedHeaders: ["Access-Control-Allow-Origin"],
    }
});

io.on('connection', (socket) => {
    console.log(`user conectado ${socket.id}`);

    socket.on('connectToRoom', (room) => {
        // console.log('conectado a la sala', room);
        socket.join(room);
        roomsList[room] = roomsList[room] ? roomsList[room] : [];
        roomsList[room].push({'socket.id': socket.id, 'seats': []});
        // console.log(roomsList);
    });

    socket.on('updateSeats', (data) => {
        const { room, seats } = data;
        roomsList[room].forEach((user) => {
            if (user['socket.id'] == socket.id) {
                user.seats = seats;
            }
        });
        io.to(room).emit('updateSeatsRoom', roomsList[room]);
    });

    socket.on('exitFromRoom', (room) => {
        console.log(`Usuario ${socket.id} saliendo de la sala ${room}`, roomsList[room]);
        if (socket.rooms.has(room)) {
            socket.leave(room);
            if (roomsList[room]) {
                roomsList[room] = roomsList[room].filter(user => user['socket.id'] !== socket.id);
            }
            console.log('Lista de usuarios en la sala:', roomsList[room]);
        } else {
            console.log('El socket no está unido a la sala ', room);
        }
    });

    socket.on('disconnect', () => {
        console.log('user desconectado ' + socket.id);
    });
})

server.listen(port, () => {
    console.log(`Server running on port ${port}`)
})
