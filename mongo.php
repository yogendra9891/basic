<?php
try {
  // open connection to MongoDB server
  $conn = new Mongo('localhost');

  // access database(mongo_test = database name)
  $db = $conn->mongo_test;

// access collection(my_test = collection name)
  $collection = $db->my_test;

  // insert a new document in my_test collection
  $item = array(
    'name' => 'milk',
    'quantity' => 10,
    'price' => 2.50,
    'note' => 'skimmed and extra tasty'
  );
  $collection->insert($item);
  echo 'Inserted document with ID: ' . $item['_id'];
  
} catch (MongoConnectionException $e) {
  die('Error connecting to MongoDB server');
} catch (MongoException $e) {
  die('Error: ' . $e->getMessage());
}
?>