<?php

namespace Helpers\Illuminate\Support\Bases;

use Exception;

abstract class BaseHelpers
{
    /**
     * Handle calls to missing methods on the helper.
     *
     * @param string $method     The name of the method being called.
     * @param array  $parameters The parameters passed to the method.
     *
     * @throws Exception If the method does not exist.
     *
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        throw new Exception(sprintf(
            'Method %s::%s does not exist.',
            static::class,
            $method
        ));
    }
}
