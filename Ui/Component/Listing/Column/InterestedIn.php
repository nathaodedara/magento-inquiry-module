<?php
namespace Invigorate\Inquiry\Ui\Component\Listing\Column;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Ui\Component\Listing\Columns\Column;
class InterestedIn extends Column
{
public function __construct(
    ContextInterface $context,
    UiComponentFactory $uiComponentFactory,
    array $components = [],
    array $data = [])
    {
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$items) {
                if ($items['interested_in'] == '') {
                    $items['interested_in'] = '------------------';
                }
            }
        }
        return $dataSource;
    }
}