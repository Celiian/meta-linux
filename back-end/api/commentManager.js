const   DatabaseManager = require('./databaseManager'),
        config = require('./config.json');

module.exports = class CommentManager
{
    static eventListener(app)
    {
        app.post('/upload/comment', (req, res)  => { this.upload(req, res) });
        app.get('/comment/:videoId', (req, res) => { this.mainComment(req, res) });
    }

    static async upload(req, res)
    {
        console.log('POST - /upload/comment');
        const data = req.body;

        /* DATA FORMAT
        {
            "id":"Id unique du commentaire",
            "author":"id du créateur",
            "content":"contenu du commentaire",
            "video":"id de la video sur laquel le com a ete poster",
            'response":""
        }
        */

        console.log(`comment id : ${data.id}`);
        console.log(`author id ${data.author}`);
        console.log(`content : ${data.content}`);
        console.log(`video id : ${data.video}`);
        console.log(`response : ${data.response}`);

        let query;
        if(data.response == undefined) data.response = null;
        else
        {
            query = `SELECT responseNumber FROM comment WHERE id = ${data.response}`;
            let result = DatabaseManager.executeQuery(query);
            if( result.error ) 
            {
                console.error('QUERY OR SOMETHING HAS BEEN FUCKED UP');
                res.status(500).send();
                return;
            }
            else
            {
                let responseNumber = result.data.responseNumber + 1;
                query = `UPDATE comment SET responseNumber = ${responseNumber} WHERE id = ${data.response}`;
            }
        }

        query = `INSERT INTO comment (id, author, content, response, video) VALUES ('${data.id}', '${data.author}', '${data.content}', '${data.response}', '${data.video}')`;

        let result = await DatabaseManager.executeQuery(query);
        if( result.error ) 
        {
            console.error('QUERY OR SOMETHING HAS BEEN FUCKED UP');
            res.status(500).send();
        }
        else res.status(200).send();
    }

    static async mainComment(req, res)
    {
        console.log('GET - /comment/:videoid');
        const videoId = req.params.videoId;

        let result = await DatabaseManager.executeQuery(`SELECT comment.*, channel.channelName, channel.channelProfilePicture FROM video, comment, commentlist, channel, user WHERE video.id = '${videoId}' AND commentlist.id = video.id AND comment.commentId = commentlist.commentId AND comment.author = user.id AND user.id = channel.channelId;`);
        if( result.error )
        {
            console.error('QUERY OR SOMETHING HAS BEEN FUCKED UP');
            res.status(500);
        }
        else res.status(200).json(result.data);
    }
}