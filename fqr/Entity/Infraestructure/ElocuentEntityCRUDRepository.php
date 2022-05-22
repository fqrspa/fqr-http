<?php
declare(strict_types=1);
namespace FQr\Entity\Infraestructure;

use App\Models\Fqr\EntityCode;
use FQr\Entity\Applications\Exception\EntityFindException;
use FQr\Entity\Domain\Contracts\IEntityCRUDRepository;

class ElocuentEntityCRUDRepository
implements
    IEntityCRUDRepository
{


    public function findForProperty(string $entity, string $property): array{
        
        $coll = EntityCode::where('entity', $entity, 'and')->where('property', $property)->get(['code', 'description'])->toArray();
        if(empty($coll)){
            throw new EntityFindException('No se encontro datos para la entidad ['.$entity.'] propiedad ['.$property.']');
        }
        return $coll;
        
    }
}
