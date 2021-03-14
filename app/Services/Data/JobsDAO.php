<?php
namespace App\Services\Data;

use App\Job;
use App\Models\JobModel;
use Illuminate\Support\Facades\DB;

class JobsDAO
{
    private $table;
    public function __construct()
    {
        $this->table = "jobs";
    }
    
    
    public function getAllJobs()
    {
        // Return Job Models
        return Job::all();
    }
    
    public function getJobByID(int $id)
    {
        
    }
    
    public function deleteJobByID(int $id)
    {
        
    }
    
    /**
     * Adds the Model to the database.
     * @param $model : Both Job models will work.
     * @return boolean
     */
    public function addJobByModel($model)
    {
        // Is model a JobModel
        if(is_a($model, "JobModel")) 
        {
            // Convert the JobModel to Job
            $model = $model->convertToIlluminateJobModel()[1];
        }
        elseif(is_a($model, "Job"))
        {
           // Do nothing
        }
        // If any other object type comes in
        else return FALSE;
        
        // Add job into the database
        $model->save();
        
    }
}

