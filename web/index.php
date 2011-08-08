<?php

require_once implode(DIRECTORY_SEPARATOR, array(
    dirname(__FILE__), '..', 'src', 'autoload.php'
));

$db = new mysqli('localhost', 'root', '', 'foodalizr_development');

use Foodalizr\Model\Person;

$person = new Person();
$person->setName('Steffen Meuser');

use Foodalizr\Model\MapperFactory;
$mapperFactory = new MapperFactory($db);
$personMapper = $mapperFactory->getMapper('\\Foodalizr\\Model\\PersonMapper');
$personMapper->save($person);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <title>Foodalizr</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/excite-bike/jquery-ui.css" />
    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.15/jquery-ui.min.js"></script>
    
    <script type="text/javascript" src="js/css.js"></script>
    
<script type="text/javascript">
$(function() {
    var mealAddDialog = $("#person-add-dialog").dialog({
        autoOpen : false,
        buttons: {
            "Hinzufügen" : function() {
                $(this).find("form").submit();
                $(this).dialog("close");
            }
        },
        modal : true,
        resizable : false
    });
    $(".person-add").click(function() {
        mealAddDialog.dialog('open');
    });
});
</script>
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
