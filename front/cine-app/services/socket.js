import { io } from "socket.io-client";
import { useAppStore } from '~/store';

// const URL = "http://localhost:3727";
const URL = "http://tr3.cinemavilla.a22betvilver.daw.inspedralbes.cat:3727" //producción
export const socket = io(URL);

let store;
setTimeout(() => {
    store = useAppStore();
}, 500);