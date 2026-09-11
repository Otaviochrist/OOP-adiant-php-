<?php
class Conta {
    public function __construct(protected float $saldo = 0){
    }
    public function depositar(float $valor){
      if( 0 < $valor ){
        $this->saldo += $valor;
      }
    }
    public function getSaldo(){
      return $this->saldo;
    }
}

class ContaPoupanca extends Conta {
    public function renderizarjuros(){
      $this->saldo *= 1.01;
    }
}

$poupança1 = new ContaPoupanca();
$poupança1->depositar(100);
$poupança1->renderizarjuros();
echo $poupança1->getSaldo();
