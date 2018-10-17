<?php

namespace SmartCAT\API\Normalizer;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;

class ProjectTranslationMemoryModelNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCAT\\API\\Model\\ProjectTranslationMemoryModel') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCAT\API\Model\ProjectTranslationMemoryModel) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCAT\API\Model\ProjectTranslationMemoryModel();
        if (property_exists($data, 'id')) {
            $object->setId($data->{'id'});
        }
        if (property_exists($data, 'matchThreshold')) {
            $object->setMatchThreshold($data->{'matchThreshold'});
        }
        if (property_exists($data, 'targetLanguageId')) {
            $object->setTargetLanguageId($data->{'targetLanguageId'});
        }
        if (property_exists($data, 'isWritable')) {
            $object->setIsWritable($data->{'isWritable'});
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getId()) {
            $data->{'id'} = $object->getId();
        }
        if (null !== $object->getMatchThreshold()) {
            $data->{'matchThreshold'} = $object->getMatchThreshold();
        }
        if (null !== $object->getTargetLanguageId()) {
            $data->{'targetLanguageId'} = $object->getTargetLanguageId();
        }
        if (null !== $object->getIsWritable()) {
            $data->{'isWritable'} = $object->getIsWritable();
        }
        return $data;
    }
}