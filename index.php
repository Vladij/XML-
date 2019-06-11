<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Парсим xml</title>
  </head>
  <body>
    <?php
    $languages = simplexml_load_file("test.xml");
    $ns = $languages->getNamespaces(true);

    foreach($languages->lang as $lang) {
        $dc = $lang->children($ns["dc"]);
        printf(
            "<p>%s появился в %d и был создан %s.</p>",
            $lang["name"],
            $lang->appeared,
            $dc->creator
        );
    }

     ?>
  </body>
</html>
