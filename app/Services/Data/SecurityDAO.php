<?php
namespace App\Services\Data;

use App\Group;
use App\Member;
use App\User;
use App\Job;
use Illuminate\Support\Facades\Auth;
 
class SecurityDAO{
    
    
//grabs all users
    public function getAllUsersDAO(){
        return User::withTrashed()->get();
    }
//update users
    public function updateUserDAO($targetValue, $updatedValue){
        $user = $this->getUserDAO();
        $user->$targetValue = $updatedValue;
        return $user->save();
    }
//get certain user
    public function getUserDAO(){
        return Auth::User();
    }
//delete certain user
    public function deleteUserDAO($id){
        $user = $this->getUserByIDDAO($id);
        return $user->forceDelete();
    }
//suspend by filling in soft delete
    public function suspendUserDAO($id){
        $user = $this->getUserByIDDAO($id);
        return $user->delete();
    }
//grabs user by the id
    public function getUserByIDDAO($id){
        return User::withTrashed()->findOrFail($id);
    }
//unsuspend by removing timestamp in deleted_at
    public function reactivateUserDAO($id){
        $user = $this->getUserByIDDAO($id);
        return $user->restore();
    }
    //grab all jobs
    public function getAllJobsDAO()
    {
        return Job::all();
    }
    //update the jobs new info
    public function updateJobDAO($id, $targetValue, $updatedValue)
    {
        $job = $this->getJobDAO($id);
        $job->$targetValue = $updatedValue;
        return $job->save();
    }
    //delete jobs
    public function deleteJobDAO($id)
    {
        $job = $this->getJobDAO($id);
        return $job->delete();
    }
    //add job into database
    public function addJobDAO($title, $description, $location, $type, $pay, $company, $employment, $phone, $email)
    {
        $job = new Job();
        $job->title = $title;
        $job->description = $description;
        $job->location = $location;
        $job->pay_range = $pay;
        $job->type = $type;
        $job->company = $company;
        $job->employment = $employment;
        $job->phonenumber = $phone;
        $job->email = $email;
        return $job->save();
    }
    //get a job info
    public function getJobDAO($id)
    {
        return Job::findOrFail($id);
    }
    //grab all the groups info
    public function getAllGroupsDAO()
    {
        return Group::all();
    }
    //update the group
    public function updateGroupDAO($id, $targetValue, $updatedValue)
    {
        $group = $this->getGroupDAO($id);
        $group->$targetValue = $updatedValue;
        return $group->save();
    }
    //delete group
    public function deleteGroupDAO($id)
    {
        $group = $this->getGroupDAO($id);
        return $group->delete();
    }
    //add group input
    public function addGroupDAO($title, $description)
    {
        $group = new Group();
        $group->title = $title;
        $group->description = $description;
  
        return $group->save();
    }
    //get one group
    public function getGroupDAO($id)
    {
        return Group::findOrFail($id);
    }
    
    //Join group
    public function joinGroupDAO($id)
    {
        $membership = new Member();
        $membership->UserID = Auth::id();
        $membership->GroupID= $id;
        return $membership->save();
    }
    //Leave group
    public function leaveGroupDAO($id)
    {
        $membership = Member::where('UserID', Auth::id())->where('GroupID', $id)->first();
        return $membership->forceDelete();
    }
    //get group info by id
    public function getGroupByIDDAO($id)
    {
        return Group::findOrFail($id);
    }
    public function getMembersDAO($id)
    {
        $group = $this->getGroupByIDDAO($id);
        $members = $group->members;
        $users = [];
        foreach ($members as $member) {
            array_push($users, $member->user->id);
        }
        return $users;
    }
    
}