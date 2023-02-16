const DatabaseManager = require("./databaseManager");

module.exports = class timelineManager {
  static eventListener(app) {
    app.get("/timeline/video/:number", (req, res) => {
      this.sendVideos(req, res);
    });
  }

  static async sendVideos(req, res) {
    console.log("GET - /timeline/video/");
    const number = req.params.number;
    console.log(`Returning ${number} videos ...`);
    let query = `SELECT channel.channelProfilePicture, channel.channelName, channel.id, video.* FROM video, channel WHERE channel.id = video.creator ORDER BY RAND () LIMIT ${number};`;

    let result = await DatabaseManager.executeQuery(query);
    if (result.error) {
      console.error("QUERY OR SOMETHING HAS BEEN FUCKED UP");
      res.status(500).send();
    } else res.status(200).json(result.data);
  }
};
