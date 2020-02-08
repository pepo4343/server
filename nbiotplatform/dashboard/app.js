const express = require("express");
const http = require("http");
const path = require("path");
const app = express();

const port = 80;

app.use("/", (req, res, next) => {
  console.log("im in ");
  next();
});
app.use("/", express.static(path.join(__dirname, "build")));

const server = http.createServer(app);

server.listen(port, () => console.log(`Listening on port ${port}`));
