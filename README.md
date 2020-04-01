# Trabajo-Integrador-DH
Trabajo Integrador de Curso de Web Full Stack de Digital House

El BackUpFinal de la BBDD con INSERTS esta en proyecto-laravel con ese nombre. Este BackUp no esta probado pero se hizo con phpmyadmin luego de las ultimas modificaciones de BBDD. En caso de que esto no funcione, lo que si está probado es un método más bestia y complicado que es el siguiente:


El proyecto de Laravel hay que bajarlo y hacer php artisan migrate:rollback y despues php artisan migrate. Así la BBDD está completa pero sin los INSERTS. Esto se debe a que el ultimo BackUp que se pudo hacer fue sin todas las columnas.
En caso de querer/necesitar los INSERTS se encuentran en el archivo BackUpConInserts ubicado dentro de la carpeta de Laravel, lo INSERTS se deben hacer a mano debido a que no pudimos hacer un nuevo BackUp con la BBDD terminada por un problema con WorkBench
