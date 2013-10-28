<?php
require 'Phails/init.php';
require 'PhailSafe/init.php';

function capture_puts($content)
{
    ob_start();
    puts($content);
    return ob_get_clean();
}

test("should print string", function($test) {
    $test_string = str("Hello, world");
    $test->shouldEqual("Hello, world", capture_puts($test_string));
});

test("should split string and print array", function($test){
    $test_array = str("Hello, world")->split(', ');
    $test->shouldEqual('["Hello","world"]', capture_puts($test_array));
});

test("should return true for string->includes()", function($test){
    $test->assertTrue(str('Test string')->includes('ing'));
});

test("should return true for array->includes()", function($test){
    $test->assertTrue(arr(['test', 'array'])->includes('test'));
});
