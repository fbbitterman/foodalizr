<?php

require_once implode(DIRECTORY_SEPARATOR, array(
    dirname(__FILE__), '..', 'src', 'autoload.php'
));
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <title>Foodalizr</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<p>
    <button class="add meal-add">Essen</button>
    <button class="add person-add">Person</button>
</p>

<div id="person-add-dialog" title="Person hinzufügen">
<form>
    <label for="person-name">Name</label>
    <input type="text" name="name" id="person-name" />
</form>
</div>

</body>
</html>
