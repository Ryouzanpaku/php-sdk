<?php
/**
 * This service provides for functionalities concerning values and their manipulation.
 *
 * Copyright (C) 2019 heidelpay GmbH
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
 * @link  https://docs.heidelpay.com/
 *
 * @author  Simon Gabriel <development@heidelpay.com>
 *
 * @package  heidelpayPHP\Services
 */
namespace heidelpayPHP\Services;

class ValueService
{
    /**
     * @param mixed $value
     *
     * @return mixed
     */
    public static function limitFloats($value)
    {
        if (is_float($value)) {
            $value = round($value, 4);
        }
        return $value;
    }
}
