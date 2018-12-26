const server = require('http').createServer();
const io = require('socket.io')(server);

let messages = [];
io.on('connection',function (socket) {

    socket.on('send-message',function (message) {
        messages.push(message);
        io.emit('print-message',messages)
    });
    io.emit('print-message',messages);
});
server.listen(3000);

