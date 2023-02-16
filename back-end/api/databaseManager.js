const mysql = require("mysql");

var sqlConn;

module.exports = class DatabaseManager {
  static createConn() {
    sqlConn = mysql.createConnection({
      host: "10.160.33.111",
      user: "codeur",
      password: "coding",
      database: "metatube",
    });
    return sqlConn;
  }

  static async executeQuery(query) {
    return new Promise((resolve) => {
      let result = {
        data: null,
        error: false,
      };
      sqlConn.query(query, function (error, results) {
        if (error) {
          console.error(error);
          result.error = true;
        } else result.data = results;
        resolve(result);
      });
    });
  }

  static connect() {
    sqlConn.connect(function (error) {
      if (error) {
        console.error(error);
        console.log("Connection to the Database : FAILED");
      } else console.log("Connection to the Database : SUCESS");
    });
  }
};
