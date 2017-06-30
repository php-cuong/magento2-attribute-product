<?php

/**
 * @Author: Ngo Quang Cuong
 * @Date:   2017-06-30 14:30:50
 * @Last Modified by:   nquangcuong
 * @Last Modified time: 2017-06-30 14:31:42
 * @website: http://giaphugroup.com
 */

namespace PHPCuong\ProductAttributes\Model\Attribute\Source;

class Brand extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    /**
     * Get all options
     * @return array
     */
    public function getAllOptions()
    {
        if (!$this->_options) {
            $brands = $this->getAllBrand();
            $options = [];
            foreach ($brands as $key=>$value) {
                $options[] = [
                    'label' => $value,
                    'value' => $key
                ];
            }
            $this->_options = $options;
        }
        return $this->_options;
    }

    /**
     * The brands list
     * @return array
     */
    public function getAllBrand()
    {
        return [
            '' => '--Select a Brand--',
            'hermes' => 'Hermes',
            'louis-vuitton' => 'Louis Vuitton',
            'chanel' => 'Chanel',
            'versace' => 'Versace',
            'gucci' => 'Gucci',
            'christian-dior' => 'Christian Dior',
            'paul-smith' => 'Paul Smith',
            'palph-lauren' => 'Ralph Lauren',
            'prada' => 'Prada',
            'hug-boss' => 'Hug Boss',
            'armani' => 'Armani',
            'buberry' => 'Buberry',
            'dolce-gabbana' => 'Dolce & Gabbana',
            'ermenegildo-zegna' => 'Ermenegildo Zegna',
            'ferragamo' => 'Ferragamo'
        ];
    }
}
