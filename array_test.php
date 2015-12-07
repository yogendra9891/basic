<?php
$json = '[
{
"name":"yogi",
"id":12
},
{
"name":"yogendra",
"id":1
},
{
"name":"singh",
"id":12
},
{
"name":"ankit",
"id":1
},
{
"name":"abhishek",
"id":12
}
]';
//echo "<pre>"; print_r(json_decode($json));
$names = json_decode($json);

$users = array();

foreach($names as $name) {
  $users[$name->id][] = array('id'=>$name->id, 'name'=>$name->name);
}
echo "<pre>"; print_r($users);
?>