<?php

/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;

$installer->startSetup();

$setup = new Mage_Eav_Model_Entity_Setup('core_setup');

$entityTypeId     = $setup->getEntityTypeId('customer');
$attributeSetId   = $setup->getDefaultAttributeSetId($entityTypeId);
$attributeGroupId = $setup->getDefaultAttributeGroupId($entityTypeId, $attributeSetId);

$installer->addAttribute($entityTypeId, 'license_id',  array(
    'type'     => 'varchar',
    'backend'  => '',
    'label'    => 'License ID',
    'input'    => 'text',
    'source'   => '',
    'visible'  => true,
    'required' => true,
    'default'  => '',
    'frontend' => '',
    'unique'   => false,
    'note'     => 'License ID'
));

$attribute = Mage::getSingleton('eav/config')->getAttribute('customer', 'license_id');

$setup->addAttributeToGroup(
    $entityTypeId,
    $attributeSetId,
    $attributeGroupId,
    'license_id',
    '100'
);

$used_in_forms = array();

$used_in_forms[] = 'adminhtml_customer';

$attribute->setData('used_in_forms', $used_in_forms)
        ->setData('is_used_for_customer_segment', true)
        ->setData('is_system', 0)
        ->setData('is_user_defined', 1)
        ->setData('is_visible', 1)
        ->setData('sort_order', 100);

$attribute->save();

$installer->endSetup();