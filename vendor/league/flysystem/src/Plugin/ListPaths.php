<?php

namespace League\Flysystem\Plugin;

class ListPaths extends AbstractPlugin
{
    /**
     * Get the method name.
     *
     * @return string
     */
    public function getMethod()
    {
        return 'listPaths';
    }

    /**
     * List all paths.
     *
     * @param string $directory
     * @param bool   $recursive
     *
<<<<<<< HEAD
     * @return string[] paths
=======
     * @return array paths
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function handle($directory = '', $recursive = false)
    {
        $result = [];
        $contents = $this->filesystem->listContents($directory, $recursive);

        foreach ($contents as $object) {
            $result[] = $object['path'];
        }

        return $result;
    }
}
