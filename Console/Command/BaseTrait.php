<?php
declare(strict_types=1);
/**
 * Console Command Class
 * @author Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AliexpressConsumer\Console\Command;

use Ticaje\AConnector\Interfaces\ClientInterface;

// Old Callback URL: https://marketplaces.vdshop.es/

/**
 * Trait BaseTrait
 * @package Ticaje\AliexpressConsumer\Console\Command
 * This is for testing purposes only, there is a module called AliexpressSettings that contain all the
 * necessary logic to retrieve access token, this module can use it for such purposes.
 *
 */
trait BaseTrait
{
    public function setVendorFlamingos($dto)
    {
        $dto->setAppKey('25080936');
        $dto->setAppSecret('15183d73649b65a1319d7feddc38ff1d');
        $dto->setHeaders([ClientInterface::CONTENT_TYPE_KEY => ClientInterface::CONTENT_TYPE_JSON]);
        $oldToken = '50002400922sLft7iDOYpUAZdoviLSa0vg10037c68cgfT9P0tdofviWlvkhDNo7Qj';
        $newToken = '50002400508VobdqLhRj1822a508koOwRybecIulotfwtGcGjp4ttVeGlOYTEHYSE5';
        $dto->setAccessToken($oldToken);
    }

    public function setVendorVdshop($dto)
    {
        $dto->setAppKey('29471432');
        $dto->setAppSecret('3c81cbd441f7483fd844214195392cf6');
        $dto->setHeaders([ClientInterface::CONTENT_TYPE_KEY => ClientInterface::CONTENT_TYPE_JSON]);
        $oldToken = '50002100225yRpooaetLdsEhlvzQRiCbmvFqq134f1e71AySkdbjPelzVGsuBSneaoB';
        $newToken = '500024000122SpuwTPdAxTHV15f52555hIFpYtRdB3mUEnQaTtCZhFQ8owlAG4zzXm';
        $dto->setAccessToken($oldToken);
    }
}
