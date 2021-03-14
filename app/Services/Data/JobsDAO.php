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
    
    /**
     * Returns all of the jobs in the database
     * @return \Illuminate\Database\Eloquent\Collection|\App\Job[]
     */
    public function getAllJobs()
    {
        // Return Job Models
        return Job::all();
    }
    
    /**
     * Gets a Job Model by id number
     * @param int $id
     * @return \App\Job
     */
    public function getJobByID(int $id)
    {
        return Job::findOrFail($id);
    }
    
    /**
     * Deletes the Job by id number
     * @param int $id
     * @return boolean|NULL
     */
    public function deleteJobByID(int $id)
    {
        $job = $this->getJobByID($id);
        return $job->delete();
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

    /**
     * Updates the job listing by the model and id number
     * @param $model : Both Job models will work.
     * @param $id int : Job id number.
     * @return boolean
     */
    public function updateJobByModel($model, $id)
    {
        
        // Is model a JobModel
        if(is_a($model, "JobModel"))
        {
            // Convert the JobModel to Job
            $results = $model->convertToIlluminateJobModel()[1];
            //$id = $results[0];
            $model = $results[1];
        }
        elseif(is_a($model, "Job"))
        {
            // Do nothing
        }
        // If any other object type comes in
        else return FALSE;
        
        //Get the Job from the database
        $job = $this->getJobByID($id);
        
        // Apply the changes to the database job
        $job->title = $model->title;
        $job->description = $model->description;
        $job->location = $model->location;
        $job->type = $model->type;
        $job->pay_range = $model->pay_range;
        $job->company = $model->company;
        $job->employment = $model->employment;
        $job->phonenumber = $model->phonenumber;
        $job->email = $model->email;
        
        // Save the job to the database and return restult
        return $job->save();
    }
}

