<?php
$options = array(
        'create_if_missing' => true,    // if the specified database didn't exist will create a new one
        'error_if_exists'   => false,   // if the opened database exsits will throw exception
        'paranoid_checks'   => false,
        'block_cache_size'  => 8 * (2 << 20),
        'write_buffer_size' => 4<<20,
        'block_size'        => 4096,
        'max_open_files'    => 1000,
        'block_restart_interval' => 16,
        'compression'       => LEVELDB_SNAPPY_COMPRESSION,
        'comparator'        => NULL,   // any callable parameter which returns 0, -1, 1
);
/* default readoptions */
$readoptions = array(
        'verify_check_sum'  => false,
        'fill_cache'        => true,
        'snapshot'          => null
);

/* default write options */
$writeoptions = array(
        'sync' => false
);
//下面的/opt/youku/leveldb是一个目录
$db = new LevelDB("/phpstudy/www/leveldb", $options, $readoptions, $writeoptions);

$db->put("Key", "yangkai");
$db->put("name","youngk,helloo");
$value =$db->get("Key");
echo $value."<br>";
$db->delete("Key");
$value =$db->get("name");
echo($value."\n");
