<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private UserRepository $userRepo;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepo = $userRepository;
    }

    public function index(Request $request)
    {
        $period = $request->query("period", "yearly");
        $filter_period = $request->query("filter_period");
        $user = auth()->user();

        $data = [
            "transaction_summary" => $this->userRepo->getUserTransactionSummary($user, $period, $filter_period),
            "accounts" => $this->userRepo->getUserAccounts($user),
        ];

        return response()->json(["data" => $data]);
    }
}
