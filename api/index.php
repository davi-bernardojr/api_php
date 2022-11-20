<?php

include_once "./config/data_access.php";

//recebe os dados enviados via requisição
$json = file_get_contents('php://input');
$obj = (isset($json) ? json_decode($json) : null);

//url base para acesso da api ao modificar ja altera todos os endpoints
$url_base = "/api_backend/api/";

// um array com as urls aceitas e os comandos a serem executadas em cada urls
$urls = [
    "GET" => [
        $url_base . "itens" => [
            'print_r(json_encode(sel_itens()));', 
            'print_r(json_encode(sel_itens_id($obj->id)));'
        ],
        $url_base . "itens/familia" => 'print_r(json_encode(sel_itens_familia($obj->id)));',
        $url_base . "familia" => [
            'print_r(json_encode(sel_familia()));',
            'print_r(json_encode(sel_familia_id($obj->id)));'
        ]
    ],
    "POST" => [ 
        $url_base . "itens" => 'print_r(json_encode(inserir_item($obj->descricao, $obj->saldo, $obj->familia)));',
        $url_base . "familia" => 'print_r(json_encode(inserir_familia($obj->descricao)));'
    ], 
    "PUT" => [
        $url_base . "itens" => 'print_r(json_encode(alt_item($obj->id, $obj->descricao, $obj->saldo, $obj->fam_id)));',
        $url_base . "familia" => 'print_r(json_encode(alt_familia ($obj->id, $obj->descricao)));'
    ],
    "DELETE" => [
        $url_base . "itens" => "",
        $url_base . "familia" => ""
    ]
];

// função usada no método GET para itens e familia
function ret_Api($obj, $urls){
    if (!($obj == null) && isset($obj->id)){
        eval($urls[$_SERVER['REQUEST_METHOD']][$_SERVER['REDIRECT_URL']][1]);
    } else {
        eval($urls[$_SERVER['REQUEST_METHOD']][$_SERVER['REDIRECT_URL']][0]);
    }
}

header("content-type: application/json; charset= utf-8");

//o primeiro switch verifica o tipo de requisição passada via http
//cada case tem a url permitida e caso não seja encontrada retorna um http response 404
//dentro de cada case tem uma função que gerencia como cada url deve se comportar de acordo com 
//a informação que recebe via json e reotrna um json como resposta
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':        
        switch ($_SERVER['REDIRECT_URL']){
            case $url_base . "itens":
                ret_Api($obj, $urls);                
                break;
            case $url_base . "familia":
                ret_Api($obj, $urls);                
                break;
            case $url_base . "itens/familia":
                if (($obj != null) && (isset($obj->id))){
                    eval($urls[$_SERVER['REQUEST_METHOD']][$_SERVER['REDIRECT_URL']]);
                } else {
                    http_response_code(409);
                    echo("Verifique se o id foi informado.");
                }                
                break;
            default:
                http_response_code(404);
                print_r("Url não encontrada.");
                break;
        }
        break;
    case 'POST':
        switch ($_SERVER["REDIRECT_URL"]) {
            case $url_base . "itens":
                if ((isset($obj->descricao)) && (isset($obj->saldo)) && (isset($obj->familia))){
                    eval($urls[$_SERVER['REQUEST_METHOD']][$_SERVER['REDIRECT_URL']]);    
                } else {
                    http_response_code(409);
                    echo("Verifique os dados informados.");
                }                
                break;
            case $url_base . "familia":
                if (isset($obj->descricao)){
                    eval($urls[$_SERVER['REQUEST_METHOD']][$_SERVER['REDIRECT_URL']]);    
                } else {
                    http_response_code(409);
                    echo("Verifique os dados informados.");
                }                
                break;            
            default:
                http_response_code(404);
                print_r("Url não encontrada.");
                break;
        }
        break;
    case 'PUT':
        switch ($_SERVER["REDIRECT_URL"]) {
            case $url_base . "itens":
                if ((isset($obj->descricao)) && (isset($obj->saldo)) && (isset($obj->familia)) && (isset($obj->id))){
                    eval($urls[$_SERVER['REQUEST_METHOD']][$_SERVER['REDIRECT_URL']]);
                } else {
                    http_response_code(409);
                    echo("Verifique os dados informados.");
                } 
                break;
            case $url_base . "familia":
                if ((isset($obj->descricao)) && (isset($obj->id))){
                    eval($urls[$_SERVER['REQUEST_METHOD']][$_SERVER['REDIRECT_URL']]);
                } else {
                    http_response_code(409);
                    echo("Verifique os dados informados.");
                } 
                break;
            default:
                http_response_code(404);
                print_r("Url não encontrada.");
                break;
        }
        break;    
    case 'DELETE':
        //dbgs($urls, $obj);
        break;
    default:
        http_response_code(404);
        print_r("Método não suportado.");
        break;
    
}

