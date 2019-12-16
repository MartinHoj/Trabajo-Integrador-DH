<?php 

function pre ($algo){
    "<pre>";
    var_dump($algo);
    "</pre>";
    "<br>";
};
   

function dd($algo){
pre($algo);
exit;

}

?>
