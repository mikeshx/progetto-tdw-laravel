<?php

namespace App\Http\Controllers\Publics;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Publics\ProductsModel;
use Lang;
use Auth;
use App\Models\Publics\ReviewModel;

class ProductsController extends Controller
{

    public function index(Request $request)
    {
        $productsModel = new ProductsModel();
        $products = $productsModel->getProducts($request);
        $categores = $productsModel->getCategories();
        if ($request->category != null) {
            $categoryName = $productsModel->getCategoryName($request->category);
        }

        function buildTree(array $elements, $parentId = 0)
        {
            $branch = array();
            foreach ($elements as $element) {
                if ($element->parent == $parentId) {
                    $children = buildTree($elements, $element->id);
                    if ($children) {
                        $element->children = $children;
                    }
                    $branch[] = $element;
                }
            }
            return $branch;
        }

        $tree = buildTree($categores);
        return view('publics.products', [
            'products' => $products,
            'cartProducts' => $this->products,
            'categories' => $tree,
            'selectedCategory' => $request->category,
            'head_title' => $request->category == null ? Lang::get('seo.title_products') : $categoryName[0],
            'head_description' => $request->category == null ? Lang::get('soe.descr_products') : Lang::get('seo.descr_products_category') . $categoryName[0],
        ]);
    }

    public function productPreview(Request $request)
    {
        $enableComments = false;
        $productsModel = new ProductsModel();
        $product = $productsModel->getProduct($request->id);
        $producers = $productsModel->getProducers($request->id);
        if ($product == null) {
            abort(404);
        }

        $gallery = array();
        if ($product->folder != null) {
            $dir = '../storage/app/public/moreImagesFolders/' . $product->folder . '/';
            if (is_dir($dir)) {
                if ($dh = opendir($dir)) {
                    $i = 0;
                    while (($file = readdir($dh)) !== false) {
                        if (is_file($dir . $file)) {
                            $gallery[] = asset('storage/moreImagesFolders/' . $product->folder . '/' . $file);
                        }
                        $i++;
                    }
                    closedir($dh);
                }
            }
        }

        // Check if the user can add a review
        if ($this->checkReview($request->id) == true) {
            $enableComments = true;
        }

        return view('publics.preview', [
            'product' => $product,
            'cartProducts' => $this->products,
            'head_title' => mb_strlen($product->name) > 70 ? str_limit($product->name, 70) : $product->name,
            'head_description' => mb_strlen($product->description) > 160 ? str_limit($product->description, 160) : $product->description,
            'producers' => $producers,
            'gallery' => $gallery,
            'enable_comments' => $enableComments
        ]);
    }

    /* Check if a certain user can add a review to a product */
    public function checkReview($product_id) {

        $userID = Auth::user()->id;
        $reviewModel = new ReviewModel();
        $results = $reviewModel->getOrders($userID);

        foreach ($results as $result ) {
            foreach(unserialize($result->products) as $product) {

                if ($product['id'] == $product_id) {
                    return true;
                }
            }
        }

        return false;
    }

}
