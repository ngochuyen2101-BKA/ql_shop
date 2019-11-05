<?php
function ShowError($errors,$nameInput)
{
    if($errors->has($nameInput))
    {

        echo '<div class="alert alert-danger" role="alert">';

        echo '<strong> '.$errors->first($nameInput).'</strong>';
        
        echo '</div>';
    }
}

function GetCategory($mang,$parent,$shift,$active)
{
    foreach($mang as $row)
    {
	    if($row->parent==$parent)
	    {
            if ($row->id==$active) 
            {
                echo "<option selected value='$row->id'>".$shift.$row->name."</option>";
            }
            else {
                echo "<option value='$row->id'>".$shift.$row->name."</option>";
            }
		    
		    GetCategory($mang,$row->id,$shift.'---|',$active);
	    }
    }
}

function ShowCategory($mang,$parent,$shift)
{
    foreach($mang as $row)
    {
	    if($row->parent==$parent)
	    {
		    echo "<div class='item-menu'><span>".$shift.$row->name."</span>
                    <div class='category-fix'>
                        <a class='btn-category btn-primary' href='/admin/category/edit/".$row->id."'><i class='fa fa-edit'></i></a>
                        <a onclick='return del_cate(\"$row->name\")' class='btn-category btn-danger' href='/admin/category/del/".$row->id."'><i class='fas fa-times'></i></i></a>
                    </div>
                </div>";
		    ShowCategory($mang,$row->id,$shift.'---|');
	    }
    }
}

// input $mang=$product->values output: array('size'=>array(s,m),'color'=>array('Đỏ','Xanh'))
function attr_values($mang)
{
    $result = array();
    foreach($mang as $value)
    {
        $attr=$value->attribute->name;
        $result[$attr][]=$value->value;
    }
    return $result;
}

function get_combinations($arrays) {
	$result = array(array());
	foreach ($arrays as $property => $property_values) {
		$tmp = array();
		foreach ($result as $result_item) {
			foreach ($property_values as $property_value) {
				$tmp[] = array_merge($result_item, array($property => $property_value));
			}
		}
		$result = $tmp;
	}
	return $result;
}