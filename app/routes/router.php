<?php
$router->add(
    "/", [ "controller" => "index", "action" => "index" ]
);
$router->add(
    "/acessar", [ "controller" => "index", "action" => "acessar" ]
);
$router->add(
    "/nova-senha", [ "controller" => "index", "action" => "nova_senha" ]
);
$router->add(
    "/quem-somos", [ "controller" => "index", "action" => "quem_somos" ]
);
$router->add(
    "/faq", [ "controller" => "index", "action" => "faq" ]
);
$router->add(
    "/contato", [ "controller" => "index", "action" => "contato" ]
);


// Set 404 page
$router->notFound(
    [ "controller" => "index", "action" => "route404" ]
);

return $router;