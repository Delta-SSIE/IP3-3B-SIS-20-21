<?php

setcookie("TestCookie", "Nazdar");
setcookie("TestCookie2", 1);
setcookie("TestCookie3", true, time() - 3600);

echo $_COOKIE["TestCookie3"] ?? "NIC";
