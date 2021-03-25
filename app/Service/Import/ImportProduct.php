<?php

namespace App\Service\Import;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Service\ProductService;
use KubAT\PhpSimple\HtmlDomParser;

class ImportProduct extends Import
{

    /**
     * @var ProductService
     */
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }


    public function run()
    {
        $categories = Category::get();

        foreach ($categories as $category) {
            $content = $this->fetch($category->url);
            $html = HtmlDomParser::str_get_html($content);

            $products = $html->find('ul[class=product_list_vertical] li');

            foreach ($products as $htmlProduct) {

                $imgA = $htmlProduct->find('a[class=product_img_link]', 0);
                $url = $imgA->href;

                $img = $imgA->find('img[class=replace-2x img-responsive lazy]', 0);
                $imgSrc = $img->{'data-src'};

                $h = $htmlProduct->find('h2', 0);
                $title = trim($h->plaintext);


                $d = $htmlProduct->find('div[class=descriptions]', 0);
                $description = $d->plaintext;

                $p = $htmlProduct->find('span[class=price product-price]', 0);

                $price = $p->content;

                $c = $htmlProduct->find('div[class=cross-reference]', 0);

                $code = $c->plaintext;

                $contentDetail = $this->fetch($url);

                $detail = HtmlDomParser::str_get_html($contentDetail);

                $b = $detail->find('meta[itemprop=brand]', 0);
                if ($b) {
                    $brand = $b->content;
                }


                if (!Product::where('title', $title)->first()) {
                    /** @var Product $newProduct */
                    // Toto je jen rychle udelany URL, jinak by se delal pomoci nejake funkce, ktera by udelala pekne url z TITLE
                    $newProduct = Product::create(['url' => md5($title),  'title' => $title, 'description' => $description, 'code' => $code, 'price' => $price]);
                    $this->productService->saveImage($newProduct, $this->fetch($imgSrc));


                    if ($brand) {
                        $brandModel = $this->saveBrand($brand);
                        $newProduct->brand_id = $brandModel->id;
                        $newProduct->save();
                    }

                    $newProduct->category()->save($category);
                }
            }
        }
    }

    /**
     * @param string $brand
     * @return Brand
     */
    private function saveBrand(string $brand)
    {
        $brandModel = Brand::where('title', $brand)->first();
        if ($brandModel) {
            return $brandModel;
        }

        $brandModel = Brand::create(['title' => $brand]);

        return $brandModel;
    }


}
