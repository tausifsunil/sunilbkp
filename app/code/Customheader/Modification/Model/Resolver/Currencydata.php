<?php
declare(strict_types=1);
namespace Customheader\Modification\Model\Resolver;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;

class Currencydata implements ResolverInterface
{
    public function __construct(
        \Magento\Directory\Block\Currency $currency
    ) {
        $this->currency = $currency;
    }

    /**
     * @inheritdoc
     */
    public function resolve(
        Field $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    ) {
        $currencydata = $this->getcurrencydata();
        return $currencydata;
    }

    /**
     * @return array
     * @throws GraphQlNoSuchEntityException
     */
    private function getcurrencydata(): array
    {
        try { 
                $currencydata = $this->currency;
                $Cunfiguredcurrency = $currencydata->getCurrencies();
                $keys = array_keys($Cunfiguredcurrency);
                $value = array_values($Cunfiguredcurrency);
                for($i=0;$i<sizeof($Cunfiguredcurrency);$i++)
                {
                    $data[] = $keys[$i]."-".$value[$i];
                }
                    $CurrencyList['list'] = [];
                    $count = 0 ;
                    foreach($data as $datas) {
                         $CurrencyList['list'][$count]['countryname'] = $datas;
                         $count++;
                }
                // $currency[''] = $data;
                // print_r($currency['currency']);;                
                // $headerdata['currency']

        } catch (NoSuchEntityException $e) {
            throw new GraphQlNoSuchEntityException(__($e->getMessage()), $e);
        }
            return $CurrencyList;
    }
}
