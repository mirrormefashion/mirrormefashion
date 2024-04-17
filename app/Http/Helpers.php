<?php

use App\Http\Controllers\ClubPointController;
use App\Http\Controllers\AffiliateController;
use App\Currency;
use App\BusinessSetting;
use App\ProductStock;
use App\Address;
use App\CustomerPackage;
use App\Upload;
use App\Translation;
use App\City;
use App\Utility\CategoryUtility;
use App\Wallet;
use App\CombinedOrder;
use App\User;
use App\Models\BodyData;
use App\Addon;
use App\BodyStat;
use Illuminate\Support\Carbon;
use App\Http\Controllers\CommissionController;
use App\Utility\SendSMSUtility;
use App\Utility\NotificationUtility;
//sensSMS function for OTP
if (!function_exists('sendSMS')) {
    function sendSMS($to, $from, $text, $template_id)
    {
        return SendSMSUtility::sendSMS($to, $from, $text, $template_id);
    }
}
//Notification  function for mute or unmute
if (!function_exists('isNotify')) {
    function isNotify($user)
    {
        $time = $user->is_notify;
        $current = Carbon::now();
        switch ($time) {
            case 1:
                return true;
                break;
            case 0:
                return false;
                break;
            case $current > $time:
                return true;
                break;
            default:
                return false;
        }
    }
}

//sensSMS function for OTP

if (!function_exists('genarateAlphanumericCode')) {
    function genarateAlphanumericCode()
    {
     $user = auth()->user();
     $body_data = BodyData::where('user_id',$user->id)->first();
     $weight_class = BodyStat::where('user_id',$user->id)->pluck('weight_class')->first();
     $alphaNum1='';
     $alphaNum2='';
     $alphaNum3='';
     $alphaNum4 ='';
     $alphaNum5 ='';
     $alphaNum6 ='';
     $alphaNum7 ='';
switch($weight_class){
    case "skinny":
        $alphaNum1 = "NY_";
        break;
    case "average":
        $alphaNum1 = "VG_";
        break;
    case "above":
        $alphaNum1 = "VE_";
        break;

        default: $alphaNum1 = "MO_";
}

     // This statement will generate Apha Code for Stomach Shape
switch (strtolower($body_data->stomach_shape)) {
    case "average":
        $alphaNum2 = "001_";
        break;
    case "curvy":
        $alphaNum2 = "002_";
        break;
    case "spoon":
        $alphaNum2 = "003_";
        break;
    case "muffintop":
        $alphaNum2 = "004_";
        break;
    case "rectangle":
        $alphaNum2 = "005_";
        break;
    case "pouch":
        $alphaNum2 = "006_";
        break;
    case "round":
        $alphaNum2 = "007_";
        break;
    case "layered":
        $alphaNum2 = "008_";
        break;

    default:$alphaNum2 = "009";
}

//alphanumeric code for head and neck shape
if (strtolower($body_data->head_size)== "narrow"){




    switch(strtolower($body_data->head_shape)){
        case 'oval': $alphaNum3 = "HNVS_";
        break;
        case 'oblong':  $alphaNum3 = "HNBS_";
        break;
        default: $alphaNum3 = "HNRS_";
    }

   } else if (strtolower($body_data->head_size)== "average") {

    switch(strtolower($body_data->head_shape)){
        case "oval":
             $alphaNum3 = "HAVS_";
        break;
        case "oblong":
              $alphaNum3 = "HABS_";
        break;
        default:
        $alphaNum3 = "HARS_";
    }


   } else {
       //large head

       switch(strtolower($body_data->head_shape)){
        case 'oval': $alphaNum3 = "HLVS_";
        break;
        case 'oblong':  $alphaNum3 = "HLBS_";
        break;
        default: $alphaNum3 = "HLRS_";
    }

   }

//alphanumeric code for shoulders
if ($body_data->shoulder_width == "narrow") {
    switch(strtolower($body_data->shoulder_height)){
        case 'strong': $alphaNum4 = "NWSS_";
        break;
        case 'average':  $alphaNum4 = "NWAS_";
        break;
        default: $alphaNum4 = "NWDS_";
    }

} else if (strtolower($body_data->shoulder_width) == "average") {

    switch(strtolower($body_data->shoulder_height)){
        case 'strong': $alphaNum4 = "AWSS_";
        break;
        case 'average':  $alphaNum4 = "AWAS_";
        break;
        default: $alphaNum4 = "AWDS_";
    }


} else {
    switch(strtolower($body_data->shoulder_height)){
        case 'strong': $alphaNum4 = "BWSS_";
        break;
        case 'average':  $alphaNum4 = "BWAS_";
        break;
        default: $alphaNum4 = "BWDS_";
    }

}


//alphanumeric code for breasts and arms
if ($body_data->bust === "A" || $body_data->bust === "AA" || $body_data->bust === "B"){
    if ($body_data->arm_size === "thin"){
        $alphaNum5 == "SBTA_";
    } else if ($body_data->arm_size === "average"){
        $alphaNum5 == "SBAA_";
    } else {
        //arm size big
        $alphaNum5 == "SBBA_";
    }
} else if ($body_data->bust === "C" || $body_data->bust === "D/DD") {
    if ($body_data->arm_size === "thin"){
        $alphaNum5 == "ABTA_";
    } else if ($body_data->arm_size === "average"){
        $alphaNum5 == "ABAA_";
    } else {
        //arm size big
        $alphaNum5 == "ABBA_";
    }
} else if ($body_data->bust === "DDD/E" || $body_data->bust === "F/G") {
    if ($body_data->arm_size === "thin"){
        $alphaNum5 == "LBTA_";
    } else if ($body_data->arm_size === "average"){
        $alphaNum5 == "LBAA_";
    } else {
        //arm size big
        $alphaNum5 == "LBBA_";
    }
} else { //$body_data->bust class enormous
    if ($body_data->arm_size === "thin"){
        $alphaNum5 == "EBTA_";
    } else if ($body_data->arm_size === "average"){
        $alphaNum5 == "EBAA_";
    } else {
        //arm size big
        $alphaNum5 == "EBBA_";
    }
}

//alphanumeric code for height
if ($body_data->height > 67) { //tall
    $alphaNum6 = "100_";
}
else if ( $body_data->height < 60) { //small
     $alphaNum6 = "001_";
}
else {
//Average
$alphaNum6 = "111_";
}

//alphanumeric code for legs and hips
if (strtolower($body_data->legs_size) == "small"){
    switch(strtolower($body_data->hips)){
        case 'none': $alphaNum7 = "SLNH";
        break;
        case 'some':  $alphaNum7 = "SLSH";
        break;
        default: $alphaNum7 = "SLWH";
    }

} else if ($body_data->height > 60 && $body_data->height < 67) {
    switch(strtolower($body_data->hips)){
        case 'none': $alphaNum7 = "ALNH";
        break;
        case 'some':  $alphaNum7 = "ALSH";
        break;
        default: $alphaNum7 = "ALWH";
    }

} else { //leg size big
    switch(strtolower($body_data->hips)){
        case 'none': $alphaNum7 = "BLNH";
        break;
        case 'some':  $alphaNum7 = "BLSH";
        break;
        default: $alphaNum7 = "BLWH";
    }

}

 return$alphaNum1.$alphaNum2.$alphaNum3.$alphaNum4.$alphaNum5.$alphaNum6.$alphaNum7;

}
}

if (!function_exists('isTopFriend')) {
    function isTopFriend($receiver)
    {

        $top_friends = json_decode(auth()->user()->top_10_friends);

        if (in_array($receiver->id, $top_friends)) {
          return true;
        }else{
            return false;
        }
    }
}
//highlights the selected navigation on admin panel
if (!function_exists('areActiveRoutes')) {
    function areActiveRoutes(array $routes, $output = "active")
    {
        foreach ($routes as $route) {
            if (Route::currentRouteName() == $route) return $output;
        }
    }
}

//highlights the selected navigation on frontend
if (!function_exists('areActiveRoutesHome')) {
    function areActiveRoutesHome(array $routes, $output = "active")
    {
        foreach ($routes as $route) {
            if (Route::currentRouteName() == $route) return $output;
        }
    }
}

//highlights the selected navigation on frontend
if (!function_exists('default_language')) {
    function default_language()
    {
        return env("DEFAULT_LANGUAGE");
    }
}

/**
 * Save JSON File
 * @return Response
 */
if (!function_exists('convert_to_usd')) {
    function convert_to_usd($amount)
    {
        $business_settings = get_setting('system_default_currency');
        if ($business_settings != null) {
            $currency = Currency::find($business_settings->value);
            return (floatval($amount) / floatval($currency->exchange_rate)) * Currency::where('code', 'USD')->first()->exchange_rate;
        }
    }
}

if (!function_exists('convert_to_kes')) {
    function convert_to_kes($amount)
    {
        $business_settings = get_setting('system_default_currency');
        if ($business_settings != null) {
            $currency = Currency::find($business_settings->value);
            return (floatval($amount) / floatval($currency->exchange_rate)) * Currency::where('code', 'KES')->first()->exchange_rate;
        }
    }
}

//filter products based on vendor activation system
if (!function_exists('filter_products')) {
    function filter_products($products)
    {
        $verified_sellers = verified_sellers_id();
        if (get_setting('vendor_system_activation') == 1) {
            return $products->where('approved', '1')->where('published', '1')->where('auction_product', 0)->orderBy('created_at', 'desc')->where(function ($p) use ($verified_sellers) {
                $p->where('added_by', 'admin')->orWhere(function ($q) use ($verified_sellers) {
                    $q->whereIn('user_id', $verified_sellers);
                });
            });
        } else {
            return $products->where('published', '1')->where('auction_product', 0)->where('added_by', 'admin');
        }
    }
}

//cache products based on category
if (!function_exists('get_cached_products')) {
    function get_cached_products($category_id = null)
    {
        $products = \App\Product::where('published', 1)->where('approved', '1')->where('auction_product', 0);
        $verified_sellers = verified_sellers_id();
        if (get_setting('vendor_system_activation') == 1) {
            $products = $products->where(function ($p) use ($verified_sellers) {
                $p->where('added_by', 'admin')->orWhere(function ($q) use ($verified_sellers) {
                    $q->whereIn('user_id', $verified_sellers);
                });
            });
        } else {
            $products = $products->where('added_by', 'admin');
        }

        if ($category_id != null) {
            return Cache::remember('products-category-' . $category_id, 86400, function () use ($category_id, $products) {
                $category_ids = CategoryUtility::children_ids($category_id);
                $category_ids[] = $category_id;
                return $products->whereIn('category_id', $category_ids)->latest()->take(12)->get();
            });
        } else {
            return Cache::remember('products', 86400, function () use ($products) {
                return $products->latest()->take(12)->get();
            });
        }
    }
}

if (!function_exists('verified_sellers_id')) {
    function verified_sellers_id()
    {
        return Cache::rememberForever('verified_sellers_id', function () {
            return App\Seller::where('verification_status', 1)->pluck('user_id')->toArray();
        });
    }
}

if (!function_exists('get_system_default_currency')) {
    function get_system_default_currency()
    {
        return Cache::remember('system_default_currency', 86400, function () {
            return Currency::findOrFail(get_setting('system_default_currency'));
        });
    }
}

//converts currency to home default currency
if (!function_exists('convert_price')) {
    function convert_price($price)
    {
        if (Session::has('currency_code') && (Session::get('currency_code') != get_system_default_currency()->code)) {
            $price = floatval($price) / floatval(get_system_default_currency()->exchange_rate);
            $price = floatval($price) * floatval(Session::get('currency_exchange_rate'));
        }
        return $price;
    }
}

//gets currency symbol
if (!function_exists('currency_symbol')) {
    function currency_symbol()
    {
        if (Session::has('currency_symbol')) {
            return Session::get('currency_symbol');
        }
        return get_system_default_currency()->symbol;
    }
}

//formats currency
if (!function_exists('format_price')) {
    function format_price($price)
    {
        if (get_setting('decimal_separator') == 1) {
            $fomated_price = number_format($price, get_setting('no_of_decimals'));
        } else {
            $fomated_price = number_format($price, get_setting('no_of_decimals'), ',', ' ');
        }

        if (get_setting('symbol_format') == 1) {
            return currency_symbol() . $fomated_price;
        } else if (get_setting('symbol_format') == 3) {
            return currency_symbol() . ' ' . $fomated_price;
        } else if (get_setting('symbol_format') == 4) {
            return $fomated_price . ' ' . currency_symbol();
        }
        return $fomated_price . currency_symbol();
    }
}

//formats price to home default price with convertion
if (!function_exists('single_price')) {
    function single_price($price)
    {
        return format_price(convert_price($price));
    }
}

//Shows Price on page based on low to high
if (!function_exists('home_price')) {
    function home_price($product, $formatted = true)
    {
        $lowest_price = $product->unit_price;
        $highest_price = $product->unit_price;

        if ($product->variant_product) {
            foreach ($product->stocks as $key => $stock) {
                if ($lowest_price > $stock->price) {
                    $lowest_price = $stock->price;
                }
                if ($highest_price < $stock->price) {
                    $highest_price = $stock->price;
                }
            }
        }

        foreach ($product->taxes as $product_tax) {
            if ($product_tax->tax_type == 'percent') {
                $lowest_price += ($lowest_price * $product_tax->tax) / 100;
                $highest_price += ($highest_price * $product_tax->tax) / 100;
            } elseif ($product_tax->tax_type == 'amount') {
                $lowest_price += $product_tax->tax;
                $highest_price += $product_tax->tax;
            }
        }

        if ($formatted) {
            if ($lowest_price == $highest_price) {
                return format_price(convert_price($lowest_price));
            } else {
                return format_price(convert_price($lowest_price)) . ' - ' . format_price(convert_price($highest_price));
            }
        } else {
            return $lowest_price . ' - ' . $highest_price;
        }
    }
}

//Shows Price on page based on low to high with discount
if (!function_exists('home_discounted_price')) {
    function home_discounted_price($product, $formatted = true)
    {
        $lowest_price = $product->unit_price;
        $highest_price = $product->unit_price;

        if ($product->variant_product) {
            foreach ($product->stocks as $key => $stock) {
                if ($lowest_price > $stock->price) {
                    $lowest_price = $stock->price;
                }
                if ($highest_price < $stock->price) {
                    $highest_price = $stock->price;
                }
            }
        }

        $discount_applicable = false;

        if ($product->discount_start_date == null) {
            $discount_applicable = true;
        } elseif (
            strtotime(date('d-m-Y H:i:s')) >= $product->discount_start_date &&
            strtotime(date('d-m-Y H:i:s')) <= $product->discount_end_date
        ) {
            $discount_applicable = true;
        }

        if ($discount_applicable) {
            if ($product->discount_type == 'percent') {
                $lowest_price -= ($lowest_price * $product->discount) / 100;
                $highest_price -= ($highest_price * $product->discount) / 100;
            } elseif ($product->discount_type == 'amount') {
                $lowest_price -= $product->discount;
                $highest_price -= $product->discount;
            }
        }

        foreach ($product->taxes as $product_tax) {
            if ($product_tax->tax_type == 'percent') {
                $lowest_price += ($lowest_price * $product_tax->tax) / 100;
                $highest_price += ($highest_price * $product_tax->tax) / 100;
            } elseif ($product_tax->tax_type == 'amount') {
                $lowest_price += $product_tax->tax;
                $highest_price += $product_tax->tax;
            }
        }

        if ($formatted) {
            if ($lowest_price == $highest_price) {
                return format_price(convert_price($lowest_price));
            } else {
                return format_price(convert_price($lowest_price)) . ' - ' . format_price(convert_price($highest_price));
            }
        } else {
            return $lowest_price . ' - ' . $highest_price;
        }
    }
}

//Shows Base Price
if (!function_exists('home_base_price_by_stock_id')) {
    function home_base_price_by_stock_id($id)
    {
        $product_stock = ProductStock::findOrFail($id);
        $price = $product_stock->price;
        $tax = 0;

        foreach ($product_stock->product->taxes as $product_tax) {
            if ($product_tax->tax_type == 'percent') {
                $tax += ($price * $product_tax->tax) / 100;
            } elseif ($product_tax->tax_type == 'amount') {
                $tax += $product_tax->tax;
            }
        }
        $price += $tax;
        return format_price(convert_price($price));
    }
}
if (!function_exists('home_base_price')) {
    function home_base_price($product, $formatted = true)
    {
        $price = $product->unit_price;
        $tax = 0;

        foreach ($product->taxes as $product_tax) {
            if ($product_tax->tax_type == 'percent') {
                $tax += ($price * $product_tax->tax) / 100;
            } elseif ($product_tax->tax_type == 'amount') {
                $tax += $product_tax->tax;
            }
        }
        $price += $tax;
        return $formatted ? format_price(convert_price($price)) : $price;
    }
}

//Shows Base Price with discount
if (!function_exists('home_discounted_base_price_by_stock_id')) {
    function home_discounted_base_price_by_stock_id($id)
    {
        $product_stock = ProductStock::findOrFail($id);
        $product = $product_stock->product;
        $price = $product_stock->price;
        $tax = 0;

        $discount_applicable = false;

        if ($product->discount_start_date == null) {
            $discount_applicable = true;
        } elseif (
            strtotime(date('d-m-Y H:i:s')) >= $product->discount_start_date &&
            strtotime(date('d-m-Y H:i:s')) <= $product->discount_end_date
        ) {
            $discount_applicable = true;
        }

        if ($discount_applicable) {
            if ($product->discount_type == 'percent') {
                $price -= ($price * $product->discount) / 100;
            } elseif ($product->discount_type == 'amount') {
                $price -= $product->discount;
            }
        }

        foreach ($product->taxes as $product_tax) {
            if ($product_tax->tax_type == 'percent') {
                $tax += ($price * $product_tax->tax) / 100;
            } elseif ($product_tax->tax_type == 'amount') {
                $tax += $product_tax->tax;
            }
        }
        $price += $tax;

        return format_price(convert_price($price));
    }
}

//Shows Base Price with discount
if (!function_exists('home_discounted_base_price')) {
    function home_discounted_base_price($product, $formatted = true)
    {
        $price = $product->unit_price;
        $tax = 0;

        $discount_applicable = false;

        if ($product->discount_start_date == null) {
            $discount_applicable = true;
        } elseif (
            strtotime(date('d-m-Y H:i:s')) >= $product->discount_start_date &&
            strtotime(date('d-m-Y H:i:s')) <= $product->discount_end_date
        ) {
            $discount_applicable = true;
        }

        if ($discount_applicable) {
            if ($product->discount_type == 'percent') {
                $price -= ($price * $product->discount) / 100;
            } elseif ($product->discount_type == 'amount') {
                $price -= $product->discount;
            }
        }

        foreach ($product->taxes as $product_tax) {
            if ($product_tax->tax_type == 'percent') {
                $tax += ($price * $product_tax->tax) / 100;
            } elseif ($product_tax->tax_type == 'amount') {
                $tax += $product_tax->tax;
            }
        }
        $price += $tax;

        return $formatted ? format_price(convert_price($price)) : $price;
    }
}

if (!function_exists('renderStarRating')) {
    function renderStarRating($rating, $maxRating = 5)
    {
        $fullStar = "<i class = 'las la-star active'></i>";
        $halfStar = "<i class = 'las la-star half'></i>";
        $emptyStar = "<i class = 'las la-star'></i>";
        $rating = $rating <= $maxRating ? $rating : $maxRating;

        $fullStarCount = (int)$rating;
        $halfStarCount = ceil($rating) - $fullStarCount;
        $emptyStarCount = $maxRating - $fullStarCount - $halfStarCount;

        $html = str_repeat($fullStar, $fullStarCount);
        $html .= str_repeat($halfStar, $halfStarCount);
        $html .= str_repeat($emptyStar, $emptyStarCount);
        echo $html;
    }
}

function translate($key, $lang = null)
{
    if($lang == null){
        $lang = App::getLocale();
    }

    $lang_key = preg_replace('/[^A-Za-z0-9\_]/', '', str_replace(' ', '_', strtolower($key)));

    $translations_default = Cache::rememberForever('translations-'.env('DEFAULT_LANGUAGE', 'en'), function () {
        return Translation::where('lang', env('DEFAULT_LANGUAGE', 'en'))->pluck('lang_value', 'lang_key')->toArray();
    });

    if(!isset($translations_default[$lang_key])){
        $translation_def = new Translation;
        $translation_def->lang = env('DEFAULT_LANGUAGE', 'en');
        $translation_def->lang_key = $lang_key;
        $translation_def->lang_value = $key;
        $translation_def->save();
        Cache::forget('translations-'.env('DEFAULT_LANGUAGE', 'en'));
    }

    $translation_locale = Cache::rememberForever('translations-'.$lang, function () use ($lang) {
        return Translation::where('lang', $lang)->pluck('lang_value', 'lang_key')->toArray();
    });

    //Check for session lang
    if(isset($translation_locale[$lang_key])){
        return $translation_locale[$lang_key];
    }
    elseif(isset($translations_default[$lang_key])){
        return $translations_default[$lang_key];
    }
    else{
        return $key;
    }
}

function remove_invalid_charcaters($str)
{
    $str = str_ireplace(array("\\"), '', $str);
    return str_ireplace(array('"'), '\"', $str);
}

function getShippingCost($carts, $index)
{
    $admin_products = array();
    $seller_products = array();
    $calculate_shipping = 0;

    foreach ($carts as $key => $cartItem) {
        $product = \App\Product::find($cartItem['product_id']);
        if ($product->added_by == 'admin') {
            array_push($admin_products, $cartItem['product_id']);
        } else {
            $product_ids = array();
            if (isset($seller_products[$product->user_id])) {
                $product_ids = $seller_products[$product->user_id];
            }
            array_push($product_ids, $cartItem['product_id']);
            $seller_products[$product->user_id] = $product_ids;
        }
    }

    //Calculate Shipping Cost
    if (get_setting('shipping_type') == 'flat_rate') {
        $calculate_shipping = get_setting('flat_rate_shipping_cost');
    } elseif (get_setting('shipping_type') == 'seller_wise_shipping') {
        if (!empty($admin_products)) {
            $calculate_shipping = get_setting('shipping_cost_admin');
        }
        if (!empty($seller_products)) {
            foreach ($seller_products as $key => $seller_product) {
                $calculate_shipping += \App\Shop::where('user_id', $key)->first()->shipping_cost;
            }
        }
    } elseif (get_setting('shipping_type') == 'area_wise_shipping') {
        $shipping_info = Address::where('id', $carts[0]['address_id'])->first();
        $city = City::where('name', $shipping_info->city)->first();
        if ($city != null) {
            $calculate_shipping = $city->cost;
        }
    }

    $cartItem = $carts[$index];
    $product = \App\Product::find($cartItem['product_id']);

    if ($product->digital == 1) {
        return $calculate_shipping = 0;
    }

    if (get_setting('shipping_type') == 'flat_rate') {
        return $calculate_shipping / count($carts);
    } elseif (get_setting('shipping_type') == 'seller_wise_shipping') {
        if ($product->added_by == 'admin') {
            return get_setting('shipping_cost_admin') / count($admin_products);
        } else {
            return \App\Shop::where('user_id', $product->user_id)->first()->shipping_cost / count($seller_products[$product->user_id]);
        }
    } elseif (get_setting('shipping_type') == 'area_wise_shipping') {
        if ($product->added_by == 'admin') {
            return $calculate_shipping / count($admin_products);
        } else {
            return $calculate_shipping / count($seller_products[$product->user_id]);
        }
    } else {
        if($product->is_quantity_multiplied && get_setting('shipping_type') == 'product_wise_shipping') {
            return  $product->shipping_cost * $cartItem['quantity'];
        }
        return $product->shipping_cost;
    }
}

function timezones()
{
    return Timezones::timezonesToArray();
}

if (!function_exists('app_timezone')) {
    function app_timezone()
    {
        return config('app.timezone');
    }
}

if (!function_exists('api_asset')) {
    function api_asset($id)
    {
        if (($asset = \App\Upload::find($id)) != null) {
            return $asset->file_name;
        }
        return "";
    }
}

//return file uploaded via uploader
if (!function_exists('uploaded_asset')) {
    function uploaded_asset($id)
    {
        if (($asset = \App\Upload::find($id)) != null) {
            return my_asset($asset->file_name);
        }
        return null;
    }
}

//return file uploaded via uploader
if (!function_exists('is_video')) {
    function is_video($id)
    {
        if (($asset = \App\Upload::find($id)) != null) {
            if($asset->type=="video"){
                return true;
            }else{
                return false;
            }

        }
        return false;
    }
}
if (!function_exists('my_asset')) {
    /**
     * Generate an asset path for the application.
     *
     * @param string $path
     * @param bool|null $secure
     * @return string
     */
    function my_asset($path, $secure = null)
    {
        if (env('FILESYSTEM_DRIVER') == 's3') {
            return Storage::disk('s3')->url($path);
        } else {
            return app('url')->asset('public/' . $path, $secure);
        }
    }
}

if (!function_exists('static_asset')) {
    /**
     * Generate an asset path for the application.
     *
     * @param string $path
     * @param bool|null $secure
     * @return string
     */
    function static_asset($path, $secure = null)
    {
        return app('url')->asset('public/' . $path, $secure);
    }
}


// if (!function_exists('isHttps')) {
//     function isHttps()
//     {
//         return !empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS']);
//     }
// }

if (!function_exists('getBaseURL')) {
    function getBaseURL()
    {
        $root = '//' . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);

        return $root;
    }
}


if (!function_exists('getFileBaseURL')) {
    function getFileBaseURL()
    {
        if (env('FILESYSTEM_DRIVER') == 's3') {
            return env('AWS_URL') . '/';
        } else {
            return getBaseURL() . 'public/';
        }
    }
}


if (!function_exists('isUnique')) {
    /**
     * Generate an asset path for the application.
     *
     * @param string $path
     * @param bool|null $secure
     * @return string
     */
    function isUnique($email)
    {
        $user = \App\User::where('email', $email)->first();

        if ($user == null) {
            return '1'; // $user = null means we did not get any match with the email provided by the user inside the database
        } else {
            return '0';
        }
    }
}

if (!function_exists('get_setting')) {
    function get_setting($key, $default = null, $lang = false)
    {
        $settings = Cache::remember('business_settings', 86400, function () {
            return BusinessSetting::all();
        });

        if ($lang == false) {
            $setting = $settings->where('type', $key)->first();
        } else {
            $setting = $settings->where('type', $key)->where('lang', $lang)->first();
            $setting = !$setting ? $settings->where('type', $key)->first() : $setting;
        }
        return $setting == null ? $default : $setting->value;
    }
}

function hex2rgba($color, $opacity = false)
{
    return Colorcodeconverter::convertHexToRgba($color, $opacity);
}

if (!function_exists('isAdmin')) {
    function isAdmin()
    {
        if (Auth::check() && (Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'staff')) {
            return true;
        }
        return false;
    }
}

if (!function_exists('isSeller')) {
    function isSeller()
    {
        if (Auth::check() && Auth::user()->user_type == 'seller') {
            return true;
        }
        return false;
    }
}

if (!function_exists('isCustomer')) {
    function isCustomer()
    {
        if (Auth::check() && Auth::user()->user_type == 'customer') {
            return true;
        }
        return false;
    }
}

if (!function_exists('formatBytes')) {
    function formatBytes($bytes, $precision = 2)
    {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        // Uncomment one of the following alternatives
        $bytes /= pow(1024, $pow);
        // $bytes /= (1 << (10 * $pow));

        return round($bytes, $precision) . ' ' . $units[$pow];
    }
}

// duplicates m$ excel's ceiling function
if (!function_exists('ceiling')) {
    function ceiling($number, $significance = 1)
    {
        return (is_numeric($number) && is_numeric($significance)) ? (ceil($number / $significance) * $significance) : false;
    }
}

if (!function_exists('get_images')) {
    function get_images($given_ids, $with_trashed = false)
    {
        if (is_array($given_ids)) {
            $ids = $given_ids;
        } elseif ($given_ids == null) {
            $ids = [];
        } else {
            $ids = explode(",", $given_ids);
        }


        return $with_trashed
            ? Upload::withTrashed()->whereIn('id', $ids)->get()
            : Upload::whereIn('id', $ids)->get();
    }
}

//for api
if (!function_exists('get_images_path')) {
    function get_images_path($given_ids, $with_trashed = false)
    {
        $paths = [];
        $images = get_images($given_ids, $with_trashed);
        if (!$images->isEmpty()) {
            foreach ($images as $image) {
                $paths[] = !is_null($image) ? $image->file_name : "";
            }
        }

        return $paths;
    }
}

//for api
if (!function_exists('checkout_done')) {
    function checkout_done($combined_order_id, $payment)
    {
        $combined_order = CombinedOrder::find($combined_order_id);

        foreach ($combined_order->orders as $key => $order) {
            $order->payment_status = 'paid';
            $order->payment_details = $payment;
            $order->save();

            try {
                NotificationUtility::sendOrderPlacedNotification($order);
                calculateCommissionAffilationClubPoint($order);
            } catch (\Exception $e) {

            }
        }
    }
}

//for api
if (!function_exists('wallet_payment_done')) {
    function wallet_payment_done($user_id, $amount, $payment_method, $payment_details)
    {
        $user = \App\User::find($user_id);
        $user->balance = $user->balance + $amount;
        $user->save();

        $wallet = new Wallet;
        $wallet->user_id = $user->id;
        $wallet->amount = $amount;
        $wallet->payment_method = $payment_method;
        $wallet->payment_details = $payment_details;
        $wallet->save();
    }
}

if (!function_exists('purchase_payment_done')) {
    function purchase_payment_done($user_id, $package_id)
    {
        $user = User::findOrFail($user_id);
        $user->customer_package_id = $package_id;
        $customer_package = CustomerPackage::findOrFail($package_id);
        $user->remaining_uploads += $customer_package->product_upload;
        $user->save();

        return 'success';
    }
}

//Commission Calculation
if (!function_exists('calculateCommissionAffilationClubPoint')) {
    function calculateCommissionAffilationClubPoint($order)
    {
        $commissionController = new CommissionController();
        $commissionController->calculateCommission($order);

        if (addon_is_activated('affiliate_system')) {
            $affiliateController = new AffiliateController;
            $affiliateController->processAffiliatePoints($order);
        }

        if (addon_is_activated('club_point')) {
            if ($order->user != null) {
                $clubpointController = new ClubPointController;
                $clubpointController->processClubPoints($order);
            }
        }

        $order->commission_calculated = 1;
        $order->save();
    }
}

// Addon Activation Check
if (!function_exists('addon_is_activated')) {
    function addon_is_activated($identifier, $default = null)
    {
        $addons = Cache::remember('addons', 86400, function () {
            return Addon::all();
        });

        $activation = $addons->where('unique_identifier', $identifier)->where('activated', 1)->first();
        return $activation == null ? false : true;
    }

}


if (!function_exists('bodyShapes'))
{
    function bodyShapes()
    {
        $bodyShapes = array(
            // DEFAULT EMPTY SHAPE
            // 'empty' => array(
            //     'shape' => '',
            //     'shapeTitle' => '',
            //     'username' => auth()->user()->username ?? '',
            //     'userHeight' => auth()->user()->bodyShape->height ?? '',
            //     'shapeImg' => '',
            //     'shapeImgB' => '',
            //     'shapeChar' => '',
            //     'celebMatch' => '',
            //     'celebName' => '',
            //     'celebOcc' => '',
            //     'celebDescript' => '',
            //     'shapeOview' => array(),
            //     'closetEss' => array(),
            //     'basics' => array() ,
            //     'snapshotsCharacteristics' => array()
            // ),


            'skinny' => array(
                'shape' => 'Skinny',
                'shapeTitle' => 'Skinny/Thin Body Shape',
                'username' => auth()->user()->username ?? '',
                'userHeight' => auth()->user()->bodyShape->height ?? '',
                'shapeImg' => '/images/body-shape/front-skinny.png',
                'shapeImgB' => '/images/body-shape/back-skinny.png',
                'shapeChar' => '<p>Even though skinny body shapes are ideal, unless you’re an aspiring runway model you may desire a more voluptuous figure. It’s undeniable that your slender shape gives you a wider range of styles to choose from. If you avoid the things you shouldn’t wear and use your choices to project a fashion statement, you can achieve impeccable personal style. </p><p>In general, slender women look great in ensembles that do the opposite on the other half of the body (upper or lower). If you’re wearing a slim, well-fitted shirt on top, a lengthy, flowing maxi skirt would be a great touch. If you decide to wear a third piece like a cardigan or blazer, which would add weight to your upper half, skinny jeans as the reverse would make a great look for you.</p><p>As a slender woman you should choose pieces that elongate your body, namely your torso, legs and arms: fitted long sleeves; lengthy shirts; maxi dresses; trench coats; low-rise pants (elongates your torso) and high-rise pants (elongates your legs) are just a few examples. Lines down your body also make you longer: buttoned shirts, lengthy, open blazers, and creased pants. Strategically placed pleats, pockets, and gathers can give you a little extra hip and bust when adjacent to the body feature you want to enlarge.</p><p>Having too many small articles in one ensemble like a sleeveless cropped top with a miniskirt; a bodycon dress; and tight-all-over outfits aren’t the best choices for you. The small fabric against your long limbs will make you look underdressed and hacked – not sexy. Also, unless you’re a teenager avoid overly girlish (flowery, puffy, princess-like) pieces which make you look adolescent.</p><p>Impressive styling comes from individuals who seek to make a statement with their fashion choices. Self-expression is the main point of getting dressed. For you, since you have a body type whose proportions cannot easily be thrown off you should focus on who you want to be inside your clothes, and then style yourself. </p><p>There are many fashion movements; urban, hipster, bohemian, country, you name it. Have fun experimenting with different styles of dress and try to invent something all your own – something that reflects the true inner you.</p>',
                'celebMatch' => '/images/celebs/mkate-ashley.jpg',
                'celebName' => 'Mary Kate & Ashley Olsen',
                'celebOcc' => 'Actresses, Businesswomen',
                'celebDescript' => 'America’s twin girls! These adorable cuties of <em>Full House</em> have blossomed into beautiful, stylish young women with a penchant for fashion. The Council of Fashion Designers of America (CFDA) awarded them Womenswear Designer of the Year for their line The Row in 2012, and Accessory Designers of the Year in 2014. The Row, a high end fashion line, is manufactured in the U.S. – one of few designer brands made in America.These young ladies are not only designers with lines in big box retailers like Wal-mart and J.C. Penny that generate billions in sales each year, they are published authors of the book <em>Influence</em>, which chronicles artists and designers who have influenced them over the years.The Olsen’s may have started as child stars but they’ve widened their reach by becoming designers of both high end and discount fashion, and trendsetters of the ashcan chic style, a contemporary version of boho-chic.',
                'shapeOview' => array(
                    'You have a below average BMI',
                    'You have a small bust',
                    'You have lean legs and a small bottom',
                ),
                'closetEss' => array(
                    'Maxi Dress' => '<p>A one piece, flowing maxi dress looks amazing on your slender frame. A loose-fitting, bohemian style maxi would look amazing on you. Even as a shorter, more petite skinny shape, by lengthening your limbs maxi dresses give you a statuesque, graceful look that can only be achieved by women with your shape.</p><p>If you’re a petite or shorter woman pair your maxi dress with a wedge heel or sandal. Flat scandals pair well with a maxi dress and stilettos clash with the comfortable, carefree, earthy style of the look. If you are a taller woman you can opt for a flatter shoe. </p><p>To give variety to the look, wear it with a cropped jacket and/or neck accessories like a thin scarf or necklace.</p>',
                    'Button-Up Shirt' => '<p>Whether you call it button-up or button-down depends on how filled is your cup. Regardless, this shirt style can be worn with almost anything and look great.  You may assume that this sort of masculine-looking piece won’t work as well on your slender figure; that it can’t soften your look or flatter your feminine features. To the contrary, no one can rock a button-up shirt like you can. </p><p>A button-up shirt is a closet essential for you because it creates a look that is more edgy than cute. Your shape gives you the flexibility to be androgynous, which creates a tantalizing variety of sex appeal that very few women can pull off. A button-up shirt, with or without a collar, makes for one of the most stylish looks.</p><p>Wear it with a boot or bootie. Flats and heels also work, in fact; most shoe styles work with this look except for bulky sneakers. Button-up shirts with an exposed placket will draw a line down your body, elongating your torso. Notwithstanding, wear it tucked or untucked especially at the office. Tapered bottoms re-introduce femininity to this look. </p><p>Experiment with different styles of button-ups including sleeveless and patterned designs (plaid and polka dot can work). Overwear (a third piece) will make for a great final touch. Wear your layer open over this shirt. </p>',
                    'Black Longsleeve Crewneck Shirt' => '<p>Much like a button-up shirt, a black, longsleeve shirt that closes at the neckline works well for you. When a crewneck shirt, which fits snugly around your neck, has sleek long sleeves and a slimming black color the result is a clean, refined look that only you can achieve. It an obvious but unexpected choice for women with your shape and it matches everything – wear it with frequency.</p>',
                    'A Cropped Oversized Shirt' => '<p>Being thin has the advantage of letting you wear different styles and layers without it throwing off your shape. You don’t want to wear too many oversized layers, but at the same time there are days when you just want to be relaxed and comfortable. A cropped, oversized shirt that you can throw on over another shirt is a great way to pull off a casual, carefree look.</p><p>The purpose of the crop is not to define your waistline. Your shape is thin enough; people won’t mistake you as a round shape. The crop makes a clear statement of your intention that today is a laid-back day. If the shirt has some asymmetry at the hemline even better.</p><p>Your body shape can handle many layers. This piece celebrates that fact in a subtly defiant yet forceful way.</p>',
                    'Rounded Hemlines' => '<p>Your body shape comes alive whenever a ‘u’ shape is against it. Boatneck, scoopneck and u-neck tops; diagonal- and cap-sleeves; and u-shaped hemlines are all examples of a rounded shape. It brings softness to your slender physique.</p><p>Even though u-shapes in the neckline and sleeves soften your body shape, u-shaped hemlines do a better job of bringing out the femininity of your thin figure. Whenever you want to dress casually with a light tank or tee choose a shirt with this style.</p>',
                    'A Trench' => '<p>Your body shape looks great in long overwear that drops below your bottom or to your ankles as in trench and duster style jackets. Wear it open to show off your fit body. The sleeves can be almost any style and look great: long sleeves, sleeveless, flared and so on. </p><p>Like a flowing maxi dress, the length of the trench brings with it an air that your body type carries well.  Trench coats and jackets command respect. Own several.</p>'
                ),

                'basics' => array(
                	'Don’t drape yourself in too much oversized fabrics.',
                	'Don’t wear yoga pants casually.',
                	'Don’t wear mini, skinny, tight-all-over ensembles including bodycon dresses unless clubbing.',
                	'Do use large belts and sashes across your body. ',
                	'Do draw lines down your body to elongate your figure – button down shirts, creased pants, straight overwear, etc.',
                	'Avoid large details or embellishments like bows and puffs, which will dwarf your slender figure.',
                	'Avoid halter cropped tops and sleeveless cropped tops especially when paired with skinny, short or tight bottoms.',
                	'Do not wear overly basic, muted tees or tanks.'
                ) ,
                'snapshotsCharacteristics' => array(
                    'Your BMI is low.',
                    'Your bust is a small B- or A-cup size',
                    'Your limbs are long and lean.'
                )
            ),

            'busty-skinny' => array(
                'shape' => 'Busty Skinny',
                'shapeTitle' => 'Busty Skinny Shape',
                'username' => auth()->user()->username ?? '',
                'userHeight' => auth()->user()->bodyShape->height ?? '',
                'shapeImg' => '/images/body-shape/front-skinny.png',
                'shapeImgB' => '/images/body-shape/back-skinny.png',
                'shapeChar' => '<p>**Even though skinny body shapes are ideal, unless you’re an aspiring runway model you may desire a more voluptuous figure. It’s undeniable that your slender shape gives you a wider range of styles to choose from. If you avoid the things you shouldn’t wear and use your choices to project a fashion statement, you can achieve impeccable personal style. </p><p>In general, slender women look great in ensembles that do the opposite on the other half of the body (upper or lower). If you’re wearing a slim, well-fitted shirt on top, a lengthy, flowing maxi skirt would be a great touch. If you decide to wear a third piece like a cardigan or blazer, which would add weight to your upper half, skinny jeans as the reverse would make a great look for you.</p><p>As a slender woman you should choose pieces that elongate your body, namely your torso, legs and arms: fitted long sleeves; lengthy shirts; maxi dresses; trench coats; low-rise pants (elongates your torso) and high-rise pants (elongates your legs) are just a few examples. Lines down your body also make you longer: buttoned shirts, lengthy, open blazers, and creased pants. Strategically placed pleats, pockets, and gathers can give you a little extra hip and bust when adjacent to the body feature you want to enlarge.</p><p>Having too many small articles in one ensemble like a sleeveless cropped top with a miniskirt; a bodycon dress; and tight-all-over outfits aren’t the best choices for you. The small fabric against your long limbs will make you look underdressed and hacked – not sexy. Also, unless you’re a teenager avoid overly girlish (flowery, puffy, princess-like) pieces which make you look adolescent.</p><p>Impressive styling comes from individuals who seek to make a statement with their fashion choices. Self-expression is the main point of getting dressed. For you, since you have a body type whose proportions cannot easily be thrown off you should focus on who you want to be inside your clothes, and then style yourself. </p><p>There are many fashion movements; urban, hipster, bohemian, country, you name it. Have fun experimenting with different styles of dress and try to invent something all your own – something that reflects the true inner you.</p>',
                'celebMatch' => '/images/celebs/mkate-ashley.jpg',
                'celebName' => 'Mary Kate & Ashley Olsen',
                'celebOcc' => 'Actresses, Businesswomen',
                'celebDescript' => 'America’s twin girls! These adorable cuties of <em>Full House</em> have blossomed into beautiful, stylish young women with a penchant for fashion. The Council of Fashion Designers of America (CFDA) awarded them Womenswear Designer of the Year for their line The Row in 2012, and Accessory Designers of the Year in 2014. The Row, a high end fashion line, is manufactured in the U.S. – one of few designer brands made in America.These young ladies are not only designers with lines in big box retailers like Wal-mart and J.C. Penny that generate billions in sales each year, they are published authors of the book <em>Influence</em>, which chronicles artists and designers who have influenced them over the years.The Olsen’s may have started as child stars but they’ve widened their reach by becoming designers of both high end and discount fashion, and trendsetters of the ashcan chic style, a contemporary version of boho-chic.',
                'shapeOview' => array(
                    'You have a below average BMI',
                    'You have a small bust',
                    'You have lean legs and a small bottom',
                ),
                'closetEss' => array(
                    'Maxi Dress' => '<p>A one piece, flowing maxi dress looks amazing on your slender frame. A loose-fitting, bohemian style maxi would look amazing on you. Even as a shorter, more petite skinny shape, by lengthening your limbs maxi dresses give you a statuesque, graceful look that can only be achieved by women with your shape.</p><p>If you’re a petite or shorter woman pair your maxi dress with a wedge heel or sandal. Flat scandals pair well with a maxi dress and stilettos clash with the comfortable, carefree, earthy style of the look. If you are a taller woman you can opt for a flatter shoe. </p><p>To give variety to the look, wear it with a cropped jacket and/or neck accessories like a thin scarf or necklace.</p>',
                    'Button-Up Shirt' => '<p>Whether you call it button-up or button-down depends on how filled is your cup. Regardless, this shirt style can be worn with almost anything and look great.  You may assume that this sort of masculine-looking piece won’t work as well on your slender figure; that it can’t soften your look or flatter your feminine features. To the contrary, no one can rock a button-up shirt like you can. </p><p>A button-up shirt is a closet essential for you because it creates a look that is more edgy than cute. Your shape gives you the flexibility to be androgynous, which creates a tantalizing variety of sex appeal that very few women can pull off. A button-up shirt, with or without a collar, makes for one of the most stylish looks.</p><p>Wear it with a boot or bootie. Flats and heels also work, in fact; most shoe styles work with this look except for bulky sneakers. Button-up shirts with an exposed placket will draw a line down your body, elongating your torso. Notwithstanding, wear it tucked or untucked especially at the office. Tapered bottoms re-introduce femininity to this look. </p><p>Experiment with different styles of button-ups including sleeveless and patterned designs (plaid and polka dot can work). Overwear (a third piece) will make for a great final touch. Wear your layer open over this shirt. </p>',
                    'Black Longsleeve Crewneck Shirt' => '<p>Much like a button-up shirt, a black, longsleeve shirt that closes at the neckline works well for you. When a crewneck shirt, which fits snugly around your neck, has sleek long sleeves and a slimming black color the result is a clean, refined look that only you can achieve. It an obvious but unexpected choice for women with your shape and it matches everything – wear it with frequency.</p>',
                    'A Cropped Oversized Shirt' => '<p>Being thin has the advantage of letting you wear different styles and layers without it throwing off your shape. You don’t want to wear too many oversized layers, but at the same time there are days when you just want to be relaxed and comfortable. A cropped, oversized shirt that you can throw on over another shirt is a great way to pull off a casual, carefree look.</p><p>The purpose of the crop is not to define your waistline. Your shape is thin enough; people won’t mistake you as a round shape. The crop makes a clear statement of your intention that today is a laid-back day. If the shirt has some asymmetry at the hemline even better.</p><p>Your body shape can handle many layers. This piece celebrates that fact in a subtly defiant yet forceful way.</p>',
                    'Rounded Hemlines' => '<p>Your body shape comes alive whenever a ‘u’ shape is against it. Boatneck, scoopneck and u-neck tops; diagonal- and cap-sleeves; and u-shaped hemlines are all examples of a rounded shape. It brings softness to your slender physique.</p><p>Even though u-shapes in the neckline and sleeves soften your body shape, u-shaped hemlines do a better job of bringing out the femininity of your thin figure. Whenever you want to dress casually with a light tank or tee choose a shirt with this style.</p>',
                    'A Trench' => '<p>Your body shape looks great in long overwear that drops below your bottom or to your ankles as in trench and duster style jackets. Wear it open to show off your fit body. The sleeves can be almost any style and look great: long sleeves, sleeveless, flared and so on. </p><p>Like a flowing maxi dress, the length of the trench brings with it an air that your body type carries well.  Trench coats and jackets command respect. Own several.</p>'
                ),

                'basics' => array(
                	'Don’t drape yourself in too much oversized fabrics.',
                	'Don’t wear yoga pants casually.',
                	'Don’t wear mini, skinny, tight-all-over ensembles including bodycon dresses unless clubbing.',
                	'Do use large belts and sashes across your body. ',
                	'Do draw lines down your body to elongate your figure – button down shirts, creased pants, straight overwear, etc.',
                	'Avoid large details or embellishments like bows and puffs, which will dwarf your slender figure.',
                	'Avoid halter cropped tops and sleeveless cropped tops especially when paired with skinny, short or tight bottoms.',
                	'Do not wear overly basic, muted tees or tanks.'
                ) ,
                'snapshotsCharacteristics' => array(
                    'Your BMI is low.',
                    'Your bust is a small B- or A-cup size',
                    'Your limbs are long and lean.'
                )
            ),

            'average' => array(
                'shape' => 'Average',
                'shapeTitle' => 'Average/Athletic Body Shape',
                'username' => auth()->user()->username ?? '',
                'userHeight' => auth()->user()->bodyShape->height ?? '',
                'shapeImg' => '/images/body-shape/front-average.png',
                'shapeImgB' => '/images/body-shape/back-average.png',
                'shapeChar' => '<p>Are you tired of wearing yoga pants every day? Even though you have a fit body it doesn’t do much to help you when it’s time to get dressed. </p><p>Much like an hourglass, because your body is already so well proportioned, your blessing is difficult to work around. Make your waistline, ankles and feet the focal point of your dressing. As long as a you have a pant that goes well with your shoes <em>and</em> a defined waistline you’re golden. If your waistline is covered – make sure it is intentionally covered and wear slim, tapered pants – cigarette pants, chinos, skinnylegs. </p><p>Avoid basic clothing: plain, muted colors; overly casual looks like jeans and a tee; jeans and flat shoes. For you, a basic style with a proper fit can easily become boring so make sure your comfortable clothing uses at least one piece that pops. Don’t wear a solid black leather jacket; wear a red leather with a huge logo on back and rhinestones near the arm holes. Add matching shoes to the equation, which is most important. Using this example, even if the rest of your outfit comprises solid colors or basic cuts you will have created a stylish look for yourself. Want to wear plain yet comfortable blue jeans that you can just throw on? Wear it with a wash and a cut or two on the thighs. Want to wear a plain tee in white or some other muted color? Pair it with high rise jeans and tuck-in the top to show off the highness of your rise against the slimness of your waist! Make some element of your wardrobe nuanced to take your outfit from boring to stunning. </p>',
                'celebMatch' => '/images/celebs/milakunis.png',
                'celebName' => 'Mila Kunis',
                'celebOcc' => 'Actress, Mom',
                'celebDescript' => 'The voice of Meg Griffin on one of our favorite animated shows, <em>Family Guy</em>, Mila has had a long career on the big and small screen that started at age 9.Her long filmography includes great roles like <em>Gia</em> where she played a young Gia Corangy, <em>The Book of Eli</em> and <em>Bad Moms</em>, her most recent hit. Mila is a talented beauty who we love seeing on TV, film and the red carpet.',
                'recommendations' => '',
                'shapeOview' => array(
                    'You have an average BMI',
                    'You typically have a B-cup size',
                    'Your bust and hips are equally proportioned',
                ) ,
                'closetEss' => array(
                    'An Interesting Third Piece ' => '<p>Your body shape doesn’t require much to look good. Conversely, it can’t handle solid, muted colors as can some other body shapes because basic styles and solid colors make you look too commonplace. The most straightforward way to fix this is with an interesting third piece. </p><p>Have manifold jackets, blazers and cardigans in unique styles, colors and designs. Don’t by overwear in solid colors. If you want to wear a piece with a single color make sure that the color is bold and radiant or that the style is unique. An extra wide lapel that folds over several times or a peplum blazer are examples of a distinctively designed layer. </p><p>If you don’t want to play dress up every day, have several third pieces in your closet in different lengths. </p>',
                    'Nylon Bomber Jacket' => '<p>One third-piece style that you must own is a bomber jacket. Bomber jackets are made as an urban look so it gives off a relaxed vibe. There’s nothing spectacular about a bomber jacket. However, the puffed-out body of the jacket, its collarless neckline, and its length perfectly matches your body type. </p><p>As an average body shape you are advised to steer from overly basic, boring styles but since a bomber jacket is designed to give off an unaffected look, this piece, even though it doesn’t wow, gives you permission to be ultra-casual and still look good.</p><p>This is one of few times that we would recommend a synthetic fiber. Wear it well.</p>',
                    'Shoes' => '<p>Believe it or not there are some shapes that can get away with wearing run down footwear. For you, however; this is not the case. Your shoes are essential to creating a stylish ensemble, so make sure that you have wide variety of shoes to match any outfit you may want to wear. </p><p>Tie together your jackets, clutches, handbags and belts with your shoes matching even the finest detail. You cannot neglect your footwear.</p>',
                    'A One-Piece Dress' => '<p>On days when you want to really shake things up throw on a one-piece dress. Women with your shape rarely wear dresses even though you have the body for it. Find a well-fitting one piece – it doesn’t have to be flamboyant – and keep it around for a good day. Make sure the dress fits properly. If it’s too short, too loose or too tight it will kill the look. </p><p>This piece is not an LBD. This one-piece dress should be something with color that looks more elegant than sexy.</p>',
                ) ,
                'basics' => array(
                    'Avoid puffs, princess lines, flowers and other girlish looks.',
                    'Do wear bold, fierce colors and patterns.',
                    'Do have a variety of different shoes and shoe style. Your footwear is important.',
                    'Don’t wear yoga pants every day. Are you going to the gym? Are you quickly running to the store? Gym clothes are no substitute for a casual look.',
                    'Do reserve bodycon dresses and skirts for the nightclub',

                ) ,
                'snapshotsCharacteristics' => array(
                    'Your BMI is normal',
                    'You can be considered athletic and may also be petite',
                    'Your bust is a B-cup size',
                    'Your bust and hips are equally proportioned',
                ) ,
            ),

            'curvy-average' => array(
                'shape' => 'Cuvry Average',
                'shapeTitle' => 'Curvy Body Shape',
                'username' => auth()->user()->username ?? '',
                'userHeight' => auth()->user()->bodyShape->height ?? '',
                'shapeImg' => '/images/body-shape/front-average.png',
                'shapeImgB' => '/images/body-shape/back-average.png',
                'shapeChar' => '<p>*Are you tired of wearing yoga pants every day? Even though you have a fit body it doesn’t do much to help you when it’s time to get dressed. </p><p>Much like an hourglass, because your body is already so well proportioned, your blessing is difficult to work around. Make your waistline, ankles and feet the focal point of your dressing. As long as a you have a pant that goes well with your shoes <em>and</em> a defined waistline you’re golden. If your waistline is covered – make sure it is intentionally covered and wear slim, tapered pants – cigarette pants, chinos, skinnylegs. </p><p>Avoid basic clothing: plain, muted colors; overly casual looks like jeans and a tee; jeans and flat shoes. For you, a basic style with a proper fit can easily become boring so make sure your comfortable clothing uses at least one piece that pops. Don’t wear a solid black leather jacket; wear a red leather with a huge logo on back and rhinestones near the arm holes. Add matching shoes to the equation, which is most important. Using this example, even if the rest of your outfit comprises solid colors or basic cuts you will have created a stylish look for yourself. Want to wear plain yet comfortable blue jeans that you can just throw on? Wear it with a wash and a cut or two on the thighs. Want to wear a plain tee in white or some other muted color? Pair it with high rise jeans and tuck-in the top to show off the highness of your rise against the slimness of your waist! Make some element of your wardrobe nuanced to take your outfit from boring to stunning. </p>',
                'celebMatch' => '/images/celebs/milakunis.png',
                'celebName' => 'Mila Kunis',
                'celebOcc' => 'Actress, Mom',
                'celebDescript' => 'The voice of Meg Griffin on one of our favorite animated shows, <em>Family Guy</em>, Mila has had a long career on the big and small screen that started at age 9.Her long filmography includes great roles like <em>Gia</em> where she played a young Gia Corangy, <em>The Book of Eli</em> and <em>Bad Moms</em>, her most recent hit. Mila is a talented beauty who we love seeing on TV, film and the red carpet.',
                'recommendations' => '',
                'shapeOview' => array(
                    'You have an average BMI',
                    'You typically have a B-cup size',
                    'Your bust and hips are equally proportioned',
                ) ,
                'closetEss' => array(
                    'An Interesting Third Piece ' => '<p>Your body shape doesn’t require much to look good. Conversely, it can’t handle solid, muted colors as can some other body shapes because basic styles and solid colors make you look too commonplace. The most straightforward way to fix this is with an interesting third piece. </p><p>Have manifold jackets, blazers and cardigans in unique styles, colors and designs. Don’t by overwear in solid colors. If you want to wear a piece with a single color make sure that the color is bold and radiant or that the style is unique. An extra wide lapel that folds over several times or a peplum blazer are examples of a distinctively designed layer. </p><p>If you don’t want to play dress up every day, have several third pieces in your closet in different lengths. </p>',
                    'Nylon Bomber Jacket' => '<p>One third-piece style that you must own is a bomber jacket. Bomber jackets are made as an urban look so it gives off a relaxed vibe. There’s nothing spectacular about a bomber jacket. However, the puffed-out body of the jacket, its collarless neckline, and its length perfectly matches your body type. </p><p>As an average body shape you are advised to steer from overly basic, boring styles but since a bomber jacket is designed to give off an unaffected look, this piece, even though it doesn’t wow, gives you permission to be ultra-casual and still look good.</p><p>This is one of few times that we would recommend a synthetic fiber. Wear it well.</p>',
                    'Shoes' => '<p>Believe it or not there are some shapes that can get away with wearing run down footwear. For you, however; this is not the case. Your shoes are essential to creating a stylish ensemble, so make sure that you have wide variety of shoes to match any outfit you may want to wear. </p><p>Tie together your jackets, clutches, handbags and belts with your shoes matching even the finest detail. You cannot neglect your footwear.</p>',
                    'A One-Piece Dress' => '<p>On days when you want to really shake things up throw on a one-piece dress. Women with your shape rarely wear dresses even though you have the body for it. Find a well-fitting one piece – it doesn’t have to be flamboyant – and keep it around for a good day. Make sure the dress fits properly. If it’s too short, too loose or too tight it will kill the look. </p><p>This piece is not an LBD. This one-piece dress should be something with color that looks more elegant than sexy.</p>',
                ) ,
                'basics' => array(
                    'Avoid puffs, princess lines, flowers and other girlish looks.',
                    'Do wear bold, fierce colors and patterns.',
                    'Do have a variety of different shoes and shoe style. Your footwear is important.',
                    'Don’t wear yoga pants every day. Are you going to the gym? Are you quickly running to the store? Gym clothes are no substitute for a casual look.',
                    'Do reserve bodycon dresses and skirts for the nightclub',

                ) ,
                'snapshotsCharacteristics' => array(
                    'Your BMI is normal',
                    'You can be considered athletic and may also be petite',
                    'Your bust is a B-cup size',
                    'Your bust and hips are equally proportioned',
                ) ,
            ),

            'hourglass' => array(
                'shape' => 'Hourglass',
                'shapeTitle' => 'Classic Hourglass Body Shape',
                'username' => auth()->user()->username ?? '',
                'userHeight' => auth()->user()->bodyShape->height ?? '',
                'shapeImg' => '/images/body-shape/front-hourglass.png',
                'shapeImgB' => '/images/body-shape/back-hourglass.png',
                'shapeChar' => '<p>Yours is an enviable body type, but great responsibility comes with your gift. Not only do you have to avoid appearing too sexy in the clothes you wear, but also you have the privilege of requiring less clothe than other body shapes. <p>
                <p>The style advice Mirror Me Fashion gives tells people to create balance between the upper and lower portions of their bodies. But since yours is an already well-balanced body type - the only body shape with "perfect" proportions -
                wearing the wrong article can throw off your proportions. For that reason, figuring out what to wear can be challenging for you despite your perfect figure.<p>
                <p>Your goals are to 1) show it off in the right places while avoiding overt sexiness, and 2) avoid covering too much of the wrong body parts, which will cause you to appear pounds heavier.<p>',
                'celebMatch' => '/images/celebs/Sofia_Vergara.jpg',
                'celebName' => 'Sofia Vergara',
                'celebOcc' => 'Singer, Royalty, Mom, Businesswoman',
                'celebDescript' => 'Modern Family\'s Colombian sensation is a breath of fresh air. We are glad to see her on prime time as the much younger second wife to (known formerly as) Mr. Bundy. Latina beauty, joyous personality, and rising star.',
                'recommendations' => '',
                'shapeOview' => array(
                    'Your waist is small',
                    'Your bust and bottom have equal proportions',
                    'You have what is considered the ideal female body shape',
                ) ,
                'closetEss' => array(
                	'Wrap Dress' => '<p>More so than any other body type; your silhouette looks exceptional in a wrap dress. The Wrap Dress is Diane Von Fürstenberg\'s
                	famous creation. Because it exudes freeness and command, the wrap dress is a symbolize of women\'s liberation. (Just a bit of facts for you.)
                	The lines made by this dress as it curves your form, along with the v-neck at the bust, make it your most important closet essential. </p>
                	<p>Throw a pair of skinny jeans underneath it on days when you want to mix things up. Wrap dresses work with heels, sandals
                	and flats. Wrap dresses are a comfortable, stylish, quick-and-easy fashion choice - a hard to find combination for fashionable women. Even
                	though they want to, not all body shapes can wear a wrap dress. Lucky you! </p>',
                	'Pencil Skirt' => '<p>Your silhouette is to a pencil skirt what salt is to the ocean. The two are naturally come together. A pencil skirt is a classy,
                	stylish piece that you can wear to work and outside of work. It provides the right coverage for your body shape and it let\'s you
                	show off your curves without being too edgy.</p>
                	<p>Choose a high rise pencil skirt with a belt. A mermaid pencil skirt is equally befitting. A tucked in blouse that has a broad
                	shoulder or high collar creates the sophisticated look that you sometimes go for. The taper of
                	a pencil skirt draws lines that your well-proportioned body type wears well. Always prefer a pencil skirt over a straight skirt.</p>
                	<p>Pencil skirts work best with a high heel which also serves to lengthen your legs and lift your bottom. Be mindful that the
                	taller the heel the sexier the appeal. In other words: don\'t wear stiletto\'s to work!</p>',
                	'One-Piece Bodycon' => '<p>A one piece dress is a great example of how well one-piece garments fit your body type. You don\'t need any additional layers
                	to balance your body type since yours is already well-proportioned. Choose any design, color and pattern that you wish. Bodycon dresses
                	with broader shoulders and high necklines exude classic, sophisticated beauty. Shorter dresses, especially ones that also expose a lot of cleavage
                	are overly sexy and should be reserved for ladies night.</p>
                	<p>As recommended for all body types: avoid extremely tight bodycon dresses. Fitted one pieces already do a great job of hugging your
                	assets - don\'t hack a perfectly good look by wearing it too tight.</p>
                	<p>Pair your bodycon dress with a killer heel, matching clutch, and beautiful, perhaps rare, necklace, bangle or watch; and you\'ll
                	be ready to paint the town whatever color you choose!</p>',
                	'Accessories' => '<p>Go crazy with accessories! Spice it up with accessories galore since your body type requires less clothe to create the perfect look.
                	Arm, wrist, neck, and all other body accessories are each equally great choices. Add a statement piece necklace to your collection. Long and short necklaces
                	all work well depending on the cut of your blouse. Shorter necklaces pair best with tops that show your cleavage and clavicle.</p>
                	<p>Bracelets and watches suit your slender wrists well. Rings, scarves and belts are also acceptable. Drape scarves in a way that doesn\'t hide your body.</p>
                	<p>You may not need to layer on clothe to create balance, which is why nice looking accessories give you an opportunity to get creative with your wardrobe.</p>',
                ),

                'basics' => array(
                	'Avoid overly sexy outfits that are both too tight and too revealing. Pick and choose which parts you expose. If you choose to expose a lot of cleavage, for example; make sure you wear a loose fitting bottom',
                	'Use caution when layering yourself. A jacket, cardigan or blazer that doesn\'t cinch at the waist will give you extra pounds. The same goes
                	for sweater/top combinations. Wear fitted third pieces that hug your body or that belt.',
                		'Single pieces fit your body type best. One piece bodycons, maxis or empire waist dresses are great examples. Just make sure that they cinch at the waist.',
                	'Though you are free to wear a wide range of pants (high rise, wide leg, skinnyleg, boot cut, etc.) to avoid covering your slender waist choose bottoms that stop
                	at or below your waistline or way above it in the case of high rise pants .',
                	'Wearing higher necklines brings sophistication to your sexy figure.',
                	'Tops that stop at your waistline are great for you but if you do choose to wear a tunic or long tops make sure they cinch at your waist.',
                ) ,
                'snapshotsCharacteristics' => array(
                    'Your shape is classified as a <b>Classic Hourglass Shape</b>',
                    'Your bust is a C- or D-cup size',
                    'Your waist is slim',
                    'Your bust and hips are equally proportioned',
                ),
            ),

            'curvy-hourglass' => array(
                'shape' => 'Curvy Hourglass',
                'shapeTitle' => 'Curvy Hourglass Body Shape',
                'username' => auth()->user()->username ?? '',
                'userHeight' => auth()->user()->bodyShape->height ?? '',
                'shapeImg' => '/images/body-shape/front-curvyhourglass.png',
                'shapeImgB' => '/images/body-shape/back-curvyhourglass.png',
                'shapeChar' => '<p>Your shape is a plus size variation to the classic hourglass figure. Like an hourglass, your body shape maintains equal proportions even as you gain weight. Therefore, your arms, bust, stomach and bottom have evenly distributed weight (more or less). </p><p>You most likely accept that you hold extra pounds on your arms, bottom and breasts, but you loathe your stomach pouch. Like all plus size shapes, the first key to better dressing is wearing proper undergarments. Before you can judge how great an outfit looks you must have on a well-fitting bra. Spanks, tights, and other body shapers are matters of personal choice, but since body shapers smooth over bulges it comes highly recommended that own several and wear it especially when you want to make an impression.  </p><p>Because you have hips, which give you a shapely, rather nice bottom, tapered bottoms like cigarette pants, skinny jeans, chinos and tights look great on you. Pencil skirts fall into the same category since they also have a taper. However, pay special attention to the rise of your jeans. It will need to compensate for your belly fat and cover your bottom which makes higher-rise jeans a fashionable necessity for you. Use the rise of your bottoms to conceal your stomach <em>and</em> show off your curvaceous lower half.</p><p>Cinch and belt at or around your belly to define your waistline. This is very important for your shape. You can create a cinch below your bust or down your belly using empirewaist tops and dresses, the structure of the garment (as in a cinch or darts), and even your jeans. Make sure not to sit a belt on or draw a line right across the fullest part of your belly. Also, if tucking your shirt into your jeans creates a pouch wear a longer shirt or change your pants. </p><p>What you do with your neckline is equally important. Tops with a styled neckline: one-shoulder, scoopneck, cowlneck and turtleneck are each great choices. As a rule, whenever your bottom half has a taper as is the case with skinny jeans, closing the neckline creates better balance. It will reduce the sex appeal and equalize the proportions of your shape. A v-neck with a skinny jean, for example, oozes with sex appeal. If the top were closed at the neckline or loose fitting, however; it would reduce the sexiness and make for a more tasteful, more attractive look.</p>',
                'celebMatch' => '/images/celebs/adele.jpg',
                'celebName' => 'Adele',
                'celebOcc' => 'Singer, Songwriter, Mum',
                'celebDescript' => 'The North London born singer-songwriter that we love, Adele needs no introduction. She’s a highly accomplished artist, and we can’t seem to get her songs out of our heads – nor do we want to.Since the start of her career, Adele has broken Billboard charts, entered the Guinness Book of World Records three times, and won various awards including 18 Grammys.After a brief hiatus for mommy time, Adele roared back onto the scene in 2015 with <em>25</em>, the album that brought to life the hit record “Hello”. We love her talent, humility, and beautiful spirit, which, more than any other attribute, are qualities that should be mirrored.',
                'recommendations' => '',
                'shapeOview' => array(
                    'You have a high BMI',
                    'Your bust and hips are equally proportioned',
                    'Your midsection holds some weight, which may give you belly flab',
                ) ,
                'closetEss' => array(
                    'Wide leg bottoms' => 'No value',
                    'Maxi skirts and dresses' => 'No value',
                    'Flat shoes and sandals' => 'No value',

                ) ,
                'basics' => array(
                    'Do liberally wear bottoms that taper.',
                    'Do show off your arms if you are comfortable with it.',
                    'Avoid plunging v-neck tops that show off too much cleavage.',
                    'Do layer layer with sweaters and others shirts.',
                    'Do make good use of colors and patterns that pop.',
                ) ,
                'snapshotsCharacteristics' => array(
                    'You have a high BMI',
                    'Your bust and hips are equally proportioned',
                    'Your midsection holds some weight, which may give you belly flab',
                ) ,
            ),

            'pear' => array(
                'shape' => 'Pear',
                'shapeTitle' => 'Classic Pear Body Shape',
                'username' => auth()->user()->username ?? '',
                'userHeight' => auth()->user()->bodyShape->height ?? '',
                'shapeImg' => '/images/body-shape/front-pear.png',
                'shapeImgB' => '/images/body-shape/back-pear.png',
                'shapeChar' => '<p> I hold a special place in my heart for those of you afflicted with a large posterior. Even though you - and
                Hollywood circa 2010 - love your big bottom your biggest challenge is finding clothes to show off your slim waist without making you appear pounds heavier.</p>
                <p>Not all body types can rock a skinny leg or layer it up like you can. Third piece layers are especially important to a women with your body shape. It brings fullness to your upper half to match your bottom half.
                Layering also brings finesse to your ensemble. Take advantage of this privilege.</p>
                <p>Stars like J.Lo, Beyonce, Nicki, Kim K. and reality TV favorites have elevated the big butts to the mainstream, giving
                more and more women the confidence to show off their rump. How much of it you choose to show is a matter of personal choice.
                But as always, be tasteful. Styling that is great enough to be mirrored comes when you are conservate with your sexiness.</p>',
                'celebMatch' => '/images/celebs/Jennifer_Lopez.jpg',
                'celebName' => 'Jennifer Lopez',
                'celebOcc' => 'Singer, Entrepreneur, Actress &amp Fashion Icon',
                'celebDescript' => 'Actress, singer, dancer, entrepreneur - there isn\'t anything Jenny can\'t do. Thanks J.Lo for showing the world how beautiful a big bottom is!',
                'recommendations' => '',
                'shapeOview' => array(
                    'The upper half of your body is smaller than the bottom half',
                    'You have a small to average sized bust line',
                    'You hips, thighs, and bottom are more pronounced',
                ) ,
                'closetEss' => array(
                	'Lowrise Skinnyleg Jeans' => '<p>Wearing close-fitting jeans may seem counter-intuitive, but for a women with hips, thighs and butt skinny legs create the perfect silhouette.
                	Since your waist is so small, fitted bottoms that taper emphasize your amazing curvature.</p>
                	<p>Low rise skinny jeans should be your main closet staple. Keep several skinny jeans in different colors on deck. It is also important
                	that your jeans have a low rise. Natural waist jeans can kill a perfect skinny leg by bringing bulge to your slim waist. Make sure that doesn\'t happen.</p>',

                	'Blazer' => '<p>Similar to a cardigan, a blazer is a third piece item that belongs in your closet. Stylish and suitable for work; ensure you have
                	four or more blazers in different lengths in your closet.</p>
                	<p>Blazers that stop at your low waistline or below your hips are the best options for you.
                	With long blazers, keep in mind that a cinched waist is important. The longer it is, the more essential it becomes that your blazer
                	hugs your waist. Make sure that the long blazers you own conform to your shape and show off your waist. </p>
                	<p>Boxy blazers only hide your waist and make you appear heavier, but with shorter blazers (ones that stop at or above your waistline),
                	a loose or boxy fit is not only okay, it\'s encouraged. </p>',

                	'Wide leg bottoms' => '<p>Great in and out of work. For women with large hips and thighs, a straightleg pant shrinks the bottom half of your body. As with any pair of jeans or pants
                	that you buy, ensure that it has a low rise so that you don\'t add any extra weight to your figure. Also avoid pants with side pockets and other
                	embellishments  on the sides of it that widen the size of your hips.</p>',

                ) ,
                'basics' => array(
                    'Create balance between the lower and upper halves of your body by wearing layers. Blouses with embellishments at the bust,
                            shoulders and neck also bring balance to your figure.',
                    'Bring attention to the upper half of your body by wearing lighter colors on top. It brings the eyes upward, creating a visual balance.',
                    'Wear low rise skinnyleg jeans, which hug your curves and create the perfect silhouette.',
                    'Wide-leg pants (or Palazzo\'s) create a well-balanced look for you and should be worn with frequency.',
                    'A-line skirts and dresses flatter your silhouette and let you show off your legs in the best light.',
                    'Layer it up with a third piece like a jacket, blazer or cardigan.  It brings fullness to your upper, while also exposing your slim waist.',
                    'As a rule the larger your bottom is, the taller and broader your should be. Boxy, broad shoulders help to balance large, round bottoms.',
                    'Choose tops and jackets with shoulder pads to broaden your shoulders if they slouch or narrow.',
                    'Avoid pieces that cover or gather at your waist.',
                ) ,
                'snapshotsCharacteristics' => array(
                    'Your shape is classified as a <b>Classic Pear Shape</b>',
                    'Your bust is average to small, below a C-cup size',
                    'Your waist is thin in comparison to your hips and your hips are at least 8 inches larger than your waist',
                ) ,
            ),

            'curvy-pear' => array(
                'shape' => 'Curvy Pear',
                'shapeTitle' => 'Curvy Pear Body Shape',
                'username' => auth()->user()->username ?? '',
                'userHeight' => auth()->user()->bodyShape->height ?? '',
                'shapeImg' => '/images/body-shape/front-curvypear.png',
                'shapeImgB' => '/images/body-shape/back-curvypear.png',
                'shapeChar' => '<p>Your shape is a plus size variation to the classic pear figure. Unlike all other plus size body shapes, plus size pear shapes share the greatest number of similarities to its sister shape.  Even though your body type can use many of the same styling advice as a classic pear, the biggest ways that you differ - in your arms, shoulders and neck – call for different advice. For that reason, you want to first determine three things: do you have very large arms, narrow/slouching shoulders, a long/short neck, and/or a short torso?</p><p>Like all plus size shapes wearing proper undergarments is the first key to better dressing. Spanks, girdles, tights, and other body shapers are matters of personal choice, but to curve your smaller stomach and hold together your thighs body shapers come highly recommended.  You don’t always need to wear a body shaper, which can be constrictive. Things you wear everyday can also be used to tighten your body: higher rise jeans can flatten your stomach; long sleeve shirts with some elastic can smooth over lumps on your arms; and stockings smooth over cellulite on your legs. </p><p>If you have very large arms you want to stay away from sleeveless shirts – not to conceal your arms but to instead grow your body frame so that it balances better with your arms. For women who have both big arms and a very large hips and thighs big arms can dwarf your frame. Quarter length, half sleeve and long sleeve options work best for you. Closing your neckline works well also, which will lengthen your torso.</p><p>Do you have narrow shoulders? Broaden your shoulders using shoulder pads or with a design detail in the shirt that brings your shoulders up like a puff (not too high!). Shoulder pads are absolutely necessary for your body shape if you have narrow shoulders. Even if you do not have narrow shoulders every pear shape needs broad shoulders. You have the choice of wearing a wide range of styles: turtlenecks, vnecks, scoopnecks, cowlnecks, etc. but remember to first broaden your shoulders.</p><p>Avoid covering your waistline. Draping yourself in too much fabric, as is the case with oversized, lengthy garments, makes your stomach look larger than it is which will increase the look of your size. Prefer tucking in your tops, and top and third pieces that stop at your natural waistline. </p><p>Wear bottoms that are comparatively less noticeable to your tops. Your tops should be bold, bright and radiant, while your bottom half… Pencil skirts and tapered bottoms look amazing on you. The rise of your bottoms can be used to conceal belly fat but ensure that the fly doesn’t stand out which would draw attention to your belly. Prefer straight leg and wide pants; bottoms that fall from your hip. Palazzo pants, which are very wide wide-legs may increase the size of your bottom half too drastically.</p><p>Whenever your bottoms taper, close your neckline.</p><p>You must wear amazing shoes that match your tops and jackets. Comfort is just as important as color matching – your shoes should always match your upper-half. This helps mute your bottom half by pushing your radiant top and matching shoes forefront. </p>',
                'celebMatch' => '/images/celebs/kprice.jpg',
                'celebName' => 'Kelly Price',
                'celebOcc' => 'Singer, Songwriter',
                'celebDescript' => 'Kelly Price has been active behind the scenes in the music industry for decades. As a child she sang gospel music in her churches choir, a start that would later land her the title ‘it girl’. Producers large and small courted her whenever a vocalist was needed. It was during that time that she developed an understanding of music production beyond the singing and glamour.</p><p>After having worked with Mariah Carey, Sean “P-Ditty” Combs, the Isley Brothers, Mary J. Blige and Whitney Houston to name a few, Price released her first solo album in 1998 defying criticism she had received earlier in her career that her plus size body shape wouldn’t be accepted by the mainstream. “Soul of A Woman” went double platinum.</p><p>Singer and songwriter Kelly Price may not be someone you recognize right away, but she is someone who’s talent is undeniable and who’s music you should get to know.',
                'recommendations' => '',
                'shapeOview' => array(
                    'You have a below average BMI',
                    'You have a small bust',
                    'You have lean legs and a small bottom',
                ) ,
                'closetEss' => array(
                    'Peplum Blouse' => 'No value',
                    'Tapered Pants' => 'No value',
                    'Pencil Skirt' => 'No value',

                ) ,
                'basics' => array(
                    'Prefer a pencil skirt to an a-line skirt, which may be too juvenile for your shape',
                    'Do broaden your shoulders out versus up. ',
                    'Do wear fewer layers with wide leg. The wider the leg the less you need to cover on top.',
                    'Do elongate your torso and your legs.',
                    'Don’t let a bulging, highly noticeable fly poke out your stomach more. ',
                    'Opt for jeans without front pockets whenever possible.',
                ) ,
                'snapshotsCharacteristics' => array(
                    'You have a high BMI',
                    'Your bust is large to average, no smaller than a C-cup size',
                    'Your hips are no smaller than 48 inches',
                    'Your waist is comparatively smaller than your hips by at least 6 inches',
                ) ,
            ),

            'spoon' => array(
                'shape' => 'Spoon',
                'shapeTitle' => 'Classic Spoon Body Shape',
                'username' => auth()->user()->username ?? '',
                'userHeight' => auth()->user()->bodyShape->height ?? '',
                'shapeImg' => '/images/body-shape/front-pear.png',
                'shapeImgB' => '/images/body-shape/back-pear.png',
                'shapeChar' => '<p>Spoon shapes are sister to Pear body shapes but differ in many ways. Pears have larger hip fat further down their thighs.
                 You, conversely, have less actual hip fat but a wider low waist. Pears have bigger, more rounded bottoms. Spoons are packing back, though not as conspicuously.
                 Your bottom may be shaped as an Average, Square, or Heart Bottom. You may have lean legs and less thigh fat than a pear share. Either way, you are more bottom than
                 top heavy, which is the greatest similarity that you share with your sister shape.</p>
                 <p>These pant styles work well for you: palazzo pants, bootcut pants, straight-cut pants, mini and thigh-high shorts, midi flared skirts and a-line skirts.
                 Avoid embellishments down the center of your crotch. Avoid cropped skinny pants. If you choose to wear skinnyleg bottoms (jeans, yoga pants, etc.) pair it
                 with a lengthy third-piece-layer.</p>
                 <p>Jumpsuits and maxi skirts work really well for you. If you crave loose, flowing fabrics, prefer these garment styles instead of a maxi skirt. Midi and
                 maxi flared skirts add weight to your lower body further disrupting the balance of your shape.</p>
                 <p>Wear structure tops as opposed to flowing, draping fabrics. Unstructured tops may make you appear sloppy. Bring lift to your shoulders. If you have large
                 arms, opt for squared lines at your neck and shoulders, not capsleeve tops or soft neckline and sleeve shapes. </p>
                 <p>Avoid tops with a straight hemline that stops across your pelvic/hip area. Always define your waistline. Don’t attempt to conceal stomach fat with large,
                 oversized shirts. Conceal your stomach with layers. Layering is highly beneficial to your shape, especially pieces that stop midway down your bottom or longer.</p>',
                'celebMatch' => '',
                'celebName' => 'Lena Dunham',
                'celebOcc' => 'Actress, Writer &amp Director',
                'celebDescript' => '',
                'recommendations' => '',
                'shapeOview' => array(
                    'The upper half of your body is smaller than the bottom half',
                    'You have a small to average sized bust line',
                    'You hips, thighs, and bottom are more pronounced',
                ) ,
                'closetEss' => array(

                    'Lengthy Cardigan' => '<p>Cardigans are a highly essential third piece for certain body shapes. Luckily yours is one of them. Whereas layers swallow petite
                	women and hide the curves of an Hourglass, a third piece for women with your figure provides adequate coverage for your body and it draws lines that shrink
                	and curve your shape.</p>',

                	'Fitted T-Shirt' => '<p></p><p></p>',

                	'Mini Shorts' => '<p></p><p></p><p></p>',

                	'Structured Third-Piece-Layer' => '<p></p>',

                ) ,
                'basics' => array(
                    'Create balance between the lower and upper halves of your body by wearing layers. Blouses with embellishments at the bust,
                     shoulders and neck also bring balance to your figure.',
                    'Bring attention to the upper half of your body by wearing lighter colors on top. It brings the eyes upward, creating a visual balance.',
                    'Wear low rise skinnyleg jeans, which hug your curves and create the perfect silhouette.',
                    'Wide-leg pants (or Palazzo\'s) create a well-balanced look for you and should be worn with frequency.',
                    'A-line skirts and dresses flatter your silhouette and let you show off your legs in the best light.',
                    'Layer it up with a third piece like a jacket, blazer or cardigan.  It brings fullness to your upper, while also exposing your slim waist.',
                    'As a rule the larger your bottom is, the taller and broader your should be. Boxy, broad shoulders help to balance large, round bottoms.',
                    'Choose tops and jackets with shoulder pads to broaden your shoulders if they slouch or narrow.',
                    'Avoid pieces that cover or gather at your waist.',
                ) ,
                'snapshotsCharacteristics' => array(
                    'Your shape is classified as a <b>Classic Pear Shape</b>',
                    'Your bust is average to small, below a C-cup size',
                    'Your waist is thin in comparison to your hips and your hips are at least 8 inches larger than your waist',
                ) ,
            ),

            'apple' => array(
                'shape' => 'Apple',
                'shapeTitle' => 'Classic Apple Body Shape',
                'username' => auth()->user()->username ?? '',
                'userHeight' => auth()->user()->bodyShape->height ?? '',
                'shapeImg' => '/images/body-shape/front-apple.png',
                'shapeImgB' => '/images/body-shape/back-apple.png',
                'shapeChar' => '<p>A lot of dressing a woman with a round, popping midsection and comparably smaller legs is counter-intuitive. Even though your inclination is to cover up everything, too much fabric makes you appear bigger than you actually are. The key to dressing your body type is
                to wear garments that create diagonal and horizontal lines across your body to accentuate the curves of your shape. </p><p>Avoid a 1:1 ratio on the upper and lower half of your body (e.g. a t-shirt with a cropped pant of the same length). Those proportions visually draw a parallel between your upper and lower body, which will cause your upper body to stand out and appear bigger. Your midsection is larger than your leaner and slimmer legs so a 1:1 ratio causes your stomach area to pop out.</p>
                <p>A scoopneck, empirewaist top is an example of how you can cut down your shape and bring out the curves of your figure. Avoiding a 1:1 ratio top to bottom and lengthening your legs with a good pant and heel is another way that you can reduce the size of your mid-section to create a wonderful look for yourself. Also, preferable options for you are straight-leg and bootcut bottoms.</p>',
                'celebMatch' => '/images/celebs/Rebel_Wilson.jpg',
                'celebName' => 'Rebel Wilson',
                'celebOcc' => 'Actress & Funny Girl',
                'celebDescript' => 'America\'s favorite Aussie! Rebel\'s sense of humor wins us over in every film she plays in. We look forward to seeing what she does on the big screen to make us laugh out loud even more!',
                'recommendations' => '',
                'shapeOview' => array(
                    'Your midsection and arms hold extra pounds giving you a rounded look',
                    'You can have a small, average or slightly above average bust (B - C-cup)',
                    'Your shoulders are narrow',
                    'Your legs by comparison are slim and lean',
                ) ,
                'closetEss' => array(
                	'Empirewaist Top or Dress' => '<p>As is the case with v-neck tops, empire-waistlines accentuate your bust and lessen the size of your belly. You can\'t physically reduce the size of your
                	mid-section overnight but you can cut down the appearance of your belly by wearing an empirewaist top or dress. </p>
                	<p>Keep in mind when you decide what you want to wear that for you cutting down the length of your stomach is more important than cutting
                	down the width of your stomach. A rounded, long stomach appears much bigger than a rounded, wide stomach. So focus on creating more balanced breast-to-stomach
                	proportions, visually reducing the length of your mid, with a top or dress that cinches just below the bust or a few inches below it, as is the case with
                	a dropped waistline.</p>',
                	'Lengthy Cardigan' => '<p>Cardigans are a highly essential third piece for certain body shapes. Luckily yours is one of them. Whereas layers swallow petite
                	women and hide the curves of an Hourglass, a third piece for women with your figure provides adequate coverage for your body and it draws lines that shrink
                	and curve your shape.</p>
                	<p>Pair your cardigan with a fitted tank top, a v-neck top or a u-neck top.  A top with embellishments at the bust, shoulders or neck is even better,
                	creating the perfect look for you. Wear shoulder pads with your cardigan if your shoulders are narrow. Choose a solid color cardi or one with minimal
                	print and pair it with a patterned, colorful or printed top worn underneath. The contrast works well.</p>
                	<p>No matter what the length, wear your cardigan open so that you cut down the round shape of your mid-section. Cardigan\'s made of light material will
                	keep you cool. Short sleeve options are also available so that you can be comfortable and chic, not one or the other.</p>',
                	'V-Neck Top or Dress' => '<p>V-neck tops and dresses create lines in your silhouette that bring out your natural curves, doing wonders for your body type. For those who
                	have a short neck the \'V\' brings length to that area of your body. Secondly, your full bust is a feature of your body that you want to draw
                	attention to. In fact, garments that have embellishments at the neck- and bust-line reduce the size of your belly and enhance the curvature
                	of your proportions.</p>
                	<p>Make sure that you wear a bra that provides good support and lift. Avoid showing off too much cleavage in the wrong setting, it\'s a huge
                	fashion-don\'t. Neck accessories and scarves that tie at or just below your bust also shrink the upper part of your body.</p>
                	<p>Long sleeve, quarter sleeve and short sleeve tops all work well depending on your arms. Don\'t be afraid to show off your arms but if your arms
                	are a problem area choose loose-fitting quarter- and long-sleeve tops.</p>',
                	'Straightleg Pants' => '<p>Choosing the right bottoms depends largely on the bulge of your stomach compared with the leanness of your legs. If you have
                	a wide belly that gives you muffintop, along with skinny, lean legs; be careful about wearing tight, tapered bottoms. The difference will make you appear
                	more like Dr. Eggman than a sexy full figured woman. If that is the case for you, prefer bootcut and straight leg bottoms over skinny legs.</p>
                	<p>If instead your thighs, bottom and belly areas are more proportional, wearing tapered bottoms (e.g. leggings and skinny legs) can give
                	you the curvature you want and bring attention to this, the leaner part of your body. In any case, bootcut and straight leg pants are essential to
                	your wardrobe helping to balance the upper and lower portions of your figure. High rise bottoms can conceal and contain stomach bulge. Only wear
                	high rise bottoms when covered by a dress, tunic or untucked top. Mix it up with bottoms that have a pattern but avoid pleated bottoms that draw
                	attention to your midsection. </p>',

                	'Print/Patterned Top' => '<p>A top that has a nice print or pattern can do wonders for you. In addition to making your wardrobe more versatile and fun - versus boring, muted
                	colors all the time - patterns and prints also help to conceal your midsection. </p>
                	<p>Be careful, however, when choosing your prints. Small prints and patterns will only make you look larger in comparison. Large prints are the preferred
                	way to go. Also avoid wearing an ensemble that has too much patterns and prints at one time. Pair patterns and prints with solid colors.</p>',
                	'Stylish Pumps' => '<p>Every apple should have a stylish pair of high heels in her closet. In fact, you should have several. If the trick to creating your best look is to
                	reduce your stomach and lengthen your legs, heels are the way to go.</p>
                	<p>Find a great looking heel that you can wear comfortably for 4 hours or more. Stiletto\'s ooze sexiness. Added to the fact that they are difficult to
                	walk in and sometimes hurt, a smaller, more natural tall heel is preferred. Pair your heels with jeans, pants, skirts and dresses. When worn with pants,
                	heels are the perfect touch: they lift your bottom, elongate your legs, and give you the grace and sophistication that your body type demands.</p>',

                ),
                'basics' => array(
                    'On the upper and lower half of your body create a 1:2 or 1:3 ratio. A 1:1 ratio - when the top half of you body is the same length of the lower half of your body - enlarges the size of your belly',
                    'Wear v-neck, u-neck and empire waist dresses and tops that accentuate your breasts/cleavage and that lengthen your neck. Diagonal and horizontal lines slim your body and give you shape.',
                    'Invest in undergarments that give you proper support: a good fitting bra, spanks, tank tops, etc.',
                    'Don\'t be afraid to show skin in unproblematic areas of your body. Quarter length sleeves, fitted pants, and off-the-shoulder, scoop neck, v-neck and u-neck tops are all great for exposing parts of your body that deserve attention.',
                    'Wear tops that stop at or below your belly. Tops and dresses that fall too far below your waistline cover too much of your body making you appear more round.',
                    'Layer it up with a third piece like a jacket, blazer or cardigan. Your body type looks great in a tank top underneath a cardigan, blazer or jacket.',
                    'Wear loose fitting sleeves that allow you to cover challenge areas and breathe.',
                    'Choose tops and jackets with shoulder pads to broaden your shoulders if they slouch or narrow.',
                    'Lengthen your legs and give lift to your bottom with a great pair of comfortable high heels.',
                ),
                'snapshotsCharacteristics' => array(
                    'Your shape is classified as a <b>Classic Apple Shape</b>',
                    'Your midsection holds most of your body weight, which can be considered round and popping',
                    'Your hips and buttocks are narrow and your legs are lean in comparison to your stomach',
                ),
            ),

            'applepear' => array(
                'shape' => 'Apple Variation',
                'shapeTitle' => 'Apple Body Shape Variation',
                'username' => auth()->user()->username ?? '',
                'userHeight' => auth()->user()->bodyShape->height ?? '',
                'shapeImg' => '/images/body-shape/front-applepear.png',
                'shapeImgB' => '/images/body-shape/back-applepear.png',
                'shapeChar' => '<p>Your shape is a plus size variation to the classic apple figure. Like an apple body shape, you hold most of your weight in your midsection. Unlike the traditional apple shape you have wide hips and an average or large (but not too large) bust size. Also, many women with your shape have narrow shoulders that slouch. </p><p>As is the case with all plus size figures, your first style objective is to own a plethora of well-fitting undergarments. Supportive bras, tights, tanks, spanks/body shapers and the like are all important undergarments that help smooth over unwanted bulging and curve your shape. Start there.</p><p>Your shape looks best when you focus on strategically using color to bring your shape to life. Don’t cover yourself in oversized fabric in muted colors. Your breasts, shoulders and arms should always be well defined in the garments you buy using a close fit in that area and/or a v- or u-neck top. </p><p>Contrast the upper and lower portions of your body by wearing solid colors on one half of the body and a patterned, lively top or bottom on the other half. Always draw lines down and across your body to accentuate the curves of your shape.</p><p>Asymmetrical hemlines in your tops and overwear really bring your shape to life as does skinnyleg bottoms. Because of your wide hips, which makes you a cousin to a pear shape, tapered pants and skirts work really well for you. </p><p>Do not wear tops that stop at or directly below your stomach over your crotch if it has a straight hemline. That line cuts your body in half thus making the distinction between your upper and lower more visible. Your hips will look too wide and your stomach too round. Also, don’t belt at the fullest part of your stomach. </p><p>Tops that close at the neck – like a crewneck or turtleneck – really favor your body type. Other publishers encourage plus size women to wear v-neck tops, but closed necklines really shine on your shape. It creates a more equally proportioned bust to stomach ratio, thus visually reducing your stomach size. </p><p>Your shape would also benefit from wearing a maxi dress, especially if it has an empire waistline. Empire tops and dresses work very well for your shape as it brings curvature to your body shape. </p>',
                'celebMatch' => '/images/celebs/McCarthy2015.jpg',
                'celebName' => 'Melissa McCarthy',
                'celebOcc' => 'Actress, Designer, Feminist',
                'celebDescript' => 'Kevin Hart ain’t got nothing on her! The number of box office hits that she’s had in the past few years deserves way more attention. Like Kevin Hart, demand for her is high because she gets [ bottoms ] in those seats. Not only is she starring in hit after hit, she’s leading the movement for movies with a strong female lead. Kudos to you Melissa. We recognize your hard work, and more than anything we love a beautiful, strong femme who’s not afraid to be who she is and take the front seat.Laughter is a necessary medicine for our busy, stressed-filled lives but so is great fashion, which you can find at her <a href=”https://melissamccarthy.com/” target=”_blank”>great plus-size fashion line</a>. That’s right! Melissa is a funny-girl, a feminist, and a fashionista.Mirror Me Fashion loves and supports her, and so should you \<3.',
                'recommendations' => '',
                'shapeOview' => array(
                    'You have an above average BMI',
                    'You have a rounded midsection which carries most of your weight',
                    'You have wide hips and bottom',
                    'You have an average or large bust size',

                ) ,

                'closetEss' => array(
                    'A Wrap Dress' => '<p>Wrap-tops and dresses work wonders for your body shape by hitting all the right places. It accentuates your bust, defines your waistline and draws a ‘v’ down your neck. The ‘v’ shape opens your clavicle slimming your body and wrap create a fit and flare style that hugs your waist and drapes over your stomach.</p><p>You should own several wrap dresses in various colors and designs. Prefer your wrap dress to have color, which will give it life, but solid colors (like black) work just as well. </p>',
                    'Skinnyleg Pants' => '<p>Unlike a traditional apple shape, your shape has hips and butt like a pear shape, which gives your permission to show off your curvy silhouette in tapered pant. Unlike a pear shape, however; you have more freedom to wear colorful patterns that draw attention to the lower half of your body. Don’t be afraid to choose bottoms with loud prints, designs and colors.</p><p>You don’t need super skinny bottoms, which can be hard to take on and off. Instead, focus on finding bottoms with a nice, natural taper that fits just right at your ankles, and then pair it will a killer shoe. Sandals and heels look best with your skinnyleg jeans and pants. </p>',
                    'A Shirtdress ' => '<p>A shirtdress is a great way to go casual and still look stylish. Shirtdresses have a collar and a placket like a traditional button-up shirt but the length of it is so long that it covers your bottom. </p><p>Your shirtdress must have darts, a cinch or a belt to work. Any straight tops that don’t pull in slightly at your waist will widen your shape more, which you don’t want.</p><p>If you have the legs for it wear your longer shirtdresses without bottoms to the club. That will not work in casual and professional settings. It is a shirt after all; pair it with a tapered jean or pant. </p>',
                    'A Midi A-line Skirt ' => '<p>Midi skirt styles are often hard to pull off. An a-line midi skirt, which your body type wears well, is one of those styles. Straight and flared midi skirts also work for you, but an a-line midi, which gradually widens as you move down the skirt is the better look. </p><p>Flared midis drape and flow while an a-line midi has structure to the flare; it’s not as free flowing as typical flare. That structure causes the skirt to hit you at your slimmest point, defining your waistline while also concealing any stomach that you may have. Find a skirt with a prominent band or wear it with a separate belt. </p>',
                    'A Third-Piece Layer' => '<p>A third piece layer is a great way to add a finishing touch to your wardrobe. It has a way of making you look complete. The best overwear styles for you are broad shoulder blazers with a curved shape and cardigans that drape. Any overwear with activity at the hemline will shine on your body shape: asymmetry; folds, layers and fringe; a high-low.</p><p>Wear your third layer to your low waistline or lower to your ankles. It can also be used to create levels. When wearing a shorter piece, make sure your top is longer than the layer or that your bottoms have a high rise. </p><p>Throw on a layer on days when you don’t feel quite right with how you look. It can instantly transform a blasé outfit into a hit.</p>',
                ) ,
                'basics' => array(
                    'Don’t drape yourself in large oversized fabric.',
                    'Do not where tops with a straight hemline that runs across your crotch.',
                    'Do expose your clavicle by wearing v-neck and u-neck shirts.',
                    'Do wear a third piece layer.',
                    'Avoid sleeveless shirts especially if you have issues with your arms.',
                    'Do broaden your shoulders.',
                    'Do not wear long sleeve bishop tops.',
                ) ,
                'snapshotsCharacteristics' => array(
                    'Your midsection holds some weight, which may give you belly flab. Your BMI is high',
                    'Your bust is comparatively smaller than your stomach and hips',
                    'Your hips are wide',
                ) ,
            ),

            'rectangle' => array(
                'shape' => 'Rectangle',
                'shapeTitle' => 'Rectangle Body Shape',
                'username' => auth()->user()->username ?? '',
                'userHeight' => auth()->user()->bodyShape->height ?? '',
                'shapeImg' => '/images/body-shape/front-rectangle.png',
                'shapeImgB' => '/images/body-shape/back-rectangle.png',
                'shapeChar' => '<p>Most people believe that an hourglass body type is the ideal female form because they have evenly
                           proportioned hip and bust measurements, and a smaller, curvy waist. The trouble is that an hourglass is the most
                           uncommon shape. Instead, most women have a big bottom or an undefined waist. Having a big bottom isn\'t your concern,
                           however. For you, your conundrum is having a boxy midsection despite your fit and lean figure. For that reason,
                           bringing curvature to your straight waistline and softening your broad shoulders is your styling objective. </p>
                        <p>The secret behind dressing your body shape is making you feel more feminine. To do that you need to avoid boyish
                           clothing (and sneakers), and let the clothes you wear drape off of your body. </p>
                        <p>You may want to rock a casual look by wearing a t-shirt, jeans and sneakers, but for you, that look is blasé. That
                           doesn\'t mean that you can\'t wear tees and tanks; it means that you have permission to do a little bit more.
                           Don\'t wear a basic tee; wear a cotton blouse that has some- any sort of design detail: a standing
                           collar; a plunging \‘v\’; a gathered waist. Play around with the colors, patterns and prints of the tops you wear.
                           Even if you decide to wear a plain t-shirt, get one that has a cute kitty printed on the front of it. You\'ll do
                           well as long as you stay away from plain, boring t-shirts and tank tops. </p>
                        <p>Your shape typically has lean legs, long legs, a small butt, or some combination of the three. For you, fitted
                           pants, jeans and other bottoms work well. You may have difficulty with muffin-top or some variation of it. How
                           \‘wide\’ is your waist? Do you have muffin-top? <a href="">Get styling advice for muffin-top</a>. </p>
                        <p>Have fun dressing up your lower body. Wear plaid, ripped, and cropped pants. Wear it loose or fitted. Belt it or
                           don\'t. You look amazing in classic blue jeans, just remember not to wear it with a basic tee or tank. Avoid
                           sneakers. Low-tops (like skippies and All Star\'s) are fine. If you do choose to wear high-top sneakers make
                           sure you fully adopt the style. So if you\'re wearing high top Nike\'s, go all the way urban. If you’re wearing
                           Chucks, go all the way skater. It\'s all or nothing with a high top sneaker. Prefer sandals, flats and pointed-toe boots. </p>
                        <p>Drape layer after layer on top of your body. The longer and frillier, the better. Flowing maxi dresses look
                           wonderful on you. Structured blazers will get you hired and promoted. When you’re not layering, make sure your
                           shirt has an empire waist and cinches at your waistline. </p>
                        <p>Finally, there\'s no such thing as too many accessories for you. Get blinged out, even if your bling has its cover blown. </p>',
                'celebMatch' => '/images/celebs/Cameron_Diaz.jpg',
                'celebName' => 'Cameron Diaz',
                'celebOcc' => 'Actress',
                'celebDescript' => 'There\'s something about Cameron Diaz – her inner beauty can\’t help but shine. Cameron is an A-list beauty who continues to blow up the big screen. Her talent is just barely superseded by her charm and always present, always beautiful smile.',
                'recommendations' => '',
                'shapeOview' => array(
                    'Your legs are typically long and slim',
                    'Your bust is small to average',
                    'Your midsection has an equal width to your hips',
                ) ,
                'closetEss' => array(
                	'Peplum Blouse' => '<p>A peplum is a separate layer of fabric sewn at or below the waistline of a top or dress. When worn on a boxy shape,
                	it counterbalances the straightness of your stomach bringing curvature to your waistline. A well-designed peplum top or dress is a great option for you.</p>
                	<p>Peplum tops also do a great job of cutting down the length of your torso which, as a result, will visually add length to your
                	bottom half. These proportions work well for your body type. Pair your peplum blouse with any skirt or bottom that brings
                	curvature to your lower half, a pleated trouser for example.</p> ',
                	'Tapered Pants' => '<p>For women without hips, tapered bottoms have a way of bringing out the shapeliness of your curves.
                	With a taper, the snug fit at your ankles causes your hips to popout by comparison. Tapered bottoms are definitely the way to go.
                	Pants with side pockets and pleats also curve your shape.</p>
                	<p>Also keep in mind that your bottoms don\'t necessarily need to be fitted. There are many great bottoms with a taper that are
                	stylish, sexy, and loosely fit.</p>',
                	'Mini Skirt' => '<p>Every body type has a feature or two that should be flaunted. For you, it\'s your beautiful <a href="./your-body-features">
                	long, lean legs</a>. And the best way to show off your killer legs is, of course, by wearing a mini skirt.</p>
                	<p>Don\'t be confused by the term mini skirt. Mini only means that your skirt stops mid-thigh. Anything shorter is considered micro mini, which is only
                	appropriate for teenage girls. Sex appeal is great when done in the right setting, worn properly. Dress age appropriately and avoid
                	micro minis if you\'re over 25</p>
                	<p>Avoid straight miniskirts, which accentuate the width of your mid-section. Belt your skirts and pair it with a nice sandal or flat. Miniskirts
                	and high heels might be too sexy for a casual day - be mindful of that.</p>',
                	'Maxi Skirt or Dress' => '<p>A flowing maxidress looks best on a limited number of body shapes and yours makes the cut. Maxi dresses are a great way to achieve
                	a classy yet cute look. Let your maxi dress flare out in all directions - it\'s an absolute must for women with your body shape!</p>',
                ),
                'basics' => array(
                    'Create curves at your waist by belting your shirt or top, or by wearing an empire top',
                    'Choose tops that have curves, lines, and a bodice to offset the boxiness of your shape. Tops with an asymmetrical hemline, a pleat, or a v-neck all do the trick.',
                    'Tops that have a "feminine touch" bring out the womanly appeal you want to achieve. Choose ones with an embellishment or some other design detail.',
                    'Show off your legs in a short skirt, mini skirt, or flared skirt. Your legs are your best feature',
                    'Layer it up with a third piece',
                ) ,
                'snapshotsCharacteristics' => array(
                    'Your shape is classified as a <b>Classic Rectangle Shape</b>',
                    'Your shoulders are broad and your midsection is considered boxy; having an equal width to that of your hips',
                    'Your limbs are long and lean and your hips are narrow',

                ),
            ),

            'diamond' => array(
                'shape' => 'Diamond',
                'shapeTitle' => 'Classic Diamond Body Shape',
                'username' => auth()->user()->username ?? '',
                'userHeight' => auth()->user()->bodyShape->height ?? '',
                'shapeImg' => '/images/body-shape/front-rectangle-busty.png',
                'shapeImgB' => '/images/body-shape/back-diamond.png',
                'shapeChar' => '<p>Women with your body shape tend to be larger on top at the breasts and. For you, the area of your body that you dislike most might be your narrow hips. More weight on bottom would bring better proportionality
                            to your shape so when styling yourself you want to emphasize this area. Like every other body type, creating balance is key; and a fuller lower half will help you achieve this balance.<p>
                        <p>Wear bold colors and patterns that pop on bottom. A benefit to you is any pant that brings the eyes to your lower half. Wide leg jeans, fun skirts - A-lines especially - and pencil skirts each do the job.<p>
                        <p>Your torso length may also throw off your body proportions. If you have very large breasts with a short torso tops with a dropped waistline could work for you.<p>
                        <p>Finally, focus on cutting down the broadness of your shoulders and neck. Avoid scoopneck and strapless tops. V-neck tops are great for reducing the tall height of broad shoulders. Also wearing muted color tops
                            also helps to visually spotlight your bottom half and reduce your upper.</p>',
                'celebMatch' => '/images/celebs/Sherri-Shepherd-Transformation.jpg',
                'celebName' => 'Sherri Shepherd',
                'celebOcc' => 'Comedian, Actress',
                'celebDescript' => 'Outgoing, fun and always smiling; Sherri Shepherd\'s fashion flare, especially for her wonderful figure, makes her a fashionista who\'s style should be Mirrored!',
                'recommendations' => '',
                'shapeOview' => array(
                    'You have large breasts',
                    'Your hips are narrow',
                    'Your bottom is typically small',
                    'Your shoulders are broad',
                ) ,
                'closetEss' => array(
                	'Well-Structured One Piece Dress - No Flare' => 'No value',
                	'A-line Skirt' => '<p>Much like a wide-leg pant, <a href="/shopping/#bottoms">a-line skirts</a> are essential to women with your shape because of how well it balances your
                	upper and lower portions. The flare of an a-line skirt - as shown in the photograph of Sherri Sheperd - shrinks your waistline, brings fullness to your
                	bottom half, and gives better proportionality to your breasts and behind. An a-line skirt is a guaranteed way to give you the type of full bottom you
                	likely want.</p>',
                	'Colorful/Brightly Patterned Pants' => '<p>Yours is one of few body types that can handle mostly any type of bottom, especially bold colors, patterns and designs.
                	Since your objective is to bring attention to your lower half you can use bold, bright and busy colors on bottom to visually balance the halves of your body.</p>
                	<p>Muted colors on top paired with a colorful, bright or otherwise attention grabbing pattern or design is a great way to use colors and patterns to bring balance to your figure. As long as
                	you don\'t violate any other rules in your fun pants :) (e.g. tight bottoms that exaggerate the larger size of your waist and upper) this option is destined to be a winner for you.</p>',
                	'Caftan/Dropped-Waist Top' => '<p>In addition to a one-piece dress, caftan and dropped waist tops also help to elongate your mid-section. Choose styles with the
                	right neckline and sleeve for your body type.</p>
                	<p>As mentioned earlier, lengthening your torso is your true style secret. Depending on the style of your caftan
                	or dropped-waist top, it may, to the contrary of what you want, enhance the size of your upper body. Garments that cover too much of an
                	already enhanced body feature make it appear larger. So a dropped waist can blanket your bust and stomach simultaneously,
                	visually turning it into one large area. For that reason, you must choose a caftan top carefully and especially avoid a monochromatic color.
                	Prefer lengthy overblouses and tunics that draw lines down your body. Cinched lengthy tops are perfect for you.</p>
                	<p>As a final note, if you\'re shorter remember to lengthen your legs with a heel or lengthy pant.</p>',
                	'Stylish Pumps' => 'No value',

                ) ,
                'basics' => array(
                    'Bring attention to the lower half of your body with colors, pleats, patterns and lines that pop, drawing attention to your lower half.
                                Harem pants, cargo pocketed pants, a-line skirts and asymmetrical hemline skirts are all great choices',
                    'Expose your collarbone with tops that fall into your bust line to cut down the broadness of your shoulders and lessens the fullness of your breast.',
                    'Invest in undergarments that give you proper support: a good fitting bra, spanks, tank tops, etc.',
                    'In unproblematic areas of your body don\'t be afraid to show skin. Quarter length sleeves, fitted pants, and off-the-shoulder,
                                scoop neck, v-neck and u-neck tops are all great for exposing parts of your body',
                    'Flared skirts can do wonders for you as long as you ensure that it is not too mini',
                    'Wide leg pants are essential to your wardrobe. It balances your body proportions perfectly.',
                    'Layering with third pieces like cardigans and jackets help shrink your bosom and lengthen your torso.',
                    'Scoop necks, v-necks, u-necks, and cowl neck tops are right for you.',
                ) ,
                'snapshotsCharacteristics' => array(
                    'Your shape is classified as a <b>Classic Diamond Shape</b>',
                    'Your carry most of your body weight on top: your bust is typically large, your shoulders are broad,and your neck is typically wide and strong',
                    'Your legs are very thin and your hips and bottom are small',

                ) ,
            ),

            'busty-rectangle' => array(
                'shape' => 'Diamond',
                'shapeTitle' => 'Classic Diamond Body Shape',
                'username' => auth()->user()->username ?? '',
                'userHeight' => auth()->user()->bodyShape->height ?? '',
                'shapeImg' => '/images/body-shape/front-rectangle-busty.png',
                'shapeImgB' => '/images/body-shape/back-diamond.png',
                'shapeChar' => '<p>Women with your body shape tend to be larger on top at the breasts and. For you, the area of your body that you dislike most might be your narrow hips. More weight on bottom would bring better proportionality
                            to your shape so when styling yourself you want to emphasize this area. Like every other body type, creating balance is key; and a fuller lower half will help you achieve this balance.<p>
                        <p>Wear bold colors and patterns that pop on bottom. A benefit to you is any pant that brings the eyes to your lower half. Wide leg jeans, fun skirts - A-lines especially - and pencil skirts each do the job.<p>
                        <p>Your torso length may also throw off your body proportions. If you have very large breasts with a short torso tops with a dropped waistline could work for you.<p>
                        <p>Finally, focus on cutting down the broadness of your shoulders and neck. Avoid scoopneck and strapless tops. V-neck tops are great for reducing the tall height of broad shoulders. Also wearing muted color tops
                            also helps to visually spotlight your bottom half and reduce your upper.</p>',
                'celebMatch' => '/images/celebs/Sherri-Shepherd-Transformation.jpg',
                'celebName' => 'Sherri Shepherd',
                'celebOcc' => 'Comedian, Actress',
                'celebDescript' => 'Outgoing, fun and always smiling; Sherri Shepherd\'s fashion flare, especially for her wonderful figure, makes her a fashionista who\'s style should be Mirrored!',
                'recommendations' => '',
                'shapeOview' => array(
                    'You have large breasts',
                    'Your hips are narrow',
                    'Your bottom is typically small',
                    'Your shoulders are broad',
                ) ,
                'closetEss' => array(
                	'Well-Structured One Piece Dress - No Flare' => 'No value',
                	'A-line Skirt' => '<p>Much like a wide-leg pant, <a href="/shopping/#bottoms">a-line skirts</a> are essential to women with your shape because of how well it balances your
                	upper and lower portions. The flare of an a-line skirt - as shown in the photograph of Sherri Sheperd - shrinks your waistline, brings fullness to your
                	bottom half, and gives better proportionality to your breasts and behind. An a-line skirt is a guaranteed way to give you the type of full bottom you
                	likely want.</p>',
                	'Colorful/Brightly Patterned Pants' => '<p>Yours is one of few body types that can handle mostly any type of bottom, especially bold colors, patterns and designs.
                	Since your objective is to bring attention to your lower half you can use bold, bright and busy colors on bottom to visually balance the halves of your body.</p>
                	<p>Muted colors on top paired with a colorful, bright or otherwise attention grabbing pattern or design is a great way to use colors and patterns to bring balance to your figure. As long as
                	you don\'t violate any other rules in your fun pants :) (e.g. tight bottoms that exaggerate the larger size of your waist and upper) this option is destined to be a winner for you.</p>',
                	'Caftan/Dropped-Waist Top' => '<p>In addition to a one-piece dress, caftan and dropped waist tops also help to elongate your mid-section. Choose styles with the
                	right neckline and sleeve for your body type.</p>
                	<p>As mentioned earlier, lengthening your torso is your true style secret. Depending on the style of your caftan
                	or dropped-waist top, it may, to the contrary of what you want, enhance the size of your upper body. Garments that cover too much of an
                	already enhanced body feature make it appear larger. So a dropped waist can blanket your bust and stomach simultaneously,
                	visually turning it into one large area. For that reason, you must choose a caftan top carefully and especially avoid a monochromatic color.
                	Prefer lengthy overblouses and tunics that draw lines down your body. Cinched lengthy tops are perfect for you.</p>
                	<p>As a final note, if you\'re shorter remember to lengthen your legs with a heel or lengthy pant.</p>',
                	'Stylish Pumps' => 'No value',

                ) ,
                'basics' => array(
                    'Bring attention to the lower half of your body with colors, pleats, patterns and lines that pop, drawing attention to your lower half.
                                Harem pants, cargo pocketed pants, a-line skirts and asymmetrical hemline skirts are all great choices',
                    'Expose your collarbone with tops that fall into your bust line to cut down the broadness of your shoulders and lessens the fullness of your breast.',
                    'Invest in undergarments that give you proper support: a good fitting bra, spanks, tank tops, etc.',
                    'In unproblematic areas of your body don\'t be afraid to show skin. Quarter length sleeves, fitted pants, and off-the-shoulder,
                                scoop neck, v-neck and u-neck tops are all great for exposing parts of your body',
                    'Flared skirts can do wonders for you as long as you ensure that it is not too mini',
                    'Wide leg pants are essential to your wardrobe. It balances your body proportions perfectly.',
                    'Layering with third pieces like cardigans and jackets help shrink your bosom and lengthen your torso.',
                    'Scoop necks, v-necks, u-necks, and cowl neck tops are right for you.',
                ) ,
                'snapshotsCharacteristics' => array(
                    'Your shape is classified as a <b>Classic Diamond Shape</b>',
                    'Your carry most of your body weight on top: your bust is typically large, your shoulders are broad,and your neck is typically wide and strong',
                    'Your legs are very thin and your hips and bottom are small',

                ) ,
            ),

            'muffintop' => array(
                'shape' => 'Muffintop Figure',
                'shapeTitle' => 'Muffintop Figure',
                'username' => auth()->user()->username ?? '',
                'userHeight' => auth()->user()->bodyShape->height ?? '',
                'shapeImg' => '/images/body-shape/front-muffintop.png',
                'shapeImgB' => '/images/body-shape/back-muffintop.png',
                'shapeChar' => '<p>Muffintop is a serious challenge faced by many women. For a body shape with muffintop, you tend to accumulate fat at your low waistline, which causes your torso to look both wider and longer. You aren’t extremely overweight, it’s that for some strange genetic reason your body fat sticks to the lowest part of your belly.</p><p>Good layering techniques are crucial to a woman with muffintop. You want to play around with the levels (or lengths) or the garments you wear. For example, you can wear a lengthy t-shirt underneath a shorter jean jacket by a few inches, or a sleeveless trench worn open. Overall, you want to shrink the length of your torso using good layering techniques. </p><p>Asymmetrical and u-shaped hemlines look particularly good on your body shape. Strapless shirts and halter tops favor your shape also.</p><p>Batwing tops and empire tops and dresses are also very good for your body shape. An empirewaist flowing maxi dress is an example of an empire style that would look stunning on your shape. Loosely fit t-shirts also work well for you as long as they cinch some at the waist. A u-shaped hemline would be even better.</p><p>Since your body shape tends to have small hips and buttocks, pants without pockets in the back and with pockets in the front, especially at your hips on the sides, are best suited for you. No cargo pants. Avoid wearing yoga pants. Bootcut and straightleg pants work well for you. The bigger your muffintop, the lesser your pants should taper. If you can draw attention to your ankle with a cropped/highwater pant or pants with a band or gather at the ankles are great choices. Make sure you have on a killer pair of shoes with it: booties (short, heelless boots) or heels in the case of highwater pants.  </p><p>Harem pants and other flowing skirts that drape will do well with your body shape. </p>',
                'celebMatch' => '/images/celebs/winehouse.jpg',
                'celebName' => 'Amy Winehouse',
                'celebOcc' => 'Singer, Songwriter',
                'celebDescript' => 'A rebellious and troubled star who died too soon.While most other celebrities turn to surgery to fix their muffintop problem, Amy Winehouse kept her body how it was made. Since confidence is the first key to looking good, you should do like Winehouse in this regard by embracing your body. Even in rags, those who exude self-confidence have a draw to them; they are radiant, they shine.Winehouse’s powerful voice put her in a class with other British greats: Adele and Duffy - Caucasian women who widened the scope of what I meant to be a R&B singer.Out of Amy’s tiny body came soulful music that will live on forever. Rest in peace, dear.',
                'recommendations' => '',
                'shapeOview' => array(
                    'You have a below average BMI',
                    'You have a small bust',
                    'You have lean legs and a small bottom',
                ) ,
                'closetEss' => array(
                    'Loose Shirt U-shaped Hemline ' => '<p>A u-shape softens rounder shapes, bringing it the femininity you desire in the outfit you wear. A u-shaped top will always flatter your body type.</p><p>You can wear this style hemline with any type of top: a button-up shirt, a blouse, etc. But by far, a loosely fit cotton top is the better look. Let the looseness of the garment drape over your stomach. Anything too tight will kill the look.</p><p>This style is great as a casual look. Whenever you want to throw something on choose this type of top. Long sleeve, short sleeve and capsleeve tops each work.</p>',
                    'Flowing Maxi Dress' => '<p>A flowing maxi dress will show off your best assets and graze over your problem area. Prefer a maxi dress that has thin, spaghetti straps. Showing cleavage here is also encouraged so don’t be afraid to wear a maxi with a low cut or plunging top.</p><p>The flare in the skirt drapes over your stomach bulge concealing that part of your body. Because of its length, the maxi creates one long column that elongates your body giving you the elegance you desire. A maxi dress, even on without a wide flare, is well-suited for your body shape.</p>',
                    'Batwing Top' => '<p>Batwing tops and dresses are garments that have the sleeves sewn into the bodice dropping the pit of your sleeve by several inches. A small batwing may only drop a few inches, while a wide batwing has the sleeve connected to the bodice further down at your belly button. This causes the sleeves to look like a bat-wings when you open your arms.</p><p>For women with muffintop, the batwing distorts the proportions of your shape. With your slender arms and legs, the batwing design swallows your midsection, slimming your figure. Because it’s also an attractive-looking piece, the body slimming and concealment happens behind a stylish garment. </p>',
                    'Highwater Pants (w/ a Heel or Boot)' => '<p>Your body shape benefits from cropped and highwater pants. It’s a small tweak that sends the eyes to your ankles and feet. You’ll be amazed by how well a cropped pant can better your look.</p><p>Highwater, chino or clamdigger pants each represent a great length for your shape so have pants in each style. A band or gather in your pants at the ankle and even tall boots with the pants tucked-in achieve the same look. </p><p>Make sure that you are wearing an attractive shoe that matches your cropped pants. Try to match it in color palette, not as a direct match like black on black or blue on blue. Booties, boots, sandals, tall-sandals, and wedges are the best shoe styles to wear with your crop.</p>',

                ) ,
                'basics' => array(
                    'Do wear tops with a ‘u’ shape at the arms, neckline and hem.',
                    'Avoid all cropped shirts and jackets. Wear your upper garments (tops and jackets) at your low waistline.',
                    'Do wear cropped jeans and pants.',
                    'Do create levels with your layers to change around your proportions.',
                    'Avoid pencil and tapered pants.',
                    'Straight t-shirts don’t give you shape. Prefer tees that have movement and curve.',
                    'Avoid cargo pants, which have bulky pockets on the sides of you pants.',
                ) ,
                'snapshotsCharacteristics' => array(
                    'Your midsection holds all of your extra body weight giving you muffintop',
                    'Your bust is typically average to slightly above average',
                    'Your legs are lean and your hips and buttocks are typically very small',

                ) ,
            ),

            'male-skinny' => array(
                'shape' => 'Skinny Shape',
                'shapeTitle' => 'Male Body Shape',
                'username' => auth()->user()->username ?? '',
                'userHeight' => auth()->user()->bodyShape->height ?? '',
                'shapeImg' => '/images/body-shape/front-male.png',
                'shapeImgB' => '/images/body-shape/back-male.png',
                'shapeChar' => '',
                'celebMatch' => '/images/body-shape/front-male.png',
                'celebName' => '',
                'celebOcc' => '',
                'celebDescript' => '',

                'closetEss' => array(
                    'A Trench' => '<p>Skinny shape: Your body shape looks great in long overwear that drops below your bottom or to your ankles as in trench and duster style jackets. Wear it open to show off your fit body. The sleeves can be almost any style and look great: long sleeves, sleeveless, flared and so on. </p><p>Like a flowing maxi dress, the length of the trench brings with it an air that your body type carries well.  Trench coats and jackets command respect. Own several.</p>',
                ) ,

                'basics' => array(
                    'Don’t drape yourself in too much oversized fabrics.',
                    'Don’t wear yoga pants casually. ',
                ) ,
                'snapshotsCharacteristics' => array(
                    'Your midsection holds all of your extra body weight giving you muffintop',
                    'Your bust is typically average to slightly above average',
                    'Your legs are lean and your hips and buttocks are typically very small',
                ) ,
            ),

            'male-average' => array(
                'shape' => 'Average Shape',
                'shapeTitle' => 'Male Body Shape',
                'username' => auth()->user()->username ?? '',
                'userHeight' => auth()->user()->bodyShape->height ?? '',
                'shapeImg' => '/images/body-shape/front-male.png',
                'shapeImgB' => '/images/body-shape/back-male.png',
                'shapeChar' => '',
                'celebMatch' => '/images/body-shape/front-male.png',
                'celebName' => '',
                'celebOcc' => '',
                'celebDescript' => '',

                'closetEss' => array(
                    'A Trench' => '<p>Skinny shape: Your body shape looks great in long overwear that drops below your bottom or to your ankles as in trench and duster style jackets. Wear it open to show off your fit body. The sleeves can be almost any style and look great: long sleeves, sleeveless, flared and so on. </p><p>Like a flowing maxi dress, the length of the trench brings with it an air that your body type carries well.  Trench coats and jackets command respect. Own several.</p>',
                ) ,

                'basics' => array(
                    'Don’t drape yourself in too much oversized fabrics.',
                    'Don’t wear yoga pants casually. ',
                ) ,
                'snapshotsCharacteristics' => array(
                    'Your midsection holds all of your extra body weight giving you muffintop',
                    'Your bust is typically average to slightly above average',
                    'Your legs are lean and your hips and buttocks are typically very small',
                ) ,
            ),

            'male-rotund' => array(
                'shape' => 'Rotund Shape',
                'shapeTitle' => 'Male Body Shape',
                'username' => auth()->user()->username ?? '',
                'userHeight' => auth()->user()->bodyShape->height ?? '',
                'shapeImg' => '/images/body-shape/front-male.png',
                'shapeImgB' => '/images/body-shape/back-male.png',
                'shapeChar' => '',
                'celebMatch' => '/images/body-shape/front-male.png',
                'celebName' => '',
                'celebOcc' => '',
                'celebDescript' => '',

                'closetEss' => array(
                    'A Trench' => '<p>Skinny shape: Your body shape looks great in long overwear that drops below your bottom or to your ankles as in trench and duster style jackets. Wear it open to show off your fit body. The sleeves can be almost any style and look great: long sleeves, sleeveless, flared and so on. </p><p>Like a flowing maxi dress, the length of the trench brings with it an air that your body type carries well.  Trench coats and jackets command respect. Own several.</p>',
                ) ,

                'basics' => array(
                    'Don’t drape yourself in too much oversized fabrics.',
                    'Don’t wear yoga pants casually. ',
                ) ,
                'snapshotsCharacteristics' => array(
                    'Your midsection holds all of your extra body weight giving you muffintop',
                    'Your bust is typically average to slightly above average',
                    'Your legs are lean and your hips and buttocks are typically very small',
                ) ,
            ),

            'male-triangle' => array(
                'shape' => 'Triangle Shape',
                'shapeTitle' => 'Male Body Shape',
                'username' => auth()->user()->username ?? '',
                'userHeight' => auth()->user()->bodyShape->height ?? '',
                'shapeImg' => '/images/body-shape/front-male.png',
                'shapeImgB' => '/images/body-shape/back-male.png',
                'shapeChar' => '',
                'celebMatch' => '/images/body-shape/front-male.png',
                'celebName' => '',
                'celebOcc' => '',
                'celebDescript' => '',

                'closetEss' => array(
                    'A Trench' => '<p>Skinny shape: Your body shape looks great in long overwear that drops below your bottom or to your ankles as in trench and duster style jackets. Wear it open to show off your fit body. The sleeves can be almost any style and look great: long sleeves, sleeveless, flared and so on. </p><p>Like a flowing maxi dress, the length of the trench brings with it an air that your body type carries well.  Trench coats and jackets command respect. Own several.</p>',
                ) ,

                'basics' => array(
                    'Don’t drape yourself in too much oversized fabrics.',
                    'Don’t wear yoga pants casually. ',
                ) ,
                'snapshotsCharacteristics' => array(
                    'Your midsection holds all of your extra body weight giving you muffintop',
                    'Your bust is typically average to slightly above average',
                    'Your legs are lean and your hips and buttocks are typically very small',
                ) ,
            ),

            'male-inverted' => array(
                'shape' => 'Inverted Shape',
                'shapeTitle' => 'Male Body Shape',
                'username' => auth()->user()->username ?? '',
                'userHeight' => auth()->user()->bodyShape->height ?? '',
                'shapeImg' => '/images/body-shape/front-male.png',
                'shapeImgB' => '/images/body-shape/back-male.png',
                'shapeChar' => '',
                'celebMatch' => '/images/body-shape/front-male.png',
                'celebName' => '',
                'celebOcc' => '',
                'celebDescript' => '',

                'closetEss' => array(
                    'A Trench' => '<p>Skinny shape: Your body shape looks great in long overwear that drops below your bottom or to your ankles as in trench and duster style jackets. Wear it open to show off your fit body. The sleeves can be almost any style and look great: long sleeves, sleeveless, flared and so on. </p><p>Like a flowing maxi dress, the length of the trench brings with it an air that your body type carries well.  Trench coats and jackets command respect. Own several.</p>',
                ) ,

                'basics' => array(
                    'Don’t drape yourself in too much oversized fabrics.',
                    'Don’t wear yoga pants casually. ',
                ) ,
                'snapshotsCharacteristics' => array(
                    'Your midsection holds all of your extra body weight giving you muffintop',
                    'Your bust is typically average to slightly above average',
                    'Your legs are lean and your hips and buttocks are typically very small',
                ) ,
            ),
        );

		return $bodyShapes;
    }
}
