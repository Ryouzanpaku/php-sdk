<?php
/**
 * This file provides an example implementation of the credit card payment type.
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
require_once __DIR__ . '/../../../../autoload.php';
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

        <link rel="stylesheet" href="https://static.heidelpay.com/v1/heidelpay.css" />
        <script type="text/javascript" src="https://static.heidelpay.com/v1/heidelpay.js"></script>
    </head>

    <body style="margin: 70px 70px 0;">
        <h3>Example data without 3D secure:</h3>
        <ul>
            <li>Number: 4111 1111 1111 1111</li>
            <li>Expiry date: Date in the future</li>
            <li>Cvc: 123</li>
        </ul>

        <h3>Example data with 3D secure:</h3>
        <ul>
            <li>Number: 4444 3333 2222 1111</li>
            <li>Expiry date: Date in the future</li>
            <li>Cvc: 123</li>
            <li>Secret: VISA123</li>
        </ul>

        <form id="payment-form" class="heidelpayUI form" novalidate>
            <div class="field">
                <div id="card-element-id-number" class="heidelpayInput">
                    <!-- Card number UI Element will be inserted here. -->
                </div>
            </div>
            <div class="two fields">
                <div class="field ten wide">
                    <div id="card-element-id-expiry" class="heidelpayInput">
                        <!-- Card expiry date UI Element will be inserted here. -->
                    </div>
                </div>
                <div class="field six wide">
                    <div id="card-element-id-cvc" class="heidelpayInput">
                        <!-- Card CVC UI Element will be inserted here. -->
                    </div>
                </div>
            </div>
            <div class="field">
                <button id="submit-button" class="heidelpayUI" type="submit">Pay</button>
            </div>
        </form>

        <script>
            // Creating a heidelpay instance with your public key
            let heidelpayInstance = new heidelpay('s-pub-2a10gsZJ2IeiiK80Wh68qrOzu4IZse6k');

            // Creating a credit card instance
            let Card = heidelpayInstance.Card();

            // Rendering input fields
            Card.create('number', {
                containerId: 'card-element-id-number',
                onlyIframe: false
            });
            Card.create('expiry', {
                containerId: 'card-element-id-expiry',
                onlyIframe: false
            });
            Card.create('cvc', {
                containerId: 'card-element-id-cvc',
                onlyIframe: false
            });

            // General event handling
            let buttonDisabled = {};
            let testButton = document.getElementById("submit-button");
            testButton.disabled = true;

            let eventHandlerCardInput = function(e) {
                if (e.success) {
                    buttonDisabled[e.type] = true;
                    testButton.disabled = false;
                } else {
                    buttonDisabled[e.type] = false;
                    testButton.disabled = true;
                }
                testButton.disabled = !(buttonDisabled.number && buttonDisabled.expiry && buttonDisabled.cvc);
            };

            Card.addEventListener('change', eventHandlerCardInput);

            // Handling the form's submission
            let form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                // Creating a credit card resource
                Card.createResource()
                    .then(function(result) {
                        let hiddenInput = document.createElement('input');
                        hiddenInput.setAttribute('type', 'hidden');
                        hiddenInput.setAttribute('name', 'resourceId');
                        hiddenInput.setAttribute('value', result.id);
                        form.appendChild(hiddenInput);
                        form.setAttribute('method', 'POST');
                        form.setAttribute('action', '<?php echo CONTROLLER_URL; ?>');

                        // Submitting the form
                        form.submit();
                    })
                    .catch(function(error) {
                        errorElement.textContent = error.message;
                    })
            });
        </script>
    </body>
</html>