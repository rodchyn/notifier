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

use Symfony\Component\Process\Process;

/**
 * Notifies builds via DBus.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class DBusNotifier implements NotifierInterface
{

    private $name;

    public function __construct($name = 'PHP Notifier')
    {
        $this->name = $name;
    }

    public function notify($header, $text)
    {
        // first, try with the notify-send program
        $process = new Process(sprintf('notify-send "%s" "%s"', $header, $text));
        $process->setTimeout(2);
        $process->run();
        if ($process->isSuccessful()) {
            return;
        }

        // then, try dbus-send?
        $process = new Process(sprintf('dbus-send --print-reply --dest=org.freedesktop.Notifications /org/freedesktop/Notifications org.freedesktop.Notifications.Notify string:"%s" int32:0 string:"" string:"%s" string:"%s" array:string:"" dict:string:"" int32:-1', $this->name, $header, $text));
        $process->setTimeout(2);
        $process->run();
        if ($process->isSuccessful()) {
            return;
        }
    }
}
