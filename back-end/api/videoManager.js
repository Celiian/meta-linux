const DatabaseManager = require("./databaseManager"),
  fs = require("fs"),
  config = require("./config.json");

module.exports = class VideoManager {
  static eventListener(app) {
    app.post("/upload/video", (req, res) => {
      this.upload(req, res);
    });
    app.post("/search", (req, res) => {
      this.search(req, res);
    });
    app.post("/video/view", (req, res) => {
      this.addView(req, res);
    });
    app.post("/video/like", (req, res) => {
      this.addLike(req, res);
    });
    app.post("/like/:id", (req, res) => {
      this.likeVideo(req, res);
    });
    app.get("/video/topView", (req, res) => {
      this.topView(req, res);
    });
    app.get("/watch/:id", (req, res) => {
      this.streaming(req, res);
    });
    app.get("/video/:id", (req, res) => {
      this.mainVideo(req, res);
    });
  }

  static async topView(req, res) {
    console.log("GET - /video/topView");

    let query = "SELECT * FROM video ORDER BY viewNumber DESC LIMIT 20;";
    let result = await DatabaseManager.executeQuery(query);
    if (result.error) {
      console.error("QUERY OR SOMETHING HAS BEEN FUCKED UP");
      res.status(500).send();
    } else res.status(200).json(result.data);
  }

  static async addLike(req, res) {
    console.log("POST - /video/like");
    const data = req.body;
    console.log(`    target video : ${data.video}`);

    let query = `UPDATE video SET likeNumber = likeNumber + 1 WERE id = '${data.video}'; INSERT INTO likedVideo VALUES ('${data.id}', '${data.video}');`;
    let result = await DatabaseManager(query);
    if (result.error) {
      console.error("QUERY OR SOMETHING HAS BEEN FUCKED UP");
      res.status(500);
    } else res.status(200).send();
  }

  static async addView(req, res) {
    console.log("GET - /video/view/");
    const data = req.body;
    console.log(`    target video : ${data.id}`);

    let query = `UPDATE video SET viewNumber = viewNumber + 1 WHERE id = '${data.id}'; `;
    let result = await DatabaseManager.executeQuery(query);
    if (result.error) {
      console.error("QUERY OR SOMETHING HAS BEEN FUCKED UP");
      res.status(500);
    } else res.status(200).send();
  }

  static async upload(req, res) {
    console.log("POST - /upload/video");
    const data = req.body;

    /* DATA FORMAT
        {
            "id":"",
            "creator":"",
            "title":"",
            "description":"",
            "privacy":""
        }
        */

    console.log(`Video id : ${data.id}`);
    console.log(`Creator id : ${data.creator}`);
    console.log(`Title : ${data.title}`);
    console.log(`Description : ${data.description}`);
    console.log(`Privacy : ${data.privacy}`);

    let query;
    if (data.thumbnail == "") {
      query = `INSERT INTO video (id, creator, title, description, privacy) VALUES ('${data.id}', '${data.creator}', '${data.title}', '${data.description}', '${data.privacy}')`;
    } else {
      query = `INSERT INTO video (id, creator, title, thumbnail, description, privacy) VALUES ('${data.id}', '${data.creator}', '${data.title}', '${data.thumbnail}', '${data.description}', '${data.privacy}')`;
    }

    let result = await DatabaseManager.executeQuery(query);
    if (result.error) {
      console.error("QUERY OR SOMETHING HAS BEEN FUCKED UP");
      res.status(500).send();
    } else {
      console.log(`Video id ${data.id} uploaded !`);
      res.status(200).send();
    }
  }

  static async search(req, res) {
    console.log("POST - /search");
    const data = req.body;
    console.log(`    Request : ${data.searchRequest}`);

    if (data.searchRequest == "") {
      res.status(200).json([]);
      return;
    }

    let json = {
      channels: [],
      videos: [],
    };

    let result = await DatabaseManager.executeQuery(
      `SELECT * FROM channel WHERE channelName LIKE '%${data.searchRequest}%'`
    );
    if (result.error) {
      console.error("QUERY OR SOMETHING HAS BEEN FUCKED UP");
      res.status(500).send();
      return;
    }

    json.channels = result;

    result = await DatabaseManager.executeQuery(
      `SELECT DISTINCT * FROM video WHERE title LIKE '%${data.searchRequest}%' OR video.description LIKE '%${data.searchRequest}'`
    );
    if (result.error) {
      console.error("QUERY OR SOMETHING HAS BEEN FUCKED UP");
      res.status(500).send();
      return;
    }

    json.videos = result;

    res.status(200).json(json);
  }

  static async mainVideo(req, res) {
    console.log("GET - /video/");
    let data = req.params;
    console.log(`  id : ${data.id}`);
    let query = `SELECT video.*, channel.channelName, channel.channelProfilePicture, channel.subscriberNumber FROM video, channel WHERE video.id = '${data.id}' AND channel.id = video.creator`;

    let result = await DatabaseManager.executeQuery(query);
    if (result.error) {
      console.error("QUERY OR SOMETHING HAS BEEN FUCKED UP");
      res.status(500).json([]);
    } else res.status(200).json(result.data);
  }

  static async streaming(req, res) {
    const range = req.headers.range;
    if (!range) {
      console.error("C'est la merde...");
      res.status(500).send();
      return;
    }
    const videoId = req.params.id,
      videoPath = config.storageLocation + videoId + ".mp4",
      videoSize = fs.statSync(videoPath).size,
      packet_size = 1024 * 10 ** 6, // 1 Mo
      start = Number(range.replace(/\D/g, "")),
      end = Math.min(start + packet_size, videoSize - 1),
      contentLength = end - start + 1,
      header = {
        "Content-Range": `bytes ${start}-${end}/${videoSize}`,
        "Accept-Ranges": "bytes",
        "Content-Length": contentLength,
        "Content-Type": "video/mp4",
      };
    res.writeHead(206, header);
    const videoStream = fs.createReadStream(videoPath, { start, end });
    videoStream.pipe(res);
  }

  static async likeVideo(req, res) {}
};
