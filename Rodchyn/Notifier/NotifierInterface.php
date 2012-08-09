<?php

/*
 * This file is part of the Sismo utility.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Rodchyn\Notifier;

/**
 * Base class for notifiers.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
interface NotifierInterface
{
    /**
     * Notifies a commit.
     *
     * @param string $header Notification header
     * @param string $text   Notification text
     */
    public function notify($header, $text);

}
