<?php
$test= array
(
    '0' => array
        (
            'Forum' => array
                (
                    'id' => 190,
					'post' => 'test',
					'author' => ''
                ),
			'QuestionAccess' => array
				(
				    'is_pin' => '',
                    'is_flag' => '',
                    'user_id' => 'abhi'
				)

        ),
		'1' => array
        (
            'Forum' => array
                (
                    'id' => 197,
					'post' => 'resting here',
					'author' => 'abhishek'
                ),
			'QuestionAccess' => array
				(
				    'is_pin' => 1,
                    'is_flag' => 1,
                    'user_id' => 'abhi'
				)

        ),
		'2' => array
        (
            'Forum' => array
                (
                    'id' => 196,
					'post' => 'click here',
					'author' => ''
                ),
			'QuestionAccess' => array
				(
				    'is_pin' => 1,
                    'is_flag' => '',
                    'user_id' => 'ram'
				)

        ),
		'3' => array
        (
            'Forum' => array
                (
                    'id' => 191,
					'post' => 'not tested here',
					'author' => ''
                ),
			'QuestionAccess' => array
				(
				    'is_pin' => 1,
                    'is_flag' => '',
                    'user_id' => 'ram'
				)

        )			

  );
  
	$test1 = array();
	$test2 = array();
	foreach($test as $rest)
	{
       echo $rest['Forum']['post'].'<br>';
	   if($rest['Forum']['author'] == '')
	   {
		$test1[] = $rest;
	   }else
	   {
		$test2[] = $rest;
	   }
	}
	
function cmp_by_optionNumber($a, $b) {
  return $b['QuestionAccess']["is_pin"] - $a['QuestionAccess']["is_pin"];
}
usort($test1, "cmp_by_optionNumber");
echo "<pre>";
print_r($test1);
echo "............................";
echo "<pre>";
print_r($test2);
?>