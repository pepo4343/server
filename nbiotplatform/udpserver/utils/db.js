const mongodb = require("mongodb");

const url = "mongodb://nbiot_mongodb:27017";
var mongo_client = mongodb.MongoClient;

let db;

const mongoConnect = async (db_name, Callback) => {
  try {
    mongo_client.connect(url, (err, client) => {
      if (err) {
        throw err;
      }
      db = client.db(db_name);
      Callback();
    });
  } catch (e) {
    throw e;
  }
};

const getDb = () => {
  if (db) {
    return db;
  }
  throw "Database Not Found";
};

exports.mongoConnect = mongoConnect;
exports.getDb = getDb;
