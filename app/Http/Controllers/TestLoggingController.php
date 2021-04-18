<?php
//Charles and Katie
///CLC 256
/// Professor Hughes
/// This is our own work
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Data\Utility\ILoggerService;

class TestLoggingController extends Controller
{
    protected $logger;
    public function __construct(ILoggerService $logger){
        
        $this->logger = $logger;
    }
    
    
   public function index()
   {
       echo "In index() <br/>";
       $this->logger->info("Entering TestLoggingController.index()");
       echo "Out of index()";
            
   }

    
    
}
