<?php
/**
 * This file provides a list of the example implementations.
 *
 * Copyright (C) 2018 heidelpay GmbH
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * @link  http://dev.heidelpay.com/
 *
 * @author  Simon Gabriel <development@heidelpay.com>
 *
 * @package  heidelpayPHP/examples
 */

/** Require the constants of this example */
require_once __DIR__ . '/Constants.php';

/** Require the composer autoloader file */
require_once __DIR__ . '/../../../autoload.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>
            Heidelpay UI Examples
        </title>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"
                integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css" />

        <link rel="stylesheet" href="https://static.heidelpay.com/v1/heidelpay.css" />
        <script type="text/javascript" src="https://static.heidelpay.com/v1/heidelpay.js"></script>
    </head>

    <body style="margin: 70px 70px 0;">
        <div class="ui container segment">
            <h2 class="ui header">
                <i class="shopping cart icon"></i>
                <div class="content">
                    Payment Implentation Examples
                    <div class="sub header">Choose the Payment Type you want to evaluate...</div>
                </div>
            </h2>
            <ul style="list-style: none;">
                <li>
                    <i class="credit card icon"></i>
                    <a href="CreditCardAuthorization/">Credit Card - Authorization</a>
                </li>
                <li>
                    <i class="credit card icon"></i>
                    <a href="CreditCardCharge/">Credit Card - Charge</a>
                </li>
                <li>
                    <i class="credit card icon"></i>
                    <a href="CreditCard3DAuthorization/">Credit Card with 3D - Authorization</a>
                </li>
                <li>
                    <i class="credit card icon"></i>
                    <a href="CreditCard3DCharge/">Credit Card with 3D - Charge</a>
                </li>
            </ul>
        </div>
    </body>

</html>