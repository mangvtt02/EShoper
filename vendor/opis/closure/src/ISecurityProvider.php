<?php
/* ===========================================================================
<<<<<<< HEAD
 * Copyright (c) 2018-2021 Zindex Software
=======
 * Copyright (c) 2018-2019 Zindex Software
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
 *
 * Licensed under the MIT License
 * =========================================================================== */

namespace Opis\Closure;

interface ISecurityProvider
{
    /**
     * Sign serialized closure
     * @param string $closure
     * @return array
     */
    public function sign($closure);

    /**
     * Verify signature
     * @param array $data
     * @return bool
     */
    public function verify(array $data);
}