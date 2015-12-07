<?php
interface OutputInterface
{
    public function load($arrayOfData);
}

class SerializedArrayOutput implements OutputInterface
{
    public function load($arrayOfData)
    {
        return serialize($arrayOfData);
    }
}

class JsonStringOutput implements OutputInterface
{
    public function load($arrayOfData)
    {
        return json_encode($arrayOfData);
    }
}

class ArrayOutput implements OutputInterface
{
    public function load($arrayOfData)
    {
        return $arrayOfData;
    }
}

class SomeClient
{
    private $output;

    public function setOutput(OutputInterface $outputType)
    {
        $this->output = $outputType;
    }

    public function loadOutput($data)
    {
        return $this->output->load($data);
    }
}


$client = new SomeClient();

$data = array('name'=>'yogendra', 'age'=>'26');

// Want an array?
$client->setOutput(new ArrayOutput());
$data1 = $client->loadOutput($data);
echo "<pre>"; print_r($data1);

// Want some JSON?
$client->setOutput(new JsonStringOutput());
$data2 = $client->loadOutput($data);

echo "<pre>"; print_r($data2);

// Want some Serialized?
$client->setOutput(new SerializedArrayOutput());
$data3 = $client->loadOutput($data);

echo "<pre>"; print_r($data3);