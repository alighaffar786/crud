<?php
class DotEnv
{
    public $path;

     public function __construct($path)
    {
        if(!file_exists($path)) {
            throw new \InvalidArgumentException(sprintf('%s does not exist', $path));
        }
        $this->path = $path;
    }

    public function load() 
    {
        if (!is_readable($this->path)) {
            throw new \RuntimeException(sprintf('%s file is not readable', $this->path));
        }
        
        $lines = file($this->path);
        foreach ($lines as $line) {

            list($name, $value) = explode('=', $line, 2);
            $name = trim($name);
            $value = trim($value);

            if (!array_key_exists($name, $_SERVER) && !array_key_exists($name, $_ENV)) {
                putenv(sprintf('%s=%s', $name, $value));
                $_ENV[$name] = $value;
                $_SERVER[$name] = $value;
            }
        }
    }
}

    

(new DotEnv(__DIR__ . '/.env'))->load();

// echo getenv('username');
     $server_name = getenv('server_name');

     $username = getenv('username');
 
     $password = getenv('password');

     $dbname = getenv('dbname');

     // Create connection
     $conn = mysqli_connect($server_name, $username, $password, $dbname);
 
     // Check connectiondffdfd\
 
     if (!$conn) {
         die("Connection Failed:" . mysqli_connect_error());
     }
?>