<?php

namespace App\Providers;

use App\Models\Armoire;
use App\Models\Article;
use App\Models\Bande;
use App\Models\Bassin;
use App\Models\Bis;
use App\Models\CaracteristiqueMoteur;
use App\Models\Commande;
use App\Models\Depense;
use App\Models\District;
use App\Models\Doseuse;
use App\Models\Incident;
use App\Models\Intervenant;
use App\Models\Maintenance;
use App\Models\Mesure;
use App\Models\MoteurElectrique;
use App\Models\MoteurPompe;
use App\Models\Ouvrage;
use App\Models\Product;
use App\Models\Rapport;
use App\Models\Ressource;
use App\Models\Site;
use App\Models\User;
use App\Policies\ArmoirePolicy;
use App\Policies\ArticlePolicy;
use App\Policies\BandePolicy;
use App\Policies\BassinPolicy;
use App\Policies\BisPolicy;
use App\Policies\CaracteristiqueMoteurPolicy;
use App\Policies\CommandePolicy;
use App\Policies\DepensePolicy;
use App\Policies\DistrictPolicy;
use App\Policies\DoseusePolicy;
use App\Policies\IncidentPolicy;
use App\Policies\IntervenantPolicy;
use App\Policies\MaintenancePolicy;
use App\Policies\MesurePolicy;
use App\Policies\MoteurElectriquePolicy;
use App\Policies\MoteurPompePolicy;
use App\Policies\OuvragePolicy;
use App\Policies\ProductPolicy;
use App\Policies\RapportPolicy;
use App\Policies\RessourcePolicy;
use App\Policies\SitePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
         Product::class => ProductPolicy::class,
         Depense::class => DepensePolicy::class,
         Bande::class => BandePolicy::class,
         District::class => DistrictPolicy::class,
         Site::class => SitePolicy::class,
         Ressource::class => RessourcePolicy::class,
         CaracteristiqueMoteur::class => CaracteristiqueMoteurPolicy::class,
         MoteurElectrique::class => MoteurElectriquePolicy::class,
         MoteurPompe::class => MoteurPompePolicy::class,
         Doseuse::class => DoseusePolicy::class,
         Ouvrage::class => OuvragePolicy::class,
         Bassin::class => BassinPolicy::class,
         Intervenant::class => IntervenantPolicy::class,
         Incident::class => IncidentPolicy::class,
         Maintenance::class => MaintenancePolicy::class,
         Commande::class => CommandePolicy::class,
         Bis::class => BisPolicy::class,
         Mesure::class => MesurePolicy::class,
         Rapport::class => RapportPolicy::class,
         Armoire::class => ArmoirePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

     /*   Gate::define("admin", function(User $user){
            return $user->hasRole("admin");
        });*/

        Gate::define("manager", function(User $user){
            return $user->hasRole("manager");
        });

        Gate::define("employe", function(User $user){
            return $user->hasRole("employe");
        });


        Gate::before(function (User $user) {
           return $user->hasRole("admin") ? true : null;
        });
    }
}
