<?php
$_output = "echo phpinfo();";
$result = highlight_string("<?php\n" . $_output, true);

echo $result;