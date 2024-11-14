<?php

namespace App\Services;

use MercadoPago\SDK;
use MercadoPago\Preference;
use MercadoPago\Item;   

class MercadoPagoService {

    public function __construct()
    {
        SDK::setAccessToken(config('mercadopago.access_token'));
    }

    public function crearPreferencia($total, $items) {
        $preference = new Preference();

        $mercadoPagoItems = [];
        foreach ($items as $item) {
            $mpItem = new Item();
            $mpItem->title = $item['title'];
            $mpItem->quantity = $item['quantity'];
            $mpItem->unit_price = $item['unit_price'];
            $mercadoPagoItems[] = $mpItem;
        }

        $preference->items = $mercadoPagoItems;
        $preference->back_urls = [
            "success" => route('reservas'), 
            "failure" => route('reservas'), 
            "pending" => route('reservas')
        ];
        $preference->auto_return = 'approved';
        $preference->save();

        return $preference->init_point; 
    }
}
