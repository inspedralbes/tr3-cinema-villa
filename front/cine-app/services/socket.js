import { io } from "socket.io-client";
import { useAppStore } from '~/store';

const URL = "http://localhost:3727";
export const socket = io(URL);

let store;
setTimeout(() => {
    store = useAppStore();
}, 500);

