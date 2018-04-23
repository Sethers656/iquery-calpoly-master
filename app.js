
var path = require('path');
var express = require('express');
var app = express();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var port = process.env.PORT || 3000;
var quota = 1000;

var roomNames = [" "];

var publicPath = path.resolve(__dirname + '/');



//Express serving web pages
app.use(express.static(publicPath));

app.get('/', function(req, res){
  res.sendFile('home.html', {root: publicPath});
});

app.get('/student_room', function(req, res){
  res.sendFile('student_room.html', {root: publicPath});
});

app.get('/teacher_room', function(req, res){
  res.sendFile('teacher_room.html', {root: publicPath});
});

app.get('/about', function(req, res){
  res.sendFile('about.html', {root: publicPath});
});

app.get('/contact', function(req, res){
  res.sendFile('contact.html', {root: publicPath});
});



// DATABASE
var MongoClient = require('mongodb').MongoClient
  , assert = require('assert');

// Connection URL
var url = 'mongodb://165.227.125.158:27017';

// Use connect method to connect to the server
MongoClient.connect(url, function(err, db) {
  assert.equal(null, err);
  console.log("Connected successfully to server");


  
//Socket.io handles all sending and recieving of data
io.on('connection', function(socket) {

   socket.on('recieve name', function(rm, qqquota){
     quota = qqquota;
     var checker = true;
     for(i=0;i<roomNames.length;i++){
       if(rm==roomNames[i]){
         checker = false;
       }
     }
     if (checker) {
       socket.join(rm);
       roomNames.push(rm);
       console.log(roomNames);
       socket.emit('name good');
     }
     else{
       console.log("name already taken");
       socket.emit('name_used');
     }
   });

   socket.on('join name', function(rm){
     var checker = false;
     for(i=0;i<roomNames.length;i++){
       if(rm==roomNames[i]){
         checker = true;
       }
     }
     if (checker) {
       socket.join(rm);
       socket.emit('name good');
     }
     else{
       socket.emit('name taken');
     }
   });

   socket.on('leave', function(rm){
       io.in(rm).emit('get out!');
       socket.leave(rm);
       roomNames.push(rm);
   });

   socket.on('student leave', function(rm){
       socket.leave(rm);
   });

   socket.on('chat message', function(msg, rm){
     io.in(rm).emit('chat message', msg);
   });

   socket.on('user', function(obj){ //Recieves user object
     console.log(obj);

    });

  socket.on('vote', function(rm, buttonID, current_votes, question){
    if(current_votes == quota){
      console.log(question);
      var q = question;
      io.in(rm).emit('teacher_recieved', q);
    }
    io.in(rm).emit('vote_recieved', buttonID);
  });
});


http.listen(port, function(){
  console.log('listening on *:' + port);
});

db.close();
});
