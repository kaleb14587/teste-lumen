# teste-pmweb

#### tarefa1
 a tarefa 1 como solicitado é somente um sql que se encontra na pasta "tarefa1"
 
#### tarefa2 e tarefa 3 
 a tarefa 2 se encontra na pasta tarefa2-tarefa3 que tomei a liberdade de juntar as 2 em um arquivo
 
 ##obs
 
 para utilizar a tarefa 3 é necessario rodar o comando no terminal:

        composer update
    
Importar o banco de dados, configurar o arquivo "tarefa2-tarefa3/config.php",
alterando as variaveis para as do banco onde esta a importado:
    
    define("MYSQL_DRIVER","mysql");
    define("MYSQL_HOSTNAME","127.0.0.1");
    define("MYSQL_DATABASE","teste-pmweb");
    define("MYSQL_USERNAME","root");
    define("MYSQL_PASSWORD","");


e para realizar uma consulta a api, é so realizar 
uma chamada get no host do server com as
 variaveis `start_date` e `end_date`:

    Ex: http://localhost/?start_date=2015-01-01&end_date=2015-01-06