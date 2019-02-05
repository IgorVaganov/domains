<?
class my_router {

    public $routes = array();

    public function route($pattern, $callback) {
        $this->routes[$pattern] = $callback;
    }

    public function execute($uri) {
        foreach ($this->routes as $pattern => $callback) {
            if (preg_match($pattern, $uri, $params) === 1) {
                array_shift($params);
                print_r($params);
                return call_user_func_array($callback, array_values($params));
            }
        }
    }

}
$router=new my_router();
$router->route('/^\/blog\/(\w+)\/(\d+)\/?$/', function($category, $id){
    print "category={$category}, id={$id}";
});

//$router->execute('/blog/45');

//print_r($router->routes);

?>