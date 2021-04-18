<?php
use Illuminate\Support\Facades\Auth;
use App\Services\ProfileDatabaseServices;

// Check to see if a user is not logged in
if(auth()->check()) redirect('home');


// Get the currently signed in user
$userID = auth()->id();

// Get the user profile data
$pdbs = new ProfileDatabaseServices();
$profile = $pdbs->GetUserProfileByUserID($userID);

?>



@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html>
	<!-- TODO: create edit profile page -->
    <head>
        <meta charset="ISO-8859-1">
        <title>Edit Profile</title>

        <style>
            tr, td {
             
                background-color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

           
            </style>
    </head>
    <body class="center">
   

   
        <form action="doeditprofile" method="post">
        	<input type="hidden" name="_token" value="<?php csrf_token()?>">
        	<input type="hidden" name="userID" value="<?php $profile->getUserid(); ?>">
    		<h2>Login</h2>
    		<table class="table table-dark table-hover">
            <thead>
            <tr class="table-bordered border-light">
              
                <th>Phone Number</th>
                <td><input type="text" name="phoneNumber" value="<?php echo $profile->getPhoneNumber(); ?>" required autocomplete="phoneNumber" autofocus> @error('phoneNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror</td>
               </tr> 
                  <tr class="table-bordered border-light">
                <th>Street Address</th>
                	<td><input type="text" name="streetAddress" 
    						value="<?php echo $profile->getStreet(); ?>"required autocomplete="streetAddress" autofocus> @error('streetAddress')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror</td>
                                </tr>
    			   <tr class="table-bordered border-light">			
                <th>City</th>
                	<td><input type="text" name="city" 
    						value="<?php echo $profile->getCity(); ?>"required autocomplete="city" autofocus> @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror</td>
    						</tr>
    						   <tr class="table-bordered border-light">
                <th>State</th>         
    				<td><input type="text" name="state" 
    						value="<?php echo $profile->getState(); ?>"required autocomplete="state" autofocus> @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror</td>
    						</tr>
    						   <tr class="table-bordered border-light">
           		<th>Zipcode</th>           		
    				<td><input type="text" name="zipCode" 
    						value="<?php echo $profile->getZipCode(); ?>"required autocomplete="zipCode" autofocus> @error('zipCode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror</td>
    						</tr>
    						   <tr class="table-bordered border-light">
           		<th>Employment Statue</th>	
           		<td><input type="text" name="employmentStatus" 
    						value="<?php echo $profile->getEmploymentStatus(); ?>"required autocomplete="employmentStatus" autofocus> @error('employmentStatus')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror</td>
    						</tr>
    						   <tr class="table-bordered border-light">
           		<th>Occupation</th>
           			<td><input type="text" name="occupation" 
    						value="<?php echo $profile->getOccupation(); ?>"required autocomplete="occupation" autofocus> @error('occupation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror</td>
    						</tr>
    						   <tr class="table-bordered border-light">
           		<th>Company Name</th>
           		
           		<td><input type="text" name="companyName" 
    						value="<?php echo $profile->getCompanyName(); ?>"required autocomplete="companyName" autofocus> @error('companyName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror</td>
    						</tr>
    						   <tr class="table-bordered border-light">
           		<th>Educational Background</th>
           		<td><input type="text" name="educationalBackground" 
    						value="<?php echo $profile->getEducationalBackground(); ?>"required autocomplete="educationalBackground" autofocus> @error('educationalBackground')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror</td>
    						</tr>
    						   <tr class="table-bordered border-light">
           		<th>Skills</th>
           		<td><input type="text" name="skills" 
    						value="<?php echo $profile->getSkillsList(); ?>"required autocomplete="skills" autofocus> @error('skills')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror</td>
    						</tr>
    						   <tr class="table-bordered border-light">
           		<th>Job History</th>
           		<td><input type="text" name="jobHistory" 
    						value="<?php echo $profile->getJobHistory(); ?>"required autocomplete="jobHistory" autofocus> @error('jobHistory')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror</td>
            </tr>
            </thead>
            <tbody>
           
    		
    					
    						</tbody>
    					
  
  	</table>
    			 
                        <input type="hidden" name="_token" value="<?php echo csrf_token()?>">
                         <input type="hidden" name="userID" value="<?php echo $profile->getUserid(); ?>">
                            <button class="btn btn-info" type="submit">Update</button>	

    	</form>
    
    </body>
</html>
@endsection