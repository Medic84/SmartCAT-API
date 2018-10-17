<?php

namespace SmartCAT\API\Normalizer;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;

class ProjectModelNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCAT\\API\\Model\\ProjectModel') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCAT\API\Model\ProjectModel) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCAT\API\Model\ProjectModel();
        if (property_exists($data, 'id')) {
            $object->setId($data->{'id'});
        }
        if (property_exists($data, 'name')) {
            $object->setName($data->{'name'});
        }
        if (property_exists($data, 'description')) {
            $object->setDescription($data->{'description'});
        }
        if (property_exists($data, 'deadline')) {
            $object->setDeadline(new \DateTime($data->{'deadline'}));
        }
        if (property_exists($data, 'creationDate')) {
            $object->setCreationDate(new \DateTime($data->{'creationDate'}));
        }
        if (property_exists($data, 'createdByUserId')) {
            $object->setCreatedByUserId($data->{'createdByUserId'});
        }
        if (property_exists($data, 'modificationDate')) {
            $object->setModificationDate(new \DateTime($data->{'modificationDate'}));
        }
        if (property_exists($data, 'sourceLanguage')) {
            $object->setSourceLanguage($data->{'sourceLanguage'});
        }
        if (property_exists($data, 'targetLanguages')) {
            $values = array();
            foreach ($data->{'targetLanguages'} as $value) {
                $values[] = $value;
            }
            $object->setTargetLanguages($values);
        }
        if (property_exists($data, 'status')) {
            $object->setStatus($data->{'status'});
        }
        if (property_exists($data, 'statusModificationDate')) {
            $object->setStatusModificationDate(new \DateTime($data->{'statusModificationDate'}));
        }
        if (property_exists($data, 'domainId')) {
            $object->setDomainId($data->{'domainId'});
        }
        if (property_exists($data, 'clientId')) {
            $object->setClientId($data->{'clientId'});
        }
        if (property_exists($data, 'vendorAccountId')) {
            $object->setVendorAccountId($data->{'vendorAccountId'});
        }
        if (property_exists($data, 'workflowStages')) {
            $values_1 = array();
            foreach ($data->{'workflowStages'} as $value_1) {
                $values_1[] = $this->serializer->deserialize($value_1, 'SmartCAT\\API\\Model\\ProjectWorkflowStageModel', 'raw', $context);
            }
            $object->setWorkflowStages($values_1);
        }
        if (property_exists($data, 'documents')) {
            $values_2 = array();
            foreach ($data->{'documents'} as $value_2) {
                $values_2[] = $this->serializer->deserialize($value_2, 'SmartCAT\\API\\Model\\DocumentModel', 'raw', $context);
            }
            $object->setDocuments($values_2);
        }
        if (property_exists($data, 'externalTag')) {
            $object->setExternalTag($data->{'externalTag'});
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getId()) {
            $data->{'id'} = $object->getId();
        }
        if (null !== $object->getName()) {
            $data->{'name'} = $object->getName();
        }
        if (null !== $object->getDescription()) {
            $data->{'description'} = $object->getDescription();
        }
        if (null !== $object->getDeadline()) {
            $data->{'deadline'} = $object->getDeadline()->format("Y-m-d\TH:i:sP");
        }
        if (null !== $object->getCreationDate()) {
            $data->{'creationDate'} = $object->getCreationDate()->format("Y-m-d\TH:i:sP");
        }
        if (null !== $object->getCreatedByUserId()) {
            $data->{'createdByUserId'} = $object->getCreatedByUserId();
        }
        if (null !== $object->getModificationDate()) {
            $data->{'modificationDate'} = $object->getModificationDate()->format("Y-m-d\TH:i:sP");
        }
        if (null !== $object->getSourceLanguage()) {
            $data->{'sourceLanguage'} = $object->getSourceLanguage();
        }
        if (null !== $object->getTargetLanguages()) {
            $values = array();
            foreach ($object->getTargetLanguages() as $value) {
                $values[] = $value;
            }
            $data->{'targetLanguages'} = $values;
        }
        if (null !== $object->getStatus()) {
            $data->{'status'} = $object->getStatus();
        }
        if (null !== $object->getStatusModificationDate()) {
            $data->{'statusModificationDate'} = $object->getStatusModificationDate()->format("Y-m-d\TH:i:sP");
        }
        if (null !== $object->getDomainId()) {
            $data->{'domainId'} = $object->getDomainId();
        }
        if (null !== $object->getClientId()) {
            $data->{'clientId'} = $object->getClientId();
        }
        if (null !== $object->getVendorAccountId()) {
            $data->{'vendorAccountId'} = $object->getVendorAccountId();
        }
        if (null !== $object->getWorkflowStages()) {
            $values_1 = array();
            foreach ($object->getWorkflowStages() as $value_1) {
                $values_1[] = $this->serializer->serialize($value_1, 'raw', $context);
            }
            $data->{'workflowStages'} = $values_1;
        }
        if (null !== $object->getDocuments()) {
            $values_2 = array();
            foreach ($object->getDocuments() as $value_2) {
                $values_2[] = $this->serializer->serialize($value_2, 'raw', $context);
            }
            $data->{'documents'} = $values_2;
        }
        if (null !== $object->getExternalTag()) {
            $data->{'externalTag'} = $object->getExternalTag();
        }
        return $data;
    }
}