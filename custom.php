 <?php
use Magento\Framework\App\Bootstrap;
require 'app/bootstrap.php';
$bootstrap = Bootstrap::create(BP, $_SERVER);
$objectManager = $bootstrap->getObjectManager();
$state = $objectManager->get('Magento\Framework\App\State');
$store = $objectManager->get('Magento\Store\Model\StoreManagerInterface');
echo "<pre>";
// print_r(get_class_methods($store));
// $stores = $store->getStores();
// $ids= array();
// foreach ($stores as $storeId => $storeData) {
//     $ids[] = $storeId;
// }

// print_r($ids);
// die;
$state->setAreaCode('frontend');
// $state->setAreaCode('adminhtml');

/** @var \Magento\Catalog\Model\ResourceModel\Product\Collection $productCollection */
$productCollection = $objectManager->create('Magento\Catalog\Model\ResourceModel\Product\Collection');
/** Apply filters here */
// echo "<pre>";
// print_r(get_class_methods($productCollection));
// die;
$collection = $productCollection->setStoreId(1)->addAttributeToSelect('*')->addAttributeToSort('entity_id', 'ASC')->load();
$count =0;
foreach ($collection as $product){
        // echo"<pre>";print_r(get_class_methods($product));die;
            // $product->setShipSize('10011 in');
        $product->setName('test');
        $product->save();
        // print_r($product->getData());

        // $product->setShipHeight("3.0");
        // $product->setShipWidth("14");
        $count++;
    //     [ship_size] => 3.5
    // [ship_height] => 3.5
    // [ship_width] => 14
        // print_r(get_class_methods($product));
        // die;
     // echo $product->getPrice().'<br>';
}  

echo $count."prodcuts updated";
?>
