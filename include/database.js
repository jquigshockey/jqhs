var mysql = require('mysql');

    var con = mysql.createConnection({
      host: "localhost",
      user: "jqhs",
      password: "cXTfwmxHqiBenQQJ",
      database: "jqhs"
    });
    
    con.connect(function(err) {
      if (err) throw err;
      console.log("Connected!");
    });

