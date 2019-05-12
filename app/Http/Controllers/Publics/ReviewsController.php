<?php

namespace App\Http\Controllers\Publics;

use App\Models\Publics\ReviewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lang;
use App\Http\Controllers\Controller;

class ReviewsController extends Controller
{
    public function index(Request $request)
    {

    }

    // Add a new review
    public function submitReview(Request $request) {

        $reviewModel = new ReviewModel();
        $result = $reviewModel->addReview($request);

        // If there is already a review by the same user
        // (with the same product), we return false
        if ($this->checkReviewExists($request['prodId'])) {
            return redirect()->back()->with(['msg' => "Error while adding the review, it alredy exists!", 'result' => false]);
        }

        if ($result) {
            $msg = "Review added successfully";
        }

        return redirect()->back()->with(['msg' => $msg, 'result' => $result]);

    }

    // Check if we have already submitted a review
    public function checkReviewExists($product_id) {

        $userId = Auth::id();

        $reviewModel = new ReviewModel();
        $result = $reviewModel->checkReviewExists($product_id, $userId);

        if ($result) {
            return true;
        }
        return false;
    }

    // Get every review for a specified product
    public function getProductReviews(Request $request) {

    }

}
