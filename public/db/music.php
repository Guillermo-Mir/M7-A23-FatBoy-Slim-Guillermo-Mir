<?php
$db = new SQLite3('music.db');

$db->exec('
    CREATE TABLE IF NOT EXISTS music (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nom TEXT NOT NULL,
        estilo TEXT NOT NULL,
        descripcion TEXT NOT NULL,
        imagen TEXT NOT NULL
    );
');


$db->exec("INSERT INTO music (nom, estilo, descripcion, imagen) VALUES ('Snoop Dogg', 'Rap / Hip-Hop', 'Snoop Dogg es un rapero, productor y actor estadounidense conocido por su estilo relajado y su carisma innato. Su música ha definido generaciones y su presencia escénica es inconfundible.', 'https://m.media-amazon.com/images/M/MV5BMjE2OTUwNTk4NF5BMl5BanBnXkFtZTcwMjMwOTk0NA@@._V1_FMjpg_UX1000_.jpg');");
$db->exec("INSERT INTO music (nom, estilo, descripcion, imagen) VALUES ('Eminem', 'Rap / Hip-Hop', 'Eminem, también conocido como Slim Shady, revolucionó el mundo del rap con su lírica intensa, ritmos rápidos y una actitud desafiante. Su carrera está llena de éxitos internacionales y premios prestigiosos.', 'https://static.wikia.nocookie.net/doblaje/images/3/32/Eminem2020.jpg/revision/latest?cb=20240912064307&path-prefix=es');");
$db->exec("INSERT INTO music (nom, estilo, descripcion, imagen) VALUES ('Kendrick Lamar', 'Rap / Hip-Hop', 'Kendrick Lamar es considerado uno de los mayores innovadores del rap moderno. Sus letras abordan temas sociales y políticos con profundidad lírica, ganando incluso el premio Pulitzer por su trabajo en DAMN.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/32/Pulitzer2018-portraits-kendrick-lamar.jpg/960px-Pulitzer2018-portraits-kendrick-lamar.jpg');");
$db->exec("INSERT INTO music (nom, estilo, descripcion, imagen) VALUES ('Post Malone', 'Rap / Pop / Rock', 'Post Malone combina géneros como el rap, el pop y el rock para crear un sonido único. Su personalidad desenfadada y su talento musical le han valido fama internacional y un estilo inconfundible.', 'https://upload.wikimedia.org/wikipedia/commons/1/12/Post_Malone_at_the_2019_American_Music_Awards.png');");

$db->close();
?>
