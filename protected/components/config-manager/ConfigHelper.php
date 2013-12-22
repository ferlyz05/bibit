<?php
class ConfigHelper
{
    /**
     * parse file and append new data
     *
     * @static
     * @param $source file
     * @param $data from source file
     * @param $new data to be appended
     */
    public static function parseFile($file, $old_data, $tmp_data)
    {
		$new_data = array();
		
        foreach ($tmp_data as $key => $val)
        {
			$val = trim(preg_replace('/\s+/', '', $val));
			
            if ((strpos($val, ':') === false) || ($val[0] != '{') || ($val[strlen($val)-1] != '}'))
			{
				echo "Fix your JSON notation: {$val}";
				return false;
			}
			else
			{
				$new_data[] = self::objectToArray(json_decode($val));
			}
        }
		
		//	Convert two dimensional array to one dimensional array in php5
		$new_data = call_user_func_array('array_merge', $new_data);
		 
		$data = CMap::mergeArray($old_data,$new_data);

        // print configurations into file
        file_put_contents($file, "<?php return ".var_export($data,true).";");
    }

    /**
     * parse config file and read it's data
     *
     * @static
     * @param $file
     * @param $data
     */
    public static function parseConfig($fileName, $newData)
    {
        $file = Yii::getPathOfAlias('application.config.'.$fileName).'.php';
		$oldData = require ($file);
        self::parseFile($file, $oldData, $newData);
    }
	
	/**
     * Convert stdClass Object to Array recursively
     *
     * @protected
     * @static
     * @param $object
     */
	protected static function objectToArray($object) {
		if (is_object($object)) {
			// Gets the properties of the given object
			// with get_object_vars function
			$object = get_object_vars($object);
		}
 
		if (is_array($object)) {
			/*
			* Return array converted to object
			* Provide __CLASS__ for array_map (in class context)
			* Using __FUNCTION__ (Magic constant)
			* for recursive call
			*/
			return array_map(array(__CLASS__,__FUNCTION__), $object);
		}
		else {
			// Return array
			return $object;
		}
	}
}