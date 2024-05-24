<?php

/*
 * This file is part of Psy Shell.
 *
<<<<<<< HEAD
 * (c) 2012-2023 Justin Hileman
=======
 * (c) 2012-2020 Justin Hileman
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Psy\VarDumper;

/**
 * Presenter injects itself as a dependency to all objects which
 * implement PresenterAware.
 */
interface PresenterAware
{
    /**
     * Set a reference to the Presenter.
     *
     * @param Presenter $presenter
     */
    public function setPresenter(Presenter $presenter);
}
