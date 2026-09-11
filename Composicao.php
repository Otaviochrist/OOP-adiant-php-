<?php

/*
  EXERCÍCIO: composição

  Composição: o todo CRIA e POSSUI as partes.
  As partes não fazem sentido sozinhas.
  Item de pedido só existe dentro do pedido.

  1) Classe ItemPedido
     - promoção de construtor: private string $nome, private int $quantidade, private float $preco
     - getSubtotal() retorna quantidade * preco
     - getNome()

  2) Classe Pedido
     - private array $itens = [];
     - promoção de construtor: private int $numero
     - adicionarItem(string $nome, int $quantidade, float $preco)
       — DENTRO deste método faça new ItemPedido(...)
       — no script principal NÃO use new ItemPedido
     - calcularTotal() soma os subtotais
     - resumo() imprime número, cada item e o total

  3) Crie Pedido 201, adicione Caderno (2 x 15.50) e Caneta (3 x 4.00).
  4) Chame resumo().
*/

class ItemPedido {
  public function __construct(private string $nome, private int $quantidade, private float $preco){}

  public function getSubTotal(){
    $subtotal = $this->quantidade * $this->preco;
    return $subtotal;
  }

  public function getNome(){
    return $this->nome;
  }

}

class Pedido {
  private array $itens = [];
  public function __construct(private int $numero){}

  public function adicionarItem(string $nome, int $quantidade, float $preco){
    $this->itens[] = new ItemPedido($nome, $quantidade, $preco);
  }

  public function calcularTotal(){
    $total = 0;
    foreach ($this->itens as $item){
      $total += $item->getSubTotal();
    }
    return $total;
  }


  public function resumo(){
    echo"Pedido: {$this->numero}\n";
    foreach ($this->itens as $item){
      $item->getSubTotal();
      echo"{$item->getNome()}: R$ {$item->getSubtotal()}\n";
    }
    echo "Total: R$ {$this->calcularTotal()}\n";
 }
}

$pedido1 = new Pedido(201);
$pedido1->adicionarItem("Caderno", 2, 15.50);
$pedido1->adicionarItem("Caneta", 3, 4.00);
$pedido1->resumo();

