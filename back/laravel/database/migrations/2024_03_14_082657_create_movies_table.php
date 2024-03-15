<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id('id_movie')->autoIncrement();
            $table->string('image');
            $table->string('title');
            $table->string('director');
            $table->string('actors');
            $table->string('sinopsis');
            $table->string('duration');
            $table->date('premiere');
            $table->string('genre');
            $table->string('classification');
        });

        DB::table('movies')->insert([
            'image' => 'https://m.media-amazon.com/images/M/MV5BMDU2ZWJlMjktMTRhMy00ZTA5LWEzNDgtYmNmZTEwZTViZWJkXkEyXkFqcGdeQXVyNDQ2OTk4MzI@._V1_SX300.jpg',
            'title' => 'Toy Story',
            'director' => 'John Lasseter',
            'actors' => json_encode(["Tom Hanks", "Tim Allen", "Don Rickles"]),
            'sinopsis' => 'Un juguete cowboy celoso intenta sabotear la relación entre un vaquero y un astronauta del espacio exterior.',
            'duration' => '81 minutos',
            'premiere' => '1995-11-22',
            'genre' => 'Animación, Aventura, Comedia',
            'classification' => 'Apta para todos'
        ]);
        
        DB::table('movies')->insert([
            'image' => 'https://m.media-amazon.com/images/M/MV5BZmYxZjg3OWEtNzg5Yi00M2YzLWI1YzYtYTQ0NTgwNzhjN2E1XkEyXkFqcGdeQXVyNDUyOTg3Njg@._V1_SX300.jpg',
            'title' => 'Finding Nemo',
            'director' => 'Andrew Stanton, Lee Unkrich',
            'actors' => json_encode(["Albert Brooks", "Ellen DeGeneres", "Alexander Gould"]),
            'sinopsis' => 'Un pez payaso padre busca a su hijo perdido con la ayuda de un olvidadizo pez cirujano azul.',
            'duration' => '100 minutos',
            'premiere' => '2003-05-30',
            'genre' => 'Animación, Aventura, Comedia',
            'classification' => 'Apta para todos'
        ]);
        
        DB::table('movies')->insert([
            'image' => 'https://m.media-amazon.com/images/M/MV5BYTYxNGMyZTYtMjE3MS00MzNjLWFjNmYtMDk3N2FmM2JiM2M1XkEyXkFqcGdeQXVyNjY5NDU4NzI@._V1_SX300.jpg',
            'title' => 'The Lion King',
            'director' => 'Roger Allers, Rob Minkoff',
            'actors' => json_encode(["Matthew Broderick", "Jeremy Irons", "James Earl Jones"]),
            'sinopsis' => 'Un joven león príncipe huye de su reino solo para aprender el verdadero significado de la responsabilidad y la valentía.',
            'duration' => '88 minutos',
            'premiere' => '1994-06-24',
            'genre' => 'Animación, Aventura, Drama',
            'classification' => 'Apta para todos'
        ]);
        
        DB::table('movies')->insert([
            'image' => 'https://m.media-amazon.com/images/M/MV5BMTY1NTI0ODUyOF5BMl5BanBnXkFtZTgwNTEyNjQ0MDE@._V1_SX300.jpg',
            'title' => 'Monsters, Inc.',
            'director' => 'Pete Docter, David Silverman, Lee Unkrich',
            'actors' => json_encode(["John Goodman", "Billy Crystal", "Mary Gibbs"]),
            'sinopsis' => 'En el mundo de los monstruos, los sustos son generados por el grito de los niños humanos. Pero una niña desafía la norma.',
            'duration' => '92 minutos',
            'premiere' => '2001-11-02',
            'genre' => 'Animación, Aventura, Comedia',
            'classification' => 'Apta para todos'
        ]);
        
        DB::table('movies')->insert([
            'image' => 'https://m.media-amazon.com/images/M/MV5BYjBkM2RjMzItM2M3Ni00N2NjLWE3NzMtMGY4MzE4MDAzMTRiXkEyXkFqcGdeQXVyNDUzOTQ5MjY@._V1_SX300.jpg',
            'title' => 'Up',
            'director' => 'Pete Docter, Bob Peterson',
            'actors' => json_encode(["Edward Asner", "Jordan Nagai", "John Ratzenberger"]),
            'sinopsis' => 'Un viudo vuela en su casa con miles de globos, pero sin querer se lleva a un niño explorador con él.',
            'duration' => '96 minutos',
            'premiere' => '2009-05-29',
            'genre' => 'Animación, Aventura, Comedia',
            'classification' => 'Apta para todos'
        ]);
        
        DB::table('movies')->insert([
            'image' => 'https://m.media-amazon.com/images/M/MV5BYjQ5NjM0Y2YtNjZkNC00ZDhkLWJjMWItN2QyNzFkMDE3ZjAxXkEyXkFqcGdeQXVyODIxMzk5NjA@._V1_SX300.jpg',
            'title' => 'Coco',
            'director' => 'Lee Unkrich, Adrian Molina',
            'actors' => json_encode(["Anthony Gonzalez", "Gael García Bernal", "Benjamin Bratt"]),
            'sinopsis' => 'Un niño se embarca en un viaje por la Tierra de los Muertos para descubrir su patrimonio familiar.',
            'duration' => '105 minutos',
            'premiere' => '2017-10-27',
            'genre' => 'Animación, Aventura, Comedia',
            'classification' => 'Apta para todos'
        ]);
        
        DB::table('movies')->insert([
            'image' => 'https://m.media-amazon.com/images/M/MV5BMTQ1MjQwMTE5OF5BMl5BanBnXkFtZTgwNjk3MTcyMDE@._V1_SX300.jpg',
            'title' => 'Frozen',
            'director' => 'Chris Buck, Jennifer Lee',
            'actors' => json_encode(["Kristen Bell", "Idina Menzel", "Jonathan Groff"]),
            'sinopsis' => 'Una princesa con el poder de congelar las cosas se embarca en un viaje para encontrar a su hermana, cuyo poder ha atrapado al reino en un invierno eterno.',
            'duration' => '102 minutos',
            'premiere' => '2013-11-27',
            'genre' => 'Animación, Aventura, Comedia',
            'classification' => 'Apta para todos'
        ]);
        
        DB::table('movies')->insert([
            'image' => 'https://m.media-amazon.com/images/M/MV5BOTgxMDQwMDk0OF5BMl5BanBnXkFtZTgwNjU5OTg2NDE@._V1_SX300.jpg',
            'title' => 'Inside Out',
            'director' => 'Pete Docter, Ronaldo Del Carmen',
            'actors' => json_encode(["Amy Poehler", "Phyllis Smith", "Richard Kind"]),
            'sinopsis' => 'Las emociones de una niña se enfrentan cuando ella se muda a una nueva ciudad, lejos de su hogar.',
            'duration' => '95 minutos',
            'premiere' => '2015-06-19',
            'genre' => 'Animación, Aventura, Comedia',
            'classification' => 'Apta para todos'
        ]);
        
        DB::table('movies')->insert([
            'image' => 'https://m.media-amazon.com/images/M/MV5BOTMyMjEyNzIzMV5BMl5BanBnXkFtZTgwNzIyNjU0NzE@._V1_SX300.jpg',
            'title' => 'Zootopia',
            'director' => 'Byron Howard, Rich Moore, Jared Bush',
            'actors' => json_encode(["Ginnifer Goodwin", "Jason Bateman", "Idris Elba"]),
            'sinopsis' => 'Una conejita policía y un estafador zorro deben trabajar juntos para resolver un misterio en la ciudad de Zootopia.',
            'duration' => '108 minutos',
            'premiere' => '2016-03-04',
            'genre' => 'Animación, Aventura, Comedia',
            'classification' => 'Apta para todos'
        ]);
        
        DB::table('movies')->insert([
            'image' => 'https://m.media-amazon.com/images/M/MV5BMjI4MzU5NTExNF5BMl5BanBnXkFtZTgwNzY1MTEwMDI@._V1_SX300.jpg',
            'title' => 'Moana',
            'director' => 'Ron Clements, John Musker',
            'actors' => json_encode(["Auli'i Cravalho", "Dwayne Johnson", "Rachel House"]),
            'sinopsis' => 'Una joven heroína polinesia navega por el océano para salvar a su pueblo y descubrir su verdadera identidad.',
            'duration' => '107 minutos',
            'premiere' => '2016-11-14',
            'genre' => 'Animación, Aventura, Comedia',
            'classification' => 'Apta para todos'
        ]);
        
        DB::table('movies')->insert([
            'image' => 'https://m.media-amazon.com/images/M/MV5BMTYzMDM4NzkxOV5BMl5BanBnXkFtZTgwNzM1Mzg2NzM@._V1_SX300.jpg',
            'title' => 'Toy Story 4',
            'director' => 'Josh Cooley',
            'actors' => json_encode(["Tom Hanks", "Tim Allen", "Annie Potts"]),
            'sinopsis' => 'Woody, Buzz Lightyear y el resto de la pandilla se embarcan en un viaje por carretera con Bonnie y un nuevo juguete llamado Forky.',
            'duration' => '100 minutos',
            'premiere' => '2019-06-21',
            'genre' => 'Animación, Aventura, Comedia',
            'classification' => 'Apta para todos'
        ]);
        
        DB::table('movies')->insert([
            'image' => 'https://m.media-amazon.com/images/M/MV5BMzgwODk3ODA1NF5BMl5BanBnXkFtZTcwNjU3NjQ0Nw@@._V1_SX300.jpg',
            'title' => 'Brave',
            'director' => 'Mark Andrews, Brenda Chapman, Steve Purcell',
            'actors' => json_encode(["Kelly Macdonald", "Billy Connolly", "Emma Thompson"]),
            'sinopsis' => 'Una princesa escocesa desafía una tradición ancestral y desata el caos en su reino.',
            'duration' => '93 minutos',
            'premiere' => '2012-06-10',
            'genre' => 'Animación, Aventura, Comedia',
            'classification' => 'Apta para todos'
        ]);
        
        DB::table('movies')->insert([
            'image' => 'https://m.media-amazon.com/images/M/MV5BYWVmYTcwZDYtYzNmNC00M2U2LWFjZWYtOWRlY2NiNjc5ZjdiXkEyXkFqcGdeQXVyNjY5Mjg5MjA@._V1_SX300.jpg',
            'title' => 'Finding Dory',
            'director' => 'Andrew Stanton, Angus MacLane',
            'actors' => json_encode(["Ellen DeGeneres", "Albert Brooks", "Ed O'Neill"]),
            'sinopsis' => 'Dory, el pez cirujano olvidadizo, se embarca en un viaje para encontrar a su familia perdida.',
            'duration' => '97 minutos',
            'premiere' => '2016-06-17',
            'genre' => 'Animación, Aventura, Comedia',
            'classification' => 'Apta para todos'
        ]);
        
        DB::table('movies')->insert([
            'image' => 'https://m.media-amazon.com/images/M/MV5BMDliOTIzNmUtOTllOC00NDU3LWFiNjYtMGM0NDc1YTMxNjYxXkEyXkFqcGdeQXVyNTM3NzExMDQ@._V1_SX300.jpg',
            'title' => 'Big Hero 6',
            'director' => 'Don Hall, Chris Williams',
            'actors' => json_encode(["Ryan Potter", "Scott Adsit", "Jamie Chung"]),
            'sinopsis' => 'Un joven prodigio y su compañero robot luchan contra el crimen en San Fransokyo.',
            'duration' => '102 minutos',
            'premiere' => '2014-11-07',
            'genre' => 'Animación, Aventura, Comedia',
            'classification' => 'Apta para todos'
        ]);
        
        DB::table('movies')->insert([
            'image' => 'https://m.media-amazon.com/images/M/MV5BMTMzODU0NTkxMF5BMl5BanBnXkFtZTcwMjQ4MzMzMw@@._V1_SX300.jpg',
            'title' => 'Ratatouille',
            'director' => 'Brad Bird, Jan Pinkava',
            'actors' => json_encode(["Patton Oswalt", "Ian Holm", "Lou Romano"]),
            'sinopsis' => 'Una rata con sueños culinarios se convierte en el chef de un prestigioso restaurante francés.',
            'duration' => '111 minutos',
            'premiere' => '2007-06-22',
            'genre' => 'Animación, Aventura, Comedia',
            'classification' => 'Apta para todos'
        ]);
        
        DB::table('movies')->insert([
            'image' => 'https://m.media-amazon.com/images/M/MV5BMjExMTg5OTU0NF5BMl5BanBnXkFtZTcwMjMxMzMzMw@@._V1_SX300.jpg',
            'title' => 'WALL-E',
            'director' => 'Andrew Stanton',
            'actors' => json_encode(["Ben Burtt", "Elissa Knight", "Jeff Garlin"]),
            'sinopsis' => 'En un futuro distópico, un pequeño robot llamado WALL-E se embarca en un viaje por el espacio en busca de aventura.',
            'duration' => '98 minutos',
            'premiere' => '2008-06-27',
            'genre' => 'Animación, Aventura, Comedia',
            'classification' => 'Apta para todos'
        ]);
        
        DB::table('movies')->insert([
            'image' => 'https://m.media-amazon.com/images/M/MV5BMTUyODgwMDU3M15BMl5BanBnXkFtZTcwOTM4MjcxOQ@@._V1_SX300.jpg',
            'title' => 'Monsters University',
            'director' => 'Dan Scanlon',
            'actors' => json_encode(["Billy Crystal", "John Goodman", "Steve Buscemi"]),
            'sinopsis' => 'Mike y Sulley se conocen en la universidad y comienzan una amistad que durará toda la vida.',
            'duration' => '104 minutos',
            'premiere' => '2013-06-21',
            'genre' => 'Animación, Aventura, Comedia',
            'classification' => 'Apta para todos'
        ]);
        
        DB::table('movies')->insert([
            'image' => 'https://m.media-amazon.com/images/M/MV5BZTQyNTU0MDktYTFkYi00ZjNhLWE2ODctMzBkM2U1ZTk3YTMzXkEyXkFqcGdeQXVyNTI4MzE4MDU@._V1_SX300.jpg',
            'title' => 'Luca',
            'director' => 'Enrico Casarosa',
            'actors' => json_encode(["Jacob Tremblay", "Jack Dylan Grazer", "Emma Berman"]),
            'sinopsis' => 'Un joven pastor marino humanoide experimenta un verano inolvidable en la Riviera italiana.',
            'duration' => '95 minutos',
            'premiere' => '2021-06-18',
            'genre' => 'Animación, Aventura, Comedia',
            'classification' => 'Apta para todos'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
