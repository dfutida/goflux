//======================================================//

No Projeto estou usando o PHP 7.3.28-nts-Win32-VC15-x64,
Framework Codeigniter 3.1.11,
Bootstrap 5.1.3,
Font-awesome 4.7.0,
DataTables 1.11.3,
JQuery 3.5.1,
Composer 6.2.0,
MySQL 8.0.23,
MySQL Workbench 8.0,
VSCode 1.55.2

//======================================================//

1-Executar o arquivo .sql que está localizado na raiz do projeto, no MySQL Workbench

schema.sql

//======================================================//

2-Configurar username e password do MySQL localizado em application\config\database.php

'hostname' => 'localhost',

'username' => 'root',

'password' => 'Sua senha do MySQL',

//======================================================//

3-Se quiser, pode alterar a porta do http://localhost:XXXX usado para acessar o sistema (opcional)

Em application\config\constants.php

Por padrão está configurado na porta :4000

defined('BASE_URL') OR define('BASE_URL', 'http://'.$_SERVER['SERVER_NAME'].':4000/');

//======================================================//

4-Se manteve a porta padrão, abra o terminal e execute o comando:

php -S localhost:4000

//======================================================//

5-Abra o navegador e acesse http://localhost:4000

//======================================================//

