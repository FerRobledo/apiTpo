Web2 Trabajo Especial parte 3.

Integrantes del grupo:

Wagner Calvo, Juan Sebastian (aguswagnercalvo@hotmail.com)

Robledo, Fermin (fermin4robledo@gmail.com)

Descripcion y funcionamiento de la API:

El trabajo que realizamos es capaz de obtener, agregar, modificar y eliminar las peliculas que se encuentran en la base de datos.

Los endpoints que estan implementados en la API son

**(GET)**

http://localhost/apitpo-main/api/peliculas -> Muestra el listado de todas las peliculas mediante un llamado SQL.

http://localhost/apitpo-main/api/peliculas/:ID -> Muestra la pelicula con el ID enviado a trabes de la URL mediante un llamado SQL. Si la pelicula no existe se informa.

http://localhost/apitpo-main/api/peliculas/:TYPE/:AS -> Muestra todas las peliculas ordenadas alfabeticamente segun el nombre o ordenadas de mayor a menor segun el presupuesto destinado a la misma. Esta funcion solo se ejecuta si el atributo 'TYPE' es "nombre" o "presupuesto" y el atributo 'AS' es "ascendente" o "desdendente", con cualquier otro valor en estos atributos se informa el error. 

**(POST)**

http://localhost/apitpo-main/api/peliculas -> Agrega una nueva pelicula a la base de datos con los datos proporcionados en el body.

La forma en la que se proporcionan los datos es la siguiente:
```json
{
"nombre": "Nueva Pelicula",
"genero": "Thriller,Terror,Crimen,Gore",
"fecha": "2023-09-28",
"premios": "Premios que gano la Pelicula",
"duracion": 215,
"clasificacion": "R",
"presupuesto": 13000000,
"estudio": "Estudio de la pelicula",
"director": 1 //id del director con el que se asocia
}
```
**(DELETE)**

http://localhost/apitpo-main/api/peliculas/:ID -> Elimina la pelicula de la base de datos con el ID enviado a traves de la URL.

**(PUT)**

http://localhost/apitpo-main/api/peliculas/:ID -> Modifica los datos de la pelicula con el ID enviado a traves de la URL, los datos son proporcionados en el body.

La forma en la que se proporcionan los datos es la siguiente:
```json
{
"nombre": "Nueva Pelicula",
"genero": "Thriller,Terror,Crimen,Gore",
"fecha": "2023-09-28",
"premios": "Premios que gano la Pelicula",
"duracion": 215,
"clasificacion": "R",
"presupuesto": 13000000,
"estudio": "Estudio de la pelicula",
"director": 1
}
```
