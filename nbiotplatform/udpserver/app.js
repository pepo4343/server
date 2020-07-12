const dgram = require("dgram");
const serverudp = dgram.createSocket("udp4");
const path = require("path");
const express = require("express");
const http = require("http");
const createCsvWriter = require('csv-writer').createObjectCsvWriter;

const csvWriterNbiot = createCsvWriter({
  path: './csv/nbiot.csv',
  append:true,
  header: [
    {id: 'PM1_0', title: 'PM1.0'},
    {id: 'PM2_5', title: 'PM2.5'},
    {id: 'PM10_0', title: 'PM10.0'},
    {id: 'Lat', title: 'Latitude'},
    {id: 'Lng', title: 'Longitude'},
    {id: 'timestamp', title: 'Timestamp'},
  ]
});


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
app.use("/emtc", express.static(path.join(__dirname, "emtcbuild")));

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

serverudp.on("message", async (msg, rinfo) =>  {
  console.log(`server got: ${msg} from123 ${rinfo.address}:${rinfo.port}`);
  const json = JSON.parse(msg.toString());

  console.log(json);
  if(json.type == "PM"){
    if(json.dev_id==="0001"){ //nbiot
      await csvWriterNbiot.writeRecords([
        {
          "PM1_0":json.PM1_0.toString(),
          "PM2_5":json.PM2_5.toString(),
          "PM10_0":json.PM10_0.toString(),
          "Lat":json.Lat.toString(),
          "Lng":json.Lng.toString(),
          "timestamp":new Date(Date.now()).toISOString(),
        }
      ])
    }else{

    }
  }
  io.emit("message", { msg: msg.toString() });

  
  
  // db()
  //   .collection("raw_data")
  //   .insertOne({ test: "test" });
});

serverudp.on("listening", () => {
  const address = serverudp.address();
  console.log(`server listening ${address.address}:${address.port}`);
});
