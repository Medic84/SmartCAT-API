<?php

namespace SmartCAT\API\Normalizer;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;

class ProjectChangesModelNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCAT\\API\\Model\\ProjectChangesModel') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCAT\API\Model\ProjectChangesModel) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCAT\API\Model\ProjectChangesModel();
        if (property_exists($data, 'name')) {
            $object->setName($data->{'name'});
        }
        if (property_exists($data, 'description')) {
            $object->setDescription($data->{'description'});
        }
        if (property_exists($data, 'deadline')) {
            $object->setDeadline(new \DateTime($data->{'deadline'}));
        }
        if (property_exists($data, 'clientId')) {
            $object->setClientId($data->{'clientId'});
        }
        if (property_exists($data, 'domainId')) {
            $object->setDomainId($data->{'domainId'});
        }
        if (property_exists($data, 'vendorAccountId')) {
            $object->setVendorAccountId($data->{'vendorAccountId'});
        }
        if (property_exists($data, 'externalTag')) {
            $object->setExternalTag($data->{'externalTag'});
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getName()) {
            $data->{'name'} = $object->getName();
        }
        if (null !== $object->getDescription()) {
            $data->{'description'} = $object->getDescription();
        }
        if (null !== $object->getDeadline()) {
            $data->{'deadline'} = $object->getDeadline()->format("Y-m-d\TH:i:sP");
        }
        if (null !== $object->getClientId()) {
            $data->{'clientId'} = $object->getClientId();
        }
        if (null !== $object->getDomainId()) {
            $data->{'domainId'} = $object->getDomainId();
        }
        if (null !== $object->getVendorAccountId()) {
            $data->{'vendorAccountId'} = $object->getVendorAccountId();
        }
        if (null !== $object->getExternalTag()) {
            $data->{'externalTag'} = $object->getExternalTag();
        }
        return $data;
    }
}