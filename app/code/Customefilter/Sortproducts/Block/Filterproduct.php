<?php
namespace Customefilter\Sortproducts\Block;
class Filterproduct extends \Magento\Framework\View\Element\Template
{
    public function __construct(
        \Magento\Framework\Url $url,
        \Magento\Framework\View\Element\Template\Context $context
    ) {
            $this->url = $url;
            parent::__construct($context);
    }
    public function skufilter()
    {
        $currenturl = $this->url->getCurrentUrl();
        $word = "product_list_order=";
        $desc ='&product_list_dir=desc';

        $count = 0;
        if(strpos($currenturl, $word) == false){
            if(strpos($currenturl, '?') == false){
                $currenturl.='?'.$word.'sku';
                $count++;
                return $currenturl;  
            }else{
                $currenturl.='&'.$word.'sku';
                $count++;
                return $currenturl;
            }
        }
        elseif(strpos($currenturl,'name') != false){
            $currenturl = str_replace('name','sku',$currenturl);
            // print_r($currenturl);
            // die;
            return $currenturl;
        }
        elseif($count == 0 && strpos($currenturl, $desc) == false)
        {
            $currenturl.=$desc;    
            return $currenturl;
        }
        else {
                $currenturl = str_replace($desc,"",$currenturl);
                return $currenturl;
        }


    }

    public function namefilter()
    {
        $currenturl = $this->url->getCurrentUrl();
        $word = "product_list_order=";
        $desc ='&product_list_dir=desc';
        $count = 0;   
        if(strpos($currenturl, $word) == false){
            if(strpos($currenturl, '?') == false){
                $currenturl.='?'.$word.'name';
                $count++;
                return $currenturl;  
            }else{
                $currenturl.='&'.$word.'name';
                $count++;
                return $currenturl;
            }
        }
        elseif(strpos($currenturl,'sku') != false){
            $currenturl = str_replace('sku','name',$currenturl);
            // print_r($currenturl);
            // die;
            return $currenturl;
        } 
        elseif($count == 0 && strpos($currenturl, $desc) == false)
        {
            $currenturl.=$desc;    
            return $currenturl;
        }
        else {
                $currenturl = str_replace($desc,"",$currenturl);
                return $currenturl;
        }

    }


}