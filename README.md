## Como fazer a instalação.

Instalar o XAMPP na ultima vesão(8.2.12), instalar o laravel na maquina `composer global require laravel/installer` e instalar o Composer na ultima versão(2.7.7).

## Como Rodar e utilizar a aplicação.

Iniciar um servidor Apache no XAMPP. 
Colocar o arquivo da aplicação na pasta .../xamp/htdocs/.
Rodar o `composer install`.
Realizar o comando `php artisan migrate` para sicronizar com um banco sqlite.
Realizar o comando `php artisan serve` para rodar a aplicação.


