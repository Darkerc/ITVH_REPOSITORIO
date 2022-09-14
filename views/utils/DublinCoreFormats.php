<?php 

function dublinCoreXML($data) {
    return <<<EOT
<?xml version="1.0" encoding="UTF-8"?>
<metadata
xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
xmlns:dc="http://purl.org/dc/elements/1.1/">

<dc:title>{$data['title']}</dc:title>
<dc:creator>{$data['creator']}</dc:creator>
<dc:description>{$data['description']}</dc:description>
<dc:date>{$data['date']}</dc:date>
<dc:type>{$data['type']}</dc:type>
<dc:identifier>{$data['identifier']}</dc:identifier>
<dc:format>{$data['format']}</dc:format>
<dc:language>{$data['language']}</dc:language>

</metadata>
EOT;
}

function dublinCoreJSON($data) {
    return json_encode([
        "@context" => "https://schema.org",
        "@type" => $data['type'],
        "headline" => $data['title'],
        "author" => $data['creator'],
        "keywords" => $data['identifier'],
        "wordcount" => $data['wordcount'],
        "url" => $data['url'],
        "datePublished" => $data['date'],
        "dateCreated" => $data['date'],
        "dateModified" => $data['date']
    ], JSON_PRETTY_PRINT + JSON_UNESCAPED_SLASHES);
}


function dublinCoreCSV($data) {
    $captionTags = "dc.title,dc.creator,dc.description,dc.type,dc.identifier,dc.format,dc.language";
    return join("\n", [$captionTags, join(',', array_map(fn($col) => "\"$col\"",[$data['title'], $data['creator'], $data['description'], $data['type'], $data['identifier'], $data['format'], $data['language']] ))]);
}




