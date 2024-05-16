<?php

namespace App\Console\Commands;
use App\Models\Voiture;
use App\Models\Demand;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Illuminate\Console\Command;

class disponibilite extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:disponibilite';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'check if the comand ends its gonna change the row disponibel';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //$voitures = Voiture::all();
        $carbon=Carbon::now();
        
        $voitures = Voiture::select('voitures.*','demands.fin_dmd')->
            join('demands', 'voitures.id', '=', 'demands.voiture_id')->get();

           
               foreach($voitures as $voiture){
                   if($voiture->fin_dmd < $carbon){
                         Voiture::where('id', $voiture->id)
                               ->update([
                                    'disponible'=>1
                                  ]);
                             
                      
                   }
              }   
          

    

            

        return Command::SUCCESS;
    }
}
