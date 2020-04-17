const dgram = require("dgram");
const serverudp = dgram.createSocket("udp4");
const path = require("path");
const express = require("express");
const http = require("http");

const port = 80;

const mongoConnect = require("./utils/db").mongoConnect;
const db = require("./utils/db").getDb;

const app = express();

const serversocket = http.createServer(app);

const io = require("./socket").init(serversocket);

mongoConnect("nbiot", (e) => {
  console.log(e);
  console.log(db());

  serverudp.bind(41234);
});

/////////////////////////////////////////////
//////////////// socketio  //////////////////
/////////////////////////////////////////////

app.use("/nbiot", express.static(path.join(__dirname, "nbiotbuild")));

var numClient = 0;

io.on("connection", (socket) => {
  numClient++;
  io.emit("numclient", { numClient });
  console.log("Client Connected :", numClient);
  socket.on("disconnect", () => {
    numClient--;
    console.log("Client Disconnected : ", numClient);
  });
});

serversocket.listen(port, () => console.log(`Listening on port ${port}`));

/////////////////////////////////////////////
////////////// UDP callbacks ////////////////
/////////////////////////////////////////////
serverudp.on("error", (err) => {
  console.log(`server error:\n${err.stack}`);
  server.close();
});

serverudp.on("message", (msg, rinfo) => {
  console.log(`server got: ${msg} from ${rinfo.address}:${rinfo.port}`);
  io.emit("message", { msg: msg.toString() });

  // db()
  //   .collection("raw_data")
  //   .insertOne({ test: "test" });
});

serverudp.on("listening", () => {
  const address = serverudp.address();
  console.log(`server listening ${address.address}:${address.port}`);
});
