const DatabaseManager = require("./databaseManager");

module.exports = class channelManager {
  static eventListener(app) {
    app.post("/upload/channel", (req, res) => {
      this.upload(req, res);
    });
    app.post("/channel/subscribe", (req, res) => {
      this.subscribing(req, res);
    });
    app.get("/channel/:id", (req, res) => {
      this.mainChannel(req, res);
    });
    app.get("/channel/subscriber/:id", (req, res) => {
      this.getSubscriber(req, res);
    });
    app.get("/videos/:id", (req, res) => {
      this.getAllVideosOfaChannel(req, res);
    });
  }

  static async getAllVideosOfaChannel(req, res) {
    console.log("GET - /channel/videos/");
    let channelId = req.params.id;

    let query = `SELECT video.* FROM video WHERE video.creator = '${channelId}'`;
    let result = await DatabaseManager.executeQuery(query);
    if (result.error) {
      console.error("QUERY OR SOMETHING HAS BEEN FUCKED UP");
      res.status(500).json([]);
    } else res.status(200).json(result.data);
  }

  static async upload(req, res) {
    console.log("POST - /upload/channel");
    const data = req.body;

    /* DATA FORMAT
        {
            "id":"",
            "channelName":"",
            "channelProfilePicture":""
        }
        */

    console.log(`User id : ${data.id}`);
    console.log(`channelName : ${data.channelName}`);
    // console.log(`channelProfilePicture : ${data.channelProfilePicture}`);

    let result = await DatabaseManager.executeQuery(
      `INSERT INTO channel (id, channelName, channelProfilePicture) VALUES ('${data.id}', '${data.channelName}', '${data.channelProfilePicture}')`
    );
    if (result.error) {
      console.error("QUERY OR SOMETHING HAS BEEN FUCKED UP");
      res.status(500).json([]);
    } else res.status(200).json(result.data);
  }

  static async mainChannel(req, res) {
    console.log("GET - /channel");
    console.log(`   Searching for the id "${req.params.id}"`);
    let result = await DatabaseManager.executeQuery(`SELECT * FROM channel WHERE id = '${req.params.id}'`);
    if (result.error) {
      console.error("QUERY OR SOMETHING HAS BEEN FUCKED UP");
      res.status(500).json([]);
    } else res.status(200).json(result.data);
  }

  static async getSubscriber(req, res) {
    console.log("GET - /channel/subscriber/:id");
    let userId = req.params.id;

    let query = `SELECT channel.* FROM channel, channellist WHERE channellist.id = '${userId}' AND channellist.channelId = channel.id`;
    let result = await DatabaseManager.executeQuery(query);
    if (result.error) {
      console.error("QUERY OR SOMETHING HAS BEEN FUCKED UP");
      res.status(500).send();
    } else res.status(200).json(result.data);
  }

  static async subscribing(req, res) {
    console.log("POST - /channel/subscriber/:id");
    const data = req.body;

    /* DATA FORMAT
        {
            "channel":"",
            "subscriber":""
        }
        */

    let query = "";
  }
};
