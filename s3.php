<?php

$s = 'https://s3.amazonaws.com/sixthcontinent/uploads/documents/dashboard/post/original/54be15d7ea2d5f2cdc000000/1421743597jellyfish.jpg';

if (file_exists($s)) {
echo "exists.";
} else {
echo "not exists.";
}
