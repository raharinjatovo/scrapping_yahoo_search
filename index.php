

<?php
function get_images($data)
{
    return $data->getAttribute('data');
}
function remove_wrong_link($string)
{
    // remove element from yahoo.com url
    return (!strpos($string, 'yahoo.com') !== FALSE);
}
function get_href($data)
{
    return $data->getAttribute('href');
}
function data()
{
    $link='https://fr.images.search.yahoo.com/search/images;_ylt=AwrJS5dMFghcBh4AgWpjAQx.;_ylu=X3oDMTE0aDRlcHI2BGNvbG8DaXIyBHBvcwMxBHZ0aWQDQjY1NjlfMQRzZWMDcGl2cw--?p='.urlencode('messi').'&fr2=piv-web&fr=yfp-t-905-s';
$html=file_get_contents($link);




/*
echo 	'<img src="'.$imgs[2].'">';*/
$html=file_get_contents($link);


$dom = new domDocument;
@$dom->loadHTML($html);
$dom->preserveWhiteSpace = false;
$images = $dom->getElementsByTagName('li');


$imgs = array_map('get_images',$images);


$imgs1 = array();
$dom1 = new domDocument;
@$dom1->loadHTML($html);
$dom1->preserveWhiteSpace = false;
$images1 = $dom1->getElementsByTagName('a');
print_r($images1);
foreach ($images1 as $image) {
$imgs1[] = $image->getAttribute('href');//atribut qui sort l'image 
}
//  $imgs1 = array_map('get_href',$images1);

//print_r($imgs1);
// print_r($imgs1);



$b = array_filter($imgs1,'remove_wrong_link');
print_r($b[100]);
}
for ($i=0; $i <=1000 ; $i++) { 
    # code...
    data();
}