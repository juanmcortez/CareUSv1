<?php

namespace App\Console\Commands;

use App\Models\Dashboard\Stats;
use App\Models\Patients\Patient;
use App\Models\Personas\Persona;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateStats extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:stats';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will update the statistics on the database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Get last 30 days stats
        $today            = Carbon::now()->format('Y-m-d 23:59:59');
        $daysago30        = Carbon::now()->subDays(30)->format('Y-m-d 00:00:00');
        $daysago60        = Carbon::parse(Carbon::now()->subDays(31)->format('Y-m-d 23:59:59'))->subDays(30)->format('Y-m-d 00:00:00');
        $daysago90        = Carbon::parse(Carbon::now()->subDays(61)->format('Y-m-d 23:59:59'))->subDays(30)->format('Y-m-d 00:00:00');
        $dayago120        = Carbon::parse(Carbon::now()->subDays(91)->format('Y-m-d 23:59:59'))->subDays(30)->format('Y-m-d 00:00:00');
        $dayago150        = Carbon::parse(Carbon::now()->subDays(121)->format('Y-m-d 23:59:59'))->subDays(30)->format('Y-m-d 00:00:00');
        $dayago180        = Carbon::parse(Carbon::now()->subDays(151)->format('Y-m-d 23:59:59'))->subDays(30)->format('Y-m-d 00:00:00');

        $totalpatients    = Patient::count();
        $patlast30days          = Patient::whereBetween('created_at', [$daysago30, $today])->count();
        $patlast60days          = Patient::whereBetween('created_at', [$daysago60, $daysago30])->count();
        $patlast90days          = Patient::whereBetween('created_at', [$daysago90, $daysago60])->count();
        $patlast120days         = Patient::whereBetween('created_at', [$dayago120, $daysago90])->count();
        $patlast150days         = Patient::whereBetween('created_at', [$dayago150, $dayago120])->count();
        $patlast180days         = Patient::whereBetween('created_at', [$dayago180, $dayago150])->count();

        $Ypatientsevolution = [
            $patlast180days,
            $patlast150days,
            $patlast120days,
            $patlast90days,
            $patlast60days,
            $patlast30days,
        ];
        $Xpatientsevolution = [
            Carbon::parse($dayago180)->format('M d, Y'),
            Carbon::parse($dayago150)->format('M d, Y'),
            Carbon::parse($dayago120)->format('M d, Y'),
            Carbon::parse($daysago90)->format('M d, Y'),
            Carbon::parse($daysago60)->format('M d, Y'),
            Carbon::parse($daysago30)->format('M d, Y'),
        ];

        $males      = Persona::where('owner_type', 'patient')->where('language', 'es')->count();
        $females    = Persona::where('owner_type', 'patient')->where('language', 'fr')->count();
        $others     = Persona::where('owner_type', 'patient')->where('language', 'en')->count();

        $patientsgender = [$males, $females, $others];

        $yearsago10 = Carbon::now()->subYears(10)->format('Y-m-d 00:00:00');
        $yearsago20 = Carbon::parse(Carbon::now()->subYears(10)->format('Y-m-d 23:59:59'))->subYears(10)->format('Y-m-d 00:00:00');
        $yearsago30 = Carbon::parse(Carbon::now()->subYears(20)->format('Y-m-d 23:59:59'))->subYears(10)->format('Y-m-d 00:00:00');
        $yearsago40 = Carbon::parse(Carbon::now()->subYears(30)->format('Y-m-d 23:59:59'))->subYears(10)->format('Y-m-d 00:00:00');
        $yearsago50 = Carbon::parse(Carbon::now()->subYears(40)->format('Y-m-d 23:59:59'))->subYears(10)->format('Y-m-d 00:00:00');
        $yearsago60 = Carbon::parse(Carbon::now()->subYears(50)->format('Y-m-d 23:59:59'))->subYears(10)->format('Y-m-d 00:00:00');
        $yearsago70 = Carbon::parse(Carbon::now()->subYears(60)->format('Y-m-d 23:59:59'))->subYears(10)->format('Y-m-d 00:00:00');
        $yearsago80 = Carbon::parse(Carbon::now()->subYears(70)->format('Y-m-d 23:59:59'))->subYears(10)->format('Y-m-d 00:00:00');
        $yearsago90 = Carbon::parse(Carbon::now()->subYears(80)->format('Y-m-d 23:59:59'))->subYears(10)->format('Y-m-d 00:00:00');
        $yearsago99 = Carbon::parse(Carbon::now()->subYears(90)->format('Y-m-d 23:59:59'))->subYears(20)->format('Y-m-d 00:00:00');

        $age010     = Persona::where('owner_type', 'patient')->whereBetween('birthdate', [$yearsago10, $today])->count();
        $age1120    = Persona::where('owner_type', 'patient')->whereBetween('birthdate', [$yearsago20, $yearsago10])->count();
        $age2130    = Persona::where('owner_type', 'patient')->whereBetween('birthdate', [$yearsago30, $yearsago20])->count();
        $age3140    = Persona::where('owner_type', 'patient')->whereBetween('birthdate', [$yearsago40, $yearsago30])->count();
        $age4150    = Persona::where('owner_type', 'patient')->whereBetween('birthdate', [$yearsago50, $yearsago40])->count();
        $age5160    = Persona::where('owner_type', 'patient')->whereBetween('birthdate', [$yearsago60, $yearsago50])->count();
        $age6170    = Persona::where('owner_type', 'patient')->whereBetween('birthdate', [$yearsago70, $yearsago60])->count();
        $age7180    = Persona::where('owner_type', 'patient')->whereBetween('birthdate', [$yearsago80, $yearsago70])->count();
        $age8190    = Persona::where('owner_type', 'patient')->whereBetween('birthdate', [$yearsago90, $yearsago80])->count();
        $age9199    = Persona::where('owner_type', 'patient')->whereBetween('birthdate', [$yearsago99, $yearsago90])->count();

        $Ypatientsagegroups = [$age010, $age1120, $age2130, $age3140, $age4150, $age5160, $age6170, $age7180, $age8190, $age9199];

        $stats = new Stats();
        $stats->latest()->delete();
        $stats->create(
            [
                'totalpatients' => $totalpatients,
                'patientsevolX' => $Xpatientsevolution,
                'patientsevolY' => $Ypatientsevolution,
                'patientgender' => $patientsgender,
                'patientsagegY' => $Ypatientsagegroups,
            ]
        );

        return 0;
    }
}
