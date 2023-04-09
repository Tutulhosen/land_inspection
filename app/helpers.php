<?php

use Illuminate\Support\Facades\DB;




if(!function_exists('radio_option_maker')){
    function radio_option_maker($number_of_options, $options, $name_fields, $values, $prevalues=null)
    {
        
        $html = '';
        for ($i = 0; $i < $number_of_options; $i++) {
            if(!empty($prevalues))
            {
                if ($values[$i]==$prevalues) {
                    $checked= 'checked';
               }else{
                    $checked='';
               }
            }
            else
            {
                $checked='';  
            }
            
            $html .= '<div class="radio-child-custom">';
            $html .= '<input type="radio" id="' . $name_fields . '" name="' . $name_fields . '" value="' . $values[$i] . '" '.$checked.'>';
            $html .= ' ';
            $html .= '<label for="' . $options[$i] . '">' . $options[$i] . '</label></div>';
        }
    
        return $html;
    }
}        

if(!function_exists('input_type_numrical_builder')){
    function input_type_numrical_builder($name_fields, $placeholder, $unit = null ,$prevalues=null)
    {
        $html = ' ';
        if (!empty($unit)) {
            $html .=
                '<div class="input-group">
                <input type="text" id="'.$name_fields.'" value="'.$prevalues.'" name="' .
                $name_fields .
                '" class="form-control"
                    placeholder="' .
                $placeholder .
                '" aria-label="Username" aria-describedby="basic-addon1">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"> ' .
                $unit .
                ' </span>
                </div>
            </div>';
        } else {
            $html .=
                '<input type="text"  id="'.$name_fields.'" value="'.$prevalues.'" name="' .
                $name_fields .
                '" placeholder="' .
                $placeholder .
                '" class="form-control">';
        }
    
        return $html;
    }
}

if(!function_exists('texarea_builder')){
    function texarea_builder($name_fields, $placeholder,$prevalues=null)
    {
        $html = ' ';
        $html .= '<textarea class="form-control"  id="'.$name_fields.'"  placeholder=' . $placeholder . ' name="' . $name_fields . '"  rows="3">'.$prevalues.'</textarea>';
    
        return $html;
    }
}


// get district name from id
if(!function_exists('disNameFromId')){
    function disNameFromId($id)
    {
        if (isset($id)) {
            return DB::table('lmdt_districts')
                ->where('dis_id', $id)
                ->get();
        }
    }
}

//date formater
 function date_formater($requestDate)
{
    if (str_contains($requestDate, '-')) {
        return $requestDate;
    }

    if (!empty($requestDate)) {
        $date_1 = explode('/', $requestDate);

        return $data = $date_1[2] . '-' . $date_1[0] . '-' . $date_1[1];
    } else {
        return null;
    }
}


if (!function_exists('bn2en')) {
	function bn2en($item) {
		return App\Http\Controllers\CommonController::bn2en($item);
		// echo $item;
	}
}
if (!function_exists('en2bn')) {
	function en2bn($item) {
		return App\Http\Controllers\CommonController::en2bn($item);
		// echo $item;
	}
}

?>