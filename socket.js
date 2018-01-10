var server = require('http').Server();
var io = require('socket.io')(server);

var Redis = require('ioredis');
var redis = new Redis();
var redisMsg = new Redis();
redis.subscribe('test-channel');

redisMsg.subscribe('room');

redisMsg.on('message', function(channel, message) {
	message = JSON.parse(message);
		console.log(channel, message);
		io.emit(channel + ':' + message.event, message.data);
});

io.on('connection', function (socket) {
	console.log('USER CONNECTED WITH ID : ' + socket.id);
	io.emit('user joined', socket.id);
});
redis.on('message', function(channel, message) {
	message = JSON.parse(message);
	console.log(channel, message);
	io.emit(channel + ':' + message.event, message.data);
});

server.listen(3000, () => {

});