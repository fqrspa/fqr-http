<?php

declare(strict_types=1);

namespace FQr\FlyerQR\Infraestructure;

use App\Models\Fqr\Address;
use App\Models\Fqr\BankAccount;
use App\Models\Fqr\Flyer;
use App\Models\Fqr\Link;
use App\Models\Fqr\Telephone;
use Exception;
use FQr\Entity\Domain\EMailEntity;


use FQr\FlyerQR\Domain\Contracts\IFQRCRUDRepository;
use FQr\FlyerQR\Domain\FlyerQREntity;
use FQr\FlyerQR\Domain\FQRAddressEntity;
use FQr\FlyerQR\Domain\FQRBankAccountEntity;
use FQr\FlyerQR\Domain\FQRCelularEntity;
use FQr\FlyerQR\Domain\FQRFacebookURLEntity;
use FQr\FlyerQR\Domain\FQRInstagramURLEntity;
use FQr\FlyerQR\Domain\FQRURLEntity;
use FQr\FlyerQR\Domain\FQRWhatsAppEntity;
use FQr\FlyerQR\Services\Exception\FQRCreateException;
use FQr\FlyerQR\Services\Exception\FQRFindException;
use Illuminate\Support\Facades\DB;


class ElocuentFQRCRUDRepository implements IFQRCRUDRepository
{

    public function __construct()
    {
    }

    public function create(
        string $contratoKey,
        string $tokenId,
        string $email,
        string $marketArea = null,
        string $marketName = null,
        FQRInstagramURLEntity $fqrInstagramURL = null,
        FQRFacebookURLEntity $fqrFacebookURL = null,
        FQRURLEntity $fqrSiteURL = null,
        FQRWhatsAppEntity $fqrWhatsapp = null,
        FQRAddressEntity $fqrAddressEntity = null,
        FQRBankAccountEntity $fqrBankAccountEntity = null

    ): FlyerQREntity {

        if ($this->existEmail(new EMailEntity($email))) {
            throw new FQRCreateException('El EMail esta registrado');
        }

        try {

            DB::beginTransaction();
            $flyerQR             = new Flyer();
            $flyerQR->tokenId = $tokenId;
            $flyerQR->flyerKey = $contratoKey;
            $flyerQR->email      = $email;
            $flyerQR->marketArea = $marketArea;
            $flyerQR->marketName = $marketName;

            $flyerQR->tokenId    = $tokenId;
            $flyerQR->entityCreationDate = date("Y-m-d");
            $flyerQR->push();


            if (!empty($fqrInstagramURL)) {
                $link = new Link();
                $link->flyerKey = $contratoKey;
                $link->entityCode = $fqrInstagramURL->getEntityCode();
                $link->url = $fqrInstagramURL->getURL();
                $link->push();
            }
            if (!empty($fqrFacebookURL)) {
                $link = new Link();
                $link->flyerKey = $contratoKey;
                $link->entityCode = $fqrFacebookURL->getEntityCode();
                $link->url = $fqrFacebookURL->getURL();
                $link->push();
            }
            if (!empty($fqrSiteURL)) {
                $link = new Link();
                $link->flyerKey = $contratoKey;
                $link->entityCode = $fqrSiteURL->getEntityCode();
                $link->url = $fqrSiteURL->getURL();
                $link->push();
            }

            if (!empty($fqrWhatsapp)) {
                $telephone = new Telephone();
                $telephone->flyerKey = $contratoKey;
                $telephone->entityCode = $fqrWhatsapp->getEntityCode();
                $telephone->digits = $fqrWhatsapp->getDigits();
                $telephone->push();
            }

            if (!empty($fqrAddressEntity)) {
                $address = new Address();
                $address->flyerKey = $contratoKey;
                $address->entityCode = $fqrAddressEntity->getEntityCode();
                $address->marketActivity = $fqrAddressEntity->getMarketActivity();
                $address->countryCode = $fqrAddressEntity->getCountryCode();
                $address->city = $fqrAddressEntity->getCity();
                $address->street = $fqrAddressEntity->getStreet();
                $address->informationAdditional = $fqrAddressEntity->getInformationAdditional();
                $address->latitude = $fqrAddressEntity->getLatitude();
                $address->longitude = $fqrAddressEntity->getLongitude();
                $address->push();
            }

            if (!empty($fqrBankAccountEntity)) {
                $bankAcount = new BankAccount();
                $bankAcount->flyerKey = $contratoKey;
                $bankAcount->entityCode = $fqrBankAccountEntity->getEntityCode();
                $bankAcount->countryCode = $fqrBankAccountEntity->getCountryCode();
                $bankAcount->bankCode = $fqrBankAccountEntity->getBankCode();
                $bankAcount->accountTypeCode = $fqrBankAccountEntity->getAccountTypeCode();
                $bankAcount->accountNumber = $fqrBankAccountEntity->getAccountNumber();
                $bankAcount->clientName = $fqrBankAccountEntity->getClientName();
                $bankAcount->clientEMail = $fqrBankAccountEntity->getClientEMail();
                $bankAcount->push();
            }
            DB::commit();
        } catch (Exception $ex) {
            DB::rollBack();
            throw new Exception('error : ' . $ex->getMessage());
        }

        return  new FlyerQREntity(
            $email,
            $contratoKey,
            $tokenId,
            $marketName,
            $marketArea
        );
    }
    public function existEmail(EMailEntity $email): bool
    {
        $flyerModel = Flyer::find($email->getEMail());
        if ($flyerModel) {
            return true;
        }
        return false;
    }
    public function findForKey($key): FlyerQREntity
    {
        $flyerModel = Flyer::where('flyerKey', $key)->first();

        if (empty($flyerModel)) {
            throw new FQRFindException('Flyer QR no existe');
        }

        return $this->setFlyerQREntity($flyerModel);
    }
    public function updateStatusForKey(string $flyerKey, string $status): FlyerQREntity
    {
        $flyerModel = Flyer::where('flyerKey', $flyerKey)->first();
        if (empty($flyerModel)) {
            throw new FQRFindException('Flyer QR no existe');
        }
        $flyerModel->contractStatus = $status;
        $flyerModel->save();

        return $this->setFlyerQREntity($flyerModel);
    }
    public function updateStatusForTokenId(string $tokenId, string $status): FlyerQREntity
    {
        $flyerModel = Flyer::where('tokenId', $tokenId)->first();
        if (empty($flyerModel)) {
            throw new FQRFindException('Flyer QR no existe');
        }
        $flyerModel->contractStatus = $status;
        $flyerModel->save();

        return $this->setFlyerQREntity($flyerModel);
    }

    public function findForEMail($email): FlyerQREntity
    {
        $flyerModel = Flyer::find($email);

        if (empty($flyerModel)) {
            throw new FQRFindException('Flyer QR no existe');
        }

        return $this->setFlyerQREntity($flyerModel);
    }

    public function generateToken(string $email, string $tokenId): FlyerQREntity
    {
        $flyerModel = Flyer::find($email);

        if (empty($flyerModel)) {
            throw new FQRFindException('Flyer QR no existe');
        }

        $flyerModel->tokenId = $tokenId;

        $flyerModel->save();

        return $this->setFlyerQREntity($flyerModel);

    }

    //------------------------------------------------------------
    //------------------------------------------------------------

    private function setFlyerQREntity($flyerModel)
    {

        return new FlyerQREntity(
            $flyerModel->email,
            $flyerModel->flyerKey,
            $flyerModel->tokenId,
            $flyerModel->marketName,
            $flyerModel->marketArea,
            $this->getLink($flyerModel->email),
            $this->getTelephones($flyerModel->email),
            $this->getAddresses($flyerModel->email),
            $this->getBankAccount($flyerModel->email),
            $flyerModel->entityStatus,
            $flyerModel->entityCreationDate,
            $flyerModel->contractStatus,
        );
    }
    private function getLink(string $email): array
    {
        $links = array();
        $linksModel = Flyer::find($email)->getLinks()->get();

        if (!empty($linksModel)) {

            foreach ($linksModel as $m) {
                $links[] = new FQRURLEntity(
                    $m->url,
                    $m->id,
                    $m->flyerKey,
                    $m->entityStatus,
                    $m->entityCode
                );
            }
        }
        return $links;
    }
    //------------------------------------------------------------
    //------------------------------------------------------------
    private function getTelephones(string $email): array
    {
        $telephones = array();

        $telephonesModel = Flyer::find($email)->getTelephones()->get();

        if (!empty($telephonesModel)) {

            foreach ($telephonesModel as $m) {
                $telephones[] = new FQRCelularEntity(
                    $m->digits,
                    $m->id,
                    $m->flyerKey,
                    $m->entityStatus,
                    $m->entityCode
                );
            }
        }

        return $telephones;
    }

    private function getAddresses(string $email): array
    {

        $addresses = array();
        $addressesModel = Flyer::find($email)->getAddresses()->get();


        if (!empty($addressesModel)) {

            foreach ($addressesModel as $m) {
                $addresses[] = new FQRAddressEntity(
                    $m->marketActivity,
                    $m->countryCode,
                    $m->city,
                    $m->street,
                    $m->informationAdditional,
                    $m->latitude,
                    $m->longitude,
                    $m->id,
                    $m->flyerKey,
                    $m->entityCode,
                    $m->entityStatus
                );
            }
        }
        return $addresses;
    }

    private function getBankAccount($email)
    {
        $bankAccounts = array();
        $bankAccountsModel = Flyer::find($email)->getBankAccounts()->get();
        if (!empty($bankAccountsModel)) {
            foreach ($bankAccountsModel as $m) {

                $bankAccounts[] = new FQRBankAccountEntity(
                    $m->countryCode,
                    $m->bankCode,
                    $m->accountTypeCode,
                    $m->accountNumber,
                    $m->clientName,
                    $m->clientEmail,
                    $m->id,
                    $m->flyerKey,
                    $m->entityCode,
                    $m->entityStatus
                );
            }
        }
        return $bankAccounts;
    }
}
