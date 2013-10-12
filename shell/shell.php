<?php
#$res = shell_exec('dir');  // Lijst alle bestanden op: Windows
$res = shell_exec('ls -l'); // Lijst alle bestanden op: Linux, Unix, Mac OS
echo "<pre>{$res}";
