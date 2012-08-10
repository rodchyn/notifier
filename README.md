DBus and Growl notifier
========

Notifier ported from Sismo to be able to use it in own projects

To install add it ower composer

    composer require rodchyn/notifier
    
And simply

    <?php
    
    require_once 'vendor/autoload.php';
    
    $notifier = new \Rodchyn\Notifier\DBusNotifier();
    $notifier->notify('Title', 'Notification text');
    
Thanks to Fabien Potensier