<?php

namespace Facade\Ignition\Http\Controllers;

use Facade\Ignition\Ignition;
use Illuminate\Http\Request;

class ScriptController
{
    public function __invoke(Request $request)
    {
<<<<<<< HEAD
        if (! isset(Ignition::scripts()[$request->script])) {
            abort(404, 'Script not found');
        }

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return response(
            file_get_contents(
                Ignition::scripts()[$request->script]
            ),
            200,
            ['Content-Type' => 'application/javascript']
        );
    }
}
