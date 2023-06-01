<html>

<head>
    <style>
        .card {
            width: 20vw;
            height: 300px;
            border: 1px solid black;
            display: inline-block;
            padding: 10px;
            border-radius: 5px;
            margin: 10px;
            vertical-align: top;
            position: relative;
        }
        .title {
            font-size: 1.25rem;
            font-weight: bold;
            display: block;
            overflow-wrap: break-word;
        }
        .label {
            display: inline-block;
            border: 1px solid black;
            padding: 0.05rem;
            margin: 0.25rem;
        }
        .body {
            display: block;
            overflow-wrap: break-word;
        }
        .number {
            position: absolute;
            font-size: 1.25rem;
            font-weight: bold;
            bottom: 5%;
            right: 5%;
        }
        article {
            font-size: 12px;
        }
    </style>
</head>

<?php

$output = [];
if (isset($_REQUEST['json'])) {
  $string = $_REQUEST['json'];
  $json = json_decode($string, TRUE);
}
if (!is_array($json)) {
  die();
}
echo '<article>';
$issues = [];
foreach ($json['items'] as $key => $issue) {
    echo '<div class="card">';
    echo '<span class="title">' . $issue['title'] . '</span>';
    echo '<span class="number">' .  $issue['number'] . '</span>';
    foreach ($issue['labels'] as $label) {
        echo '<span class="label">' . $label['name'] . '</span>';
    }
    echo '<span class="body">';
    echo strip_tags(substr($issue['body'], 0, 300));
    echo '</span>';
    echo '</div>';
}
echo '</article>';
