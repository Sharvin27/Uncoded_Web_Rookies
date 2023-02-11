const express = require("express");
const path=require("path");

const app=express();
const server=require("http").createServer(app);
app.use(express.static(path.join(_dirname+"/public")));

io.on("connection", function(socket){
    socket.on("newuser", function(username){
        socket.broadcasr.emit("update", username +"joined the conversation");
    });
    socket.on("exituser", function(username){
        socket.broadcasr.emit("update", username +"left the conversation");
    });
    socket.on("chat", function(message){
        socket.broadcasr.emit("chat", message);
    });
});
server.listen(5000);