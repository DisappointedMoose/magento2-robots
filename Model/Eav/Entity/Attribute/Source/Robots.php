<?php

namespace DisappointedMoose\Robots\Model\Eav\Entity\Attribute\Source;

class Robots extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource implements \Magento\Framework\Data\OptionSourceInterface
{
    const VALUE_NOT_SET = 0;
    const VALUE_INDEX_FOLLOW = 1;
    const VALUE_NOINDEX_FOLLOW = 2;
    const VALUE_INDEX_NOFOLLOW = 3;
    const VALUE_NOINDEX_NOFOLLOW = 4;

    /**
     * Retrieve all options array
     *
     * @return array
     */
    public function getAllOptions()
    {
        if ($this->_options === null) {
            $this->_options = [
                ['value' => self::VALUE_NOT_SET, 'label' => __('Default')],
                ['value' => self::VALUE_INDEX_FOLLOW, 'label' => 'INDEX, FOLLOW'],
                ['value' => self::VALUE_NOINDEX_FOLLOW, 'label' => 'NOINDEX, FOLLOW'],
                ['value' => self::VALUE_INDEX_NOFOLLOW, 'label' => 'INDEX, NOFOLLOW'],
                ['value' => self::VALUE_NOINDEX_NOFOLLOW, 'label' => 'NOINDEX, NOFOLLOW']
            ];
        }
        return $this->_options;
    }

    /**
     * Get a text for option value
     *
     * @param string|int $value
     * @return string|false
     */
    public function getOptionText($value)
    {
        $options = $this->getAllOptions();
        foreach ($options as $option) {
            if ($option['value'] == $value) {
                return $option['label'];
            }
        }
        return false;
    }
}