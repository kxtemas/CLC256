<?php 
use Illuminate\Support\Facades\Auth;
use App\Services\ProfileDatabaseServices;
use App\Services\UserDatabaseService;
use phpDocumentor\Reflection\Types\Integer;
 
// Get the currently signed in user
$userID = auth()->id();
// Check to see if the edit profile button was pressed
if(isset($_POST['EditButton']))
{
    redirect('editprofile');
}
// Check to see if there is a url paramater for userID
if(isset($_GET['id']))
{
    // Check to see if the parameter is an int
    if(is_int($_GET['id']))
    {
        // Set the parameter to the 
        $userID = $_GET['id'];
    }
}
 $userID = (int)$userID;
 // Get the user profile data
$pdbs = new ProfileDatabaseServices();
$profile = $pdbs->GetUserProfileByUserID($userID);
 // Get the user's username
$udbs = new UserDatabaseService();
$username = $udbs->GetUsernameByID($userID);
 ?>

@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html>
	<head>
        <meta charset="ISO-8859-1">
        <title>Profile</title>
    </head>
    <body>

    <h2><?php "authID: " . auth()->id(); ?></h2>
    <h2><?php  "authID is int: " . is_int(auth()->id()); ?></h2>
    <h2>My Profile</h2>
	<table class="table table-dark table-hover">
            <thead>
            <tr class="table-bordered border-light">
              
                <th>Phone Number</th>
                <td><?php echo $profile->getPhoneNumber();?></td>
               </tr> 
                  <tr class="table-bordered border-light">
                <th>Street Address</th>
                	<td><?php echo $profile->getStreet(); ?></td>
    						</tr>
    			   <tr class="table-bordered border-light">			
                <th>City</th>
                	<td><?php echo $profile->getCity(); ?></td>
    						</tr>
    						   <tr class="table-bordered border-light">
                <th>State</th>         
    				<td><?php echo $profile->getState(); ?></td>
    						</tr>
    						   <tr class="table-bordered border-light">
           		<th>Zipcode</th>           		
    				<td><?php echo $profile->getZipCode(); ?></td>
    						</tr>
    						   <tr class="table-bordered border-light">
           		<th>Employment Statue</th>	
           		<td><?php echo $profile->getEmploymentStatus(); ?></td>
    						</tr>
    						   <tr class="table-bordered border-light">
           		<th>Occupation</th>
           			<td><?php echo $profile->getOccupation(); ?></td>
    						</tr>
    						   <tr class="table-bordered border-light">
           		<th>Company Name</th>
           		
           		<td><?php echo $profile->getCompanyName(); ?></td>
    						</tr>
    						   <tr class="table-bordered border-light">
           		<th>Educational Background</th>
           		<td><?php echo $profile->getEducationalBackground(); ?></td>
    						</tr>
    						   <tr class="table-bordered border-light">
           		<th>Skills</th>
           		<td><?php echo $profile->getSkillsList(); ?></td>
    						</tr>
    						   <tr class="table-bordered border-light">
           		<th>Job History</th>
           		<td><?php echo $profile->getJobHistory(); ?></td>
            </tr>
            </thead>
 			

</table>
<form action="{{url('/editprofile')}}">
 <button class="btn btn-info" type="submit">Edit Profile</button>
 </form>
		
    </body>
</html>

@endsection

