<?php

/*
  EXERCÍCIO 2 da trilha: polimorfismo

  Polimorfismo: a variável é do tipo da MÃE; o objeto é da FILHA.
  O mesmo método (taxa) se comporta diferente em cada filha.
  Não use if ($conta instanceof ...) no foreach.

  Faça este DEPOIS de Heranca.php.

  1) Classe Conta
     - promoção: protected float $saldo
     - getSaldo()
     - taxa(): float   ← na mãe pode devolver 0 por enquanto
       (no exercício 3 isso vira abstract)

  2) Classe ContaCorrente extends Conta
     - taxa(): return $this->saldo * 0.02

  3) Classe ContaPoupanca extends Conta
     - taxa(): return $this->saldo * 0.005

  4) $contas = [
       new ContaCorrente(1000),
       new ContaPoupanca(1000),
     ];
     foreach: echo a taxa de cada uma
     (esperado: 20 e 5)
*/

class Conta {
    public function __construct(protected float $saldo){
    }
    public function getSaldo(){
      return $this->saldo;
    }
    public function taxa(){
      return 0;
    }
}

class ContaCorrente extends Conta {
    public function taxa(){
      return $this->saldo*0.02;
    }
}

class ContaPoupanca extends Conta {
  public function taxa(){
    return $this->saldo*0.005;
  }
}

$contas = [
  new ContaCorrente(1000),
  new ContaPoupanca(1000),
];
  foreach ($contas as $conta){
    echo "{$conta->getSaldo()} e {$conta->taxa()}\n";
  }
