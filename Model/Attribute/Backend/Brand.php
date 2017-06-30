<?php

/**
 * @Author: Ngo Quang Cuong
 * @Date:   2017-06-30 14:32:31
 * @Last Modified by:   nquangcuong
 * @Last Modified time: 2017-06-30 14:32:48
 * @website: http://giaphugroup.com
 */

namespace PHPCuong\ProductAttributes\Model\Attribute\Backend;

class Brand extends \Magento\Eav\Model\Entity\Attribute\Backend\AbstractBackend
{
    /**
     * @var \PHPCuong\ProductAttributes\Model\Attribute\Source\Brand
     */
    private $brandList;

    /**
     * Init
     * @param \PHPCuong\ProductAttributes\Model\Attribute\Source\Brand $brandList
     */
    public function __construct(\PHPCuong\ProductAttributes\Model\Attribute\Source\Brand $brandList)
    {
        $this->brandList = $brandList;
    }

    /**
     * @param \Magento\Framework\DataObject $object
     *
     * @return $this
     */
    public function beforeSave($object)
    {
        $brandCode = $object->getData($this->getAttribute()->getAttributeCode());

        if (!$this->checkAttributeValue($brandCode)) {
            throw new \Magento\Framework\Exception\LocalizedException(
                __('The brand code: '.$brandCode.' is not exist.')
            );
        }

        return parent::beforeSave($object);
    }

    /**
     * Check exist of the brand code
     * @return bool
     */
    public function checkAttributeValue($brandCode)
    {
        $values = $this->brandList->getAllBrand();
        foreach ($values as $key=>$value) {
            if ($key == $brandCode) {
                return true;
            }
        }
        return false;
    }
}
