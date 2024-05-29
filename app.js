const express = require('express');
const axios = require('axios');
const app = express();
const port = 3000;

app.use(express.json());

app.post('/endpoint', async (req, res) => {
    const data = req.body;
    console.log(data);
    const total = data.prix * data.qte;
    console.log('Total =', total);
    const response = await axios.post('http://127.0.0.1:8000/endpoint2', { data, total }, {
        headers: {
            'Content-Type': 'application/json',
        },
    });
    console.log(response.data)
    res.send(response.data);
});

app.listen(port, () => {
    console.log(`Serveur Node.js en écoute sur le port ${port}`);
});
