<?php
$cats = App\Models\Category::all();
foreach($cats as $c) {
    $c->slug = str_replace(' ', '-', $c->slug);
    $c->save();
}

$arts = App\Models\Article::all();
foreach($arts as $a) {
    $a->slug = str_replace(' ', '-', $a->slug);
    $a->save();
}

echo "Done fixing slugs.\n";
