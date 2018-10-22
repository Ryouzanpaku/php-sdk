<?php
/**
 * This exception is thrown whenever the api returns an error.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * @copyright Copyright © 2016-present heidelpay GmbH. All rights reserved.
 *
 * @link  http://dev.heidelpay.com/
 *
 * @author  Simon Gabriel <development@heidelpay.com>
 *
 * @package  heidelpay/mgw_sdk/exceptions
 */
namespace heidelpay\MgwPhpSdk\Exceptions;

class HeidelpaySdkException extends HeidelpayBaseException
{
    const MESSAGE = 'There has been an unexpected error please contact as for further information.';

    /**
     * HeidelpayApiException constructor.
     *
     * @param string $merchantMessage
     * @param string $customerMessage
     * @param string $code
     */
    public function __construct($merchantMessage = '', $customerMessage = '', $code = '')
    {
        parent::__construct($merchantMessage, $customerMessage);
        $this->code = $code;
    }
}