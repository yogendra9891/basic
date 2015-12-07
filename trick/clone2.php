<?php
class Project {
    protected $description;

    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    public function getDescription() {
        return $this->description;
    }
}

$project_one = new Project();
$project_one->setDescription("This is my first test project");

echo $project_one->getDescription();
echo "<br>";
$project_two = $project_one; // Copying by value?

echo $project_two->getDescription();
echo "<br>";
$project_two->setDescription("This is my second test project");

echo $project_two->getDescription();
echo "<br>";
echo $project_one->getDescription();
echo "<br>";


echo "Cloning..";

$project_three = clone $project_one;

echo $project_three->getDescription();

$project_three->setDescription("This is my third test project");
echo "<br>";
echo $project_three->getDescription();
echo "<br>";
echo $project_one->getDescription();
