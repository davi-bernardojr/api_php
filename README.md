# Documentação do Projeto

Uma pequena api escrita em php puro para fins de estudo, 
com duas tabelas itens e familia onde: 
uma familia pode ter N itens mas um item só pode ter uma familia.

Neste sistema foi utilizado os verbos GET, POST, PUT 
faltando apenas implementar o DELETE.

# Rotas, retorno e parâmetros obrigatórios

# GET:

## Rota:

> /userapi/itens

## Parâmetros e retorno

Parâmetro

**id** : opcional, se declarado retorna um unico registro, caso o mesmo exista, 
senão retorna uma mensagem de erro: "Nenhum registro encontrado."
Se não for informado um id retornará todos os registros da tabela.

```
{
    "id" : inteiro 
}
```
## Rota:

> /userapi/familia

## Parâmetros e retorno

Parâmetro

**id** : opcional, se declarado retorna um unico registro, caso o mesmo exista, 
senão retorna uma mensagem de erro: "Nenhum registro encontrado."
Se não for informado um id retornará todos os registros da tabela.

```
{
    "id" : inteiro 
}
```
## Rota:

> /userapi/itens/familia

## Parâmetros e retorno

Parâmetro

**id** : obrigatório, retorna todos os itens que tem a mesma familia em comum, senão retorna uma mensagem de erro: "Nenhum registro encontrado."


```
{
    "id" : inteiro 
}
```
# POST

## Rota:


> /userapi/itens

## Parâmetros e retorno

Parâmetro

**descricao, saldo, id familia** : obrigatório, caso não informados ou informados parcialmente retornará a mensagem: "Verifique os dados informados." e o código de erro 409.
Se informados corretamente retornará uma mensagem: "Linhas afetadas: valor_inteiro, Id criado: valor_inteiro"


```
{
    "familia": inteiro
    "descricao": string
    "saldo": inteiro
}
```

## Rota:


> /userapi/familia

## Parâmetros e retorno

Parâmetro

**descricao** : obrigatório, caso não informado retornará a mensagem: "Verifique os dados informados." e o código de erro 409.
Se informados corretamente retornará uma mensagem: "Linhas afetadas: valor_inteiro, Id criado: valor_inteiro"

```
{
    "descricao": string
}
```

# PUT

## Rota:


> /userapi/itens

## Parâmetros e retorno

Parâmetro

**id, descricao, saldo, id familia** : obrigatório, caso não informados ou informados parcialmente retornará a mensagem: "Verifique os dados informados." e o código de erro 409.
Se informados corretamente retornará uma mensagem: "Linhas afetadas: valor_inteiro"


```
{
    "id" : inteiro
    "familia": inteiro
    "descricao": string
    "saldo": inteiro
}
```

## Rota:


> /userapi/familia

## Parâmetros e retorno

Parâmetro

**descricao** : obrigatório, caso não informado retornará a mensagem: "Verifique os dados informados." e o código de erro 409.
Se informados corretamente retornará uma mensagem: "Linhas afetadas: valor_inteiro"

```
{
    "id" : inteiro
    "descricao": string
}
```