const dgram = require("dgram");
const serverudp = dgram.createSocket("udp4");

const express = require("express");
const http = require("http");

const port = process.env.PORT || 4001;

const app = express();
app.use((req, res, next) => {
  res.send("hello");
});

const serversocket = http.createServer(app);
const io = require("./socket").init(serversocket);
var numClient = 0;
io.on("connection", socket => {
  numClient++;
  io.emit("numclient", { numClient });
  console.log("Client Connected :", numClient);
  socket.on("disconnect", () => {
    numClient--;
    console.log("Client Disconnected : ", numClient);
  });
});
serversocket.listen(port, () => console.log(`Listening on port ${port}`));
serverudp.on("error", err => {
  console.log(`server error:\n${err.stack}`);
  server.close();
});

serverudp.on("message", (msg, rinfo) => {
  console.log(`server got: ${msg} from ${rinfo.address}:${rinfo.port}`);
  io.emit("message", { msg: msg.toString() });
});

serverudp.on("listening", () => {
  const address = serverudp.address();
  console.log(`server listening ${address.address}:${address.port}`);
});

serverudp.bind(41234);
