<?php

//1. Can you optimize the below code snippet where we are trying to get common elements
//from the array?

$source = array(1, 2, 3, 4, 5);
$target = array(2, 5, 7, 8, 9);
$common = array();
for ($i = 0; $i < count($source); $i++) {
    for ($j = 0; $j < count($target); $j++) {
        if ($source[$i] == $target[$j]) {
            array_push($common, $source[$i]);
        }
    }
}


//1 My soltuion

$source = array(1, 2, 3, 4, 5);
$target = array(2, 5, 7, 8, 9);

$common = array_intersect($source, $target);

/*
printout

Array ( [1] => 2 [4] => 5 )


*/


//2. What is the solution to fix below JavaScript code? As expected output should not be equal.

/* let obj1 = { 'key1': 1, 'key2': 2, 'key3': 3 };
let obj2 = obj1;
obj2.key1 = 'new1';
console.log ( obj1 === obj2 )
*/

//2 My solution
//note: this is an issue with objects being pass by reference
//the approach is to use the spread operator...

/*

let obj1 = { 'key1': 1, 'key2': 2, 'key3': 3 };
//I used the spread operator
let obj2 = {...obj1};
obj2.key1 = 'new1';
console.log ( obj1 === obj2 )
//output: false
*/



//Problem 3 How can we set cookies for Site B when User visits Site A? Please suggest a possible solution


//Solution
//lets say i own both pages, I can send the data from siteA to siteB via query params (http://siteB.com/?key=value)

//problem 4


//My solution

//The file being unlocked is likely a more recent version compared to the cached one
//So, you would want to update the cache file to the current file before unlinking (deleting)


//problem 5

//How can we improve this code for better performance? (1 Point)
// $target = array(1, rand(1, 5));
// for ($i = 0; $i < 10; $i++) {
//     $target = array_merge($target, array(rand($i, 5), rand(1, $i)));
// }

// //solution

// $target = array(1, rand(1, 5));
// for ($i = 0; $i < 10; $i++) {
//     $target = array_merge($target, array(rand($i, 5), rand(1, $i)));
// }
// print_r($target);


//problem 6
//There are 2 vanilla javascript files, FileA.js & FileB.js. We need to access the functions
//from fileA to FileB and vice versa. How to achieve this? Elaborate possible solutions.

//Solution 6

/*
1. Solution will be to import FileA.js into FileB.js
Using the ECMA Script 6 import statement and it actually doesn't require nodejs as ECMAScript modules is in browsers already
for example

<script type="module">
  import { lovelyFunction } from './folder/FileA.js';
  hello('world');
</script>

//you can also make asynchronous Ajax request instead

function require(script) {
    $.ajax({
        url: /folder/FileA.js,
        dataType: "script",
        async: false,           // <-- This is the key
        success: function () {
            // all good...
        },
        error: function () {
            throw new Error("Could not load script " + script);
        }
    });
}
*/


//Problems 7
//How can we make the below code work?




//How can we reduce this code with single inbuilt PHP functions?
//(2 Point)
$my_list = array(
    array(
        'ID' => 1,
        'post_title' => 'Hello World',
    ),
    array(
        'ID' => 2,
        'post_title' => 'Sample Page',
    ),
);
$pages = array();
for ($i = 0; $i < count($my_list); $i++) {
    array_push($pages, $my_list[$i]['post_title']);
}
// print_r($pages);

//answer...THe above code is the best way to do this.
//I actually feel that the below snippets are the closet to the solution for one inbuilt php function but does not output the actuall needed result because we must loop and the post tiltle values need to have their own arrays but below is what i have tried

print_r(array_merge(...$my_list));

/*     second trial */

$arr = array_filter($my_list, function( $k) {
    return $k == 'post_title';
}, ARRAY_FILTER_USE_KEY);

print_r($arr);


