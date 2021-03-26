<?php


namespace App\Http\Controllers;
use App\DTO;
use Illuminate\Http\Request;
use App\Services\Business\SecurityService;

class JobsRestController extends Controller
{
    public function index()
    {
        $service = new SecurityService();
        $dto = new DTO();
        $dto->data = $service->getAllJobs();
        return $dto;
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = new SecurityService();
        $dto = new DTO();
        $dto->data = $service->getJob($id);
        return $dto;
       
    }
}

