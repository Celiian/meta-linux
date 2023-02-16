const DatabaseManager = require('./databaseManager');

module.exports = class UserManager
{
    static eventListener(app)
    {
        app.post('upload/user', (req, res) => { this.upload(req, res) });
        app.get('user/liked/:userId', (req, res) => { this.getLikedVideo(req, res) });
    }

    static async getLikedVideo(req, res)
    {
        console.log('GET - /user/liked/');
        
    }

    static async upload(req, res)
    {
        console.log("POST - /upload/user");
        const data = req.body;

        /* DATA FORMAT
        {
            "id":"",
            "username":"",
            "email":"",
            "password":""
        }
        */

        console.log(`User id : ${data.id}`);
        console.log(`Username : ${data.username}`);
        console.log(`email : ${data.email}`);
        console.log(`password : ${data.password}`);

        let result = await DatabaseManager.executeQuery(`INSERT INTO user (id, username, email, password) VALUES ('${data.id}', '${data.username}', '${data.email}', '${data.password}')`);
        if( result.error )
        {
            console.error('QUERY OR SOMETHING HAS BEEN FUCKED UP');
            res.status(500).json([]);
        }
        else res.status(200).json(result.data);
    }
}