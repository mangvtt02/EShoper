<?php

namespace Illuminate\Queue;

use Opis\Closure\SerializableClosure as OpisSerializableClosure;

class SerializableClosure extends OpisSerializableClosure
{
    use SerializesAndRestoresModelIdentifiers;

    /**
     * Transform the use variables before serialization.
     *
<<<<<<< HEAD
     * @param  array  $data
=======
     * @param  array  $data The Closure's use variables
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return array
     */
    protected function transformUseVariables($data)
    {
        foreach ($data as $key => $value) {
            $data[$key] = $this->getSerializedPropertyValue($value);
        }

        return $data;
    }

    /**
     * Resolve the use variables after unserialization.
     *
<<<<<<< HEAD
     * @param  array  $data
=======
     * @param  array  $data The Closure's transformed use variables
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return array
     */
    protected function resolveUseVariables($data)
    {
        foreach ($data as $key => $value) {
            $data[$key] = $this->getRestoredPropertyValue($value);
        }

        return $data;
    }
}
