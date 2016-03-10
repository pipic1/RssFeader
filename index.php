<?php

require('./config/config.php');
require('./config/Autoload.php');
Autoload::charger();

new FrontController();

exit();
?>