<?php
class productOrderFacade {
         
    public $productID = '';
     
    public function __construct($pID) {
        $this->productID = $pID;
    }
     
    public function generateOrder() {
         
        if($this->qtyCheck()) {
           
            $this->addToCart();
             
            $this->calulateShipping();
             
            $this->applyDiscount();
             
            $this->placeOrder();   
        }
         
    }
     
    private function addToCart () {
        /* .. adaugam produsul in cos ..  */
        echo "adaugam produsul in cos </br>";
    }
     
    private function qtyCheck() {
         
        $qty = 1;
         
        if($qty > 0) {
            return true;
        } else {
            return true;
        }
    }
     
     
    private function calulateShipping() {
        /*  calculam costul livrarii */
         echo "calculam costul livrarii </br>";
    }
     
    private function applyDiscount() {
        /*  facem reducere   */
        echo "facem reducere </br>";
    }
     
    private function placeOrder() {
        /*  plasam comanda  */
        echo "plasam comanda </br>";
    }
}

$productID = 3;
 
echo "Pasii efectuati: </br>";
$order = new productOrderFacade($productID);
$order->generateOrder();