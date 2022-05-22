<?php
namespace App\Providers;

use FQr\Entity\Applications\Contracts\IEntityFindForProperty;
use FQr\Entity\Applications\EntityFindForProperty;
use FQr\Entity\Domain\Contracts\IEntityCRUDRepository;
use FQr\Entity\Infraestructure\ElocuentEntityCRUDRepository;
use FQr\FlyerQR\Applications\Contracts\IFQRRecordNew;
use FQr\FlyerQR\Applications\Contracts\IFQRRecordNewSendMail;
use FQr\FlyerQR\Applications\Contracts\IFQRResendActivation;
use FQr\FlyerQR\Applications\Contracts\IFQRResendActivationSendMail;
use FQr\FlyerQR\Applications\FQRRecordNew;
use FQr\FlyerQR\Applications\FQRRecordNewSendEMail;
use FQr\FlyerQR\Applications\FQRResendActivation;
use FQr\FlyerQR\Applications\FQRResendActivationSendEMail;
use FQr\FlyerQR\Domain\Contracts\IFQRCRUDRepository;
use FQr\FlyerQR\Infraestructure\ElocuentFQRCRUDRepository;
use FQr\FlyerQR\Services\Contracts\IFQRCreate;
use FQr\FlyerQR\Services\Contracts\IFQRExistsForEmail;
use FQr\FlyerQR\Services\Contracts\IFQRFindForEMail;
use FQr\FlyerQR\Services\Contracts\IFQRFindForFlyerKey;
use FQr\FlyerQR\Services\Contracts\IFQRGenerateTokenId;
use FQr\FlyerQR\Services\Contracts\IFQRUpdateStatusForFlyerKey;
use FQr\FlyerQR\Services\Contracts\IFQRUpdateStatusForTokenId;
use FQr\FlyerQR\Services\FQRCreate;
use FQr\FlyerQR\Services\FQRExistsForEmail;
use FQr\FlyerQR\Services\FQRFindForEMail;
use FQr\FlyerQR\Services\FQRFindForFlyerKey;
use FQr\FlyerQR\Services\FQRGenerateTokenId;
use FQr\FlyerQR\Services\FQRUpdateStatusForFlyerKey;
use FQr\FlyerQR\Services\FQRUpdateStatusForTokenId;
use FQr\Log\Applications\Contracts\ILogHttpServer;
use FQr\Log\Applications\Contracts\ILogHttpServerError;
use FQr\Log\Applications\LogHttpServer;
use FQr\Log\Applications\LogHttpServerError;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //FQR App
        $this->app->bind(IFQRRecordNew::class, FQRRecordNew::class);
        $this->app->bind(IFQRRecordNewSendMail::class, FQRRecordNewSendEMail::class);

        $this->app->bind(IFQRResendActivation::class, FQRResendActivation::class);
        $this->app->bind(IFQRResendActivationSendMail::class, FQRResendActivationSendEMail::class);

        //  FQR Services
        $this->app->bind(IFQRCreate::class, FQRCreate::class);
        $this->app->bind(IFQRExistsForEmail::class, FQRExistsForEmail::class);
        $this->app->bind(IFQRFindForEMail::class, FQRFindForEMail::class);
        $this->app->bind(IFQRFindForFlyerKey::class, FQRFindForFlyerKey::class);
        $this->app->bind(IFQRGenerateTokenId::class, FQRGenerateTokenId::class);
        $this->app->bind(IFQRUpdateStatusForFlyerKey::class, FQRUpdateStatusForFlyerKey::class);
        $this->app->bind(IFQRUpdateStatusForTokenId::class, FQRUpdateStatusForTokenId::class);
        

        //Log
        $this->app->bind(IEntityFindForProperty::class, EntityFindForProperty::class);
        $this->app->bind(ILogHttpServerError::class, LogHttpServerError::class);
        $this->app->bind(ILogHttpServer::class, LogHttpServer::class);
        // ----------------- ----------------- ----------------- ----------------- -----------------

        //Repository Elocuent        
        $this->app->bind(IFQRCRUDRepository::class, ElocuentFQRCRUDRepository::class);
        $this->app->bind(IEntityCRUDRepository::class, ElocuentEntityCRUDRepository::class);
        // ----------------- ----------------- ----------------- ----------------- -----------------
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        //leeme.boostrap init
        Paginator::useBootstrap();
        //leeme.boostrap end
                //
        /*
        Proxys y ssl
        */
        
        //leeme.db init
        Schema::defaultStringLength(191);
        //leeme.db end

        //permite forzar a uso de https en prodcution 
        //leeme.https ini
        if(config('app.env') === 'production'){
            URL::forceScheme('https'); 
        }
        //leeme.https end
        

    }
}
