<?php

namespace App\Http\Controllers;
use App\Services\Business\SecurityService;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Create Job
    public function addJob(Request $request)
    {
        $title = $request->input('title');
        $description = $request->input('description');
        $location = $request->input('location');
        $type = $request->input('type');
        $pay = $request->input('pay_range');
        $company = $request->input('company');
        $employment = $request->input('employment');
        $phone = $request->input('phonenumber');
        $email = $request->input('email');
        (new SecurityService())->addJob($title, $description, $location, $type, $pay, $company, $employment, $phone, $email);
        return redirect()->route('post.job');
    }

    //Update Job
    public function updateJob(Request $request)
    {
        $title = $request->input('title');
        $description = $request->input('description');
        $location = $request->input('location');
        $type = $request->input('type');
        $pay = $request->input('pay_range');
        $company = $request->input('company');
        $employment = $request->input('employment');
        $id = $request->input('id');
        $phone = $request->input('phonenumber');
        $email = $request->input('email');

        $securityService = new SecurityService();
        $securityService->updateJob($id, 'title', $title);
        $securityService->updateJob($id, 'description', $description);
        $securityService->updateJob($id, 'location', $location);
        $securityService->updateJob($id, 'type', $type);
        $securityService->updateJob($id, 'pay_range', $pay);
        $securityService->updateJob($id, 'company', $company);
        $securityService->updateJob($id, 'employment', $employment);
        $securityService->updateJob($id, 'phonenumber', $phone);
        $securityService->updateJob($id, 'email', $email);
        return redirect()->route('admin.job');
    }

    //Delete Job
    public function deleteJob(Request $request)
    {
        $id = $request->input('id');
        (new SecurityService())->deleteJob($id);
        return redirect()->route('admin.job');
    }
}
