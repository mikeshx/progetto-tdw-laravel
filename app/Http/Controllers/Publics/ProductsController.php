<?php

namespace App\Http\Controllers\Publics;

use App\Models\Admin\BlogModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Publics\ProductsModel;
use App\Models\Publics\ReviewModel;
use App\Models\Publics\HomeModel;
use Lang;
use Auth;


class ProductsController extends Controller
{

    public function index(Request $request)
    {
        $productsModel = new ProductsModel();
        $homeModel = new HomeModel();
        $products = $productsModel->getProducts($request);
        $categores = $productsModel->getCategories();
        $social = $homeModel->getSocial();
        $contact = $homeModel->getContacts();


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
            'social' => $social,
            'contact' => $contact,
            'cartProducts' => $this->products,
            'categories' => $tree,
            'selectedCategory' => $request->category,
            'head_title' => $request->category == null ? Lang::get('seo.title_products') : $categoryName[0],
            'head_description' => $request->category == null ? Lang::get('soe.descr_products') : Lang::get('seo.descr_products_category') . $categoryName[0],
        ]);
    }

    public function product_single(Request $request)
    {
        $enableComments = false;
        $productsModel = new ProductsModel();
        $homeModel = new HomeModel();
        $reviewModel = new ReviewModel();
        $product = $productsModel->getProduct($request->id);
        $producers = $productsModel->getProducers($request->id);
        $social = $homeModel->getSocial();
        $contact = $homeModel->getContacts();
        $review = $reviewModel->getReview($request->id);
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

        return view('publics.product_single', [
            'product' => $product,
            'social' => $social,
            'review' => $review,
            'contact' => $contact,
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

        // If we are a guest, return false (we can't post reviews)
        if(Auth::guest())
        {
            return false;
        }

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

    public function getFavoriteProducts(Request $request) {
        $productsModel = new productsModel();
        $products = $productsModel->getFavoriteProducts($request['id']);

        $homeModel = new homeModel();
        $social = $homeModel->getSocial();
        $contact = $homeModel->getContacts();

        return view('publics.products', [
            'products' => $products,
            'social' => $social,
            'contact' => $contact
        ]);
    }

}
