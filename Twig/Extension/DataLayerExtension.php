<?php

namespace Lexik\Bundle\DataLayerBundle\Twig\Extension;

use Lexik\Bundle\DataLayerBundle\Manager\DataLayerManager;

/**
 * DataLayerExtension
 */
class DataLayerExtension extends \Twig\Extension\AbstractExtension
{
    /**
     * @var DataLayerManager
     */
    protected $dataLayerManager;

    /**
     * @param DataLayerManager $manager
     */
    public function __construct(DataLayerManager $manager)
    {
        $this->dataLayerManager = $manager;
    }

    /**
     * @return array
     */
    public function getDataLayer()
    {
        $data = $this->dataLayerManager->all();
        $this->dataLayerManager->reset();

        return json_encode($data);
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return [
            new \Twig\TwigFunction('lexik_data_layer', [$this, 'getDataLayer'], ['is_safe' => ['html']]),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'lexik_data_layer';
    }
}
