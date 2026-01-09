<?php

namespace App\Services;

use App\Models\Order;

interface OrderService
{
    function add(array $orderData): Order;
}