<?php
declare(strict_types=1);
namespace Customheader\Modification\Model\Resolver;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;

class Headerdata implements ResolverInterface
{
    public function __construct(
        \Magento\Directory\Block\Currency $currency,
        \Magento\Theme\Block\Html\Header\Logo $logo
    ) {
        $this->currency = $currency;
        $this->logo = $logo;
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
        $Headerdata = $this->getHeaderdata();
        return $Headerdata;
    }

    /**
     * @return array
     * @throws GraphQlNoSuchEntityException
     */
    private function getHeaderdata(): array
    {
        try { 
                $currencydata = $this->currency;
                $logodata = $this->logo;
                $Cunfiguredcurrency = $currencydata->getCurrencies();
                $keys = array_keys($Cunfiguredcurrency);
                $value = array_values($Cunfiguredcurrency);
                $count=0;
                for($i=0;$i<sizeof($Cunfiguredcurrency);$i++)
                {
                    $data[] = $keys[$i]."-".$value[$i];
                }
                $headerdata = [];
                $headerdata['logosrc'] = $logodata->getLogoSrc(); 
                $headerdata['logoAlt'] = $logodata->getLogoAlt(); 
                $headerdata['logoWidth'] = $logodata->getLogoWidth(); 
                $headerdata['logoHeight'] = $logodata->getLogoHeigth();
                
                // $headerdata['currency']

        } catch (NoSuchEntityException $e) {
            throw new GraphQlNoSuchEntityException(__($e->getMessage()), $e);
        }
            return $headerdata;
    }
}
