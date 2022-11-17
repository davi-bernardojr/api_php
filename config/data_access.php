<?php

include_once "./config/conexao.php";

//função geral para fazer uma consulta ao banco 
//se não for passado um id o valor será zero e não vai buscar um id
function query_all ($sql, $id=0){
    $conn = conectar();
    $prep = $conn->prepare($sql);
    $id==0 ? $prep->execute() : $prep->execute([$id]);
    $ret = $prep->fetchAll();
    return (empty($ret) ? "Nenhum registro encontrado." : $ret);
}

//função geral para inserir um resgistro no banco
//os dados são passados via array
function insert_all($sql, ...$values) {
    $conn = conectar();
    $prep = $conn->prepare($sql);
    $prep->execute(...$values);
    return array("linhas_afetadas" => $prep->rowCount(), "id_criado" => $conn->lastInsertId());
}

//função geral para update de um registro no banco
//os dados são passados por um array
function update_all($sql, ...$values) {
    $conn = conectar();
    $prep = $conn->prepare($sql);
    $prep->execute(...$values);
    return array("linhas_afetadas" => $prep->rowCount());
}

//chama a função query_all e busca todos os registros na tabela familia
function sel_familia(){    
    return query_all("select * from familia");
}

//chama a função query_all e busca um registro na tabela familia
function sel_familia_id($id) {
    return query_all("select * from familia where id = ?", $id);
}

//chama a função query_all e busca todos os registros na tabela itens
function sel_itens(){
    return query_all("select * from itens");
}

//chama a função query_all e busca um registro na tabela itens
function sel_itens_id($id){
    return query_all("select * from itens where id = ?", $id);
}

//chama a função query_all e busca todos os registros na tabela itens com o mesmo código de familia
function sel_itens_familia($id){
    return query_all("select * from itens where fam_id = ?", $id);
}

//chama a função insert_all para inserir um registro na tabela familia
//tendo como critério a descrição
function inserir_familia($descricao){
    return insert_all("insert into familia (descricao) values (:descricao)", [":descricao" => $descricao]);
}

//chama a função insert_all para inserir um registro na tabela itens 
//recebendo como critério o saldo, descrição e id da familia
function inserir_item($descricao, $saldo, $familia){
    return insert_all("insert into itens (descricao, saldo, fam_id) values (:descricao, :saldo, :fam_id)", [":descricao" => $descricao, ":saldo" => $saldo, ":fam_id" => $familia]);
}

//chama a função update_all para alterar um registro na tabela familia tendo como critério oo id, e a descrição
function alt_familia($id, $descricao){
    return update_all("update familia set descricao = :descricao where id = :id", [":descricao" => $descricao, ":id" => $id]);
}

function alt_item($id, $descricao, $saldo, $fam_id){
    return update_all("update itens set descricao = :descricao, saldo = :saldo, fam_id = :fam_id where id = :id", [":descricao" => $descricao, ":saldo" => $saldo, ":fam_id" => $fam_id, ":id" => $id]);
}

