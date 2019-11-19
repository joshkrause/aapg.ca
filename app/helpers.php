<?php

/*
* Show the style that a tab is selected based on the url
*/
function setActiveTab($tab_name)
{
	if(Request::segment(1) == $tab_name)
	{
		return 'active open';
	}
	else{
		return '';
	}
}

/*
* Show the style that a tab is selected based on the url
*/
function setActive($tab_name)
{
	$class = '';
	if(Request::segment(1) == $tab_name)
	{
		$class = 'active';
	}
	return $class;
}

/*
* Show a red border around a form element that was filled out incorrectly last time
*/
function errorBorder($name, $errors)
{
	if($errors->has($name))
	{
		return 'form-group-error';
	}
}

/**
* Boolean to Yes\No string
*/
function b2yn($bool)
{
	if($bool == 0 || $bool == '0')
	{
		return 'No';
	}
	else if($bool == 1 || $bool == '1')
	{
		return 'Yes';
	}
	else
	{
		return $bool;
	}
}

/*
* Make a simple label, red or green that says yes or no based on the boolean input
*/
function ynLabel($bool)
{
	if($bool == 0 || $bool == '0')
	{
		return '<span class="badge badge-danger">No</span>';
	}
	else if($bool == 1 || $bool == '1')
	{
		return '<span class="badge badge-success">Yes</span>';
	}
	else
	{
		return $bool;
		return '<span class="label label-warning">'.$bool.'</span>';
	}
}


/**
* Cents integer to fomatted dollar
* cents 2 dollars and cents
* eg.  3525 -> $35.25
*/
function c2d($cents)
{
	return number_format($cents/100, 2);
}

/**
* Dollars integer to cents integer
* dollars 2 cents
* eg.  35.25 -> 3525
*/
function d2c($dollars)
{
	return $dollars * 100;
}

/**
* dollars integer to fomatted dollar
* dollars 2 dollars and cents
* eg.  35 -> $35.00
*/
function d2d($dollars)
{
	return '$' . number_format($dollars, 2);
}

/**
 * Return a Carbon object if a date was entered, return null otherwise
 *
 * @param string  $date
 */
function setCarbonOrNull($date)
{
    if(!empty($date))
    {
        return new Carbon($date);
    }
    else
    {
        return null;
    }
}

function setFormattedDateOrNull($date, $format)
{
	if(!empty($date))
    {
        return $date->format($format);
    }
    else
    {
        return;
    }
}
/**
 * Return an integer if a date was entered, return null otherwise
 *
 * @param string  $date
 */
function setIntOrNull($value)
{
    if(!empty($value))
    {
        return $value;
    }
    else
    {
        return null;
    }
}

/**
 * Return a Carbon object given the date and the time as strings
 *
 * @param string  $date
 * @param string  $time
 * @return Carbon\Carbon the date object
 */
function makeDateTime($date,$time)
{
    return \Carbon\Carbon::createFromFormat('Y-m-d g:i A', $date.' '.$time);
}

/**
 * Helper to avoid writing {{ $value1 == $value2 ? 'selected' : '' }}
 *
 **/
function selected($value1, $value2, $value3 = null)
{
	if($value1 == $value2 || $value1 == $value3)
	{
		return 'selected';
	}
	return '';
}

/**
 * Helper to avoid writing {{ $value1 == $value2 || $value1 == $value3 ? 'checked' : '' }}
 * use checked($value1, $value2, $value3) instead
 *
 **/
function checked($value1, $value2, $value3 = null)
{
	if($value1 == $value2 || $value1 == $value3)
	{
		return 'checked';
	}
	return '';
}