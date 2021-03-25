<?php

namespace App\Service\Import;

use App\Models\Category;
use KubAT\PhpSimple\HtmlDomParser;

class ImportCategory extends Import
{


    public function run()
    {
        $content = $this->fetch('https://www.autonorma.cz/');

        $html = HtmlDomParser::str_get_html( $content );
        $category = $html->find('div[class=row main_categories]', 0);

        if ($category) {
            $categories = $category->find('a');
            foreach ($categories as $a) {
                $title = $a->plaintext;
                $url = $a->href;

                if (!Category::where('title', $title)->first()) {

                    $category = new Category;
                    $category->title = $title;
                    $category->url = $url;
                    $category->save();
                    $this->updateDescription($category, $url);

                    echo $title . "\n";
                }
            }
        }
    }

    private function updateDescription(Category $category, $url)
    {
        $content = $this->fetch($url);
        $html = HtmlDomParser::str_get_html( $content );
        $desc = $html->find('div[class=cat_desc]', 0);
        if ($desc) {
            $category->description = $desc->plaintext;
            $category->save();
        }
    }

}
